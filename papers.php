<?php
    include './lib/session.php';
    Session::init();

?> 

<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php
	
	$login_check = Session::get('student_login'); 
	if($login_check==false){
		header('Location:login.php');
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
			<!-- <div class="w3layouts_header_right">
			    <form action="#" method="post">
					<input name="Search here" type="search" placeholder="Tìm Kiếm" required="">
					<input type="submit" value="">
				</form>
			</div> -->
			<ul class="agile_form" >
				<li><a href="?action=logout" class="active"href="index.php" ><i class="fa fa-sign-in" aria-hidden="true"> Xin chào: <?= Session::get('student_name') ?> <span style="color: #002147;">&#8214;</span>
			  		<?php
                   if(isset($_GET['action']) && $_GET['action']=='logout'){
                      Session::destroy();
                   }
               ?> Đăng Xuất</i>
					
							   <!-- 	<?php 
							   	$login_check = Session::get('student_login');
							   	if($login_check==false){
							   		echo ' ';
							   	}else{
							   		echo '<a href="?id='.Session::get('id').'">Đăng xuất</a>';
							   	}
							   	?> -->
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

<!-- Bieu mau -->
<div id="bieumau" style="width:100%;height:100%; justify-content: center;">
	<div id="primary" class="content-area col-sm-8" style="width:100%;height:100%; justify-content: center;">
		<section id="content" role="main" class="clearfix">    
			<div id="content-wrap" style="width:100%;height:100%; justify-content: center;">
				<h1 class="page-title" style="color: #344199; margin-top: 20px;margin-bottom: 10px; text-align: center;">Biểu mẫu dành cho sinh viên (hệ Chính quy)</h1>
				<div class="region region-content" style="justify-content: center;justify-items: center;">
					<div id="block-system-main" class="block block-system">
						<div class="content">
							<span property="dc:title" content="Biểu mẫu dành cho sinh viên (hệ Chính quy)" class="rdf-meta element-hidden" ></span>
							<div class="content">
								<div class="field field-name-body field-type-text-with-summary field-label-hidden">
									<div class="field-items">
										<div class="field-item even" property="content:encoded">
											<table border="0" style="width:100%;height:100%;">
												<tbody>
													<tr>
														<td style="text-align: center; background-color: #ffffe0;">
							    							<span style="color: #ff0000; font-size: 16px;">
							    								<strong>STT</strong>
							    							</span>
							    						</td>
														<td style="text-align: center; background-color: #ffffe0;">
															<span style="color: #ff0000; font-size: 16px;">
																<strong>Tên biểu mẫu</strong>
															</span>
														</td>
														<td style="text-align: center; background-color: #ffffe0;">
															<span style="color: #ff0000; font-size: 16px;">
																<strong>Tải về</strong>
															</span>
														</td>
													</tr>
												<?php
						                        $i = 1;
						                        $paper = new papers();
						                        $get_papers = $paper->show_papers();
						                        if($get_papers){
						                            while($result = $get_papers->fetch_assoc()){

						                    ?>
													<tr>
														<td style="text-align: center;">
															<span style="font-size: small; color: #000000;"><?php echo $i?></span>
														</td>
														<td>
															<strong>
																<span style="color: #0000ff; font-size: small;"><?php echo $result['papersName'] ?> -&nbsp;</span>
															</strong>
															<strong>
																<span style="color: #0000ff; font-size: small;"><?php echo $result['departmentName'] ?> </span>
															</strong>
															<strong>
																<span style="color: #0000ff; font-size: small;"><?php echo $result['papers_desc'] ?></span>
															</strong>
														</td>
														<td><a href="/webthuctap/webthuctap/admin/uploads/<?=$result['file']?>"><img src="images/download.png" width="25" height="25" style="display: block; margin-left: auto; margin-right: auto;"></a>
														</td>
													</tr>
										 <?php
			                        $i++;
			                            }
			                        }
                        		?>
									</tbody>
								</table>
							</div>
						</div>
					</div> 
				</div>

				<footer>
					<ul class="links inline">
						<li class="statistics_counter first last">
							<!-- <span>73489 lần xem</span> -->
						</li>
					</ul>
				</footer>
			</div>
		</div> <!-- /.block -->
	</div>
 <!-- /.region -->
</div>
</section>
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