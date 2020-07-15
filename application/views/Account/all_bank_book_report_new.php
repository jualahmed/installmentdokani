
<div class="content-wrapper">
	<br>
	<section>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Bank Book Report</h3>
					</div>
					<div class="box-body">
						<form action ="<?php echo base_url();?>account/all_bank_book_report_find" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="form_6">
							<div class="form-group">
								<div>
									<label for="inputEmail3" class="col-sm-1 control-label">Date</label>
									<div class="col-sm-3">
										<?php echo form_input(array('type' => 'text','placeholder' => $bd_date , 'name' => "start_date",'class' => "form-control",'id' => "datepickerrr",'value' => $bd_date, 'tabindex' => 3, 'title' => "Start Date" ));?>
									</div>
								</div>
								<div style="display: none">
									<label for="inputEmail3" class="col-sm-1 control-label">End</label>
									<div class="col-sm-3">
										<?php echo form_input(array('type' => 'text','placeholder' => $bd_date , 'name' => "end_date",'class' => "form-control",'id' => "datepickerr", 'value' => $bd_date, 'tabindex' => 3, 'title' => "End Date" ));?>
									</div>
								</div>
								<div class="col-sm-4">
									<button type="submit" class="btn btn-success btn-sm" name="search_random" style="width:100px;"><i class="fa fa-fw fa-search"></i> Search</button>
									<button type="reset" id="reset_btn" class="btn btn-warning btn-sm" style="width:100px;"><i class="fa fa-fw fa-refresh"></i> Reset</button>
									<a href="<?php echo base_url();?>account/download_cash_book" id="down" style="display:none;width:100px;" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<div class="modal" style="display: none">
	<div class="center">
		<img src="<?php echo base_url();?>assets2/spin.gif" id="loaderIcon"/>
	</div>
</div>
<input type="hidden" id="start">
<input type="hidden" id="end">
<section class="content-3" id="infomsg">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="box">	 
				<div class="box-body">
					<div class="wrap">
						<div id="displaydata">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
</div>