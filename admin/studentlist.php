<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	include ('../classes/student.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
      	 $st = new student();
        $insertStudents = $st->insert_students($_POST);
        
    }
?>
<?php 
	$st = new student();
	$fm = new Format();
	if(isset($_GET['id'])){
        $id = $_GET['id']; 
        $delstu = $st->del_student($id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách sinh viên</h2>
                <div class="block">    
                <?php
		        if(isset($delstu)){
		        	echo $delstu;
		        }
		        ?>   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th >TT</th>
							<th>Tên SV</th>
							<th>Địa chỉ</th>
							<th>Thành Phố</th>
							<th>Quốc gia</th>
							<th>MSSV</th>
							<th>Lớp</th>
							<th>Khoa</th>
							<th>SĐT</th>
							<th>Email</th>
							<th>Hoạt động</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$i = 1;
						$st = new student();
						$get_students = $st->show_students();
						if($get_students){
							while($result = $get_students->fetch_assoc()){

					?>
						<tr class="odd gradeX ">

							<td ><?php echo $i ?></td>
							<td ><?php echo $result['name'] ?></td>
							<td ><?php echo $result['address'] ?></td>
							<td ><?php echo $result['city'] ?></td>
							<td ><?php echo $result['country'] ?></td>
							<td ><?php echo $result['mssv'] ?></td>
							<td ><?php echo $result['class'] ?></td>
							<td ><?php echo $result['department'] ?></td>
							<td ><?php echo $result['phone'] ?></td>
							<td ><?php echo $result['email'] ?></td>
							
							
							<td ><a href="studentedit.php?id=<?php echo $result['id'] ?>">Sửa</a><span style="color: red;">&#8214;</span><a onclick = "return confirm('Bạn có muốn xóa?')"  href="?id=<?php echo $result['id'] ?>">Xóa</a></td>
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
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>