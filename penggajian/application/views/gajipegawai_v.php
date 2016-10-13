<?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

	<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">

        <div class="row">
			    <div class="col-md-3">
				    <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				    ?>
        			<legend><b>Gaji Pegawai (Semua Data)</b></legend>
					 <?PHP }
					if($this->session->userdata("status") == "pegawai")
					{
				    ?>
					<legend><b>Gaji Saya</b></legend>
					<?PHP } ?>
        		</div>
            		<div class="col-md-9 text-right">
            	
                <?PHP
					if($this->session->userdata("status") == "administrator")
					{
				?>
                
                <a href="<?PHP echo site_url(); ?>gajipegawai/tambahdatagaji/" class="btn btn-default add" data-toggle="modal">
                	<span class="glyphicon glyphicon-plus"></span> Tambah Data Baru
                </a>
				 <?PHP
					}
						if($this->session->userdata("status") != "pegawai")
					{
				?>
				
				<!--a href="#modal_cari" class="btn btn-default" data-toggle="modal">
                	<span class="glyphicon glyphicon-calendar"></span> Filter Periode
                </a-->
				
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
                Tambah data gagal, ID pegawai sudah terdaftar
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
							<th>Periode</th>
							<th>No.Gaji</th>
							<th>NIP</th>
                            <th>Nama</th>
							<th>Jabatan</th>
							<th>Gol</th>
							<th>gaji_pokok</th>
							<th>Kd Kel</th>
							<th>Tunj Istri</th>
							<th>Tunj Anak</th>
							<th>Gaji Kotor</th>
							<th>
								<a href="#modal_lanjutan" class="" data-toggle="modal" id="">
									<span class="glyphicon glyphicon-eye-open"></span> Lihat <br/>Lanjutan
								</a>
							</th>
							<!--th>Pajak</th>
							<th>Modifikasi</th-->
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                         <?PHP 
						if($this->session->userdata("status") != "pegawai") 
							$query = $this->gajipegawai_m->view();
						else
							 $query = $this->gajipegawai_m->view_pegawai();
                          ?>
						
                        <?PHP
								if($query->num_rows())
								{
									foreach($query->result() as $row)
									{
                        ?>
                        <tr>
							
							 <td>
                                
                                <?PHP echo $row->periode_gaji; ?>
                                
                                <input type="hidden" value="<?PHP echo $row->periode_gaji; ?>" id="periode_gaji_<?PHP echo $row->NIP; ?>" />
                            </td>
							<td><?PHP echo $row->no_gaji; ?></td>
							<td>
                                
                                <?PHP echo $row->NIP; ?>
                                
                                <input type="hidden" value="<?PHP echo $row->NIP; ?>" id="NIP_<?PHP echo $row->no_gaji; ?>" />
                            </td>
							
                           <td>
                                
                                <?PHP echo $row->nama_peg; ?>
                                
                                <input type="hidden" value="<?PHP echo $row->nama_peg; ?>" id="nama_peg_<?PHP echo $row->no_gaji; ?>" />
                            </td>			
                            <td>
                                <?PHP echo $row->jabatan; ?>
                                <input type="hidden" value="<?PHP echo $row->jabatan; ?>" id="kd_jabatan_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>	
							<td>
                                <?PHP echo $row->gol; ?>
                                <input type="hidden" value="<?PHP echo $row->gol; ?>" id="gol_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							 <td>
                                <?PHP echo $row->gaji_pokok; ?>
                                <input type="hidden" value="<?PHP echo $row->gaji_pokok; ?>" id="gaji_pokok_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							
							<td>
                                <?PHP echo $row->kd_keluarga; ?>
                                <input type="hidden" value="<?PHP echo $row->kd_keluarga; ?>" id="kd_keluarga_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							
							<td>
                                <?PHP echo $row->tunj_istri; ?>
                                <input type="hidden" value="<?PHP echo $row->tunj_istri; ?>" id="tunj_istri_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							
							<td>
                                <?PHP echo $row->tunj_anak; ?>
                                <input type="hidden" value="<?PHP echo $row->tunj_anak; ?>" id="tunj_anak_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							
							<td>
                                <?PHP echo $row->gaji_kotor; ?>
                                <input type="hidden" value="<?PHP echo $row->gaji_kotor; ?>" id="gaji_kotor_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>	
							
							
							<?PHP 
								if($this->session->userdata("status") == "administrator")
							{
							?>
							<td> 
								<a href="#modal_pos" class="btn btn-primary edit" data-toggle="modal" id="edit_<?PHP echo $row->no_gaji; ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="#modal_confirm" class="btn btn-danger delete" data-toggle="modal" id="delete_<?PHP echo $row->no_gaji; ?>">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
								
							</td>
							<?PHP }if($this->session->userdata("status") == "pegawai"){ ?>
							<td>
							<a href="<?PHP echo site_url(); ?>gajipegawai/preview/<?PHP echo $row->no_gaji; ?>" class="btn btn-default preview" data-toggle="modal" id="preview_<?PHP echo $row->no_gaji; ?>">
									<span class="glyphicon glyphicon-file"></span> Nota
								</a>
							</td>
							<?PHP } ?>
							<?PHP if($this->session->userdata("status") == "pimpinan"){ ?>
							<td>
							</td>
							<?PHP } ?>
							
				</tr>
                   
                            
            <?PHP
					}
				}
	?>
						 
       </tbody>        
        </table>
		<br/><br/></div></div></div>
    <?PHP
		$this->load->view("footer_v");
	?>
	
</div>
</div>

</div>



<div class="modal fade" id="modal_lanjutan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left">Gaji Pegawai (Lanj)</h4>
            </div>
            <div class="modal-body">
			
			 <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
              			 <tr>
						 	<th>NIP</th>
							<th>Tunj Jab+rum</th>
							<th>Tunj Kerja</th>
							<th>Pendap. Kotor</th>
							<th>Astek</th>
							<th>Iuran DP</th>
							<th>Pajak</th>
							<th>puskes</th>
							<th>kop.</th>
							<th>korpri</th>
							<th>BTN</th>
							<th>Y. B.K.</th>
							<th>lain-lain</th>
							<th>Jml Terima</th>
                        </tr>
					</thead>
					<tbody>
					 <?PHP 
						if($this->session->userdata("status") != "pegawai") 
							$query = $this->gajipegawai_m->view();
						else
							 $query = $this->gajipegawai_m->view_pegawai();
                          ?>
						
							 <?PHP
                            if($query->num_rows())
							{
								foreach($query->result() as $row)
								{
                        ?>
						<tr>
						
						
						
							<td><?PHP echo $row->NIP; ?>&nbsp;-&nbsp;<?PHP echo $row->nama_peg; ?></td>
							<td>
								<?PHP echo $row->tunj_jabatan; ?>
                                <input type="hidden" value="<?PHP echo $row->tunj_jabatan; ?>" id="tunj_jabatan_<?PHP echo $row->no_gaji; ?>" />
                            </td>
							<td>
                                <?PHP echo $row->tunjangan_kerja; ?>
                                <input type="hidden" value="<?PHP echo $row->tunjangan_kerja; ?>" id="tunjangan_kerja_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							<td>
                                <?PHP echo $row->pendapatan_kotor; ?>
                                <input type="hidden" value="<?PHP echo $row->pendapatan_kotor; ?>" id="pend_kotor_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
								<td>
                                <?PHP echo $row->astek; ?>
                                <input type="hidden" value="<?PHP echo $row->astek; ?>" id="astek_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							<td>
							
                                <?PHP echo $row->pensiun; ?>
                                <input type="hidden" value="<?PHP echo $row->pensiun; ?>" id="pensiun_<?PHP echo $row->no_gaji; ?>" />
                              
                            </td>
							
							
							<td>
							 <?PHP echo $row->pajak; ?>
                                <input type="hidden" value="<?PHP echo $row->pajak; ?>" id="pajak_<?PHP echo $row->no_gaji; ?>" />
							
							 
							 
							</td>
		
								<td>
                                <?PHP echo $row->puskes; ?>
                                <input type="hidden" value="<?PHP echo $row->puskes; ?>" id="puskes_<?PHP echo $row->no_gaji; ?>" />
                                </td>
								<td>
                                <?PHP echo $row->koperasi; ?>
                                <input type="hidden" value="<?PHP echo $row->koperasi; ?>" id="koperasi_<?PHP echo $row->no_gaji; ?>" />
                                </td>
							
							<td>
                                <?PHP echo $row->korpri; ?>
                                <input type="hidden" value="<?PHP echo $row->korpri; ?>" id="korpri_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							<td>
                                <?PHP echo $row->btn; ?>
                                <input type="hidden" value="<?PHP echo $row->btn; ?>" id="btn_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							<td>
                                <?PHP echo $row->kamboja; ?>
                                <input type="hidden" value="<?PHP echo $row->kamboja; ?>" id="kamboja_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							<td>
                                <?PHP echo $row->lain; ?>
                                <input type="hidden" value="<?PHP echo $row->lain; ?>" id="lain_<?PHP echo $row->no_gaji; ?>" />
                                
                            </td>
							<td>
							 <?PHP echo $row->total_gaji; ?>
                                <input type="hidden" value="<?PHP echo $row->total_gaji; ?>" id="total_gaji_<?PHP echo $row->no_gaji; ?>" />
                                
							</td>
							   <input type="hidden" value="<?PHP echo $row->tgl_gaji; ?>" id="tgl_gaji_<?PHP echo $row->no_gaji; ?>" />
                      
							
							<?PHP 
							}
						}
							?>
							
						</tr>
					</tbody>
				</table>
        </div>
    </div>
	<div class="modal-footer"></div>
</div>
</div>

</div>

<div class="modal fade" id="modal_pos" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-left" style="color:#CC3333"><strong> Gaji Pegawai</strong></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form"  method="post" id="form_posisi">
					
					<div class="form-group">
                        <label for="no_gaji" id="lb_no_gaji" class="col-md-4">No. Gaji</label>
                        <div class="col-md-3">
							<input type="text" class="form-control" name="no_gaji" id="no_gaji" required />
							<input type="hidden" class="form-control" name="no_gaji_id" id="no_gaji_id" required />
						</div>
						<div class="col-md-5"></div>
					</div>
                   	 <div class="form-group">
                        <label for="NIP" class="col-md-4">NIP </label>
                         <div class="col-md-8">
                            <select class="form-control" name="NIP" id="NIP" required />
							<option value="">--PILIH NIP--</option>
							 	<?PHP
									$query = $this->pegawai_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->NIP; ?>">[<?PHP echo $row->NIP; ?>]&nbsp;&nbsp;&nbsp;<?PHP echo $row->nama_peg; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
							</select>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="kd_jabatan" class="col-md-4">Jabatan</label>
                        	<div class="col-md-8">
								<div id="view">
                                
									<select class="form-control" name="kd_jabatan" id="kd_jabatan" required>
                                    
										<?PHP
                                            $this->pegawai_m->set_nip($nip);
                                            $query = $this->pegawai_m->view_nama_jabatan_by_nip();
                                            foreach($query->result() as $row):
                                        
                                            endforeach;
                                        ?>
									</select>
                            	</div>
                        	</div>
                    </div>
					<div class="form-group">
                        <label for="gol" class="col-md-4">Golongan</label>
                        	<div class="col-lg-3">
								<div id="view2">
                                
									<select class="form-control" name="gol" id="gol" required>
                                    
										<?PHP
                                            $this->pegawai_m->set_nip($nip);
                                            $query2 = $this->pegawai_m->view_nama_gol_by_nip();
                                            foreach($query2->result() as $row):
                                        
                                            endforeach;
                                        ?>
                                        
									</select>
                            	</div>
                        	</div>
						<div class="col-md-5"></div>
                    </div>
                    <div class="form-group">
                        <label for="lama_kerja" class="col-md-4">Lama Kerja (Thn)</label>
                        	<div class="col-lg-3">
								<div id="view3">
                                
									<select class="form-control" name="lama_kerja" id="lama_kerja" required>
                                    <option value=""></option>
										<?PHP
                                            $this->pegawai_m->set_nip($nip);
                                            $query3 = $this->pegawai_m->view_nama_lama_kerja_by_nip();
                                            foreach($query3->result() as $row):
                                        
                                            endforeach;
                                        ?>
                                        
									</select>
                            	</div>
                        	</div>
						<div class="col-md-5"></div>
					</div>
                    <div class="form-group">
                        <label for="kd_keluarga" class="col-md-4">Kd. Keluarga</label>
                        	<div class="col-lg-3">
								<div id="view5">
                                
									<select class="form-control" name="kd_keluarga" id="kd_keluarga" required>
                                    <option value=""></option>
										<?PHP
                                            $this->pegawai_m->set_nip($nip);
                                            $query5 = $this->pegawai_m->view_kd_keluarga_by_nip();
                                            foreach($query5->result() as $row):
                                        
                                            endforeach;
                                        ?>
                                        
									</select>
                            	</div>
                        	</div>
						<div class="col-md-5"></div>
                    </div>
					 <div class="form-group">
                        <label for="jenis_kelamin" class="col-md-4">Jenis Kelamin</label>
                        	<div class="col-lg-3">
								<div id="view4">
                                
									<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value=""></option>
										<?PHP
                                            $this->pegawai_m->set_nip($nip);
                                            $query4 = $this->pegawai_m->view_jenis_kelamin_by_nip();
                                            foreach($query4->result() as $row):
                                        
                                            endforeach;
                                        ?>
                                        
									</select>
                            	</div>
                        	</div>
						<div class="col-md-5"></div>
                    </div>
					
					<!--/form>
					</div>
					</div>
				<div class="modal-header">
					<h4 class="modal-title text-left" style="color:#CC3300">Potongan</h4>
				</div>
				<div class="modal-body">
				
                <form class="form-horizontal" role="form"  method="post" id="form_posisi"-->
					<br/>
					<legend style="color:#CC3333"><h4>Potongan</h4></legend>
					<div class="form-group">
                        <label for="puskes" class="col-md-4">Puskes</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="puskes" id="puskes" />
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="form-group">
                        <label for="koperasi" class="col-md-4">Koperasi</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="koperasi" id="koperasi" />
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="form-group">
                        <label for="korpri" class="col-md-4">Korpri</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="korpri" id="korpri"/>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="form-group">
                        <label for="btn" class="col-md-4">BTN</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="btn" id="btn" />
						</div>
						<div class="col-md-2"></div>
					</div>
					
					<div class="form-group">
                        <label for="kamboja" class="col-md-4">Yayasan Kamboja</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="kamboja" id="kamboja" />
						</div>
						<div class="col-md-2"></div>
					</div>
					
					<div class="form-group">
                        <label for="lain" class="col-md-4">Lain-lain</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="lain" id="lain" />
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="form-group">
                        <label for="tgl_gaji" class="col-md-4">Tanggal Gaji</label>
                        <div class="col-md-6">
                            <input type="text" name="tgl_gaji" id="tgl_gaji" style="height:30px"/>
                        </div>
						<div class="col-md-2"></div>
                    </div>
				
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="ubah_gaji" form="form_posisi">
				
                	<span class="glyphicon glyphicon-floppy-disk"></span> Perbaharui
                </button>
            </div>
        </div>
    </div>
</div></div></div>

</div></div>

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
		
		$(".edit").click(function() {
			$("#no_gaji").show();
			$("#lb_no_gaji").show();
			
			$("#no_gaji").attr("disabled", true);
			
			$("#form_posisi").attr("action", "<?PHP echo site_url(); ?>gajipegawai/update");
			
			var id = this.id.substr(5);
			
			$("#no_gaji").val(id);
			$("#no_gaji_id").val(id);
			$("#NIP").val($("#NIP_" + id).val());
			$("#kd_jabatan").val($("#kd_jabatan_" + id).val());
			$("#gol").val($("#gol_" + id).val());
			$("#kd_jabatan").val($("#kd_jabatan_" + id).val());
			$("#gol").val($("#gol_" + id).val());
			$("#gaji_pokok").val($("#gaji_pokok_" + id).val());
			$("#tunj_jabatan").val($("#tunj_jabatan_" + id).val());
			$("#tunj_kerja").val($("#tunj_kerja_" + id).val());
			$("#puskes").val($("#puskes_" + id).val());
			$("#koperasi").val($("#koperasi_" + id).val());
			$("#korpri").val($("#korpri_" + id).val());
			$("#btn").val($("#btn_" + id).val());
			$("#kamboja").val($("#kamboja_" + id).val());
			$("#lain").val($("#lain_" + id).val());
			$("#tgl_gaji").val($("#tgl_gaji_" + id).val());
			$("#periode_gaji").val($("#periode_gaji_" + id).val());
		});
		
		
		$(".table").dataTable();
    });
	
	
	$("#NIP").change(function (){
			$.post("<?PHP echo site_url(); ?>gajipegawai/change", { 
				nip: $("#NIP").val() }, 
				function(response) {
					$("#view").html(response);
				}
			);
		});
		
	$("#NIP").change(function (){
			$.post("<?PHP echo site_url(); ?>gajipegawai/change2", { 
				nip: $("#NIP").val() }, 
				function(response) {
					$("#view2").html(response);
				}
			);
		});
		
	$("#NIP").change(function (){
			$.post("<?PHP echo site_url(); ?>gajipegawai/change3", { 
				nip: $("#NIP").val() }, 
				function(response) {
					$("#view3").html(response);
				}
			);
		});
		
	$("#NIP").change(function (){
			$.post("<?PHP echo site_url(); ?>gajipegawai/change4", { 
				nip: $("#NIP").val() }, 
				function(response) {
					$("#view4").html(response);
				}
			);
		});
		
		
	$("#NIP").change(function (){
			$.post("<?PHP echo site_url(); ?>gajipegawai/change5", { 
				nip: $("#NIP").val() }, 
				function(response) {
					$("#view5").html(response);
				}
			);
		});
			
	
	$(function() {
		$("#tgl_gaji" ).datepicker();
	
	}); 
	
	$(function() {
		$("#periode_gaji" ).datepicker();
	
	}); 
		
		
	$(".delete").click(function() {
		$("#delete").show();
		
		$("#confirm_str").html("Apakah Anda yakin akan menghapus data ?");
		
		var id = this.id.substr(7);
		
		$("#no_gaji").val(id);
	});	
			
		
		
	$("#delete").click(function() {
		$.post("<?PHP echo site_url(); ?>gajipegawai/delete", { 
			no_gaji: $("#no_gaji").val() }, 
			function() {
				window.location = "<?PHP echo site_url(); ?>/gajipegawai";
			}
		);
	});	
		
</script>

