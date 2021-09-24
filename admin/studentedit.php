<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include ('../classes/student.php'); ?>
<?php
    $st = new student();

    if(!isset($_GET['id']) || $_GET['id']==NULL){
       echo "<script>window.location ='studentlist.php'</script>";
    }else{
         $id = $_GET['id']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateStudent = $st->update_student($_POST, $id);
        
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Cập nhật tài khoản</h2>

               <div class="block copyblock"> 
                 <?php

                if(isset($updateStudent)){
                    echo $updateStudent;
                         }

                ?>        
                    <?php
                        $st = new student();
                        $get_students = $st->show_student($id);
                        if($get_students){
                            while($result = $get_students->fetch_assoc()){

                    ?>
                 <form action=""method="POST">
                         <table>
                            <tbody>
                            <tr>
                    <td>Tên</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                type="text" name="name" value="<?php echo $result['name'] ?>"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                type="text" name="address" value="<?php echo $result['address'] ?>"></td>
                    
                </tr>
                <tr>
                    <td>Thành phố</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                type="text" name="city" value="<?php echo $result['city'] ?>"></td>
                    
                </tr>
                <tr>
                    <td>Quốc gia</td>
                    <td>:</td>
                    <td><select style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 220px;" 
                                id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                                <option ><?php echo $result['country'] ?></option>         
                                <option value="VN">Việt Nam</option>
                                <option value="HQ">Hàn Quốc</option>
                                <option value="MY">Mỹ</option>
                                <option value="TQ">Trung Quốc</option>
                     </select></td>
                    
                </tr>
                <tr>
                    <td>Lớp</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                type="text" name="class" value="<?php echo $result['class'] ?>"></td>
                    
                </tr>
                <tr>
                    <td>Khoa</td>
                    <td>:</td>
                    <td><select style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 220px;" 
                                id="department" name="department" onchange="change_department(this.value)" class="frm-field required">
                                    <option ><?php echo $result['department'] ?></option>
                                    <option value="KTNN">KT-NN</option>
                                    <option value="SP">Sư Phạm</option>
                                    <option value="KT">Kinh Tế</option> 
                      </select></td>
                    
                </tr>
                <tr>
                    <td>SĐT</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;"
                                 type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
                
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                type="text" name="email" value="<?php echo $result['email'] ?>"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>:</td>
                    <td><input style="font-size: 12px;
                                color: #B3B1B1;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                type="text" name="password" value="<?php echo $result['password'] ?>"></td>
                    
                </tr>
                            
               
                </tbody></table> 
               <div class="search">
                
                <div><input style="font-size: 12px;
                                color: #000;
                                padding: 8px;
                                outline: none;
                                margin: 5px 0;
                                width: 200px;" 
                                 id="signup" type="submit" name="submit" class="grey" value="Cập nhật"></div>

               </div>
                </p>
                <div class="clear"></div>
                </form>

                <?php
                }
            }
                

                ?>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>