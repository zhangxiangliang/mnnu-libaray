{{-- 导航 --}}
<div id="library_nav" class="ui inverted vertical masthead center aligned segment">

    {{-- 导航菜单 --}}
    <div id="library_nav_menu" class="ui container">
        <div class="ui large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="item">
                <a href="{{ url('/') }}" class="@yield('index') item">主页</a>
                <a href="{{ url('book') }}" class="@yield('book') item">图书</a>
                <a href="{{ url('user') }}" class="@yield('user') item">书友</a>
            </div>
            <div href="" class="right item inline">
                @if(\Auth::check())
                    <div class="ui pointing dropdown link item">
                        <span class="text">{{ \Auth::user()->name }}</span>
                        <i class="dropdown icon"></i>
                        <div class="menu transition hidden">
                            @role('admin|teacher')
                            <a href="{{ url('back')  }}" class="item">后台管理</a>
                            @endrole
                            <a href="{{ url('user',\Auth::user()->id)  }}" class="item">用户信息</a>
                            <a href="{{ url('user/info')  }}" class="item">资料修改</a>
                            <a href="{{ url('user',[\Auth::user()->id, 'reading'])  }}" class="item">还书中心</a>
                            <a href="{{ url('user/avatar')  }}" class="item">头像修改</a>
                        </div>
                    </div>
                    <a href="{{ url('auth/logout') }}" class="item">登出</a>
                @else
                    <a href="{{ url('auth/login') }}" class="@yield('login') item">登陆</a>
                    <a href="{{ url('auth/register') }}" class="@yield('register') item">注册</a>
                @endif
            </div>
        </div>
    </div>

    {{-- 导航内容 --}}
    <div id="library_nav_content"class="ui text container">

        {{-- 网站名 --}}
        <h1 class="ui inverted header">
            闽南师范大学图书馆
        </h1>

        {{-- typetype 效果 --}}
        <h2 id="change">&nbsp;欢迎访问</h2>

        {{-- 搜索框 --}}
        {!! Form::open(['url' => '/search', 'method' => 'POST']) !!}
        <div class="ui action input">
            {!! Form::text('content', null, ['placeholder' => '输入搜索内容...']) !!}
            {!! Form::submit('创建',['id' => 'library_search_button', 'class' => 'ui teal submit  button', 'style' => '
    display: none;']) !!}
            <a id="library_search" class="ui inverted button" >搜索</a>
        </div>
        {!! Form::close() !!}

    </div>

</div>
