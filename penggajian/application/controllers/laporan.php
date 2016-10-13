<?PHP
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Laporan extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("jabatan_m");
			$this->load->model("gajipegawai_m");
			$this->load->model("pegawai_m");
			$this->load->model("login_m");
			$this->load->model("filter_periode_m");
			
			$this->load->library("tcpdf");
		}
		
		public function cariperiode()
		{
			
			$this->load->view("cariperiode_v");	
		}
		
		
		public function jabatan_pdf()
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
			
			$html = '<h4>Laporan Jabatan Pegawai PPKGBK</h4>
			<table border="1" padding="5px">
				<tr bgcolor="black" style="color: white;" align="center">
                            <td>Jabatan</td>
							<td>Tunjangan Jabatan+Perumahan</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->gajipegawai_m->pilih_tunjangan();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr align="center">
					<td>'.$row->jabatan.'</td>
					<td>'.$row->tunj_jabatan.'</td>
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
			
			$name = "./assets/pdf/Laporan Data Jabatan Pegawai PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
		public function golongan_pdf()
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
			
			$html = '<h4>Laporan Golongan Pegawai PPKGBK</h4>
			<table border="1" padding="5px">
				<tr bgcolor="black" style="color: white;" align="center">
                            <td>Golongan</td>
							<td>Masa Kerja</td> 
							<td>Gaji Pokok</td>
							<td>Tunjangan Kerja</td>
				</tr>';
			
			$i = 1;
			
			$query = $this->gajipegawai_m->pilih_golongan();
			
			foreach($query->result() as $row) :
			
			$html .= '
				<tr align="center">
					<td>'.$row->gol.'</td>
					<td>'.$row->lama_kerja.'</td>
					<td>'.$row->gaji_pokok.'</td>
					<td>'.$row->tunjangan_kerja.'</td>
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
			
			$name = "./assets/pdf/Laporan Data Golongan PPKGBK.pdf";
			$dest = "F";
			
			$pdf->Output($name, $dest);
		}
		
	}
	
?>