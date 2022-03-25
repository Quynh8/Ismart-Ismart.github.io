$(document).ready(function(){
    $(".num-order").change(function(){
        // cập nhật thằng nào lấy id của th đó cập nhật
        var id = $(this).attr('data-id');//lấy phương thức val thì chỉ lấy khi làm việc trong form
        var qty =$(this).val();//những phần làm việc với html bình thườn thì làm việc với pt text
        var max = $(this).attr("max");
        //thuật toán ở đây là kiểm tra nếu số lượng đặt hàng vượt quá số lượng sp có trong kho thì phải tb cho ng mua
        if(qty > max){
            alert("Hiện chỉ còn " + max + " sản phẩm");
        }
        var data ={id:id,qty:qty};
        // console.log("đã thay đổi");
        $.ajax({
            url:'?mod=cart&action=update_ajax',//Trang xử lý,mặc định trang hiện tại
            method:'POST',//POST hoặc Get mặc định là get
            data:data,//dữ liệu truyền lên server
            dataType:'json',//html,text,script,hoặc json
            success:function(data){
                //sau khi lấy dữ liệu từ trên server xuống theo phương thức POST hoặc GET
                //ta echo bên file process.php và sau đó dữ liệu sẽ truyền vào  data trong success
                //xử lý dữ liệu trả về
               $("#sub-total-"+id).text(data.sub_total);
               $("#total-price span").text(data.total);
               $(".total-price .price").text(data.total);
               $("span #num-fake").text(data.num_order);
               $("#num").text(data.num_order);
               
               $(".info .qty span.qty-" +id).text(data.qty);
               $(".info .sub-total-" + id).text(data.sub_total);
               $("#dropdown p.desc span").text(data.num_order);
            },
            error:function(xhr,ajaxOptions,thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
    
//xử lý filter lọc sản phẩm theo mức giá
$(".filter").click(function(){
    var val_filter = $(this).attr("data-filter");
    var type = $(this).attr("data-type");
    var id = $(this).attr("data-id");
    var data={
        val_filter:val_filter,
        type:type,
        id:id
    }
    $.ajax({
        url:'?mod=product&action=filter_product',
        method:'POST',//POST hoặc Get mặc định là get
        data:data,//dữ liệu truyền lên server
        dataType:'html',//html,text,script,hoặc json
        success:function(data){
            //sau khi lấy dữ liệu từ trên server xuống theo phương thức POST hoặc GET
            
            //xử lý dữ liệu trả về
            $(".product-ajax").html(data);
        },
        error:function(xhr,ajaxOptions,thrownError){
            alert(xhr.status);
            alert(thrownError);
        }
    });
});


});