<?PHP
	class Jabatan_M extends CI_Model
	{
		//Property
		
		private $kd_jabatan;
		private $jabatan;
		//Methode
	
		public function set_kd_jabatan($value)
		{
			$this->kd_jabatan = $value;
		}
		
		public function get_kd_jabatan()
		{
			return $this->kd_jabatan;
		}
		public function set_jabatan($value)
		{
			$this->jabatan = $value;
		}
		
		public function get_jabatan()
		{
			return $this->jabatan;
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_jabatan 
					VALUES ('".$this->get_kd_jabatan()."', 
					'".$this->get_jabatan()."')";
			
			$this->db->query($sql);
		}
		
		public function view()
		{
			$sql="select * from tbl_jabatan";
			
			return $this->db->query($sql);
		}
		
		public function depan()
		{
			$sql="SELECT (SELECT left( kd_jabatan, 5 )), jabatan FROM tbl_jabatan";
			
			return $this->db->query($sql);
		}
		
		
		public function view_by_kd_jabatan()
		{
			$sql = "SELECT * FROM tbl_jabatan 
					WHERE kd_jabatan='".$this->get_kd_jabatan()."'";
			
			return $this->db->query($sql);
		}
		
		public function login()
		{
			$sql = "SELECT username,password
					FROM tbl_jabatan WHERE username='".$this->get_username()."' AND password='".md5($this->get_password())."'";
					
			return $this->db->query($sql);
		}
		
		public function update()
		{
			$sql = "UPDATE tbl_jabatan
					SET kd_jabatan='".$this->get_kd_jabatan()."',
					jabatan='".$this->get_jabatan()."'
					WHERE kd_jabatan='".$this->get_kd_jabatan()."'";
			
			$this->db->query($sql);
		}
		
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_jabatan
					WHERE kd_jabatan='".$this->get_kd_jabatan()."'";
			
			$this->db->query($sql);
		}


		public function jabatan()
		{
			
			$sql = "UPDATE tbl_jabatan SET kd_jabatan = '".$this->get_jabatan()."'
					WHERE kd_jabatan = '".$this->get_kd_jabatan()."'"; 
						  
			 $this->db->query($sql);
		
		}
		
		
		
		
		
	}
?>