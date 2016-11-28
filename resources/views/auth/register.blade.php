@extends('base.index')

@section('title')
    注册
@endsection

@section('register')
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
            <div id="library_register_form" class="column">
                <h2 class="ui teal image header">注册</h2>
                {!! Form::open(['url' => 'auth/register', 'class' => 'ui large form']) !!}
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            {!! Form::text('name', null ,['placeholder' => '用户名']) !!}
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="mail icon"></i>
                            {!! Form::email('email', null ,['placeholder' => '邮箱']) !!}
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            {!! Form::password('password',['placeholder' => '输入密码，至少6位']) !!}
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            {!! Form::password('password_confirmation',['placeholder' => '确认密码']) !!}
                        </div>
                    </div>
                    {!! Form::submit('注册',['class' => 'ui fluid large teal submit button']) !!}
                </div>
                {!! Form::close() !!}

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="ui message error">{{$error}}</div>
                    @endforeach
                @endif

                <div class="ui message">
                    已有账号？ <a href="{{ url('auth/login') }}">登陆</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection