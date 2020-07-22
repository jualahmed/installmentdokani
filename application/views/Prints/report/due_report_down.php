<table style="width: 100%">
  <thead>
    <tr>
      <td>
        <!--place holder for the fixed-position header-->
        <div class="page-header-space"></div>
      </td>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>
        <div class="page" style="line-height: 3;">
         	<?php if(count($allsale)>0){ ?>
<div class="table-responsive">     
	<div class="table-responsive">     
		<table class="table table-bordered table-secondary">
			<thead>
				<tr>
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
					<th class="text-right" colspan="8">Total</th>
					<th class="text-right"><?php echo number_format($total,2); ?></th>
					<th class="text-right"><?php echo number_format($totapp,2) ?></th>
					<th class="text-right"><?php echo number_format($totald,2) ?></th>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php }else{ ?>
<div>
	<h2 class="text-danger text-center">Result is Empty</h2>
</div>
<?php } ?>
        </div>
      </td>
    </tr>
  </tbody>

  <tfoot>
    <tr>
      <td>
        <div class="page-footer-space"></div>
      </td>
    </tr>
  </tfoot>
</table>
