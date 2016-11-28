@extends('base.index')

@section('title')
    用户
@endsection

@section('user')
    active
@endsection

@section('nav')
    @include('base.nav')
@endsection

@section('sidebar')
    @include('base.sidebar')
@endsection

@section('css')
    <style>
        #library_nav{
            background-image: url({{ url('assets/images/user.jpg') }});
            background-size: 100% 100%;
        }
    </style>
@endsection

@section('content')
    <div class="ui vertical center aligned segment">
        <div class="ui text container">
            <div class="ui stackable grid">
                @foreach( $users as $user)
                    <div class="silence_person four wide column">
                        @if($user->avatar)
                            <img class="ui medium centered circular image" src="{{ url('assets/avatar/',$user->avatar) }}">
                        @else
                            <img class="ui medium centered circular image" src="{{ url('assets/avatar/1.jpg') }}">
                        @endif
                        <h4><a href="{{ url('user',$user->id) }}">{{ $user->name }}</a></h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="ui vertical segment middle aligned center aligned">
        <div class="ui text container">
            <div id="page" class="">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/typetype.min.js') }}"></script>
    <script>
        function addOnload(fun){
            if(typeof window.onload == "function"){
                window.onload = function() {
                    window.onload;
                    fun();
                }
            }else{
                window.onload = fun;
            }
        }
        function changHeight(){
            var img = document.getElementsByTagName('img');
            for(i=0; i<img.length; i++){
                width = img[i].innerHeight();
                console.log(img[i].style);
                img[i].style.minHeight = width;
            }
        }
        addOnload(changHeight);
        $(function() {
            $('#change').focus()
                    .delay(1000)
                    .backspace(9)
                    .typetype("寻找你的伙伴", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection