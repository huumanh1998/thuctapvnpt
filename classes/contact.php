<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
/**
 * 
 */
class contact
{
    private $db;
    private $fm;
    function __construct()
    {
            $this->db = new Database();
            $this->fm = new Format();
    }
    
            public function insert_contact(){

            $ct_Name = $_POST['ct_Name'];
            $ct_Phone = $_POST['ct_Phone'];
            $ct_Email = $_POST['ct_Email'];
            $ct_Address = $_POST['ct_Address'];
            $ct_Inbox = $_POST['ct_Inbox'];
            if($ct_Name=='' || $ct_Phone==''|| $ct_Email==''|| $ct_Address==''|| $ct_Inbox==''){
                $alert = "<span class='error'>Không để trống các trường</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_contact(ct_Name,ct_Phone,ct_Email,ct_Address,ct_Inbox) VALUES('$ct_Name','$ct_Phone','$ct_Email','$ct_Address','$ct_Inbox')";
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
        public function del_contact($id){
            $query = "DELETE FROM tbl_contact where ct_Id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
        }
        public function show_contact(){
            $query = "SELECT * FROM tbl_contact order by ct_Id desc";
            $result = $this->db->select($query);
            return $result;
        }


}
?>