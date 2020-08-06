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
				font-weight: 700!important;
		}
		.img{
		    position: absolute;
            left: 19%;
            opacity: .15;
            top: 30%;
            width: 57%;
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
			<div style="display: flex;flex-wrap: wrap;">			
				<div style="width: 66%;">
					<img style="width: 100%;min-height: 200px" src="<?php echo base_url();?>images/common.jpg">
				</div>
				<div style="border: 1px solid #f1f1f1;min-height: 200px;width: 33%;padding: 0px 5px;">
					<h5><b>BUYER'S</b></h5>
					<h5>Name : <?php echo $documents->customer_name ?></h5>
					<h5>S/O: : <?php echo $documents->father_name ?></h5>
					<h5>Mob : <?php echo $documents->mobile_no ?></h5>
					<h5>VILL : <?php echo $documents->village ?></h5>
					<h5>P/S : <?php echo $documents->thana ?></h5>
					<h5>P/O : <?php echo $documents->postoffice ?></h5>
					<h5>DIST : <?php echo $documents->district ?></h5>
				</div>
			</div> <!--end of shop_title_box-->
		</div>
		<div class="row" style="padding: 5px 13px;display: flex;flex-wrap: wrap;">
			<div style="width: 33.33%">
				<b>L/C NO: <?php if(isset($documents)) echo $documents->lcno ?></b>
			</div>
			<div style="width: 33.33%;text-align: center;">
				<b>Vessel Name: <?php if(isset($documents)) echo $documents->vesselname ?></b>
			</div>
			<div style="width: 33.33%" class="text-center">
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
				<b>DATE: <?php echo date("d-m-Y",strtotime($all->date)) ?></b>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<th>SL NO.</th>
						<th>Chassis No.</th>
						<th>Engine No.</th>
						<th>Colour</th>
						<th>Qnty.</th>
						<th>Description</th>
						<th style="text-align: center;">Unit Price</th>
						<th style="text-align: center;">Amount</th>
					</tr>
					<tr>
						<td>
							<div style="height: 80px"><?php echo 1 ?></div>
						</td>
						<td><?php echo $documents->chassisno ?></td>
						<td><?php echo $documents->engineno ?></td>
						<td><?php echo $documents->color ?></td>
						<td align="center">1</td>
						<td></td>
						<td align="right"><?php echo number_format($documents->price,2) ?></td>
						<td align="right"><?php echo number_format($documents->price,2) ?></td>
					</tr>
					<tr>
						<td colspan="6" rowspan="3">
							<div ></div>
						</td>
						<td align="right"><b>Total Amount:</b></td>
						<td align="right"><?php echo number_format($documents->price,2) ?></td>
					</tr>
					<tr>
						<td align="right"><b>Less Advance:</b></td>
						<td align="right"><?php echo number_format(0,2) ?></td>
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
								<p><b>ACCOUNTS DEPTT</b></p>
							</div>
							<div style="width: 50%;text-align: center;border-top: 1px dotted;margin: 5px;">
								<p><b>(Sales Department)</b></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <div style=""><img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt=""></div>
	</div>
</body>
</html>	