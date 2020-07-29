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
                <div><span>No: <?php echo $all->sid ?></span></div><br>
            </div>

          
            <div style="width: 50%;text-align: right;">
                <div><span>Date:</span> <?php $old_date = strtotime($all->date); echo date('d-m-Y', $old_date); ?></div><br>
            </div>
        </div>

        <div>
           <div><p class="dynamicdata" ><b>M/S</b>
               <?php echo $all->customer_name ?>,
				পিতার নাম : <?php echo $all->father_name ?>	,		
				গ্রাম : <?php echo $all->village ?>,
				থানা : <?php echo $all->police_station ?>,
				ডাক : <?php echo $all->postoffice ?>,
				জেলা : <?php echo $all->district ?>
           </p></div>
           <div><p class="dynamicdata" style="margin-top: 30px;"></p></div>
        </div>

        <div>
            <span>Mob: <?php echo $all->customer_contact_no ?></span><br>
            <span class="fs-i">Please Receive the undermentioned vehicles/with standard/Extra tools with spare wheel and accessories on the following particulars:</span>
        </div>

        <div>
            <div style="display: flex;margin-top:15px;">
                <div style="width: 29%;"><p class="name">01.&nbsp; Chassis No. </p></div>
                <div style="width: 75%;display: flex;">: <p class="dynamicdata" style="width: 100%;"> <span style="margin-left: 10px;"><?php echo $documents->chassisno ?></span></p></div><br>
            </div>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">02.&nbsp; Engine No. </p></div>
                <div style="width: 75%;display: flex;">: <p class="dynamicdata" style="width: 100%;"> <span style="margin-left: 10px;"><?php echo ' '.$documents->engineno ?></span></p></div><br>
            </div>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">03.&nbsp; Make & Model Of Vehicle. </p></div>
                <div style="width: 75%;display: flex;">: <p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo ' '.$documents->model  ?></span></p></div><br>
            </div>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">08.&nbsp; Year of manufacture </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo ' '.$documents->manufactureyear  ?></span></p></div><br>
            </div>
            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">05.&nbsp; No. of Cylinder With CC </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo ' '.$documents->cylinder  ?></span></p></div><br>
            </div>

           <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">12.&nbsp; Seating Capacity </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo ' '.$documents->seatingcapacity  ?></span></p></div><br>
            </div>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">06.&nbsp; Class of Vehicle </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo ' '.$documents->class  ?></span></p></div><br>
            </div>


            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">06.&nbsp; Colour of Vehicle </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo $documents->vehicle  ?></span></p></div><br>
            </div>

            <div style="display: flex;width:100%;margin-top:15px;">
                <div style="width: 29%;"><p class="name">07.&nbsp; Tyre Size. </p></div>
                <div style="width: 75%;display: flex;">:<p class="dynamicdata" style="width: 100%;"><span style="margin-left: 10px;"><?php if(isset($documents))  echo $documents->typesize  ?></span></p></div><br>
            </div>
        </div>

        <div style="border: 1px solid;margin: 15px 0px;">
            <h5 style="padding: 5px 10px 5px 5px;margin-bottom: 10px;">REMARKS:</h5>
            <p style="padding-left: 5px;"><?php if(isset($documents)) echo  $documents->remarks ?></p>
        </div>
        
        
            <p style="text-align: center;"><b>Received with thanks the above mentioned vehilcle (s) with perfect condition along with tools and accessories.</b></p>

        <div style="width: 100%;">
            <div class="text-right">For: <b>SUPROVA INTERNATIONAL</b></div>
        </div>

        <div style="display:flex;margin-top: 30px;">
            <div style="width: 50%;"><span style="border-top: 1px dotted;">( Buyer's Signature )</span></div>
            <div class="text-right" style="width: 50%;"><span style="border-top: 1px dotted;">( Sales Department )</span></div>
        </div>
		
		<img class="img" src="<?php echo base_url()?>images/suprobha-logo.jpg" alt="">
	</div>
</body>
</html>	