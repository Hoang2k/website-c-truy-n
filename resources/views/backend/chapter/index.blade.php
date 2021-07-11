@extends('backend.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <section class="panel">
      <header class="panel-heading">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Thêm Mới Chương</button>
      </header>
    </section>
    <section class="panel">
      <header class="panel-heading">Danh Sách Loại Sản Phẩm : <strong>3</strong></header>
      @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
      <div class="panel-body">
        <table class="table ">
          <tr class="table-header">
            <th>ID</th>
            <th>Truyện</th>
            <th>slug Chương</th>
            <th>Tiêu đề</th>
            <th>Tóm Tắt</th>
            <th>Nội dung</th>
            <th>Trạng Thái</th>
            <th>Tác Vụ</th>
          </tr>


          @foreach($chapter as $chapter)
          <tr id="chapter{{$chapter->id}}">
            <td>{{$chapter->id}}</td>
            <td>{{$chapter->Product->name}}</td>
            <td>{{$chapter->slug}}</td>
            <td>{{$chapter->title}}</td>
            <td>{{$chapter->summary}}</td>
            <td>{{$chapter->content}}</td>
            <td>
              @if($chapter->status==0)
              <span class="text text-success">Hoạt Động</span>
              @else
              <span class="text text-danger">Không Hoạt Động</span>
              @endif
            </td>


            <td>
              <a href="{{route('chapter.edit',['id'=>$chapter->id])}}" class="btn btn-primary" > <span class="glyphicon glyphicon-edit"></span> Sửa</a>
              <a href="{{route('chapter.delete',['id'=>$chapter->id])}}" class="deleteRecord btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Xóa</a>
            </td>
          </tr>

          @endforeach


        </table>
      </div>
    </section>
  </div>
</div>
<!--Modal add Category-->

<div class="modal fade" id="addCategoryModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Mới Danh Mục</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('chapter.store')}}" method="post" id="addCategory">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tên Chương <span class="text-danger">(*)</span></label>
            <input id="name" class="form-control" type="text" name="name" onkeyup="ChangeToSlug()" placeholder="Nhập tên danh mục">
            @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          </div>

          <div class="form-group">
            <label for="">Slug Chương  <span class="text-danger">(*)</span></label>
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Nhập slug chương">
          </div>
          
          <div class="form-group">
            <label for="">Tóm tắt chương <span class="text-danger">(*)</span></label>
            <textarea id="summary" class="form-control" type="text" name="summary"  cols="6" ></textarea> 
          </div>
          <div class="form-group">
            <label for="">Nôi dung <span class="text-danger">(*)</span></label>
           <textarea class="form-control " type="text" name="content" id="content_chapter" cols="6" ></textarea>
          </div>
          <div class="form-group">
            <label for=""> Thuộc Truyện <span class="text-danger">(*)</span></label>
            <select class="form-control" name="story" id="status">
            @foreach($story as $story)
              <option value="{{$story->id}}">{{$story->name}}</option>
             @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for=""> Trạng Thái <span class="text-danger">(*)</span></label>
            <select class="form-control" name="status" id="status">
              <option value="0">Hoạt Động</option>
              <option value="1">Không Hoạt Động</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">{{__("Thêm Mới")}}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
      </div>
      </form>
    </div>

  </div>
</div>



<!--Modal edit Category-->

<div class="modal fade" id="editCategoryModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa Danh Mục</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="editCategoryForm">
          {{ csrf_field() }}
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="">Tên danh mục <span class="text-danger">(*)</span></label>
            <input id="name2" class="form-control" name="name" type="text" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Slug Danh Mục <span class="text-danger">(*)</span></label>
            <input id="slug2" class="form-control" name="slug" type="text" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Mô Tả <span class="text-danger">(*)</span></label>
            <input id="description2" class="form-control" type="text" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Trạng Thái <span class="text-danger">(*)</span></label>
            <select class="form-control" id="status2">
              <option value="0">Hoạt Động</option>
              <option value="1">Không Hoạt Động</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">{{__("Cập Nhật")}}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
      </div>
      </form>
    </div>

  </div>
</div>




<!--Tạo Slug Tự động bằng js-->
<script>
  function ChangeToSlug() {
    var title, slug;

    //Lấy text từ thẻ input title 
    title = document.getElementById("name").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
  }
</script>
@endsection