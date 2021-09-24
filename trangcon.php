<?php
    include './lib/session.php';
    Session::init();

?> 

<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php include './classes/student.php';
$student = new student();?>

<?php
	
	$login_check = Session::get('student_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php
	if(isset($_GET['action']) && $_GET['action']=='logout'){
		Session::destroy();
	} ?> 
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
	<!--jvascript slide-->
	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <script>
        jssor_slider1_init = function () {
            var options = {
                $SlideDuration: 800,                    //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                    //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $AutoPlay: 1,                           //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $BulletNavigatorOptions: {              //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,     //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                   //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                          //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1,                           //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                      //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                      //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                     //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,      //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2                    //[Required] 0 Never, 1 Mouse Over, 2 Always
                }
            };
            var jssor_slider1 = new $JssorSlider$('slider1_container', options);
            //make sure to clear margin of the slider container element
            jssor_slider1.$Elmt.style.margin = "";
            //#region responsive code begin
            //the following code is to place slider in the center of parent container with no scale
            function ScaleSlider() {
                var containerElement = jssor_slider1.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;
                if (containerWidth) {
                    var expectedWidth = Math.min(containerWidth, jssor_slider1.$OriginalWidth());
                    //scale the slider to original height with no change
                    jssor_slider1.$ScaleSize(expectedWidth, jssor_slider1.$OriginalHeight());
                    jssor_slider1.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //#endregion responsive code end
        };
    </script>
    
    <!-- make a div with 100% width, place jssor slider in the div -->
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
			<!-- <div class="w3layouts_header_right">
			    <form action="#" method="post">
					<input name="Search here" type="search" placeholder="Tìm Kiếm" required="">
					<input type="submit" value="">
				</form>
			</div> -->
			<ul class="agile_form" >
				<li><a href="?action=logout" class="active"href="index.php" >
					<i class="fa fa-sign-in" aria-hidden="true"> Xin chào: <?= Session::get('student_name') ?> <span style="color: #002147;">&#8214;</span>
					  	
           			</i> Đăng Xuất
			</a> 
				</li>
			</ul>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li class="effect-3"><a href="trangcon.php" >Trang Chủ</a></li>
						<li><a href="forum.php" class="effect-3 ">Diễn đàn</a></li>
						<li><a href="papers.php" class="effect-3 ">Biểu mẫu</a></li>
						<li><a href="scanf.php" class="effect-3 ">Gửi giấy tờ</a></li>
						<li><a href="profile.php" class="effect-3 ">Hồ Sơ</a></li>
					</ul>
				</nav>

			</div>
		</nav>	
		<div class="clearfix"> </div> 
	</div>
</div>
<!-- about -->
	
		<div class="about" style="margin-top:20px;">
		<h3 class="w3l-title">GIỚI THIỆU CHUNG</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>

		<div class="clearfix"> </div>
		</div>
<!-- Slider -->

	
<div id="wrapper_slide" style="margin-bottom: 20px;">
		<div class="container">
			<div style="position:relative;top:0;left:0;width:100%;overflow:hidden;">
		        <!--#region Jssor Slider Begin -->
		        <div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 980px; height: 380px;">
		            <!-- Loading Screen -->
		            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
		                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
		            </div>
		            <!-- Slides Container -->
		            <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px;  height: 380px; overflow: hidden;">
		               
		               	 <?php 
						$get_slider = $student->show_slider();
						if($get_slider){
							while($result_slider = $get_slider->fetch_assoc()){
						
						?>
						 <div>
						<img width="100%" height="100%" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName']?>"/>
						   </div>
						<?php
							}
						}
						?>
		             
		                
		            </div> 
		            <!--#region Bullet Navigator Skin Begin -->
		            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
		            <style>
		                .jssorb051 .i {position:absolute;cursor:pointer;}
		                .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;stroke:#000;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.5;}
		                .jssorb051 .i:hover .b {fill-opacity:.7;}
		                .jssorb051 .iav .b {fill-opacity: 1;}
		                .jssorb051 .i.idn {opacity:.3;}
		            </style>
		            <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
		                <div data-u="prototype" class="i" style="width:16px;height:16px;">
		                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
		                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
		                    </svg>
		                </div>
		            </div>
		            <!--#endregion Bullet Navigator Skin End -->
		            <!--#region Arrow Navigator Skin Begin -->
		            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
		            <style>
		                .jssora051 {display:block;position:absolute;cursor:pointer;}
		                .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
		                .jssora051:hover {opacity:.8;}
		                .jssora051.jssora051dn {opacity:.5;}
		                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
		            </style>
		            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
		                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
		                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
		                </svg>
		            </div>
		            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
		                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
		                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
		                </svg>
		            </div>
		            <!--#endregion Arrow Navigator Skin End -->
		        </div>
		        <!-- Trigger -->
		        <script>
		            jssor_slider1_init();
		        </script>
		        <!--#endregion Jssor Slider End -->
		    </div>	
		</div class="clr"><div>
		</div>
	</div>
<!--  -->

<!-- banner -->
<div class="about-bottom" style="margin-bottom: 550px;">
	<div class="col-md-6 w3l_about_bottom_left">
		<div class="video-grid-single-page-agileits">
			<div data-video="4hKRM72tAZM" id="video" > <img  src="images/udckitem.jpg" alt="" class="img-responsive" /> </div>
		</div>
		<div class="w3l_about_bottom_left_video" >
			<h4>Xem Video UD-CK</h4>
		</div>
	</div>
	<div class="col-md-6 w3l_about_bottom_right one">
		<div class="abt-w3l">
				
			<div class="header-w3l" >
				<div class=" wthree-about-grids" style="height:417px;">
			<h4>CHÀO MỪNG BẠN ĐẾN VỚI UD-CK </h4>
			<!-- <div class="them" style="margin:auto;"><a  href="#" class="trend-w3l" data-toggle="modal" data-target="#myModal"><span >Đọc thêm</span></a></div> -->
		</div>
			</div>
<!-- <div class="modal about-modal w3-agileits fade" id="myModal" tabindex="-1" role="dialog">
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
</div> -->
		</div>
		<div class="clearfix"> </div>
	</div>
</div>


<!-- Gallery -->

<section class="portfolio-w3ls" id="gallery" >
		<h3 class="w3l-title" >Cơ Sở Vật Chất</h3>

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
<!-- contact -->
<div class=contact-about style="margin-top:-30px">
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
		
			</div>
		</div> 
	</div>
</div>
</div>
<div class="clearfix"> </div> 
<div class="w3layouts_copy_right">
	<div class="container">
		<p>&copy 2021 UDCK</p>
	</div>
</div>

<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->

<!-- smooth scrolling -->
<!-- <script src="js/SmoothScroll.min.js"></script> -->
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