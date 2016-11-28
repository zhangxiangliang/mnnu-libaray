@extends('base.index')

@section('title')
    搜索结果
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
            background-image: url( {{url('assets/images/search.jpg')}} );
            background-size: 100% 100%;
        }
    </style>
@endsection
@section('content')
    <div class="ui vertical segment">
        <div class="ui text container">
            @if(count($users) > 0)
                <h3 class="ui dividing header">书友</h3>
                <div class="ui grid">
                    @foreach( $users as $user)
                        <div class="center aligned four wide column">
                            @if($user->avatar)
                                <img class="ui medium centered circular image" src="{{ url('assets/avatar/',$user->avatar) }}">
                            @else
                                <img class="ui medium centered circular image" src="{{ url('assets/avatar/1.jpg') }}">
                            @endif
                            <h4><a href="{{ url('user',$user->id) }}">{{ $user->name }}</a></h4>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(count($categorys) > 0)
                <h3 class="ui dividing header">相关分类</h3>
                @foreach ($categorys as $category)
                    <div class="ui text container category">
                        <a href="{{url('category',[$category->id])}}">
                            <div class="ui {{$category->color}} inverted segment">{{$category->name}}</div>
                        </a>
                    </div>
                @endforeach
            @endif
            @if(count($books) > 0)
                <h3 class="ui dividing header">没有搜索到相关书籍</h3>
                <h5>以下是推荐的图书</h5>
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
            @endif
            @if (count($book_name) > 0 )
                <h3 class="ui dividing header">相关书籍名</h3>
                <div class="ui grid">
                    @foreach($book_name as $book)
                        <div class="center aligned four wide column">
                            <a href="{{ url('book',[$book->id]) }}">
                                <img class="ui medium centered image" src="{{ url('assets/book',[$book->cover]) }}">
                                <h4>{{ $book->name }}</h4>
                                <p class="hidden">{{ $book->author }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (count($book_content) > 0 )
                <h3 class="ui dividing header">相关内容</h3>
                <div class="ui grid">
                    @foreach($book_content as $book)
                        <div class="center aligned four wide column">
                            <a href="{{ url('book',[$book->id]) }}">
                                <img class="ui medium centered image" src="{{ url('assets/book',[$book->cover]) }}">
                                <h4>{{ $book->name }}</h4>
                                <p class="hidden">{{ $book->author }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (count($book_author) > 0 )
                <h3 class="ui dividing header">相关作者</h3>
                <div class="ui grid">
                    @foreach($book_author as $book)
                        <div class="center aligned four wide column">
                            <a href="{{ url('book',[$book->id]) }}">
                                <img class="ui medium centered image" src="{{ url('assets/book',[$book->cover]) }}">
                                <h4>{{ $book->name }}</h4>
                                <p class="hidden">{{ $book->author }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (count($book_company) > 0 )
                <h3 class="ui dividing header">相关出版社</h3>
                <div class="ui grid">
                    @foreach($book_company as $book)
                        <div class="center aligned four wide column">
                            <a href="{{ url('book',[$book->id]) }}">
                                <img class="ui medium centered image" src="{{ url('assets/book',[$book->cover]) }}">
                                <h4>{{ $book->name }}</h4>
                                <p class="hidden">{{ $book->author }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
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
                    .typetype("搜索你想要的一切", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection
