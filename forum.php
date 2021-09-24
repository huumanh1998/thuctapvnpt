<?php
    include './lib/session.php';
    Session::init();

?> 

<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php include './classes/forum.php';?>
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
	<link rel="stylesheet" href="css/forum.css"> <!-- forum-CSS -->
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
<!-- Forum -->
<div class="upforum" style="margin-top:30px;"><a href="upforum.php" style="color:#337ab7; margin:0 0 0 15px;font-size: 30px;">Đăng bài</a></div>
<header style="margin-top: 20px;">
        <!--SearchBox Section-->
        <div class="search-box">
            <div>
               
               <form action="searchforum.php" method="post">
				    	<input type="text" name="tukhoa" placeholder="Tìm kiếm ...">
                		<button type="submit"><i class="fa fa-search" style="font-size:18px;"></i></button>
				</form>
               
            </div>
        </div>
    </header>
    <div class="container-forum">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Các bài đăng</h1>
            </div>
            <?php
						
						$fr = new forum();
						$get_forum = $fr->show_forum();
						if($get_forum){
							while($result = $get_forum->fetch_assoc()){

					?>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-book center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="detailforum.php?id=<?=$result['forum_Id']?>">Tiêu đề</a></h4>
                    <p><?php echo $result['title'] ?></p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>Bình luận: <?=$fr->count_binhluan($result['forum_Id'])->fetch_assoc()['count']  ?> <span style="color:red;">&#8214; </span>	
                    	Trả lời: <?=$fr->count_rep($result['forum_Id'])->fetch_assoc()['count']  ?></span>
                </div>
                <div class="subforum-info subforum-column center" style="">
                    <b><a href="">Bài đăng lúc: </a></b>  <a href=""><?php echo $result['date_forum'] ?></a>
                    
                </div>
            </div>
            	<?php
						
							}
						}
						?>
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