$(document).ready(function () {

    $('.increment-btn').click(function (e) {

        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10 )
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {

        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1 )
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.addToCart').click(function (e) {

        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var product_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "function/handlecart.php",
            data: {
                'product_id': product_id,
                'product_qty': qty,
                'scope': "add"
            },
            success: function(response){

                if(response == 201)
                {
                    alertify.success('Product Added To Cart');
                }
                else if(response == "already")
                {
                    alertify.success('Product is already in cart');
                }
                else if(response == 401)
                {
                    alertify.success('Login to continue');
                }
                else if(response == 500)
                {
                    alertify.success('Something went wrong');
                }
            }

          });
    });

});