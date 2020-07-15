<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Ledger</h3>
					</div>
					<div class="box-body">
						<input type="hidden" id="action" >
						<form class="form-horizontal" id="form_2" method="post" action="<?php echo base_url();?>account/all_ledger_report_find">
							<div class="form-group">
							    
								<label for="inputEmail3" class="col-sm-1 control-label">Purpose</label>
								<div class="col-sm-2">
									<select class="form-control" id="purpose_id" name="purpose_id" tabindex="-1" aria-hidden="true" required="on">
										<option value="">Select Purpose</option>
										<option value="1">Customer Sale</option>
										<option value="2">Expense</option>
										<option value="3">Purchase</option>
										<option value="4">Bank Transfer</option>
										<option value="5">Owner Transfer</option>
									</select>
								</div>
								
								<label for="inputEmail3" class="col-sm-1 control-label" style="display:none;" id="dist_label">Ledger</label>
								<div class="col-sm-2" style="display:none;" id="dist_list">
									<select class="form-control" name="distributor_id">
										<option value="">Select a distributor</option>
										<?php foreach ($distributor_info as $key => $var): ?>
											<option value=" <?php echo $var->distributor_id ?> "><?php echo $var->distributor_name ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<label for="inputEmail3" style="display:none;" class="col-sm-1 control-label" id="cust_label">Ledger</label>
								<div class="col-sm-2" style="display:none;" id="cust_list">
									<select class="form-control" name="customer_id">
										<option value="">Select a Customer</option>
										<?php foreach ($customer as $key => $var): ?>
											<option value=" <?php echo $var->customer_id ?> "><?php echo $var->customer_name ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<label for="inputEmail3" class="col-sm-1 control-label" style="display:none;" id="exp_type_label">Type</label>
								<div class="col-sm-2" style="display:none;" id="exp_type_list">
									<?php 
										echo form_dropdown('type_id', $expense_type,'','style="width:100%;" class="form-control select2 ledger input-sm" id="type_id" tabindex="-1" aria-hidden="true"');
									?>
								</div>
								
								
								<label for="inputEmail3" class="col-sm-1 control-label" style="display:none;" id="type_label">Type</label>
								<div class="col-sm-2" style="display:none;" id="type_list">
									<select style="width:100%;" class="form-control select2 input-sm" id="transfer_type" tabindex="-1" aria-hidden="true">
										<option value="">Select Type</option>
										<option value="to_bank">To Bank</option>
										<option value="from_bank">From Bank</option>
									</select>
								</div>
								
								<label for="inputEmail3" class="col-sm-1 control-label" style="display:none;" id="own_type_label">Type</label>
								<div class="col-sm-2" style="display:none;" id="own_type_list">
									<select style="width:100%;" class="form-control select2 input-sm" id="owner_transfer_type" tabindex="-1" aria-hidden="true">
										<option value="">Select Type</option>
										<option value="to_owner">To Owner</option>
										<option value="from_owner">From Owner</option>
									</select>
								</div>
				
								<label for="inputEmail3" class="col-sm-1 control-label">Date</label>
								<div class="col-sm-4" style="width: 20.666667%;">
									<?php 
										echo form_input('start_date', '','class ="form-control" id="start" placeholder="Start Date" autocomplete="off"');
									?>
								</div>
							</div>
							
							<div class="form-group text-right">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-sm" name="search_random" id="form_submit"><i class="fa fa-fw fa-search"></i> Search</button>
									<a href="<?php echo base_url();?>account/all_ledger_report_print" id="down" style="display:none;" target="_blank" class="btn btn-primary btn-sm down"><i class="fa fa-download"></i> Print</a>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="modal_loader preload" style="display: none">
		<div class="center">
			<img src="<?php echo base_url();?>assets/img/LoaderIcon.gif" id="loaderIcon"/>
		</div>
	</div>
	<?php if(isset($balance)){ $camount=$balance; } else{ $camount=0; } $damount=0; ?>
	<section class="content infomsg" id="infomsg">
		<div class="row">
			<?php if(isset($ledgerdata)){ ?>
				<div class="col-md-12">
					<div class="box">	 
						<div class="box-body">
						    <h4 class="text-center"><?php echo $ledgerType ?></h4>
						    <h5 class="text-center"><?php echo $info ?></h5>
						    <h6 class="text-center"><?php echo $start .' - '.  date('Y-m-d') ?></h6>
							<div class="wrap">
								<table class="table">
									<tr>
										<th>SL.</th>
										<th>Date</th>
										<th>Remarks</th>
										<th style="text-align:right">Total Amount</th>
										<th style="text-align:right">Paid Amount</th>
										<th style="text-align:right">Balance</th>
									</tr>
									<tr>
										<th colspan="5">Opening Balance</th>
										<td align="right"><?php echo number_format($balance,2); ?></td>
									</tr>
									<?php foreach ($ledgerdata as $key => $var): ?>
										<tr>
											<td><?php echo $key+1 ?></td>
											<td><?php echo $var->date ?></td>
											<td><?php echo $var->remarks ?></td>
											<td align="right"><?php if($var->transaction_purpose=='sale' ||  $var->transaction_purpose=='purchase') { echo number_format($var->amount,2); $camount+=$var->amount; } ?></td>
											<td align="right"><?php if($var->transaction_purpose=='collection' || $var->transaction_purpose=='payment') { echo number_format($var->amount,2);  $damount+=$var->amount;} ?></td>
											<td align="right"><?php echo number_format($camount-$damount,2) ?></td>
										</tr>
									<?php endforeach ?>
									
									<tr>
										<th colspan="3">Total</th>
										<td align="right"><?php echo number_format($camount,2) ?></td>
										<td align="right"><?php echo number_format($damount,2) ?></td>
										<td align="right"><?php echo number_format($camount-$damount,2) ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<h2 class="text-center">Balance : <?php echo number_format($camount-$damount,2) ?></h2>	
	</section>

</div>
