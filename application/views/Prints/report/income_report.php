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
         	<?php if(count($duecollection)>0 || count($collection)>0){ ?>
<div class="table-responsive">     
	<div class="table-responsive">     
		<table class="table table-bordered table-secondary">
			<thead>
				<tr>
					<th style="text-align: center;">SL.</th>
					<th style="text-align: center;">Date</th>
					<th style="text-align: center;">Customer ID</th>
					<th>Customer Name</th>
					<th>Income Type</th>
					<th style="text-align: right;">Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0;$amount=0;foreach ($duecollection as $key => $var): $i++;$amount=$amount+$var->amount ?>
					<tr>
						<th style="text-align: center;"><?php echo $i ?></th>
						<th style="text-align: center;"><?php echo $var->dddddd ?></th>
						<th style="text-align: center;"><?php echo $var->customer_id ?></th>
						<th><?php echo $var->customer_name ?></th>
						<th><?php echo "Due Collection" ?></th>
						<th style="text-align: right;"><?php echo sprintf('%0.2f',$var->amount) ?></th>
					</tr>
				<?php endforeach ?>
				<?php $i=0;foreach ($collection as $key => $var): $i++;$amount=$amount+$var->amount ?>
					<tr>
						<th style="text-align: center;"><?php echo $i ?></th>
						<th style="text-align: center;"><?php echo $var->dddddd ?></th>
						<th style="text-align: center;"><?php echo $var->customer_id ?></th>
						<th><?php echo $var->customer_name ?></th>
						<th><?php echo "Collection" ?></th>
						<th style="text-align: right;"><?php echo sprintf('%0.2f',$var->amount) ?></th>
					</tr>
				<?php endforeach ?>
				<tr>
					<td colspan="5">Total:</td>
					<td colspan="2" align="right"><b><?php echo sprintf('%0.2f',$amount) ?></b></td>
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
