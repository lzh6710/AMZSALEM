$(function () {
    'use strict';
    
    $('#openEditPrice').click(function(){
      $('#priceControl').show();
      return false;
    });
    $('#openEditQuantity').click(function(){
      $('#quantityControl').show();
      return false;
    });
    $('#cancelPrice').click(function(){
      $('#priceControl').hide();
      return false;
    });
    $('#cancelQuantity').click(function(){
      $('#quantityControl').hide();
      return false;
    });
    
    $('#updatePrice').click(function(){
      var imageList = $('#priceForm').serializeArray();
      var data = {};
      $.each(imageList, function(index, value){
          data[value.name] = value.value;
      });
      data['SKU'] = $('input[name="SKU"]').val();
      data[$('#token').attr('name')] = $('#token').val();
      $.ajax({
        url : '/product/update_price',
        type: 'POST',
        data: data,
        success: function() {
          console.log(arguments);
        }
      });
      return false;
    });
});