<div class="content-wrapper">
	<section class="content">
		<div class="text-right">
			<!-- <a href="<?php echo base_url().'admin/allsmssend' ?>" class="btn btn-success">Send sms</a> -->
			<br>
			<br>
		</div>
		<form action ="<?php echo base_url();?>document/deliverychallan" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="form_6">
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
							<td><?php echo $invoice->totaldue+$invoice->totalinterest ?></td>
							<td><a href="<?php echo base_url().'sale/invoiceprint/'.$invoice->id ?>" target="_blank" class="btn btn-secondary">Print</a></td>
						</tr>
				</table>


				<div>
					<?php if ($invoice->totaldue+$invoice->totalinterest>0): ?>
						<?php echo "Due: " ?><?php echo number_format($invoice->totaldue+$invoice->totalinterest) ?>
					<?php else: ?>
						<form action ="<?php echo base_url().'document/deliverychallanprint/'.$invoice->sid ?>" class="form-horizontal" method="post" enctype="multipart/form-data" formtarget="_blank" id="salereport" autocomplete="off">
							<div>
								<div class="form-group">
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Model/Make of Vehicle:</label>
										<div>
											<input type="text" class="form-control" name="model" id="lock22" placeholder="Model/Make of Vehicle" value="<?php if(isset($documents)) echo $documents->model ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Class of Vehicle</label>
										<div>
											<input type="text" class="form-control" name="class" id="lock22" placeholder="Class of Vehicle" value="<?php if(isset($documents)) echo $documents->class ?>">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Number of Cylinder With CC</label>
										<div>
											<input type="text" class="form-control" name="cylinder" id="lock22" placeholder="Number of Cylinder With CC" value="<?php if(isset($documents)) echo $documents->cylinder ?>">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Colour of Vehicle</label>
										<div class="">
											<input type="text" class="form-control" name="vehicle" id="lock22" placeholder="Colour of Vehicle" value="<?php if(isset($documents)) echo $documents->vehicle ?>">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Size of Tyre</label>
										<div>
											<input type="text" class="form-control" name="typesize" id="lock22" placeholder="Size of Tyre" value="<?php if(isset($documents)) echo $documents->typesize ?>">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Year of manufacture/Assemble</label>
										<div>
											<input type="text" class="form-control" name="manufactureyear" id="lock22" placeholder="Year of manufacture/Assemble" value="<?php if(isset($documents)) echo $documents->manufactureyear ?>">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
										<label for="inputEmail3" class="control-label">Seating Capacity</label>
										<div>
											<input type="text" class="form-control" name="seatingcapacity" id="lock22" placeholder="Seating Capacity" value="<?php if(isset($documents)) echo $documents->seatingcapacity ?>">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-12">
										<label for="inputEmail3" class="control-label">Remarks</label>
										<div>
											<textarea type="text" class="form-control" name="remarks" id="lock22" placeholder="Seating Capacity"><?php if(isset($documents)) echo $documents->remarks ?></textarea> 
										</div>
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
