<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	include ('../classes/admissions.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
      	$adm = new admissions();
        $insertAdmissions = $adm->insert_admissions($_POST);
        
    }
?>
<?php 
	$adm = new admissions();
	$fm = new Format();
	if(isset($_GET['admId'])){
        $id = $_GET['admId']; 
        $deladm = $adm->del_admissions($id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách tư vấn</h2>
        <div class="block"> 
        <?php
		        if(isset($deladm)){
		        	echo $deladm;
		        }
		?>
            <table class="data display datatable" id="example">
					<thead >
						<tr>
							<th>TT</th>
							<th>Họ và tên</th>
							<th>SĐT</th>
							<th>Ngày sinh</th>
							<th>Địa chỉ</th>
							<th>Tên phụ huynh</th>
							<th>SĐT phụ huynh</th>
							<th>Quê quán</th>
							<th>Giới tính</th>
							<th>Hoạt động</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$i = 1;
						$adm = new admissions();
						$get_admissions = $adm->show_admissions();
						if($get_admissions){
							while($result = $get_admissions->fetch_assoc()){

					?>
						<tr class="odd gradeX limit">

							<td ><?php echo $i ?></td>
							<td ><?php echo $result['admName'] ?></td>
							<td ><?php echo $result['admPhone'] ?></td>
							<td ><?php echo $result['admDate'] ?></td>
							<td ><?php echo $result['admAddress'] ?></td>
							
							<td ><?php echo $result['admParents'] ?></td>
							<td ><?php echo $result['admPhoneparents'] ?></td>
							<td ><?php echo $result['admHometown'] ?></td>
							<td ><?php echo $result['admGender'] ?></td>
							
							
							<td><a onclick = "return confirm('Bạn có muốn xóa?')" href="?admId=<?php echo $result['admId'] ?>">Xóa</a></td>
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
