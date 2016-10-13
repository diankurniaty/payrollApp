<?PHP
	$this->load->view("header_v");
?>

<div class="panel panel-default" style="color:#CC3300" >
	<div class="panel-body" style="background-color:f8f8f8">
		 <div class="row">
			    <div class="col-md-3">
        			<legend><b>Pilih Periode Penggajian</b></legend>
            	</div>
				<div class="col-md-9"></div><br/>
			</div>

<form method="POST" action="<?PHP echo site_url(); ?>cariperiode/tampil_periode"> 
	 <select name="bulantahun" id="bulantahun" />
		<?PHP
			$query = $this->filter_periode_m->cari_periode2();
			
			if($query->num_rows())
			{
				foreach($query->result() as $row) :
		?>
		
		<option value="<?PHP echo $row->tgl_gaji; ?>" style="height:20px;width:150px"><?PHP echo $row->tgl_gaji; ?></option>
		
		<?PHP
				endforeach;
			}
		?>
	<input type="submit" name ="submit" value=" Ekspor ke Excel" style="height:27px;width:130px" class="btn-primary"/>
	</select>
</form>



		</div></div>	
		
		<?PHP
		$this->load->view("footer_v");
	?>