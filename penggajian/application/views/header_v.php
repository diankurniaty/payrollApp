<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
     	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        
    	<title>Sistem Informasi Penggajian Pegawai PPKGBK</title>
        
        <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?PHP echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
        <link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
                
        <script src="<?PHP echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?PHP echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="<?PHP echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        <script src="<?PHP echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
        <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	</head>

	<body>
	
<div class="panel-body">
<img src="<?PHP echo base_url(); ?>assets/img/logo.gif" alt="logo" ><br/>
	 <?PHP  
	  if ($this->session->userdata("status") != "")
		{
			if ($this->session->userdata("status") == "administrator")
			{
	 ?>
					 <div class="navbar-right" style="padding-bottom:0px;margin-bottom:0px">
					 <a href="<?PHP echo site_url(); ?>tambahpengguna" class="btn btn-default">
						   <span class="glyphicon glyphicon-plus"></span> Tambah Pengguna </a>
					 </div>
			 <?PHP 
			 } 
				else
			 {
				?>
					<div class="navbar-right" style="padding-bottom:0px;margin-bottom:0px">
					 <a href="<?PHP echo site_url(); ?>masuk/ubahsandi" class="btn btn-default ubah" data-toggle="modal">
						<span class="glyphicon glyphicon-edit"></span> Ubah Sandi</a>
					 </div>
			 <?PHP 
			 } 
		}?>
		<div class="navbar-brand" style="padding-bottom:0px">
			  <span style="color:#CC3300"></span> Sistem Informasi Penggajian Pegawai 'Pusat Pengelolaan Komplek Gelora Bung Karno'
        </div>
</div>

	<div class="well well-sm" style="background-color:#cc0000;border:none;padding-top:0px"></div>

	<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0;margin-top: 0;padding-top:0px; background-color:#f8f8f8;border:none">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                    
					</button>
				</div>
	  <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
			
				<li<?PHP if($this->uri->segment(1) == "" || $this->uri->segment(1) == "beranda") { echo ' class="active"'; } ?>>
                    <a href="<?PHP echo site_url(); ?>"><span class="glyphicon glyphicon-home"></span> Beranda</a>               
				</li>
				
	<?PHP
		if ($this->session->userdata("status") != "")
		{
			if ($this->session->userdata("status") == "pegawai")
			{
	?>
				<li<?PHP if($this->uri->segment(1) == "datamaster") { echo ' class="active"'; } ?>>
					 <a href="<?PHP echo site_url(); ?>datamaster/datapegawai"><span class="glyphicon glyphicon-user"></span> Lihat Data Pegawai</a>               
				</li>
				<li<?PHP if($this->uri->segment(1) == "gajipegawai") { echo ' class="active"'; } ?>>
					 <a href="<?PHP echo site_url(); ?>gajipegawai"><span class="glyphicon glyphicon-usd"></span>Lihat Gaji Saya</a>               
				</li>&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
							
   <?php }
			elseif ($this->session->userdata("status") == "administrator")
		 {
	?>
				 <li<?PHP if($this->uri->segment(1) == "datamaster") { echo ' class="active"'; } ?> class="dropdown">
				  <a  href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Data Master<b class="caret"></b> </a>
					<ul class="dropdown-menu">
							<li>
								<?PHP if($this->uri->segment(1) == "data pegawai")  ?>
								<a href="<?PHP echo site_url(); ?>datamaster/datapegawai"><span class="icon-bar icon-th-list"></span>Data Pegawai</a>											  										</li>
							<li>
								<?PHP if($this->uri->segment(1) == "data jabatan")  ?>
								<a href="<?PHP echo site_url(); ?>datamaster/datajabatan"><span class="icon-bar icon-th-list"></span>Data Jabatan</a>									 										</li>
							<li>
								<?PHP if($this->uri->segment(1) == "data divisi")  ?>
								<a href="<?PHP echo site_url(); ?>datamaster/datadivisi"><span class="icon-bar icon-th-list"></span>Data Divisi </a>								  										</li>
							<li>
								<?PHP if($this->uri->segment(1) == "data golongan")  ?>
								<a href="<?PHP echo site_url(); ?>datamaster/datagolongan"><span class="icon-bar icon-th-list"></span>Data Golongan</a>								 										</li>
							<li>
								<?PHP if($this->uri->segment(1) == "data pendidikan")  ?>
								<a href="<?PHP echo site_url(); ?>datamaster/datapendidikan"><span class="icon-bar icon-th-list"></span>Data Pendidikan</a>								 										</li>
							<li>
									<?PHP if($this->uri->segment(1) == "data keluarga")  ?>
									<a href="<?PHP echo site_url(); ?>datamaster/datakeluarga"><span class="icon-bar icon-th-list"></span>Data Keluarga </a>								 										</li>
							
					</ul>
				</li>
				
			<?PHP }
					if ($this->session->userdata("status") == "administrator")
				  {
			?>
				<li<?PHP if($this->uri->segment(1) == "gajipegawai") { echo ' class="active"'; } ?>>
						<a href="<?PHP echo site_url(); ?>gajipegawai"><span class="glyphicon glyphicon-usd"></span> Kelola Gaji Pegawai</a>              							 				</li>

	<?PHP
			}
			if ($this->session->userdata("status") != "pegawai")
				  {
	?>
					 <li<?PHP if($this->uri->segment(1) == "laporan") { echo ' class="active"'; } ?> class="dropdown">
				  <a  href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> Laporan<b class="caret"></b> </a>
					<ul class="dropdown-menu">
							<li>
								<?PHP if($this->uri->segment(1) == "laporan data gaji")  ?>
								<a href="<?PHP echo site_url(); ?>laporan/cariperiode"><span class="icon-bar icon-th-list"></span>Laporan Gaji Per Periode</a>									 							</li>
							<li>
								<?PHP if($this->uri->segment(1) == "laporan data pegawai")  ?>
								<a href="<?PHP echo site_url(); ?>pegawai/report_excel"><span class="icon-bar icon-th-list"></span>Laporan Data Pegawai</a>											  							</li>
							<li>
								<?PHP if($this->uri->segment(1) == "laporan data golongan")  ?>
								<a href="<?PHP echo site_url(); ?>laporan/jabatan_pdf"><span class="icon-bar icon-th-list"></span>Laporan Data Jabatan</a>											  							</li>
							<li>
								<?PHP if($this->uri->segment(1) == "laporan data golongan")  ?>
								<a href="<?PHP echo site_url(); ?>laporan/golongan_pdf"><span class="icon-bar icon-th-list"></span>Laporan Data Golongan</a>									 							</li>
							
							
					</ul>
				</li>
	
	<?PHP 
				  }
		}
	?>
						
						
             </ul>
             <div class="navbar-right">
                    	
                        <?PHP
							if($this->session->userdata("status") == "")
							{
						?>
                        	
                        <a href="<?PHP echo site_url(); ?>masuk" class="btn btn-danger navbar-btn">
                            <span class="glyphicon glyphicon-log-in"></span> Masuk                        </a>
                        
                        <?PHP
							}
							else
							{
						?>
                        Selamat Datang <a href="<?PHP echo site_url(); ?>login" style="padding-right:0.5em;text-decoration:inherit"><strong><?= $this->session->userdata("username")?></strong></a>
                        <a href="<?PHP echo site_url(); ?>masuk/logout" class="btn btn-danger navbar-btn">
                            <span class="glyphicon glyphicon-log-out"></span> Keluar                        </a>
                        
                        <?PHP
							}
						?>
                    </div>
            </div>
        </nav>
    	
<div class="modal fade" id="modal_password" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Pembaharuan Password</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" id="form_password" action="<?PHP echo site_url(); ?>masuk/ubahpassword">
                	<input type="hidden" value="<?PHP echo $this->session->userdata("nip"); ?>" id="nip" name="nip" />
                    <div class="form-group">
                        <label for="passwordlama" class="col-md-6">Password Lama</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="passwordlama" id="passwordlama" required />
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="passwordbaru" class="col-md-6">Password Baru</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="passwordbaru" id="passwordbaru" required />
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label for="passwordbarukonfirmasi" class="col-md-6">Konfirmasi Password Baru</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="passwordbarukonfirmasi" id="passwordbarukonfirmasi" required />
                        </div>
                    </div>
                 </form>
            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-primary" id="update" form="form_password">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Perbaharui
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(e) {
		
		$(".tambah").click(function() {
			$("#save_pengguna").show();
			$("#update").hide();
			
			$("#username").attr("disabled", false);
			
			$("#form_login").attr("action", "<?PHP echo site_url(); ?>masuk/save");
			
			$("#username").val("");
			$("#password").val("");
			$("#status").val("");
			
		
		});
		
		$(".ubah").click(function() {
			$("#save").hide();
			$("#update").show();
			
			$("#username").attr("disabled", false);
			
			$("#form_password").attr("action", "<?PHP echo site_url(); ?>masuk/ubahpassword");
			
			$("#username").val($("#nama_peg_" + id).val());
			$("#password").val("");
			$("#status").val("");
			
			$("#nama_peg").
			$("#alamat").val($("#alamat_" + id).val());
			$("#tgl_lahir").val($("#tgl_lahir_" + id).val());
			
		
		});
		
		
		
    });
</script>