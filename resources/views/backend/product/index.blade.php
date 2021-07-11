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
            <th>Tên Truyện</th>
            <th>Tác giả</th>
            <th>Hình Ảnh</th>
            <th>Slug Truyện</th>
            <th>Mô Tả</th>
            <th>Danh Mục</th>
            <th>Trạng Thái</th>
            <th>Tác Vụ</th>
          </tr>


          @foreach($product as $pro)
          <tr id="pro{{$pro->id}}">
            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->author}}</td>
            <td><img src="{{asset('backend/source/images')}}/{{$pro->images}}" style="max-width:120px;padding-top:0" /></td>
            <td>{{$pro->slug_story}}</td>
            <td style="max-width:350px;">{{$pro->description}}</td>
            <td>{{$pro->category->name}}</td>

            <td>
              @if($pro->status==0)
              <span class="text text-success">Hoạt Động</span>
              @else
              <span class="text text-danger">Không Hoạt Động</span>
              @endif
            </td>


            <td>
              <a href="javascript:void(0)" class="btn btn-primary" onclick="editProduct({{$pro->id}})"> <span class="glyphicon glyphicon-edit"></span> Sửa</a>
              <a href="javascript:void(0)" class="deleteRecord btn btn-danger" data-id="{{$pro->id }}"> <span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
        <h4 class="modal-title">Thêm Mới Truyện</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tên truyện <span class="text-danger">(*)</span></label>
            <input id="name" class="form-control" type="text" name="name" onkeyup="ChangeToSlug()" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Tên giả <span class="text-danger">(*)</span></label>
            <input id="author" class="form-control" type="text" name="author"  placeholder="Nhập tên tác giả">
          </div>
          <div class="form-group">
            <label for="">Hình Ảnh <span class="text-danger">(*)</span></label>
            <input id="file" class="form-control" type="file" name="file" onchange="preViewFile(this)" placeholder="Chọn hình ảnh">
            <img id="preViewImg" src="#" alt="" style="max-width:130px;margin-top:20px;">

          </div>

          <div class="form-group">
            <label for="">Slug truyện <span class="text-danger">(*)</span></label>
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Mô Tả</label>
            <textarea name="description" class="form-control" style="resize:none;" id="description" rows="6"></textarea>
          </div>
          <div class="form-group">
            <label for="">Danh Mục <span class="text-danger">(*)</span></label>
            <select class="form-control" name="category" id="">
              @foreach($category as $cate)
              <option value="{{$cate->id}}">{{$cate->name}}</option>
              @endforeach
            </select>
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

<div class="modal fade" id="editProductModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa Truyện</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="updateProductForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="">Tên danh mục <span class="text-danger">(*)</span></label>
            <input id="name2" class="form-control" name="name" type="text" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Tên giả <span class="text-danger">(*)</span></label>
            <input id="author2" class="form-control" type="text" name="author"  placeholder="Nhập tên tác giả">
          </div>
          <div class="form-group">
            <label for="">Slug Danh Mục <span class="text-danger">(*)</span></label>
            <input id="slug2" class="form-control" name="slug" type="text" placeholder="Nhập tên danh mục">
          </div>

          <div class="form-group">
            <label for="">Hình Ảnh <span class="text-danger">(*)</span></label>
            <input id="file2" class="form-control" type="file" name="file2" onchange="preViewFile2(this)" placeholder="Chọn hình ảnh">
            <img id="preViewImg2" src="#" alt="" style="max-width:130px;margin-top:20px;">


          </div>
          <div class="form-group">
            <label for="">Mô Tả <span class="text-danger">(*)</span></label>
            <textarea name="description" id="description2" class="form-control" rows="6"></textarea>
          </div>
          <div class="form-group">
            <label for="">Danh Mục <span class="text-danger">(*)</span></label>
            <select class="form-control" name="category" id="category2">
              @foreach($category as $cate)
              <option value="{{$cate->id}}">{{$cate->name}}</option>
              @endforeach
            </select>
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


<!--edit Product using Ajax-->
<script>

  function editProduct(id) {
    $.get('product/editProduct/' + id, function(Product) {
      $("#id").val(Product.id);
      $("#name2").val(Product.name);
      $("#author2").val(Product.author);
      $("#slug2").val(Product.slug_story);
      $("#preViewImg2").attr("src", "backend/source/images/" + Product.images);
      $("#description2").val(Product.description);
      $('#category2').val(Product.category_id)
      $("#status2").val(Product.status);
      $("#editProductModal").modal('toggle');
    });
  }
  $("#updateProductForm").submit(function(e) {
    e.preventDefault();
    let name=$("#name2").val();
    let id=$("#id").val();
    let author=$("#author2").val();
    let img=$("#file2").prop('files')[0];
    let slug_story=$("#slug2").val();
    let description=$("#description2").val();
    let category_id=$("#category2").val()
    let status=$("#status2").val();
    
      var form_data=new FormData();
     // form_data.append("file",img);
    //  form_data.append("id",id);
    //  form_data.append("name",name);
     form_data.append("image",img);
    //  form_data.append("slug_story",slug_story);
    //  form_data.append("description",description);
    //  form_data.append("category",category_id);
    //  form_data.append("status",status);
  
    $.ajax({
      type:"PUT",
      url:"{{route('product.update')}}",
      
      // processData: false,
      //       mimeType: "multipart/form-data",
      //       contentType: false,
            data:{
            // form_data,
            id:id,
            name:name,
            author:author,
            slug:slug_story,
            description:description,
            category:category_id,
            status:status
            },
            dataType: "json",
            headers: { "X-CSRF-Token": $("meta[name='csrf-token']").attr("content") },
            success:function(response){
              $('#pro' + response.id + 'td:nth-child(2)').text(response.name);  
              $('#pro'+response.id +'td:nth-child(3)').text(response.slug_story);
              $('#pro'+response.id +'td:nth-child(5)').text(response.description);
              $('#pro'+response.id +'td:nth-child(6)').text(response.category_id);
              $('#pro'+response.id +'td:nth-child(7)').text(response.status);
              $("#editProductModal").modal('toggle');
              $("#updateProductForm")[0].reset();
            }
    });
  })
</script>

<!--Delete Product using Ajax-->

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



<!--load Hình ảnh-->
<script>
  function preViewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function() {
        $('#preViewImg').attr("src", reader.result);
      }
      reader.readAsDataURL(file);
    }

  }
</script>
<script>
  function preViewFile2(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function() {
        $('#preViewImg2').attr("src", reader.result);
      }
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection