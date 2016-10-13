<?PHP
	$this->load->view("header_v");
?>

<div class="well well-sm">
	<div class="container">
                    
                    
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
                                    Tambah pengguna gagal, NIP/Username sudah terdaftar sebelumnya
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
                                    Tambah Pengguna Berhasil
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                        <?PHP
								}
							}
						?>
                        
					
					
					
					
	<div class="container"><br />
	<h4>Form Tambah Pengguna</h4>
	<div class="panel panel-default" style="background-color:#f8f8f8">
	
    	<div class="panel-body" style="padding:3px;background-color:#f8f8f8"><br/>
					
					
                <form class="form-horizontal" role="form" method="post" action="<?PHP echo site_url(); ?>masuk/save">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label for="username">Username</label>
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
                                <label for="NIP">NIP</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="NIP" id="NIP" required />
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
					
					
                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label for="password">Password</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" class="form-control" name="password" id="password" required />
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
					
					<div class="form-group">
					 <div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3">
                        	<label for="status">Status</label>
						</div>
                        <div class="col-md-3"> 
							<select name="status"  id="status" style="height:25px;width:150px" >
									 <option values="pegawai">pegawai</option
									><option values="administrator">administrator</option>  
									<option values="pimpinan">pimpinan</option>
 							</select>
                        </div>
						<div class="col-md-4"></div>
					  </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-user"></span> Simpan
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