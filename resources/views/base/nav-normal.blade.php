{{-- 普通页面的导航 --}}
<div id="library_nav_menu">
    <div class="ui borderless main menu">
        <div class="ui text container">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="header item">
                闽南师范大学图书馆
            </div>
            <div class="library_nav_menu_hidden item">
                <a href="{{ url('/')  }}" class="@yield('index') item">主页</a>
                <a href="{{ url('book')  }}" class="@yield('book') item">图书</a>
                <a href="{{ url('user') }}" class="@yield('user') item">书友</a>
                <a href="{{ url('category') }}" class="@yield('category') item">分类</a>
            </div>
            <div class="right item library_nav_menu_hidden">
                @if(\Auth::check())
                    <div class="ui pointing dropdown link item" tabindex="0">
                        <span class="text">{{ \Auth::user()->name }}</span>
                        <i class="dropdown icon"></i>
                        <div class="menu transition hidden" tabindex="-1">
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
</div>
