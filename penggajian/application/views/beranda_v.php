
<?PHP
	$this->load->view("header_v");
?>
<div class="panel panel-default" style="color:#CC3300" >
 <div class="panel-body" style="background-color:f8f8f8">
	<div class="panel panel-default">
    	<div class="panel-body">
            <div class="carousel slide" id="banner">
                <ol class="carousel-indicators">
                    <li data-target="#banner" data-slide-to="0" class="active"></li>
                    <li data-target="#banner" data-slide-to="1"></li>
                    <li data-target="#banner" data-slide-to="2"></li>
                    <li data-target="#banner" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?PHP echo base_url(); ?>assets/img/banner1.jpg" alt="Stadion Utama Luar">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?PHP echo base_url(); ?>assets/img/banner2.jpg" alt="Istora">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?PHP echo base_url(); ?>assets/img/banner3.jpg" alt="Kawasan GBK">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?PHP echo base_url(); ?>assets/img/banner4.jpg" alt="Stadion Utama Dalam">
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>

<?PHP
	$this->load->view("footer_v");
?>

<script type="text/javascript">
	$(document).ready(function(e) {
		$('.carousel').carousel();
    });
</script>