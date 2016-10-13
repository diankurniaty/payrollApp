<?PHP
	class Keluarga_M extends CI_Model
	{
		//Property
		
		private $kd_keluarga;
		private $status_menikah;
		private $jumlah_anak;
		//Methode
	
		public function set_kd_keluarga($value)
		{
			$this->kd_keluarga = $value;
		}
		
		public function get_kd_keluarga()
		{
			return $this->kd_keluarga;
		}
	
		public function set_status_menikah($value)
		{
			$this->status_menikah = $value;
		}
		
		public function get_status_menikah()
		{
			return $this->status_menikah;
		}
		public function set_jumlah_anak($value)
		{
			$this->jumlah_anak = $value;
		}
		public function get_jumlah_anak()
		{
			return $this->jumlah_anak;
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
			$sql = "INSERT INTO tbl_keluarga
					(kd_keluarga,
					status_menikah, 
					jumlah_anak) 
					VALUES ('".$this->get_kd_keluarga()."',
					'".$this->get_status_menikah()."', 
					'".$this->get_jumlah_anak()."')";
			
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
			$sql="select * from tbl_keluarga";
			
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
			$sql = "UPDATE tbl_keluarga
					SET kd_keluarga='".$this->get_kd_keluarga()."',
						status_menikah='".$this->get_status_menikah()."',
						jumlah_anak='".$this->get_jumlah_anak()."'
					WHERE kd_keluarga='".$this->get_kd_keluarga()."'";
			
			$this->db->query($sql);
		}
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_keluarga
					WHERE kd_keluarga='".$this->get_kd_keluarga()."'";
			
			$this->db->query($sql);
		}


		public function view_by_kd_keluarga()
		{
			$sql="select * from tbl_keluarga
				  where kd_keluarga='".$this->get_kd_keluarga()."'";
				  
			return $this->db->query($sql);
		
		}
	}
?>