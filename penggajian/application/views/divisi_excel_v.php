<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Divisi_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Seluruh Divisi di PPKGBK</h1>
<br />
<table border="1">
	<tr bgcolor="black" style="color: white;" align="center">
		<td>Kode Divisi</td>
    	<td>Nama Divisi</td>
    </tr>
    
    <?PHP
		$query = $this->divisi_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td><?PHP echo $row->kd_divisi; ?></td>
        <td><?PHP echo $row->divisi; ?></td>
    </tr>
    
    <?PHP
		endforeach;
	?>
    
</table>