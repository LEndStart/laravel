@extends('common.layout')
@section('style')
    <link href="{{asset('css/fopenwp/skeleton.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery3.0.0.js')}}"></script>
    <script src="{{asset('js/markdown-it.min.js')}}"></script>
    <script>
        window.searchMap = location.search.substr(1).split('&').reduce(function(r, it) {
            var them = it.split('='); r[them[0]] = them[1];
            document.write(them);
            return r;
        }, {});
        $.ajaxSetup({async: false});
    </script>
@stop

@section('content')

    <div class="container">

        <div class="jumbotron" >
            <p>Write Up</p>
        </div>

        <div class="markdown-html"><!--这里上传md文件-->

            <script>
                var name='/WriteUpFile/'+'<?php echo $name;?>';
                $.get((searchMap.md || name), function(text) { document.write(markdownit().render(text)); });
            </script>
        </div>
    </div>
@stop

@section('javascript')

@stop


