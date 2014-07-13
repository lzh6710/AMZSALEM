$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '/product/image';
    $('#fileupload').fileupload({
      formData: function (form) {
        return form.serializeArray();
        },
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
              var select = $('select[name="ImageType"').val();
              var selectImage = $('#files').find('#' + select);
              if(selectImage.length > 0) {
                $(selectImage).find('img').attr('src', file.url);
                $(selectImage).find('input').val(file.url);
              } else {
                selectImage = $('<span/>').attr('id', select).css({float: 'left'});
                $('<h5>').text(select).appendTo(selectImage);
                $('<img/>').attr('src', file.url).addClass('thumbnail').css({maxHeight: '150px', maxWidth:'150px'}).appendTo(selectImage);
                $('<input/>').attr('type', 'hidden').attr('name', select).val(file.url).appendTo(selectImage);
                selectImage.appendTo('#files');
              }
              $('#updateImage').show();
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    
    $('#updateImage').click(function(){
      var imageList = $('#files').serializeArray();
      var data = {};
      $.each(imageList, function(index, value){
          data[value.name] = value.value;
      });
      data['SKU'] = $('input[name="SKU"]').val();
      data[$('#token').attr('name')] = $('#token').val();
      $.ajax({
        url : '/product/update_image',
        type: 'POST',
        data: data,
        success: function() {
          console.log(arguments);
        }
      })
    });
});