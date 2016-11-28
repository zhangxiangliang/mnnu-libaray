@extends('base.index')

@section('title')
    图书
@endsection

@section('book')
    active
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('nav')
    @include('base.nav')
@endsection

@section('css')
    <style>
        #library_nav{
            background-image: url({{ url('assets/images/book.jpg') }});
            background-size: 100% 100%;
        }
    </style>
@endsection

@section('content')
    <div class="ui vertical center aligned segment">
        <div class="ui text container">
            <div class="ui grid">
                @foreach($books as $book)
                    <div class="center aligned four wide column">
                        <a href="{{ url('book',[$book->id]) }}">
                            <img class="ui medium centered  image" src="{{ url('assets/book',[$book->cover]) }}">
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
                    .typetype("读一本好书 与智者相伴", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection