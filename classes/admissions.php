<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
/**
 * 
 */
class admissions
{
    private $db;
    private $fm;
    function __construct()
    {
            $this->db = new Database();
            $this->fm = new Format();
    }
    
            public function insert_admissions(){
            $date = explode("/", $_POST['admDate']);

            $admName = $_POST['admName'];
            $admPhone = $_POST['admPhone'];
            $admDate = $date[2] . '-' . $date[0] . '-' . $date[1];
            $admAddress = $_POST['admAddress'];
            $admParents = $_POST['admParents'];
            $admPhoneparents = $_POST['admPhoneparents'];
            $admHometown = $_POST['admHometown'];
            $admGender = $_POST['admGender'];

            if($admName=='' || $admPhone==''|| $admDate==''|| $admParents==''|| $admAddress==''|| $admPhoneparents==''|| $admHometown==''|| $admGender==''){
                $alert = "<span class='error'>Không để trống các trường</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_admissions(admName,admPhone,admDate,admAddress,admParents,admPhoneparents,admHometown,admGender) VALUES('$admName','$admPhone','$admDate','$admAddress','$admParents','$admPhoneparents','$admHometown','$admGender')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Đã gửi</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Chưa gửi</span>";
                        return $alert;
                }
            }
        }
        public function del_admissions($id){
            $query = "DELETE FROM tbl_admissions where admId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
        }
        public function show_admissions(){
            $query = "SELECT * FROM tbl_admissions order by admId desc";
            $result = $this->db->select($query);
            return $result;
        }


}
?>