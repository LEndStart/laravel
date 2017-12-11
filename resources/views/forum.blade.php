@extends('common.layout')

@section('style')
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/forum/forum.css')}}" rel="stylesheet">
@stop

@section('content')
    <div class="jumbotron" >
        <h1 align="center" style="font-family:SansSerif">交流心得</h1>
        <h3 align="right">---一起交流，一起成长</h3>
    </div>
    <div id="pwn" class="btn-group" >
        <button  class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                 type="button" style="width: 200px;height: 150px;font-size: xx-large;">Pwn区<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li ><a href="{{url('forum/view',['type'=>'pwn'])}}">我要观摩</a></li>
            <li ><a href="{{url('forum/comment',['type'=>'pwn'])}}">我要发帖</a></li>
        </ul>
    </div>
    <div id="web" class="btn-group" >
        <button  class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                 type="button" style="width: 200px;height: 150px;font-size: xx-large;">Web区<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li ><a href="{{url('forum/view',['type'=>'web'])}}">我要观摩</a></li>
            <li ><a href="{{url('forum/comment',['type'=>'web'])}}">我要发帖</a></li>
        </ul>
    </div>
    <div id="reverse" class="btn-group" >
        <button  class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                 type="button" style="width: 200px;height: 150px;font-size: xx-large;">Reverse区<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li ><a href="{{url('forum/view',['type'=>'reverse'])}}">我要观摩</a></li>
            <li ><a href="{{url('forum/comment',['type'=>'reverse'])}}">我要发帖</a></li>
        </ul>
    </div>
    <div id="crypto" class="btn-group" >
        <button  class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                 type="button" style="width: 200px;height: 150px;font-size: xx-large;">Crypto区<span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li ><a href="{{url('forum/view',['type'=>'crypto'])}}">我要观摩</a></li>
            <li ><a href="{{url('forum/comment',['type'=>'crypto'])}}">我要发帖</a></li>
        </ul>
    </div>
@stop





