@extends('base.index')

@section('title')
    {{ $user->name }}
@endsection

@section('user')
    active
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('nav')
    @include('base.nav-normal')
@endsection

@section('content')
    <div class="ui vertical center aligned segment">
        <div class="ui text container">
            <h1 class="ui header dividing">还书中心</h1>
            <div class="ui divided"></div>
            <div class="ui grid">
                @foreach($read as $book)
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
    @if($read->render())
        <div class="ui vertical segment middle aligned center aligned">
            <div class="ui text container">
                <div id="page" class="">
                    {!! $read->render() !!}
                </div>
            </div>
        </div>
    @endif
@endsection
