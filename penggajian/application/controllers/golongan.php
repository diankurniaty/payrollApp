<?PHP
	class Golongan extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("golongan_m");
			
			
			$this->load->library("tcpdf");
		}
		
		public function index()
		{
			$this->load->view("datagolongan_v");	
		}
		
		public function save()
		{
			$this->golongan_m->set_gol($this->input->post("gol"));
			
			$query = $this->golongan_m->view_by_gol();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				$this->golongan_m->set_gol($this->input->post("gol"));
				
				$this->golongan_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("datagolongan_v", $data);
		}
		
		public function update()
		{
			$this->golongan_m->set_gol($this->input->post("gol_kd"));
			
			$this->golongan_m->update();
			
			$data["status"] = "update_success";
			
			$data["query"] = $this->golongan_m->view();
			
			$this->load->view("datagolongan_v", $data);
		}
		
		
		public function delete()
		{
			$this->golongan_m->set_gol($this->input->post("gol"));
			$this->golongan_m->delete();
		}
		
				
		public function report_excel()
		{
			$this->load->view("golongan_excel_v");
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
                            <td>Golongan</td>
							<td>Tunjangan Kerja</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->golongan_m->view();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr >
					<td>'.$row->gol.'</td>
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
			
			$name = "./assets/pdf/Laporan Tunjangan Kerja Pegawai PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
		
		
	}
?>