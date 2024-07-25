<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Products</h1>
    <div class="product">
        <p>Product 1 - $10</p>
        <button class="add-to-cart" data-id="1" data-name="Product 1" data-price="10">Add to Cart</button>
    </div>
    <div class="product">
        <p>Product 2 - $15</p>
        <button class="add-to-cart" data-id="2" data-name="Product 2" data-price="15">Add to Cart</button>
    </div>
    
    <h2>Cart</h2>
    <div id="cart"></div>
    <div id="total"></div>
    <div id="message"></div>
    <button id="clear-cart">Clear Cart</button>

    <script>
        $(document).ready(function() {
            function updateCart(response) {
                var cartContent = '<ul>';
                $.each(response.cart, function(index, item) {
                    cartContent += '<li>' + item.name + ' - $' + item.price + ' x <input type="number" class="update-quantity" data-id="' + item.id + '" value="' + item.quantity + '" min="1"> <button class="remove-from-cart" data-id="' + item.id + '">Remove</button></li>';
                });
                cartContent += '</ul>';
                $('#cart').html(cartContent);
                $('#total').html('<p>Total Items: ' + response.total_items + '</p><p>Total Price: $' + response.total_price + '</p>');
                $('#message').html('<p>' + response.message + '</p>');
            }

            $('.add-to-cart').click(function() {
                var productId = $(this).data('id');
                var productName = $(this).data('name');
                var productPrice = $(this).data('price');

                $.ajax({
                    url: 'cart.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'add',
                        id: productId,
                        name: productName,
                        price: productPrice
                    },
                    success: function(response) {
                        updateCart(response);
                    }
                });
            });

            $(document).on('click', '.remove-from-cart', function() {
                var productId = $(this).data('id');

                $.ajax({
                    url: 'cart.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'remove',
                        id: productId
                    },
                    success: function(response) {
                        updateCart(response);
                    }
                });
            });

            $(document).on('change', '.update-quantity', function() {
                var productId = $(this).data('id');
var quantity = $(this).val();

                $.ajax({
                    url: 'cart.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'update',
                        id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        updateCart(response);
                    }
                });
            });

            $('#clear-cart').click(function() {
                $.ajax({
                    url: 'cart.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'clear'
                    },
                    success: function(response) {
                        updateCart(response);
                    }
                });
            });
        });
    </script>
</body>
</html>