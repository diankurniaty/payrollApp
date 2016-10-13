<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_TunjKerja_Pegawai_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Tunjangan Kerja Pegawai di PPKGBK</h1>
<br />
<table border="1">
	<tr bgcolor="black" style="color: white;" align="center">
		<td>Golongan</td>
    	<td>Tunjangan Kerja</td>
    </tr>
    
    <?PHP
		$query = $this->golongan_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td><?PHP echo $row->gol?></td>
        <td><?PHP echo $row->tunjangan_kerja?></td>
   </tr>
    
    <?PHP
		endforeach;
	?>
    
</table>