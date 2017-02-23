function unploadFile() {
    var blobFile =$('filechooser').files[0];
    var formData = new FormData();
    formData.append("fileToUpload", blobFile);

    $.ajax({
        url: "upload.php",
        type: "POST",
        data: fd,
        processData: false,
        contentType: false,
        success: function(response) {
        },
        error: function(jqXHR, textStatus, errorMessage){
            console.log(errorMessage);

        }
    });
}


