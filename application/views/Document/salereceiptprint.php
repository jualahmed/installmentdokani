<!DOCTYPE HTML>
<html>
<head>
	<title> Dokani : IT Lab Solutions </title>
	<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/printstyle.css" type="text/css"/>
	<link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
	<style>
		*{
			font-family: 'SolaimanLipi', Arial, sans-serif !important;
		}
		.img{
			position: absolute;
		    left: -2%;
		    opacity: .15;
		    top: 12%;
		    width: 100%;
		}
	</style>
</head>
<body> 
	<?php 
		$this->load->config('custom_config'); 
		$pre_blance_show_invoice = $this->config->item('pre_blance_show_invoice');
	?>
 	<div id ="main_invoice" style="width: 1000px; margin: auto;">
		<div id = "invoice"  style="width: 1000px;">
			
			<div id="shop_title_box"  style="width: 1000px;">			
				<div class="col-md-8">
					<img style="width: 100%" src="<?php echo base_url();?>images/common.jpg" height="101px">
				</div>
				<div class="col-md-4" style="border: 1px solid #f1f1f1;">
					<h4>BUYER'S</h4>
					<?php echo $all->customer_name ?>
					<p><?php echo $all->customer_contact_no ?></p>
				</div>
			</div> <!--end of shop_title_box-->

		</div>
		<img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt="">
	</div>
</body>
</html>	