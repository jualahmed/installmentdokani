<!DOCTYPE HTML>
<html>
<head>
	<title> Dokani : IT Lab Solutions </title>
	<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/assets2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/printstyle.css" type="text/css"/>
	<link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
	<style>
		*{
			font-family: 'SolaimanLipi', Arial, sans-serif !important;
		}
		.img{
			position: absolute;
		    left: -2%;
		    opacity: .15;
		    top: 12%;
		    width: 100%;
		}
        h4{
            width: fit-content;
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 900;
            margin: auto;
            padding-top: 20px;
            border-bottom: 4px solid;
            padding-bottom: 3px;
        }
        span {
            font-weight: 700;
        }
        .fs-i{
            font-style: italic;
        }
        h5{
            display: flex;
            display: flex;
            font-size: 16px;
            font-weight: normal;
        }
        p.name {
            width: 300px;
            margin-left: 10px;
        }
        p.dynamicdata {
            margin-left: 5px;
            border-bottom: 1px dashed;
            line-height: 24px;
        }
	</style>
</head>
<body> 
	<?php 
		$this->load->config('custom_config'); 
		$pre_blance_show_invoice = $this->config->item('pre_blance_show_invoice');
	?>
 	<div id ="main_invoice" style="width: 1000px; margin: auto;">
		<div style="width: 1000px;">
			<div id="shop_title_box" style="width: 1000px;">			
					<img style="width: 100%;min-height: 200px" src="<?php echo base_url();?>images/common.jpg">
			</div> <!--end of shop_title_box-->
		</div>
		<br>

        <div class="row">
            <div class="col-lg-12" style="display:flex;">
                <div style="width: 33.33%;">
                    <div><span>Ref:</span></div><br>
                    <div><span>To:</span></div>
                </div>
                <div style="width: 33.33%;">
                    <div><h4 >To Whom It May Concern</h4></div>
                </div>
                <div style="width: 33.33%;text-align: right;">
                    <div><span>Date:</span> <?php $old_date = strtotime($all->date); echo date('d-m-Y', $old_date); ?></div><br>
                </div>
            </div>
            <div class="col-lg-12" style="display:flex;">
                <div><br>
                    <p>This is certify that we have sold new vehicle to:</p>
                    <span>Mob:</span><br>
                    <span class="fs-i">On the following particulars</span>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">01.&nbsp; Model/Make of Vehicle </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">: </p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">02.&nbsp; Class of Vehicle </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">03.&nbsp; Chassis No. </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">04.&nbsp; Engin No. </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">05.&nbsp; Number of Cylinder With CC </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">06.&nbsp; Colour of Vehicle </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">07.&nbsp; Size of Tyre </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">08.&nbsp; Year of manufacture/Assemble </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">09.&nbsp; Horse Power </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">10.&nbsp; Laden Weight </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">11.&nbsp; Whell Base </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">12.&nbsp; Seating Capacity </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>
                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">13.&nbsp; Maker's Name </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:</p></div><br>
                    </div>

                    <div class="row" style="display: flex;width:100%;margin-top:15px;">
                        <div style="width: 29%;"><p class="name">14.&nbsp; Unite Price. </p></div>
                        <div style="width: 75%;"><p class="dynamicdata">:&nbsp; <p style="opacity:0;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi temporibus ad ullam Excepturi temporibus ad ullam temporibus.</p></p></div><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div style="width: 100%;">
                <div style="float: right;">For: <b>SUPROVA INTERNATIONAL</b></div>
            </div>
        </div>

        <div class="row">
            <div style="width: 100%;display:flex;">
                <div style="width: 50%;">Owner's Signature</div>
                <div style="width: 50%;width: fit-content;text-align: right;border-top: 1px solid;">(Sales Department)</div>
            </div>
        </div>
		
		<img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt="">
	</div>
</body>
</html>	