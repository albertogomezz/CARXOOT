
function validate_numero_licencia(texto){
    if (texto.length > 0){
        var reg=/[A-Z0-9]{10}/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_marca(texto){
    if (texto.length > 0){
        var reg = /Ford||Audi||Volkswagen||BMW||Peugeot||Renault||Mercedes||Nissan||Seat/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_modelo(texto){
    if (texto.length > 0){
        var reg= /[a-zA-Z0-9]/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_matricula(texto){
    if (texto.length > 0){
        var reg= /[0-9]{4}[A-Z]{3}/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_km(texto){
    if (texto.length > 0){
        var reg= /^[0-9]*$/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_categoria(texto){
    if (texto.length > 0) {
        return true;
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_tipo(texto){
    if (texto.length > 0) {
        return true;
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

// function validate_comentarios(texto) {
//     if (texto.length > 0) {
//         return true;
//     }
//     return false;
// }

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_fecha_de_alta(texto) {
    if (texto.length > 0) {
        return true;
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_color(texto){
    if (texto.length > 0){
        var reg= /Rojo||Negro||Gris||Azul||Verde||Amarillo||Blanco||Marrón/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_extras(array){
    var i;
    var ok=0;
    for(i=0; i<array.length;i++){
        if(array[i].checked){
            ok=1
        }
    }
 
    if(ok==1){
        return true;
    }
    if(ok==0){
        return false;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_imagen_coche(texto){
    if (texto.length > 0){
        var reg= /.jpg$/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_precio(texto){
    if (texto.length > 0){
        var reg= /^[0-9]*$/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_puertas(texto){
    if (texto.length > 0){
        var reg= /[2-5]{1}/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_ciudad(texto){
    if (texto.length > 0){
        var reg= /Valencia||Alicante||Castellón/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_latitud(texto){
    if (texto.length > 0){
        var reg= /^[\-\+]?((0|([1-8]\d?))(\.\d{1,10})?|90(\.0{1,10})?)$/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////

function validate_longitud(texto){
    if (texto.length > 0){
        var reg= /^[\-\+]?(0(\.\d{1,10})?|([1-9](\d)?)(\.\d{1,10})?|1[0-7]\d{1}(\.\d{1,10})?|180\.0{1,10})$/;
        return reg.test(texto);
    }
    return false;
}

////////////////////////////////////////////////////////////////////////////////////////////////////
// function validate_idioma(array){
//     var check=false;
//     for ( var i = 0, l = array.options.length, o; i < l; i++ ){
//         o = array.options[i];
//         if ( o.selected ){
//             check= true;
//         }
//     }
//     return check;
// }

// function validate_aficion(array){
//     var i;
//     var ok=0;
//     for(i=0; i<array.length;i++){
//         if(array[i].checked){
//             ok=1
//         }
//     }
 
//     if(ok==1){
//         return true;
//     }
//     if(ok==0){
//         return false;
//     }

function validate(op){
    // console.log('hola validate js');
    // return false;

    var check=true;

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    
    var v_numero_licencia=document.getElementById('numero_licencia').value;
    // console.log(v_numero_licencia);
    // return false;
    var v_marca=document.getElementById('marca').value;
    // console.log(v_marca);
    // return false;
    var v_modelo=document.getElementById('modelo').value;
    // console.log(v_modelo);
    // return false;
    var v_matricula=document.getElementById('matricula').value;
    // console.log(v_matricula);
    // return false;
    var v_km=document.getElementById('km').value;
    // console.log(v_km);
    // return false;
    var v_categoria=document.getElementById('categoria[]');
    // console.log(v_categoria);
    // return false;
    var v_tipo=document.getElementById('tipo[]');
    // console.log(v_tipo);
    // return false;
    // var v_comentarios = document.getElementById('comentarios').value;
    // console.log(v_comentarios);
    // return false;
    var v_fecha_de_alta = document.getElementById('fecha_de_alta').value;
    // console.log(v_fecha_de_alta);
    // return false;
    var v_color=document.getElementById('color').value;
    // console.log(v_color);
    // return false;
    var v_extras=document.getElementsByName('extras[]');
    // console.log(v_extras);
    // return false;
    var v_imagen_coche=document.getElementById('imagen_coche').value;
    // console.log(v_imagen_coche);
    // return false;
    var v_precio=document.getElementById('precio').value;
    // console.log(v_precio);
    // return false;
    var v_puertas=document.getElementById('puertas').value;
    // console.log(v_puertas);
    // return false;
    var v_ciudad=document.getElementById('ciudad').value;
    // console.log(v_ciudad);
    // return false;
    var v_latitud=document.getElementById('latitud').value;
    // console.log(v_latitud);
    // return false;
    var v_longitud=document.getElementById('longitud').value;
    // console.log(v_longitud);
    // return false;

    // return false;
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    var r_numero_licencia=validate_numero_licencia(v_numero_licencia);
    // console.log(r_numero_licencia);
    // return false;
    var r_marca=validate_marca(v_marca);
    // console.log(r_marca);
    // return false;
    var r_modelo=validate_modelo(v_modelo);
    // console.log(r_modelo);
    // return false;
    var r_matricula=validate_matricula(v_matricula);
    // console.log(r_matricula);
    // return false;
    var r_km=validate_km(v_km);
    // console.log(r_km);
    // return false;
    var r_categoria=validate_categoria(v_categoria);
    // console.log(r_categoria);
    // return false;
    var r_tipo=validate_tipo(v_tipo);
    // console.log(r_tipo);
    // return false;
    // var r_comentarios = validate_comentarios(v_comentarios);
    // console.log(r_comentarios);
    // return false;
    var r_fecha_de_alta = validate_fecha_de_alta(v_fecha_de_alta);
    // console.log(r_fecha_de_alta);
    // return false;
    var r_color=validate_color(v_color);
    // console.log(r_color);
    // return false;
    var r_extras=validate_extras(v_extras);
    // console.log(r_extras);
    // return false;
    var r_imagen_coche=validate_imagen_coche(v_imagen_coche);
    // console.log(r_imagen_coche);
    // return false;
    var r_precio=validate_precio(v_precio);
    // console.log(r_precio);
    // return false;
    var r_puertas=validate_puertas(v_puertas);
    // console.log(r_puertas);
    // return false;
    var r_ciudad=validate_ciudad(v_ciudad);
    // console.log(r_ciudad);
    // return false;
    var r_latitud=validate_latitud(v_latitud);
    // console.log(r_latitud);
    // return false;
    var r_longitud=validate_longitud(v_longitud);
    // console.log(r_longitud);
    // return false;

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_numero_licencia){
        document.getElementById('error_numero_licencia').innerHTML = " * El numero de licencia introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_numero_licencia').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_marca){
        document.getElementById('error_marca').innerHTML = " * No hay ninguna marca con ese nombre";
        check=false;
    }else{
        document.getElementById('error_marca').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_modelo){
        document.getElementById('error_modelo').innerHTML = " * El modelo no es valido";
        check=false;
    }else{
        document.getElementById('error_modelo').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_matricula){
        document.getElementById('error_matricula').innerHTML = " * El numero de matricula introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_matricula').innerHTML = "";
    }
     ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_km){
        document.getElementById('error_km').innerHTML = " * Cantidad invalida de km";
        check=false;
    }else{
        document.getElementById('error_km').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_categoria){
        document.getElementById('error_categoria').innerHTML = " * Debes seleccionar una categoria";
        check=false;
    }else{
        document.getElementById('error_categoria').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_tipo){
        document.getElementById('error_tipo').innerHTML = " * Debes seleccionar el tipo";
        check=false;
    }else{
        document.getElementById('error_tipo').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    // if (!r_comentarios) {
    //     document.getElementById('error_comentarios').innerHTML = " * No has rellenado el campo de comentarios";
    //     check = false;
    // } else {
    //     document.getElementById('error_comentarios').innerHTML = "";
    // }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if (!r_fecha_de_alta) {
        document.getElementById('error_fecha_de_alta').innerHTML = " * No has introducido ninguna fecha";
        check = false;
    } else {
        document.getElementById('error_fecha_de_alta').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_color){
    //     console.log(r_color);
    // return false;
        document.getElementById('error_color').innerHTML = " * El color introducido no es valido";
        check=false;
    }else{
        document.getElementById('error_color').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_extras){
        document.getElementById('error_extras').innerHTML = " * Debes seleccionar almenos 1 extra";
        check=false;
    }else{
        document.getElementById('error_extras').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_imagen_coche){
        document.getElementById('error_imagen_coche').innerHTML = " * Formato inadecuado";
        check=false;
    }else{
        document.getElementById('error_imagen_coche').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_precio){
        document.getElementById('error_precio').innerHTML = " * Debe indicar el tipo de moneda";
        check=false;
    }else{
        document.getElementById('error_precio').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_puertas){
        document.getElementById('error_puertas').innerHTML = " * Numero de puertas invalido";
        check=false;
    }else{
        document.getElementById('error_puertas').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_ciudad){
        document.getElementById('error_ciudad').innerHTML = " * Nombre de ciudad invalida";
        check=false;
    }else{
        document.getElementById('error_ciudad').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_latitud){
        document.getElementById('error_latitud').innerHTML = " * Coordenadas de latitud invalidas";
        check=false;
    }else{
        document.getElementById('error_latitud').innerHTML = "";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if(!r_longitud){
        document.getElementById('error_longitud').innerHTML = " * Coordenadas de longitud invalidas";
        check=false;
    }else{
        document.getElementById('error_longitud').innerHTML = "";
    }

    //     console.log('hola validate js');
    // return false;

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    if (check){
        if (op == 'create'){
            document.alta_coche.submit();
            document.alta_coche.action = "index.php?page=controller_car&op=create";
        }
        if (op == 'update'){
            document.update_coche.submit();
            document.update_coche.action = "index.php?page=controller_car&op=update";
        }
    }
}
function operations_coche(op) {

    if (op == 'delete'){

        // console.log('hola validate js');
        // return false;

        document.delete_coche.submit();
        document.delete_coche.action = "index.php?page=controller_car&op=delete";
        // console.log('hola validate js');
        // return false;
    }
    if (op == 'delete_all'){
        document.delete_all_coches.submit();
        document.delete_all_coches.action = "index.php?page=controller_car&op=delete_all";
    }
    if (op == 'dummies'){
        document.dummies_cars.submit();
        document.dummies_cars.action = "index.php?page=controller_car&op=dummies";
    }
}

// $(document).ready(function () {
//     // console.log('hola');

//     $('.coche').click(function () {
//         var id = this.getAttribute('id');
//         //alert(id);
//         // console.log(id);

//         $.get("module/coche/controller/controller_car.php?op=read_modal&modal=" + id, 
//         function (data, status) {
//             var json = JSON.parse(data);
//             // console.log(json);
            
//             if(json === 'error') {
//                 //console.log(json);
//                 //pintar 503
//                 window.location.href='index.php?page=503';
//             }else{
//                 console.log(json.coche);
//                 $("#numero_licencia").html(json.numero_licencia);
//                 $("#marca").html(json.marca);
//                 $("#modelo").html(json.modelo);
//                 $("#matricula").html(json.matricula);
//                 $("#km").html(json.km);
//                 $("#categoria").html(json.categoria);
//                 $("#tipo").html(json.tipo);
//                 $("#comentarios").html(json.comentarios);
//                 $("#fecha_de_alta").html(json.fecha_de_alta);
//                 $("#color").html(json.color);
//                 $("#extras").html(json.extras.replaceAll(':',' '));
//                 $("#imagen_coche").html(json.imagen_coche);
//                 $("#puertas").html(json.puertas);
//                 $("#ciudad").html(json.ciudad);
//                 $("#latitud").html(json.latitud);
//                 $("#longitud").html(json.longitud);
     
//                 $("#detalles_coche").show();
//                 $("#coche_modal").dialog({
//                     width: 850, //<!-- ------------- ancho de la ventana -->
//                     height: 500, //<!--  ------------- altura de la ventana -->
//                     //show: "scale", <!-- ----------- animación de la ventana al aparecer -->
//                     //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
//                     resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
//                     //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
//                     modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
//                     buttons: {
//                         Ok: function () {
//                             $(this).dialog("close");
//                         }
//                     },
//                     // show: {
//                     //     effect: "blind",
//                     //     duration: 1000
//                     // },
//                     hide: {
//                         effect: "explode",
//                         duration: 1000
//                     }
//                 });
//             }//end-else
//         });
//     });
// });

function showModal(title_Car, id) {
    $("#detalles_coche").show();
    $("#coche_modal").dialog({
        title: title_Car,
        width : 850,
        height: 500,
        resizable: "false",
        modal: "true",
        hide: "fold",
        show: "fold",
        buttons : {
            Update: function() {
                        window.location.href = 'index.php?page=controller_car&op=update&id=' + id;
                    },
            Delete: function() {
                        window.location.href = 'index.php?page=controller_car&op=delete&id=' + id;
                    }
        }
    });
}

function loadContentModal() {
    $('.coche').click(function () {

        var id = this.getAttribute('id');
        ajaxPromise('module/coche/controller/controller_car.php?op=read_modal&modal=' + id, 'GET', 'JSON')
        .then(function(data) {
            // var data = JSON.parse(data);
            $('<div></div>').attr('id', 'detalles_coche', 'type', 'hidden').appendTo('#coche_modal');
            $('<div></div>').attr('id', 'container').appendTo('#detalles_coche');
            $('#container').empty();
            $('<div></div>').attr('id', 'contenido_coche').appendTo('#container');
            $('#contenido_coche').html(function() {
                var content = "";
                for (row in data) {
                    content += '<br><span>' + row + ': <span id =' + row + '>' + data[row] + '</span></span>';
                }
                return content;
                });
                showModal(title_car = data.brand + " " + data.model, data.id);
        })
        .catch(function() {
            window.location.href = 'index.php?module=errors&op=503&desc=List error';
        });
    });
 }

 $(document).ready(function() {
    loadContentModal();
});