<!--Glowne dane-->
$(document).ready(function(){
    getData();
});
setInterval(getData,1000);

function getData(){
    var data = $(this).serialize();;
    $.ajax({
        type: "POST",
        url: "php/returnjson.php",
        data: data,
        dataType: "json",
        success: function (data) {
            $('#temperatura').html(data.temperatura);
            $('#wilgotnosc').html(data.wilgotnosc);
            $('#cisnienie').html(data.cisnienie);
            $('#pylki').html(data.pm10);
            $('#aktualizacja').html(data.data);
        }
    })
}