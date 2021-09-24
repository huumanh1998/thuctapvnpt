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
class forum
{
    private $db;
    private $fm;
    function __construct()
    {
            $this->db = new Database();
            $this->fm = new Format();
    }
    public function search_forum($tukhoa){
            $tukhoa = $this->fm->validation($tukhoa);
            $query = "SELECT * FROM tbl_forum WHERE title LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;

        }
    
        public function get_details($id){
            $query = "

             SELECT tbl_forum.*, tbl_student.name

            FROM tbl_forum INNER JOIN tbl_student ON tbl_forum.id = tbl_student.id WHERE tbl_forum.forum_Id = $id

            ";

            $result = $this->db->select($query);
            return $result;
        }
        public function show_forum(){
            $query = "SELECT * FROM tbl_forum WHERE kiemtra = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_forum_admin(){
            $query = "SELECT tbl_forum.*, tbl_student.name FROM tbl_forum INNER JOIN tbl_student ON tbl_forum.id = tbl_student.id ";
            $result = $this->db->select($query);
            return $result;
        }
         public function update_kiemtra($id,$kiemtra){

            $kiemtra = mysqli_real_escape_string($this->db->link, $kiemtra);
            $query = "UPDATE tbl_forum SET kiemtra = '$kiemtra' where forum_Id='$id'";
            $result = $this->db->update($query);
            return $result;
        }
        public function insert_forum($data){

            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $desc_forum = mysqli_real_escape_string($this->db->link, $data['desc_forum']);
           
            $file_name = $_FILES['file_forum']['name'];
            $file_size = $_FILES['file_forum']['size'];
            $file_temp = $_FILES['file_forum']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_file = $file_name;
            $uploaded_file = 'admin/uploads/'.$unique_file;
            $id = Session::get('student_id');
            
            if( $title==""||  $desc_forum =="" ||  $file_name ==""){
                $alert = "<span class='error'>Các trường không được để trống</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_forum(title,id,desc_forum,file_forum) VALUES(
                '$title','$id','$desc_forum','$unique_file')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Thêm không thành công</span>";
                    return $alert;
                }
            }
        }
        public function get_forum_student($id){
            $id = Session::get('student_id');
            $query = "

            SELECT tbl_forum.*, tbl_student.name

            FROM tbl_forum INNER JOIN tbl_student ON tbl_forum.id = tbl_student.id WHERE tbl_student.id = $id

            order by tbl_forum.forum_Id desc";
            $get_forum_student = $this->db->select($query);
            return $get_forum_student;
        }
          public function del_forum($id){
            $query = "DELETE FROM tbl_forum where forum_Id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
            
        }
        
       public function insert_binhluan($binhluan, $forum_Id){
            $adminId = Session::get('adminId') ? Session::get('adminId'):"";
            $id = Session::get('student_id') ? Session::get('student_id') : "";
            if($binhluan==''){
                $alert = "<span class='error'>Không để trống các trường</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_binhluan(forum_Id,id,adminId,binhluan) VALUES('$forum_Id','$id','$adminId','$binhluan')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Bình luận đã gửi</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Bình luận không thành công</span>";
                        return $alert;
                }
            }
        }
        public function rep_binhluan($binhluan, $forum_Id,$binhluan_Id){
            $adminId = Session::get('adminId') ? Session::get('adminId'):"";
            $id = Session::get('student_id') ? Session::get('student_id') : "";
            if($binhluan==''){
                $alert = "<span class='error'>Không để trống các trường</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_binhluan(forum_Id,id,adminId,binhluan,rep_Id) VALUES('$forum_Id','$id','$adminId','$binhluan','$binhluan_Id')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Bình luận đã gửi</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Bình luận không thành công</span>";
                        return $alert;
                }
            }
        }
        public function show_binhluan($forum_Id){
            $query = "SELECT binhluan_Id,name,adminName,binhluan,tbl_binhluan.id AS id FROM tbl_binhluan 
            LEFT JOIN tbl_student ON tbl_binhluan.id = tbl_student.id LEFT JOIN tbl_admin ON tbl_admin.adminId = tbl_binhluan.adminId WHERE forum_Id=$forum_Id AND rep_Id = '' 
             order by binhluan_Id desc";
            $result = $this->db->select($query);
            return $result;
        }
         public function show_rep($forum_Id,$binhluan_Id){
            $query = "SELECT binhluan_Id,tbl_binhluan.id AS id,name,adminName,binhluan,rep_Id FROM tbl_binhluan 
            LEFT JOIN tbl_student ON tbl_binhluan.id = tbl_student.id LEFT JOIN tbl_admin ON tbl_admin.adminId = tbl_binhluan.adminId WHERE forum_Id=$forum_Id AND rep_Id = $binhluan_Id
             order by binhluan_Id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function count_binhluan($forum_Id){
            $query = "SELECT count(*) as count FROM tbl_binhluan WHERE forum_Id=$forum_Id AND rep_Id = ''" ;
            $result = $this->db->select($query);
            return $result;
        }
        public function count_rep($forum_Id){
            $query = "SELECT count(*) as count FROM tbl_binhluan WHERE forum_Id=$forum_Id AND rep_Id <> ''" ;
            $result = $this->db->select($query);
            return $result;
        }
         public function show_binhluan_admin(){
            $query = "SELECT forum_Id,binhluan_Id,name,adminName,binhluan FROM tbl_binhluan 
            LEFT JOIN tbl_student ON tbl_binhluan.id = tbl_student.id 
            LEFT JOIN tbl_admin ON tbl_binhluan.adminId = tbl_admin.adminId
             order by binhluan_Id desc";
            $result = $this->db->select($query);
            return $result;

        } 
      
        function deletebinhluan($id){
        $query="SELECT id FROM tbl_binhluan WHERE binhluan_Id = $id";
        $result = $this->db->select($query);
        $bl = $result -> fetch_assoc();
        if (Session::isAdmin() || Session::get('student_id') == $bl['id']) {
        $query = "DELETE FROM tbl_binhluan WHERE binhluan_Id = $id OR rep_Id=$id";
        $this->db->delete($query);
        }

    }
}
?>