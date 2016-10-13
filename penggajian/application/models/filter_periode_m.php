<?PHP
	class Filter_periode_M extends CI_Model
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
		private $pajak_bulan;
		private $kd_jabatan;
		private $gol;
		private $no_gaji;
		private $jenis_kelamin;
		
		
		//private $kd_keluarga;
		//private $tunj_jabatan;
		
		//Methode
		
		public function set_kd_jabatan($value)
		{
			return $this->kd_jabatan=$value;
		}
		
		public function set_periode_gaji($value)
		{
			return $this->periode_gaji=$value;
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
					'".$this->get_gaji_pokok()."',
					'".$this->get_tunj_jabatan()."',
					'".$this->get_tunjangan_kerja()."',
					'".$this->get_puskes()."',
					'".$this->get_koperasi()."',
					'".$this->get_korpri()."',
					'".$this->get_btn()."',
					'".$this->get_kamboja()."',
					'".$this->get_lain()."',
					'".$this->get_tgl_gaji()."',
					'".$this->get_no_gaji()."')";
			
			return $this->db->query($sql);
		}
	
		public function cari_periode()
		{
			$sql = "SELECT DISTINCT date_format(tgl_gaji, '%M %Y' ) periode_gaji FROM tbl_gaji";
		
			$this->db->query($sql);
		}
		
		 
  
  		public function tampil_periode()
		{
		
			$blnth = $_POST['bulantahun'];  
			
			$sql = "SELECT *, date_format(tgl_gaji, '%d-%m-%Y') tgl_gaji, date_format(tgl_gaji, '%M %Y') periode_gaji
				FROM tbl_gaji,tbl_pegawai,tbl_jabatan 
				WHERE tbl_pegawai.NIP=tbl_gaji.NIP 
				and tbl_jabatan.kd_jabatan=tbl_gaji.kd_jabatan 
				and date_format(tgl_gaji, '%M %Y') = '$blnth'";
		
					
			return $this->db->query($sql);
	}
	
	public function tampil_periode_m()
	{
	
		$blnth = $_POST['bulantahun'];  
		
		$sql = "SELECT *, date_format(tgl_gaji, '%d-%m-%Y') tgl_gaji, date_format(tgl_gaji, '%M %Y') periode_gaji, (SELECT count(nama_peg)) AS total_peg
				FROM tbl_gaji,tbl_pegawai,tbl_jabatan WHERE tbl_pegawai.NIP=tbl_gaji.NIP and tbl_jabatan.kd_jabatan=tbl_gaji.kd_jabatan and date_format(tgl_gaji, '%M %Y') = 			 				'$blnth'";
	
				
		return $this->db->query($sql);
	}
	
	
	public function jumlah_pengeluaran()
	{
	
		$blnth = $_POST['bulantahun'];  
		
		$sql = "SELECT *, date_format(tgl_gaji, '%d-%m-%Y') tgl_gaji, date_format(tgl_gaji, '%M %Y') periode_gaji, (select(sum(total_gaji))) as jumlah_pengeluaran
				FROM tbl_gaji,tbl_pegawai,tbl_jabatan WHERE tbl_pegawai.NIP=tbl_gaji.NIP and tbl_jabatan.kd_jabatan=tbl_gaji.kd_jabatan and date_format(tgl_gaji, '%M %Y') = 			 					'$blnth'";
	
				
		return $this->db->query($sql);
	}
	
	
	
	
	public function cari_periode2()
	{
		$sql="select distinct date_format(tgl_gaji, '%M %Y') as tgl_gaji from tbl_gaji";
		
		return $this->db->query($sql);
	}
	
}
?>