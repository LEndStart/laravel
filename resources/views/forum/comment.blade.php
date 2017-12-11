@extends('common.layout')
@section('style')
    <link href="{{asset('css/forum/comment.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="jumbotron" >
        <h1 align="center" style="font-family:SansSerif">发帖发帖</h1>
        <h3 align="right">---一起交流，一起成长</h3>
    </div>
    <form class="form-horizontal" role="form" method="post" action="{{url('forum/save',['type'=>$type])}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <div >
                <input class="form-control" name="forum_comment[title]" id="box" placeholder="请输入标题">
            </div>
            <div >
                <textarea id="textbox" class="form-control" name="forum_comment[content]" rows="30" placeholder="请输入正文"></textarea>
            </div>
            <div >
                <button style="width: 100px;height: 50px;border: 2px black solid;position: absolute;left: 1180px;top: 950px;" id="submit_btn" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop