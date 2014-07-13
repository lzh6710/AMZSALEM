$(function () {
    'use strict';
    
    $('#openEditPrice').click(function(){
      $('#priceControl').show();
      return false;
    });
    $('#openEditInventory').click(function(){
      $('#inventoryControl').show();
      return false;
    });
    $('#cancelPrice').click(function(){
      $('#priceControl').hide();
      return false;
    });
    $('#cancelInventory').click(function(){
      $('#inventoryControl').hide();
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
    
    $('#updateInventory').click(function(){
      var imageList = $('#inventoryForm').serializeArray();
      var data = {};
      $.each(imageList, function(index, value){
          data[value.name] = value.value;
      });
      data['SKU'] = $('input[name="SKU"]').val();
      data[$('#token').attr('name')] = $('#token').val();
      $.ajax({
        url : '/product/update_inventory',
        type: 'POST',
        data: data,
        success: function() {
          $('#hiddenForm').submit();
        }
      });
      return false;
    });
});