<?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />


	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">
	        <div class="row">
			    <div class="col-md-3">
        			<legend><b>Data Keluarga</b></legend>
        		</div>
            		<div class="col-md-9 text-right">
            	
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
                
                <a href="#modal_gol" class="btn btn-default add" data-toggle="modal">
                	<span class="glyphicon glyphicon-plus"></span> Tambah Data Baru
                </a>
				 <?PHP
					}
				?>
				<a href="<?PHP echo site_url(); ?>keluarga/report_pdf" class="btn btn-default">
                	<span class="glyphicon glyphicon-export"></span> Ekspor ke PDF
                </a>
               
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
                 Tambah data gagal, Kode keluarga sudah terdaftar sebelumnya
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
							<th>Kode Keluarga</th>
                            <th>Status Menikah</th>
							<th>Jumlah Anak</th>
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
                            $query = $this->keluarga_m->view();
                            
                            if($query->num_rows())
							{
								foreach($query->result() as $row)
								{
                        ?>
                        
                        <tr>
                            <td><?PHP echo $row->kd_keluarga; ?></td>
							<td>
                            
                                <?PHP echo $row->status_menikah; ?>
                                <input type="hidden" value="<?PHP echo $row->status_menikah;?>" id="status_menikah_<?PHP echo $row->kd_keluarga; ?>" />
											
                            </td>
							<td>
                            
                                <?PHP echo $row->jumlah_anak; ?>
                                <input type="hidden" value="<?PHP echo $row->jumlah_anak; ?>" id="jumlah_anak_<?PHP echo $row->kd_keluarga; ?>" />
                                
                            </td>
								<?PHP
									if($this->session->userdata("status") == "administrator")
									{
								?>
                						
							 <td> 
								<a href="#modal_gol" class="btn btn-primary edit" data-toggle="modal" id="edit_<?PHP echo $row->kd_keluarga; ?>">
									<span class="glyphicon glyphicon-pencil"></span> 
								</a>
								<a href="#modal_confirm" class="btn btn-danger delete" data-toggle="modal" id="delete_<?PHP echo $row->kd_keluarga; ?>">
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
                <form class="form-horizontal" role="form" method="post" id="form_kel">
                   
				   	 <div class="form-group">
                        <label for="kd_keluarga" id="lb_kd_keluarga" class="col-md-5">Kode Keluarga </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="kd_keluarga" id="kd_keluarga" required />
							<input type="hidden" class="form-control" name="keluarga_kd" id="keluarga_kd" required />
                        </div>
						</div>
					<div class="form-group">
                        <label for="status_menikah" class="col-md-5">Status Menikah</label>
                        <div class="col-md-7">
                            <select name="status_menikah"  id="status_menikah" style="height:25px;width:100px" >
									  <?php
											  $pilihan	= array("0" => "Tidak", "1" => "Menikah");
											  foreach ($pilihan as $nilai => $isi) {
												if ($dataStatus==$nilai) {
													$cek=" selected";
												} else { $cek = ""; }
												echo "<option value='$isi' $cek>$nilai -> $isi</option>";
											  }
									 ?>
							</select>
                        </div>
					</div>
					 
					<div class="form-group">
                        <label for="jumlah_anak" class="col-md-5">Jumlah anak</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary" id="simpan_keluarga" form="form_kel">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Simpan
                </button>
                <button type="submit" class="btn btn-primary" id="update_keluarga" form="form_kel">
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
			$("#simpan_keluarga").show();
			$("#update_keluarga").hide();
			
			$("#kd_keluarga").attr("disabled", false);
			
			$("#form_kel").attr("action", "<?PHP echo site_url(); ?>keluarga/save");
			
			$("#kd_keluarga").val("");
			$("#status_menikah").val("");
			$("#jumlah_anak").val("");
		});
		
		$(".delete").click(function() {
				$("#delete").show();
				
				$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
				
				var id = this.id.substr(7);
				
				$("#kd_keluarga").val(id);
			});	
			
		
		
		$("#delete").click(function() {
			$.post("<?PHP echo site_url(); ?>/keluarga/delete", { 
				kd_keluarga: $("#kd_keluarga").val() }, 
				function() {
					window.location = "<?PHP echo site_url(); ?>/keluarga";
				}
			);
		});
		
		$(".edit").click(function() {
			$("#simpan_kelurga").hide();
			$("#update_keluarga").show();
			$("#kd_keluarga").show();
			$("#lb_kd_keluarga").show();
			
			$("#kd_keluarga").attr("disabled", true);
			
			$("#form_kel").attr("action", "<?PHP echo site_url(); ?>/keluarga/update");
			
			var id = this.id.substr(5);
			
			$("#kd_keluarga").val(id);
			$("#keluarga_kd").val(id);
			$("#status_menikah").val($("#status_menikah_" + id).val());
			$("#jumlah_anak").val($("#jumlah_anak_" + id).val());
			
		});
		
              
		$(".table").dataTable();
    });
</script>



