<?PHP
	class Login_m extends CI_model
	{
		private $username;
		private $password;
		private $status;
		private $passwordbaru;
		private $NIP;
		
		public function set_username($value)
		{
			$this->username=$value;
		}
		
		public function set_password($value)
		{
			$this->password=$value;	
		}
		
		public function set_status($value)
		{
			$this->status=$value;	
		}
		
		public function set_passwordbaru($value)
		{
			$this->passwordbaru=$value;	
		}
		
		public function get_username()
		{
			return $this->username;	
		}
		
		public function get_password()
		{
			return $this->password;	
		}
		
		public function get_status()
		{
			return $this->status;
		}
		
		public function get_passwordbaru()
		{
			return $this->passwordbaru;	
		}
		
		public function set_NIP($value)
		{
			$this->NIP=$value;
		}
		
		public function get_NIP()
		{
			return $this->NIP;
		}
		
		public function view_by_username_password()
		{
			$sql = "SELECT * FROM tbl_login
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		
		public function view()
		{
			$sql = "SELECT * FROM tbl_login";
			
			return $this->db->query($sql);	
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_login VALUES	
					('".$this->get_username()."','".$this->get_NIP()."','".md5($this->get_password())."','".$this->get_status()."')";
			
			$this->db->query($sql);
		}
		
		public function login()
		{
			$sql = "SELECT * FROM tbl_login
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_username()
		{
			$sql = "SELECT * FROM tbl_login 
					WHERE username='".$this->get_username()."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_username_NIP()
		{
			$sql = "SELECT * FROM tbl_login 
					WHERE NIP='".$this->get_NIP()."'";
			
			return $this->db->query($sql);
		}
		
		
		public function cek($nama,$sandi)
		{
			$sql="select nip from tbl_login where username='$nama' and password='".md5($sandi)."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_nip_password()
		{
			$sql = "SELECT * FROM tbl_login
					WHERE nip='".$this->get_nip()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		
		
		
		public function updatepassword()
		{
			$sql = "UPDATE tbl_login 
					SET password='".md5($this->get_passwordbaru())."'
					WHERE nip='".$this->get_nip()."'";
			
			$this->db->query($sql);
		}
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_login 
					WHERE username='".$this->get_username()."'";
			
			$this->db->query($sql);
		}
	}
?>