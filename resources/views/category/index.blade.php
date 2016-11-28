@extends('base.index')

@section('title')
    分类
@endsection

@section('category')
    active
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('nav')
    @include('base.nav')
@endsection

@section('css')
    <style>
        #library_nav {
            background-image: url({{ url('assets/images/category.jpg') }});
            background-size: 100% 100%;
        }
        .category .ui.segment {
            font-size: 40px;
        }
        .category a {
            margin: 20px 0;
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="ui vertical center aligned segment">
        <div class="ui text container category">
            @foreach ($categorys as $category)
                @if(count($category->book) > 0)
                <a href="{{url('category',[$category->id])}}">
                    <div class="ui {{$category->color}} inverted segment">{{$category->name}}</div>
                </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/typetype.min.js') }}"></script>
    <script>
        $(function() {
            $('#change').focus()
                    .delay(1000)
                    .backspace(9)
                    .typetype("找到你心仪的书籍", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection
