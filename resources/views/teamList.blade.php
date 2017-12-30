@extends('common.layout')
@section('content')
    <div class="container">
        <div class="jumbotron" opacity:0.0;>

            <h1 class="title3" style="text-align:center;">队伍排行榜</h1>

        </div>
        <div>
            <h2>队伍排行榜</h2>
            <table border="0" width="85%" cellspacing="0" cellpadding="2">
                <tbody id="list">
                <tr id="row1">
                    <th width="60">排名</th>
                    <th width="150">队伍ID</th>
                    <th width="150">队伍名</th>
                    <th width="200">分数</th>

                </tr>
                @foreach($results as $team)
                    <tr>

                        <th>{{$rank++}}</th>
                        <th>{{$team['id']}}</th>
                        <th>{{$team['name']}}</th>
                        <th>{{$team['score']}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop