 <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
 
 <div class="container">
<div class="panel panel-default">

	<h4>LAPORAN DATA JABATAN PEGAWAI PPKGBK</h4>


 <table border="1">
		<tr>
				<th>Jabatan</th>
				<th>Tunjangan Jabatan+Perumahan</th>
		</tr>
		
		 <?PHP
			$query = $this->gajipegawai_m->pilih_tunjangan();
			
			if($query->num_rows())
			{
				foreach($query->result() as $row)
				{
		?>
                        
		
		<tr>
				<td><?PHP echo $row->jabatan; ?></td>
				<td><?PHP echo $row->tunj_jabatan;?></td>
				
		</tr>	
		<?PHP }}?>		
	</table>