@extends('base.index')

@section('title')
    {{ $book->name }}
@endsection

@section('book')
    active
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('nav')
    @include('base.nav-normal')
@endsection

@section('content')
    <div class="ui vertical segment">
        <div class="ui text grid container">
            <div class="row">
                @if($errors->any())
                    <div class="sixteen wide column" style="margin-bottom: 10px;">
                    @foreach($errors->all() as $error)
                        <div class="ui message error">{{ $error }}</div>
                    @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="sixteen wide column" style="margin-bottom: 10px;">
                        <div class="ui message success">{{ Session::get('success') }}</div>
                    </div>
                @endif
                <div class="sixteen wide column">
                    <h1 class="ui header chat">{{ $book->name }}</h1>
                    <br>
                </div>
                <div class="seven wide column">
                    <img class="ui medium centered  image" src="{{ url('assets/book',[$book->cover]) }}">
                </div>
                <div class="nine wide column">
                    <div class="content">
                        <p>作者：{{ $book->author }}</p>
                        <p class="hidden">出版社：{{ $book->published_company }}</p>
                        <p class="hidden">出版时间：{{ date('Y-m',strtotime($book->published_time)) }}</p>
                        <p>页数：{{ $book->page }}页</p>
                        <p class="hidden">价格：￥{{ $book->price }}</p>
                        <p class="hidden">ISBN：{{ $book->ISBN }}</p>
                        <p>藏册：{{ $book->number - $book->borrow }}册</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="ui horizontal divider header">借阅状态</h4>
                <div class="sixteen wide column chat-bottom">
                    @if($book->number > $book->borrow)
                    <a class="ui blue label">可借阅</a>
                    <a href="{{ url('book',[$book->id,"borrow"]) }}" class="ui green label">借阅</a>
                    @else
                    <a class="ui red label">不可借阅</a>
                    @endif
                </div>
                <h4 class="ui horizontal divider header">内容简介</h4>
                <div class="sixteen wide column">
                    <p>{{ $book->content }}</p>
                </div>
                <h4 class="ui horizontal divider header">作者简介</h4>
                <div class="sixteen wide column">
                    <p>{{ $book->author_intro }}</p>
                </div>
                <h4 class="ui horizontal divider header">书籍评论</h4>
                <div class="sixteen wide column">
                    <div class="ui comments">
                        @if(count($comments)!=0)
                            @foreach($comments as $comment)
                                <?php $user = $comment->user[0] ?>
                                <div class="comment">
                                    <a class="avatar">
                                        <img src="{{ url('assets/avatar',$user->avatar) }}">
                                    </a>
                                    <div class="content">
                                        <a href="{{ url('user', $user->id) }}" class="author">{{ $user->name }}</a>
                                        <div class="metadata">
                                            <div class="date">{{ $comment->created_at->diffForHumans() }}</div>
                                        </div>
                                        <div class="text">
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>暂无书评</p>
                        @endif

                        @if(\Auth::check())
                        {!! Form::open(['url' => '/book/'.$book->id.'/comment/',
                                        'method' => 'POST',
                                        'class' => 'ui reply form']) !!}
                            <div class="field">
                                {!! Form::textarea('content', null, ['placeholder' => '输入评论内容']) !!}
                            </div>
                            {!! Form::submit('添加评论',['class' => 'ui primary submit labeled button']) !!}
                        {!! Form::close() !!}
                        @else
                            {!! Form::open(['url' => '/book/'.$book->id.'/comment/',
                                        'method' => 'GET',
                                        'class' => 'ui reply form']) !!}
                            <div class="field">
                                {!! Form::textarea('content', null, ['placeholder' => '请您先登录，再评论']) !!}
                            </div>
                            {!! Form::submit('添加评论',['class' => 'ui primary submit labeled button']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection