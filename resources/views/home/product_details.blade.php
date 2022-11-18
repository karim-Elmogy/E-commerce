<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <base href="/public">
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

    <div class="page-detail u-s-p-t-80" style="margin:  100px 0">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">




                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-zoom-area -->
                    <div class="zoom-area">
                        <img id="zoom-pro" class="img-fluid mb-5" src="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}" style="margin: auto" alt="Zoom Image">
                        <div id="gallery" class="u-s-m-t-10">
                            <a class="active" data-image="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}">
                                <img src="/product/{{$product->image}}" alt="/product/{{$product->image}}">
                            </a>
                            <a data-image="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}">
                                <img src="/product/{{$product->image}}" alt="/product/{{$product->image}}">
                            </a>
                            <a data-image="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}">
                                <img src="/product/{{$product->image}}" alt="/product/{{$product->image}}">
                            </a>
                            <a data-image="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}">
                                <img src="/product/{{$product->image}}" alt="/product/{{$product->image}}">
                            </a>
                            <a data-image="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}">
                                <img src="/product/{{$product->image}}" alt="/product/{{$product->image}}">
                            </a>
                            <a data-image="/product/{{$product->image}}" data-zoom-image="/product/{{$product->image}}">
                                <img src="/product/{{$product->image}}" alt="/product/{{$product->image}}">
                            </a>

                        </div>
                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">
                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    {{$product->name}}
                                </h1>
                            </div>
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="/">Home</a>
                                </li>
                                <li class="">
                                    <a href="#">{{$product->category->category_name}}</a>
                                </li>

                            </ul>
                            <div class="product-rating">
                                <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                    <span style='width:67px'></span><br>
                                </div>
                            </div>
                            <h6>Available Quantity : ({{$product->quantity}})</h6>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Description:</h6>
                            <p>
                                {{$product->descr}}
                            </p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">
                            <div class="price">
                                @if($product->discount!= null)
                                    <h6>
                                        $  {{$product->discount}}
                                    </h6>
                                    <h6 style="text-decoration: line-through; color: red">
                                        $  {{$product->price}}
                                    </h6>
                                @else
                                    <h6>
                                        $  {{$product->price}}
                                    </h6>
                                @endif
                            </div>
                        </div>

                        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                            <form action="{{route('carts',$product->id)}}" method="post" class="post-form">
                                @csrf
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        <input type="text" name="quantity" class="quantity-text-field" value="1">
                                        <a class="plus-a" data-max="1000">&#43;</a>
                                        <a class="minus-a" data-min="1">&#45;</a>
                                    </div>
                                </div>
{{--                                <div>--}}
{{--                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>--}}
{{--                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>--}}
{{--                                </div>--}}
                                <div class="mt-3">
                                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Product-details /- -->
                </div>

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

