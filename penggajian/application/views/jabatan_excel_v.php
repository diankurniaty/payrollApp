<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Jabatan_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Seluruh Jabatan di PPKGBK</h1>
<br />
<table border="1">
	<tr bgcolor="black" style="color: white;" align="center">
		<td>Kode Jabatan</td>
    	<td>Nama Jabatan</td>
    </tr>
    
    <?PHP
		$query = $this->jabatan_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td><?PHP echo $row->kd_jabatan; ?></td>
        <td><?PHP echo $row->jabatan; ?></td>
    </tr>
    
    <?PHP
		endforeach;
	?>
    
</table>