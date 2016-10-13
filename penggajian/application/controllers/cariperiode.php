<?PHP
	class Cariperiode extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("pegawai_m");
			$this->load->model("gajipegawai_m");
			$this->load->model("jabatan_m");
			$this->load->model("login_m");
			$this->load->model("filter_periode_m");
			
			$this->load->library("tcpdf");
			
		}
		
		public function index()
		{
			
			$this->load->view("cariperiode_v");	
		}
		
		public function report_excel()
		{
			
			$this->load->view("report_excel_laporan_periode_v");	
		}
		
		
		public function tampil_periode()
		{
			$this->load->view("filter_periode_v");	
		}
		
		public function preview()
		{
			$this->load->view("filter_no_gaji_v");	
		}
		
	}
?>