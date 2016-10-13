<?PHP
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Tambahpengguna extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			//Model
			
			$this->load->model("login_m");
		}
		
		public function index()
		{
			$this->load->view("tambahpengguna_v");
		}
	
		public function save()
		{
			$this->login_m->set_username($this->input->post("username"));
			$this->login_m->set_NIP($this->input->post("NIP"));
			$this->login_m->set_password($this->input->post("password"));
			$this->login_m->set_status($this->input->post("status"));
			
			$query = $this->login_m->view_by_NIP();
			
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
			
			$this->load->view("masuk_v", $data);
		}
			
	}
?>