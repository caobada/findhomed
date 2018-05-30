<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	@yield('link')

	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" >
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icomoon.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">

	
	<style type="text/css">
		*{
			font-family: Tahoma, Arial, sans-serif;
			
		}
		</style>
</head>
<body>

<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top" id="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="num">Call: +0961467216</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="{{url('/')}}">Find<span>HomeD.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="{{url('/')}}">Home</a></li>
							<li><a href="#">Trainer</a></li>
							<li><a href="{{url('posthome')}}">Đăng tin</a></li>
							<li class="has-dropdown">
								<a href="#">Danh mục thuê</a>
								<ul class="dropdown">
									@foreach($hometype as $menu)
									<li><a href='{{url("type/$menu->nametypelink")}}'>{{$menu->nametype}}</a></li>
									@endforeach
									
								</ul>
							</li>
							<li><a href="#">Liên hệ</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style='background-image:url({{asset("images/bbb.jpg")}}' data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>findhomeD</h1>
							<h2>Website tìm kiếm tổ ấm uy tín số 1</h2>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    <!-- Services -->
    <section style="padding: 0px;margin: 0px ">
      <div class="container ">
        <div class="searchbar ">
        <div class="row ">
          <div class="col-lg-12 a"> 
            <div>
              <div class="filter "><b>LỌC TIN NHANH</b></div>
              <div class="row " style=" ">
              	<form method="get" action="{{url('search')}}" >
                <div class="col-lg-2 ">
                  <span class="badge ">Loại tin</span>
                  <select class="form-control select" name="type">
                    <option value="">Chọn loại tin</option>
                    @foreach($hometype as $hometype)
                    <option <?php if(isset($_GET['type'])){if($hometype->id==$_GET['type']) echo "selected='selected'";} ?> value="{{$hometype->id}}">{{$hometype->nametype}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- Tỉnh thành  -->
                <div class="col-lg-2 ">
                  <span class="badge ">Tỉnh thành</span>
                  <select id="province" class="form-control " name="province">
                    <option value="">Tất cả</option>
                    @foreach($province as $province)
                    	<option <?php if(isset($_GET['province'])){if($province->provinceid==$_GET['province']) echo "selected='selected'";} ?>  value="{{$province->provinceid}}">{{$province->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- Quận huyện -->
                <div  class="col-lg-2 ">
                  <span class="badge ">Quận huyện</span>
                  <select id="district" class="form-control " name="district">
                    <option value="">Tất cả</option>
                  </select>
                </div>
                <!-- Khoảng giá -->
                <div class="col-lg-2 ">
                  <span class="badge ">Khoảng giá</span>
                  <select class="form-control " name="price">
                    <option value="">Tất cả</option>
                    <option value="1">Dưới 1 triệu</option>
                    <option value="2">Từ 1->2 triệu</option>
                    <option value="3">Từ 2->5 triệu</option>
                    <option value="4">Trên 5 triệu</option>
                  </select>
                </div>
                 <!-- Diện tích -->
                <div class="col-lg-2 ">
                  <span class="badge ">Diện tích</span>
                  <select class="form-control " name="area">
                    <option  value="">Tất cả</option>
                    <option <?php if(isset($_GET['area'])){if ($_GET['area']==1) echo "selected='selected'";} ?> value="1">Dưới 10m<sub>2</sub></option>
                    <option <?php if(isset($_GET['area'])){if ($_GET['area']==2) echo "selected='selected'";} ?> value="2">10m2 tới 30m2</option>
                    <option <?php if(isset($_GET['area'])){if ($_GET['area']==3) echo "selected='selected'";} ?> value="3">Trên 30m2</option>
                  </select>
                </div>
             <!--  Button -->
                <div class="col-lg-2 ">
                  <span class="badge " ">&nbsp;</span>
                    <button class="btn btn-warning" style="margin-top: 32px;">
                        <i class="fa fa-filter"></i> Lọc tin
                    </button>
                </div>
            </form>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>

  @yield('content')

</div>


@include('subpage.footer')

<div class="gototop js-top">
		<a href="#top" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<script  src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}" ></script>	 
	

</body>
</html>
<script type="text/javascript">
	$(function(){
		
		$('#province').on('change',function(){
			var provinceid = $(this).val();
			var href = window.location.href;
			var array = href.split("/");
			var len = array.length
			if(len==6) url = 'province/'+ provinceid;
			else url = '../province/'+ provinceid
			if(provinceid=="") provinceid=0;
			$.ajax({
				type: 'GET',
				url : url ,
				success:function(resp){
					$("#district").html(resp);
								
				}
			});
		});
			

	

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
		 $("a").on('click', function(event) {

        
        if (this.hash !== "") {
           event.preventDefault();
           var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top 
            }, 800)
        }
    });	



		$('.has-dropdown').mouseenter(function(){

			 $(this).find('.dropdown').css('display', 'block').addClass('animated-fast fadeInUpMenu');
		});
		$('.has-dropdown').mouseleave(function(){
			$(this).find('.dropdown').css('display', 'none').removeClass('animated-fast fadeInUpMenu');

			
				
				
				
		});

	
	});
</script>

@yield('script')
