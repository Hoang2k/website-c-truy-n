@extends('frontend.master')
@section('content')


<style>
.isDisabled{
  color:currentColor;
  pointer-events:none;

}
</style>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
    <li class="breadcrumb-item"><a href="#"></a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12">
    <h4>{{$chapters->Product->name}}</h4>
    <p>Chương hiện tại : {{$chapters->title}} </p>

    <div class="col-md-5">
      <div class="form-group">

        <label for="">Chọn Chương</label>
        <p> <a href="{{url('/xem-chuong/'.$previous)}}" class="btn btn-primary {{$chapters->id==$min_id->id? 'isDisabled' : ''}}">Tập trước</a></p>
        <select name="" id="" class="form-control select_chapter">
          @foreach($all_chapter as $chapter)
          <option value="{{url('/xem-chuong/'.$chapter->slug)}}">{{$chapter->title}}</option>
          @endforeach
        </select>
        <p class="mt-4"> <a href="{{url('/xem-chuong/'.$next_chapter)}}" class="btn btn-primary {{$chapters->id==$max_id->id ?'isDisabled' : ''}} ">Tập sau</a></p>
      </div>
    </div>
    
    <div class="col-md-12">
  <div class="content-chapter">
     <p>{{$chapters->content}}</p>
     <h3>Lưu và chia sẻ chuyện</h3>
     <i class="fab fa-facebook-f"></i> <i class="fab fa-twitter"></i>
     <p> <strong>0 bình luận</strong></p>
    </div>
  </div>
   
</div>
  </div>
  



  <script type="Text/javascript">
    $('.select_chapter').on('change',function(){
      var url=$(this).val();
     // alert(url);
      if(url)
      {
        window.location=url;
    
        
      }
      return false;
      
    });
    current_chapter();
    function current_chapter(){
      var url =Window.location.href;
      //alert(url);
    
       $('.select_chapter').find('option[value="'+url+'"]').attr("selected",true);
    }
</script>
  @endsection