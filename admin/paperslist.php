<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/department.php';?>
<?php include '../classes/papers.php';?>
<?php include_once'../helpers/format.php';?>
<?php 
    $paper = new papers();
   if(isset($_GET['delpa'])){
         $id = $_GET['delpa']; 
         $delpapers = $paper->del_papers($id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách giấy tờ</h2>
        <div class="block"> 
        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
		
                        <th>TT</th>
                        <th>Tên giấy tờ</th>
                        <th>Phòng ban</th>
                       	<th>Mô tả giấy tờ</th>
                        <th>Tên file</th>
                        <th>Hoạt động</th>
                 
				</tr>
			</thead>
			<tbody>
				<?php
                        $i = 1;
                        $paper = new papers();
                        $get_papers = $paper->show_papers();
                        if($get_papers){
                            while($result = $get_papers->fetch_assoc()){

                    ?>
				<tr class="odd gradeX l">

                            <td ><?php echo $i ?></td>
                            <td ><?php echo $result['papersName'] ?></td>
                            <td ><?php echo $result['departmentName'] ?></td>
                            <td ><?php echo $result['papers_desc'] ?></td>
                            <td ><?php echo $result['file'] ?></td>
                            
                            
                            
                            <td ><a href="papersedit.php?papersId=<?php echo $result['papersId'] ?>">Sửa</a><span style="color: red;">&#8214;</span><a onclick = "return confirm('Bạn có muốn xóa?')" href="?delpa=<?php echo $result['papersId'] ?>">Xóa</a></td>
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
