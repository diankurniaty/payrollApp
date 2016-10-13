<?PHP
	class Gajipegawai extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("pegawai_m");
			$this->load->model("gajipegawai_m");
			$this->load->model("jabatan_m");
			$this->load->model("login_m");
			
			$this->load->library("tcpdf");
			
		}
		
		public function index()
		{
			$this->load->view("gajipegawai_v");	
		}
		
		public function tambahdatagaji()
		{
			$this->load->view("tambahdatagaji_v");	
		}
		
		
		public function cari_periode()
		{
			$this->load->view("cariperiode_v");	
		}
		
		public function tampil_periode()
		{
			$this->load->view("cariperiode_v");	
		}
		
		public function preview()
		{
			$this->load->view("filter_no_gaji_v");	
		}
		
		
		public function filter_periode()
		{
			$this->load->view("filter_periode_v");	
		}
		
		public function save()
		{
			$this->gajipegawai_m->set_NIP($this->input->post("NIP"));
			$date_gaji = $this->input->post('tgl_gaji');
			$date_periode = $this->input->post('periode_gaji');
			$tunj_jabatan = $this->input->post('tunj_jabatan');
			$noNota = $this->input->post('no_gaji');
			
			//mencari tunjangan jabatan pegawai
			if($this->input->post("kd_jabatan") == 'STAFF')
			{
			 	$tunj_jabatan=350000;
			}
		
			elseif(($this->input->post("kd_jabatan") == 'KASIE-VERIF') || ($this->input->post("kd_jabatan") == 'KASIE-AKNPJK') || ($this->input->post("kd_jabatan") == 'KASIE-ADM')
			|| ($this->input->post("kd_jabatan") == 'KASIE-ADM-TEH') || ($this->input->post("kd_jabatan") == 'KASIE-ADMKEU') || ($this->input->post("kd_jabatan") == 'KASIE-ADMSDM')
			|| ($this->input->post("kd_jabatan") == 'KASIE-ADUM') || ($this->input->post("kd_jabatan") == 'KASIE-ANHUK') || ($this->input->post("kd_jabatan") == 'KASIE-ASET')
			|| ($this->input->post("kd_jabatan") == 'KASIE-BANG') || ($this->input->post("kd_jabatan") == 'KASIE-BANGMAS') || ($this->input->post("kd_jabatan") == 'KASIE-BINPROG')
			|| ($this->input->post("kd_jabatan") == 'KASIE-GDAR') || ($this->input->post("kd_jabatan") == 'KASIE-IKAL') || ($this->input->post("kd_jabatan") == 'KASIE-INFR')
			|| ($this->input->post("kd_jabatan") == 'KASIE-INVENT') || ($this->input->post("kd_jabatan") == 'KASIE-JARMED') || ($this->input->post("kd_jabatan") == 'KASIE-JUAL')
			|| ($this->input->post("kd_jabatan") == 'KASIE-KAMTIB') || ($this->input->post("kd_jabatan") == 'KASIE-KAPRT') || ($this->input->post("kd_jabatan") == 'KASIE-KAS')
			|| ($this->input->post("kd_jabatan") == 'KASIE-KRJS') || ($this->input->post("kd_jabatan") == 'KASIE-LITANG') || ($this->input->post("kd_jabatan") == 'KASIE-LNK')
			|| ($this->input->post("kd_jabatan") == 'KASIE-MEDIS') || ($this->input->post("kd_jabatan") == 'KASIE-MONEV') || ($this->input->post("kd_jabatan") == 'KASIE-OLAH')
			|| ($this->input->post("kd_jabatan") == 'KASIE-OPR') || ($this->input->post("kd_jabatan") == 'KASIE-PLUMB') || ($this->input->post("kd_jabatan") == 'KASIE-PROMIK')
			|| ($this->input->post("kd_jabatan") == 'KASIE-PROTDOK') || ($this->input->post("kd_jabatan") == 'KASIE-RENANG') || ($this->input->post("kd_jabatan") == 'KASIE-RENSDM')
			|| ($this->input->post("kd_jabatan") == 'KASIE-RENUS') || ($this->input->post("kd_jabatan") == 'KASIE-SEKR') || ($this->input->post("kd_jabatan") == 'KASIE-SOLLAP')
			|| ($this->input->post("kd_jabatan") == 'KASIE-TEHNIK') || ($this->input->post("kd_jabatan") == 'KASIE-UTL') || ($this->input->post("kd_jabatan") == 'KASIE-DEWASLU')
			|| ($this->input->post("kd_jabatan") == 'KASPI') || ($this->input->post("kd_jabatan") == 'KASIE-TU'))
			{
				 $tunj_jabatan=750000;
			}
			
			elseif(($this->input->post("kd_jabatan") == 'KASUBDIV-ADMKEU') || ($this->input->post("kd_jabatan") == 'KASUBDIV-AKN') 
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-ANG') || ($this->input->post("kd_jabatan") == 'KASUBDIV-ASET') 
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-BANG') || ($this->input->post("kd_jabatan") == 'KASUBDIV-HUKJAN')
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-HUMAS') || ($this->input->post("kd_jabatan") == 'KASUBDIV-INF')
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-LINGKU') || ($this->input->post("kd_jabatan") == 'KASUBDIV-PSR') 
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-PU') || ($this->input->post("kd_jabatan") == 'KASUBDIV-RENPRO')
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-SDM') || ($this->input->post("kd_jabatan") == 'KASUBDIV-UM'))
			{
				 $tunj_jabatan=1650000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'KANIT')
			{
				 $tunj_jabatan=2200000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'KADIV')
			{
				 $tunj_jabatan=3000000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'DIRUT')
			{
				$tunj_jabatan=14842000;
			}
			
			elseif(($this->input->post("kd_jabatan") == 'DIRUM') || ($this->input->post("kd_jabatan") == 'DIRKEU') || ($this->input->post("kd_jabatan") == 'DIR-PPU'))
			{
				$tunj_jabatan=12020000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'KASPI')
			{
				$tunj_jabatan=9198000;
			}
			
			else
			{
				$tunj_jabatan=0;
			}
			
			
			
			//mencari tunjangan kerja pegawai
			$tunjangan_kerja= $this->input->post('tunjangan_kerja');
			
			if($this->input->post("gol") == 'IA')
			{
			 	$tunjangan_kerja=800000;
			}
		
			elseif($this->input->post("gol") == 'IB')
			{
			 	$tunjangan_kerja=850000;
			}
			
			elseif($this->input->post("gol") == 'IC')
			{
			 	$tunjangan_kerja=900000;
			}
			
			elseif($this->input->post("gol") == 'ID')
			{
			 	$tunjangan_kerja=950000;
			}
			
			elseif($this->input->post("gol") == 'IIA')
			{
			 	$tunjangan_kerja=1000000;
			}
			elseif($this->input->post("gol") == 'IIB')
			{
			 	$tunjangan_kerja=1050000;
			}
			
			elseif($this->input->post("gol") == 'IIC')
			{
			 	$tunjangan_kerja=1100000;
			}
			elseif($this->input->post("gol") == 'IID')
			{
			 	$tunjangan_kerja=1150000;
			}
			
			elseif($this->input->post("gol") == 'IIIA')
			{
			 	$tunjangan_kerja=1200000;
			}
			
			elseif($this->input->post("gol") == 'IIIB')
			{
			 	$tunjangan_kerja=1250000;
			}
			
			elseif($this->input->post("gol") == 'IIIC')
			{
			 	$tunjangan_kerja=1300000;
			}
			elseif($this->input->post("gol") == 'IIID')
			{
			 	$tunjangan_kerja=1350000;
			}
			
			elseif($this->input->post("gol") == 'IVA')
			{
			 	$tunjangan_kerja=1400000;
			}
			elseif($this->input->post("gol") == 'IVB')
			{
			 	$tunjangan_kerja=1450000;
			}
			
			elseif($this->input->post("gol") == 'IVC')
			{
			 	$tunjangan_kerja=1500000;
			}
			elseif($this->input->post("gol") == 'IVD')
			{
			 	$tunjangan_kerja=1550000;
			}
			
			elseif($this->input->post("gol") == 'IVE')
			{
			 	$tunjangan_kerja=1600000;
			}
			else
			{
				$tunjangan_kerja=0;
			}
			
			
			//mencari gaji pokok pegawai
			$gaji_pokok= $this->input->post('gaji_pokok');
			if(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=1260000;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1297600;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1336400;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1376300;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=1417400;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=1459700;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=1503300;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=1548200;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=1594400;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=1642000;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=1691000;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=1741500;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=1793500;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=1847000;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1372700;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1413700;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1455900;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=1499400;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=1544100;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=1590300;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=1637700;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=1686600;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=1737000;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=1788900;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=1842300;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=1897300;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") == '27'))
			{
				$gaji_pokok=1953900;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1430800;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1473500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1517500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=1562800;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=1609500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=1657500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=1707000;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=1758000;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=1810500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=1864500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=1920200;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=1977500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") == '27'))
			{
				$gaji_pokok=2036600;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1491300;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1535800;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1581700;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=1628900;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=1677500;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=1727600;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=1779200;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=1832300;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=1887000;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=1943400;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=2001400;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=2061200;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") == '27'))
			{
				$gaji_pokok=2122700;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=1624700;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=1648900;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1698200;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1748900;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1801100;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=1854900;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=1910300;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=1967300;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2026000;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2086500;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=2148800;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=2213000;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=2279100;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=2347100;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=2417200;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=2489400;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=2563700;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") == '33'))
			{
				$gaji_pokok=2640200;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1770000;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1822900;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1877300;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=1933300;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=1991100;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2050500;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2111700;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2174800;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=2239700;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=2306600;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=2375500;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=2446400;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=2519400;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=2594700;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=2672100;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") == '33'))
			{
				$gaji_pokok=2751900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1844900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1900000;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1956700;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2015100;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2075300;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2137200;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2201100;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2266800;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=2334500;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=2404200;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=2475900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=2549900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=2626000;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=2704400;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=2785200;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") == '33'))
			{
				$gaji_pokok=2868300;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1922900;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1980300;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2039500;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2100400;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2163100;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2227700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2294200;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2362700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=2433200;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=2505900;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=2580700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=2657700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=2737100;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=2818800;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=2903000;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") == '33'))
			{
				$gaji_pokok=2989600;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2064100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2125700;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2189200;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2254600;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2321900;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2391200;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2462600;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2536100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2611900;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2689800;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=2770100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2852900;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=2938000;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3025800;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3116100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=3209100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=3305000;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2151400;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2215700;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2281800;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2349900;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2420100;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2492400;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2566800;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2643400;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2722300;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2803600;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=2887300;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2973500;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3062300;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3153700;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3247900;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=3344900;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=3444800;
			}
			
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2242400;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2309400;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2378300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2449300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2522500;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2597800;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2675300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2755200;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2837500;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2922200;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3009500;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3099300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3191900;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3287200;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3385300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=3486400;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=3590500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2337300;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2407100;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2478900;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2552900;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2629200;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2707700;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2788500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2871800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2957500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=3045800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3136800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3230400;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3326900;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3426200;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3528500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=3633800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=3742300;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2436100;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2508900;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2583800;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2660900;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2740400;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2822200;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2906500;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2993200;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=3082600;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=3174700;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3269400;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3367100;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3467600;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3571100;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3677800;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=3787600;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=3900600;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2539200;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2615000;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2693100;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2773500;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2856300;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2941600;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=3029400;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=3119900;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=3213000;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=3308900;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3407700;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3509500;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3614300;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3722200;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3833300;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=3947800;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=4065600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2646600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2725600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2807000;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2890800;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2977100;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=3066000;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=3157600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=3251800;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=3348900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=3448900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3551900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3657900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3767200;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=3879600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=3995500;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=4114800;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=4237600;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2758500;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2840900;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=2925700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=3013100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=3103100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=3195700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=3291100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=3251800;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=3348900;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=3594800;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3702100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3812700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=3926500;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=4043700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=4164500;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=4288800;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=4416900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=2875200;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=2961100;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=3049500;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=3140500;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=3234300;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=3330900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=3430300;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=3532800;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=3638200;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=3746900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=3858700;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=3973900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=4092600;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=4214800;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=4340600;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=4470200;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") == '32'))
			{
				$gaji_pokok=4603700;
			}
			else
			{
				$gaji_pokok=0;
			}
			
			
			//mencari tunjangan istri/suami pegawai
			if(($this->input->post("kd_keluarga") == '-/-') || ($this->input->post("kd_keluarga") == '-/1') || ($this->input->post("kd_keluarga") == '-/2') 
			|| ($this->input->post("kd_keluarga") == '-/3'))
			{
				$tunj_istri=0;
			}
			else
			{
				$tunj_istri=$gaji_pokok*0.1;
			}
			
			//mencari tuunjangan anak
			if(($this->input->post("kd_keluarga") == '1/1') || ($this->input->post("kd_keluarga") == '-/1'))
			{
				$tunj_anak=$gaji_pokok*0.02;
			}
			elseif(($this->input->post("kd_keluarga") == '-/2') || ($this->input->post("kd_keluarga") == '1/2'))
			{			
				$tunj_anak=$gaji_pokok*0.04;
			}
			elseif(($this->input->post("kd_keluarga") == '-/3') || ($this->input->post("kd_keluarga") == '1/3'))
			{			
				$tunj_anak=$gaji_pokok*0.06;
			}
			else
			{
				$tunj_anak=0;
			}
			
			//mencari gaji kotor
			$gaji_kotor=$gaji_pokok+$tunj_istri+$tunj_anak;
			//mencari pendapatan kotor
			$pendapatan_kotor=$gaji_kotor+$tunj_jabatan+$tunjangan_kerja;
			//mencari astek
			$astek=$pendapatan_kotor*0.02;
			//mencari iuran dana pensiun
			$pensiun=$gaji_kotor*0.01;
			//mencari pajak
			$bruto_thn=$pendapatan_kotor*12;
			$biaya_jabatan=$bruto_thn*0.05;
			$astek_thn=$bruto_thn*0.02;
			$pensiun_thn=$gaji_kotor*0.1*12;
			$netto=$bruto_thn+$biaya_jabatan+$astek_thn+$pensiun_thn;
			//mencari PTKP untuk menghitung pajak
			if($this->input->post("jenis_kelamin") == 'L')
			{
				if(($this->input->post("kd_keluarga") == '1/-') || ($this->input->post("kd_keluarga") == '-/1'))
				{
					$ptkp=26325000;
				}
				elseif(($this->input->post("kd_keluarga") == '1/1') || ($this->input->post("kd_keluarga") == '-/2'))
				{
					$ptkp=28350000;
				}
				elseif(($this->input->post("kd_keluarga") == '1/2') || ($this->input->post("kd_keluarga") == '-/3'))
				{
					$ptkp=30375000;
				}
				elseif($this->input->post("kd_keluarga") == '1/3')
				{
					$ptkp=32400000;
				}
				else
				{
					$ptkp=24300000;
				}
				
			}
			else
			{
				$ptkp=24300000;
			}
			
			//mencari PKP
			$pkp=$netto-$ptkp;
			
			//mencari pph_tahun
			if($pkp<50000000)
			{
				$pph_tahun=$pkp*0.05;
			}
			elseif($pkp<250000000)
			{	
				$pph_tahun=$pkp*0.15;
			}
			elseif($pkp<500000000)
			{
				$pph_tahun=$pkp*0.25;
			}
			else
			{
				$pph_tahun=$pkp*0.3;
			}
			
			//mencari pajak(pph_bulan)
			$pajak=$pph_tahun/12;
			
			//mencari jumlah potongan
			$puskes=$this->input->post('puskes');
			$koperasi=$this->input->post('koperasi');
			$korpri=$this->input->post('korpri');
			$btn=$this->input->post('btn');
			$kamboja=$this->input->post('kamboja');
			$lain=$this->input->post('lain');
			$jumlah_potongan=$puskes+$koperasi+$korpri+$btn+$kamboja+$lain;
			
			//mencari total gaji pegawai
			$total_gaji=	$pendapatan_kotor-$pajak-$astek-$pensiun-$jumlah_potongan;		
			
			$query = $this->gajipegawai_m->view_by_no_gaji();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				
				$this->gajipegawai_m->set_no_gaji($this->input->post("no_gaji"));
				$this->gajipegawai_m->set_NIP($this->input->post("NIP"));
				$this->gajipegawai_m->set_kd_jabatan($this->input->post("kd_jabatan"));
				$this->gajipegawai_m->set_gol($this->input->post("gol"));
				$this->gajipegawai_m->set_kd_keluarga($this->input->post("kd_keluarga"));
				$this->gajipegawai_m->set_jenis_kelamin($this->input->post("jenis_kelamin"));
				$this->gajipegawai_m->set_gaji_pokok($gaji_pokok);
				$this->gajipegawai_m->set_tunj_istri($tunj_istri);
				$this->gajipegawai_m->set_tunj_anak($tunj_anak);
				$this->gajipegawai_m->set_gaji_kotor($gaji_kotor);
				$this->gajipegawai_m->set_tunj_jabatan($tunj_jabatan);
				$this->gajipegawai_m->set_tunjangan_kerja($tunjangan_kerja);
				$this->gajipegawai_m->set_pendapatan_kotor($pendapatan_kotor);
				$this->gajipegawai_m->set_astek($astek);
				$this->gajipegawai_m->set_pensiun($pensiun);
				$this->gajipegawai_m->set_pajak($pajak);				
				$this->gajipegawai_m->set_total_gaji($total_gaji);
				$this->gajipegawai_m->set_puskes($this->input->post("puskes"));
				$this->gajipegawai_m->set_koperasi($this->input->post("koperasi"));
				$this->gajipegawai_m->set_korpri($this->input->post("korpri"));
				$this->gajipegawai_m->set_btn($this->input->post("btn"));
				$this->gajipegawai_m->set_kamboja($this->input->post("kamboja"));
				$this->gajipegawai_m->set_lain($this->input->post("lain"));
				$this->gajipegawai_m->set_tgl_gaji(date('Y-m-d', strtotime($date_gaji)));
				$this->gajipegawai_m->get_periode_gaji($this->input->post("periode_gaji"));
				
				
				
				/*$query = $this->pegawai_m->view();
				if($query->num_rows())
				{
				if(jenis_kelamin=='P')
					$this->gajipegawai_m->get_pajak_bulan($this->input->post("pajak_bulan_p"));
				else
					$this->gajipegawai_m->get_pajak_bulan($this->input->post("pajak_bulan_l"));
				}
				*/
				$this->gajipegawai_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("gajipegawai_v", $data);
		}
		
		public function update()
		{
			$this->gajipegawai_m->set_NIP($this->input->post("NIP"));
			$date_gaji = $this->input->post('tgl_gaji');
			$date_periode = $this->input->post('periode_gaji');
			$tunj_jabatan = $this->input->post('tunj_jabatan');
			$noNota = $this->input->post('no_gaji');
			
			//mencari tunjangan jabatan pegawai
			if($this->input->post("kd_jabatan") == 'STAFF')
			{
			 	$tunj_jabatan=350000;
			}
		
			elseif(($this->input->post("kd_jabatan") == 'KASIE-VERIF') || ($this->input->post("kd_jabatan") == 'KASIE-AKNPJK') || ($this->input->post("kd_jabatan") == 'KASIE-ADM')
			|| ($this->input->post("kd_jabatan") == 'KASIE-ADM-TEH') || ($this->input->post("kd_jabatan") == 'KASIE-ADMKEU') || ($this->input->post("kd_jabatan") == 'KASIE-ADMSDM')
			|| ($this->input->post("kd_jabatan") == 'KASIE-ADUM') || ($this->input->post("kd_jabatan") == 'KASIE-ANHUK') || ($this->input->post("kd_jabatan") == 'KASIE-ASET')
			|| ($this->input->post("kd_jabatan") == 'KASIE-BANG') || ($this->input->post("kd_jabatan") == 'KASIE-BANGMAS') || ($this->input->post("kd_jabatan") == 'KASIE-BINPROG')
			|| ($this->input->post("kd_jabatan") == 'KASIE-GDAR') || ($this->input->post("kd_jabatan") == 'KASIE-IKAL') || ($this->input->post("kd_jabatan") == 'KASIE-INFR')
			|| ($this->input->post("kd_jabatan") == 'KASIE-INVENT') || ($this->input->post("kd_jabatan") == 'KASIE-JARMED') || ($this->input->post("kd_jabatan") == 'KASIE-JUAL')
			|| ($this->input->post("kd_jabatan") == 'KASIE-KAMTIB') || ($this->input->post("kd_jabatan") == 'KASIE-KAPRT') || ($this->input->post("kd_jabatan") == 'KASIE-KAS')
			|| ($this->input->post("kd_jabatan") == 'KASIE-KRJS') || ($this->input->post("kd_jabatan") == 'KASIE-LITANG') || ($this->input->post("kd_jabatan") == 'KASIE-LNK')
			|| ($this->input->post("kd_jabatan") == 'KASIE-MEDIS') || ($this->input->post("kd_jabatan") == 'KASIE-MONEV') || ($this->input->post("kd_jabatan") == 'KASIE-OLAH')
			|| ($this->input->post("kd_jabatan") == 'KASIE-OPR') || ($this->input->post("kd_jabatan") == 'KASIE-PLUMB') || ($this->input->post("kd_jabatan") == 'KASIE-PROMIK')
			|| ($this->input->post("kd_jabatan") == 'KASIE-PROTDOK') || ($this->input->post("kd_jabatan") == 'KASIE-RENANG') || ($this->input->post("kd_jabatan") == 'KASIE-RENSDM')
			|| ($this->input->post("kd_jabatan") == 'KASIE-RENUS') || ($this->input->post("kd_jabatan") == 'KASIE-SEKR') || ($this->input->post("kd_jabatan") == 'KASIE-SOLLAP')
			|| ($this->input->post("kd_jabatan") == 'KASIE-TEHNIK') || ($this->input->post("kd_jabatan") == 'KASIE-UTL') || ($this->input->post("kd_jabatan") == 'KASIE-DEWASLU')
			|| ($this->input->post("kd_jabatan") == 'KASPI') || ($this->input->post("kd_jabatan") == 'KASIE-TU'))
			{
				 $tunj_jabatan=750000;
			}
			
			elseif(($this->input->post("kd_jabatan") == 'KASUBDIV-ADMKEU') || ($this->input->post("kd_jabatan") == 'KASUBDIV-AKN') 
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-ANG') || ($this->input->post("kd_jabatan") == 'KASUBDIV-ASET') 
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-BANG') || ($this->input->post("kd_jabatan") == 'KASUBDIV-HUKJAN')
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-HUMAS') || ($this->input->post("kd_jabatan") == 'KASUBDIV-INF')
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-LINGKU') || ($this->input->post("kd_jabatan") == 'KASUBDIV-PSR') 
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-PU') || ($this->input->post("kd_jabatan") == 'KASUBDIV-RENPRO')
			|| ($this->input->post("kd_jabatan") == 'KASUBDIV-SDM') || ($this->input->post("kd_jabatan") == 'KASUBDIV-UM'))
			{
				 $tunj_jabatan=1650000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'KANIT')
			{
				 $tunj_jabatan=2200000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'KADIV')
			{
				 $tunj_jabatan=3000000;
			}
			
			elseif($this->input->post("kd_jabatan") == 'DIRUT')
			{
				$tunj_jabatan=14842000;
			}
			
			elseif(($this->input->post("kd_jabatan") == 'DIRUM') || ($this->input->post("kd_jabatan") == 'DIRKEU') || ($this->input->post("kd_jabatan") == 'DIR-PPU'))
			{
				$tunj_jabatan=12020000;
			}
			
			else
			{
				$tunj_jabatan=0;
			}
			
			
			
			//mencari tunjangan kerja pegawai
			$tunjangan_kerja= $this->input->post('tunjangan_kerja');
			
			if($this->input->post("gol") == 'IA')
			{
			 	$tunjangan_kerja=800000;
			}
		
			elseif($this->input->post("gol") == 'IB')
			{
			 	$tunjangan_kerja=850000;
			}
			
			elseif($this->input->post("gol") == 'IC')
			{
			 	$tunjangan_kerja=900000;
			}
			
			elseif($this->input->post("gol") == 'ID')
			{
			 	$tunjangan_kerja=950000;
			}
			
			elseif($this->input->post("gol") == 'IIA')
			{
			 	$tunjangan_kerja=1000000;
			}
			elseif($this->input->post("gol") == 'IIB')
			{
			 	$tunjangan_kerja=1050000;
			}
			
			elseif($this->input->post("gol") == 'IIC')
			{
			 	$tunjangan_kerja=1100000;
			}
			elseif($this->input->post("gol") == 'IID')
			{
			 	$tunjangan_kerja=1150000;
			}
			
			elseif($this->input->post("gol") == 'IIIA')
			{
			 	$tunjangan_kerja=1200000;
			}
			
			elseif($this->input->post("gol") == 'IIIB')
			{
			 	$tunjangan_kerja=1250000;
			}
			
			elseif($this->input->post("gol") == 'IIIC')
			{
			 	$tunjangan_kerja=1300000;
			}
			elseif($this->input->post("gol") == 'IIID')
			{
			 	$tunjangan_kerja=1350000;
			}
			
			elseif($this->input->post("gol") == 'IVA')
			{
			 	$tunjangan_kerja=1400000;
			}
			elseif($this->input->post("gol") == 'IVB')
			{
			 	$tunjangan_kerja=1450000;
			}
			
			elseif($this->input->post("gol") == 'IVC')
			{
			 	$tunjangan_kerja=1500000;
			}
			elseif($this->input->post("gol") == 'IVD')
			{
			 	$tunjangan_kerja=1550000;
			}
			
			elseif($this->input->post("gol") == 'IVE')
			{
			 	$tunjangan_kerja=1600000;
			}
			else
			{
				$tunjangan_kerja=0;
			}
			
			
			//mencari gaji pokok pegawai
			$gaji_pokok= $this->input->post('gaji_pokok');
			if(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=1260000;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=1297600;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=1336400;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=1376300;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=1417400;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=1459700;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=1503300;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=1548200;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=1594400;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=1642000;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=1691000;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=1741500;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=1793500;
			}
			elseif(($this->input->post("gol") == 'IA')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=1847000;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1372700;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1413700;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1455900;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=1499400;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=1544100;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=1590300;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=1637700;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=1686600;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=1737000;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=1788900;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=1842300;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=1897300;
			}
			elseif(($this->input->post("gol") == 'IB')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=1953900;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1430800;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1473500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1517500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=1562800;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=1609500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=1657500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=1707000;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=1758000;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=1810500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=1864500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=1920200;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=1977500;
			}
			elseif(($this->input->post("gol") == 'IC')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=2036600;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1491300;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1535800;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1581700;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=1628900;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=1677500;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=1727600;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=1779200;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=1832300;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=1887000;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=1943400;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2001400;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=2061200;
			}
			elseif(($this->input->post("gol") == 'ID')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=2122700;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=1624700;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '1'))
			{
				$gaji_pokok=1648900;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1698200;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1748900;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1801100;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=1854900;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=1910300;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=1967300;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2026000;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2086500;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2148800;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=2213000;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2279100;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=2347100;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=2417200;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=2489400;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=2563700;
			}
			elseif(($this->input->post("gol") == 'IIA')&& ($this->input->post("lama_kerja") <= '33'))
			{
				$gaji_pokok=2640200;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1770000;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1822900;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1877300;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=1933300;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=1991100;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2050500;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2111700;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2174800;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2239700;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=2306600;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2375500;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=2446400;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=2519400;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=2594700;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=2672100;
			}
			elseif(($this->input->post("gol") == 'IIB')&& ($this->input->post("lama_kerja") <= '33'))
			{
				$gaji_pokok=2751900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1844900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1900000;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=1956700;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2015100;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2075300;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2137200;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2201100;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2266800;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2334500;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=2404200;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2475900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=2549900;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=2626000;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=2704400;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=2785200;
			}
			elseif(($this->input->post("gol") == 'IIC')&& ($this->input->post("lama_kerja") <= '33'))
			{
				$gaji_pokok=2868300;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '3'))
			{
				$gaji_pokok=1922900;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '5'))
			{
				$gaji_pokok=1980300;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '7'))
			{
				$gaji_pokok=2039500;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '9'))
			{
				$gaji_pokok=2100400;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '11'))
			{
				$gaji_pokok=2163100;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '13'))
			{
				$gaji_pokok=2227700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '15'))
			{
				$gaji_pokok=2294200;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '17'))
			{
				$gaji_pokok=2362700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '19'))
			{
				$gaji_pokok=2433200;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '21'))
			{
				$gaji_pokok=2505900;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '23'))
			{
				$gaji_pokok=2580700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '25'))
			{
				$gaji_pokok=2657700;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '27'))
			{
				$gaji_pokok=2737100;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '29'))
			{
				$gaji_pokok=2818800;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '31'))
			{
				$gaji_pokok=2903000;
			}
			elseif(($this->input->post("gol") == 'IID')&& ($this->input->post("lama_kerja") <= '33'))
			{
				$gaji_pokok=2989600;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2064100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2125700;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2189200;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2254600;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2321900;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2391200;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2462600;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2536100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2611900;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2689800;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=2770100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=2852900;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=2938000;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3025800;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3116100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=3209100;
			}
			elseif(($this->input->post("gol") == 'IIIA')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=3305000;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2151400;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2215700;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2281800;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2349900;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2420100;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2492400;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2566800;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2643400;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2722300;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2803600;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=2887300;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=2973500;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3062300;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3153700;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3247900;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=3344900;
			}
			elseif(($this->input->post("gol") == 'IIIB')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=3444800;
			}
			
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2242400;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2309400;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2378300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2449300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2522500;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2597800;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2675300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2755200;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2837500;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=2922200;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3009500;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3099300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3191900;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3287200;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3385300;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=3486400;
			}
			elseif(($this->input->post("gol") == 'IIIC')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=3590500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2337300;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2407100;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2478900;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2552900;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2629200;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2707700;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2788500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2871800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=2957500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=3045800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3136800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3230400;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3326900;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3426200;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3528500;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=3633800;
			}
			elseif(($this->input->post("gol") == 'IIID')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=3742300;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2436100;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2508900;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2583800;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2660900;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2740400;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2822200;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=2906500;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=2993200;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=3082600;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=3174700;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3269400;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3367100;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3467600;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3571100;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3677800;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=3787600;
			}
			elseif(($this->input->post("gol") == 'IVA')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=3900600;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2539200;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2615000;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2693100;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2773500;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2856300;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=2941600;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=3029400;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=3119900;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=3213000;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=3308900;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3407700;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3509500;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3614300;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3722200;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3833300;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=3947800;
			}
			elseif(($this->input->post("gol") == 'IVB')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=4065600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2646600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2725600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2807000;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=2890800;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=2977100;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=3066000;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=3157600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=3251800;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=3348900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=3448900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3551900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3657900;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3767200;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=3879600;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=3995500;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=4114800;
			}
			elseif(($this->input->post("gol") == 'IVC')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=4237600;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2758500;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2840900;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=2925700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=3013100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=3103100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=3195700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=3291100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=3251800;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=3348900;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=3594800;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3702100;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3812700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=3926500;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=4043700;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=4164500;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=4288800;
			}
			elseif(($this->input->post("gol") == 'IVD')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=4416900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") == '0'))
			{
				$gaji_pokok=2875200;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '2'))
			{
				$gaji_pokok=2961100;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '4'))
			{
				$gaji_pokok=3049500;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '6'))
			{
				$gaji_pokok=3140500;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '8'))
			{
				$gaji_pokok=3234300;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '10'))
			{
				$gaji_pokok=3330900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '12'))
			{
				$gaji_pokok=3430300;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '14'))
			{
				$gaji_pokok=3532800;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '16'))
			{
				$gaji_pokok=3638200;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '18'))
			{
				$gaji_pokok=3746900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '20'))
			{
				$gaji_pokok=3858700;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '22'))
			{
				$gaji_pokok=3973900;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '24'))
			{
				$gaji_pokok=4092600;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '26'))
			{
				$gaji_pokok=4214800;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '28'))
			{
				$gaji_pokok=4340600;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '30'))
			{
				$gaji_pokok=4470200;
			}
			elseif(($this->input->post("gol") == 'IVE')&& ($this->input->post("lama_kerja") <= '32'))
			{
				$gaji_pokok=4603700;
			}
			else
			{
				$gaji_pokok=0;
			}
			
			
			//mencari tunjangan istri/suami pegawai
			if(($this->input->post("kd_keluarga") == '-/-') || ($this->input->post("kd_keluarga") == '-/1') || ($this->input->post("kd_keluarga") == '-/2') 
			|| ($this->input->post("kd_keluarga") == '-/3'))
			{
				$tunj_istri=0;
			}
			else
			{
				$tunj_istri=$gaji_pokok*0.1;
			}
			
			//mencari tuunjangan anak
			if(($this->input->post("kd_keluarga") == '1/1') || ($this->input->post("kd_keluarga") == '-/1'))
			{
				$tunj_anak=$gaji_pokok*0.02;
			}
			elseif(($this->input->post("kd_keluarga") == '-/2') || ($this->input->post("kd_keluarga") == '1/2'))
			{			
				$tunj_anak=$gaji_pokok*0.04;
			}
			elseif(($this->input->post("kd_keluarga") == '-/3') || ($this->input->post("kd_keluarga") == '1/3'))
			{			
				$tunj_anak=$gaji_pokok*0.06;
			}
			else
			{
				$tunj_anak=0;
			}
			
			//mencari gaji kotor
			$gaji_kotor=$gaji_pokok+$tunj_istri+$tunj_anak;
			//mencari pendapatan kotor
			$pendapatan_kotor=$gaji_kotor+$tunj_jabatan+$tunjangan_kerja;
			//mencari astek
			$astek=$pendapatan_kotor*0.02;
			//mencari iuran dana pensiun
			$pensiun=$gaji_kotor*0.01;
			//mencari pajak
			$bruto_thn=$pendapatan_kotor*12;
			$biaya_jabatan=$bruto_thn*0.05;
			$astek_thn=$bruto_thn*0.02;
			$pensiun_thn=$gaji_kotor*0.1*12;
			$netto=$bruto_thn+$biaya_jabatan+$astek_thn+$pensiun_thn;
			//mencari PTKP untuk menghitung pajak
			if($this->input->post("jenis_kelamin") == 'L')
			{
				if(($this->input->post("kd_keluarga") == '1/-') || ($this->input->post("kd_keluarga") == '-/1'))
				{
					$ptkp=26325000;
				}
				elseif(($this->input->post("kd_keluarga") == '1/1') || ($this->input->post("kd_keluarga") == '-/2'))
				{
					$ptkp=28350000;
				}
				elseif(($this->input->post("kd_keluarga") == '1/2') || ($this->input->post("kd_keluarga") == '-/3'))
				{
					$ptkp=30375000;
				}
				elseif($this->input->post("kd_keluarga") == '1/3')
				{
					$ptkp=32400000;
				}
				else
				{
					$ptkp=24300000;
				}
				
			}
			else
			{
				$ptkp=24300000;
			}
			
			//mencari PKP
			$pkp=$netto-$ptkp;
			
			//mencari pph_tahun
			if($pkp<50000000)
			{
				$pph_tahun=$pkp*0.05;
			}
			elseif($pkp<250000000)
			{	
				$pph_tahun=$pkp*0.15;
			}
			elseif($pkp<500000000)
			{
				$pph_tahun=$pkp*0.25;
			}
			else
			{
				$pph_tahun=$pkp*0.3;
			}
			
			//mencari pajak(pph_bulan)
			$pajak=$pph_tahun/12;
			
			//mencari jumlah potongan
			$puskes=$this->input->post('puskes');
			$koperasi=$this->input->post('koperasi');
			$korpri=$this->input->post('korpri');
			$btn=$this->input->post('btn');
			$kamboja=$this->input->post('kamboja');
			$lain=$this->input->post('lain');
			$jumlah_potongan=$puskes+$koperasi+$korpri+$btn+$kamboja+$lain;
			
			//mencari total gaji pegawai
			$total_gaji=	$pendapatan_kotor-$pajak-$astek-$pensiun-$jumlah_potongan;
			
			
			
			$date_gaji = $this->input->post('tgl_gaji');
			
			$this->gajipegawai_m->set_no_gaji($this->input->post("no_gaji_id"));
			$this->gajipegawai_m->set_NIP($this->input->post("NIP"));			
			$this->gajipegawai_m->set_kd_jabatan($this->input->post("kd_jabatan"));
			$this->gajipegawai_m->set_gol($this->input->post("gol"));
			$this->gajipegawai_m->set_kd_keluarga($this->input->post("kd_keluarga"));
			$this->gajipegawai_m->set_jenis_kelamin($this->input->post("jenis_kelamin"));
			$this->gajipegawai_m->set_gaji_pokok($gaji_pokok);
			$this->gajipegawai_m->set_tunj_istri($tunj_istri);
			$this->gajipegawai_m->set_tunj_anak($tunj_anak);
			$this->gajipegawai_m->set_gaji_kotor($gaji_kotor);
			$this->gajipegawai_m->set_tunj_jabatan($tunj_jabatan);
			$this->gajipegawai_m->set_tunjangan_kerja($tunjangan_kerja);
			$this->gajipegawai_m->set_pendapatan_kotor($pendapatan_kotor);
			$this->gajipegawai_m->set_astek($astek);
			$this->gajipegawai_m->set_pensiun($pensiun);
			$this->gajipegawai_m->set_pajak($pajak);				
			$this->gajipegawai_m->set_total_gaji($total_gaji);
			$this->gajipegawai_m->set_puskes($this->input->post("puskes"));
			$this->gajipegawai_m->set_koperasi($this->input->post("koperasi"));
			$this->gajipegawai_m->set_korpri($this->input->post("korpri"));
			$this->gajipegawai_m->set_btn($this->input->post("btn"));
			$this->gajipegawai_m->set_kamboja($this->input->post("kamboja"));
			$this->gajipegawai_m->set_lain($this->input->post("lain"));
			$this->gajipegawai_m->set_tgl_gaji(date('Y-m-d', strtotime($date_gaji)));
			
			$this->gajipegawai_m->update();
			
			$data["status"] = "update_success";
			
			$data["query"] = $this->gajipegawai_m->view();
			
			$this->load->view("gajipegawai_v", $data);
		}
		
		public function change()
		{
			$view = '<select class="form-control" name="kd_jabatan" id="kd_jabatan">';
						
			$this->pegawai_m->set_nip($this->input->post("nip"));
			
			$query = $this->pegawai_m->view_nama_jabatan_by_nip();
			
			foreach($query->result() as $row):	
				$view .= '<option value="'.$row->kd_jabatan.'">'.$row->jabatan.'</option>';
			endforeach;
        
			$view .= '</select>';
			
			echo $view;
		}
		
		public function change2()
		{
			$view2 = '<select class="form-control" name="gol" id="gol">';
						
			$this->pegawai_m->set_nip($this->input->post("nip"));
			
			$query2 = $this->pegawai_m->view_nama_gol_by_nip();
			
			foreach($query2->result() as $row):	
				$view2 .= '<option value="'.$row->gol.'">'.$row->gol.'</option>';
			endforeach;
        
			$view2 .= '</select>';
			
			echo $view2;
		}
		
		public function change3()
		{
			$view3 = '<select class="form-control" name="lama_kerja" id="lama_kerja">';
						
			$this->pegawai_m->set_nip($this->input->post("nip"));
			
			$query3 = $this->pegawai_m->view_nama_lama_kerja_by_nip();
			
			foreach($query3->result() as $row):	
				$view3 .= '<option value="'.$row->lama_kerja.'">'.$row->lama_kerja.'</option>';
			endforeach;
        
			$view3 .= '</select>';
			
			echo $view3;
		}
		
		public function change4()
		{
			$view4 = '<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">';
						
			$this->pegawai_m->set_nip($this->input->post("nip"));
			
			$query4 = $this->pegawai_m->view_by_nip();
			
			foreach($query4->result() as $row):	
				$view4 .= '<option value="'.$row->jenis_kelamin.'">'.$row->jenis_kelamin.'</option>';
			endforeach;
        
			$view4 .= '</select>';
			
			echo $view4;
		}
		
		public function change5()
		{
			$view5 = '<select class="form-control" name="kd_keluarga" id="kd_keluarga">';
						
			$this->pegawai_m->set_nip($this->input->post("nip"));
			
			$query5 = $this->pegawai_m->view_by_nip();
			
			foreach($query5->result() as $row):	
				$view5 .= '<option value="'.$row->kd_keluarga.'">'.$row->kd_keluarga.'</option>';
			endforeach;
        
			$view5 .= '</select>';
			
			echo $view5;
		}
		
		public function change7()
		{
			$view7 = '<select class="form-control" name="nama_peg" id="nama_peg">';
						
			$this->pegawai_m->set_nip($this->input->post("nip"));
			
			$query7 = $this->pegawai_m->view_by_nip();
			
			foreach($query7->result() as $row):	
				$view7 .= '<option value="'.$row->nama_peg.'">'.$row->nama_peg.'</option>';
			endforeach;
        
			$view7 .= '</select>';
			
			echo $view7;
		}
		
		public function delete()
		{
			$this->gajipegawai_m->set_no_gaji($this->input->post("no_gaji"));
			$this->gajipegawai_m->delete();
		}
		
		   
		
				
		
		public function report_excel()
		{
			$this->load->view("gajipegawai_excel_v");
		}
		
		
		public function report_excel_peg()
		{
		
			$this->load->view("gajipegawai_peg_excel_v");
		}
		
		
		
			
		public function report_pdf()
		{
			$pdf = new tcpdf();
			
			$orientation = "L";
			$format = "A3";
			$keepmargins = false;
			$tocpage = false;
			
			$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
			
			$family = "dejavusans";
			$style = "";
			$size = "14";;
			
			$pdf->SetFont($family, $style, $size);
			
			$html = '
			<table border="1" padding="5px">
				<tr bgcolor="black" style="color: white;" align="center">
					<th>NIP</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Gol</th>
					<th>Gaji Pokok</th>
					<th>Kd Kel</th>
					<th>Tunj Istri</th>
					<th>Tunj Anak</th>
					<th>Gaji Kotor</th>
					<th>Tunj Jab+Perum</th>
					<th>Tunj Kerja</th>
					<th>Pendap. Kotor</th>
					<th>Astek</th>
					<th>Iuran Dana Pensiun</th>
					<th>Pajak</th>
					<th>puskes</th>
					<th>koperasi</th>
					<th>korpri</th>
					<th>BTN</th>
					<th>Y. Kamboja</th>
					<th>lain-lain</th>
					<th>Jumlah Terima</th>
				</tr>';
			
			$i = 1;
			
			$query = $this->gajipegawai_m->view();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr align="center">
					<td>'.$row->NIP.'</td>
					<td>'.$row->nama_peg.'</td>
					<td>'.$row->jabatan.'</td>
					<td>'.$row->gol.'</td>
					<td>'.$row->gaji_pokok.'</td>
					<td>'.$row->kd_keluarga.'</td>
					<td>'.$row->tunj_istri.'</td>
					<td>'.$row->tunj_anak.'</td>
					<td>'.$row->gaji_kotor.'</td>
					<td>'.$row->tunj_jabatan.'</td>
					<td>'.$row->tunjangan_kerja.'</td>
					<td>'.$row->pend_kotor.'</td>
					<td>'.$row->astek.'</td>
					<td>'.$row->pensiun.'</td>
					<td>'.$row->pajak_bulan_l.'</td>
					<td>'.$row->puskes.'</td>
					<td>'.$row->koperasi.'</td>
					<td>'.$row->korpri.'</td>
					<td>'.$row->btn.'</td>
					<td>'.$row->kamboja.'</td>
					<td>'.$row->lain.'</td>
					<td>'.$row->sisa_p.'</td>
				</tr>';
			
			endforeach;
				
			$html .= '</table>';
						
			$ln = true;
			$fill = false;
			$reseth = false;
			$cell = false;
			$align = "";
			
			$pdf->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
			
			$pdf->Output();
			
			$name = "./assets/pdf/Laporan Data Pegawai PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
		
		public function report_pdf_peg()
		{
			
			$pdf = new tcpdf();
			
			$orientation = "L";
			$format = "A3";
			$keepmargins = false;
			$tocpage = false;
			
			$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
			
			$family = "dejavusans";
			$style = "";
			$size = "14";;
			
			$pdf->SetFont($family, $style, $size);
			
			$html = '
			<table border="1" padding="5px">
				<tr bgcolor="black" style="color: white;" align="center">
					<th>No gaji</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Gol</th>
					<th>Gaji Pokok</th>
					<th>Kd Kel</th>
					<th>Tunj Istri</th>
					<th>Tunj Anak</th>
					<th>Gaji Kotor</th>
					<th>Tunj Jab+Perum</th>
					<th>Tunj Kerja</th>
					<th>Pendap. Kotor</th>
					<th>Astek</th>
					<th>Iuran Dana Pensiun</th>
					<th>Pajak</th>
					<th>puskes</th>
					<th>koperasi</th>
					<th>korpri</th>
					<th>BTN</th>
					<th>Y. Kamboja</th>
					<th>lain-lain</th>
					<th>Jumlah Terima</th>
				</tr>';
			
			$i = 1;
			
			
			
			$query = $this->gajipegawai_m->view_no_gaji();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr align="center">
					<td>'.$row->no_gaji.'</td>
					<td>'.$row->NIP.'</td>
					<td>'.$row->nama_peg.'</td>
					<td>'.$row->jabatan.'</td>
					<td>'.$row->gol.'</td>
					<td>'.$row->gaji_pokok.'</td>
					<td>'.$row->kd_keluarga.'</td>
					<td>'.$row->tunj_istri.'</td>
					<td>'.$row->tunj_anak.'</td>
					<td>'.$row->gaji_kotor.'</td>
					<td>'.$row->tunj_jabatan.'</td>
					<td>'.$row->tunjangan_kerja.'</td>
					<td>'.$row->pend_kotor.'</td>
					<td>'.$row->astek.'</td>
					<td>'.$row->pensiun.'</td>
					<td>'.$row->pajak_bulan_l.'</td>
					<td>'.$row->puskes.'</td>
					<td>'.$row->koperasi.'</td>
					<td>'.$row->korpri.'</td>
					<td>'.$row->btn.'</td>
					<td>'.$row->kamboja.'</td>
					<td>'.$row->lain.'</td>
					<td>'.$row->sisa_p.'</td>
				</tr>';
			
			endforeach;
				
			$html .= '</table>';
						
			$ln = true;
			$fill = false;
			$reseth = false;
			$cell = false;
			$align = "";
			
			$pdf->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
			
			$pdf->Output();
			
			$name = "./assets/pdf/Laporan Data Pegawai PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
				
	}
?>