$(document).ready(function() {
    $("#upload_multi").on('submit', function() {
        // var data = new FormData(this);
        var inputFile = $('#file');
        var fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            // alert(fileToUpload.length);
            var formData = new FormData();
            for (var i = 0; i < fileToUpload.length; i++) {
                var file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: '?mod=product&action=process_upload',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function(data) {
                    $("#result").html(data);
                    // console.log(data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        //alert('ok');
        return false;
    });
});