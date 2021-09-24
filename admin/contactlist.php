<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include ('../classes/contact.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
        $ct = new contact();
        $insertContact = $adm->insert_contact($_POST);
        
    }
?>
<?php 
    $ct = new contact();
    $fm = new Format();
    if(isset($_GET['ct_Id'])){
        $id = $_GET['ct_Id']; 
        $delct = $ct->del_contact($id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách thư</h2>
        <div class="block"> 
     <?php
                if(isset($delct)){
                    echo $delct;
                }
        ?>
            <table class="display datatable" id="example">
                    <thead id="thead">
                        <tr>
                            <th>TT</th>
                            <th>Họ và tên</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>E-mail</th>
                            <th>Ý kiến</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $ct = new contact();
                        $get_contact = $ct->show_contact();
                        if($get_contact){
                            while($result = $get_contact->fetch_assoc()){

                    ?>
                        <tr class="odd gradeX limit">

                            <td ><?php echo $i ?></td>
                            <td ><?php echo $result['ct_Name'] ?></td>
                            <td ><?php echo $result['ct_Phone'] ?></td>
                            <td ><?php echo $result['ct_Address'] ?></td>
                            </td>
                            <td ><?php echo $result['ct_Email'] ?></td>
                            <td ><?php echo $result['ct_Inbox'] ?></td>
                            
                            <td ><a onclick = "return confirm('Bạn có muốn xóa?')" href="?ct_Id=<?php echo $result['ct_Id'] ?>">Xóa</a></td>
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
