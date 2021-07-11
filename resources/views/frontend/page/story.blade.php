@extends('frontend.master')
@section('content')

<style>
  .col-md-9-ul {
    list-style: none;
  }

  .list-chapter {
    list-style: none;
    padding-left: 20px;
    ;
  }
</style>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">{{$story->Category->name}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$story->name}}</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-3">
        <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="{{asset('backend/source/images')}}/{{$story->images}}" data-holder-rendered="true">
      </div>
      <div class="col-md-9">
        <ul class="col-md-9-ul">

        <input type="hidden" value="{{$story->name}}" class="wishlist_title">
        <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
        <input type="hidden" value="{{$story->id}}" class="wishlist_id">
          <li>Tên truyện : {{$story->name}} </li>
          <li>Tác giả : {{$story->author}} </li>
          <li>Danh mục truyện : <a href="">{{$story->Category->name}}</a></li>
          <li>Số chương :{{count($chapter)}} </li>
          <li>Ngày đăng : <span>{{$story->created_at->diffForHumans()}}</span></li>
          <li>Số lượt xem : <span>2000</span></li>
          <li><a href=""> Xem mục lục </a> </li>
          @if($firstChapter)
          <li><a href="{{route('see.chapter',['slug'=>$firstChapter->slug])}}" class="btn btn-primary">Đọc online</a>
          <button class="btn btn-danger btn-like-story"><i class="fas fa-heart"></i> Thích truyện</button>
          </li>
          @else
          <li class="btn-danger btn"><a href=""></a>Truyện chưa được cập nhật</li>   
          @endif
        </ul>
      </div>
    </div>

    <div class="col-md-12">
      <p>{{$story->description}}</p>
    </div>

    <hr>
    <h4>Mục Lục</h4>
    <ul class="list-chapter">
      @foreach($chapter as $chapter)
      <li><a href="">{{$chapter->title}} </a> </li>
      @endforeach
    </ul>
    <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>

    <div class="fb-share-button" data-href="{{\URL::current()}}"
     data-layout="button_count" data-size="small"><a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
    <h4>Sách cùng danh mục</h4>
    <div class="row">
    @foreach($cungdanhmuc as $pro)
        <a href="{{route('read.stories',['slug'=>$pro->slug_story])}}">
          <div class="col-md-3">
            <div class="card mb-3 box-shadow">
              <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="backend/source/images/1621128562.jpg" data-holder-rendered="true">
              <div class="card-body">
            <h5>  <strong>{{$pro->name}}</strong></h5>
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
          </a>
         @endforeach
    </div>
  </div>
  <div class="col-md-3">
    <h3>Danh mục truyện</h3>
  </div>
</div>
<script>
$('.btn-like-story').click(function(){
   $('.fas.fa-heart').css('color','#0000FF');
   const id=$('.wishlist_id').val();
   const title=$('.wishlist_title').val();
   const url=$('.wishlist_url').val();
   const img=$('.card-img-top').attr('src');
   
   const item={
     id:id,
     title:title,
     url:url,
     img:img
   };
   if(localStorage.getItem('wishlist_story')==null){
     localStorage.setItem('wishlist_story','[]');
   }
   var old_data=JSON.parse(localStorage.getItem('wishlist_story'));
   var matches=$.grep(old_data,function(obj){
     return obj.id==id
   })
   if(matches.length){
     alert('Truyện đã có trong danh sách yêu thích');
   }
   else
   alert('Đã thích truyện');
})
</script>
@endsection