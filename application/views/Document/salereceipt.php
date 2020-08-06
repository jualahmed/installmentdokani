<div class="content-wrapper">
	<section class="content">
		<div class="text-right">
			<!-- <a href="<?php echo base_url().'admin/allsmssend' ?>" class="btn btn-success">Send sms</a> -->
			<br>
			<br>
		</div>
		<form action ="<?php echo base_url();?>document/salereceipt" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="form_6">
			<div class="col-md-10">
				<input type="text" placeholder="Invoice id" class="form-control" name="invoice_id">
			</div>
			<div class="col-md-2">
				<button class="btn btn-success">sumbit</button>
			</div>
		</form>
	</section>
	<br><br>
	<section class="content">
		<div class="wrap table-responsive">
			<?php if (isset($invoice)): ?>
				<table class="table table-bordered">
						<tr>
							<th>Invoice ID</th>
							<th>Date</th>
							<th>Product Name</th>
							<th>Engine No</th>
							<th>Chassis No</th>
							<th>Battery No</th>
							<th>Color</th>
							<th>Customer Name</th>
							<th>Mobile No</th>
							<th>Total</th>
							<th>Due</th>
							<th>Print</th>
						</tr>
						<tr v-for="(i,index) in alldata">
							<td><?php echo $invoice->id; ?></td>
							<td><?php echo $invoice->date ?></td>
							<td><?php echo $invoice->product_name ?></td>
							<td><?php echo $invoice->engineno ?></td>
							<td><?php echo $invoice->chassisno ?></td>
							<td><?php echo $invoice->batteryno?></td>	
							<td><?php echo $invoice->color ?></td>
							<td><?php echo $invoice->customer_name ?></td>
							<td><?php echo $invoice->customer_contact_no ?></td>
							<td><?php echo number_format($invoice->price+$invoice->installmentfee+$invoice->totalinterastlog,2) ?></td>
							<td><?php echo number_format($invoice->totaldue+$invoice->totalinterest,2) ?></td>
							<td><a href="<?php echo base_url().'sale/invoiceprint/'.$invoice->id ?>" target="_blank" class="btn btn-secondary">Print</a></td>
						</tr>
				</table>

				<div class="col-md-12">
					<?php if ($invoice->totaldue+$invoice->totalinterest>0): ?>
						<h2>Please Pay Your Outstanding Amount: <?php echo number_format($invoice->totaldue+$invoice->totalinterest) ?></h2>
					<?php else: ?>
						<form action ="<?php echo base_url().'document/salereceiptprint/'.$invoice->sid ?>" class="form-horizontal" method="post" enctype="multipart/form-data" formtarget="_blank" id="salereport" autocomplete="off">
							<div>
							    
							    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Custome name</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="customer_name" id="lock22" placeholder="Custome name" value="">
									</div>
									<label for="inputEmail3" class="col-sm-2 control-label">Father's Name</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="father_name" id="lock22" placeholder="Father's Name" value="">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">Mobile No</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="mobile_no" id="lock22" placeholder="Mobile No" value="">
									</div>
								</div>
								
								
								<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Village</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="village" id="lock22" placeholder="Village" value="">
									</div>
									<label for="inputEmail3" class="col-sm-2 control-label">Thana</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="thana" id="lock22" placeholder="Thana" value="">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">District</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="district" id="lock22" placeholder="District" value="">
									</div>
								</div>
							    <br>
								<div class="form-group">
								    
								    <label for="inputEmail3" class="col-sm-2 control-label">Post office</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="postoffice" id="lock22" placeholder="Post office" value="">
									</div>
									
									<label for="inputEmail3" class="col-sm-2 control-label">VESSEL NAME</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="vesselname" id="lock22" placeholder="VESSEL NAME" value="">
										<input type="hidden" name="product_id" id="pro_id">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">B/E NO</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="beno" id="lock22" placeholder="B/E NO" value="">
										<input type="hidden" name="product_id" id="pro_id">
									</div>
								</div>
								<br/>
							
								<div class="form-group">
								       <label for="inputEmail3" class="col-sm-2 control-label">Engine No</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="engineno" id="lock22" placeholder="Engine No" value="<?php if(isset($documents)) echo $documents->engineno; else echo $invoice->engineno ?>">
									</div>
									<label for="inputEmail3" class="col-sm-2 control-label">Chassis No</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="chassisno" id="lock22" placeholder="Chassis No" value="<?php if(isset($documents)) echo $documents->chassisno;else echo $invoice->chassisno ?>">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">Price</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="price" id="lock22" placeholder="Price" value="<?php if(isset($documents)) echo $documents->price;else echo $invoice->price+$invoice->installmentfee+$invoice->totalinterastlog ?>">
									</div>
								</div>
								    
							<br>
								
								<div class="form-group">
								    
								    <label for="inputEmail3" class="col-sm-2 control-label">LC/NO</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="lcno" id="lock22" placeholder="LC/NO" value="">
									</div>
									
								    <label for="inputEmail3" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="color" id="lock22" placeholder="color" value="">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">Description</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="desc" id="lock22" placeholder="Description" value="">
									</div>
									
								</div>
								
								<div class="form-group">
									<div class="col-md-12 mt-2 text-right">
										<button  type="submit" class="btn btn-success" name="search_random">Sale Receipt Print</button>
									</div>
								</div>
								<br>
							</div>
						</form>	
					<?php endif ?>
				</div>
			<?php endif ?>
		</div>
	</section>
</div>
