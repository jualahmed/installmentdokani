new Vue({
	el:"#vue_app",
	data:{
		base_url:base_url,
		alldata:[],
		startdate:'',
		enddate:'',
		amount:0,
        samount:0,
	},
	methods:{
		result(){
		    this.amount=0;
            this.samount=0;
			this.startdate=($("#datepickerrr").val());
			this.enddate=($("#datepicker").val());
			var self=this;
			alldata:[];
			$.ajax({
			url: base_url+'Report/installment_report_response',
			type: 'POST',
			dataType: 'json',
			data: $('#salereport').serialize(),
			success: function(result) {
				self.alldata=result;
				result.forEach( function(element, index) {
                    self.amount=parseFloat(self.amount)+parseFloat(parseInt(element.price)+parseInt(element.installmentfee)+parseInt(element.totalinterastlog));
                    self.samount=parseFloat(self.samount)+parseFloat(element.totaldue);
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
	created(){
		var self=this;
		alldata:[];
		self.amount=0;
        self.samount=0;
		$.ajax({
			url: base_url+'/Report/overdueinstallment',
		})
		.done(function(re) {
			var re= JSON.parse(re);
			self.alldata=re;
			console.log(re)
            re.forEach( function(element, index) {
                self.amount=parseFloat(self.amount)+parseFloat(parseInt(element.price)+parseInt(element.installmentfee)+parseInt(element.totalinterastlog));
                self.samount=parseFloat(self.samount)+parseFloat(element.totaldue);
            });
		})
		.fail(function() {
			console.log("error");
		});
	}
})