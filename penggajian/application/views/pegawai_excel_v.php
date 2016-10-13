<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan_Pegawai_PPKGBK.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<h1>Laporan Seluruh Pegawai PPKGBK</h1>
<br />
<table border="1">
	<tr bgcolor="black" style="color: white;" align="center" >
		<td>NIP</td>
    	<td>Nama</td>
		<td>Alamat</td>
		<td>Tgl Lahir</td>
		<td>Jenis Kel</td>
		<td>Agama</td>
		<td>telp</td>
		<td>Tgl Masuk</td>
		<td>Pend. Akhir</td>
		<td>Lama Kerja (Thn)</td>
		<td>kd kel</td>
		<td>Gol</td>
		<td>jabatan</td>
		<td>divisi</td>
    </tr>
    
    <?PHP
		$query = $this->pegawai_m->view();
		
		foreach($query->result() as $row) :
	?>
    
    <tr>
    	<td>'<?PHP echo $row->NIP; ?></td>
        <td><?PHP echo $row->nama_peg; ?></td>
		<td><?PHP echo $row->alamat; ?></td>
        <td><?PHP echo $row->tgl_lahir; ?></td>
		<td align="center"><?PHP echo $row->jenis_kelamin;?></td>
        <td><?PHP echo $row->agama;?></td>
		<td>'<?PHP echo $row->telp;?></td>
        <td><?PHP echo $row->tgl_masuk;?></td>
		<td align="center"><?PHP echo $row->kd_pendidikan;?></td>
        <td align="center"><?PHP echo $row->lama_kerja;?></td>
		<td>'<?PHP echo $row->kd_keluarga;?></td>
        <td><?PHP echo $row->gol;?></td>
		<td><?PHP echo $row->jabatan;?></td>
        <td><?PHP echo $row->divisi;?></td>
		
    </tr>
	
    
    <?PHP
		endforeach;
	?>
    
	
</table>

	<?PHP
		$query = $this->pegawai_m->view_excel();
		
		foreach($query->result() as $row) :
	?>
	<br/><h4> Total Pegawai PPKGBK : <?PHP echo $row->total_peg;?> Orang</h4>
	<?PHP
		endforeach;
	?>	
