new Vue({
  el:"#vueapp",
  data:{
    base_url:base_url,
    alldata:[],
    stockqty:0,
    amount:0,
    catagory_id:0,
    product_id:0,
    company_id:0,
    type:0,
    amount:0,
    samount:0,
  },
  methods:{
    stockreport(){
      alldata=[];
      var self=this;
      self.stockqty=0;
      self.amount=0;
      self.samount=0;
     $.ajax({
      url:  $('#form_2').attr('action'),
      type: "POST",
      dataType: 'json',
      data: {catagory_id:this.catagory_id,product_id:this.product_id,company_id:this.company_id},
      success: function(result) { 
        self.alldata=result;
        result.forEach( function(element, index) {
         self.stockqty=parseInt(self.stockqty)+1;
         console.log(element)
         self.amount=parseFloat(self.amount)+parseFloat((element.purchase_price));
         self.samount=parseFloat(self.samount)+parseFloat((element.sale_price));
        });
      }
    });
    }
  },
  created(){
  	 var self=this;
  	 self.stockqty=0;
  	$.ajax({
      url:  $('#form_2').attr('action'),
      type: "POST",
      dataType: 'json',
      success: function(result) { 
        self.alldata=result;
        result.forEach( function(element, index) {
         self.stockqty=parseInt(self.stockqty)+1;
         self.amount=parseFloat(self.amount)+parseFloat((element.bulk_unit_buy_price));
         self.samount=parseFloat(self.samount)+parseFloat((element.general_unit_sale_price));
        });
      }
    });
  }
})