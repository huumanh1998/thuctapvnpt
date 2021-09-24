<?php
    include './lib/session.php';
    Session::init();

?> 
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php include ('./classes/student.php');?>
<?php include './classes/scanf.php';?>
<?php
  	$scanf = new scanf();
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$shifted_confirm = $scanf->shifted_confirm($id,$time);
    }
    $fm = new Format();
?>
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
	<script src="admin/ckeditor/ckeditor.js"></script>
	<script src="admin/ckfinder/ckfinder.js"></script>
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

<!-- View Scanf -->
	<div class="cartoption"  >		
			<div class="cartpage" style="margin-bottom: 20px;">
			    	<h2 style ="text-align: center; margin-bottom: 30px;margin-top: 10px;">Thông tin chi tiết giấy tờ</h2>			    	
			    	
						<table class="tblone"  style="margin: 10px;" border="1px">
							<tr >
								<th width="5%"style="text-align:center;">ID</th>
								<th width="10%"style="text-align:center;">Tên sinh viên</th>
								<th width="10%"style="text-align:center;">Phòng ban</th>
								<th width="20%"style="text-align:center;">Miêu tả</th>
								<th width="19%"style="text-align:center;">Tên file</th>
								<th width="8%"style="text-align:center;">Ngày hẹn</th>
								<th width="6%"style="text-align:center;">Địa điểm</th>
								<th width="10%"style="text-align:center;">Ngày gửi</th>
								<th width="6%"style="text-align:center;">Trạng thái</th>
								<th width="6%"style="text-align:center;">Hoạt động</th>
							</tr>
							<?php
							$id = Session::get('student_id');
							$get_scanf_student = $scanf->get_scanf_student($id);
							if($get_scanf_student){
								$i = 0;
								while($result = $get_scanf_student->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td style="text-align:center;"><?php echo $i; ?></td>
								<td style="text-align:center;"><?php echo $result['name']?></td>
								<td style="text-align:center;"><?php echo $result['departmentName'] ?></td>
								<td style="text-align:center;"><?php echo $result['scanf_desc'] ?></td>
								<td style="text-align:center;"><?php echo $result['scanf_file'] ?></td>
								<td style="color: red;text-align:center;"><?php echo $result['scanf_Date'] ?></td>
								<td style="color: red;text-align:center;"><?php echo $result['cmt'] ?></td>
								<td style="text-align:center;"><?php echo $result['date_scanf'] ?></td>
								<td style="text-align:center;">
									<?php
									if($result['status']=='0'){
										echo 'Chưa xong';
									}elseif($result['status']==1){ 
									?>
									<span>Chưa xem</span>
									
									<?php
									}elseif($result['status']==2){
										echo 'Đã xong';
									}

									 ?>


								</td>
								<?php
								if($result['status']=='0'){
								?>
								<td style="text-align:center;"><?php echo 'N/A';?></td>
								<?php
								
								}elseif($result['status']=='1'){
								
								?>
								<td style="text-align:center;"><a href="?confirmid=<?php echo $result['scanf_Id'] ?>&time=<?php echo $result['date_scanf'] ?>">Xác nhận thông báo</a></td>
								<?php
							}else{
								?>
								<td style="text-align:center;"><?php echo 'Đã xem'; ?></td>
								<?php
								}	
								?>
							</tr>
						<?php
							
							}
						}
						?>
							
						</table>

						
					 
					
					
					</div>
    	</div>
<!--  -->
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