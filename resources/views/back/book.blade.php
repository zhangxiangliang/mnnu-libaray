@extends('base.index')

@section('title')
    图书列表
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
        <h1 class="ui center aligned header">图书列表</h1>
        <h5 class="ui center aligned header">Book List</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                <tr>
                    <th class="one column">书名</th>
                    <th class="one column">封面</th>
                    <th class="one column">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $books as $book)
                    <tr>
                        <td><a href="{{ url('book',$book->id) }}">{{ $book->name }}</a></td>
                        <td><img src="{{ url('assets/book',[$book->cover]) }}" alt=""></td>
                        <td>
                            <div class="ui buttons">
                                <a href="{{ url('back/book',['edit', $book->id]) }}" class="blue ui button">修改</a>
                                @role('admin')
                                <div class="or"></div>
                                {!! Form::open(['method' => 'DELETE','url' => 'back/book/delete/'.$book->id]) !!}
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
                {!! $books->render() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection