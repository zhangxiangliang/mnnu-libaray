<div class="ui vertical sidebar menu left">
    <div class="ui accordion link item">
    <a href="{{ url('/') }}" class="title item">主页</a>
    </div>
    <div class="ui accordion link item">
        <a href="{{ url('book') }}" class="title item">图书</a>
    </div>
    <div class="ui accordion link item">
        <a href="{{ url('user') }}" class="title item">书友</a>
    </div>

    @if(\Auth::check())
        <div class="ui accordion link item">
            <div class="title">
                {{ \Auth::user()->name }}
                <i class="dropdown icon"></i>
            </div>
            <div class="content">
                @role('admin|teacher')
                <a href="{{ url('back')  }}" class="item">后台管理</a>
                @endrole
                <a href="{{ url('user',\Auth::user()->id)  }}" class="item">用户信息</a>
                <a href="{{ url('user/info')  }}" class="item">资料修改</a>
                <a href="{{ url('user',[\Auth::user()->id, 'reading'])  }}" class="item">还书中心</a>
                <a href="{{ url('user/avatar')  }}" class="item">头像修改</a>
            </div>
        </div>
        <div class="ui accordion link item">
            <a href="{{ url('auth/logout') }}" class="title item">登出</a>
        </div>
    @else
        <div class="ui accordion link item">
            <a href="{{ url('auth/login') }}" class="title item">登陆</a>
        </div>
        <div class="ui accordion link item">
            <a href="{{ url('auth/register') }}" class="title item">注册</a>
        </div>
    @endif
</div>