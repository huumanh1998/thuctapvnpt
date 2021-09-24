<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/department.php';?>
<?php include '../classes/papers.php';?>
<?php include '../classes/scanf.php';?>
<?php
    $scanf = new scanf();
    if(isset($_GET['shiftid'])){
        $id = $_GET['shiftid'];
        $time = $_GET['time'];
        $shifted = $scanf->shifted($id,$time);
    }

    if(isset($_GET['delsc'])){
        $id = $_GET['delsc'];
        $time = $_GET['time'];
        $del_shifted = $scanf->del_shifted($id,$time);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách phản hồi</h2>
                <div class="block">    
                 <?php 
                if(isset($shifted)){
                    echo $shifted;
                }

                ?>  
                <?php 
                if(isset($del_shifted)){
                    echo $del_shifted;
                }
                
                ?>  
                   <table class="display datatable" id="example">
                    <thead id="thead">
                        <tr>
                            <th>TT</th>
                            <th>Tên sinh viên</th>
                            <th>Phòng ban</th>
                            <th>Miêu tả</th>
                            <th>Ngày hẹn</th>
                            <th>Địa điểm</th>
                            
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $scanf = new scanf();
                        $get_scanfs = $scanf->show_scanf();
                        if($get_scanfs){
                            while($result = $get_scanfs->fetch_assoc()){

                    ?>
                        <tr class="odd gradeX limit">

                            <td ><?php echo $i ?></td>
                            <td ><?php echo $result['name'] ?></td>
                            <td ><?php echo $result['departmentName'] ?></td>
                            <td ><?php echo $result['scanf_desc'] ?></td>
                            <td ><?php echo $result['scanf_Date'] ?></td>
                            <td ><?php echo $result['cmt'] ?></td>
                                
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