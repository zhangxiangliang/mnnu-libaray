<!doctype html>
<html lang="zh-hans">
<head>
    {{-- 引用 header --}}
    @include('base.header')

    {{-- 设置页面名 --}}
    <title>闽南师范大学图书馆 - @yield('title')</title>

    {{-- 自定义 CSS --}}
    @yield('css')

</head>
<body class="pushable">
{{-- 响应式侧边栏 --}}
@yield('sidebar')

{{-- 响应式内容栏 --}}
<div class="pusher">
    {{-- 响应式导航栏 --}}
    @yield('nav')

    {{-- 内容块 --}}
    @yield('content')

    {{-- 引用页脚内容 --}}
    @include('base.footer')
</div>

{{-- 引用基础JavaScript --}}
@include('base.js')

{{-- 自定义 JavaScript --}}
@yield('js')
</body>
</html>