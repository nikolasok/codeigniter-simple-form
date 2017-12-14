$(document).ready(function () {
    $(".submit").click(function (event) {
        event.preventDefault();
        $("#errors,#success").hide().empty();

        var succ_div  = $("#success");
        var err_div   = $("#errors");

        var city_id   = $("select#city_id").val();
        var street    = $("input#street").val();
        var house     = $("input#house").val();
        var apartment = $("input#apartment").val();

        if(validateForm(city_id, street, house, apartment)) {
            $.ajax({
                type: "POST",
                url: window.location.origin+ "/api/orders/store",
                dataType: 'json',
                data: {city_id: city_id, street: street, house: house, apartment: apartment},
                success: function (res) {
                    succ_div.show();
                    succ_div.append('<h5>' + res.title + '</h5>');
                    succ_div.append('<p>' + res.data.message + '</p>');
                },
                error: function (res) {
                    err_div.show();
                    err_div.append('<h5>' + res.responseJSON.title + '</h5>');
                    $.each(res.responseJSON.errors, function (index, value) {
                        err_div.append('<p>' + value + '</p>');
                    });
                }
            });
        }
    });

    $(".sendreq").click(function (event) {
        event.preventDefault();
        $("#errors,#success").hide().empty();

        var succ_div = $("#success");
        var err_div  = $("#errors");
        var city     = $("input#city").val();
        console.log(city);
        if(city) {
            $.ajax({
                type: "POST",
                url: window.location.origin+ "/api/cities/store",
                dataType: 'json',
                data: {city: city},
                success: function (res) {
                    succ_div.show();
                    succ_div.append('<h5>' + res.title + '</h5>');
                    succ_div.append('<p>' + res.data.message + '</p>');
                },
                error: function (res) {
                    err_div.show();
                    err_div.append('<h5>' + res.responseJSON.title + '</h5>');
                    $.each(res.responseJSON.errors, function (index, value) {
                        err_div.append('<p>' + value + '</p>');
                    });
                }
            });
        }else{
            err_div.show();
            $("#errors").append('<h5>Ошибка!</h5>');
            $("#errors").append('<p>Поле "Город" должно быть заполено!</p>');
        }
    });

});

function isNaturalNumber(n) {
    n = n.toString();
    var n1 = Math.abs(n),
        n2 = parseInt(n, 10);
    return !isNaN(n1) && n2 === n1 && n1.toString() === n && n1>0;
}

function validateForm(house, city_id, street, apartment) {
    var response = true;
    if(!house || !city_id || !street || !apartment || !isNaturalNumber(apartment)) {
        $("#errors").append('<h5>Ошибка!</h5>');
        if (!house) {
            $("#errors").append('<p>Поле "Дом" должно быть заполено!</p>');
            response = false;
        }
        if (!city_id) {
            $("#errors").append('<p>Поле "Город" должно быть заполено!</p>');
            response = false;
        }
        if (!street) {
            $("#errors").append('<p>Поле "Улица" должно быть заполено!</p>');
            response = false;
        }
        if (!apartment) {
            $("#errors").append('<p>Поле "Квартира" должно быть заполено!</p>');
            response = false;
        }
        if (!isNaturalNumber(apartment)) {
            $("#errors").append('<p>В поле "Квартира" должно быть число!</p>');
            response = false;
        }
        $("#errors").show();
    }
    return response;
}