<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/scanf.php';?>
<?php include ('../classes/student.php');?>
<?php
   $sc = new scanf();

    if(!isset($_GET['scanf_Id']) || $_GET['scanf_Id']==NULL){
       echo "<script>window.location ='scanfadmin.php'</script>";
    }else{
         $id = $_GET['scanf_Id']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
        $updateFeedback = $sc->update_feedback($_POST, $id);
        
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Phản hồi giấy tờ cho sinh viên</h2>

               <div class="block copyblock"> 
                 <?php

                if(isset($updateFeedback)){
                    echo $updateFeedback;
                         }

                ?>        
                    <?php
                        $sc = new scanf();
                        $get_scanf = $sc->scanfId($id);
                        if($get_scanf){
                            while($result = $get_scanf->fetch_assoc()){

                    ?>
                 <form action=""method="POST">
                <table style="margin-top: 20px;">
                <tbody>
                <tr style="">
                    <td>Tên</td>
                    <td>:</td>
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>Phòng ban</td>
                    <td>:</td>
                    <td><?php echo $result['departmentName'] ?></td>
                    
                </tr>
                <tr>
                    <td>Ngày hẹn</td>
                    <td>:</td>
                    <td><input class="date" id="datepicker" name="scanf_Date" type="text" value="" onfocus="this.value = '';" 
                    	onblur="if (this.value == '') {this.value = 'dd/mm/yyyy';}" required="" /></td>
                    
                </tr>
                
                
                <!-- <tr>
                    <td>Tên file</td>
                    <td>:</td>
                    <td><p><?php echo $result['scanf_file'] ?></p></td>
                    
                </tr> -->
                <tr>
                    <td>Địa điểm</td>
                    <td>:</td>
                    <td><input style="width: 180px;" type="text" name="cmt" placeholder="Nhập phản hồi" value="<?php echo $result['cmt'] ?>"></td>
                
                </tr>
                <!-- <tr>
                    <td>Trạng thái</td>
                    <td>:</td>
                    <td><p><?php echo $result['status'] ?></p></td>
                </tr> -->
                <tr>
                    <td>Ngày gửi</td>
                    <td>:</td>
                    <td><?php echo $result['date_scanf'] ?></td>
                    
                </tr>
                 <tr>
                    <td>Mô tả</td>
                    <td>:</td>
                    <td><?php echo $result['scanf_desc']?></td>
                    
                </tr>
                            
                <?php
                        
                            }
                        }
                ?>
                </tbody></table> 
               <div class="search">
                
                <div><input id="signup" type="submit" name="submit" class="grey" value="Gửi"  style="height: 35px; width: 150px; color: #000;"></div>

               </div>
                </p>
                <div class="clear"></div>
                </form>

              

                </div>
            </div>
        </div>
        <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-ui.js"></script>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker();
     });
    </script>
<?php include 'inc/footer.php';?>