@extends('frontend.master')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
    <li class="breadcrumb-item"><a href="#">{{$name_category}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @php
            $count= count($story);

            @endphp
            @if($count==0)
            <div class="col-md-3">
                <p>Truyện đang cập nhật ...</p>
                @else
                @foreach($story as $stories)
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/{{$stories->images}}" data-holder-rendered="true">
                        <div class="card-body">
                            <h5>{{$stories->name}}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye">199</i></a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                   
                </div>
                @endforeach
                    @endif
            </div>
        </div>
        @endsection