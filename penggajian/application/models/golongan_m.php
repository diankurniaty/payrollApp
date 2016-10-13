<?PHP
	class Golongan_M extends CI_Model
	{
		//Property
		
		private $gol;
		//Methode
	
		public function set_gol($value)
		{
			$this->gol = $value;
		}
		
		public function get_gol()
		{
			return $this->gol;
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
			$sql = "INSERT INTO tbl_golongan
					(gol) 
					VALUES ('".$this->get_gol()."')";
			
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
			$sql="select * from tbl_golongan";
			
			return $this->db->query($sql);
		}
		
		
		
		/*public function view_by_username()
		{
			$sql = "SELECT username,password FROM tbl_pegawai 
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		*/
		
		public function update()
		{
			$sql = "UPDATE tbl_golongan
					SET gol='".$this->get_gol()."',
					WHERE gol='".$this->get_gol()."'";
			
			$this->db->query($sql);
		}
		
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_golongan
					WHERE gol='".$this->get_gol()."'";
			
			$this->db->query($sql);
		}


		public function view_by_gol()
		{
			$sql="select * from tbl_golongan
				  where gol='".$this->get_gol()."'";
				  
			return $this->db->query($sql);
		
		}
	}
?>