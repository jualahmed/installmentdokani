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
		<div style="width: 1000px;">
			<div id="shop_title_box" style="width: 1000px;">			
				<div class="col-md-8">
					<img style="width: 100%;min-height: 200px" src="<?php echo base_url();?>images/common.jpg">
				</div>
				<div class="col-md-4" style="border: 1px solid #f1f1f1;min-height: 200px">
					<h4><b>BUYER'S</b></h4>
					<h4><?php echo $all->customer_name ?></h4>
					<h4><?php echo $all->customer_contact_no ?></h4>
				</div>
			</div> <!--end of shop_title_box-->
		</div>
		<br><br><br><br>
		<div class="row text-center" style="margin-top: 10PX;">
			<div class="col-md-4">
				<b>L/C NO:</b>
			</div>
			<div class="col-md-4">
				<b>Vessel Name:</b>
			</div>
			<div class="col-md-4">
				<b>Sales Invoice:</b>
			</div>
		</div>
		<div class="row text-center" style="padding: 20PX;">
			<div class="col-md-4">
				<b>Invoice NO:</b>
			</div>
			<div class="col-md-4">
				<b>B/E NO:</b>
			</div>
			<div class="col-md-4">
				<b>DATE:</b>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<th>SL NO.</th>
						<th>Chassis No.</th>
						<th>Engine No.</th>
						<th>Colour.</th>
						<th>Qnty.</th>
						<th>Description.</th>
						<th>Unit Price.</th>
						<th>Amount.</th>
					</tr>
					<tr>
						<td style="min-height: 500px;">SL NO.</td>
						<td style="min-height: 500px;">Chassis No.</td>
						<td>Engine No.</td>
						<td>Colour.</td>
						<td>Qnty.</td>
						<td>Description.</td>
						<td>Unit Price.</td>
						<td>Amount.</td>
					</tr>
				</table>
			</div>
		</div>
		<img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt="">
	</div>
</body>
</html>	