@extends('base.index')

@section('title')
    重置密码
@endsection

@section('login')
    active
@endsection

@section('css')
    <style>
        #library_register_form{
            max-width: 450px;
        }
    </style>
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('nav')
    @include('base.nav-normal')
@endsection

@section('content')
    <div id="library_body" class="ui vertical stripe segment">
        <div class="ui middle aligned center aligned grid">
            <div id="library_register_form"class="column">
                <h2 class="ui teal image header">重置密码</h2>
                {{-- Login 表单 --}}
                {!! Form::open(['url' => 'password/reset', 'class' => 'ui large form']) !!}
                <div class="ui stacked segment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    {{-- 邮箱输入框 --}}
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="确认输入邮箱">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="输入密码">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password_confirmation" placeholder="重复输入密码">
                        </div>
                    </div>

                    {{-- 登陆按钮 --}}
                    {!! Form::submit('确认',['class' => 'ui fluid large teal submit button']) !!}
                </div>
                {!! Form::close() !!}
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="ui message error">{{ $error }}</div>
                    @endforeach
                @endif
                @if (session('status'))
                        <div class="ui message info">{{ session('status') }}</div>
                    @endif
                <div class="ui message">
                    重新发送 <a href="{{ url('password/email') }}">密码重置</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
