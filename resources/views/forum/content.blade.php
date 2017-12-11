@extends('common.layout')
@section('style')
    <link href="{{asset('css/forum/view.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="jumbotron" >
        <h1 align="center" style="font-family:SansSerif">{{$forum[0]->title}}</h1>
        <h3 align="right">题型：{{$forum[0]->type}}</h3>
        <h3 align="right">作者ID：{{$forum[0]->uperid}}</h3>
    </div>

    <textarea class="content" readonly="readonly" autofocus="autofocus" >{{$forum[0]->content}}&nbsp</textarea>
@stop