{{-- 导航 --}}
<div id="library_nav" class="ui inverted vertical masthead center aligned segment">

    {{-- 导航菜单 --}}
    <div id="" class="ui container">
        <div class="ui large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="ui left item">
            <div class="ui pointing dropdown link item">
                <span class="text">图书管理</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    @role('admin')
                    <a class="item" href="{{ url('back/book/create') }}">图书创建</a>
                    @endrole
                    <a class="item" href="{{ url('back/book') }}">图书列表</a>
                </div>
            </div>
            <div class="ui pointing dropdown link item">
                <span class="text">分类管理</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    @role('admin')
                        <a class="item" href="{{ url('back/category/create') }}">创建分类</a>
                    @endrole
                    <a class="item" href="{{ url('back/category') }}">分类列表</a>
                </div>
            </div>
            <div class="ui pointing dropdown link item">
                <span class="text">用户管理</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{ url('back/user') }}">学生列表</a>
                    <a class="item" href="{{ url('back/teacher') }}">老师列表</a>
                    @role('admin')
                    <a class="item" href="{{ url('back/admin') }}">管理员列表</a>
                    @endrole
                </div>
            </div>
            <div class="ui pointing dropdown link item">
                <span class="text">评论管理</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{ url('back/comment') }}">评论列表</a>
                    <a class="item" href="{{ url('back/forbin') }}">禁言列表</a>
                </div>
            </div>
            <a href="{{ url('/')  }}" class="item">返回主页</a>
            </div>
            <div class="ui right item">
                @if(\Auth::check())
                    <div class="ui pointing dropdown link item">
                        <span class="text">{{ \Auth::user()->name }}</span>
                        <i class="dropdown icon"></i>
                        <div class="menu transition hidden">
                            <a href="{{ url('back')  }}" class="item">后台管理</a>
                            <a href="{{ url('user',\Auth::user()->id)  }}" class="item">用户信息</a>
                            <a href="{{ url('user',[\Auth::user()->id, 'reading'])  }}" class="item">还书中心</a>
                            <a href="{{ url('user/info')  }}" class="item">资料修改</a>
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
        <h3>{{$database->usernumber}}个用户 {{$database->booknumber}}本藏书</h3>
        <a href="{{ url('back/info') }}" class="ui huge inverted button">更新数据</a>
    </div>

</div>
