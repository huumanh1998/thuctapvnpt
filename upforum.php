<?php
    include './lib/session.php';
    Session::init();

?> 

<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php include ('./classes/student.php');?>
<?php include './classes/forum.php';?>
<?php
    $fr = new forum();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
       
        $insertForum = $fr->insert_forum($_POST,$_FILES);
        
    }
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

<!-- Forum -->
<div class="scanf" style="justify-content: center;justify-items: center;margin-top: 20px; margin-bottom:30px;">
	    		<h2>Đăng bài</h2>
	    		 <?php
                if(isset($insertForum)){
                    echo $insertForum;
                }
                ?>

	    		<form action="upforum.php" method="post" enctype="multipart/form-data">
            <table class="tblone" style="width:100%;height: 100%; font-size: 18px;margin-bottom: 50px;">
               <?php
						$id = Session::get('student_id');
						$st = new student();
						$get_students = $st->show_student($id);
						if($get_students){
							while($result = $get_students->fetch_assoc()){

					?>
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td >
                        <?php echo $result['name'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tiêu đề</label>
                    </td>
                    <td >
                         <input type="text" name="title" style="width:400px;" placeholder="Thêm tiêu đề..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea id="editor1" name="desc_forum" class="tinymce"  cols="30" rows="10"></textarea>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>File chi tiết</label>
                    </td>
                    <td>
                        <input  type="file" name="file_forum" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    	 <?php
					}
				}
				?>
                    <td>
                        <input style="margin-top:10px; width: 200px; height: 35px;cursor: pointer;" type="submit" name="submit" Value="Đăng bài" />
                    </td>
                </tr>
                <tr style="margin-top: 30px;">
					<td colspan="3"style="justify-content: center;justify-items: center;text-align: center;margin-bottom:10px;"><a href="viewmyforum.php" style="text-align:center;font-size:20px;font-weight: bold;color:,#e69f06;">Xem bài đã đăng</a></td>
					
				</tr>
            </table>
            </form>
	    	</div> 
<script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                
                CKEDITOR.replace( 'editor1', {
                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                } );

</script> 
<style >
	.scanf h2{
		text-align: center;
		margin-top: 20px;
		margin-bottom: 10px;
	}
	.tblone th {
	  background: #666 none repeat scroll 0 0;
	  color: #fff;
	  font-size: 20px;
	  padding: 5px 8px;
	
	}
	.tblone td{padding:10px;}
	table.tblone input[type="submit"] {
	  background: #333 none repeat scroll 0 0;
	  border: 1px solid #000;
	  border-radius: 3px;
	  color: #fff;
	  cursor: pointer;
	  font-size: 18px;
	  padding: 1px 5px;
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