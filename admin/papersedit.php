<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/department.php';?>
<?php include '../classes/papers.php';?>
<?php
    $paper = new papers();

    if(!isset($_GET['papersId']) || $_GET['papersId']==NULL){
       echo "<script>window.location ='paperslist.php'</script>";
    }else{
         $id = $_GET['papersId']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updatePapers= $paper->update_papers($_POST,$_FILES, $id);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Cập nhật giấy tờ</h2>
        <div class="block">    
         <?php

                if(isset($updatePapers)){
                    echo $updatePapers;
                }

                ?>        
               <?php
                        $paper = new papers();
                        $get_papers = $paper->show_paper($id);
                        if($get_papers){
                            while($result_papers = $get_papers->fetch_assoc()){

                ?>  
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="papersName" placeholder="Nhập tên giấy tờ..." class="medium" value="<?php echo  $result_papers['papersName']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phòng ban</label>
                    </td>
                    <td>
                        <select id="select" name="departmentId">
                            <option>---Lựa chọn Phòng ban---</option>
                            <?php 
                            $depart = new department();
                            $departlist = $depart->show_department();
                           
                            if($departlist){
                                while($result = $departlist->fetch_assoc()){
                           
                            ?>
                            <option <?php
                            if($result['departmentId']==$result['departmentId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['departmentId'] ?>"><?php echo $result['departmentName'] ?></option>
                               
                                <?php 
                                    }
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Miêu tả sản phẩm</label>
                    </td>
                    <td>
                        <textarea id="editor1" name="papers_desc" cols="30" rows="10"><?php echo $result_papers['papers_desc'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Cập nhật file</label>
                    </td>
                    <td>
                        <?php echo $result_papers['file'] ?> <br>
                        <input type="file" name="file"   />
                    </td>
                </tr>
               
                <tr>
                    <td></td>
                    <td>
                        <input style="margin-top:10px; width: 150px; height: 35px;cursor: pointer;" type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
        }

        }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>

