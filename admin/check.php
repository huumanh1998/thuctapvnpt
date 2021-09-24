<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/forum.php';?>
<?php include '../classes/department.php';?>
<?php include '../classes/papers.php';?>
<?php include ('../classes/student.php');?>
<?php include_once'../helpers/format.php';?>
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
    $fm = new Format();
    if(isset($_GET['id'])){
        $id = $_GET['id']; 
        $delforum = $fr->del_forum($id);
    }

?>
<?php
    $fr = new forum();
    if(isset($_GET['kiemtra_forum']) && isset($_GET['kiemtra'])){
        $id = $_GET['kiemtra_forum'];
        $kiemtra = $_GET['kiemtra'];
        $update_kiemtra = $fr->update_kiemtra($id,$kiemtra);

    }
    if(isset($_GET['delforum'])){
        $id = $_GET['delforum'];
        $delforum = $forum->delforum($id);

    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách bài đăng</h2>
        <div class="block"> 
        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
		
                        <th>TT</th>
                        <th>Tên SV</th>
                        <th>Tiêu đề</th>
                       	<th>Mô tả</th>
                        <th>Duyệt bài</th>
                        <th>Hoạt động</th>
                 
				</tr>
			</thead>
			<tbody>
				 <?php
                        $i = 1;
                        $fr = new forum();
                        $get_forum = $fr->show_forum_admin();
                        if($get_forum){
                            while($result = $get_forum->fetch_assoc()){

                    ?>
                   
				<tr class="odd gradeX l">

                            <td ><?php echo $i ?></td>
                            <td ><?php echo $result['name'] ?></td>
                            <td ><?php echo $result['title'] ?></td>
                            <td ><?php echo $result['desc_forum'] ?></td>
                            <td >   <?php
                        if($result['kiemtra']==1){
                        ?>
                        <a href="?kiemtra_forum=<?php echo $result['forum_Id'] ?>&kiemtra=0">Duyệt</a> 
                        <?php
                         }else{
                        ?>  
                        <a href="?kiemtra_forum=<?php echo $result['forum_Id'] ?>&kiemtra=1">Không duyệt</a> 
                        <?php
                        }
                        ?></td>
                            <td ><a onclick = "return confirm('Bạn có muốn xóa?')" href="?id=<?php echo $result['forum_Id'] ?>">Xóa</a></td>
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
