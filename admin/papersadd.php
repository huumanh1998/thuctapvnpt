<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/department.php';?>
<?php include '../classes/papers.php';?>
<?php
    $paper = new papers();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
       
        $insertPapers = $paper->insert_papers($_POST,$_FILES);
        
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm giấy tờ</h2>

               <div class="block copyblock"> 
                 <?php
                if(isset($insertPapers)){
                    echo $insertPapers;
                }
                ?>
                 <form action="papersadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="papersName" placeholder="Nhập tên giấy tờ..." class="medium" />
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
                            <option value="<?php echo $result['departmentId'] ?>"><?php echo $result['departmentName'] ?></option>
                               
                                <?php 
                                    }
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Miêu tả </label>
                    </td>
                    <td>
                        <textarea id="editor1" name="papers_desc" class="tinymce"  cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thêm file</label>
                    </td>
                    <td>
                        <input type="file" name="file" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input style="margin-top:10px; width: 150px; height: 35px;cursor: pointer;" type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>