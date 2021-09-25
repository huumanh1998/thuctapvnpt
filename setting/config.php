<?php 

  
class project2
	
{
	public $server = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "school1";
	public $connectdb;
	
	function __construct()
	{
		$this->connectdb = new mysqli($this->server,$this->username,$this->password,$this->dbname);
		if($this->connectdb->connect_error)
		{
			die("connection failed");
		}
	}
	
    public function hackme()
    {
        $this->connectdb = new mysqli($this->server,$this->username,$this->password,$this->dbname);
        return $this->connectdb;
    }
	
	///////////// General Information about website ///////////
	public function general_setting($web_name,$web_address,$web_phone1,$web_phone2,$web_email1,$web_email2,$web_start,$web_about)
	{
		$general_setting_insert = "insert into general_setting(website_name,website_address,website_phone1,website_phone2,website_email1,website_email2,website_start,web_about) value('$web_name','$web_address','$web_phone1','$web_phone2','$web_email1','$web_email2','$web_start','$web_about')";
		$general_setting_run = $this->connectdb->query($general_setting_insert);
		return $general_setting_run;
	}
	public function general_setting_check()
	{
		$general_setting_check = "select * from general_setting";
		$general_setting_run = $this->connectdb->query($general_setting_check);
		return $general_setting_run;
	}
	public function general_setting_update($upweb_name,$upweb_address,$upweb_phone1,$upweb_phone2,$upweb_email1,$upweb_email2,$upweb_start,$upweb_about)
	{
		$update_general_setting = "update general_setting set website_name='$upweb_name',website_address='$upweb_address',website_phone1='$upweb_phone1',website_phone2='$upweb_phone2',website_email1='$upweb_email1',website_email2='$upweb_email2',website_start='$upweb_start',web_about='$upweb_about'";
	 $update_general_run = $this->connectdb->query($update_general_setting);
		return $update_general_run;
	}
	public function meravi_add_table($Nepdev_table_Name,$Nepdev_student_name,$Nepdev_student_grade,$Nepdev_subject1,$Nepdev_subject2,$Nepdev_subject3,$Nepdev_subject4,$Nepdev_subject5,$Nepdev_subject6,$Nepdev_subject7,$Nepdev_subject8,$Nepdev_subject9,$Nepdev_subject10,$Nepdev_subject11)
	{
		$Meravi_database = "CREATE TABLE $Nepdev_table_Name(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,$Nepdev_student_name varchar(250) Null,$Nepdev_student_grade varchar(10) null,$Nepdev_subject1 varchar(250) null,$Nepdev_subject2 varchar(250) null,$Nepdev_subject3 varchar(250) null,$Nepdev_subject4 varchar(250) null,$Nepdev_subject5 varchar(250) null,$Nepdev_subject6 varchar(250) null,$Nepdev_subject7 varchar(250) null,$Nepdev_subject8 varchar(250) null,$Nepdev_subject9 varchar(250) null,$Nepdev_subject10 varchar(250) null,$Nepdev_subject11 varchar(250) null)";
		$Meravi_run = $this->connectdb->query($Meravi_database);
		return $Meravi_run;
	}
	public function Nepdev_Exam_Term($Nepdev_exam_term)
	{
		$Nepdev_Select = "SELECT * FROM exam_term where name='$Nepdev_exam_term'";
		$Nepdev_Run = $this->connectdb->query($Nepdev_Select);
		if($Nepdev_Run->num_rows>0)
		{
			echo "<script>alert('You Have ALready Added $Nepdev_exam_term');</script>";
		}
		else
		{
			$Nepdev_Add = "INSERT INTO exam_term(name) VALUES('$Nepdev_exam_term')";
			$Nedev_Add_Run = $this->connectdb->query($Nepdev_Add);
			if($Nedev_Add_Run==true)
			{
				echo "<script>alert('Success Added $Nepdev_exam_term');</script>";
				}
			}
			return 	$Nepdev_Run;
	}
	}
$ravi = new project2;