<div class="ui vertical sidebar menu left">
    <div class="ui accordion link item">
        <div class="title">
            图书管理
            <i class="dropdown icon"></i>
        </div>
        <div class="content">
            @role('admin')
            <a class="item" href="{{ url('back/book/create') }}">图书创建</a>
            @endrole
            <a class="item" href="{{ url('back/book') }}">图书列表</a>
        </div>
    </div>
    <div class="ui accordion link item">
        <div class="title">
            用户管理
            <i class="dropdown icon"></i>
        </div>
        <div class="content">
            <a class="item" href="{{ url('back/user') }}">学生列表</a>
            <a class="item" href="{{ url('back/teacher') }}">老师列表</a>
            @role('admin')
            <a class="item" href="{{ url('back/admin') }}">管理员列表</a>
            @endrole
        </div>
    </div>
    <div class="ui accordion link item">
        <div class="title">
            评论管理
            <i class="dropdown icon"></i>
        </div>
        <div class="content">
            <a class="item" href="{{ url('back/comment') }}">评论列表</a>
            <a class="item" href="{{ url('back/forbin') }}">禁言列表</a>
        </div>
    </div>
    <div class="ui accordion link item">
        <div class="title">
            {{ \Auth::user()->name }}
            <i class="dropdown icon"></i>
        </div>
        <div class="content">
            <a href="{{ url('/')  }}" class="item">返回主页</a>
            <a href="{{ url('back')  }}" class="item">后台管理</a>
            <a href="{{ url('user',\Auth::user()->id)  }}" class="item">用户信息</a>
            <a href="{{ url('user',[\Auth::user()->id, 'reading'])  }}" class="item">还书中心</a>
            <a href="{{ url('user/info')  }}" class="item">资料修改</a>
            <a href="{{ url('user/avatar')  }}" class="item">头像修改</a>
        </div>
    </div>
</div>