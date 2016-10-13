<?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />


	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">
        <div class="row">
			    <div class="col-md-3">
        			<legend align="center"><b>Data Divisi</b></legend>
        		</div>
            		<div class="col-md-9 text-right">
            	
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
                
                <a href="#modal_div" class="btn btn-default add" data-toggle="modal">
                	<span class="glyphicon glyphicon-plus"></span> Tambah Data Baru
                </a>
				 <?PHP
					}
					if($this->session->userdata("status") != "pegawai")
					{
				?>
				 <a href="<?PHP echo site_url(); ?>divisi/report_pdf" class="btn btn-default">
                	<span class="glyphicon glyphicon-export"></span> Ekspor ke PDF
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
                Tambah data gagal, Kode divisi sudah terdaftar sebelumnya
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
                            <th>Kode Divisi</th>
                            <th>Nama Divisi</th>
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
                            $query = $this->divisi_m->view();
                            
                            if($query->num_rows())
							{
								foreach($query->result() as $row)
								{
                        ?>
                        
                        <tr>
                            <td><?PHP echo $row->kd_divisi; ?></td>
							
                            <td>
                            
                                <?PHP echo $row->divisi; ?>
                                <input type="hidden" value="<?PHP echo $row->divisi; ?>" id="divisi_<?PHP echo $row->kd_divisi; ?>" />
                                
                            </td>
							<?PHP
								if($this->session->userdata("status") == "administrator")
								{
							?>
							 <td> 
								<a href="#modal_div" class="btn btn-primary edit" data-toggle="modal" id="edit_<?PHP echo $row->kd_divisi; ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="#modal_confirm" class="btn btn-danger delete" data-toggle="modal" id="delete_<?PHP echo $row->kd_divisi; ?>">
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
        </table></div></div></div>
    <?PHP
		$this->load->view("footer_v");
	?>
	
    </div>
</div>
</div>

</div>


<div class="modal fade" id="modal_div" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Form Tambah divisi</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" id="form_divisi">
                   
					 <div class="form-group">
                        <label for="kd_divisi" id="lb_kd_divisi" class="col-md-5">Kode divisi </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="kd_divisi" id="kd_divisi" required />
							<input type="hidden" class="form-control" name="divisi_kd" id="divisi_kd" required />
                        </div>
                    </div>
					 <div class="form-group">
                        <label for="divisi" class="col-md-5">Nama divisi</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="divisi" id="divisi" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary" id="simpan_div" form="form_divisi">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Simpan
                </button>
                <button type="submit" class="btn btn-primary" id="update_div" form="form_divisi">
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
			$("#simpan_div").show();
			$("#update_div").hide();
			
			$("#kd_divisi").attr("disabled", false);
			
			$("#form_divisi").attr("action", "<?PHP echo site_url(); ?>divisi/save");
			
			$("#kd_divisi").val("");
			$("#kd_divisi").val("");
			$("#divisi").val("");
			
			
		});
		
		$(".delete").click(function() {
				$("#delete").show();
				
				$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
				
				var id = this.id.substr(7);
				
				$("#kd_divisi").val(id);
			});	
			
		
		
		$("#delete").click(function() {
			$.post("<?PHP echo site_url(); ?>/divisi/delete", { 
				kd_divisi: $("#kd_divisi").val() }, 
				function() {
					window.location = "<?PHP echo site_url(); ?>/divisi";
				}
			);
		});
		
		$(".edit").click(function() {
			$("#simpan_div").hide();
			$("#update_div").show();
			$("#kd_divisi").show();
			$("#lb_kd_divisi").show();
			
			$("#kd_divisi").attr("disabled", true);
			
			$("#form_divisi").attr("action", "<?PHP echo site_url(); ?>divisi/update");
			
			var id = this.id.substr(5);
			
			$("#kd_divisi").val(id);
			$("#divisi_kd").val(id);
			$("#divisi").val($("#divisi_" + id).val());
			
		});
		
				
		$(".table").dataTable();
    });
</script>



