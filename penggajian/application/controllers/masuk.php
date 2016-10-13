<?PHP
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Masuk extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			//Model
			
			$this->load->model("login_m");
		}
		
		public function index()
		{
			$this->load->view("masuk_v");
		}
	
		public function save()
		{
			$this->login_m->set_username($this->input->post("username"));
			$this->login_m->set_NIP($this->input->post("NIP"));
			$this->login_m->set_password($this->input->post("password"));
			$this->login_m->set_status($this->input->post("status"));
			
			$query = $this->login_m->view_by_username_NIP();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				
				$this->login_m->set_username($this->input->post("username"));
				$this->login_m->set_NIP($this->input->post("NIP"));
				$this->login_m->set_password($this->input->post("password"));
				$this->login_m->set_status($this->input->post("status"));
				
				$this->login_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("tambahpengguna_v", $data);
		}
			
		
		public function login()
		{
			$nama=$this->input->post("username");
			$sandi=$this->input->post("password");
			
			$this->login_m->set_username($nama);
			$this->login_m->set_password($sandi);
			
			$query_cek= $this->login_m->cek($nama, $sandi);
			foreach($query_cek->result() as $row)
			{
				$nip=$row->nip;
				
				$this->session->set_userdata("nip",$nip);
			}
			
			$query = $this->login_m->view_by_username_password();
		
			if($query->num_rows()){
		
			foreach($query->result() as $row)
			{
				$status=$row->status;	
			}
				
				if($status=="administrator")
				{
					$data["status"] = "success";
					$this->session->set_userdata("username", $nama);
					$this->session->set_userdata("status", $status);
				}
				
				elseif($status == "pegawai" )
				{
					$data["status"] = "success";
					$this->session->set_userdata("username", $nama);
					$this->session->set_userdata("status", $status);
				}
			
				elseif($status == "pimpinan")
				{
					$data["status"] = "success";
					$this->session->set_userdata("username", $nama);
					$this->session->set_userdata("status", $status);
				}				
			}
			else
				$data["status"] = "error";
				$this->load->view("masuk_v", $data);	
		}
		
		public function ubahpassword()
		{
			$this->login_m->set_nip($this->input->post("nip"));
			$this->login_m->set_password($this->input->post("passwordlama"));
			$this->login_m->set_passwordbaru($this->input->post("passwordbaru"));
			
			$cekpassword = $this->login_m->view_by_nip_password();
			
			if ($cekpassword->num_rows())
			{
				if ($this->input->post("passwordbaru") == $this->input->post("passwordbarukonfirmasi"))
				{
					$this->login_m->updatepassword();
					$data["status"] = "Success";
				}
				else
				{
					$data["status"] = "Warning";	
				}
			
			}
			else
			{
				$data["status"] = "Error";	
			}
			
			$this->load->view("ubahpassword_v",$data);
			
		}
		
		public function ubahsandi()
		{
			$this->load->view("ubahpassword_v");
		}
		
		
		
		public function logout()
		{
			$this->session->unset_userdata("nama_pengguna");
			
			$this->session->sess_destroy();
			
			redirect(site_url());
		}
	}
?>