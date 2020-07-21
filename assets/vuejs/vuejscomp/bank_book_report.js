$(document).ready(function() {
		$("#form_6").submit(function(event) {
		event.preventDefault();
		var submiturl = $(this).attr('action');
		var methods = $(this).attr('method');
		var output = '';
		var output2 = '';
		var output3 = '';
		var total_amount1 = 0.00;
		var total_amount2 = 0.00;
		var i=0;
		var k= 0;
		$.ajax({
			url: submiturl,
			type: methods,
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function(){
				 $(".modal").show();
			},
			success: function(result) {	
				$(".modal").hide();
				console.log(result)
				var all = `<table class="table"><tr>
							  	<th style="width:4%;">Date</th>
							  	<th style="width:4%;">Particular</th>
							  	<th style="width: 4%;text-align:right;">In</th>
							  	<th style="width: 4%;text-align:right;">Out</th>
							  	<th style="width: 4%;text-align:right;">Balance</th>
							</tr><tr>
							  	<th style="width:4%;" colspan="4">Opening Balance</th>
							  	<th style="width: 4%;text-align:right;">${ result.balance }</th>
							</tr>`
				total_amount1 = 0.00;
				var balance=result.balance;
				result.alldata.forEach(i=>{
					
					if(i.transaction_type=='in')balance+=parseFloat(i.amount)
					if(i.transaction_type=='out')balance-=parseFloat(i.amount)

					all+=`<tr>
							  	<td style="width:4%;">${ i.date }</td>
							  	<td style="width:4%;" class="text-capitalize">${ i.transaction_purpose }</td>
							  	<td style="width: 4%;text-align:right;">${ i.transaction_type=='in' ? parseFloat(i.amount).toFixed(2) : '' }</td>
							  	<td style="width: 4%;text-align:right;">${ i.transaction_type=='out' ? parseFloat(i.amount).toFixed(2) : '' }</td>
							  	<td style="width: 4%;text-align:right;">${ parseFloat(balance).toFixed(2) }</td>
							</tr>`
				})
				all+='</table>'
				$("#displaydata").html(all)
			}
		});
	});
	$("#down").click(function(event2) 
	{
		event2.preventDefault();
		submiturl = $(this).attr('href');
		
		var start = $('#start').val();
		var end = $('#end').val();

		if(start == ''){
			start = 'null';
		}
		if(end == ''){
			end = 'null';
		}

		window.open(submiturl+'/'+start+'/'+end,'_blank');
	});
	
});

$(document).ready(function() {
		$("#reset_btn").click(function(event) {
		event.preventDefault();
				$('#lock3').val('');
				$('#lock3').select2();
				$('#lock4').val('');
				$('#lock4').select2();
				$('#lock5').val('');
				$('#lock5').select2();
				$('#lock22').val('');
				$('#datep').val('');
				$('#datep2').val('');
		});
	});