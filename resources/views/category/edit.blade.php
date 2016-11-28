@extends('base.index')

@section('title')
    分类编辑
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
        <h1 class="ui center aligned header">分类编辑</h1>
        <div class="ui text container" style="margin-top: 60px;">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="ui message error">{{$error}}</div>
                @endforeach
            @endif
            {!! Form::model($category,['url' => 'back/category/edit/'.$category->id,
                            'method' => 'PATCH',
                            'class' => 'ui large form',
                            'id' => 'upload']) !!}
            <div class="field">
                {!! Form::label('name','分类名:') !!}
                <div class="ui left input">
                    {!! Form::text('name', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('name','颜色:') !!}
                <select name="color" class="ui search dropdown">
                    @foreach($colors as $key => $color)
                        <option value="{{$key}}">{{$color}}</option>
                    @endforeach
                </select>
            </div>
            {!! Form::submit('创建分类',['class' => 'ui teal submit button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/avatar.js') }}"></script>
@endsection
