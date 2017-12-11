@extends('common.layout')
@section('style')
    <link href="{{asset('css/passage.css')}}" rel="stylesheet">

@stop

@section('content')
    <div class="col-md-11">
        <div id="nav2"><!--id="自定义的名称" 唯一的(身份证号) 命名的规范(见名知意:用有语义的英文单词)-->
            <ul>
                <a href={{url('wp')}}>
                    <li class="one"><img src={{url('image/1.png')}} width="160" height="160"></li>
                </a>

                <a href={{url('forum')}}>
                    <li class="two"><img src={{url('image/2.png')}} width="160" height="160"></li>
                </a>
            </ul>
        </div>
    </div>
@stop