<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'./../lib/session.php');
?>
<?php
		   	$login_check = Session::get('student_login');
		   	if($login_check){
		   		header('Location:students/home.php');
		   	}	   	
?>

<?php
  	$filepath = realpath(dirname(__FILE__));
    include ($filepath.'./../classes/student.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
       	$st = new student();
        $login_Students = $st->login_students($_POST);
        
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Đăng Nhập UD-CK</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/login.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
			
				   <div class="error_page">
							<!--/login-top-->
							
								<div class="error-top">
								<!-- <h2 class="inner-tittle page">Students Login</h2> -->
								    <div class="login">
									<?php
										if(isset($login_Students)){
							    			echo $login_Students;
							    		}
					        	 	?>
									<h3 class="inner-tittle t-inner">Đăng Nhập</h3>
											<form method="post">
													<input type="text" class="text" name="mssv" placeholder="Mã Sinh Viên">
													<input type="password" placeholder="Mật Khẩu" name="password">
													<div class="submit"><input type="submit" value="Đăng Nhập" name="login"></div>
													<div class="clearfix"></div>
													
													<div class="new">
														<p><label class="checkbox11"><input type="checkbox" name="checkbox"><i> </i>Lưu Mật Khẩu?</label></p>
														
														<div class="clearfix"></div>
													</div>
												</form>
									</div>

									
								</div>
								
								
							<!--//login-top-->
					   </div>
	
					  	<!--//login-->
					    <!--footer section start-->
					  
					    </div>
					<div class="footer">
							<div class="error-btn">
										<a class="read fourth" href="http://localhost/webthuctap/index.php">Quay Lại</a>
										</div>
					   <p>&copy 2021 | <a href="http://localhost/webthuctap/index.php" target="_blank">UD-CK</a></p>
					</div>
				<!--footer section end-->
				<!--/404-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>