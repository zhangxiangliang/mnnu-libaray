@extends('base.index')

@section('title')
    {{ $user->name }}
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('user')
    active
@endsection

@section('css')
    <style>
        #library_user{
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
        }
        .library_working{
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: 20px;
        }
        .library_title{
            font-weight: bold;
            font-size: 1.7em;
            line-height: 1.7em;
        }
    </style>
@endsection

@section('nav')
    @include('base.nav-normal')
@endsection

@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">资料修改</h1>
        <div class="ui text container" style="margin-top: 30px;">
            {!! Form::model($user, ['url' => '/user/info/',
                            'method' => 'POST',
                            'class' => 'ui large form']) !!}
            <div class="field">
                {!! Form::label('name','用户名:') !!}
                <div class="ui left input">
                    {!! Form::text('name', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('number','学号:') !!}
                <div class="ui left input">
                    {!! Form::text('number', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('intro','简介:') !!}
                <div class="ui left input">
                    {!! Form::textarea('intro', null, ['placeholder' => '输入文章内容']) !!}
                </div>
            </div>
            {!! Form::submit('修改',['class' => 'ui fluid large teal submit button']) !!}
            {!! Form::close() !!}
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="ui message error">{{$error}}</div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('js')

@endsection