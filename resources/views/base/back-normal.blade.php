{{-- 普通页面的导航 --}}
<div id="library_nav_menu">
    <div class="ui borderless main menu">
        <div class="ui  container">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="header item">
                <a href="{{ url('back') }}">图书馆后台管理</a>
            </div>
            <div class="library_nav_menu_hidden item">
                <div class="ui pointing @yield('book') dropdown link item">
                    <span class="text">图书管理</span>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        @role('admin')
                        <a class="item" href="{{ url('back/book/create') }}">图书创建</a>
                        @endrole
                        <a class="item" href="{{ url('back/book') }}">图书列表</a>
                    </div>
                </div>
                <div class="ui pointing @yield('user') dropdown link item">
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
                <div class="ui pointing @yield('comment') dropdown link item">
                    <span class="text">评论管理</span>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ url('back/comment') }}">评论列表</a>
                        <a class="item" href="{{ url('back/forbin') }}">禁言列表</a>
                    </div>
                </div>
                <a href="{{ url('/')  }}" class="item">返回主页</a>
            </div>
            <div class="right item library_nav_menu_hidden">
                <div class="ui pointing dropdown link item" tabindex="0">
                    <span class="text">{{ \Auth::user()->name }}</span>
                    <i class="dropdown icon"></i>
                    <div class="menu transition hidden" tabindex="-1">
                        <a href="{{ url('back')  }}" class="item">后台管理</a>
                        <a href="{{ url('user',\Auth::user()->id)  }}" class="item">用户信息</a>
                        <a href="{{ url('user',[\Auth::user()->id, 'reading'])  }}" class="item">还书中心</a>
                        <a href="{{ url('user/info')  }}" class="item">资料修改</a>
                        <a href="{{ url('user/avatar')  }}" class="item">头像修改</a>
                    </div>
                </div>
                <a href="{{ url('auth/logout') }}" class="item">登出</a>
            </div>
        </div>
    </div>
</div>