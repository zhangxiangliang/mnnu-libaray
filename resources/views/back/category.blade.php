@extends('base.index')

@section('title')
    分类列表
@endsection

@section('css')
    <style>
        img{
            max-height:200px;
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
    <div id="library_body" class="ui vertical segment">
        <h1 class="ui center aligned header">分类列表</h1>
        <h5 class="ui center aligned header">Category List</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                <tr>
                    <th class="one column">分类名</th>
                    <th class="one column">颜色</th>
                    <th class="one column">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $categorys as $category)
                    <tr>
                        <td><a href="{{url('category',$category->id)}}">{{ $category->name }}</a></td>
                        <td><button class="ui button {{$category->color}}">颜色</button></td>
                        <td>
                            <div class="ui buttons">
                                <a href="{{ url('back/category',['edit', $category->id]) }}" class="blue ui button">修改</a>
                                @role('admin')
                                <div class="or"></div>
                                {!! Form::open(['method' => 'DELETE','url' => 'back/category/delete/'.$category->id]) !!}
                                <button type="submit" class="red ui button">删除</button>
                                {!! Form::close() !!}
                                @endrole
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">
                {!! $categorys->render() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
