@extends('backend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Sửa chương
                        </div>
                        <div class="col-md-6">
                        <a href="{{route('chapter.index')}}" class="btn btn-success pull-right">Danh sách chương</a>
                        </div>
                    </div>
                   
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                <div class="panel-body">
                    <form action="{{route('chapter.update')}}" method="post" class="form-horizontal">
                    @csrf
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <input type="hidden" name="id" value="{{$chapter->id}}" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Tiêu đề : <span class="text-danger">(*)</span></label>
                            <div class="col-md-4">
                                <input type="text" name="title" value="{{$chapter->title}}" class="form-control input-md" placeholder="Nhập tiêu đề">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Slug chương : <span class="text-danger">(*)</span></label>
                            <div class="col-md-4">
                                <input type="text" name="slug" value="{{$chapter->slug}}" class="form-control input-md" placeholder="Nhập slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Tóm tắt chương : <span class="text-danger">(*)</span></label>
                            <div class="col-md-4">
                                <input type="text" name="summary" value="{{$chapter->summary}}" class="form-control input-md" placeholder="Tóm tắt chương">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Nội dung chương : <span class="text-danger">(*)</span></label>
                            <div class="col-md-4">
                                <textarea name="content" id="content_chapter" class="form-control">{{$chapter->content}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Truyện : <span class="text-danger">(*)</span></label>
                            <div class="col-md-4">
                                <select name="story" id="" class="form-control ">
                                    @foreach($story as $story)
                                    <option value="{{$story->id}}">{{$story->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Trạng thái : <span class="text-danger">(*)</span></label>
                            <div class="col-md-4">
                                <select name="status" id="" class="form-control">
                                    <option value="0">Hoạt Động</option>
                                    <option value="1">Không Hoạt Động</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 "></label>
                            <div class="col-md-4">
                                <button class="btn btn-primary">Cập Nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection