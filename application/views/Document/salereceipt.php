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
		<div class="wrap">
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
						<?php echo "Due: " ?><?php echo number_format($invoice->totaldue+$invoice->totalinterest) ?>
					<?php else: ?>
						<form action ="<?php echo base_url().'document/salereceiptprint/'.$invoice->sid ?>" class="form-horizontal" method="post" enctype="multipart/form-data" formtarget="_blank" id="salereport" autocomplete="off">
							<div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-1 control-label">LC/NO:</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="lcno" id="lock22" placeholder="LC/NO:" value="<?php if(isset($documents)) echo $documents->lcno ?>">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">VESSEL NAME:</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="vesselname" id="lock22" placeholder="VESSEL NAME:" value="<?php if(isset($documents)) echo $documents->vesselname ?>">
										<input type="hidden" name="product_id" id="pro_id">
									</div>
									<label for="inputEmail3" class="col-sm-1 control-label">B/E NO:</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="beno" id="lock22" placeholder="B/E NO:" value="<?php if(isset($documents)) echo $documents->beno ?>">
										<input type="hidden" name="product_id" id="pro_id">
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
