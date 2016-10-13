<?PHP
	$this->load->view("header_v");
?>

<div class="well well-sm">
	<div class="container">
                     
                      <?PHP
					if(!empty($status))
						{
					?>
                    
                    <div class="form-group">
                        <div class="alert alert-<?PHP echo $status == "Error" ? "Warning" : $status ?> alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            
                            <?PHP
                                if($status == "Warning")
                                    echo "Konfirmasi Password tidak cocok";
                                else if($status == "Error")
                                    echo "Password Lama anda salah";
								else
                                    echo "Ubah Password Berhasil";
                            ?>
                            
                        </div>
                    </div>
                    <?PHP
						}
					?>
					
	<div class="container"><br />
	<h4>Form Tambah Pengguna</h4>
	<div class="panel panel-default" style="background-color:#f8f8f8">
	
    	<div class="panel-body" style="padding:3px;background-color:#f8f8f8"><br/>
					
					
                <form class="form-horizontal" role="form" method="post" action="<?PHP echo site_url(); ?>masuk/ubahpassword">
                	<input type="hidden" value="<?PHP echo $this->session->userdata("nip"); ?>" id="nip" name="nip" />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <label for="passwordlama" class="col-md-3">Password Lama</label>
							<div class="col-md-3">
								<input type="password" class="form-control" name="passwordlama" id="passwordlama" required />
							</div>
						</div>
							
                    </div>
                
                    <div class="form-group">
						<div class="row">
							<div class="col-md-3"></div>
							<label for="passwordbaru" class="col-md-3">Password Baru</label>
							<div class="col-md-3">
								<input type="password" class="form-control" name="passwordbaru" id="passwordbaru" required />
							</div>
						</div>
                    </div>
					
                    <div class="form-group">
						<div class="row">
							<div class="col-md-3"></div>
							<label for="passwordbarukonfirmasi" class="col-md-3">Konfirmasi Password Baru</label>
							<div class="col-md-3">
								<input type="password" class="form-control" name="passwordbarukonfirmasi" id="passwordbarukonfirmasi" required />
							</div>
						</div>
                    </div>
					
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span> Perbaharui
                                </button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
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