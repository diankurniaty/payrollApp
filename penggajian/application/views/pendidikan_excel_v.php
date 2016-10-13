<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Jenjang_Pendidikan_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Jenjang Pendidikan</h1>
<br />
<table border="1">
	<tr bgcolor="black" style="color: white;" align="center">
		<td>Kode Pendidikan</td>
    	<td>Nama Pendidikan</td>
    </tr>
    
    <?PHP
		$query = $this->pendidikan_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td><?PHP echo $row->kd_pendidikan; ?></td>
        <td><?PHP echo $row->nm_pendidikan; ?></td>
    </tr>
    
    <?PHP
		endforeach;
	?>
    
</table>