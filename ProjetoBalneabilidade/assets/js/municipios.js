jQuery(document).ready(function($) {

    $.ajax({
        type: "GET",
        url: "ima.php",
        dataType: "json",
        contentType: 'application/json',
        data: {id : '25'},
        success: function (result) {
            console.log(result)
        }
    });
});