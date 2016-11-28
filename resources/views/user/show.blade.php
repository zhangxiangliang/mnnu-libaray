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

@section('css')
    <style>
        #library_user{
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
        }
        .library_working{
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: 20px;
        }
        .library_title{
            font-weight: bold;
            font-size: 1.7em;
            line-height: 1.7em;
        }
    </style>
@endsection

@section('nav')
    @include('base.nav-normal')
@endsection

@section('content')
    <div class="ui container">
        <div class="ui stackable grid">
            @if($errors->any())
                <div class="sixteen wide column" style="margin: 10px 0;">
                    @foreach($errors->all() as $error)
                        <div class="ui message error">{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @if(Session::has('success'))
                <div class="sixteen wide column" style="margin: 10px 0;">
                    <div class="ui message success">{{ Session::get('success') }}</div>
                </div>
            @endif
            {{-- 用户信息左侧 --}}
            <div id="library_user" class="seven wide column">
                <div class="ui centered card">
                    <div class="image">
                        @if($user->avatar)
                        <img src="{{ url('assets/avatar/',$user->avatar) }}">
                        @else
                            <img src="{{ url('assets/avatar/1.jpg') }}">
                        @endif
                    </div>
                    <div class="content">
                        <div class="header">{{ $user->name }}</div>
                        <div class="description">{{ $user->intro }} </div>
                        <div class="level"><span class="ui red label text">等级 {{ $user->levels }}</span></div>
                    </div>
                    <div class="extra content">
                        <span class="right floated">{{ date('Y',strtotime($user->created_at)) }}年加入</span>
                        <span class="left floated"><i class="user icon"></i>{{ $role }}</span>
                    </div>
                </div>
            </div>

            {{-- 用户信息右侧 --}}
            <div class="nine wide column">

                {{-- 在读 --}}
                <div class="library_working">
                    <h1 class="ui header dividing">在读</h1>
                    @if(count($reading)!=0)
                        <div class="ui feed">
                            @foreach($reading as $key => $book)
                                @if( $key!=0 )
                                <h4 class="ui horizontal header divider">
                                    <i class="star yellow icon"></i>
                                </h4>
                                @endif
                            <div class="event">
                                <div class="content">
                                    <div class="summary">
                                        借阅了
                                        <a href="{{ url('book', $book->id) }}" class="user"> {{ $book->name }} </a>
                                        <div class="date">{{ $book->pivot->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="extra images">
                                        <a><img src="{{url('assets/book', $book->cover)}}"></a>
                                    </div>
                                    <div class="meta">
                                        <span class="ui red label text">借阅 {{ count($book->user) }}</span>
                                        @if( $self )
                                        <a href="{{ url('book', [$book->id, 'back']) }}" class="ui green label">还书</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <h6 class="ui horizontal divider header"><a href="{{ url('user',[$user->id, 'reading']) }}">查看更多</a></h6>
                    @else
                        <p>暂无在读书籍</p>
                    @endif
                </div>

                {{-- 已读 --}}
                <div class="library_working">
                    <h1 class="ui header dividing">已读</h1>
                    @if(count($read)!=0)
                        <div class="ui feed">
                            @foreach($read as $book)
                                <div class="event">
                                    <div class="content">
                                        <div class="summary">
                                            借阅了
                                            <a href="{{ url('book', $book->id) }}" class="user"> {{ $book->name }} </a>
                                            <div class="date"></div>
                                        </div>
                                        <div class="extra images">
                                            <a><img src="{{url('assets/book', $book->cover)}}"></a>
                                        </div>
                                        <div class="meta">
                                            <span class="ui red label text">借阅 {{ count($book->user) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h6 class="ui horizontal divider header"><a href="{{ url('user',[$user->id, 'read']) }}">查看更多</a></h6>
                    @else
                        <p>暂无已读书籍</p>
                    @endif
                </div>

                {{-- 书评 --}}
                <div class="library_working">
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
                        @endforeach
                    </div>
                    <h6 class="ui horizontal divider header"><a href="{{ url('user',[$user->id, 'comment']) }}">查看更多</a></h6>
                    @else
                        <p>暂无书评</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection