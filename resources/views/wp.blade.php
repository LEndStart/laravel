@extends('common.layout')
@section('style')
    <link href="{{asset('css/problem.css')}}" rel="stylesheet">
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
@stop

@section('content')
    <div class="container">

        <div class="jumbotron" >
            <h2 style="text-align:center">Write Up</h2>
        </div>

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="=true">&times;</span>
            </button>
            <strong>成功！</strong>{{Session::get('success')}}
        </div>
        @endif



        <div class="search fr">
            <form class="form-horizontal" method="get" >
                <input type="text" id="123" name="searchWords" placeholder="请输入题目ID" >
                <button onclick="judge(searchWords)">搜索</button>

            </form>
        </div>


        <div class="row">



            <div class="col-xs-2" id="myScrollspy">


                <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="125">
                    <li class="active"><a href="#section-1">pwn</a></li>
                    <li><a href="#section-2">reverse</a></li>
                    <li><a href="#section-3">web</a></li>
                    <li><a href="#section-4">misc</a></li>
                    <li><a href="#section-5">crypto</a></li>
                    <li><a href="#section-6">android</a></li>
                </ul>
            </div>




            <div class="col-xs-10">

                <div id="section-1" class="box1">
                    <h2>pwn</h2>

                    @foreach($pwns as $pwn)
                        <form class="form-horizontal" method="POST" action="{{ url('fopenwp') }}">
                            {{ csrf_field() }}
                            <p data-toggle="modal">
                                <div style="text-align:left">
                                    <span>{{$pwn->wpname}}</span>
                                    <input type="hidden" class="form-control" id="name" value={{$pwn->wpname}} name="data[wpname]">
                                    <button type="submit" class="btn btn-default" id="submit" >查看</button>
                                    <br>
                                </div>
                            </p>
                        </form>
                    @endforeach

                    <div class="pull-right" style="position: absolute;right:50px;top:550px">
                        {{$pwns->render()}}
                    </div>
                </div>

                <hr>
                <div id="section-2" class="box2">


                    <h2>reverse</h2>



                </div>
                <hr>
                <div id="section-3" class="box3">


                    <h2>web</h2>



                </div>
                <hr>

                <div id="section-4" class="box4">


                    <h2>misc</h2>



                </div>
                <hr>

                <div id="section-5" class="box5">


                    <h2>crypto</h2>



                </div>

                <div id="section-6" class="box6">


                    <h2>android</h2>



                </div>



            </div>
        </div>

    </div>
@stop

@section('javascript')
    <script>



    </script>
@stop