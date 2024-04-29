<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
   <style> 
   
   .center{

    margin:auto;
  width: 50%;
  border:2px solid white;
  text-align: center;
  margin-top: 40px;

   }

   table,th,td{

        border: 1px solid white;

   }
   
   .th_deg
   {

       background-color: skyblue;
       padding: 5px;
       font-size: 20px;


   }
   </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


          <div style="padding-left: 400px; padding-bottom: 30px;">
    <form action="{{url('search')}}" method="get" >

    <input type="text" style="color: black;" name="search" placeholder="Search for Something">
    <input type="submit" value="Search" class="btn btn-primary">

    </form>


          </div>


        <table class="center">
            <tr>

             <th class="th_deg">Name</th>
             <th class="th_deg" >Phone</th>
             <th class="th_deg">Email</th>
             <th class="th_deg">Address</th>
             <th class="th_deg"> Title</th>
             <th class="th_deg">Quantity</th>
             <th class="th_deg">Price</th>
             <th class="th_deg">payment status</th>
             <th class="th_deg">delivery status</th>
             <th class="th_deg">Image</th>
             <th class="th_deg">Action</th>

            </tr>

         @forelse($order as $order)
            <tr>

              <td>{{$order->name}}</td>
              <td>{{$order->email}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->address}}</td>
              
              <td>{{$order->product_title}}</td>
              <td>{{$order->quantity}}</td>
              <td>{{$order->price}}</td>
              <td>{{$order->payment_status}}</td>
              <td>{{$order->delivery_status}}</td>
              <td><img class="img_size" src="product\{{$order->image}}" alt="image"></td>
              @if($order->delivery_status =='proccesing')
              <td><a  onclick=" return confirm('Are you sure to Delevery');" href="{{url('/update_order',$order->id)}}" class="btn btn-success">Delevery</a></td>


              @else

<td>Deleveried</td>






               @endif

               <td><a class="btn btn-primary" href="{{url('print_pdf',$order->id)}}">Print Pdf</a></td>

            </tr>

            @empty

             <tr>

            <td  colspan="16"> No data found</td>

  </tr>

   


     @endforelse
        </table>
       
        </div></div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>