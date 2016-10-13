<?PHP
	class Gajipegawai_M extends CI_Model
	{
		//Property
		private $periode_gaji;
		private $tgl_gaji;
		private $NIP;
		private $gaji_pokok;
		private $tunj_jabatan;
		private $tunjangan_jabatan;
		private $puskes;
		private $koperasi;
		private $korpri;
		private $btn;
		private $kamboja;
		private $lain;
		private $username;
		private $kd_jabatan;
		private $gol;
		private $no_gaji;
		private $jenis_kelamin;
		private $kd_keluarga;
		private $tunj_istri;
		private $tunj_anak;
		private $gaji_kotor;
		private $pendapatan_kotor;
		private $astek;
		private $pensiun;
		private $pajak;
		private $total_gaji;
		
		
		//private $kd_keluarga;
		//private $tunj_jabatan;
		
		//Methode
		
		public function set_kd_jabatan($value)
		{
			return $this->kd_jabatan=$value;
		}
		
		public function get_kd_jabatan()
		{
			return $this->kd_jabatan;
		}
		
		public function set_jenis_kelamin($value)
		{
			return $this->jenis_kelamin=$value;
		}
		
		public function get_jenis_kelamin()
		{
			return $this->jenis_kelamin;
		}
		
		public function set_pajak_bulan($value)
		{
			return $this->pajak_bulan=$value;
		}
		
		public function get_pajak_bulan()
		{
			return $this->pajak_bulan;
		}
		
		public function set_gol($value)
		{
			return $this->gol=$value;
		}
		
		public function get_gol()
		{
			return $this->gol;
		}
		
		
		
		public function get_username()
		{
			return $this->username;
		}
		
		public function get_pajak_bulan_p()
		{
			return $this->get_pajak_bulan_p;
		}
		
		public function get_pajak_bulan_l()
		{
			return $this->get_pajak_bulan_l;
		}
		
		
		public function set_tgl_gaji($value)
		{
			return $this->tgl_gaji = $value;
		}
		
		public function get_tgl_gaji()
		{
			return $this->tgl_gaji;
		}
		
	
		public function set_NIP($value)
		{
			$this->NIP = $value;
		}
		
		public function get_NIP()
		{
			return $this->NIP;
		}
		
		public function set_kd_keluarga($value)
		{
			$this->kd_keluarga = $value;
		}
		
		public function get_kd_keluarga()
		{
			return $this->kd_keluarga;
		}
		
		public function set_tunj_istri($value)
		{
			$this->tunj_istri = $value;
		}
		
		public function get_tunj_istri()
		{
			return $this->tunj_istri;
		}
		
		public function set_tunj_anak($value)
		{
			$this->tunj_anak = $value;
		}
		
		public function get_tunj_anak()
		{
			return $this->tunj_anak;
		}
		
		public function set_gaji_kotor($value)
		{
			$this->gaji_kotor = $value;
		}
		
		public function get_gaji_kotor()
		{
			return $this->gaji_kotor;
		}
		
		
		public function set_pendapatan_kotor($value)
		{
			$this->pendapatan_kotor = $value;
		}
		
		public function get_pendapatan_kotor()
		{
			return $this->pendapatan_kotor;
		}
		
		public function set_pajak($value)
		{
			$this->pajak = $value;
		}
		
		public function get_pajak()
		{
			return $this->pajak;
		}
		
		public function set_total_gaji($value)
		{
			$this->total_gaji= $value;
		}
		
		public function get_total_gaji()
		{
			return $this->total_gaji;
		}
		
		public function set_astek($value)
		{
			$this->astek= $value;
		}
		public function set_gaji_pokok($value)
		{
			$this->gaji_pokok= $value;
		}
		public function get_gaji_pokok()
		{
			return $this->gaji_pokok;
		}
	
		public function set_tunj_jabatan($value)
		{
			$this->tunj_jabatan= $value;
		}
		
		public function get_tunj_jabatan()
		{
			return $this->tunj_jabatan;
		}
		
		public function set_tunjangan_kerja($value)
		{
			$this->tunjangan_kerja= $value;
		}
		
		public function get_tunjangan_kerja()
		{
			return $this->tunjangan_kerja;
		}
		
		public function set_tunj_perum($value)
		{
			$this->tunj_perum= $value;
		}
		
		public function get_tunj_perum()
		{
			return $this->tunj_perum;
		}
		
		public function get_tunj_kerja()
		{
			return $this->tunj_kerja;
		}
		
		public function get_pend_kotor()
		{
			return $this->pendapatan_kotor;
		}
		public function get_astek()
		{
			return $this->astek;
		}
		public function get_pensiun()
		{
			return $this->pensiun;
		}
		
		public function get_potongan()
		{
			return $this->potongan;
		}
		
		public function set_puskes($value)
		{
			$this->puskes = $value;
		}
		
		public function set_pensiun($value)
		{
			$this->pensiun = $value;
		}
		
		public function get_puskes()
		{
			return $this->puskes;
		}
		
		public function set_koperasi($value)
		{
			$this->koperasi = $value;
		}
		
		public function get_koperasi()
		{
			return $this->koperasi;
		}
		public function set_korpri($value)
		{
			$this->korpri = $value;
		}
		
		public function get_korpri()
		{
			return $this->korpri;
		}
	
		public function set_btn($value)
		{
			$this->btn= $value;
		}
		
		public function get_btn()
		{
			return $this->btn;
		}
		
		public function set_kamboja($value)
		{
			$this->kamboja= $value;
		}
		
		public function get_kamboja()
		{
			return $this->kamboja;
		}
		
		
		public function set_lain($value)
		{
			$this->lain= $value;
		}
		
		public function get_lain()
		{
			return $this->lain;
		}
		
		public function set_no_gaji($value)
		{
			$this->no_gaji= $value;
		}
		
		public function get_no_gaji()
		{
			return $this->no_gaji;
		}
		
		public function get_periode_gaji()
		{
			return $this->periode_gaji;
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_gaji
					VALUES(
					'".$this->get_NIP()."',
					'".$this->get_kd_jabatan()."',
					'".$this->get_gol()."',
					'".$this->get_kd_keluarga()."',
					'".$this->get_jenis_kelamin()."',
					'".$this->get_gaji_pokok()."',
					'".$this->get_tunj_istri()."',
					'".$this->get_tunj_anak()."',
					'".$this->get_gaji_kotor()."',
					'".$this->get_tunj_jabatan()."',
					'".$this->get_tunjangan_kerja()."',
					'".$this->get_pendapatan_kotor()."',
					'".$this->get_astek()."',
					'".$this->get_pensiun()."',
					'".$this->get_pajak()."',
					'".$this->get_puskes()."',
					'".$this->get_koperasi()."',
					'".$this->get_korpri()."',
					'".$this->get_btn()."',
					'".$this->get_kamboja()."',
					'".$this->get_lain()."',
					'".$this->get_tgl_gaji()."',
					'".$this->get_no_gaji()."',
					'".$this->get_total_gaji()."')";
			
			return $this->db->query($sql);
		}
		
		
		public function view()
		{
		
			$sql = "SELECT *, date_format(tgl_gaji, '%d-%m-%Y') tgl_gaji, date_format(tgl_gaji, '%M %Y') periode_gaji
					FROM tbl_golongan,tbl_pegawai, tbl_gaji,tbl_jabatan 
					WHERE tbl_pegawai.NIP = tbl_gaji.NIP 
					AND tbl_gaji.gol=tbl_golongan.gol 
					AND tbl_gaji.kd_jabatan=tbl_jabatan.kd_jabatan";
					
			return $this->db->query($sql);
		}
		public function view_pegawai()
		{
		
			$nip=$this->session->userdata('nip');
		
			$sql = "SELECT *, date_format(tgl_gaji, '%d-%m-%Y') tgl_gaji, date_format(tgl_gaji, '%M %Y') periode_gaji, tbl_login.username			
			FROM tbl_golongan,tbl_pegawai, tbl_gaji,tbl_jabatan,tbl_login
			WHERE tbl_pegawai.NIP = tbl_gaji.NIP 
			and tbl_gaji.gol=tbl_golongan.gol 
			and tbl_gaji.kd_jabatan=tbl_jabatan.kd_jabatan 
			and tbl_pegawai.NIP=tbl_login.NIP 
			and tbl_gaji.NIP='$nip'";
					
			return $this->db->query($sql);
		}
		
		
		public function view_no_gaji()
		{
			
			$sql = "SELECT *, date_format(tgl_gaji, '%d-%m-%Y') tgl_gaji, date_format(tgl_gaji, '%M %Y') periode_gaji
			FROM tbl_golongan,tbl_pegawai, tbl_gaji,tbl_jabatan,tbl_login, tbl_divisi
			WHERE tbl_pegawai.NIP = tbl_gaji.NIP 
			and tbl_gaji.gol=tbl_golongan.gol 
			and tbl_gaji.kd_jabatan=tbl_jabatan.kd_jabatan 
			and tbl_pegawai.NIP=tbl_login.NIP
			and tbl_gaji.no_gaji='".$this->get_no_gaji()."'";
					
			return $this->db->query($sql);
		}
 
		public function jabatan()
		{
			$sql = "SELECT (SELECT left( kd_jabatan, 5)) FROM tbl_jabatan";
			
			return $this->db->query($sql);
		}
		
		public function view_periode()
		{
			$sql = "SELECT DISTINCT date_format( tgl_gaji, '%M %Y' ) tgl_gaji from tbl_gaji";
			
			return $this->db->query($sql);
		}
		
		function tampil()
		{
			//$this->db->from('mahasiswa');
			$query = $this->db->get('tbl_gaji');
			return $query->result(); 
		}
		
		public function cek()
		{
			$sql="select no_gaji from tbl_gaji";
			
			return $this->db->query($sql);
		}
		
		public function view_by_no_gaji()
		{
			$sql="select * from tbl_gaji where no_gaji='".$this->get_no_gaji()."'";
			
			return $this->db->query($sql);
		}
		
		public function update()
		{
			$sql = "UPDATE tbl_gaji
					SET	
					
					NIP='".$this->get_NIP()."',
					kd_jabatan='".$this->get_kd_jabatan()."',
					gol='".$this->get_gol()."',
					kd_keluarga='".$this->get_kd_keluarga()."',
					jenis_kelamin='".$this->get_jenis_kelamin()."',
					gaji_pokok='".$this->get_gaji_pokok()."',
					tunj_istri='".$this->get_tunj_istri()."',
					tunj_anak='".$this->get_tunj_anak()."',
					gaji_kotor='".$this->get_gaji_kotor()."',
					tunj_jabatan='".$this->get_tunj_jabatan()."',
					tunjangan_kerja='".$this->get_tunjangan_kerja()."',
					pendapatan_kotor='".$this->get_pendapatan_kotor()."',
					astek='".$this->get_astek()."',
					pensiun='".$this->get_pensiun()."',
					pajak='".$this->get_pajak()."',
					puskes='".$this->get_puskes()."',
					koperasi='".$this->get_koperasi()."',
					korpri='".$this->get_korpri()."',
					btn='".$this->get_btn()."',
					kamboja='".$this->get_kamboja()."',
					lain='".$this->get_lain()."',
					tgl_gaji='".$this->get_tgl_gaji()."',
					total_gaji='".$this->get_total_gaji()."'
					
					WHERE no_gaji='".$this->get_no_gaji()."'";
					
			
			$this->db->query($sql);
		}
	
		public function cari_periode()
		{
			$sql = "SELECT DISTINCT date_format(tgl_gaji, '%M %Y' ) periode_gaji FROM tbl_gaji";
		
			$this->db->query($sql);
		}
		
		public function delete()
		{
			
			$sql = "DELETE FROM tbl_gaji WHERE no_gaji = '".$this->get_no_gaji()."'";
			
			$this->db->query($sql);
		}

		public function pilih_tunjangan()
		{
			
			$sql = "SELECT DISTINCT tbl_jabatan.kd_jabatan, jabatan, tunj_jabatan from tbl_jabatan,tbl_gaji where tbl_jabatan.kd_jabatan=tbl_gaji.kd_jabatan"; 
						  
			 return $this->db->query($sql);
		
		}
		
		public function pilih_golongan()
		{
			
			$sql = "SELECT DISTINCT tbl_gaji.gol, (year(curdate())-year(tgl_masuk)) lama_kerja, gaji_pokok,tunjangan_kerja from tbl_gaji,tbl_pegawai where tbl_pegawai.nip=tbl_gaji.nip order by gol"; 
						  
			 return $this->db->query($sql);
		
		}
		
}
?>