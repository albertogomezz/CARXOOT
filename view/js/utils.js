function ajaxPromise(sUrl, sType, sTData, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            dataType: sTData,
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        });
    });
}

function load_menu() {

    var token = localStorage.getItem('token');

    if (token) {
        ajaxPromise('module/login/ctrl/ctrl_login.php?op=data_user', 'POST', 'JSON', { 'token': token })
            .then(function(data) {
                if (data.type_user == "client") {
                    console.log("Client loged");
                    $('.opc_CRUD').empty();
                    $('.opc_exceptions').empty();
                    $('.buton_login').empty();
                } else {
                    console.log("Admin loged");
                    $('.opc_CRUD').show();
                    $('.opc_exceptions').show();
                }
                $('.log-icon').empty();
                $('#user_info').empty();

                $('<img class="img_avatar" src="' + data.avatar + '"alt="Robot">').appendTo('.log-icon');

                $('<p></p>').attr({ 'id': 'user_info' }).appendTo('#des_inf_user')
                    .html(
                        '<a>' + data.username + '<a/>'
                    )

                $('<p></p>').attr({ 'id': 'user_info' }).appendTo('.boton_logout')
                    .html(
                        '<a type="button" id="logout"><i id="icon-logout" class="fa-solid fa-right-from-bracket"></i>Logout</a>'
                    )

                // $('<a id="button_cart" href="index.php?page=ctrl_cart&op=view"><i class="fa-solid fa-cart-shopping fa-2xl carrito"></i></a>').appendTo('.shop_cart')
            }).catch(function() {
                console.log("Error al cargar los datos del user");
            });
    } else {
        console.log("No hay token disponible");
        $('.opc_CRUD').empty();
        $('.opc_exceptions').empty();
        $('#user_info').hide();
        $('.log-icon').empty();
        $('<a href="index.php?page=ctrl_login&op=login-register_view"><i id="col-ico"></i></a>').appendTo('.log-icon');
        $('#button_cart').hide();
    }
}


function click_logout() {
    $(document).on('click', '#logout', function() {
        localStorage.removeItem('total_prod');
        toastr.success("Logout succesfully");
        setTimeout('logout(); ', 1000);
    });
}

function logout() {
    ajaxPromise('module/login/ctrl/ctrl_login.php?op=logout', 'POST', 'JSON')
        .then(function(data) {
            localStorage.removeItem('token');
            window.location.href = "index.php?page=ctrl_home&op=list";
        }).catch(function() {
            console.log('Something has occured');
        });
}

function click_shop() {
    $(document).on('click', '#opc_shop', function() {
        localStorage.removeItem('page');
        localStorage.removeItem('total_prod');
    });
}

function load_cart(){

    var token = localStorage.getItem('token');

    if(token){

    }else{
        // window.location.href = 'index.php?page=ctrl_login&op=login-register_view'
        // $('#button_cart').empty();
        // $('<a href="index.php?page=ctrl_cart&op=view"></i></a>').appendTo('#button_cart');
    }
}

$(document).ready(function() {
    // load_cart();
    load_menu();
    click_logout();
    click_shop();
});