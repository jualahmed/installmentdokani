<div class="content-wrapper">
	<section class="content">
		<div class="text-right">
			<!-- <a href="<?php echo base_url().'admin/allsmssend' ?>" class="btn btn-success">Send sms</a> -->
			<br>
			<br>
		</div>
		<form action ="<?php echo base_url();?>document/salepaperforcustomer" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="form_6">
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
							<td><?php echo $invoice->totaldue+$invoice->totalinterest ?></td>
							<td><a href="<?php echo base_url().'sale/invoiceprint/'.$invoice->id ?>" target="_blank" class="btn btn-secondary">Print</a></td>
						</tr>
				</table>


				<div>
					<?php if ($invoice->totaldue+$invoice->totalinterest>0): ?>
					    <h2>Please Pay Your Outstanding Amount: <?php echo number_format($invoice->totaldue+$invoice->totalinterest) ?></h2>
					<?php else: ?>
						<form action ="<?php echo base_url().'document/salepaperforcustomerprint/'.$invoice->sid ?>" class="form-horizontal" method="post" enctype="multipart/form-data" formtarget="_blank" id="salereport" autocomplete="off">
							<div>
							   <div class="form-group">
							     <div class="col-md-4">
								    <label for="inputEmail3" class="control-label">Customer name</label>
									<div>
										<input type="text" class="form-control" name="customer_name" id="lock22" placeholder="Customer name" value="">
									</div>
								</div>
								<div class="col-md-4">
									<label for="inputEmail3" class="control-label">Father's Name</label>
									<div>
										<input type="text" class="form-control" name="father_name" id="lock22" placeholder="Father's Name" value="">
									</div>
								</div>
								<div class="col-md-4">
									<label for="inputEmail3" class="control-label">Mobile No</label>
									<div>
										<input type="text" class="form-control" name="mobile_no" id="lock22" placeholder="Mobile No" value="">
									</div>
								</div>

								<div class="col-md-4">
								    <label for="inputEmail3" class="control-label">Village</label>
									<div class="">
										<input type="text" class="form-control" name="village" id="lock22" placeholder="Village" value="">
									</div>
								</div>
								<div class="col-md-4">
									<label for="inputEmail3" class="control-label">Thana</label>
									<div class="">
										<input type="text" class="form-control" name="thana" id="lock22" placeholder="Thana" value="">
									</div>
								</div>
								<div class="col-md-4">
									<label for="inputEmail3" class="control-label">District</label>
									<div class="">
										<input type="text" class="form-control" name="district" id="lock22" placeholder="District" value="">
									</div>
								</div>
								
								<div class="col-md-4">
								     <label for="inputEmail3" class="control-label">Post office</label>
									<div>
										<input type="text" class="form-control" name="postoffice" id="lock22" placeholder="Post office" value="">
									</div>
								</div>
							    
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Model/Make of Vehicle</label>
										<div>
											<input type="text" class="form-control" name="model" id="lock22" placeholder="Model/Make of Vehicle" value="">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Class of Vehicle</label>
										<div>
											<input type="text" class="form-control" name="class" id="lock22" placeholder="Class of Vehicle" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Number of Cylinder With CC</label>
										<div>
											<input type="text" class="form-control" name="cylinder" id="lock22" placeholder="Number of Cylinder With CC" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Colour of Vehicle</label>
										<div class="">
											<input type="text" class="form-control" name="vehicle" id="lock22" placeholder="Colour of Vehicle" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Size of Tyre</label>
										<div>
											<input type="text" class="form-control" name="typesize" id="lock22" placeholder="Size of Tyre" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-sm-4">
										<label for="inputEmail3" class="control-label">Year of Manufacture/Assemble</label>
										<div>
											<input type="text" class="form-control" name="manufactureyear" id="lock22" placeholder="Year of manufacture/Assemble" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
										<label for="inputEmail3" class="control-label">Horse Power</label>
										<div>
											<input type="text" class="form-control" name="horsepower" id="lock22" placeholder="Horse Power" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
										<label for="inputEmail3" class="control-label">Laden Weight</label>
										<div>
											<input type="text" class="form-control" name="ladenweight" id="lock22" placeholder="Laden Weight" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
										<label for="inputEmail3" class="control-label">Whell Base</label>
										<div>
											<input type="text" class="form-control" name="whellbase" id="lock22" placeholder="Whell Base" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
										<label for="inputEmail3" class="control-label">Seating Capacity</label>
										<div>
											<input type="text" class="form-control" name="seatingcapacity" id="lock22" placeholder="Seating Capacity" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
										<label for="inputEmail3" class="control-label">Maker's Name</label>
										<div>
											<input type="text" class="form-control" name="makersname" id="lock22" placeholder="Maker's Name" value="">
											<input type="hidden" name="product_id" id="pro_id">
										</div>
									</div>
									<div class="col-md-4">
								       <label for="inputEmail3" class="control-label">Engine No</label>
    									<div class="">
    										<input type="text" class="form-control" name="engineno" id="lock22" placeholder="Engine No" value="<?php if(isset($documents)) echo $documents->engineno;else echo $invoice->engineno ?>">
    									</div>
									</div>
								    <div class="col-md-4">
								        <label for="inputEmail3" class="control-label">Chassis No</label>
    									<div class="">
    										<input type="text" class="form-control" name="chassisno" id="lock22" placeholder="Chassis No" value="<?php if(isset($documents)) echo $documents->chassisno;else echo $invoice->chassisno ?>">
    									</div>
								    </div>
									<div class="col-md-4">
									    <label for="inputEmail3" class="control-label">Price:</label>
    									<div class="">
    										<input type="text" class="form-control" name="price" id="lock22" placeholder="Price" value="<?php if(isset($documents)) echo $documents->price;else echo $invoice->price+$invoice->installmentfee+$invoice->totalinterastlog ?>">
    									</div>
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
