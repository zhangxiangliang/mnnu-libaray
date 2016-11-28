@extends('base.index')

@section('title')
    用户编辑
@endsection

@section('css')
    <style>
        .avatar .image-list{
            margin: 20px auto;
            min-height: 300px;
            border: 2px dashed #ccc;
            padding: 30px;
            text-align: center;
            max-height: 500px;
        }
        img{
            max-height: 300px;
        }
    </style>
@endsection

@section('sidebar')
    @include('base.back-sidebar')
@endsection

@section('nav')
    @include('base.back-normal')
@endsection

@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">用户编辑</h1>
        <h5 class="ui center aligned header">{{ $user->name }}</h5>
        <div class="ui text container" style="margin-top: 30px;">
            {!! Form::model($user, ['url' => 'back/user/edit/'.$user->id,
                            'method' => 'PATCH',
                            'class' => 'ui large form',
                            'id' => 'upload',
                            'files' => true]) !!}
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
                {!! Form::label('intro','个人简介:') !!}
                <div class="ui left input">
                    {!! Form::textarea('intro', null, ['placeholder' => '输入作者简介']) !!}
                </div>
            </div>
            {!! Form::submit('修改用户',['class' => 'ui teal submit button']) !!}
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
    <script src="{{ asset('assets/js/avatar.js') }}"></script>
@endsection