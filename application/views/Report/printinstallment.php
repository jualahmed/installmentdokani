<section class="content-wrapper">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<form action ="<?php echo base_url();?>Report/printinstallment" class="form-horizontal" method="get" enctype="multipart/form-data" id="salereport" autocomplete="off">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-1 control-label">Invoice id</label>
							<div class="col-sm-2">
								<input type="text" name="invoice_id" class="form-control" placeholder="Invoice id">
							</div>
							<div class="col-sm-6 mt-2">
								<button type="submit" class="btn btn-success btn-sm" style="width:100px;"><i class="fa fa-fw fa-search"></i> Search</button>
							</div>
						</div>
						<br>
					</form> 
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<?php if (isset($installment)): ?>
				<table class="table table-bordered">
					<tr>
						<td>Id</td>
						<td>Date</td>
						<td>Amount</td>
						<td>Print</td>
					</tr>
					<?php foreach ($installment as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value->date ?></td>
							<td><?php echo $value->amount ?></td>
							<td>
								<?php if ($value->status==0): ?>
									<a href="<?php echo base_url().'/Sale/singleinstallmentprint/'.$value->sells_log_id; ?>" target="_blank" class="btn btn-success">Print</a>
								<?php endif ?>	
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			<?php endif ?>
		</div>
	</div>
</section>