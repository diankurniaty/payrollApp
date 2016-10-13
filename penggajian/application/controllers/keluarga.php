<?PHP
	class Keluarga extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("keluarga_m");
			
			$this->load->library("tcpdf");
		}
		
		public function index()
		{
			$this->load->view("datakeluarga_v");	
		}
		
		public function save()
		{
			$this->keluarga_m->set_kd_keluarga($this->input->post("kd_keluarga"));
			
			$query = $this->keluarga_m->view_by_kd_keluarga();
			
			if($query->num_rows())
				$data["status"] = "error";
			else
			{
				$this->keluarga_m->set_kd_keluarga($this->input->post("kd_keluarga"));
				$this->keluarga_m->set_status_menikah($this->input->post("status_menikah"));
				$this->keluarga_m->set_jumlah_anak($this->input->post("jumlah_anak"));
				
				$this->keluarga_m->insert();
				
				$data["status"] = "save_success";
			}
			
			$this->load->view("datakeluarga_v", $data);
		}
		
		public function update()
		{
			$this->keluarga_m->set_kd_keluarga($this->input->post("keluarga_kd"));
			$this->keluarga_m->set_status_menikah($this->input->post("status_menikah"));
			$this->keluarga_m->set_jumlah_anak($this->input->post("jumlah_anak"));
			
			$this->keluarga_m->update();
			
			$data["status"] = "update_success";
			
			$data["query"] = $this->keluarga_m->view();
			
			$this->load->view("datakeluarga_v", $data);
		}
		
		
		public function delete()
		{
			$this->keluarga_m->set_kd_keluarga($this->input->post("kd_keluarga"));
			$this->keluarga_m->delete();
		}
		
		
			
		public function report_excel()
		{
			$this->load->view("keluarga_excel_v");
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
                            <td>Kode Keluarga</td>
							<td>Status Menikah</td>
							<td>Jumlah Anak</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->keluarga_m->view();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr align="center">
					<td>'.$row->kd_keluarga.'</td>
					<td>'.$row->status_menikah.'</td>
					<td>'.$row->jumlah_anak.'</td>
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
			
			$name = "./assets/pdf/Laporan Kode Keluarga.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
		
	}
?>