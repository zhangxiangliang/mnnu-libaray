<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function info()
    {
        $user = Auth::user();
        return view('user.info', compact('user'));
    }

    public function updateInfo(Request $request){
        $user = Auth::user();
        $this->validate($request, ['intro' => 'required|min:5',
                'name' => 'required|min:1|max:5', 'number' => 'required|min:1|unique:users']);
        $user->update($request->all());
        return redirect()->route('info_user', [$user->id]);
    }

    public function index()
    {
        $users = User::latest()->paginate(8);
        return view('user.index', compact('users'));
    }

    /*
     * 根据等级返回用户角色
     */
    public function userRoles($level){
        if($level == 1){
            $role = '管理员';
        } else if($level == 2){
            $role = '学生';
        } else if($level == 3){
            $role = '老师';
        }
        return $role;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user->level() == 0){
            $user->attachRole(2);
        }
        $role = $this->userRoles($user->level());
        $reading = $user->book()->wherePivot('status', 0)->Paginate(2);
        $read = $user->book()->where('status', 1)->Paginate(2);
        $comments = $user->comment()->Paginate(5);
        if(Auth::check() && Auth::user()->id == $id){
            $self = true;
        }else{
            $self = false;
        }
        return view('user.show', compact('user', 'role', 'reading', 'read', 'comments', 'self'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, ['intro' => 'required|min:5',
            'name' => 'required|min:1|max:5', 'number' => 'required|min:1|unique:users']);
        $user->update($request->all());
        if($user->level()==1){
            return redirect('/back/admin');
        } else if($user->level()==2){
            return redirect('/back/user');
        } elseif($user->level()==3){
            return redirect('/back/teacher');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user()->isAdmin()) {
            $user = User::findOrFail($id);
            $user->delete();
        }
        return redirect()->back();
    }

    public function forbin($id)
    {
        $user = User::findOrFail($id);
        $user->detachPermission(1);
        return redirect()->back();
    }

    public function allow($id)
    {
        $user = User::findOrFail($id);
        $user->attachPermission(1);
        return redirect()->back();
    }

    // 显示修改头像页面
    public function avatar(){
        return view('user.avatar');
    }

    // 验证头像上传 Token
    public function wrongToken()
    {
        if ( Session::token() !== \Request::get('_token') ) {
            return redirect()->route('info_user', [Auth::user()->id]);
        }
    }

    // 验证头像上传并储存
    public function avatarUpload(){
        $this->wrongToken();
        $file = Input::file('fileselect');
        if(!$file){
            $error = '请不要上传空图片';
            return redirect('user/avatar')
                ->withErrors($error);
        }
        $input = array('image' => $file);
        $rules = array('image' => 'image');
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            $error = '请不要上传非图片文件';
            return redirect('user/avatar')
                ->withErrors($error);
        }
        $user = Auth::user();
        $destinationPath = 'assets/avatar/';
        $filename = $user->id."_".$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $user->avatar = $filename;
        $user->save();
        return redirect()->route('info_user', [$user->id]);
    }

    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('lyon@taroball.net', '闽南师范大学图书馆');

            $m->to($user->email, $user->name)->subject('欢迎注册闽南师范大学图书馆，请激活您的账号');
        });
    }
    // 更多已经阅读
    public function read($id)
    {
        $user = User::findOrFail($id);
        if($user->level() == 0){
            $user->attachRole(2);
        }
        $role = $this->userRoles($user->level());
        $reading = $user->book()->wherePivot('status', 0)->Paginate(8);
        $read = $user->book()->where('status', 1)->Paginate(10);
        $comments = $user->comment()->Paginate(5);
        if(Auth::check() && Auth::user()->id == $id){
            $self = true;
        }else{
            $self = false;
        }
        // return view('user.show', compact('user', 'role', 'reading', 'read', 'comments', 'self'));
        return view('more.read', compact('user', 'read'));
    }
    // 更多已经阅读
    public function reading($id)
    {
        $user = User::findOrFail($id);
        if($user->level() == 0){
            $user->attachRole(2);
        }
        $role = $this->userRoles($user->level());
        $reading = $user->book()->wherePivot('status', 0)->Paginate(8);
        $comments = $user->comment()->Paginate(5);
        if(Auth::check() && Auth::user()->id == $id){
            $self = true;
        }else{
            $self = false;
        }
        // return view('user.show', compact('user', 'role', 'reading', 'read', 'comments', 'self'));
        return view('more.reading', compact('user', 'reading', 'self'));
    }
    // 更多已经阅读
    public function comment($id)
    {
        $user = User::findOrFail($id);
        if($user->level() == 0){
            $user->attachRole(2);
        }
        $comments = $user->comment()->Paginate(5);
        return view('more.comment', compact('user', 'comments'));
    }
}
