<?PHP
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Datamaster extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("pegawai_m");
			$this->load->model("jabatan_m");
			$this->load->model("divisi_m");
			$this->load->model("golongan_m");	
			$this->load->model("keluarga_m");
			$this->load->model("pendidikan_m");
		}
		
		public function datapegawai()
		{
			$this->load->view('datapegawai_v');
		}
		public function datajabatan()
		{
			$this->load->view('datajabatan_v');
		}
		
		public function datadivisi()
		{
			$this->load->view('datadivisi_v');
		}
		
		public function datagolongan()
		{
			$this->load->view('datagolongan_v');
		}
		
		public function datapendidikan()
		{
			$this->load->view('datapendidikan_v');
		}
		
		public function datakeluarga()
		{
			$this->load->view('datakeluarga_v');
		}
		public function datapotongan()
		{
			$this->load->view('datapotongan_v');
		}
		
	}
	
?>