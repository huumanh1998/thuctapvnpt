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
	class scanf
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function search_scanf($tukhoa){
            $tukhoa = $this->fm->validation($tukhoa);
            $query = "SELECT name,departmentName,scanf_desc,scanf_file,cmt FROM tbl_scanf JOIN tbl_department ON tbl_scanf.departmentId = tbl_department.departmentId JOIN tbl_student ON tbl_scanf.id = tbl_student.id WHERE name LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;

        }
		public function insert_scanf($data,$files){

			$departmentId = mysqli_real_escape_string($this->db->link, $data['departmentId']);
			$scanf_desc = mysqli_real_escape_string($this->db->link, $data['scanf_desc']);
			$date_scanf = mysqli_real_escape_string($this->db->link, $data['date_scanf']);
			$date_scanf = explode("/", $_POST['date_scanf']);
			$date_scanf = $date_scanf[2] . '-' . $date_scanf[0] . '-' . $date_scanf[1];
			//Lấy file
			$file_name = $_FILES['scanf_file']['name'];
			$file_size = $_FILES['scanf_file']['size'];
			$file_temp = $_FILES['scanf_file']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_file = $file_name;
			$uploaded_file = 'admin/uploads/'.$unique_file;
			$id = Session::get('student_id');
			
			if( $departmentId==""||  $scanf_desc =="" ||  $file_name ==""|| $date_scanf==""){
				$alert = "<span class='error'>Các trường không được để trống</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_file);
				$query = "INSERT INTO tbl_scanf(departmentId,id,scanf_desc,scanf_file,date_scanf) VALUES(
				'$departmentId','$id','$scanf_desc','$unique_file','$date_scanf')";
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
		
		
		public function show_scanf(){

			$query = "

			SELECT tbl_scanf.*, tbl_department.departmentName, tbl_student.name

			FROM tbl_scanf INNER JOIN tbl_department ON tbl_scanf.departmentId = tbl_department.departmentId INNER JOIN tbl_student ON tbl_scanf.id = tbl_student.id

			order by tbl_scanf.scanf_Id desc";


			$result = $this->db->select($query);
			return $result;
		}
			public function del_scanf($id){
			$query = "DELETE FROM tbl_scanf where scanf_Id = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
			
		 }
		 	public function shifted($id,$time){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$query = "UPDATE tbl_scanf SET

					status = '1'

					WHERE scanf_Id = '$id' AND date_scanf='$time' ";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Cập nhật thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Cập nhật không thành công </span>";
				return $msg;
			}
		}
		public function del_shifted($id,$time){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);

			$query = "DELETE FROM tbl_scanf
					WHERE scanf_Id = '$id' AND date_scanf='$time' ";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Xóa  thành công </span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Xóa không thành công </span>";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$query = "UPDATE tbl_scanf SET

					status = '2'

					WHERE scanf_Id = '$id' AND date_scanf='$time'";
			$result = $this->db->update($query);
			return $result;
		}
		  public function get_scanf_student($id){
		  	$id = Session::get('student_id');
            $query = "

			SELECT tbl_scanf.*, tbl_department.departmentName, tbl_student.name

			FROM tbl_scanf INNER JOIN tbl_department ON tbl_scanf.departmentId = tbl_department.departmentId INNER JOIN tbl_student ON tbl_scanf.id = tbl_student.id WHERE tbl_student.id = $id

			order by tbl_scanf.scanf_Id desc";
            $get_scanf_student = $this->db->select($query);
            return $get_scanf_student;
        }

        
        public function scanfId($id){
			$query = "SELECT tbl_scanf.*, tbl_department.departmentName, tbl_student.name

			FROM tbl_scanf INNER JOIN tbl_department ON tbl_scanf.departmentId = tbl_department.departmentId INNER JOIN tbl_student ON tbl_scanf.id = tbl_student.id WHERE tbl_scanf.scanf_Id = $id

			order by tbl_scanf.scanf_Id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_feedback($data,$id){

			$cmt = mysqli_real_escape_string($this->db->link, $data['cmt']);
			$scanf_Date = mysqli_real_escape_string($this->db->link, $data['scanf_Date']);
			  $scanf_Date = explode("/", $_POST['scanf_Date']);
			$scanf_Date = $scanf_Date[2] . '-' . $scanf_Date[0] . '-' . $scanf_Date[1];

			if( $cmt=="" ){
				$alert = "<span class='error'>Các trường không được để trống</span>";
				return $alert;
			}else{
			
					$query = "UPDATE tbl_scanf SET
					cmt = '$cmt',
					scanf_Date ='$scanf_Date'
					WHERE scanf_Id = '$id'";
					
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
?>