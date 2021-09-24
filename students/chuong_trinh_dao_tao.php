<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="chuong_trinh_dao_tao.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
	<title>Chương trình đào tạo</title>
</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
<script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
<div class="pagecontent">
	 <div class="logo">
		<img src="images/logo.png">
		<div class="logo-name">
			<p>PHÂN HIỆU ĐẠI HỌC ĐÀ NẴNG TẠI KON TUM</p>
			<p>The University of Danang - Campus in Kon Tum</p>
			<p>Website UDCK</p>
		</div>
		
		<button ><a href="login.php">ĐĂNG NHẬP</a></button>
	</div>
	<div class="menu">
		
			<li><a href="index.php">Trang chủ</a></li>
			<li><a href="#">Chương trình đào tạo</a></li>
			<li><a href="#">Quy chế & Quy định</a></li>
			<li><a href="#">Biểu mẫu cho sinh viên</a></li>
	</div>
<div class="home row"><a href="index.php">Trang chủ</a><span>&#10095;</span><a href="chuong_trinh_dao_tao.php">Chương trình đào tạo</a></div>
<h1 class="title">Chương trình đào tạo</h1>
<div id="wrapper">
<table class="tblData">
<thead>
	<tr>
		<th style="width: 40px;">STT</th>
		<th>Mã Khoa</th>
		<th>Khoa</th>
		<th style="width: 160px;"></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td align="center">1</td>
		<td>P.009</td>
		<td>
			<a href="#" style="font-size: 14px;font-weight: bold;">Khoa Kinh Tế</a>
			</td>
			<td align="center">
				<a href="#">
				<span class="fa fa-fw fa-chevron-circle-right">
				</span>Xem danh sách CTĐT
			</a>
		</td>
	</tr>
	<tr>
		<td align="center">2</td>
		<td>P.010</td>
		<td>
			<a href="#" style="font-size: 14px;font-weight: bold;">Khoa Kỹ Thuật-Nông Nghiệp</a>
			</td>
			<td align="center">
				<a href="#">
				<span class="fa fa-fw fa-chevron-circle-right">
				</span>Xem danh sách CTĐT
			</a>
		</td>
	</tr>
	<tr>
		<td align="center">3</td>
		<td>P.011</td>
		<td>
			<a href="#" style="font-size: 14px;font-weight: bold;">Khoa Sư Phạm & Dự bị đại học</a>
			</td>
			<td align="center">
				<a href="#">
				<span class="fa fa-fw fa-chevron-circle-right">
				</span>Xem danh sách CTĐT
			</a>
		</td>
	</tr>
</tbody>
</table>
</div>
</body>
<div class="bottom-copyright">
		<p>Copyright © 2021 - Bản quyền thuộc về Trung tâm Phát triển Phần mềm – Đại học Đà Nẵng.</p>
	</div>
</div>
</html>