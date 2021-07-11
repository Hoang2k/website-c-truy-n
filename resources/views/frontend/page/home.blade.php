@extends('frontend.master')
@section('content')
<style>
.name-story{color:black;}
</style>

    <h3>Truyện mới nhất</h3>


    <div class="album  bg-light">
      <div class="container" >
        <a href="" class="btn " style="color:#fff">Xem tất cả</a>
        <div class="row">
        @foreach($product as $pro)
        <a href="{{route('read.stories',['slug'=>$pro->slug_story])}}">
          <div class="col-md-2" style="padding-right:0">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/{{$pro->images}}" data-holder-rendered="true">
              <div class="card-body">
            <h5 class="name-story">  <strong>{{$pro->name}}</strong></h5>
               
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{route('read.stories',['slug'=>$pro->slug_story])}}" class="btn btn-sm btn-outline-secondary" style="border:1px solid red">Đọc ngay</a>
                    <a href="" class="btn btn-sm btn-outline-secondary" style="border:1px solid red"> <i class="fas fa-eye">199</i></a>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          </a>
         @endforeach
          
         
        </div>

      </div>
    </div>




    <h3>Truyện được xem nhiều</h3>

    <div class="album py-5 bg-light">
      <div class="container" style="background-color: black;">
        <a href="" style="padding-right:0;">Xem tất cả</a>
        <div class="row">
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
        </div>

      </div>
    </div>

    <h3>Blog</h3>

    <div class="album py-5 bg-light">
      <div class="container" style="background-color: black;">
        <a href="" style="padding-right:0;">Xem tất cả</a>
        <div class="row">
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
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
        </div>

      </div>
    </div>

    @endsection