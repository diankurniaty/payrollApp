<?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">

        <div class="row">
			    <div class="col-md-3">
        			<legend><b>Data Pegawai</b></legend>
        		</div>
            		<div class="col-md-9 text-right">
            	
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
                
                <a href="#modal_peg" class="btn btn-default add" data-toggle="modal">
                	<span class="glyphicon glyphicon-plus"></span> Tambah Data Baru
                </a>
				
				<?PHP } ?>
                
            </div></div>
         
<!--div class="panel panel-primary" style="padding:0px;border:none"-->
	   
            <?PHP
                if(!empty($status))
                {
					if($status == "error")
					{
            ?>
            
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Tambah data gagal, ID pegawai sudah terdaftar sebelumnya
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
            <div class="table-responsive" style="background-color:f8f8f8">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
							<!--th>Alamat</th>
							<th>Tgl Lahir</th>
							<th>Jenis Kel</th>
							<th>Agama</th>
                            <th>telp</th>
							<th>Tgl Masuk</th>
							<th>Pend. Akhir</th>
							<th>Lama Kerja (Thn)</th>
							<th>kd kel</th>
							<th>Gol</th-->
							<th>jabatan</th>
							<th>divisi</th>
							<th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?PHP
                            $query = $this->pegawai_m->view();
                            
                            if($query->num_rows())
							{
								foreach($query->result() as $row)
								{
                        ?>
                        
                        <tr>
							<?PHP
								if($this->session->userdata("status") != "pegawai")
								{
							?>
                            <td><?PHP echo $row->NIP; ?></td>
							<?PHP } ?>
                            <td>
                            
                                <?PHP echo $row->nama_peg; ?>
                                <input type="hidden" value="<?PHP echo $row->nama_peg; ?>" id="nama_peg_<?PHP echo $row->NIP; ?>" />
                                
                            </td>
						
                            
                                <?PHP $row->alamat; ?>
                                <input type="hidden" value="<?PHP echo $row->alamat; ?>" id="alamat_<?PHP echo $row->NIP; ?>" />
                                
                                <?PHP $row->tgl_lahir; ?>
                                <input type="hidden" value="<?PHP echo $row->tgl_lahir; ?>" id="tgl_lahir_<?PHP echo $row->NIP; ?>" />
                                
                                <?PHP $row->jenis_kelamin; ?>
                                <input type="hidden" value="<?PHP echo $row->jenis_kelamin; ?>" id="jenis_kelamin_<?PHP echo $row->NIP; ?>" />
                                                            
                                <?PHP $row->agama; ?>
                                <input type="hidden" value="<?PHP echo $row->agama; ?>" id="agama_<?PHP echo $row->NIP; ?>" />
                         
                                <?PHP $row->telp; ?>
                                <input type="hidden" value="<?PHP echo $row->telp; ?>" id="telp_<?PHP echo $row->NIP; ?>" />
															
                                <?PHP  $row->tgl_masuk; ?>
                                <input type="hidden" value="<?PHP echo $row->tgl_masuk; ?>" id="tgl_masuk_<?PHP echo $row->NIP; ?>" />
                                
                                <?PHP $row->kd_pendidikan; ?>
                                <input type="hidden" value="<?PHP echo $row->kd_pendidikan; ?>" id="kd_pendidikan_<?PHP echo $row->NIP; ?>" />
                                
                                <?PHP $row->lama_kerja; ?>
                                <input type="hidden" value="<?PHP echo $row->lama_kerja; ?>" id="lama_kerja_<?PHP echo $row->NIP; ?>" />
                                
                                <?PHP $row->kd_keluarga; ?>
                                <input type="hidden" value="<?PHP echo $row->kd_keluarga; ?>" id="kd_keluarga_<?PHP echo $row->NIP; ?>" />
                                
                                <?PHP $row->gol; ?>
                                <input type="hidden" value="<?PHP echo $row->gol; ?>" id="gol_<?PHP echo $row->NIP; ?>" />
                                
							
							<td>
                                <?PHP echo $row->jabatan; ?>
                                <input type="hidden" value="<?PHP echo $row->kd_jabatan; ?>" id="kd_jabatan_<?PHP echo $row->NIP; ?>" />
                                
                            </td>
							
							<td>
                                <?PHP echo $row->divisi; ?>
                                <input type="hidden" value="<?PHP echo $row->kd_divisi; ?>" id="kd_divisi_<?PHP echo $row->NIP; ?>" />
                                
                            </td>
							<?PHP
								if($this->session->userdata("status") == "administrator")
								{
							?>
							 <td> 
								<a href="#modal_peg" class="btn btn-primary edit" data-toggle="modal" id="edit_<?PHP echo $row->NIP; ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="#modal_confirm" class="btn btn-danger delete" data-toggle="modal" id="delete_<?PHP echo $row->NIP; ?>">
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


<div class="modal fade" id="modal_peg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Form Tambah Pegawai</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" id="form_peg">
                   
					 <div class="form-group">
                        <label for="NIP" id="lb_NIP" class="col-md-3">NIP </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="NIP" id="NIP" required />
							<input type="hidden" class="form-control" name="NIP_id" id="NIP_id" required />
                        </div>
						<div class="col-md-3"></div>
                    </div>
					
					 <div class="form-group">
                        <label for="nama_peg" class="col-md-3">Nama </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="nama_peg" id="nama_peg" required />
                        </div>
						<div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-md-3">Alamat </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="alamat" id="alamat" required />
                        </div>
						<div class="col-md-2"></div>
                    </div>
					<div class="form-group">
                        <label for="tgl_lahir" class="col-md-3">Tanggal Lahir </label>
                        <div class="col-md-7">
							<input type="text" name="tgl_lahir" id="tgl_lahir" style="height:30px">
                        </div>
						<div class="col-md-2"></div>
                    </div>
					<div class="form-group">
                        <label for="jenis_kelamin" class="col-md-3">Jenis Kelamin</label>
                        <div class="col-md-7">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="jenis_kelamin" id="laki-laki" value="L" checked /> Pria
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="jenis_kelamin" id="perempuan" value="P" /> Wanita
                                </label>
                            </div>
                        </div>
						<div class="col-md-2"></div>
					</div>
					<div class="form-group">
                        <label for="agama" class="col-md-3">Agama </label>
                        <div class="col-md-7"> 
							<select name="agama"  id="agama" style="height:25px;width:150px" >
									 <option values="1">Islam</option
									><option values="2">Katholik</option>  
									<option values="3">Protestan</option>
									<option values="4">Hindu</option>  
									<option values="5">Budha</option>
									<option value="6">Konghuchu</option>
 							</select>
                        </div>
						<div class="col-md-2"></div>
                    </div>
					
					
					<div class="form-group">
                        <label for="telp" class="col-md-3">Telepon </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="telp" id="telp" onkeyup="angka(this);" required />
                        </div>
						<div class="col-md-2"></div>
                    </div>
					
					<div class="form-group">
                        <label for="tgl_masuk" class="col-md-3">Tanggal Masuk</label>
                        <div class="col-md-7">
                            <input type="text" name="tgl_masuk" id="tgl_masuk" style="height:30px"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="kd_pendidikan" class="col-md-3">Pendidikan Akhir</label>
                        <div class="col-md-3">
                            <select class="form-control" name="kd_pendidikan" id="kd_pendidikan" required/>
                            	
                                <?PHP
									$query = $this->pendidikan_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->kd_pendidikan; ?>"><?PHP echo $row->kd_pendidikan; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
                                
                            </select>
                        </div>
						<div class="col-md-6"></div>
                    </div>
					
					<div class="form-group">
                        <label for="kd_keluarga" class="col-md-3">Kode Keluarga</label>
                        <div class="col-md-3">
                            <select class="form-control" name="kd_keluarga" id="kd_keluarga" required/>
                            	
                                <?PHP
									$query = $this->keluarga_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->kd_keluarga; ?>"><?PHP echo $row->kd_keluarga; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
                                
                            </select>
                        </div>
						<div class="col-md-6"></div>
                    </div>
					
					<div class="form-group">
                        <label for="gol" class="col-md-3">Kode Golongan</label>
                        <div class="col-md-3">
                            <select class="form-control" name="gol" id="gol" required/>
                            	
                                <?PHP
									$query = $this->golongan_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->gol; ?>"><?PHP echo $row->gol; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
                                
                            </select>
                        </div>
						<div class="col-md-6"></div>
						
                    </div>
					
					 <div class="form-group">
                        <label for="jabatan" class="col-md-3">Jabatan</label>
                          <div class="col-md-9">
                            <select class="form-control" name="kd_jabatan" id="kd_jabatan">
                            	
                                <?PHP
									$query = $this->jabatan_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->kd_jabatan; ?>"><?PHP echo $row->jabatan; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
                                
                            </select>
						</div>
					</div>
					
					<div class="form-group">
                        <label for="divisi" class="col-md-3">Divisi</label>
                        <div class="col-md-9">
                            <select class="form-control" name="kd_divisi" id="kd_divisi">
                            	
                                <?PHP
									$query = $this->divisi_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->kd_divisi; ?>"><?PHP echo $row->divisi; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
                                
                            </select>
						</div>
					</div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary" id="simpan_peg" form="form_peg">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Simpan
                </button>
                <button type="submit" class="btn btn-primary" id="update_peg" form="form_peg">
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
			$("#simpan_peg").show();
			$("#update_peg").hide();
			
			$("#NIP").attr("disabled", false);
			
			$("#form_peg").attr("action", "<?PHP echo site_url(); ?>pegawai/save");
			
			$("#NIP").val("");
			$("#NIP").val("");
			$("#nama_peg").val("");
			$("#alamat").val("");
			$("#tgl_lahir").val("");
			$("#jenis_kelamin").val("");
			$("#agama").val("");
			$("#telepon").val("");
			$("#tgl_masuk").val("");
			$("#kd_pendidikan").val("");
			$("#kd_keluarga ").val("");
			$("#gol").val("");
			$("#jabatan").val("");
			$("#divisi").val("");
			
			
			
			
			
		});
		
		$(".delete").click(function() {
				$("#delete").show();
				
				$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
				
				var id = this.id.substr(7);
				
				$("#NIP").val(id);
			});	
			
		
		
		$("#delete").click(function() {
			$.post("<?PHP echo site_url(); ?>pegawai/delete", { 
				NIP: $("#NIP").val() }, 
				function() {
					window.location = "<?PHP echo site_url(); ?>/pegawai";
				}
			);
		});
		
		$(".edit").click(function() {
			$("#simpan_peg").hide();
			$("#update_peg").show();
			$("#NIP").show();
			$("#lb_NIP").show();
			
			$("#NIP").attr("disabled", true);
			
			$("#form_peg").attr("action", "<?PHP echo site_url(); ?>pegawai/update");
			
			var id = this.id.substr(5);
			
			$("#NIP").val(id);
			$("#NIP_id").val(id);
			$("#nama_peg").val($("#nama_peg_" + id).val());
			$("#alamat").val($("#alamat_" + id).val());
			$("#tgl_lahir").val($("#tgl_lahir_" + id).val());
			$("#jenis_klamin").val($("#telp_" + id).val());
			$("#agama").val($("#agama_" + id).val());
			$("#telp").val($("#telp_" + id).val());
			$("#tgl_masuk").val($("#tgl_masuk_" + id).val());
			$("#kd_pendidikan").val($("#kd_pendidikan_" + id).val());
			$("#kd_keluarga ").val($("#kd_keluarga_" + id).val());
			$("#gol").val($("#gol_" + id).val());
			$("#kd_jabatan").val($("#kd_jabatan_" + id).val());
			$("#kd_divisi").val($("#kd_divisi_" + id).val());
			
		});
		
        $(function() {
			$("#tgl_lahir" ).datepicker();
		
		});  
		
		$(function() {
			$("#tgl_masuk" ).datepicker();
		
		}); 
		
		$(".table").dataTable();
    	});
	
	function angka(e) {
	   if (!/^[0-9]+$/.test(e.value)) {
		  e.value = e.value.substring(0,e.value.length-1);
	   }
	}
</script>



