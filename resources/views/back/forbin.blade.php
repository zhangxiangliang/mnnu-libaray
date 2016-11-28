@extends('base.index')

@section('title')
    禁言列表
@endsection


@section('css')
    <style>
        img{
            max-height:200px;
        }
    </style>
@endsection

@section('nav')
    @include('base.back-normal')
@endsection

@section('sidebar')
    @include('base.back-sidebar')
@endsection

@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">禁言列表</h1>
        <h5 class="ui center aligned header">Forbin Manage</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                <tr>
                    <th class="column">用户名</th>
                    <th class="column">邮箱</th>
                    <th class="column">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $key => $user)
                    @if(!$user->can('forbin'))
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="ui buttons">
                                @if($user->can('forbin'))
                                    <a href="{{ url('back/user/forbin',[$user->id]) }}" class="green ui button">禁言</a>
                                @else
                                    <a href="{{ url('back/user/allow',[$user->id]) }}" class="green ui button">解除禁言</a>
                                @endif
                                <div class="or"></div>
                                <a href="{{ url('back/user/edit',[$user->id]) }}" class="blue ui button">修改</a>
                                @role('admin')
                                <div class="or"></div>
                                {!! Form::open(['method' => 'DELETE','url' => 'back/user/delete/'.$user->id]) !!}
                                <button type="submit" class="red ui button">删除</button>
                                {!! Form::close() !!}
                                @endrole
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div id="page">
                {!! $users->render() !!}
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection