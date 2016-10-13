<?PHP
	class Jabatan extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("jabatan_m");
			
			$this->load->library("tcpdf");
		}
		
		public function index()
		{
			$this->load->view("datajabatan_v");	
		}
		
		public function save()
		{
			$this->jabatan_m->set_kd_jabatan($this->input->post("kd_jabatan"));
			
			$query = $this->jabatan_m->view_by_kd_jabatan();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				$this->jabatan_m->set_kd_jabatan($this->input->post("kd_jabatan"));
				$this->jabatan_m->set_jabatan($this->input->post("jabatan"));
				
				$this->jabatan_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("datajabatan_v", $data);
		}
		
		public function update()
		{
			$this->jabatan_m->set_kd_jabatan($this->input->post("jabatan_kd"));
			$this->jabatan_m->set_jabatan($this->input->post("jabatan"));
			
			$this->jabatan_m->update();
			
			$data["status"] = "update_success";
			
			
			$this->load->view("datajabatan_v", $data);
		}
		
		
		public function delete()
		{
			$this->jabatan_m->set_kd_jabatan($this->input->post("kd_jabatan"));
			$this->jabatan_m->delete();
		}
		
				
		public function report_excel()
		{
			$this->load->view("jabatan_excel_v");
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
                            <td>Kode Jabatan</td>
							<td>Nama Jabatan</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->jabatan_m->view();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr >
					<td>'.$row->kd_jabatan.'</td>
					<td>'.$row->jabatan.'</td>
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
			
			$name = "./assets/pdf/Laporan Jabatan di PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
	}
?>