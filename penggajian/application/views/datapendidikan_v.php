<?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />


	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">
        <div class="row">
			    <div class="col-md-3">
        			<legend><b>Data Pendidikan</b></legend>
        		</div>
            		<div class="col-md-9 text-right">
            	
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
                
                <a href="#modal_pend" class="btn btn-default add" data-toggle="modal">
                	<span class="glyphicon glyphicon-plus"></span> Tambah Data Baru
                </a>
				<?PHP } ?>
				
            </div>
        </div>
         

<div class="panel panel-primary" style="padding:0px;border:none">
	   
            <?PHP
                if(!empty($status))
                {
					if($status == "error")
					{
            ?>
            
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 Tambah data gagal, Kode Pendidikan sudah terdaftar sebelumnya
            </div>
            
            <?PHP
					}
					else if($status == "save_success")
					{
			?>
            
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Tambah data berhasil
            </div>
            
            <?PHP
					}
					else
					{
			?>
            
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Perbaharuan Berhasil
            </div>
            
            <?PHP
					}
				}
			?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode Pendidikan</th>
                            <th>Nama Pendidikan</th>
							
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
							<th>Modifikasi</th>
							<?PHP } ?>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?PHP
                            $query = $this->pendidikan_m->view();
                            
                            if($query->num_rows())
							{
								foreach($query->result() as $row)
								{
                        ?>
                        
                        <tr>
                            <td><?PHP echo $row->kd_pendidikan; ?></td>
							
                            <td>
                            
                                <?PHP echo $row->nm_pendidikan; ?>
                                <input type="hidden" value="<?PHP echo $row->nm_pendidikan; ?>" id="nm_pendidikan_<?PHP echo $row->kd_pendidikan; ?>" />
                                
                            </td>
                            
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
							 <td> 
								<a href="#modal_pend" class="btn btn-primary edit" data-toggle="modal" id="edit_<?PHP echo $row->kd_pendidikan; ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="#modal_confirm" class="btn btn-danger delete" data-toggle="modal" id="delete_<?PHP echo $row->kd_pendidikan; ?>">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
                			</td>
							<?PHP } ?>
						
				</tr>
                            
                
                            
            <?PHP
					}
				}
			?>
       </tbody>        
        </table>
		</div></div></div>
    <?PHP
		$this->load->view("footer_v");
	?>
	
    </div>
</div>
</div>

</div>


<div class="modal fade" id="modal_pend" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Form Tambah Pendidikan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" id="form_pend">
                   
					 <div class="form-group">
                        <label for="kd_pendidikan" class="col-md-5" id="lb_kd_pendidikan">Kode Pendidikan </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="kd_pendidikan" id="kd_pendidikan" required />
							<input type="hidden" class="form-control" name="pendidikan_kd" id="pendidikan_kd" required />
                        </div>
                    </div>
					 <div class="form-group">
                        <label for="nm_pendidikan" class="col-md-5">Nama Pendidikan</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="nm_pendidikan" id="nm_pendidikan" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary" id="simpan_didik" form="form_pend">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Simpan
                </button>
                <button type="submit" class="btn btn-primary" id="update_didik" form="form_pend">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Perbaharui
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_confirm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p class="text-left" id="confirm_str">
                    Apakah Anda yakin akan menghapus data ini ?
                </p>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(null);" class="btn btn-primary" id="delete">Ok</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>


<script type="text/javascript">
	$(document).ready(function(e) {
	
		$(".add").click(function() {
			$("#simpan_didik").show();
			$("#update_didik").hide();
			
			$("#kd_pendidikan").attr("disabled", false);
			
			$("#form_pend").attr("action", "<?PHP echo site_url(); ?>pendidikan/save");
			
			$("#kd_pendidikan").val("");
			$("#kd_pendidikan").val("");
			$("#nm_pendidikan").val("");
			
		});
		
		$(".delete").click(function() {
				$("#delete").show();
				
				$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
				
				var id = this.id.substr(7);
				
				$("#kd_pendidikan").val(id);
			});	
			
		
		
		$("#delete").click(function() {
			$.post("<?PHP echo site_url(); ?>pendidikan/delete", { 
				kd_pendidikan: $("#kd_pendidikan").val() }, 
				function() {
					window.location = "<?PHP echo site_url(); ?>pendidikan";
				}
			);
		});
		
		$(".edit").click(function() {
			$("#simpan_didik").hide();
			$("#update_didik").show();
			$("#kd_pendidikan").show();
			$("#lb_kd_pendidikan").show();
			
			$("#kd_pendidikan").attr("disabled", true);
			
			$("#form_pend").attr("action", "<?PHP echo site_url(); ?>pendidikan/update");
			
			var id = this.id.substr(5);
			
			$("#kd_pendidikan").val(id);
			$("#pendidikan_kd").val(id);
			$("#nm_pendidikan").val($("#nm_pendidikan_" + id).val());
			
		});
		
            
		
		$(".table").dataTable();
    });
</script>



