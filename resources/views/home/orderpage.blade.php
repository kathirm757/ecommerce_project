<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>

  .center{

    margin:auto;
    width:50%;
    text-align: center;
    padding: 30px;

  }


  table,th,td{

      border:1px solid black;

  }

  .th_deg
  {


    background-color: skyblue;
    
    padding: 5px;
   
    
  }
  .img_deg
  {

  height: 200px;
  width: 200px;

  }

  .total_deg
  {

    font-size: 20px;
    padding: 40px;
  }

      </style>
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         <!-- slider section -->
        
         <!-- end slider section -->

         @if(session()->has('message')) 
           <div class="alert alert-success">

           <button type="button" class="close" data-dismis="alert" aria-hidden="true">X</button>
           {{session()->get('message')}}

          </div>


           @endif
     
     <div class="center">

  <table>

    <tr>
     <th class="th_deg">Product Ttile</th>
     <th class="th_deg">Product Quantity</th>
     <th class="th_deg">Product Price</th>
     <th class="th_deg">Product Status</th>
     <th class="th_deg">Product Image</th>
     <th class="th_deg">Product Action</th>


    </tr>


    
    @foreach($orders as $orders)

    <tr>
     <th >{{$orders->product_title}}</th>
     <th >{{$orders->quantity}}</th>
     <th >{{$orders->price}}</th>
     <th >{{$orders->delivery_status}}</th>
     <th ><img class="img_deg" src="product/{{$orders->image}}"></th>
     @if($orders->delivery_status != 'Deleveried' && $orders->delivery_status != 'You Are removed')

     <th > <a onclick="return confirm('Are sure to Cancel')" href="{{url('remove_order',$orders->id)}}" class="btn btn-danger">Cancel</a></th>

     @else

     <th> Not alloweded<th>
     @endif
    </tr>

   

  @endforeach

  </table>



    

    




     </div>
      
      <!-- footer start -->
     
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>