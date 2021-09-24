<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    include ('../classes/department.php');
    $depart = new department();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $departmentName = $_POST['departmentName'];
       
        $insertDepart = $depart->insert_department($departmentName);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm phòng ban</h2>
                 <?php
                if(isset($insertDepart)){
                    echo $insertDepart;
                }
                ?>
        <div class="block copyblock">               
         <form action="departmentadd.php" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input style="height: 35px; width: 250px;" type="text" name="departmentName" placeholder="Thêm phòng ban..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input style="height: 35px; width: 150px;" type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
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


