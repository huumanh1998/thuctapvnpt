<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    include_once ($filepath.'./../lib/session.php');
    Session::init();
?>
<?php
/**
 * 
 */
class student
{
    private $db;
    private $fm;
    function __construct()
    {
            $this->db = new Database();
            $this->fm = new Format();
    }
    public function search_students($tukhoa){
            $tukhoa = $this->fm->validation($tukhoa);
            $query = "SELECT * FROM tbl_student WHERE mssv LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;

        }
    public function login_students($data){
            $mssv = mysqli_real_escape_string($this->db->link, $data['mssv']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($mssv=='' || $password==''){
                $alert = "<span class='error'>Mật khẩu và Mssv không được để trống.</span>";
                return $alert;
            }else{
                $check_login = "SELECT * FROM tbl_student WHERE mssv='$mssv' AND password='$password'";
                $result_check = $this->db->select($check_login);
                if ($result_check){
                    
                    $value = $result_check->fetch_assoc();
                    Session::set('student_login',true);
                    Session::set('student_id',$value['id']);
                    Session::set('student_name',$value['name']);
                    header('Location:home.php');
                    $alert = "<span class='success'>Đăng nhập thành công <a href='home.php'></a></span>";
                        return $alert;
                }else{
                    $alert = "<span class='error'>Mssv hoặc mật khẩu không khớp.</span>";
                    return $alert;
                }
            }
        }
            public function insert_students($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $mssv = mysqli_real_escape_string($this->db->link, $data['mssv']);
            $class = mysqli_real_escape_string($this->db->link, $data['class']);
            $department = mysqli_real_escape_string($this->db->link, $data['department']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($name=="" || $city=="" || $mssv=="" ||$class=="" ||$department=="" || $email=="" || $address=="" || $country=="" || $phone =="" || $password ==""){
                $alert = "<span class='error'>Không được để trống thông tin </span>";
                return $alert;
            }else{
                $check_mssv = "SELECT * FROM tbl_student WHERE mssv='$mssv' LIMIT 1";
                $result_check = $this->db->select($check_mssv);
                if($result_check){
                    $alert = "<span class='error'>MSSV đã tồn tại! Vui lòng nhập một MSSV khác</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_student(name,city,mssv,class,department,email,address,country,phone,password) VALUES('$name','$city','$mssv','$class','$department','$email','$address','$country','$phone','$password')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Đăng ký thành công </span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Đăng ký không thành công</span>";
                        return $alert;
                    }
                }
            }
        }
        public function show_student($id){
            $query = "SELECT * FROM tbl_student WHERE id='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_students(){
            $query = "SELECT * FROM tbl_student";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_student($id){
            $query = "DELETE FROM tbl_student where id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
            
        }
        public function update_student($data,$id){

        
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $class = mysqli_real_escape_string($this->db->link, $data['class']);
            $department = mysqli_real_escape_string($this->db->link, $data['department']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
         


            if($name=="" || $address=="" || $city=="" || $country=="" || $class==""
                || $department==""|| $phone==""|| $email==""|| $password==""){
                $alert = "<span class='error'>Các trường không được để trống</span>";
                return $alert;
            }else{
                    $md5 = md5($password);
                    $query = "UPDATE tbl_student SET
                    name = '$name',
                    address = '$address',
                    city = '$city', 
                    country = '$country', 
                    class = '$class',
                    department = '$department',
                    phone = '$phone', 
                    email = '$email', 
                    password = '$md5'
                    WHERE id = '$id'";
             
                $result = $this->db->update($query);
                    if($result){
                        $alert = "<span class='success'>Cập nhật thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Cập nhật không thành công</span>";
                        return $alert;
                    }
                
            }

        }
           public function update_student_sv($data,$id){

            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
         


            if($address=="" || $city=="" || $country=="" ||
              $phone==""|| $email==""|| $password==""){
                $alert = "<span class='error'>Các trường không được để trống</span>";
                return $alert;
            }else{
                    $md5 = md5($password);
                    $query = "UPDATE tbl_student SET
                    address = '$address',
                    city = '$city', 
                    country = '$country', 
                    phone = '$phone', 
                    email = '$email', 
                    password = '$md5'
                    WHERE id = '$id'";
             
                $result = $this->db->update($query);
                    if($result){
                        $alert = "<span class='success'>Cập nhật thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Cập nhật không thành công</span>";
                        return $alert;
                    }
                
            }

        }
        public function insert_slider($data,$files){
            $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($sliderName=="" || $type==""){
                $alert = "<span class='error'>Các trường không được để trống</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if ($file_size > 2048000) {

                     $alert = "<span class='success'>Kích thước hình ảnh nên nhỏ hơn 2MB!</span>";
                    return $alert;
                    } 
                    elseif (in_array($file_ext, $permited) === false) 
                    {
                     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";    
                    $alert = "<span class='success'>Bạn chỉ có thể tải lên:-".implode(', ', $permited)."</span>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Thêm Slide thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Thêm Slide không thành công</span>";
                        return $alert;
                    }
                }
                
                
            }
        }
        public function show_slider(){
            $query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_slider_list(){
            $query = "SELECT * FROM tbl_slider order by sliderId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_type_slider($id,$type){

            $type = mysqli_real_escape_string($this->db->link, $type);
            $query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
            $result = $this->db->update($query);
            return $result;
        }
        public function del_slider($id){
            $query = "DELETE FROM tbl_slider where sliderId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa Slide thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa Slide không thành công</span>";
                return $alert;
            }
        }
      

}
?>