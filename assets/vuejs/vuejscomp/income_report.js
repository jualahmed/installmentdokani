new Vue({
	el:"#vue_app",
	data:{
		base_url:base_url,
		alldata:[],
		alldata1:[],
		startdate:'',
		enddate:'',
		type:'',
		loding:false,
		amount:0,
	},
	methods:{
		result(){
			this.startdate=($("#datepickerrr").val());
			this.enddate=($("#datepicker").val());
			this.type=($("#type").val());
			var self=this;
			self.loding=!self.loding;
			alldata:[];
			$.ajax({
			url: base_url+'Report/income_report_response',
			type: 'POST',
			dataType: 'json',
			data: $('#salereport').serialize(),
			success: function(result) {
				self.loding=!self.loding;
				self.alldata=result.duecollection;
				self.alldata1=result.collection;
					result.duecollection.forEach( function(element, index) {
						 self.amount=parseInt(self.amount)+parseInt(element.amount);
					});

					result.collection.forEach( function(element, index) {
						 self.amount=parseInt(self.amount)+parseInt(element.amount);
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
	}
})