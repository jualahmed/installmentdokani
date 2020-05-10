<?php 
	ini_set('memory_limit', '-1');
	//ini_set('MAX_EXECUTION_TIME', '-1');
	ini_set('max_execution_time', 300);
?>
<style>
	.simpleTable{
		text-align:left;
	}
	
	.simpleTable th, .simpleTable td{
		line-height:normal;
		text-align:left;
		font-weight:normal;
	}
	
	#subjectNameList{
		line-height:20px;
	}
	
	
	@media print{
		pageBreak{
			page-break-after:always;
			page-break-inside:avoid;
		}
	}
</style>

<html>
	<head>
		<title> Dokani: It Lab Solutions </title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/print_style.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/table_style.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/transcript_style.css" type="text/css"/> 
		<!--script src="<?php echo base_url();?>assets/js/jquery.min.js"></script-->
	</head>
	
	<body>
		<div id="main">
			<div id="controller">
				<htmlpageheader name="myheader">
					<div id="header">
						<img style="width:10%;" class="schoolLogoHeaderSmall" src="<?php echo base_url();?>images/top_logo.png"/>
						<h1 style="font-size:18px; line-height:normal;width:90%;" class="schoolNameHeaderSmall"> 
							<?php echo $this->tank_auth->get_shopname().' ( '. $this->tank_auth->get_shopaddress().' ) '; ?>
						</h1>
						<h3 class="pageTitleSmall" style="margin:10px 0px 5px 0px;"> Financial Report </h3>
					</div>
				</htmlpageheader>
				<htmlpagefooter name="myfooter">
					<div id="printFooter">
						<div class="part70P"> 
							<div class="developPart">
								<img class="companyLogo" src="<?php echo base_url();?>images/itlablogo.png" alt="IT Lab Solutions Ltd."/>
								
								<p> 
									Generated By : <b>Dokani</b> 
									<br/>
									Developed By : <b>IT Lab Solutions Ltd.</b> +8801842485222, www.itlabsolutions.com
								</p> 
							</div>
						</div>
						
						
						<div class="part30P">
							<div class="orgNameBottom textAlginRight">
								<p> <b>&copy; Copyright </b> <br/>  <?php echo $this->tank_auth->get_shopname();?>  </p>
								<p> <?php echo $this->tank_auth->get_shopaddress();?> </p>
							</div>
						</div>
					</div>
				</htmlpagefooter>
				<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
				<sethtmlpagefooter name="myfooter" value="on" />

				<?php
					$total_payable = 0;
					$total_receivable = 0;
					$temp_payable_1 =0; 
					$temp_payable_2 = 0;
					$temp_receivable_1 = 0;
					$temp_receivable_2 = 0;
					$expense_total_amount = 0;
					$purchase_total_amount = 0;
					$purchase_total_amount_for_transport = 0;
					$purchase_total_amount_for_transport1 = 0;
					$expense_total_electric = 0;
					$expense_total_salary = 0;
					$expense_total_rent = 0;
					$expense_total_internet = 0;
					$expense_total_others = 0;
					$gift_total_amount = 0;
					$total_withdrawal = 0;
					$total_investment = 0;
					$loan_payable = 0;
					$loan_receivable = 0;
					$salary_payable =0;
					$salary_receivable =0;
					//print_r($payable_receivable_financial_statement );
					//print_r($expense_financial_statement );
					foreach($payable_receivable_financial_statement['updated_expense'] -> result() as $field):	
						 $temp_payable_2 = $field -> unpaid_grand_total - $field -> total_paid_amount;
						 $expense_total_amount = $field -> total_expense_amount;
						 $purchase_total_amount_for_transport = $field -> transport_cost;
						 $total_withdrawal = $field -> total_withdrawal;
					endforeach;
					foreach($payable_receivable_financial_statement['updated_transport'] -> result() as $field):	

						 $purchase_total_amount_for_transport1 = $field -> total_transport_amount;
					endforeach;
					
					foreach($payable_receivable_financial_statement['updated_purchase'] -> result() as $field):	
						 $temp_payable_1 = $field -> unpaid_grand_total - $field -> total_paid_amount;
						 $purchase_total_amount = $field -> total_purchase_amount;
					endforeach;
					foreach($payable_receivable_financial_statement['updated_gift'] -> result() as $field):	
						 $gift_total_amount = $field -> total_gift_amount;
						 $temp_receivable_2 = $field -> unpaid_gift_amount;
					endforeach;
					
					foreach($payable_receivable_financial_statement['sale'] -> result() as $field):	
						$temp_receivable_1 = $field -> grand_total - $field -> total_paid;
					endforeach;
					foreach($payable_receivable_financial_statement['investment'] -> result() as $field):	
						$total_investment = $field -> total_investment;
					endforeach;

					foreach($payable_receivable_financial_statement['loan_details'] -> result() as $field):	
						$loan_payable = $field -> payable_loan;
						$loan_receivable = $field -> receivable_loan;
					endforeach;
					
					foreach($payable_receivable_salary_statement -> result() as $field):	
						if(($field -> total_due) < 0)
							$salary_receivable =abs($field -> total_due);
						else $salary_payable = $field -> total_due;
					endforeach;

					$total_payable = $temp_payable_1 + $temp_payable_2;
					$total_receivable = $temp_receivable_1+ $temp_receivable_2;
					
					
					foreach($expense_financial_statement['updated_expense_electric'] -> result() as $field):	

						 $expense_total_electric = $field -> total_expense_amount_electric;
					endforeach;
					foreach($expense_financial_statement['updated_expense_salary'] -> result() as $field):	

						 $expense_total_salary = $field -> total_expense_amount_salary;
					endforeach;
					foreach($expense_financial_statement['updated_expense_house_rent'] -> result() as $field):	

						 $expense_total_rent = $field -> total_expense_amount_house_rent;
					endforeach;
					foreach($expense_financial_statement['updated_expense_internet'] -> result() as $field):	

						 $expense_total_internet = $field -> total_expense_amount_internet;
					endforeach;
					foreach($expense_financial_statement['updated_expense_other'] -> result() as $field):	

						 $expense_total_others = $field -> total_expense_amount_others;
					endforeach;
				?>
				<div class="row">
					<div class = "Field_Container_Box" style="margin: 10px 0px 0px 64px; width: 610px;" >
						<p style="text-indent:28px; margin-top:0px; font-size:12px;">Total Sale</p>
							<?php 
								echo '<div class = "h8" style="margin:0px 0px 0px 260px;">';
								$sale_price_info1 = round(($sale_price_info), 2);
								if($sale_price_info1 == round($sale_price_info1, 0))
									$sale_price_info1 = $sale_price_info1.'.00';
								else if(round($sale_price_info1, 1) == round($sale_price_info1, 2))
									$sale_price_info1 = $sale_price_info1.'0';
								echo $sale_price_info1.'</div>'; 
							?>
					</div>
					<div class = "Field_Container_Box" style="margin: 10px 0px 0px 64px; width: 610px;" >
						<p style="text-indent:28px; margin-top:0px; font-size:12px;">Total Sale Return</p>
							<?php 
								echo '<div class = "h8" style="margin:0px 0px 0px 260px;">';
								$sale_return_info1 = round(($sale_return_info), 2);
								if($sale_return_info1 == round($sale_return_info1, 0))
									$sale_return_info1 = $sale_return_info1.'.00';
								else if(round($sale_return_info1, 1) == round($sale_return_info1, 2))
									$sale_return_info1 = $sale_return_info1.'0';
								echo $sale_return_info1.'</div>'; 
							?>
					</div>
					<div class = "Field_Container_Box" style="margin: 10px 0px 0px 64px; width: 610px;" >
						<p style="text-indent:28px; margin-top:0px; font-size:12px;">Delivery Charge</p>
							<?php 
								echo '<div class = "h8" style="margin:0px 0px 0px 260px;">';
								$delivery_charge_info1 = round(($delivery_charge_info), 2);
								if($delivery_charge_info1 == round($delivery_charge_info1, 0))
									$delivery_charge_info1 = $delivery_charge_info1.'.00';
								else if(round($delivery_charge_info1, 1) == round($delivery_charge_info1, 2))
									$delivery_charge_info1 = $delivery_charge_info1.'0';
								echo $delivery_charge_info1.'</div>'; 
							?>
					</div>
					<div class = "Field_Container_Box" style="margin: 10px 0px 0px 64px; width: 610px;" >
						<p style="text-indent:28px; margin-top:0px; font-size:12px;">Revenue</p>
							<?php 
								echo '<div class = "h8" style="margin:0px 0px 0px 260px;">';
								$today_sale = round(($sale_price_info - $sale_return_info +$delivery_charge_info), 2);
								if($today_sale == round($today_sale, 0))
									$today_sale = $today_sale.'.00';
								else if(round($today_sale, 1) == round($today_sale, 2))
									$today_sale = $today_sale.'0';
								echo $today_sale.'</div>'; 
							?>
					</div>
				<div id = "mid_box_left" style="width:496px;margin: 0px 0px 0px 64px;" >
					<div class = "TitleBox">
						<div class ="pp">Cost of Sales</div>
					</div>

						<div class = "Field_Container_Box" >
							<div class = "purpose_controller"> Opening Inventory</div>	
							<?php 
								echo '<div class = "h8">'.$opening_stock.'</div>'; 
							?> 
						</div>
						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Purchase</div>
							<?php 
								echo '<div class = "h8">';
								$result = round($purchase_total_amount, 2);
								if($result == round($result, 0))
									$result = $result.'.00';
								else if(round($result, 1) == round($result, 2))
									$result = $result.'0';
								echo $result.'</div>'; 
							?> 
						</div>
							
						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Carriage Inward</div>
							<?php 
								echo '<div class = "h8">';
								$result = round($purchase_total_amount_for_transport1, 2);
								if($result == round($result, 0))
									$result = $result.'.00';
								else if(round($result, 1) == round($result, 2))
									$result = $result.'0';
								echo $result.'</div>'; 
							?>  
						</div>
						<div class = "Field_Container_Box" >
							<p style="width:217px; margin-top:0px; font-size:12px;">Cost of Goods Available for Sale</p>
							<?php
								echo '<div class = "h8" style="margin:0px 0px 0px 54px;">';
								$cost_sale = round(($opening_stock + $purchase_total_amount + $purchase_total_amount_for_transport1), 3);
								if($cost_sale == round($cost_sale, 0))
									$cost_sale = $cost_sale.'.00';
								else if(round($cost_sale, 1) == round($cost_sale, 2))
									$cost_sale = $cost_sale.'0';
								echo $cost_sale.'</div>' ;
							?>
						</div>
						<div class = "Field_Container_Box">
							<div class = "purpose_controller"> (-) Closing Stock.</div>	
							<?php 
								echo '<div class = "h8">'.$closing_stock.'</div>'; 
							?>
						</div>
				</div>	 <!--End of mid box left-->
				<div class = "Field_Container_Box" style="margin: 0px 0px 0px 64px; width: 610px;" >
					<p style="text-indent:8px; margin-top:0px; font-size:12px;">Cost of Goods Sold</p>
						<?php 
							echo '<div class = "h8" style="margin:0px 0px 0px 260px;">';
							$result2 = round(($cost_sale - $closing_stock), 2);
							if($result2 == round($result2, 0))
								$result2 = $result2.'.00';
							else if(round($result2, 1) == round($result2, 2))
								$result2 = $result2;
							echo $result2.'</div>' ;
						?>
				</div>
				<div class = "Field_Container_Box" style="margin: 0px 0px 0px 64px; width: 610px;" >
					<?php 
								$result3 = round(($today_sale - $result2), 2);
						
								if($result3 != 0){
								$profit_in_percent = ($result3/$result2)*100;
								}
								else{
								$profit_in_percent = 0;
								}
								if($result3 <0 ){
									echo '<p style="text-indent:6px; margin-top:0px; font-size:12px; color:red;">Gross Loss</p>';
									
									echo '<div class = "h8" style="margin:0px 0px 0px 258px; color:red;">';

								
								
								if($result3 == round($result3, 0))
									$result3 = $result3.'.00';
								else if(round($result3, 1) == round($result3, 2))
									$result3 = $result3;
								echo $result3.'</div>';
									
								}
								else if($result3>=0){
									echo '<p style="text-indent:6px; margin-top:0px; font-size:12px; color:green;">Gross Profit</p>';
									
									echo '<div class = "h8" style="margin:0px 0px 0px 258px;color:green;">';

								
								
								if($result3 == round($result3, 0))
									$result3 = $result3.'.00';
								else if(round($result3, 1) == round($result3, 2))
									$result3 = $result3;
								echo $result3.'</div>';
								}
								
							?>
				</div>
				<div class = "Field_Container_Box" style="margin: 0px 0px 0px 64px; width: 610px;" >
					<p style="font-size: 12px; margin: 0px 0px 0px 2px; width: 193px;">Comission</p>
						<?php
							echo '<div class = "h8" style="margin:0px 0px 0px 187px;">'.nbs(6);
							
							
							$total_comission = round(($date_wise_total_comission), 2);
							
							if($total_comission == round($total_comission, 0))
								$total_comission = $total_comission.'.00';
							else if(round($total_comission, 1) == round($total_comission, 2))
								$total_comission = $total_comission;
							echo $total_comission.'</div>' ;
						?>
					</div>
				</div>
				<div class = "Field_Container_Box" style="margin: 0px 0px 0px 64px; width: 610px;" >
					<p style="font-size: 12px; margin: 0px 0px 0px 2px; width: 193px;">Total Profit</p>
					<?php
						echo '<div class = "h8" style="margin:0px 0px 0px 187px;">'.nbs(6);
						
						
						$total_comission = round(($date_wise_total_comission + $result3), 2);
						
						if($total_comission == round($total_comission, 0))
							$total_comission = $total_comission.'.00';
						else if(round($total_comission, 1) == round($total_comission, 2))
							$total_comission = $total_comission;
						echo $total_comission.'</div>' ;
					?>
				</div>
				
				
				<div id = "mid_box_left" style="width:496px;margin: 9px 0px 0px 64px;" >
					<div class = "TitleBox">
						<div class ="pp">Operating Expenses</div>
					</div>

						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Salary</div>
							<?php 
								echo '<div class = "h8">';
								$salary_all = round($expense_total_salary, 2);
								if($salary_all == round($salary_all, 0))
									$salary_all = $salary_all.'.00';
								else if(round($salary_all, 1) == round($salary_all, 2))
									$salary_all = $salary_all;
								echo $salary_all.'</div>'; 
							?> 
						</div>
						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Rent</div>
							<?php 
								echo '<div class = "h8">';
								$rent_all = round($expense_total_rent, 2);
								if($rent_all == round($rent_all, 0))
									$rent_all = $rent_all.'.00';
								else if(round($rent_all, 1) == round($rent_all, 2))
									$rent_all = $rent_all;
								echo $rent_all.'</div>'; 
							?> 
						</div>
							
						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Electricity</div>
							<?php 
								echo '<div class = "h8">';
								$electricity_all = round($expense_total_electric, 2);
								if($electricity_all == round($electricity_all, 0))
									$electricity_all = $electricity_all.'.00';
								else if(round($electricity_all, 1) == round($electricity_all, 2))
									$electricity_all = $electricity_all;
								echo $electricity_all.'</div>'; 
							?>  
						</div>
						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Internet</div>
							<?php 
								echo '<div class = "h8">';
								$internet_all = round($expense_total_internet, 2);
								if($internet_all == round($internet_all, 0))
									$internet_all = $internet_all.'.00';
								else if(round($internet_all, 1) == round($internet_all, 2))
									$internet_all = $internet_all;
								echo $internet_all.'</div>'; 
							?>  
						</div>
						<div class = "Field_Container_Box" >
							<div class = "purpose_controller">Others</div>
							<?php 
								echo '<div class = "h8">';
								$others_all = round($expense_total_others, 2);
								if($others_all == round($others_all, 0))
									$others_all = $others_all.'.00';
								else if(round($others_all, 1) == round($others_all, 2))
									$others_all = $others_all;
								echo $others_all.'</div>'; 
							?>  
						</div>
				</div>
				<div class = "Field_Container_Box" style="margin: 0px 0px 0px 64px; width: 610px;" >
					<p style="text-indent:8px; margin-top:0px; font-size:12px;">Operating Expenses</p>
						<?php
							echo '<div class = "h8" style="margin:0px 0px 0px 260px;">';
							
							
							$result22 = round(($salary_all + $rent_all + $electricity_all + $internet_all + $others_all), 2);
							
							if($result22 == round($result22, 0))
								$result22 = $result22.'.00';
							else if(round($result22, 1) == round($result22, 2))
								$result22 = $result22;
							echo $result22.'</div>' ;
						?>
				</div>
				<div class = "Field_Container_Box" style="margin: 0px 0px 0px 64px; width: 610px;" >
					<?php 
						$result33 = round(($total_comission - $result22), 2);
						
						if($result33 != 0){
						$net_profit_in_percent = ($result2/$result33)*100;
						}
						else{
						$net_profit_in_percent = 0;
						}
						
						if($result33 <0 ){
							echo '<p style="text-indent:6px; margin-top:0px; font-size:12px; color:red;">Net Loss</p>';
							echo '<div class = "h8" style="margin:0px 0px 0px 261px; color:red;">';
							if($result33 == round($result33, 0))
								$result33 = $result33.'.00';
							else if(round($result33, 1) == round($result33, 2))
								$result33 = $result33;
							echo $result33.'</div>';
						}
						else if($result33>=0){
							echo '<p style="text-indent:6px; margin-top:0px; font-size:12px; color:green;">Net Profit</p>';
							
							echo '<div class = "h8" style="margin:0px 0px 0px 261px;color:green;">';
							if($result33 == round($result33, 0))
								$result33 = $result33.'.00';
							else if(round($result33, 1) == round($result33, 2))
								$result33 = $result33;
							echo $result33.'</div>';
							
						}
						
						 
					?>
				</div>
				
			</div> <!---------- END OF DIV CONTROLLER ---------->
		</div>	<!--------- END OF DIV MAIN --------->
	</body>
</html>
