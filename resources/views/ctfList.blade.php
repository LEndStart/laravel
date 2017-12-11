@extends('common.layout')
@section('content')
    <div class="container">
        <div class="jumbotron" opacity:0.0;>

            <marquee width="157" height="21" style="text-align:center;">实时更新</marquee>

            <h1 class="title3" style="text-align:center;">排行榜</h1>
            <h2 style="text-align:center;">大家好啊</h2>
        </div>
        <div>
            <h2>个人排行榜</h2>
            <table border="0" width="85%" cellspacing="0" cellpadding="2">
                <tbody id="list">
                <tr id="row1">
                    <th width="60">排名</th>
                    <th width="150">ID</th>
                    <th width="150">Name</th>
                    <th width="200">分数</th>
                    <th>最后一次变动</th>
                </tr>
                @foreach($users as $user)
                    <tr id="user-{{$user->id}}">
                        <th>{{$rank++}}</th>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->score}}</th>
                        <th>{{$user->updated_at}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
