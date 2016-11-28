@extends('base.index')

@section('title')
    后台管理
@endsection

@section('book')
    active
@endsection

@section('sidebar')
    @include('base.back-sidebar')
@endsection

@section('nav')
    @include('base.back-nav')
@section('background')
    <p>当前共有{{ $database->usernumber }}用户</p>
@endsection
@endsection



@section('js')
    <script src="{{ asset('assets/js/typetype.min.js') }}"></script>
    <script>
        $(function() {
            $('#change').focus()
                    .delay(1000)
                    .backspace(9)
                    .typetype("后台管理系统", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection