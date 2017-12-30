@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>


        <div class="col-md-8">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="=true">&times;</span>
                    </button>
                    <strong>加入队伍成功！</strong>{{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="=true">&times;</span>
                    </button>
                    <strong>加入队伍失败！</strong>{{Session::get('fail')}}
                </div>
            @endif
            <h3 style="text-align:center;">加入队伍</h3>
            <form  class="form-horizontal" role="form" method="post" action="{{url('jointeam')}}" enctype="multipart/form-data">
                {{ csrf_field() }}



                <div class="form-group">
                    <label for="name">队伍邀请码：</label>
                    <input type="text" class="form-control" name="team[name]" id="name" placeholder="请输入队伍邀请码" >
                </div>

                <button type="submit" class="btn btn-default" id="submitteam">提交</button>
                <button class="btn btn-default" ><a href="{{ asset('problem')}}">返回题库</a></button>

            </form>
        </div>

        <div class="col-md-2"></div>
    </div>
@stop