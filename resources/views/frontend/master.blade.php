<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đọc truyện online</title>
  <base href="{{asset('')}}">
  <link href="frontend/css/owl.carousel.min.css" rel="stylesheet">
  <link href="frontend/css/owl.theme.default.min.css" rel="stylesheet">
  <!---------CSS BOOTSTRAP----->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!---------JS BOOTSTRAP----->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!--js slide show----->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--CSS font-awesome----->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="container">
    <!-----------------MeNu------------------------>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{route('trang-chu')}}">DOCTRUYEN247.COM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="padding-right:20%;">
          <li class="nav-item active">
            <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Danh Mục Truyện
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($category as $cate)
              <a class="dropdown-item" href="{{route('danh-muc',['slug'=>$cate->code])}}">{{$cate->name}}</a>
             @endforeach
             
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Review truyện</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" style="padding-top:10px;">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>
      </div>
    </nav>
    <!------------------------------ENd MeNu-------------------------->

    <!----------SLide---------->



    <!--------END SLIDE--------------->
    <!-----------COnTent----->

   @yield('content')


   

    <!--------End ConTent----->
  





  </div>
  <footer class="text-muted" style="background-color: black;">
    <div class="container">
      <p class="float-right">
        
      </p>
      <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
  </footer>
  <script src="frontend/js/jquery.min.js"></script>
  <script src="frontend/js/owl.carousel.js"></script>
 


<!--kết nối đến facebook-->
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="ducect3D"></script>
<!--end comment facebook-->


  <script>
  
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>
</body>

</html>