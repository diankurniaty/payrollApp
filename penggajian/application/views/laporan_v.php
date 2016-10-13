
<?PHP
	$this->load->view("header_v");
	if ($this->session->userdata("nama") == "")
	{
	?>

<div class="container">
	<div class="panel panel-default" style="background-color:#f8f8f8">
    	<div class="panel-body" style="padding:3px;background-color:#f8f8f8">
                Laporan
    	</div>
		
	 <?PHP 
	}
	else
	{
		?>
        
<div class="container">
	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">
         <br/><br/>
				<legend></strong>Laporan Pegawai</strong></legend>  <a href="<?PHP echo site_url(); ?>" class="btn btn-default">
                                    <span class="glyphicon glyphicon-signal"></span> Chart
                                </a><br/>
					<legend><strong>Laporan Keluarga</strong></legend><br/>
						<legend>Laporan Pendidikan</legend><br/>
					<legend>Laporan Golongan</legend><br/>
						<legend>Laporan Jabatan</legend><br/>
							<legend>Laporan Potongan</legend><br/>
								<legend>Laporan Tunjangan</legend><br/>
								<legend>Laporan Posisi Pegawai</legend><br/>
								<legend>Laporan Absensi</legend><br/>
								<legend>Laporan Penggajian</legend>
				
		  </div>
     <?PHP
	}
?> 	

<?PHP
	$this->load->view("footer_v");
?>

<script type="text/javascript">
	$(document).ready(function(e) {
		
    });
</script>