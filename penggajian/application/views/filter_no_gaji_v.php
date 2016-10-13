 <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
 
 <div class="container">
<div class="panel panel-default">
 <?PHP
	if($this->uri->segment(2) == "preview")
	{
		$this->gajipegawai_m->set_no_gaji($this->uri->segment(3));
		
		$row = $this->gajipegawai_m->view_no_gaji()->row();
}?>

	<h4>PUSAT PENGELOLAAN KOMPLEK GELORA BUNG KARNO<br/>
DIVISI UMUM DAN KEPEGAWAIAN</h4>

<div class="navbar-right">
Tanggal : <?PHP echo $row->tgl_gaji; ?><BR/>
Periode : <?PHP echo $row->periode_gaji; ?><BR/>
</div>
<br/><br/>
<H4><center><b><u>TANDA PENERIMAAN GAJI</u></b></center></H4>

&nbsp;
 <table class="table table-striped table-bordered">
	
<tr>
					
		 	<td colspan="6" align="left">NAMA :<div class="navbar-right"><?PHP echo $row->nama_peg; ?></div>
			</td>
			<td colspan="6" align="left">GOLONGAN :<div class="navbar-right"><?PHP echo $row->gol; ?></div>
			</td>
</tr>
	
<tr>
			<td colspan="6" align="left">NO. POKOK :<div class="navbar-right"><?PHP echo $row->NIP; ?></div>
			</td>
			<td colspan="6" align="left">DIVISI/UNIT :<div class="navbar-right"><?PHP echo $row->divisi;?></div></td>
			
</tr>			
<tr>

	<td rowspan="10" colspan="6" align="left">
	<u>Pendapatan:</u><br/>
	1. Gaji <div class="navbar-right">Rp. <?PHP echo $row->gaji_kotor; ?></div><br/>
	2. Tunj.Jabatan + Perumahan<div class="navbar-right">Rp. <?PHP echo $row->tunj_jabatan;?></div><br/>
	3. Tunjangan Kerja <div class="navbar-right">Rp. <?PHP echo $row->tunjangan_kerja;?></div><br/>
	<hr />
	<B>PENDAPATAN KOTOR<div class="navbar-right">Rp. <?PHP echo $row->pendapatan_kotor;?></b></div><br/><BR/>
	- Pajak<div class="navbar-right">Rp. <?PHP  echo $row->pajak; ?></div><br/>
	- Astek<div class="navbar-right">Rp. <?PHP echo $row->astek;?></div><br/>	
	</td>
			
</tr>	
    
    <tr>
    	<td rowspan="10" colspan="6" align="left">
	<u>POTONGAN</u><br/>
	1. Iuran Dana Pensiun<div class="navbar-right">Rp. <?PHP echo $row->pensiun; ?></div><br/>
	2. Puskes<div class="navbar-right">Rp. <?PHP echo $row->puskes;?></div><br/>
	3. Koperasi<div class="navbar-right">Rp. <?PHP echo $row->koperasi;?></div><br/>
	4. Korpri<div class="navbar-right">Rp. <?PHP echo $row->korpri; ?></div><br/>
	5. BTN<div class="navbar-right">Rp. <?PHP echo $row->btn;?></div><br/>
	6. Y. Bunga Kamboja<div class="navbar-right">Rp. <?PHP echo $row->kamboja;?></div><br/>
	7. Lain-lain<div class="navbar-right">Rp. <?PHP echo $row->lain;?></div><br/>
	
<br/><hr />
	<b>SISA YANG DITERIMA<div class="navbar-right">Rp. <?PHP echo $row->total_gaji;?></div></b>&nbsp;<br/>
	</td>
		
    </tr >
    
</table>
</div>

<?PHP 
$jumlah = $row->total_gaji;
?>  
<legend><h5>
<b>Terbilang : </b><?PHP echo Terbilang($jumlah); ?> Rupiah</h5></legend>

<?php 
function Terbilang($satuan){  
$huruf = array ("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam",   
"Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");  
if ($satuan < 12)  
 return " ".$huruf[$satuan];  
elseif ($satuan < 20)  
 return Terbilang($satuan - 10)." Belas";  
elseif ($satuan < 100)  
 return Terbilang($satuan / 10)." Puluh".  
 Terbilang($satuan % 10);  
elseif ($satuan < 200)  
 return " Seratus ".Terbilang($satuan - 100);  
elseif ($satuan < 1000)  
 return Terbilang($satuan / 100)." Ratus".  
 Terbilang($satuan % 100);  
elseif ($satuan < 2000)  
 return "Seribu ".Terbilang($satuan - 1000);   
elseif ($satuan < 1000000)  
 return Terbilang($satuan / 1000)." Ribu".  
 Terbilang($satuan % 1000);   
elseif ($satuan < 1000000000)  
 return Terbilang($satuan / 1000000)." Juta".  
 Terbilang($satuan % 1000000);   
elseif ($satuan >= 1000000000)  
 echo "Angka terlalu Besar";  
} 
?>
Keterangan:<BR>
(PENDAPATAN KOTOR) - (PAJAK+ASTEK) - (JUMLAH POTONGAN) = SISA YANG DITERIMA	

<div class="navbar navbar-right">
<a class="btn btn-primary" onclick="javascript:this.style.visibility='hidden';window.print()">
                    	<span class="glyphicon glyphicon-print"></span> Cetak Nota
</a>
</div>

