<?PHP
	class Pendidikan_M extends CI_Model
	{
		//Propertyan	
		
		private $kd_pendidikan;
		private $nm_pendidikan;
		//Methode
	
		public function set_kd_pendidikan($value)
		{
			$this->kd_pendidikan = $value;
		}
		
		public function get_kd_pendidikan()
		{
			return $this->kd_pendidikan;
		}
		public function set_nm_pendidikan($value)
		{
			$this->nm_pendidikan = $value;
		}
		
		public function get_nm_pendidikan()
		{
			return $this->nm_pendidikan;
		}
		
		
		
		/*public function view()
		{
			$sql = "SELECT * FROM tbl_mahasiswa, tbl_program_keahlian 
					WHERE tbl_mahasiswa.kode_program_keahlian=tbl_program_keahlian.kode_program_keahlian";
			
			return $this->db->query($sql);
		}
		
		public function view_by_nim()
		{
			$sql = "SELECT * FROM tbl_mahasiswa, tbl_program_keahlian 
					WHERE tbl_mahasiswa.kode_program_keahlian=tbl_program_keahlian.kode_program_keahlian AND 
					tbl_mahasiswa.nim='".$this->get_nim()."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_kode_program_keahlian()
		{
			$sql = "SELECT * FROM tbl_mahasiswa, tbl_program_keahlian 
					WHERE tbl_mahasiswa.kode_program_keahlian=tbl_program_keahlian.kode_program_keahlian AND 
					tbl_mahasiswa.kode_program_keahlian='".$this->get_kode_program_keahlian()."'";
			
			return $this->db->query($sql);
		}
		
		public function view_search()
		{
			$sql = "SELECT * FROM tbl_mahasiswa, tbl_program_keahlian 
					WHERE tbl_mahasiswa.kode_program_keahlian=tbl_program_keahlian.kode_program_keahlian AND 
					(tbl_mahasiswa.nim LIKE '%".$this->get_nim()."%' OR 
					tbl_mahasiswa.nama LIKE '%".$this->get_nama()."%' OR 
					tbl_mahasiswa.jenis_kelamin LIKE '%".$this->get_jenis_kelamin()."%' OR 
					tbl_mahasiswa.tanggal_lahir LIKE '%".$this->get_tanggal_lahir()."%' OR 
					tbl_mahasiswa.alamat LIKE '%".$this->get_alamat()."%' OR 
					tbl_mahasiswa.agama LIKE '%".$this->get_agama()."%' OR 
					tbl_program_keahlian.program_keahlian LIKE '%".$this->get_kode_program_keahlian()."%')";
			
			return $this->db->query($sql);
		}*/
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_pendidikan 
					VALUES ('".$this->get_kd_pendidikan()."', 
					'".$this->get_nm_pendidikan()."')";
			
			$this->db->query($sql);
		}
		
		/*public function update()
		{
			$sql = "UPDATE tbl_mahasiswa 
					SET nama='".$this->get_nama()."', 
					jenis_kelamin='".$this->get_jenis_kelamin()."', 
					tanggal_lahir='".$this->get_tanggal_lahir()."', 
					alamat='".$this->get_alamat()."', 
					agama='".$this->get_agama()."', 
					kode_program_keahlian='".$this->get_kode_program_keahlian()."' 
					WHERE nim='".$this->get_nim()."'";
			
			$this->db->query($sql);
		}
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_mahasiswa 
					WHERE nim='".$this->get_nim()."'";
			
			$this->db->query($sql);
		}
		
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_mahasiswa";
			
			$this->db->query($sql);
		}*/
		public function view()
		{
			$sql="select * from tbl_pendidikan";
			
			return $this->db->query($sql);
		}
		
		public function view_by_kd_pendidikan()
		{
			$sql = "SELECT * FROM tbl_pendidikan 
					WHERE kd_pendidikan='".$this->get_kd_pendidikan()."'";
			
			return $this->db->query($sql);
		}
		
		public function login()
		{
			$sql = "SELECT username,password
					FROM tbl_tunjangan WHERE username='".$this->get_username()."' AND password='".md5($this->get_password())."'";
					
			return $this->db->query($sql);
		}
		
		/*public function view_by_username()
		{
			$sql = "SELECT username,password FROM tbl_tunjangan 
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		*/
		
		public function update()
		{
			$sql = "UPDATE tbl_pendidikan
					SET kd_pendidikan='".$this->get_kd_pendidikan()."',
					nm_pendidikan='".$this->get_nm_pendidikan()."'
					WHERE kd_pendidikan='".$this->get_kd_pendidikan()."'";
			
			return $this->db->query($sql);
		}
		
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_pendidikan
					WHERE kd_pendidikan='".$this->get_kd_pendidikan()."'";
			
			$this->db->query($sql);
		}


		public function nm_pendidikan()
		{
			
			$sql = "UPDATE tbl_tunjangan SET kd_pendidikan = '".$this->get_nm_pendidikan()."'
					WHERE kd_pendidikan = '".$this->get_kd_pendidikan()."'"; 
						  
			 $this->db->query($sql);
		
		}
	}
?>