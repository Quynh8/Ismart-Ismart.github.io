$(function () {
    var inputFile = $("#upload-thumb");
    $("#btn-upload-thumb").click(function (event) {
      var URI_single = $("#uploadFile #upload-thumb").attr("data-uri");
      var fileToUpload = inputFile[0].files[0];
      var formData = new FormData();
      formData.append("file", fileToUpload);
      console.log(URI_single);
      $.ajax({
        url: URI_single,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
          console.log(data);
          if (data.status == "ok") {
            showThumbUpload(data);
            var url = $("#thumbnail_url").val(data.file_path);
            // console.log(url);
          }
          if (data.status == "error") {
            console.log(data.error);
            $(".show_error").html(data.error.file);
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
      return false;
    });
  
    function showThumbUpload(data) {
      var items;
      items = '<img src="' + data.file_path + '"/>';
      $("#show_list_file").html(items);
    }
  });
  //////////////////////////////////////////////////
  $(function () {
    var inputFile = $("#upload-thumb");
    $("#btn-upload-thumb").click(function (event) {
      var URI_single = $("#uploadFile #upload-thumb").attr("data-uri");
      var fileToUpload = inputFile[0].files[0];
      var formData = new FormData();
      formData.append("file", fileToUpload);
      console.log(URI_single);
      $.ajax({
        url: URI_single,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
          console.log(data);
          if (data.status == "ok") {
            showThumbUpload(data);
            var url = $("#avatar").val(data.file_path);
            // console.log(url);
          }
          if (data.status == "error") {
            console.log(data.error);
            $(".show_error").html(data.error.file);
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
      return false;
    });
  
    function showThumbUpload(data) {
      var items;
      items = '<img src="' + data.file_path + '"/>';
      $("#show_list_file").html(items);
    }
  });
  //=================================================================
  $(document).ready(function () {
    $("#product_cat").change(function () {
      var id = $("#product_cat").val();
      var url = $("#product_cat").attr("data-uri");
      var data = { id: id };
  
      $.ajax({
        url: url,
        method: "POST",
        data: data,
        dataType: "html",
        success: function (data) {
          $("#trademark").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
    });
    
    $(window).load(function () {
      var id = $("#product_cat").val();
      var url = $("#product_cat").attr("data-uri");
      var data = { id: id };
  
      $.ajax({
        url: url,
        method: "POST",
        data: data,
        dataType: "html",
        success: function (data) {
          $("#trademark").html(data);
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
    });
    //=================UPLOAD MULTI==========================
    $("#bt_upload").click(function () {
      // var data = new FormData(this);
      var dataUri = $("#file").attr("data-uri");
      var inputFile = $("#file");
      var fileToUpload = inputFile[0].files;
      if (fileToUpload.length > 0) {
        // alert(fileToUpload.length);
        var formData = new FormData();
        for (var i = 0; i < fileToUpload.length; i++) {
          var file = fileToUpload[i];
          formData.append("file[]", file, file.name);
        }
        $.ajax({
          url: dataUri,
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "text",
          success: function (data) {
            $("#show_list_file_relative").html(data);
            // console.log(data);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          },
        });
      }
      //alert('ok');
      return false;
    });
  });
  //==========================XU LY KET NOI DANH MUC SAN PHAM VA TEN THUONG HIEU=============
  $(document).ready(function(){
    $("#product_cat").change(function(){
     //    Lấy giá trị:
     var product_cat_id = $(this).val();
     // Xử lý truyền -- nhận bằng Ajax
     if(product_cat_id==0){
         alert('Bạn cần chọn 1 Danh mục sản phẩm');
     }else{
         $.ajax({
             //Xu ly truyen
             url:'?mod=product&action=getTrademark',
             type:'POST',
             data:{id:product_cat_id},
             dataType:'json',
             //Xy ly gia tri tra ve
             success:function(res){
                 // var obj = $.parseJSON(res);
                 $("#trademark").empty();
                 
                 for(var i=0;i<res.length;i++){
                     var id = res[i]['id'];
                     var name = res[i]['name'];
                     $("#trademark").append("<option value='"+id+"'>"+name+"</option>");
                 }
             }
         })
     }
    })
 })

 // select-brand
$(document).ready(function(){
  $('.select-parent-cat').change(function(){
      var parent_cat = $(this).find(":selected").val();
      var data = {parent_cat: parent_cat};
      console.log(data);
      $.ajax({
          url: '?mod=product&controller=product_cat&action=select_brand',
          method: 'POST',
          data: data,
          dataType: 'text',
          success: function(data){
              $('.select-brand').html(data);
          },
          error: function (xhr, ajaxoptions, thrownError){
              alert(xhr.status);
              alert(thrownError);
          },
      });
  });
});
// select-type
$(document).ready(function(){
  $('.select-brand').change(function(){
      var type = $(this).find(":selected").val();
      var data = {type: type};
      console.log(data);
      $.ajax({
          url: '?mod=product&controller=product_cat&action=select_type',
          method: 'POST',
          data: data,
          dataType: 'text',
          success: function(data){
              $('.select-type').html(data);
          },
          error: function (xhr, ajaxoptions, thrownError){
              alert(xhr.status);
              alert(thrownError);
          },
      });
  });
});
