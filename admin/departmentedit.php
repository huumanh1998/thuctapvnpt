<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include ('../classes/department.php');
    if(!isset($_GET['departmentId']) || $_GET['departmentId']==NULL){
       echo "<script>window.location ='departmentlist.php'</script>";
    }else{
         $id = $_GET['departmentId']; 
    }
     $depart = new department();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $departmentName = $_POST['departmentName'];
        $updateDepart = $depart->update_department($departmentName,$id);
        
    }
   
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Cập nhật phòng ban</h2>

               <div class="block copyblock"> 
                <?php
                if(isset($updateDepart)){
                    echo $updateDepart;
                }
                ?>
                <?php 
                    $id = $_GET['departmentId']; 
                    $get_depart_name = $depart->getdepartbyId($id);
                    if($get_depart_name){
                        while ($result = $get_depart_name->fetch_assoc()) {

                ?> 
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input style="height: 35px; width: 250px;" type="text" name="departmentName" value="<?php echo $result['departmentName'] ?>" placeholder="Cập nhật phòng ban..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input style="height: 35px; width: 150px;" type="submit" name="submit" Value="Cập nhật" />
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
<?php include 'inc/footer.php';?>