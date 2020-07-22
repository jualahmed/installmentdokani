new Vue({
	el:"#vue_app",
	data:{
		alldata:[],
		invoice_id:0,
		customer_id:0,
		product_id:0,
		seller_id:0,
		start_date:0,
		end_date:0,
		amount:0,
		samount:0,
		loding:false,
	},
	methods:{
		result(){
				this.start_date=($("#datepickerrr").val());
				this.end_date=($("#datepickerr").val());
				this.amount=0;
				this.samount=0;
				var self=this;
				self.loding=!self.loding;
				alldata:[];
				$.ajax({
				url: base_url+'Report/all_sale_report_find',
				type: 'POST',
				dataType: 'json',
				data: {invoice_id:this.invoice_id,customer_id:this.customer_id,product_id:this.product_id,id:this.seller_id,start_date:this.start_date,end_date:this.end_date},
				success: function(result) { 
					self.alldata=result;
					self.loding=!self.loding;
						result.forEach( function(element, index) {
						 self.amount=parseFloat(self.amount)+parseFloat(element.finalamount)+parseFloat(element.advancepay);
						 self.samount=parseFloat(self.samount)+parseFloat((element.totaldue))+parseFloat(element.totalinterest);
					});
				}
			});
		},
		formatDate(date) {
				var d = new Date(date),
				month = '' + (d.getMonth() + 1),
				day = '' + d.getDate(),
				year = d.getFullYear();
				if (month.length < 2) month = '0' + month;
				if (day.length < 2) day = '0' + day;
				return [day,month,year].join('-');
		}
	},
})