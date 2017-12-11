@extends ('common.layout')
@section('style')
    <link href="{{asset('css/forum/view.css')}}" rel="stylesheet">
@stop

@section('content')
    <div class="col-md-10">

        <div class="container">

            <div class="jumbotron" >
                <h1 align="center" style="font-family:SansSerif">看帖学习</h1>
                <h3 align="right">---一起交流，一起成长</h3>
            </div>
        </div>
    </div>
    <div class="box" id="title_box">
        <ul>
            @foreach($forums as $forum)
                <li><a href="{{url('forum/content',['title'=>$forum->title])}}">{{$forum->title}}</a></li>
            @endforeach
        </ul>
        <div>
            {{$forums->render()}}
        </div>
    </div>
@stop


