@extends('base.index')

@section('title')
    首页
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('nav')
    @include('base.nav')
@endsection

@section('content')
    <div class="ui vertical segment">
        <div class="ui text container">
            <h3 class="ui dividing header">推荐书籍</h3>
            <div class="ui grid">
                @foreach($books as $book)
                    <div class="center aligned four wide column">
                        <a href="{{ url('book',[$book->id]) }}">
                            <img class="ui medium centered image" src="{{ url('assets/book',[$book->cover]) }}">
                            <h4>{{ $book->name }}</h4>
                            <p class="hidden">{{ $book->author }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="ui vertical segment middle aligned center aligned">
        <div class="ui text container">
            <div id="page" class="">
                {!! $books->render() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/typetype.min.js') }}"></script>
    <script>
        $(function() {
            $('#change').focus()
                    .delay(1000)
                    .backspace(9)
                    .typetype("博学明理 砺志笃行", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection