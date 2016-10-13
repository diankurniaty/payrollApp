<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Gaji_Pegawai_PPKGBK_Per_Periode.xls;" );
	header("Pragma: no-cache");
	header("Expires: 0");
?>



<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        
    	<title>Sistem Informasi Penggajian Pegawai PPKGBK</title>
        
	</head>

	<body>
	

<h3>PUSAT PENGELOLAAN KOMPLEK GELORA BUNG KARNO</Legend><BR/>
DIVISI UMUM DAN KEPEGAWAIAN	</h3>
	
<center><h4>Daftar Gaji Pegawai PPKGBK<br/>
Periode : 
 <?PHP 	
 {
		$query = $this->filter_periode_m->jumlah_pengeluaran();
			 if($query->num_rows())
					{
						foreach($query->result() as $row):
				?>  
		<?PHP echo $row->periode_gaji; ?> 
<?PHP endforeach;
}
}?></h4></center>
      <table border="1" style="font-size:14px;">
			  <tr bgcolor="black" style="color: white;" align="center">
			  	<th>NIP</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Gol</th>
				<th>Gaji Pokok</th>
				<th>Kd Kel</th>
				<th>Tunj Istri</th>
				<th>Tunj Anak</th>
				<th>Gaji Kotor</th>
				<th>Tunj Jab+rum</th>
				<th>Tunj Kerja</th>
				<th>Pendapatan Kotor</th>
				<th>Astek</th>
				<th>Iuran Dana Pensiun</th>
				<th>Pajak</th>
				<th>puskes</th>
				<th>Koperasi</th> 
				<th>Korpri</th>
				<th>BTN</th>
				<th>Y. Bunga Kamboja</th>
				<th>Lain-lain</th>
				<th>Jumlah Terima</th>
			  </tr>
			  
			    <?PHP  
				$query = $this->filter_periode_m->tampil_periode();  
				{
					 if($query->num_rows())
					
						foreach($query->result() as $row):
				?>
				  <tr>
						<td>'<?PHP echo $row->NIP;?></td>
						<td><?PHP echo $row->nama_peg; ?></td>
						<td><?PHP echo $row->jabatan; ?></td>
						<td><?PHP echo $row->gol; ?></td>
						<td><?PHP echo $row->gaji_pokok; ?></td>
						<td>'<?PHP echo $row->kd_keluarga; ?></td>
						<td><?PHP echo $row->tunj_istri; ?></td>
						<td><?PHP echo $row->tunj_anak; ?></td>
						<td><?PHP echo $row->gaji_kotor;?></td>
						<td><?PHP echo $row->tunj_jabatan; ?></td>
						<td><?PHP echo $row->tunjangan_kerja; ?></td>
						<td><?PHP echo $row->pendapatan_kotor; ?></td>
						<td><?PHP echo $row->astek; ?></td>
						<td><?PHP echo $row->pensiun; ?></td>
						<td><?PHP echo $row->pajak; ?></td>
						<td><?PHP echo $row->puskes; ?></td>
						<td><?PHP echo $row->koperasi; ?></td>
						<td><?PHP echo $row->korpri; ?></td>
						<td><?PHP echo $row->btn; ?></td>
						<td><?PHP echo $row->kamboja; ?></td>
						<td><?PHP echo $row->lain; ?></td>
						<td><?PHP echo $row->total_gaji; ?></td>
				</tr>
				<?PHP endforeach;?>
</table>
		<?PHP 
		}
	?>
	
	 <?PHP
	 {  
		$query = $this->filter_periode_m->jumlah_pengeluaran();
			 if($query->num_rows())
					{
						foreach($query->result() as $row):
				?>  
				
				
			<h4>Total Pengeluaran Penggajian Pegawai Periode <u><?PHP echo $row->periode_gaji; ?></u> : <strong><?PHP echo $row->jumlah_pengeluaran; ?></strong></h4>

		<?PHP endforeach;
		 			}
	 } ?>
	 
	<?PHP
	 {  
		$query = $this->filter_periode_m->tampil_periode_m();
			 if($query->num_rows())
					{
						foreach($query->result() as $row):
				?>  
				
				
			<h4>Jumlah Pegawai : <strong><?PHP echo $row->total_peg; ?></strong></h4>

		<?PHP endforeach;
		 			}
	 } ?>
 	
	 
	
<script type="text/javascript">
	$(document).ready(function(e) {
$(".table").dataTable();
    });
</script>