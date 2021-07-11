@extends('backend.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <section class="panel">
      <header class="panel-heading">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Thêm Mới Loại Sản Phẩm</button>
      </header>
    </section>
    <section class="panel">
      <header class="panel-heading">Danh Sách Loại Sản Phẩm : <strong>3</strong></header>

      <div class="panel-body">
        <table class="table ">
          <tr class="table-header">
            <th>ID</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Slug</th>
            <th>Mô Tả</th>
            <th>Trạng Thái</th>
            <th>Tác Vụ</th>
          </tr>


          @foreach($category as $cate)
          <tr id="sid{{$cate->id}}">
            <td>{{$cate->id}}</td>
            <td>{{$cate->name}}</td>
            <td>{{$cate->code}}</td>
            <td>{{$cate->description}}</td>
            <td>
              @if($cate->status==0)
              <span class="text text-success">Hoạt Động</span>
              @else
              <span class="text text-danger">Không Hoạt Động</span>
              @endif
            </td>


            <td>
              <a href="javascript:void(0)" class="btn btn-primary" onclick=" editCategory({{$cate->id}})"> <span class="glyphicon glyphicon-edit"></span> Sửa</a>
              <a href="javascript:void(0)" class="deleteRecord btn btn-danger" data-id="{{$cate->id }}"> <span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
        <form method="post" id="addCategory">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tên danh mục <span class="text-danger">(*)</span></label>
            <input id="name" class="form-control" type="text" name="name" onkeyup="ChangeToSlug()" placeholder="Nhập tên danh mục">
            if ($errors->has('name')) {
            <span class="text-danger">{{$errors}}</span>
            }
          </div>

          <div class="form-group">
            <label for="">Slug Danh Mục <span class="text-danger">(*)</span></label>
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Mô Tả <span class="text-danger">(*)</span></label>
            <input id="description" class="form-control" type="text" name="description" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Trạng Thái <span class="text-danger">(*)</span></label>
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


<script>
  $("#addCategory").submit(function(e) {
    e.preventDefault();
    let name = $("#name").val();
    let slug = $("#slug").val();
    let description = $("#description").val();
    let status = $("#status").val();
    let _token = $("input[name=_token]").val();
    $.ajax({
      url: "{{route('category.store')}}",
      type: "POST",
      data: {
        name: name,
        code: slug,
        description: description,
        status: status,
        _token: _token
      },
      success: function(response) {
        if (response.success) {
          alert(response.message) //Message come from controller
        } else {
          alert("Error")
        }
      },
      error: function(error) {
        console.log(error)
      }
    });
  });
</script>

<!--edit Category using Ajax-->
<script>
  function editCategory(id) {
    $.get('category/Ajax/editCategory/' + id, function(Category) {
      $("#id").val(Category.id);
      $("#name2").val(Category.name);
      $("#slug2").val(Category.code);
      $("#description2").val(Category.description);
      $("#status2").val(Category.status);
      $("#editCategoryModal").modal('toggle');
    });
  }
  $("#editCategoryForm").submit(function(e) {
    e.preventDefault();
    let id = $("#id").val();
    let name = $("#name2").val();
    let slug = $("#slug2").val();
    let description = $("#description2").val();
    let status = $("#status2").val();
    let _token = $("input[name=_token]").val();

    $.ajax({
      url: "{{route('category.update')}}",
      type: "PUT",
      data: {
        id: id,
        name: name,
        code: slug,
        description: description,
        status: status,
        _token: _token
      },
      success: function(response) {

        // alert(response.message) //Message come from controller
        $('#sid' + response.id + ' td:nth-child(2)').text(response.name);
        $('#sid' + response.id + ' td:nth-child(3)').text(response.code);
        $('#sid' + response.id + ' td:nth-child(4)').text(response.description);
        $('#sid' + response.id + ' td:nth-child(5)').text(response.status);
        $("#editCategoryModal").modal('toggle');
        $("#editCategoryForm")[0].reset();

      }

    });
  });
</script>

<!--Delete Record using Ajax-->

<script>
  $(".deleteRecord").click(function() {
    var id = $(this).data("id");

    if (confirm("Bạn có muốn xóa danh mục này ? ")) {
      $.ajax({

        url: "category/delete/" + id,
        type: 'DELETE',
        data: {
          "id": id,
          _token: '{!! csrf_token() !!}',
        },
        success: function() {
          alert("Xóa sản phẩm thành công");
        }

      });
    }

  });
</script>


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