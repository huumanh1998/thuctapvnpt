<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	include ('../classes/department.php');
    $depart = new department();
   if(isset($_GET['delid'])){
         $id = $_GET['delid']; 
         $deldepart = $depart->del_department($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách phòng ban</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
							<th style="color:#1B548D;">Thứ tự.</th>
							<th style="color:#1B548D;">Tên phòng ban</th>
							<th style="color:#1B548D;">Hoạt động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_depart = $depart->show_department();
						if($show_depart){
							$i = 0;
							while ($result = $show_depart->fetch_assoc()) {
								$i++;
							
						
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['departmentName'] ?></td>
							<td><a href="departmentedit.php?departmentId=<?php echo $result['departmentId'] ?>">Sửa</a><span style="color: red;">&#8214;</span><a onclick = "return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['departmentId'] ?>">Xóa</a></td>
						</tr>
						<?php 
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

