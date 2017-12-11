@extends('layouts.app')

@section('content')

    <h2 style="text-align:center;">HeHe Admin</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>


            <div class="col-md-8">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="=true">&times;</span>
                        </button>
                        <strong>成功！</strong>{{Session::get('success')}}
                    </div>
                @endif
                <h3 style="text-align:center;">提交题目</h3>
                <form  class="form-horizontal" role="form" method="post" action="{{url('admin/save')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!--
                    <div class="form-group">
                        <label for="id">题目ID：</label>
                        <input type="text" name="challenge[id]" class="form-control" id="id" placeholder="请输入题目ID">
                    </div>
                    -->

                    <div class="form-group">
                        <label for="type">题目类型：</label>
                        <select class="form-control" name="challenge[type]" id="type">
                            <option>pwn</option>
                            <option>reverse</option>
                            <option>misc</option>
                            <option>web</option>
                            <option>crypto</option>
                            <option>Android</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">题目名称：</label>
                        <input type="text" class="form-control" name="challenge[name]" id="name" placeholder="请输入题目名称">
                    </div>


                    <div class="form-group">
                        <label for="value">题目分值：</label>
                        <input type="text" class="form-control" name="challenge[value]" id="value" placeholder="请输入题目分值">
                    </div>


                    <div class="form-group">
                            <label for="description">题目描述：</label>
                            <textarea class="form-control" rows="5" name="challenge[description]" id="description"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="file_name">文件名：</label>
                        <input type="text" class="form-control" name="challenge[file_name]" id="file_name" placeholder="请输入文件名">
                    </div>

                    <div class="form-group">
                        <label for="flag">flag：</label>
                        <input type="text" class="form-control" name="challenge[flag]" id="flag" placeholder="请输入flag">
                    </div>


                    <div class="form-group">
                        <label class="sr-only" for="userfile">文件输入(注意文件名必须相同)</label>
                        <input type="file" id="userfile" class="form-control" name="challenge_file_source" required>
                    </div>

                    <button type="submit" class="btn btn-default" id="submit">提交</button>
                </form>


                <h3 style="text-align:center;">提交题解</h3>
                <form role="form" method="post" action="{{url('admin/save2')}}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="proid">题目ID：</label>
                        <input type="text" class="form-control" name="wp[proid]" id="proid" placeholder="请输入题目ID">
                    </div>

                    <div class="form-group">
                        <label for="wptype">题目类型：</label>
                        <select class="form-control" id="wptype" name="wp[type]" >
                            <option>pwn</option>
                            <option>reverse</option>
                            <option>misc</option>
                            <option>web</option>
                            <option>crypto</option>
                            <option>Android</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="document">文件名称：</label>
                        <input type="text" class="form-control" name="wp[file_name]" id="document" placeholder="请输入题解名称">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="wpfile">文件输入(注意文件名必须相同)</label>
                        <input type="file" id="wpfile" class="form-control" name="source">
                    </div>

                    <button type="submit" class="btn btn-default" id="submitwp">提交</button>
                </form>
            </div>
        </div>
    </div>
@stop