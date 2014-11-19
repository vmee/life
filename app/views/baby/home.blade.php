@extends('_layouts.default')

@section('main')

<div class="col-md-8">

    <div class="row">
        <div class="col-md-2">{{\Baby::getUserBaby(Session::get('user_baby_id'))->name}}</div>

            <div class="btn btn-default">发表文字</div>
            <div class="btn btn-default">上传照片</div>
            <div class="btn btn-default">上传影像</div>
    </div>

</div>

<div class="col-md-3">
    <div class="sidebar-module">
        <ol class="list-unstyled">
            <li><a href="{{ URL::route('baby.setting')}}">信息设置</a></li>
            <li><a href="#">文章1篇</a></li>
            <li><a href="#">图片10张</a></li>
            <li><a href="#">影像1个</a></li>

        </ol>
    </div>
</div>

@stop