<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include ('../classes/forum.php');?>
<?php 
    $fr = new forum();
    $fm = new Format();
    if(isset($_GET['id'])){
        $id = $_GET['id']; 
        $delforum = $fr->del_forum($id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách bình luận</h2>
                <div class="block">    
                 <?php
                if(isset($delforum)){
                    echo $delforum;
                }
                ?>
                    <table class="display datatable" id="example">
                    <thead id="thead">
                        <tr>
                            <th>TT</th>
                            <th>Tên Sinh viên</th>
                            <th>Bình luận</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        
                        $fr = new forum();
                        $get_forum_binhluan = $fr->show_binhluan_admin();
                        if($get_forum_binhluan){
                            while($result = $get_forum_binhluan->fetch_assoc()){

                    ?>
                        <tr class="odd gradeX limit">

                            <td style="max-width: 3%;height: auto; text-align: center;"><?php echo $i ?></td>
                            <td style="max-width: 13%;height: auto;text-align: center;"><?=$result['name'] ? $result['name']: $result['adminName']?></td>
                            <td style="max-width: 18%;height: auto;text-align: center;"><?php echo $result['binhluan'] ?></td>
                            
                            
                            <td style="max-width: 5%;height: auto;text-align: center;" ><a href="../detailforum.php?id=<?php echo $result['forum_Id']?>">Xem</a></td>
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