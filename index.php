
 <?php
	include_once ('./classes/admissions.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['admissions'])) {
       
      	 $adm = new admissions();
        $insertAdmissions = $adm->insert_admissions($_POST);
        
    }
?> 
<?php
	include_once ('./classes/contact.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['contact'])) {
       
      	 $ct = new contact();
        $insertContact = $ct->insert_contact($_POST);
        
    }
?>


<!DOCTYPE html>
<html lang="zxx">
<head>
<title>UD-CK</title>
	<!-- Menu App -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--// Menu App -->

	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
	<link rel="stylesheet" href="css/swipebox.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<!-- //css files -->
	<!-- online-fonts -->
	<link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- //online-fonts -->
	</head>
<body>
<!-- banner -->
<div class="main_section_agile" id="home">
	<div class="agileits_w3layouts_banner_nav">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<h1><a class="navbar-brand" href="index.php"><i class="fa fa-leanpub" aria-hidden="true"></i>ud-ck</a></h1>

			</div>
			<div class="w3layouts_header_right">
			    <form action="#" method="post">
					<input name="Search here" type="search" placeholder="Tìm Kiếm" required="">
					<input type="submit" value="">
				</form>
			</div>
			<ul class="agile_forms">
				<li><a class="active" href="login.php" ><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng Nhập</a> </li>
			</ul>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="effect-3">Trang Chủ</a></li>
						<li><a href="#about" class="effect-3 scroll">Giới Thiệu</a></li>
						<li><a href="#services" class="effect-3 scroll">Cơ Hội</a></li>
						<li><a href="#team" class="effect-3 scroll">Thành Viên</a></li>
						<li><a href="#gallery" class="effect-3 scroll">Cơ Sở Vật Chất</a></li>
						<li><a href="#mail" class="effect-3 scroll">Liên Hệ</a></li>
					</ul>
				</nav>

			</div>
		</nav>	
		<div class="clearfix"> </div> 
	</div>
</div>
<!-- banner -->
<div class="about-bottom">
	<div class="col-md-6 w3l_about_bottom_left">
		<div class="video-grid-single-page-agileits">
			<div data-video="d44UTUSTYKU" id="video"> <img src="images/depne.jpg" alt="" class="img-responsive" /> </div>
		</div>
		<div class="w3l_about_bottom_left_video">
			<h4>Xem Video UD-CK</h4>
		</div>
	</div>
	<div class="col-md-6 w3l_about_bottom_right one">
		<div class="abt-w3l">
				
			<div class="header-w3l">
				<h2>Tư Vấn Tuyển Sinh</h2>
				<h4>Nhập các chi tiết dưới đây</h4>
				<?php 
	    		if(isset($insertAdmissions)){
	    			echo $insertAdmissions;
	    		}
	    		?>
				<form action=""method="POST" class="mod2">
					<div class="col-md-6 col-xs-6 w3l-left-mk">
						<ul>
							<input type="hidden" name="admissions">
							<li class="text">Họ và tên:  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><input name="admName" type="text" required=""></li>
							<li class="text">Ngày sinh:  </li>
							<li class="agileits-main"><i class="fa fa-calendar" aria-hidden="true"></i><input class="date" id="datepicker" name="admDate" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'dd/mm/yyyy';}" required="" /></li>
							<li class="text">Số điện thoại:  </li>
							<li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input name="admPhone" type="text" required=""></li>
							
							<li class="text">Giới tính:  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><input name="admGender" type="text" required=""></li>
						</ul>
					</div>
					<div class="col-md-6 col-xs-6 w3l-right-mk">
						<ul>
							
							<li class="text">Địa chỉ:  </li>
							<li class="agileits-main"><i class="fa fa-home" aria-hidden="true"></i><input name="admAddress" type="text" required=""></li>
							<li class="text">Họ và tên phụ huynh:  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><input name="admParents" type="text" required=""></li>
							<li class="text">Số điện thoại phụ huynh:  </li>
							<li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input name="admPhoneparents" type="text" required=""></li>
							<li class="text">Nguyên quán:  </li>
							<li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input name="admHometown" type="text" required=""></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="agile-submit">
						<input type="submit" name="submit" value="Gửi thông tin">
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

	
	
<!-- Modal2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div> 
<!-- //Modal2 -->	
<!-- about -->
<div class="about-top" id="about">
	<div class="container">
		<h3 class="w3l-title">GIỚI THIỆU CHUNG</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="col-md-7 wthree-services-bottom-grids">
			<div class="wthree-services-left">
				<img src="images/ab1.jpg" alt="">
			</div>
			<div class="wthree-services-right">
				<img src="images/ab2.jpg" alt="">
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-5 wthree-about-grids">
			<h4>CHÀO MỪNG BẠN ĐẾN VỚI UD-CK</h4>
			<a href="#" class="trend-w3l" data-toggle="modal" data-target="#myModal"><span>Đọc thêm</span></a>
			<a href="#mail" class="trend-w3l scroll"><span>Liên hệ</span></a>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- modal -->
<div class="modal about-modal w3-agileits fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div> 
			<div class="modal-body">
				<img src="images/g10.jpg" alt=""> 
				<p>Trường Phân hiệu Đại học Đà Nẵng được thành lập được mấy năm rồi em chưa biết, chỉ mong trường cho em ra trường sớm nhất có thể. Chứ em đói lắm rồi ạ. Dịch bệnh khó khăn chắc em về trông cá và nuôi thêm rau.</p>
			</div> 
		</div>
	</div>
</div>
<!-- //modal --> 
<!-- //about -->
<!--stats-->
<div class="stats" id="stats">
	<div class="container">
		<div class="stats-info">
			<div class="col-md-3 col-xs-3 stats-grid slideanim">
				<i class="fa fa-users" aria-hidden="true"></i>
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1260' data-delay='.5' data-increment="1">1260</div>
				
				<h4 class="stats-info">Sinh viên hiện theo học</h4>
			</div>
			<div class="col-md-3 col-xs-3 stats-grid slideanim">
				<i class="fa fa-book" aria-hidden="true"></i>
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='9000' data-delay='.5' data-increment="1">9000</div>
				
				<h4 class="stats-info">Sinh viên đã ra trường</h4>
			</div>
			<div class="col-md-3 col-xs-3 stats-grid slideanim">
				<i class="fa fa-trophy" aria-hidden="true"></i>
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='900' data-delay='.5' data-increment="10">900</div>
				
				<h4 class="stats-info">Sinh viên đã đăng ký</h4>
			</div>
			<div class="col-md-3 col-xs-3 stats-grid slideanim">
					<i class="fa fa-user" aria-hidden="true"></i>
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='70' data-delay='.5' data-increment="1">70</div>
			
				<h4 class="stats-info">Cán bộ - Giảng viên</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--//stats-->
<!-- services -->
<div class="services" id="services" >
	<div class="container">  
		<h3 class="w3l-title">CƠ HỘI</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="services-w3ls-row">
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<span class="fa fa-graduation-cap" aria-hidden="true"></span>
				<h6>01</h6>
				<h5>Cơ hội nhận học bổng</h5>
				<p>Mạnh đẹp trai lai rai mấy cái học bổng, Đào Lê Hải ây đồ vi lốc, Kỳ chưa được 1 lần học bổng là gì.</p>
			</div>
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<h6>02</h6>
				<h5>Thỏa sức với đam mê</h5>
				<p>Hải sẽ được quay làm vi lốc rì vêu trường 1 cách chuyên nghiệp và hoàn hẻo</p>
				<span class="fa fa-user-o grid-w3l-ser" aria-hidden="true"></span>
			</div>
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<span class="fa fa-book" aria-hidden="true"></span>
				<h6>03</h6>
				<h5>Trở kỹ sư tương lai</h5>
				<p>Tụi em không được kỹ sư nên hơi buồn, thôi về quê trồng rau nuôi thêm cá cho chắc.</p>
			</div> 
			<div class="clearfix"> </div>
		</div>  
	</div>
</div>
<!-- //services -->
<!-- Gallery -->
<section class="portfolio-w3ls" id="gallery">
		<h3 class="w3l-title">Cơ Sở Vật Chất</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Khu Nhà A</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g2.jpg" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Thư Viện</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g3.jpg" class="swipebox"><img src="images/g3.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Khu Nhà H</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g7.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Khu Cán Bộ - Giảng viên</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g5.jpg" class="swipebox"><img src="images/g5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Khu Nhà E</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Khu KTX</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g11.jpg" class="swipebox"><img src="images/g11.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sân Trường</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g8.jpg" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Chưa gì hết</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
					<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g9.jpg" class="swipebox"><img src="images/g9.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Chưa nghĩ ra</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g10.jpg" class="swipebox"><img src="images/g10.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Chưa tìm thấy</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Gì đó</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g12.jpg" class="swipebox"><img src="images/g12.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>HaHa</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="clearfix"> </div>
</section>
<!-- //gallery -->
<!-- team -->
<div class="team-w3l" id="team">
	<div class="container">
		<h3 class="w3l-title">Giảng viên</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="team-w3l-grid">
			<div class="col-md-4 col-xs-4 about-poleft t1">
				<div class="about_img"><img src="images/t1.jpg" alt="">
				  <h5>Đồng Ngọc Nguyên Thịnh</h5>
				  <div class="about_opa">
					<p>Tiến Sĩ</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t2">
				<div class="about_img"><img src="images/t2.jpg" alt="">
				  <h5>Lê Thịnh Bảo Yến</h5>
				  <div class="about_opa">
					<p>Thạch Sĩ</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t3">
				<div class="about_img"><img src="images/t3.jpg" alt="">
				  <h5>Nguyễn Thành Ba</h5>
				  <div class="about_opa">
					<p>Giảng Viên</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="team-w3l-grid grid-2-team">
			<div class="col-md-4 col-xs-4 about-poleft t1">
				<div class="about_img"><img src="images/t4.jpg" alt="">
				  <h5>Từ Thị Vân</h5>
				  <div class="about_opa">
					<p>Giảng Viên</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t2">
				<div class="about_img"><img src="images/t5.jpg" alt="">
				  <h5>Nguyễn Dũng</h5>
				  <div class="about_opa">
					<p>Bố Nuôi</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t3">
				<div class="about_img"><img src="images/t6.jpg" alt="">
				  <h5>Nguyễn Trúc Giang</h5>
				  <div class="about_opa">
					<p>Sinh Viên</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //team -->
<!-- contact -->
	
<div id="mail" class="contact">
	<div class="container">
		<h3 class="w3l-title">Liên Hệ</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="agile_banner_bottom_grids">
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agilew3_contact">
					<h4>Địa chỉ</h4>
					<p>704 Phan Đình Phùng</p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left">
					<i class="fa fa-mobile" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right">
					<h4>Số Điện Thoại</h4>
					<p>0366898146</p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left1">
					 <i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right1">
					<h4>Email</h4>
					<p>udck@gmail.edu.vn</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="w3l-form">
			<!-- <h3 class="w3l-title">Liên Lạc</h3> -->
			<div class="contact-grid1">
				<div class="contact-top1">
				<?php 
	    		if(isset($insertContact)){
	    			echo $insertContact;
	    		}
	    		?>
					<form action="" method="POST">
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<input type="hidden" name="contact">
							<label>Họ và tên*</label>
							<input type="text" name="ct_Name" placeholder="Họ Và Tên" required="">
							<label>Email*</label>
							<input type="email" name="ct_Email" placeholder="E-mail" required="">
						</div>
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Số Điện Thoại*</label>
							<input type="text" name="ct_Phone" placeholder="Số Điện Thoại" required="">
							<label>Địa chỉ*</label>
							<input type="text" name="ct_Address" placeholder="Địa chỉ" required="">
						</div>
						<div class="form-group">
							<label>Tin nhắn*</label>
							<textarea placeholder name="ct_Inbox"required=""></textarea>
						</div>
							<input type="submit" name="submit" value="Gửi">
					</form>
				</div>
			</div>
		</div> 
	</div>
</div>
	<!--<div id="map">
	
	</div> -->
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="wthree_footer_grid_left">
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>Giới thiệu</h4>
				<p>chưa nghĩ tới.</p>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>Menu</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="index.php">Trang chủ</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#about" class="scroll">Cơ hội</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#services" class="scroll">Thành viên</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#team" class="scroll">Giảng Viên</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#gallery" class="scroll">Cơ Sở Vật Chất</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#mail" class="scroll">Liên hệ</a></li>
				</ul>
			</div>
			<!--<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 w3l-3">
				<h4>Thông tin khác</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">AppPro</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Mobile Apps</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">UD-CK App</a></li>
				</ul>
			</div> -->
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 wthree_footer_grid_right1">
				<h4>Liên Hệ</h4>
				<ul>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i>
						<a href="">udck@gmail.edu.vn</a>
					</li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>
						<a href="">0366898146</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="w3layouts_copy_right">
	<div class="container">
		<p> &copy 2021 UDCK</p>
	</div>
</div>


<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->

<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- stats -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- moving-top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //moving-top scrolling -->
<!-- gallery popup -->
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>
<!-- //gallery popup -->
<!--/script-->
	<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
<!-- //Baneer-js -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->	

<!-- //js-scripts -->
</body>
</html>