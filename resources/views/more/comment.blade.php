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
        <h1 class="ui header dividing">书评</h1>
        @if(count($comments)!=0)
        <div class="ui feed">
            @foreach($comments as $comment)
            <?php $book = $comment->book[0]; ?>
            <div class="event">
                <div class="content">
                    <div class="summary">
                        在
                        <a href="{{ url('book',$book->id) }}" class="user"> {{ $book->name }} </a> 评论了
                        <div class="date">{{ $comment->created_at->diffForHumans() }} </div>
                        <a class="date">借阅 {{ count($book->user) }} </a>
                    </div>
                    <div class="extra">
                        <p>{{ $comment->content }}</p>
                    </div>

                </div>
            </div>
            <h4 class="ui horizontal header divider">
                <i class="star yellow icon"></i>
            </h4>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection