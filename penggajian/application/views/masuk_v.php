<?PHP
	$this->load->view("header_v");
?>

<div class="well well-sm">
	<div class="container">
                <form class="form-horizontal" role="form" method="post" action="<?PHP echo site_url(); ?>masuk/login">
                    
                    
                        <?PHP
							if(!empty($status))
							{
								if($status == "error")
								{
						?>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Masuk Gagal, Nama Pengguna atau Sandi Tidak Cocok
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                        <?PHP
								}
								else
								{
						?>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Masuk Berhasil
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                        <?PHP
								}
							}
						?>
                        
					
					<h4><font color="#993300"><marquee scrolldelay="150">Selamat Datang di Sistem Informasi Penggajian Pegawai PPKGBK</marquee></font></h4><br />
					
					
	<div class="container">
	<div class="panel panel-default" style="background-color:#f8f8f8">
    	<div class="panel-body" style="padding:3px;background-color:#f8f8f8"><br/><br/>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-3"></div>
							<div class="col-md-9">
                                <font>&laquo;&laquo; silakan login &raquo;&raquo;</font>
                            </div>
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label for="username">Nama Pengguna</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="username" id="username" required />
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label for="password">Sandi</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" class="form-control" name="password" id="password" required />
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-log-in"></span> Masuk
                                </button>
                            </div>
                            <div class="col-md-3"></div>
                        </div><br/>
                    </div>
					 </form>
					
					</div></div></div></div></div>				
    	</div>
		

<?PHP
	$this->load->view("footer_v");
?>

<script type="text/javascript">
	$(document).ready(function(e) {
		
    });
</script>