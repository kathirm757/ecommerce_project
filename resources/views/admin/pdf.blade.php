<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Order Details  </h1>


    Customer Name:<h1> {{$order->name}} </h1>

    Customer Email:<h1> {{$order->email}}  </h1>

    Customer Phone:<h1> {{$order->phone}} </h1>

    Customer Addresss:<h1> {{$order->address}}  </h1>

    Customer Id:<h1>{{$order->user_id}}   </h1>

    Product Name:<h1> {{$order->product_title}}  </h1>

    Product price:<h1>{{$order->price}}  </h1>

    Product Quantity:<h1> {{$order->quantity}}  </h1>

    payment status:<h1> {{$order->payment_status}} </h1>

    Product  Id:<h1> {{$order->delivery_status}}  </h1>


    <br><br>

   

    <img src="{{ public_path("product/images/".$order->image) }}" alt="" style="width: 150px; height: 150px;">    








</body>
</html>