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
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />



    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/admin-2/css/bootstrap.min.css">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="/admin-2/css/fontawesome.min.css">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="/admin-2/css/ionicons.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/admin-2/css/animate.min.css">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="/admin-2/css/owl.carousel.min.css">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="/admin-2/css/jquery-ui-range-slider.min.css">
    <!-- Utility -->
    <link rel="stylesheet" href="/admin-2/css/utility.css">
    <!-- Main -->
    <link rel="stylesheet" href="/admin-2/css/bundle.css">
    <style>
        .zoom-area #gallery a{
            height: 90px;
        }
    </style>

    <style>

        .item-counter {
            font-size: 10px;
            line-height: 18px;
            width: 18px;
            left: unset;
            top: 8px;
            right: 180px;

        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead style="background-color: white;">
            <tr>
                <th> # </th>
                <th> Product Name </th>
                <th> Quantity </th>
                <th> Payment Status </th>
                <th> Delivery Status </th>
                <th> Image </th>
                <th> Price </th>
                <th> Cancel Order </th>
            </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                   <tr>
                       <td>{{$loop->iteration}} </td>
                       <td>{{$order->product_name}}</td>
                       <td>{{$order->quantity}}</td>
                       <td>{{$order->payment_status}}</td>
                       <td>
                           @if($order->delivery_status=='Processing')
                               <label class="badge badge-danger p-2">{{$order->delivery_status}}</label>
                           @else
                               <label class="badge badge-success p-2">{{$order->delivery_status}}</label>
                           @endif
                       </td>
                       <td><img src="/product/{{$order->image}}" width="20px" height="20px" style="margin: auto"></td>
                       <td>$ {{$order->price}}</td>
                       <td>
                           @if($order->delivery_status=='Processing')
                               <a  href="{{route('cancel_order',$order->id)}}" class="btn btn-outline-danger btn-icon-text"> Cancel Order</a>
                           @else
                               <h6>Not Allowed</h6>
                           @endif
                       </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>








</div>




@include('home.cart')
<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>




<!-- Modernizr-JS -->
<script type="text/javascript" src="/admin-2/js/vendor/modernizr-custom.min.js"></script>
<!-- NProgress -->
<script type="text/javascript" src="/admin-2/js/nprogress.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="/admin-2/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Popper -->
<script type="text/javascript" src="/admin-2/js/popper.min.js"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="/admin-2/js/jquery.scrollUp.min.js"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="/admin-2/js/jquery.elevatezoom.min.js"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="/admin-2/js/jquery-ui.range-slider.min.js"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="/admin-2/js/jquery.slimscroll.min.js"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="/admin-2/js/jquery.resize-select.min.js"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="/admin-2/js/jquery.custom-megamenu.min.js"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="/admin-2/js/jquery.custom-countdown.min.js"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="/admin-2/js/owl.carousel.min.js"></script>
<!-- Main -->
<script type="text/javascript" src="/admin-2/js/app.js"></script>
</body>
</html>

