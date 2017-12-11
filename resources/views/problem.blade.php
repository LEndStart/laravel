@extends('common.layout')
@section('style')
    <link href="{{asset('css/problem.css')}}" rel="stylesheet">
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">

    @if(count($pwns)>16)
        <style type="text/css">
            .box1{
                height: {{640+(int)((count($pwns)-13)/4) *140}}px;
            }
        </style>
    @endif
    @if(count($reverses)>16)
        <style type="text/css">
            .box2{
                height: {{640+(int)((count($reverses)-13)/4) *140}}px;
            }
        </style>
    @endif
    @if(count($webs)>16)
        <style type="text/css">
            .box3{
                height: {{640+(int)((count($webs)-13)/4) *140}}px;
            }
        </style>
    @endif
    @if(count($miscs)>16)
        <style type="text/css">
            .box4{
                height: {{640+(int)((count($miscs)-13)/4) *140}}px;
            }
        </style>
    @endif
    @if(count($cryptos)>16)
        <style type="text/css">
            .box5{
                height: {{640+(int)((count($cryptos)-13)/4) *140}}px;
            }
        </style>
    @endif
    @if(count($androids)>16)
        <style type="text/css">
            .box6{
                height: {{640+(int)((count($androids)-13)/4) *140}}px;
            }
        </style>
    @endif

@stop

@section('content')
    <div class="container">

        <div class="jumbotron" >
            <p style="text-align:center;">欢迎来到ctf的题库</p>
            <p style="text-align:center;">hello world</p>
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
                        <a data-toggle="modal" href="#pwn{{$loop->iteration}}">
                            <div class="pwnbox">
                                <h4>{{$pwn->name}}</h4>
                                <p>{{$pwn->value}}</p>
                            </div>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="pwn{{$loop->iteration}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form class="form-horizontal" method="POST" action="{{ url('problem/flag/'.$pwn->id) }}">
                                        {{ csrf_field() }}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title">{{$pwn->name}}</h3>
                                            <p>分值：{{$pwn->value}}</p>
                                            <p>通过人数：{{$pwn->accept_num}}</p>
                                        </div>

                                        <div class="modal-body">

                                            <p>{{$pwn->description}}</p>
                                            <a href="{{ url('ProFile/'.$pwn->file_name)}}">文件链接</a>
                                            <p>hint</p>
                                            <div class="form-group">
                                                <label for="flag">提交flag</label>
                                                <input type="text" class="form-control" id="flag" placeholder="请输入flag" name="flag">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" id="submit" >提交</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="section-2" class="box2">
                    <h2>reverse</h2>
                    @foreach($reverses as $reverse)
                        <a data-toggle="modal" href="#reverse{{$loop->iteration}}">
                            <div class="reversebox">
                                <h4>{{$reverse->name}}</h4>
                                <p>{{$reverse->value}}</p>
                            </div>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="reverse{{$loop->iteration}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form class="form-horizontal" method="POST" action="{{ url('problem/flag/'.$reverse->id) }}">
                                        {{ csrf_field() }}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title">{{$reverse->file_name}}</h3>
                                            <p>分值：{{$reverse->value}}</p>
                                            <p>通过人数：{{$reverse->accept_num}}</p>
                                        </div>

                                        <div class="modal-body">

                                            <p>{{$reverse->description}}</p>
                                            <a href="{{url('ProFile/'.$reverse->name)}}">文件链接</a>
                                            <p>hint</p>
                                            <div class="form-group">
                                                <label for="flag">提交flag</label>
                                                <input type="text" class="form-control" id="flag" placeholder="请输入flag" name="flag">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" id="submit" >提交</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div id="section-3" class="box3">
                    <h2>web</h2>
                    @foreach($webs as $web)
                        <a data-toggle="modal" href="#web{{$loop->iteration}}">
                            <div class="webbox">
                                <h4>{{$web->name}}</h4>
                                <p>{{$web->value}}</p>
                            </div>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="web{{$loop->iteration}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form class="form-horizontal" method="POST" action="{{ url('problem/flag/'.$web->id) }}">
                                        {{ csrf_field() }}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title">{{$web->name}}</h3>
                                            <p>分值：{{$web->value}}</p>
                                            <p>通过人数：{{$web->accept_num}}</p>
                                        </div>

                                        <div class="modal-body">

                                            <p>{{$web->description}}</p>
                                            <a href="{{url('ProFile/'.$web->file_name)}}">文件链接</a>
                                            <p>hint</p>
                                            <div class="form-group">
                                                <label for="flag">提交flag</label>
                                                <input type="text" class="form-control" id="flag" placeholder="请输入flag" name="flag">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" id="submit" >提交</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="section-4" class="box4">
                    <h2>misc</h2>
                    @foreach($miscs as $misc)
                        <a data-toggle="modal" href="#misc{{$loop->iteration}}">
                            <div class="miscbox">
                                <h4>{{$misc->name}}</h4>
                                <p>{{$misc->value}}</p>
                            </div>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="misc{{$loop->iteration}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form class="form-horizontal" method="POST" action="{{ url('problem/flag/'.$misc->id) }}">
                                        {{ csrf_field() }}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title">{{$misc->name}}</h3>
                                            <p>分值：{{$misc->value}}</p>
                                            <p>通过人数：{{$misc->accept_num}}</p>
                                        </div>

                                        <div class="modal-body">

                                            <p>{{$misc->description}}</p>
                                            <a href="{{url('ProFile/'.$misc->file_name)}}">文件链接</a>
                                            <p>hint</p>
                                            <div class="form-group">
                                                <label for="flag">提交flag</label>
                                                <input type="text" class="form-control" id="flag" placeholder="请输入flag" name="flag">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" id="submit" >提交</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="section-5" class="box5">
                    <h2>crypto</h2>
                    @foreach($cryptos as $crypto)
                        <a data-toggle="modal" href="#crypto{{$loop->iteration}}">
                            <div class="cryptobox">
                                <h4>{{$crypto->name}}</h4>
                                <p>{{$crypto->value}}</p>
                            </div>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="crypto{{$loop->iteration}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form class="form-horizontal" method="POST" action="{{ url('problem/flag/'.$crypto->id) }}">
                                        {{ csrf_field() }}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title">{{$crypto->file_name}}</h3>
                                            <p>分值：{{$crypto->value}}</p>
                                            <p>通过人数：{{$crypto->accept_num}}</p>
                                        </div>

                                        <div class="modal-body">

                                            <p>{{$crypto->description}}</p>
                                            <a href="{{url('ProFile/'.$crypto->name)}}">文件链接</a>
                                            <p>hint</p>
                                            <div class="form-group">
                                                <label for="flag">提交flag</label>
                                                <input type="text" class="form-control" id="flag" placeholder="请输入flag" name="flag">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" id="submit" >提交</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="section-6" class="box6">
                    <h2>android</h2>
                    @foreach($androids as $android)
                        <a data-toggle="modal" href="#android{{$loop->iteration}}">
                            <div class="androidbox">
                                <h4>{{$android->name}}</h4>
                                <p>{{$android->value}}</p>
                            </div>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="android{{$loop->iteration}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form class="form-horizontal" method="POST" action="{{ url('problem/flag/'.$android->id) }}">
                                        {{ csrf_field() }}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title">{{$android->file_name}}</h3>
                                            <p>分值：{{$android->value}}</p>
                                            <p>通过人数：{{$android->accept_num}}</p>
                                        </div>

                                        <div class="modal-body">

                                            <p>{{$android->description}}</p>
                                            <a href="{{url('ProFile/'.$android->name)}}">文件链接</a>
                                            <p>hint</p>
                                            <div class="form-group">
                                                <label for="flag">提交flag</label>
                                                <input type="text" class="form-control" id="flag" placeholder="请输入flag" name="flag">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" id="submit" >提交</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if (session('isflag'))
                    <script>
                        alert ('{{Session::get('isflag')}}');
                        {{session_unset('isflag')}}
                    </script>
                @else
                @endif



            </div>
        </div>

    </div>
@stop

