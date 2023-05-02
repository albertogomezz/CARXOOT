
function load_cart(){

    var token = localStorage.getItem('token');

        // console.log("estoy logeado");
        ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=load_cart" , 'POST', 'JSON', {'token': token })
        .then(function(data) { 

            var precio_total = 0;

            for (row in data) {

                var precio_total_individual = data[row].price * data[row].qty;

                $(".cart__products").append(
                    
                        '<div class="basket-product">' +
                            '<div class="item">' +
                                '<div class="product-image">' +
                                    '<img src="' + data[row].img_car + '"alt="Placholder Image 2" class="product-frame">' +
                                '</div>' +
                                '<div class="product-details">' +
                                    '<h1><strong><span class="item-quantity"></span>' + data[row].name_brand + '</strong>' + ' ' + data[row].name_model  + '</h1>' +
                                    '<p><strong>' + data[row].num_plate  + '</strong></p> ' +
                                    '<p>Product Code - ' + data[row].vin_num + '</p>' +
                                '</div>' +
                            '</div>' +
                            '<div class="price">' + data[row].price + '€' + '</div>' +
                            '<div class="quantity">' +

                                '<button id="' + data[row].id_car + '" class="restar_qty"><</button>' +
                                '<input value="' + data[row].qty +'"class="quantity-field">' +
                                '<button id="' + data[row].id_car + '" class="sumar_qty">></button>' +

                            '</div>' +
                            '<div class="subtotal">' + precio_total_individual + '€' + '</div>' +
                            '<div class="remove">' +
                                '<button id="' + data[row].id_car + '" class="button__remove">Remove</button>' +
                            '</div>' +

                        '</div>'
                )
                var precio_total = precio_total + precio_total_individual;
            }
            
            $(".checkout").append(
                    
                '<aside>' +
                    '<div class="summary">' +
                        '<div class="summary-total-items"><span class="total-items"></span>Items in your Bag</div>' +
                        '<div class="summary-subtotal">' +
                        // '<div class="subtotal-title">Total</div>' +
                        // '<div class="subtotal-value final-value" id="basket-subtotal">' + precio_total + '</div>' +
                        '<div class="summary-promo hide">' +
                            '<div class="promo-title">Promotion</div>' +
                            '<div class="promo-value final-value" id="basket-promo"></div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="summary-delivery">' +
                        '<select name="delivery-collection" class="summary-delivery-selection">' +
                            '<option value="0" selected="selected">Select Collection or Delivery</option>' +
                            '<option value="collection">Collection</option>' +
                            '<option value="first-class">Royal Mail 1st Class</option>' +
                            '<option value="second-class">Royal Mail 2nd Class</option>' +
                            '<option value="signed-for">Royal Mail Special Delivery</option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="summary-total">' +
                        '<div class="total-title">Total</div>' +
                        '<div class="total-value final-value" id="basket-total">' + precio_total  + '</div>' +
                        '</div>' +
                        '<div class="summary-checkout">' +
                            '<button class="comprar">Comprar</button>' +
                        '</div>' +
                    '</div>' +
                '</aside>'
            )
        }).catch(function() {
            window.location.href = 'index.php?page=error503'
        }); 
}

function remove_cart(){
    $(document).on('click','.button__remove',function () {

        var id_car = this.getAttribute('id');
        var token = localStorage.getItem('token');

        ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=delete_cart" , 'POST', 'JSON', { 'id_car': id_car, 'token': token })
            .then(function(data) { 
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });  
            location.reload();
    });
}

function change_qty(){

    $(document).on('click','.sumar_qty',function () {

        var id_car = this.getAttribute('id');
        var token = localStorage.getItem('token');

        ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=sumar_qty" , 'POST', 'JSON', { 'id_car': id_car, 'token': token })
        .then(function(data) { 
            console.log(data);
        }).catch(function() {
            window.location.href = 'index.php?page=error503'
        });   
        location.reload();
    });

    $(document).on('click','.restar_qty',function () {

        var id_car = this.getAttribute('id');
        var token = localStorage.getItem('token');

        ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=restar_qty" , 'POST', 'JSON', { 'id_car': id_car, 'token': token })
        .then(function(data) { 
            console.log(data);
        }).catch(function() {
            window.location.href = 'index.php?page=error503'
        });   
        location.reload();
    });
}

function checkout(){

    $(document).on('click','.comprar',function () {

        var token = localStorage.getItem('token');

            ajaxPromise("module/cart/ctrl/ctrl_cart.php?op=checkout"  , 'POST', 'JSON', {'token': token})
            .then(function(data) { 
                // console.log(data);
            }).catch(function() {
                window.location.href = 'index.php?page=error503'
            });
            toastr.success("Pedido Realizado");

            // location.reload();
            setTimeout(' window.location.href = "index.php?page=ctrl_home&op=list"; ', 1000);
            // window.location.href = 'index.php?page=ctrl_home&op=list'
    });
}

$(document).ready(function(){

    load_cart();
    remove_cart();
    change_qty();
    checkout();
});