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

        <div style="display:flex;">
            <div style="width: 50%;">
                <div><span>Ref : <?php echo $all->referencename ?></span></div><br>
                <div><span>To : <?php echo $all->customer_name ?></span></div>
            </div>

          
            <div style="width: 50%;text-align: right;">
                <div><span>Date:</span> <?php $old_date = strtotime($all->date); echo date('d-m-Y', $old_date); ?></div><br>
            </div>
        </div>

        <div>
            <div><h4 class="text-center">To Whom It May Concern</h4></div>
        </div>

        <div><br>
            <p>This is to certify that we have sold new vehicle to: <?php echo $all->customer_name  ?></p>
            <span>Mob: <?php echo $all->customer_contact_no  ?></span><br>
            <span class="fs-i">On the following particulars</span>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">01.&nbsp; Model/Make of Vehicle </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"><?php if(isset($documents)) echo $documents->model ?> </p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">02.&nbsp; Class of Vehicle </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"><?php if(isset($documents)) echo$documents->class ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">03.&nbsp; Chassis No. </p></div>
                <div style="width: 75%;display: flex;" class="text-right">:<p class="dynamicdata" style="width: 100%"><?php echo $all->chassisno ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">04.&nbsp; Engin No. </p></div>
                <div style="width: 75%;display: flex;" class="text-right">:<p class="dynamicdata" style="width: 100%"><?php echo $all->engineno ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">05.&nbsp; Number of Cylinder With CC </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->cylinder  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">06.&nbsp; Colour of Vehicle </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->vehicle  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">07.&nbsp; Size of Tyre </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->typesize  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">08.&nbsp; Year of manufacture/Assemble </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->manufactureyear  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">09.&nbsp; Horse Power </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->horsepower  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">10.&nbsp; Laden Weight </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->ladenweight  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">11.&nbsp; Whell Base </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->whellbase  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">12.&nbsp; Seating Capacity </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->seatingcapacity  ?></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">13.&nbsp; Maker's Name </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"> <?php if(isset($documents))  echo $documents->makersname  ?></p></div><br>
            </div>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">14.&nbsp; Unite Price. </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%"><?php echo $all->price ?></p></div><br>
            </div>
        </div>

        <div style="width: 100%;">
            <div class="text-right">For: <b>SUPROVA INTERNATIONAL</b></div>
        </div>

        <div style="display:flex;margin-top:30px;">
            <div style="width: 50%;"><b>Owner's Signature</b></div>
            <div class="text-right" style="width: 50%;"><span style="border-top: 1px dotted;">(Sales Department)</span></div>
        </div>
		
		<img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt="">
	</div>
</body>
</html>	