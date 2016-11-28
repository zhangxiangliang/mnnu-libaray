@extends('base.index')

@section('title')
    图书创建
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
        <h1 class="ui center aligned header">图书创建</h1>
        <div class="ui text container" style="margin-top: 30px;">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="ui message error">{{$error}}</div>
                @endforeach
            @endif
            {!! Form::open(['url' => 'back/book/create',
                            'method' => 'POST',
                            'class' => 'ui large form',
                            'id' => 'upload',
                            'files' => true]) !!}
            <div class="field">
                {!! Form::label('name','图书名:') !!}
                <div class="ui left input">
                    {!! Form::text('name', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('name','分类:') !!}
                <select name="category_id" class="ui search dropdown">
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                {!! Form::label('author','作者:') !!}
                <div class="ui left input">
                    {!! Form::text('author', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('published_company','出版社:') !!}
                <div class="ui left input">
                    {!! Form::text('published_company', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('published_time','出版时间:') !!}
                <div class="ui left input">
                    {!! Form::input('date', 'published_time',date('Y-m-d')) !!}
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    {!! Form::label('page','页数:') !!}
                    <div class="ui left input">
                        {!! Form::text('page', null, null) !!}
                    </div>
                </div>
                <div class="field">
                    {!! Form::label('price','价格:') !!}
                    <div class="ui left input">
                        {!! Form::text('price', null, null) !!}
                    </div>
                </div>
                <div class="field">
                    {!! Form::label('ISBN','ISBN:') !!}
                    <div class="ui left input">
                        {!! Form::text('ISBN', null, null) !!}
                    </div>
                </div>
                <div class="field">
                    {!! Form::label('number','册数:') !!}
                    <div class="ui left input">
                        {!! Form::text('number', null, null) !!}
                    </div>
                </div>
            </div>
            <div class="field">
                {!! Form::label('author_intro','作者简介:') !!}
                <div class="ui left input">
                    {!! Form::textarea('author_intro', null, ['placeholder' => '输入作者简介']) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('content','书籍简介:') !!}
                <div class="ui left input">
                    {!! Form::textarea('content', null, ['placeholder' => '输入书籍简介']) !!}
                </div>
            </div>
            <div class="field">
                <div class="avatar container">
                    <div class="image-list">
                    </div>
                    <input name="fileselect" id="image" type="file" accept="image/*" style="display:none">
                </div>
            </div>
            <a href="javascript:void();" id="selectbtn" class="ui button blue">选择图片</a>
            {!! Form::submit('创建书籍',['class' => 'ui teal submit button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/avatar.js') }}"></script>
@endsection
