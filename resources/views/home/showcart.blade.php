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

    @if(session()->has('massage'))
        <div class="alert alert-success m-4">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                x
            </button>
            {{session()->get('massage')}}
        </div>
    @endif

    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form>
                        <!-- Products-List-Wrapper -->
                        <div class="table-wrapper u-s-m-b-60">
                            <table >
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $item)
                                <tr>

                                    <td>
                                        <div class="cart-anchor-image">
                                            <a href="{{route('product_details',$item->product_id)}}">
                                                <img src="/product/{{$item->image}}" alt="Product">
                                                <h6>{{$item->product->name}}</h6>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-price">
                                            $ {{$item->price}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity">
                                                {{$item->quantity}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-wrapper">
                                            <a href="{{route('delete',$item->id)}}" class="button button-outline-secondary fas fa-trash"></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Products-List-Wrapper /- -->

                        <?php

                        $total_price=$carts->sum('price');
                        ?>

                        <div class="coupon-continue-checkout u-s-m-b-60">
                            <div class="button-area">
                                <a href="{{route('stripe',$total_price)}}" class="continue">Pay Using Card</a>
                                <a href="{{route('cash_order')}}" class="checkout">Cash On Delivery</a>
                            </div>
                        </div>



                        <div>
                            <span class="calc-text text-danger text-red-800">
                                Total :
                                @if($carts->count()==0)
                                    $ 0
                                @else
                                    $ {{$carts->sum('price')}}
                                @endif
                            </span>
                        </div>

                    </form>
                    <!-- Billing -->
{{--                    <div class="calculation u-s-m-b-60">--}}
{{--                        <div class="table-wrapper-2">--}}
{{--                            <table>--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th colspan="2">Cart Totals</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        $ 126--}}
{{--                                        @if($carts->product->discount!=null)--}}
{{--                                            <span class="calc-text">$ {{$carts->product->sum('')}}</span>--}}
{{--                                        @else--}}
{{--                                            <span class="calc-text">$ {{$carts->product->sum('')}}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <h3 class="calc-h3 u-s-m-b-8">Shipping</h3>--}}
{{--                                        <div class="calc-choice-text u-s-m-b-4">Flat Rate: Not Available</div>--}}
{{--                                        <div class="calc-choice-text u-s-m-b-4">Free Shipping: Not Available</div>--}}
{{--                                        <a data-toggle="collapse" href="#shipping-calculation" class="calc-anchor u-s-m-b-4">Calculate Shipping--}}
{{--                                        </a>--}}
{{--                                        <div class="collapse" id="shipping-calculation">--}}
{{--                                            <form>--}}
{{--                                                <div class="select-country-wrapper u-s-m-b-8">--}}
{{--                                                    <div class="select-box-wrapper">--}}
{{--                                                        <label class="sr-only" for="select-country">Choose your country--}}
{{--                                                        </label>--}}
{{--                                                        <select class="select-box" id="select-country">--}}
{{--                                                            <option selected="selected" value="">Choose your country...--}}
{{--                                                            </option>--}}
{{--                                                            <option value="">United Kingdom (UK)</option>--}}
{{--                                                            <option value="">United States (US)</option>--}}
{{--                                                            <option value="">United Arab Emirates (UAE)</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="select-state-wrapper u-s-m-b-8">--}}
{{--                                                    <div class="select-box-wrapper">--}}
{{--                                                        <label class="sr-only" for="select-state">Choose your state--}}
{{--                                                        </label>--}}
{{--                                                        <select class="select-box" id="select-state">--}}
{{--                                                            <option selected="selected" value="">Choose your state...--}}
{{--                                                            </option>--}}
{{--                                                            <option value="">Alabama</option>--}}
{{--                                                            <option value="">Alaska</option>--}}
{{--                                                            <option value="">Arizona</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="town-city-div u-s-m-b-8">--}}
{{--                                                    <label class="sr-only" for="town-city"></label>--}}
{{--                                                    <input type="text" id="town-city" class="text-field" placeholder="Town / City">--}}
{{--                                                </div>--}}
{{--                                                <div class="postal-code-div u-s-m-b-8">--}}
{{--                                                    <label class="sr-only" for="postal-code"></label>--}}
{{--                                                    <input type="text" id="postal-code" class="text-field" placeholder="Postcode / Zip">--}}
{{--                                                </div>--}}
{{--                                                <div class="update-totals-div u-s-m-b-8">--}}
{{--                                                    <button class="button button-outline-platinum">Update Totals</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">Tax</h3>--}}
{{--                                        <span> (estimated for your country)</span>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <span class="calc-text">$0.00</span>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <h3 class="calc-h3 u-s-m-b-0">Total</h3>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <span class="calc-text">$220.00</span>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- Billing /- -->
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->













</div>






<!-- end client section -->
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

