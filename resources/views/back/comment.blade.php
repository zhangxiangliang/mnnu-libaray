@extends('base.index')

@section('title')
    评论列表
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
        <h1 class="ui center aligned header">评论列表</h1>
        <h5 class="ui center aligned header">Comment List</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                <tr>
                    <th class="one column">用户</th>
                    <th class="one column">书籍名</th>
                    <th class="one column">评论内容</th>
                    <th class="one column">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $comments as $comment)
                    <?php
                        $user = $comment->user()->get()[0];
                        $book = $comment->book()->get()[0];
                    ?>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            <div class="ui buttons">
                                @if($user->can('forbin'))
                                    <a href="{{ url('back/user/forbin',[$user->id]) }}" class="green ui button">禁言</a>
                                @else
                                    <a href="{{ url('back/user/allow',[$user->id]) }}" class="green ui button">解除禁言</a>
                                @endif
                                @role('admin')
                                <div class="or"></div>
                                {!! Form::open(['method' => 'DELETE','url' => 'back/comment/delete/'.$comment->id]) !!}
                                <button type="submit" class="red ui button">删除</button>
                                {!! Form::close() !!}
                                @endrole
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="ui vertical segment middle aligned center aligned">
                <div class="ui text container">
                    <div id="page" class="">
                        {!! $comments->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection