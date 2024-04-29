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

<style type="text/css">

.center{

  margin:auto;
  width: 50%;
  border:2px solid white;
  text-align: center;
  margin-top: 40px;

}
.font_style
{

text-align: center;
font-size: 40px;
padding-top: 30px;

}

.img_size
{

    width: 250px;
    height: 250px;

}
.th_color
{

background-color: skyblue;


}
.th_deg
{

padding: 30px;


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
           <h1 class="font_style"> All Products </h1>

          <table class="center">

         <tr class="th_color">
      <td class="th_deg">Product Title</td>
      <td class="th_deg">Description</td>
      <td class="th_deg"  >Quantity</td>
      <td class="th_deg">Catagory</td>
      <td class="th_deg">Price</td>
      <td class="th_deg">Discount Price</td>
      <td class="th_deg">Product Image</td>
      <td class="th_deg">Action</td>

    </tr>
   @foreach($product as $data)
    <tr>
      <td >{{$data->title}}</td>
      <td>{{$data->description}}</td>
      <td>{{$data->quantity}}</td>
      <td>{{$data->catagory}}</td>
      <td>{{$data->price}}</td>
      <td>{{$data->discount_price}}</td>
      <td><img class="img_size" src="product\{{$data->image}}" alt="image"></td>
      <td><a  onclick="return confirm('Are  you sure to delete')" href="{{url('/delete_product',$data->id)}}" class="btn btn-danger">Delete</a></td>
      <td><a   href="{{url('/update_product',$data->id)}}" class="btn btn-success">Edit</a></td>

    </tr>
@endforeach

         </table>

</div>
        </div>
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