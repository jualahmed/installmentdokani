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
			<div style="padding: 20PX;display: flex;flex-wrap: wrap;">			
				<div style="width: 66%;">
					<img style="width: 100%;min-height: 200px" src="<?php echo base_url();?>images/common.jpg">
				</div>
				<div style="border: 1px solid #f1f1f1;min-height: 200px;width: 33%;padding: 10px;">
					<h4><b>BUYER'S</b></h4>
					<h4><?php echo $all->customer_name ?></h4>
					<h4><?php echo $all->customer_contact_no ?></h4>
				</div>
			</div> <!--end of shop_title_box-->
		</div>
		<div class="row" style="padding: 20PX;display: flex;flex-wrap: wrap;">
			<div style="width: 33.33%">
				<b>L/C NO: <?php if(isset($documents)) echo $documents->lcno ?></b>
			</div>
			<div style="width: 33.33%;text-align: center;">
				<b>Vessel Name: <?php if(isset($documents)) echo $documents->vesselname ?></b>
			</div>
			<div style="width: 33.33%" class="text-right">
				<b>Sales Invoice:</b>
			</div>
		</div>
		<div style="padding: 10PX 0px;display: flex;flex-wrap: wrap;">
			<div style="width: 33.33%;">
				<b>Invoice NO: <?php echo $all->sid ?></b>
			</div>
			<div style="width: 33.33%;text-align: center;">
				<b>B/E NO: <?php if(isset($documents)) echo $documents->beno ?></b>
			</div>
			<div style="width: 33.33%" class="text-right">
				<b>DATE: <?php echo $all->date ?></b>
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
						<th style="text-align: right;">Unit Price.</th>
						<th style="text-align: right;">Amount.</th>
					</tr>
					<tr>
						<td>
							<div style="height: 200px"><?php echo 1 ?></div>
						</td>
						<td><?php echo $all->chassisno ?></td>
						<td><?php echo $all->engineno ?></td>
						<td><?php echo $all->color ?></td>
						<td>1</td>
						<td></td>
						<td align="right"><?php echo number_format($all->price,2) ?></td>
						<td align="right"><?php echo number_format($all->price,2) ?></td>
					</tr>
					<tr>
						<td colspan="6" rowspan="3">
							<div ></div>
						</td>
						<td align="right"><b>Total Amount:</b></td>
						<td align="right"><?php echo number_format($all->price,2) ?></td>
					</tr>
					<tr>
						<td align="right"><b>Less Advance:</b></td>
						<td align="right"><?php echo number_format($all->price,2) ?></td>
					</tr>
					<tr>
						<td align="right"><b>Balance:</b></td>
						<td align="right"><?php echo number_format(0,2) ?></td>
					</tr>
				</table>
				<div style="display: flex;">
					<div style="width: 50%;border: 1px solid #f1f1f1;">
						<b>Payment Reference :</b> 
						<div style="padding-top: 10px;">
							<div style="display: flex;">
								<b style="width: 70%;padding: 2px 0px;">M.R.No. <span style="border-bottom: 1px solid red;width: 1000%;"></span></b>
								<p style="width: 30%;padding: 2px 0px;"><b>Date:</b></p>
							</div>
							<div style="display: flex;">
								<b style="width: 70%;padding: 2px 0px;">For TK <span style="border-bottom: 1px solid red;width: 1000%;"></span></b>
								<p style="width: 30%;padding: 2px 0px;"><b>(Taka:)</b></p>
							</div>
							<div style="display: flex;">
								<b style="width: 70%;padding: 2px 0px;">In Cash/by <span style="border-bottom: 1px solid red;width: 1000%;"></span></b>
								<p style="width: 30%;padding: 2px 0px;"><b></b></p>
							</div>
						</div>
					</div>
					<div style="width: 50%;">
						<h5 class="text-right"><P style="padding: 5px;">FOR: <b>SUPROVA INTERNATIONAL</b></P></h5>
						<div style="display: flex;margin-top:20px;text-align: center;">
							<div style="width: 50%;border-top: 1px dotted;margin: 5px;">
								<p><b>ACCOUNT DEPTT</b></p>
							</div>
							<div style="width: 50%;text-align: center;border-top: 1px dotted;margin: 5px;">
								<p><b>(Sales Department)</b></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt="">
	</div>
</body>
</html>	