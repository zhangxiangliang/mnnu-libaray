@extends('base.index')

@section('title')
    头像上传
@endsection

@section('user')
    active
@endsection

@section('nav')
    @include('base.nav-normal')
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .ui.message.error{
            width: 60%;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <h1 class="ui header center aligned">头像上传</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="ui message error">{{ $error }}</div>
        @endforeach
    @endif
    <div class="avatar container">
        <div class="image-list">
        </div>
        {!! Form::open( [ 'url' => ['user/avatar'], 'method' => 'POST', 'id' => 'upload', 'files' => true ] ) !!}
        <a href="#" id="selectbtn" class="ui button blue">选择图片</a>
        <input name="fileselect" id="image" type="file" multiple style="display:none">
        <button class="ui button green">上传图片</button>
        {!! Form::close() !!}
    </div>
@endsection

{{-- 当前页面脚本 --}}
@section('js')
    <script src="{{ asset('assets/js/avatar.js') }}"></script>
@endsection