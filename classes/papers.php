<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class papers
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function search_papers($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT papersName,departmentName,papers_desc,file FROM tbl_papers JOIN tbl_department ON tbl_papers.departmentId = tbl_department.departmentId WHERE papersName LIKE '%$tukhoa%'";

			$result = $this->db->select($query);
			return $result;

		}
		public function insert_papers($data,$files){

			
			$papersName = mysqli_real_escape_string($this->db->link, $data['papersName']);
			$departmentId = mysqli_real_escape_string($this->db->link, $data['departmentId']);
			$papers_desc = mysqli_real_escape_string($this->db->link, $data['papers_desc']);
			//Lấy file
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_temp = $_FILES['file']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_file = $file_name;
			$uploaded_file = "uploads/".$unique_file;
			
			if($papersName=="" || $departmentId=="" || $papers_desc=="" || $file_name ==""){
				$alert = "<span class='error'>Các trường không được để trống</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_file);
				$query = "INSERT INTO tbl_papers(papersName,departmentId,papers_desc,file) VALUES('$papersName','$departmentId','$papers_desc','$unique_file')";
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
		
		
		public function show_papers(){

			$query = "

			SELECT tbl_papers.*, tbl_department.departmentName 

			FROM tbl_papers INNER JOIN tbl_department ON tbl_papers.departmentId = tbl_department.departmentId

			order by tbl_papers.papersId desc";


			$result = $this->db->select($query);
			return $result;
		}
		
		public function update_papers($data,$files,$id){

			$papersName = mysqli_real_escape_string($this->db->link, $data['papersName']);
			$departmentId = mysqli_real_escape_string($this->db->link, $data['departmentId']);
			$papers_desc = mysqli_real_escape_string($this->db->link, $data['papers_desc']);
			
			//Lấy file
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_temp = $_FILES['file']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_file = $file_name;
			$uploaded_file = "uploads/".$unique_file;


			if($papersName=="" || $departmentId=="" || $papers_desc==""){
				$alert = "<span class='error'>Các trường không được để trống</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					
					move_uploaded_file($file_temp,$uploaded_file);
					$query = "UPDATE tbl_papers SET
					papersName = '$papersName',
					departmentId = '$departmentId',
					papers_desc = '$papers_desc', 
					file = '$unique_file' 
					WHERE papersId = '$id'";
					
				}else{
					//Nếu người dùng không chọn file
					$query = "UPDATE tbl_papers SET

					papersName = '$papersName',
					departmentId = '$departmentId',
					papers_desc = '$papers_desc'

					WHERE papersId = '$id'";
					
				}
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
		public function del_papers($id){
			$query = "DELETE FROM tbl_papers where papersId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
			
		}
		public function show_paper($id){
            $query = "SELECT * FROM tbl_papers WHERE papersId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
		


	}
?>