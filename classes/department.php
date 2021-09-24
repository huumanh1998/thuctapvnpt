<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class department
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
	
		public function insert_department($departmentName){

			$departmentName = $this->fm->validation($departmentName);
			$departmentName = mysqli_real_escape_string($this->db->link, $departmentName);
			
			if(empty($departmentName)){
				$alert = "<span class='error'>Phòng ban không được để trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_department(departmentName) VALUES('$departmentName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm phòng ban thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm phòng ban không thành công</span>";
					return $alert;
				}
			}
		}
		public function show_department(){
			$query = "SELECT * FROM tbl_department order by departmentId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_department($departmentName,$id){

			$departmentName = $this->fm->validation($departmentName);
			$departmentName = mysqli_real_escape_string($this->db->link, $departmentName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($departmentName)){
				$alert = "<span class='error'>Phòng ban không được để trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_department SET departmentName = '$departmentName' WHERE departmentId = '$id'";
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
		public function getdepartbyId($id){
			$query = "SELECT * FROM tbl_department where departmentId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_department($id){
			$query = "DELETE FROM tbl_department where departmentId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
			
		}
		
		


	}
?>