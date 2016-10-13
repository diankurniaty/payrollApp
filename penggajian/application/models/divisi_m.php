<?PHP
	class Divisi_M extends CI_Model
	{
		//Property
		
		private $kd_divisi;
		private $divisi;
		//Methode
	
		public function set_kd_divisi($value)
		{
			$this->kd_divisi = $value;
		}
		
		public function get_kd_divisi()
		{
			return $this->kd_divisi;
		}
		public function set_divisi($value)
		{
			$this->divisi = $value;
		}
		
		public function get_divisi()
		{
			return $this->divisi;
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
			$sql = "INSERT INTO tbl_divisi 
					VALUES ('".$this->get_kd_divisi()."', 
					'".$this->get_divisi()."')";
			
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
			$sql="SELECT * FROM tbl_divisi";
			
			return $this->db->query($sql);
		}
		
		
		
		public function view_by_id_peg()
		{
			$sql = "SELECT * FROM tbl_divisi 
					WHERE NIP='".$this->get_NIP()."'";
			
			return $this->db->query($sql);
		}
		
		public function login()
		{
			$sql = "SELECT username,password
					FROM tbl_divisi WHERE username='".$this->get_username()."' AND password='".md5($this->get_password())."'";
					
			return $this->db->query($sql);
		}
		
		/*public function view_by_username()
		{
			$sql = "SELECT username,password FROM tbl_divisi 
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		*/
		
		public function update()
		{
			$sql = "UPDATE tbl_divisi
					SET kd_divisi='".$this->get_kd_divisi()."',
					divisi='".$this->get_divisi()."'
					WHERE kd_divisi='".$this->get_kd_divisi()."'";
			
			$this->db->query($sql);
		}
		
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_divisi
					WHERE kd_divisi='".$this->get_kd_divisi()."'";
			
			$this->db->query($sql);
		}

		public function view_by_kd_divisi()
		{
			$sql = "SELECT * FROM tbl_divisi
					WHERE kd_divisi='".$this->get_kd_divisi()."'";
			
			return $this->db->query($sql);
		}

	}
?>