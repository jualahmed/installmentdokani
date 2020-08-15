 <div class="content-wrapper" id="vue_app">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Motorcycle Due Report</h3>
					</div>
					<div class="box-body">
						<form action ="<?php echo base_url();?>Report/due_report" class="form-horizontal" method="post" enctype="multipart/form-data" id="salereport" autocomplete="off">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-1 control-label">Invoice</label>
								<div class="col-sm-2">
									<input type="text" name="invoice_id" class ="form-control one" id="lock" placeholder="Inovice ID" autocomplete="off" autofocus="on">
								</div>
								<label for="inputEmail3" class="col-sm-1 control-label">Customer</label>
								<div class="col-sm-2">
									<select name="customer_id" class="form-control select2">
										<option value="0">Select a Customer</option>
										<?php foreach ($customer_name as $key => $value): ?>
											<option value="<?php echo $value->customer_id ?>"><?php echo $value->customer_name ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<label for="inputEmail3" class="col-sm-1 control-label">Chassis No</label>
								<div class="col-sm-2">
									<input type="text" name="chasisno" class ="form-control one" id="lock" placeholder="Chassis No" autocomplete="off" autofocus="on">
								</div>
								<div class="col-sm-12 mt-2 text-right">
									<button @click.prevent="result" type="submit" class="btn btn-success btn-sm" name="search_random" style="width:100px;"><i class="fa fa-fw fa-search"></i> Search</button>
									<button type="reset" id="reset_btn" class="btn btn-warning btn-sm" style="width:100px;"><i class="fa fa-fw fa-refresh"></i> Reset</button>
									<a href="<?php echo base_url() ?>Report/due_report_down/<?php echo $invoice_id.'/'.$customer_id ?>" id="down" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
								</div>
							</div>
							<br>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="table-responsive" v-if="alldata.length">          
			<table class="table">
				<thead>
					<tr>
						<th>SL.</th>
						<th>Customer Name</th>
						<th>Mobile No</th>
						<th>Invoice ID</th>
						<th>Date</th>
						<th>Product Name</th>
						<th>Engine No</th>
						<th>Chassis No</th>
						<th>Color</th>
						<th class="text-right">Aprx-Total</th>
						<th class="text-right">Paid-Amount</th>
						<th class="text-right">Aprx-Duo</th>
						<th>Next Date</th>
					</tr>
				</thead>
				<tbody>
					<?php $total=0;$totapp=0;$totald=0; foreach ($allsale as $key => $var): ?>
						<tr>
							<th><?php echo $key+1 ?></th>
							<th><?php echo $var->customer_name ?></th>
							<th><?php echo $var->customer_contact_no ?></th>
							<th><?php echo $var->sid ?></th>
							<th><?php echo $var->date ?></th>
							<th><?php echo $var->product_name ?></th>
							<th><?php echo $var->engineno ?></th>
							<th><?php echo $var->chassisno ?></th>
							<th><?php echo $var->color ?></th>
							<th class="text-right"><?php echo number_format($var->finalamount+$var->advancepay,2);$total+=($var->finalamount+$var->advancepay) ?></th>
							<th class="text-right"><?php echo number_format(($var->finalamount+$var->advancepay)-$var->totaldue,2);$totapp+=((($var->finalamount+$var->advancepay)-$var->totaldue)+($var->totalinterastlog-$var->totalinterest)) ?></th>
							<th class="text-right"><?php echo number_format($var->totaldue+$var->totalinterest,2);$totald+=($var->totaldue+$var->totalinterest);  ?></th>
							<th><?php echo $var->seconddate ?></th>
						</tr>	
					<?php endforeach ?>
					<tr>
						<th class="text-right" colspan="9">Total</th>
						<th class="text-right"><?php echo number_format($total,2); ?></th>
						<th class="text-right"><?php echo number_format($totapp,2) ?></th>
						<th class="text-right"><?php echo number_format($totald,2) ?></th>
					</tr>
				</tbody>
			</table>
		</div>
		<div v-else>
			<h2 class="text-danger text-center">Result is Empty</h2>
		</div>
	</section>
</div>
