<?PHP
	class Pegawai extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("pegawai_m");
			$this->load->model("divisi_m");
			$this->load->model("jabatan_m");
			$this->load->model("pendidikan_m");
			$this->load->model("keluarga_m");
			$this->load->model("golongan_m");
			
			$this->load->library("tcpdf");
		}
		
		public function index()
		{
			$this->load->view("datapegawai_v");	
		}
		
		public function save()
		{
			$this->pegawai_m->set_NIP($this->input->post("NIP"));
			$date_lahir = $this->input->post('tgl_lahir');
			$date_masuk = $this->input->post('tgl_masuk');
			
			$query = $this->pegawai_m->view_by_NIP();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				
				$this->pegawai_m->get_NIP($this->input->post("NIP"));
				$this->pegawai_m->set_nama_peg($this->input->post("nama_peg"));
				$this->pegawai_m->set_alamat($this->input->post("alamat"));
				$this->pegawai_m->set_tgl_lahir(date('Y-m-d', strtotime($date_lahir)));
				$this->pegawai_m->set_jenis_kelamin($this->input->post("jenis_kelamin"));
				$this->pegawai_m->set_agama($this->input->post("agama"));
				$this->pegawai_m->set_telp($this->input->post("telp"));
				$this->pegawai_m->set_tgl_masuk(date('Y-m-d', strtotime($date_masuk)));
				$this->pegawai_m->set_kd_pendidikan($this->input->post("kd_pendidikan"));
				$this->pegawai_m->get_lama_kerja($this->input->post("lama_kerja"));
				$this->pegawai_m->set_kd_keluarga($this->input->post("kd_keluarga"));
				$this->pegawai_m->set_gol($this->input->post("gol"));
				$this->pegawai_m->set_kd_jabatan($this->input->post("kd_jabatan"));
				$this->pegawai_m->set_kd_divisi($this->input->post("kd_divisi"));
				$this->pegawai_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("datapegawai_v", $data);
		}
		
		public function update()
		{
			
			$date_lahir = $this->input->post('tgl_lahir');
			$date_masuk = $this->input->post('tgl_masuk');
			
			$this->pegawai_m->set_NIP($this->input->post("NIP_id"));
			$this->pegawai_m->set_nama_peg($this->input->post("nama_peg"));
			$this->pegawai_m->set_alamat($this->input->post("alamat"));
			$this->pegawai_m->set_tgl_lahir(date('Y-m-d', strtotime($date_lahir)));
			$this->pegawai_m->set_jenis_kelamin($this->input->post("jenis_kelamin"));
			$this->pegawai_m->set_agama($this->input->post("agama"));
			$this->pegawai_m->set_telp($this->input->post("telp"));
			$this->pegawai_m->set_tgl_masuk(date('Y-m-d', strtotime($date_masuk)));
			$this->pegawai_m->set_kd_pendidikan($this->input->post("kd_pendidikan"));
			$this->pegawai_m->set_kd_keluarga($this->input->post("kd_keluarga"));
			$this->pegawai_m->set_gol($this->input->post("gol"));
			$this->pegawai_m->set_kd_jabatan($this->input->post("kd_jabatan"));
			$this->pegawai_m->set_kd_divisi($this->input->post("kd_divisi"));
			
			$this->pegawai_m->update();
			
			$data["status"] = "update_success";
			
			$data["query"] = $this->pegawai_m->view();
			
			$this->load->view("datapegawai_v", $data);
		}
		
		
		public function delete()
		{
			$this->pegawai_m->set_NIP($this->input->post("NIP"));
			$this->pegawai_m->delete();
		}
				
		public function report_excel()
		{
			$this->load->view("pegawai_excel_v");
		}
		
		
	}
?>