<?PHP
	class Pegawai_M extends CI_Model
	{
		//Property
		
		private $NIP;
		private $nama_peg;
		private $alamat;
		private $tgl_lahir;
		private $jenis_kelamin;
		private $agama;
		private $telp;
		private $tgl_masuk;
		private $kd_pendidikan;
		private $lama_kerja;
		private $kd_keluarga;
		private $gol;
		private $kd_jabatan;
		private $kd_divisi;
		
		//Methode
	
		public function set_NIP($value)
		{
			$this->NIP = $value;
		}
		
		public function get_NIP()
		{
			return $this->NIP;
		}
		
		public function set_nama_peg($value)
		{
			return $this->nama_peg = $value;
		}
		
		public function get_nama_peg()
		{
			return $this->nama_peg;
		}
		
		public function set_alamat($value)
		{
			return $this->alamat = $value;
		}
		
		public function get_alamat()
		{
			return $this->alamat;
		}
		
		public function set_tgl_lahir($value)
		{
			return	$this->tgl_lahir = $value;
		}
		
		public function get_tgl_lahir()
		{
			return $this->tgl_lahir;
		}
		
		public function set_jenis_kelamin($value)
		{
			return $this->jenis_kelamin = $value;
		}
		
		public function get_jenis_kelamin()
		{
			return $this->jenis_kelamin;
		}
		public function set_agama($value)
		{
			return $this->agama = $value;
		}
		
		public function get_agama()
		{
			return $this->agama;
		}
		
		public function set_telp($value)
		{
			return $this->telp = $value;
		}
		
		public function get_telp()
		{
			return $this->telp;
		}
	
		public function set_tgl_masuk($value)
		{
			return $this->tgl_masuk = $value;
		}
		
		public function get_tgl_masuk()
		{
			return $this->tgl_masuk;
		}
		
		public function set_kd_pendidikan($value)
		{
			return $this->kd_pendidikan = $value;
		}
		
		public function get_kd_pendidikan()
		{
			return $this->kd_pendidikan;
		}
		public function get_lama_kerja()
		{
			return $this->lama_kerja;
		}
		public function set_kd_keluarga($value)
		{
			return $this->kd_keluarga = $value;
		}
		
		public function get_kd_keluarga()
		{
			return $this->kd_keluarga;
		}
		
		public function set_gol($value)
		{
			return $this->gol = $value;
		}
		
		public function get_gol()
		{
			return $this->gol;
		}
		public function set_kd_jabatan($value)
		{
			return $this->kd_jabatan = $value;
		}
		
		public function get_kd_jabatan()
		{
			return $this->kd_jabatan;
		}
		public function set_kd_divisi($value)
		{
			return $this->kd_divisi = $value;
		}
		
		public function get_kd_divisi()
		{
			return $this->kd_divisi;
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
			$sql = "INSERT INTO tbl_pegawai 
					VALUES('".$this->get_NIP()."', 
					'".$this->get_nama_peg()."',
					'".$this->get_alamat()."',
					'".$this->get_tgl_lahir()."', 
					'".$this->get_jenis_kelamin()."',
					'".$this->get_agama()."', 
					'".$this->get_telp()."', 
					'".$this->get_tgl_masuk()."',
					'".$this->get_kd_pendidikan()."',
					'".$this->get_kd_keluarga()."',
					'".$this->get_gol()."',
					'".$this->get_kd_jabatan()."',
					'".$this->get_kd_divisi()."')";
			
			return $this->db->query($sql);
		}
		
		public function view()
		{
					$sql="SELECT *,tbl_pendidikan.kd_pendidikan,tbl_keluarga.kd_keluarga,tbl_golongan.gol,tbl_divisi.divisi,tbl_jabatan.jabatan, (year(curdate())-year(tgl_masuk)) 			 					lama_kerja,  date_format( tgl_lahir, '%d-%m-%Y' ) tgl_lahir, date_format( tgl_masuk, '%d-%m-%Y' ) tgl_masuk from 	 		 	 	 	 	 	 	 	 				   					tbl_pegawai,tbl_pendidikan,tbl_keluarga,tbl_golongan,tbl_divisi,tbl_jabatan where tbl_pegawai.kd_pendidikan=tbl_pendidikan.kd_pendidikan and 	 	 	 	 	 	 				tbl_pegawai.kd_keluarga=tbl_keluarga.kd_keluarga and tbl_pegawai.gol=tbl_golongan.gol and tbl_pegawai.kd_jabatan=tbl_jabatan.kd_jabatan and 	 	 	 	 	 	 				tbl_pegawai.kd_divisi=tbl_divisi.kd_divisi";
			
			return $this->db->query($sql);
		}
		
		public function view_excel()
		{
					$sql="SELECT *,tbl_pendidikan.kd_pendidikan,tbl_keluarga.kd_keluarga,tbl_golongan.gol,tbl_divisi.divisi,tbl_jabatan.jabatan, (year(curdate())-year(tgl_masuk)) 			 					lama_kerja,  date_format( tgl_lahir, '%d-%m-%Y' ) tgl_lahir, date_format( tgl_masuk, '%d-%m-%Y' ) tgl_masuk, (SELECT count( nip )) AS total_peg
					from tbl_pegawai,tbl_pendidikan,tbl_keluarga,tbl_golongan,tbl_divisi,tbl_jabatan where tbl_pegawai.kd_pendidikan=tbl_pendidikan.kd_pendidikan and 	 	 	 	 	 	 			tbl_pegawai.kd_keluarga=tbl_keluarga.kd_keluarga and tbl_pegawai.gol=tbl_golongan.gol and tbl_pegawai.kd_jabatan=tbl_jabatan.kd_jabatan and 	 	 	 	 	 	 				tbl_pegawai.kd_divisi=tbl_divisi.kd_divisi";
			
			return $this->db->query($sql);
		}
		
		
		
				public function view_by_NIP()
		{
			$sql = "SELECT * FROM tbl_pegawai,tbl_pendidikan,tbl_keluarga,tbl_golongan,tbl_jabatan,tbl_divisi
					WHERE tbl_pegawai.kd_pendidikan=tbl_pendidikan.kd_pendidikan and tbl_pegawai.kd_keluarga=tbl_keluarga.kd_keluarga and tbl_pegawai.gol=tbl_golongan.gol and  	 	 	 			tbl_pegawai.kd_jabatan=tbl_jabatan.kd_jabatan and tbl_pegawai.kd_divisi=tbl_divisi.kd_divisi and tbl_pegawai.NIP='".$this->get_NIP()."'";
			
			return $this->db->query($sql);
		}
		
		public function login()
		{
			$sql = "SELECT username,password
					FROM tbl_pegawai WHERE username='".$this->get_username()."' AND password='".md5($this->get_password())."'";
					
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
			$sql = "UPDATE tbl_pegawai
					set	nama_peg='".$this->get_nama_peg()."',
						alamat='".$this->get_alamat()."',
						tgl_lahir='".$this->get_tgl_lahir()."',
						jenis_kelamin='".$this->get_jenis_kelamin()."',
						agama='".$this->get_agama()."', 
						telp='".$this->get_telp()."',
						tgl_masuk='".$this->get_tgl_masuk()."',
						kd_pendidikan='".$this->get_kd_pendidikan()."',
						kd_keluarga='".$this->get_kd_keluarga()."',
						gol='".$this->get_gol()."',
						kd_jabatan='".$this->get_kd_jabatan()."',
						kd_divisi='".$this->get_kd_divisi()."'
					WHERE NIP='".$this->get_NIP()."'";
			
			$this->db->query($sql);
		}
		
		
		public function delete()
		{
			$sql = "DELETE FROM tbl_pegawai
					WHERE NIP='".$this->get_NIP()."'";
			
			$this->db->query($sql);
		}


		public function jabatan()
		{
			$sql="select * from tbl_pegawai,tbl_jabatan
				  where id_peg.tbl_pegawai=id_peg.tbl_jabatan";
				  
			return $this->db->query($sql);
		
		}
		
		public function view_lama()
		{
			$sql="SELECT (year(curdate()) - year(tgl_masuk )) FROM tbl_pegawai";
			
			return $this->db->query($sql);	
		}
		
			
		public function view_nama_by_nip()
		{
			$sql="SELECT nama_peg FROM tbl_pegawai";
			
			return $this->db->query($sql);	
		}
		
		
		public function view_nama_jabatan_by_nip() {
			$sql = "SELECT jabatan, tbl_jabatan.kd_jabatan FROM tbl_pegawai, tbl_jabatan 
					WHERE tbl_pegawai.kd_jabatan=tbl_jabatan.kd_jabatan AND 
					tbl_pegawai.nip='".$this->get_nip()."'";
			
			return $this->db->query($sql);
		
		}
		
		public function view_nama_gol_by_nip() {
			$sql = "SELECT tbl_golongan.gol FROM tbl_pegawai, tbl_golongan
					WHERE tbl_pegawai.gol=tbl_golongan.gol AND 
					tbl_pegawai.nip='".$this->get_nip()."'";
			
			return $this->db->query($sql);
		
		}
		
		public function view_nama_lama_kerja_by_nip() {
			$sql = "SELECT (year(curdate()) - year(tgl_masuk )) as lama_kerja FROM tbl_pegawai
					WHERE tbl_pegawai.nip='".$this->get_nip()."'";
			
			return $this->db->query($sql);
		
		}
		
		public function view_jenis_kelamin_by_nip() {
			$sql = "SELECT jenis_kelamin FROM tbl_pegawai
					WHERE tbl_pegawai.nip='".$this->get_nip()."'";
			
			return $this->db->query($sql);
		
		}
		
		public function view_kd_keluarga_by_nip() {
			$sql = "SELECT kd_keluarga FROM tbl_pegawai
					WHERE tbl_pegawai.nip='".$this->get_nip()."'";
			
			return $this->db->query($sql);
		
		}
	}
?>