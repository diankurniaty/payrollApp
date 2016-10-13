<?PHP
	class Pendidikan extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("pendidikan_m");
			
			$this->load->library("tcpdf");
		}
		
		public function index()
		{
			$this->load->view("datapendidikan_v");	
		}
		
		public function save()
		{
			$this->pendidikan_m->set_kd_pendidikan($this->input->post("kd_pendidikan"));
			
			$query = $this->pendidikan_m->view_by_kd_pendidikan();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				$this->pendidikan_m->set_kd_pendidikan($this->input->post("kd_pendidikan"));
				$this->pendidikan_m->set_nm_pendidikan($this->input->post("nm_pendidikan"));
				
				$this->pendidikan_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("datapendidikan_v", $data);
		}
		
		public function update()
		{
			$this->pendidikan_m->set_kd_pendidikan($this->input->post("pendidikan_kd"));
			$this->pendidikan_m->set_nm_pendidikan($this->input->post("nm_pendidikan"));
			
			$this->pendidikan_m->update();
			
			$data["status"] = "update_success";
			
			$data["query"] = $this->pendidikan_m->view();
			
			$this->load->view("datapendidikan_v", $data);
		}
		
		
		public function delete()
		{
			$this->pendidikan_m->set_kd_pendidikan($this->input->post("kd_pendidikan"));
			$this->pendidikan_m->delete();
		}
		
		
			
		public function report_excel()
		{
			$this->load->view("pendidikan_excel_v");
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
			<table border="1">
				<tr bgcolor="black" style="color: white;" align="center">
                           <td>Kode Pendidikan</td>
							<td>Nama Pendidikan</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->pendidikan_m->view();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr >
					<td>'.$row->kd_pendidikan.'</td>
					<td>'.$row->nm_pendidikan.'</td>
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
			
			$name = "./assets/pdf/Laporan Jenjang Pendidikan.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
		
	}
?>