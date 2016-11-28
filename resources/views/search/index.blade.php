@extends('base.index')

@section('title')
    搜索
@endsection

@section('search')
    active
@endsection

@section('nav')
    @include('base.nav')
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('css')
    <style>
        #library_nav{
            background-image: url({{ url('assets/images/search.jpg') }});
            background-size: 100% 100%;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/typetype.min.js') }}"></script>
    <script>
        $(function() {
            $('#change').focus()
                    .delay(1000)
                    .backspace(9)
                    .typetype("搜索你想要的一切", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection