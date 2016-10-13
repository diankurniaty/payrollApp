 <?PHP
	$this->load->view("header_v");
?>
<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

<div class="panel panel-default" >
	<div class="panel-body" style="background-color:f8f8f8">
	<br/>
	
		
<div class="container">	
<div class="panel panel-default">
<div class="container" style="background-color:f8f8f8">	
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5">
<legend style="color:#CC3333;text-align:center"><h3>Tambah Data Gaji Pegawai</h3></legend></div>
</div><br/>
    <form class="form-horizontal" role="form" method="post" action="<?PHP echo site_url(); ?>gajipegawai/save">
 				
			<div class="row">
			<div class="col-lg-7">		
					<div class="form-group">
                        <label for="no_gaji"></label>
                             <input type="hidden" class="form-control" name="no_gaji" id="no_gaji" readonly/>
					</div>
					<div class="form-group">
                        <label for="tgl_gaji" class="col-md-4">Tanggal Gaji  </label>
                            <input type="text" name="tgl_gaji" id="tgl_gaji" style="height:30px" required/>
                    </div>
				
                   	 <div class="form-group">
                        <label for="NIP" id="lb_NIP" class="col-md-4">NIP </label>
                            <select class="form-control" name="NIP" id="NIP" required / style="width:200px">
							<option value="">--PILIH NIP--</option>
							 	<?PHP
									$query = $this->pegawai_m->view();
									
									if($query->num_rows())
									{
										foreach($query->result() as $row) :
								?>
                                
                                <option value="<?PHP echo $row->NIP; ?>"><?PHP echo $row->NIP; ?></option>
                                
                                <?PHP
										endforeach;
									}
								?>
							</select>
							 <input type="hidden" class="form-control" name="NIP_id" id="NIP_id" required />
 				
                    </div>
					  <div class="form-group">
                        <label for="nama_peg" class="col-md-4">Nama Pegawai</label>
                        	<div class="col-md-7">
								<div id="view7">
                                
									<select class="form-control" name="nama_peg" id="nama_peg" required>
                                    
										<?PHP
                                            $this->pegawai_m->set_nip($nip);
                                            $query7 = $this->pegawai_m->view_nama_by_nip();
                                            foreach($query7->result() as $row):
                                        
                                            endforeach;
                                        ?>
                                        
									</select>
                            	</div>
                        	</div>
                    </div>					
                   <div class="form-group">
                        <label for="kd_jabatan" class="col-md-4">Jabatan</label>
                        	<div class="col-md-7">
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
                        	<div class="col-sm-2">
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
                        	<div class="col-md-2">
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
                        <label for="kd_keluarga" class="col-md-4">Kode Keluarga</label>
                        	<div class="col-md-2">
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
                        	<div class="col-md-2">
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
					</div>
					<!--/form>
					</div>
					</div>
				<div class="modal-header">
					<h4 class="modal-title text-left" style="color:#CC3300">Potongan</h4>
				</div>
				<div class="modal-body">
				
                <form class="form-horizontal" role="form"  method="post" id="form_posisi"-->

				<div class="col-lg-5">
					<div class="row"><br/><br/>
					<div class="form-group">
                        <label for="puskes" class="col-md-5">Puskes (Rp.)</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="puskes" id="puskes" onkeyup="angka(this);" />
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="form-group">
                        <label for="koperasi" class="col-md-5">Koperasi (Rp.)</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="koperasi" id="koperasi" onkeyup="angka(this);" />
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="form-group">
                        <label for="korpri" class="col-md-5">Korpri (Rp.)</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="korpri" id="korpri" onkeyup="angka(this);"/>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="form-group">
                        <label for="btn" class="col-md-5">BTN (Rp.)</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="btn" id="btn" onkeyup="angka(this);" />
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="form-group">
                        <label for="kamboja" class="col-md-5">Yayasan Bunga Kamboja (Rp.)</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="kamboja" id="kamboja" onkeyup="angka(this);"/>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="form-group">
                        <label for="lain" class="col-md-5">Lain-lain (Rp.)</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="lain" id="lain" onkeyup="angka(this);"/>
						</div>
						<div class="col-md-1"></div>
					</div>
					<br/>
					<div class="form-group">
                        <div class="col-md-5"></div>
                        <div class="col-md-6">
                             <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-save"></span> Simpan
                                </button>
						</div>
						<div class="col-md-1"></div>
					</div>
					
					</div>
					
					</div></div>
                </form>
				</div></div></div>

</div></div>
 <?php $this->load->view('footer_v');?>

<script type="text/javascript">
	$(document).ready(function(e) {				
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
		
		
		$("#NIP").change(function (){
			$.post("<?PHP echo site_url(); ?>gajipegawai/change7", { 
				nip: $("#NIP").val() }, 
				function(response) {
					$("#view7").html(response);
				}
			);
		});	
			
		
	$(".table").dataTable();
    });
	
	$(function() {
		$("#tgl_gaji" ).datepicker();
	
	}); 
	
	function angka(e) {
	   if (!/^[0-9]+$/.test(e.value)) {
		  e.value = e.value.substring(0,e.value.length-1);
	   }
	}
</script>		