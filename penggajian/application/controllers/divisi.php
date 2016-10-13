<?PHP
	class Divisi extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("divisi_m");
			
			
			$this->load->library("tcpdf");
		}
		
		public function index()
		{
			$this->load->view("datadivisi_v");	
		}
		
		public function save()
		{
			$this->divisi_m->set_kd_divisi($this->input->post("kd_divisi"));
			
			$query = $this->divisi_m->view_by_kd_divisi();
			
			if($query->num_rows())
				$data["status"] = "error";
				
			else
			{
				$this->divisi_m->set_kd_divisi($this->input->post("kd_divisi"));
				$this->divisi_m->set_divisi($this->input->post("divisi"));
				
				$this->divisi_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("datadivisi_v", $data);
		}
		
		public function update()
		{
			$this->divisi_m->set_kd_divisi($this->input->post("divisi_kd"));
			$this->divisi_m->set_divisi($this->input->post("divisi"));
			
			$this->divisi_m->update();
			
			$data["status"] = "update_success";
			
			$data["query"] = $this->divisi_m->view();
			
			$this->load->view("datadivisi_v", $data);
		}
		
		
		public function delete()
		{
			$this->divisi_m->set_kd_divisi($this->input->post("kd_divisi"));
			$this->divisi_m->delete();
		}
		
			
		public function report_excel()
		{
			$this->load->view("divisi_excel_v");
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
                            <td>Kode Divisi</td>
							<td>Nama Divisi</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->divisi_m->view();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr >
					<td>'.$row->kd_divisi.'</td>
					<td>'.$row->divisi.'</td>
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
			
			$name = "./assets/pdf/Laporan Divisi di PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
		
	}
?>