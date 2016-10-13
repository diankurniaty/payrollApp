<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Keluarga_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Kode Keluarga Pegawai di PPKGBK</h1>
<br />
<table border="1">
	<tr bgcolor="black" style="color: white;" align="center">
		<td>Kode Keluarga</td>
    	<td>Status Menikah</td>
		<td>Jumlah Anak</td>
    </tr>
    
    <?PHP
		$query = $this->keluarga_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td>'<?PHP echo $row->kd_keluarga; ?></td>
        <td><?PHP echo $row->status_menikah; ?></td>
        <td><?PHP echo $row->jumlah_anak; ?></td>
    </tr>
    
    <?PHP
		endforeach;
	?>
    
</table>