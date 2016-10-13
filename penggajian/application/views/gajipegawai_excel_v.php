<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Gaji_Pegawai_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Gaji Pegawai Tetap PPKGBK</h1>
<br />
<table border="1">
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
			<th>Tunj Jab+Perum</th>
			<th>Tunj Kerja</th>
			<th>Pendap. Kotor</th>
			<th>Astek</th>
			<th>Iuran Dana Pensiun</th>
			<th>Pajak</th>
			<th>puskes</th>
			<th>koperasi</th>
			<th>korpri</th>
			<th>BTN</th>
			<th>Y. Kamboja</th>
			<th>lain-lain</th>
			<th>Jumlah Terima</th>
    </tr>
    
    <?PHP
		$query = $this->gajipegawai_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td>'<?PHP echo $row->NIP; ?></td>
        <td><?PHP echo $row->nama_peg; ?></td>
		<td><?PHP echo $row->jabatan; ?></td>
        <td><?PHP echo $row->gol; ?></td>
		<td><?PHP echo $row->gaji_pokok?></td>
        <td>'<?PHP echo $row->kd_keluarga?></td>
		<td><?PHP echo $row->tunj_istri?></td>
        <td><?PHP echo $row->tunj_anak?></td>
		<td><?PHP echo $row->gaji_kotor?></td>
        <td><?PHP echo $row->tunj_jabatan?></td>
        <td><?PHP echo $row->tunjangan_kerja?></td>
		<td><?PHP echo $row->pend_kotor?></td>
        <td><?PHP echo $row->astek?></td>
		<td><?PHP echo $row->pensiun?></td>
        <td><?PHP
			$query2 = $this->pegawai_m->view();
			
				if($row->jenis_kelamin=='P')
				{
			?>	
			<?PHP echo $row->pajak_bulan_p;?>
			<?PHP
				 }
				 else
				 {
					echo $row->pajak_bulan_l;
				}
			?>
		</td>
		<td><?PHP echo $row->puskes?></td>
        <td><?PHP echo $row->koperasi?></td>
		<td><?PHP echo $row->korpri?></td>
        <td><?PHP echo $row->btn?></td>
		<td>'<?PHP echo $row->kamboja?></td>
        <td><?PHP echo $row->lain?></td>
		<td>
		<?PHP
		$query2 = $this->pegawai_m->view();
		
			if($row->jenis_kelamin=='P')
			{
		?>	
		<?PHP echo $row->sisa_p;?>
		<?PHP
			 }
			 else
			 {
				echo $row->sisa_l;
			}
		?>
		
		
		
		
		
		</td>
		
    </tr>
	
    <?PHP
		endforeach;
	?>
	
	
    
</table>