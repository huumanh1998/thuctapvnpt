<?php
    include './lib/session.php';
    Session::init();

?> 

<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php
	include ('./classes/student.php');
?>
<?php

	 $st = new student();
 	 $id = Session::get('student_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
        $updateStudent = $st->update_student_sv($_POST, $id);
        
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

<!-- Edit Profile-->
<div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading" style="justify-content: center;justify-items: center;text-align: center;margin-top: 20px;margin-bottom:30px;">
	    		<h3>Cập nhật thông tin</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
			<form action="" method="post" style="font-size: 20px;">
			<table class="tblone" style="width:100%;height: 100%; text-align:center;font-size: 20px;margin-bottom: 50px;">
					<?php

                if(isset($updateStudent)){
                    echo $updateStudent;
               			 }

            ?> 
				
				<?php
						$id = Session::get('student_id');
						$st = new student();
						$get_students = $st->show_student($id);
						if($get_students){
							while($result = $get_students->fetch_assoc()){

					?>
				<tr>
					<td>Tên</td>
					<td>:</td>
					<td><?php echo $result['name'] ?></td>
				</tr>
					<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><input type="text" name="address" value="<?php echo $result['address'] ?>"></td>
				</tr>
					<tr>
					<td>Thành phố</td>
					<td>:</td>
					<td><input type="text" name="city" value="<?php echo $result['city'] ?>"></td>
				</tr>
				<tr>
					<td>Quốc gia</td>
					<td>:</td>
					<td><select id="country" name="country" onchange="change_country(this.value)" class="frm-field required" style="width:240px;height:35px">
								<option ><?php echo $result['country'] ?></option>         
								<option value="VN">Việt Nam</option>
								<option value="HQ">Hàn Quốc</option>
								<option value="MY">Mỹ</option>
								<option value="TQ">Trung Quốc</option>
			         </select></td>
					
				</tr>
					<tr>
					<td>MSSV</td>
					<td>:</td>
					<td><?php echo $result['mssv'] ?></td>
				</tr>
					<tr>
					<td>Lớp</td>
					<td>:</td>
					<td><?php echo $result['class'] ?></td>
				</tr>
					<tr>
					<td>Khoa</td>
					<td>:</td>
					<td><?php echo $result['department'] ?></td>
				</tr>
					<tr>
					<td>Điện thoại</td>
					<td>:</td>
					<td><input type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
				</tr>
					<tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" name="email" value="<?php echo $result['email'] ?>"></td>
				</tr>
					<tr>
					<td>Mật khẩu</td>
					<td>:</td>
					<td><input type="password" name="password" value="<?php echo $result['name'] ?>"></td>
				</tr>
					 <?php
					}
				}
				?>
				<tr>
					<td colspan="3"><input  type="submit" name="submit" value="Cật nhật" style="width:100px;height:35px;font-size: 18px;margin-top:20px;"></td>
				</tr>
				
				
			</table>
			</form>
 		</div>
 	</div>
<style>
.tblone th {
  background: #666 none repeat scroll 0 0;
  color: #fff;
  font-size: 20px;
  padding: 5px 8px;
  text-align: center;
}
.tblone td{padding:10px;text-align:center;}

table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
table.tblone tr:nth-child(2n){background:#ffd985;height:30px;}
table.tblone input[type="number"] {
  border: 1px solid #ddd;
  padding: 2px;
  width: 60px;
}
table.tblone input[type="submit"] {
  background: #333 none repeat scroll 0 0;
  border: 1px solid #000;
  border-radius: 3px;
  color: #fff;
  cursor: pointer;
  font-size: 14px;
  padding: 1px 5px;
}
table.tblone a {
  color: #fe5800;
  font-weight: bold;
  text-decoration: none;
}
table.tblone a:hover{color: #000;}
table.tblone img {
  height: 60px;
  width: 60px;
}
</style>
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