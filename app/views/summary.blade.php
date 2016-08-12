<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

 

</head>
<body>

<div class="summary-container">
    <h1>Purchased</h1>
    
    <table class="cart-table">
            <tr>
                <td>Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Total</td>
                
            </tr>

            @foreach($cart_products as $cart_item)
            <tr>
                <td>{{$cart_item->Products->name}}</td>
                <td>{{$cart_item->quantity}}</td>
                <td>{{$cart_item->Products->price}}</td>
                <td>{{$cart_item->total}}</td>
                <td>
               

                </td>
            </tr>


            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>{{$cart_total}}</td>
                <td></td>

            </tr>
    </table>

</div>
<div>
    <p class="message">Thank you for your order</p>
    </form>
</div>



</body>
</html>

