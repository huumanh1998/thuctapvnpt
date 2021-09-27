<?php
    include './lib/session.php';
    Session::init();
    include_once ('./lib/database.php');
    $db = new Database();
?> 

<?php include './classes/department.php';?>
<?php include './classes/papers.php';?>
<?php include './classes/forum.php';?>
<?php
  	$fr = new forum();
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$shifted_confirm = $forum->shifted_confirm($id,$time);
    }
    $fm = new Format();
?>
<?php
    $fr = new forum();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	if(isset($_POST['cmt'])){
    		 $binhluan = $_POST['binhluan'];
    		 $binhluan_Id = $_GET['binhluan_Id'];
    		 $insertBinhluan = $fr->rep_binhluan($binhluan,$_GET['id'], $binhluan_Id);
    	}else{
    	$binhluan = $_POST['binhluan'];
       
        $insertBinhluan = $fr->insert_binhluan($binhluan,$_GET['id']);	
    	}
    	$id = $_GET['id'];
    	header("Location:detailforum.php?id=$id");
    }
    if(isset($_GET['xoa'])) {
    	$fr->deletebinhluan($_GET['xoa']);
    }
?>

<?php
	
	$login_check = Session::get('student_login'); 
	$login_check_admin = Session::isAdmin();
	$ok = false;
	if($login_check || $login_check_admin) {
		$ok = true;
	}
	if (!$ok)
		header('Location:login.php');
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
<!-- <div class="upforum" style="margin-top:30px;"><a href="upforum.php" style="color:#337ab7; margin:0 0 0 15px;font-size: 30px;">Đăng bài</a></div> -->

        <!--SearchBox Section-->
  <!--   <header style="margin-top: 20px;">
        <div class="search-box">
            <div>
               
               <form action="searchforum.php" method="post">
				    	<input type="text" name="tukhoa" placeholder="Tìm kiếm ...">
                		<button type="submit"><i class="fa fa-search"></i></button>
				</form>
               
            </div>
        </div>
    </header> -->
    <div class="container-forum">
         <div class="container">
       
         <?php
							$id = $_GET['id'];
							$get_forum_detail = $fr->get_details($id);
							if($get_forum_detail){
								$i = 0;
								while($result = $get_forum_detail->fetch_assoc()){
									$i++;
							?>
        <!--Topic Section-->
        <div class="topic-container">
            <!--Original thread-->
            <div class="head">
                <div class="authors-1" style="color: #337ab7;font-size:25px;flex:100%;">Tiêu đề: <?php echo $result["title"]?></div>
                <div class="content"></div>
            </div>

            <div class="body">
                <div class="authors">
                    <div class="username"><a href="">Người đăng</a></div>
                    <div><p style="color: black;"><?php echo $result["name"]?></p></div>
                    <img src="images/avatarforum.jpg" alt="">
                    <div>Bài viết: <u><?php echo $result['forum_Id'] ?></u></div>
                    
                </div>
                <div class="detail">
                	<p style="color: black; font-size:16px; font-weight: bold;">File chi tiết</p>
                   <td><a href="/webthuctapvnpt1/thuctapvnpt/admin/uploads/<?=$result['file_forum']?>"><img src="images/download.png" width="25" height="25" ></a>
														</td>
                  
                </div>
                <div class="content">
                	<p style="color: black; font-size:16px; font-weight: bold;">Nội dung</p>
                    <p style="color: black;"><?php echo $result["desc_forum"]?></p>
                    <div class="comment">
                        <button onclick="showComment()">Bình luận</button>
                    </div>
                </div>
            </div>
        </div>
					<?php
						
							}
						}
					?>
        <!--Comment Area-->
        
        <div class="comment-area hide" id="comment-area">
        	 <?php
                if(isset($insertBinhluan)){
                    echo $insertBinhluan;
                }
                ?>
        <form action="detailforum.php?id=<?=$id?>" method="post">
            <textarea name="binhluan" id="" type="text" placeholder="Nhập bình luận ... "></textarea>
            <input type="submit" name="submit" value="Gửi bình luận">
        </form>
        </div>
     	
        <?php
        $id = $_GET['id'];
        $binhluan = $fr -> show_binhluan($id);
        if($binhluan){
        while($result = $binhluan->fetch_assoc())
        {
        ?>	
      
        
        	<p style="color: black;margin-top:20px;"><i style="font-size:25px;margin-right: 10px;"class="fa fa-user-circle-o" aria-hidden="true"></i><?=$result['name'] ? $result['name']: $result['adminName']?>:<?=$result['binhluan']?></p>
        <div class="comment-rep">
                   <i style="color:#337ab7;font-size:18px;margin-left: 35px;"class="fa fa-commenting-o" ></i> <button  style="border:none;background:#fff;color:#337ab7;font-size:15px;" onclick="showComment1(<?=$result['binhluan_Id']?>)">Bình luận</button>
                <?php
					if (Session::isAdmin() || Session::get('student_id') == $result['id']) {
                     ?>
                    <i style="color:#337ab7;font-size:17px;" class="fa fa-trash-o"></i>
                    <a style="color:#337ab7;font-size:15px;margin-left: 5px;font-weight:400;" 
                    href="detailforum.php?id=<?=$id?>&xoa=<?=$result['binhluan_Id']?>">Xóa</a>
                <?php }?>
        
          <div class="comment-area-rep hide" id="comment-area-rep<?=$result['binhluan_Id']?>">
        	<form action="detailforum.php?id=<?=$id?>&binhluan_Id=<?=$result['binhluan_Id']?>" method="post">
            	<textarea style="width: 100%;height: 50px;margin-top:10px;" name="binhluan" id="" type="text" placeholder="Nhập bình luận ... "></textarea>
            	<input style="margin:5px 0 5px 0;" type="submit" name="cmt" value="Gửi bình luận">
        	</form>
          </div>
       	
		<style>
			#Gach {
				    margin-bottom: 10px;
				    padding-bottom: 20px;
				    border-bottom: 2px solid #337ab7;
				    overflow: hidden;
				}
		</style>
		        <?php 
		        $rep_binhluan = $fr -> show_rep($id,$result['binhluan_Id']);
		        if($rep_binhluan){
		        while($result2 = $rep_binhluan->fetch_assoc())
		        {
		        ?>

		        	<p style="margin: 10px 10px 0 50px; color:black;"><i style="font-size:25px;" class="fa fa-user-o" aria-hidden="true"></i><?=$result2['name'] ? $result2['name']: $result2['adminName']?>:<?=$result['binhluan']?></p>
		        	<?php
					if (Session::isAdmin() || Session::get('student_id') == $result2['id']) {
                     ?>
                    <i style="color:#337ab7;font-size:17px; margin-left:75px;" class="fa fa-trash-o"></i>
                    <a style="color:#337ab7;font-size:15px;margin-left: 5px;font-weight:400;"
                    href="detailforum.php?id=<?=$id?>&xoa=<?=$result2['binhluan_Id']?>">Xóa</a>
                <?php }?>
		        	
		        <?php
		    	}
		        }
		        ?>
		        </div>
		        <section id="Gach">
				</section>
        <?php
    	}
        }
        ?>
      

       

    </div>
       
    </div>

<script src="main.js"></script>

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