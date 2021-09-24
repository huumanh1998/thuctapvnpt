<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    include ('../classes/student.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
         $st = new student();
        $insertStudents = $st->insert_students($_POST);
        
    }
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Đăng ký tài khoản mới</h2>

               <div class="block copyblock"> 
                <?php 
                if(isset($insertStudents)){
                    echo $insertStudents;
                }
                ?>
                <form action=""method="POST">
                         <table>
                            <tbody>
                            <tr>
                            <td>
                                <div>
                                <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;"
                                        type="text" name="name" placeholder="Nhập Tên...">
                                </div>
                                
                                <div>
                                   <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;"
                                        type="text" name="city" placeholder="Nhập Thành phố..." >
                                </div>
                                    <div>
                                <select style="font-size: 12px;
                                        color: #6C6C6C;
                                        padding: 8px;
                                        outline: none;
                                        margin: 5px 0;
                                        height: 36px;
                                        width: 220px;"
                                        id="department" name="department" onchange="change_department(this.value)" class="frm-field required">
                                    <option value="null">Chọn Khoa</option>         
                                    <option value="KTNN">KT-NN</option>
                                    <option value="SP">Sư Phạm</option>
                                    <option value="KT">Kinh Tế</option> 
                                </select>
                                </div>  
                                <div>
                                    <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;" 
                                        type="text" name="class" placeholder="Nhập Lớp..." >
                                </div>
                                <div>
                                    <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;" 
                                        type="text" name="mssv" placeholder="Nhập MSSV..." >
                                </div>
                                
                        
                            </td>
                            <td>
                            <div>
                                    <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;"
                                        type="text" name="email" placeholder="Nhập E-Mail...">
                            </div>
                            <div>
                                <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;" 
                                        type="text" name="address" placeholder="Nhập Địa chỉ...">
                            </div>
                             <div>
                            <select style="font-size: 12px;
                                        color: #6C6C6C;
                                        padding: 8px;
                                        outline: none;
                                        margin: 5px 0;
                                        height: 36px;
                                        width: 220px;"
                                        id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                                <option value="null">Chọn Quốc gia</option>         
                                <option value="VN">Việt Nam</option>
                                <option value="HQ">Hàn Quốc</option>
                                <option value="MY">Mỹ</option>
                                <option value="TQ">Trung Quốc</option>
                            </select>
                        </div>       
        
                       <div>
                      <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;"
                                        type="text" name="phone" placeholder="Nhập số điện thoại...">
                      </div>
                      
                      <div>
                        <input style="font-size:12px;
                                        color:#B3B1B1;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;"
                                        type="text" name="password" placeholder="Nhập mật khẩu...">
                    </div>
                        
                    </td>
                </tr> 
                </tbody></table> 
               <div class="search">
                
                <div><input style="font-size:12px;
                                        color:#000;
                                        padding:8px;
                                        outline:none;
                                        margin:5px 0;
                                        width:200px;" 
                                        id="signup" type="submit" name="submit" class="grey" value="Đăng ký"></div>

               </div>
                </p>
                <div class="clear"></div>
                </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>