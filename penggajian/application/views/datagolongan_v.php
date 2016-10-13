<?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />


	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">
	        <div class="row">
			    <div class="col-md-3">
        			<legend><b>Data Golongan</b></legend>
        		</div>
            		<div class="col-md-9 text-right">
            	
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
                
                <a href="#modal_gol" class="btn btn-default add" data-toggle="modal">
                	<span class="glyphicon glyphicon-plus"></span> Tambah Data Baru
                </a>
				<?PHP }?>
				
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
                Tambah data gagal, Golongan sudah terdaftar sebelumnya
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
                            <th>Golongan</th>
							
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
                            $query = $this->golongan_m->view();
                            
                            if($query->num_rows())
							{
								foreach($query->result() as $row)
								{
                        ?>
                        
                        <tr>
                            <td><?PHP echo $row->gol; ?></td>
							
								<?PHP
									if($this->session->userdata("status") == "administrator")
									{
								?>
							 <td> 
								<a href="#modal_confirm" class="btn btn-danger delete" data-toggle="modal" id="delete_<?PHP echo $row->gol; ?>">
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


<div class="modal fade" id="modal_gol" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Form Tambah Golongan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" id="form_gol">
                   
				   	 <div class="form-group">
                        <label for="gol" id="lb_gol" class="col-md-5">Golongan </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="gol" id="gol" required />
							<input type="hidden" class="form-control" name="gol_kd" id="gol_kd" required />
                        </div>
						</div>
					
                </form>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary" id="simpan_gol" form="form_gol">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Simpan
                </button>
                <button type="submit" class="btn btn-primary" id="update_gol" form="form_gol">
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
			$("#simpan_gol").show();
			$("#update_gol").hide();
			
			$("#gol").attr("disabled", false);
			
			$("#form_gol").attr("action", "<?PHP echo site_url(); ?>golongan/save");
			
			$("#gol").val("");
			
		});
		
		$(".delete").click(function() {
				$("#delete").show();
				
				$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
				
				var id = this.id.substr(7);
				
				$("#gol").val(id);
			});	
			
		
		
		$("#delete").click(function() {
			$.post("<?PHP echo site_url(); ?>/golongan/delete", { 
				gol: $("#gol").val() }, 
				function() {
					window.location = "<?PHP echo site_url(); ?>/golongan";
				}
			);
		});
		
		$(".edit").click(function() {
			$("#simpan_gol").hide();
			$("#update_gol").show();
			$("#gol").show();
			$("#lb_gol").show();
			
			$("#gol").attr("disabled", true);
			
			$("#form_gol").attr("action", "<?PHP echo site_url(); ?>/golongan/update");
			
			var id = this.id.substr(5);
			
			$("#gol").val(id);
			$("#gol_kd").val(id);
				
		});
		
              
		$(".table").dataTable();
    });
</script>



