<!DOCTYPE html>
<html>
<head>


    <base href="/public">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Basic -->

   <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link  rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

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
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: #d90429;
        }
    </style>

    <style>
        body{background: #f5f5f5}.rounded{border-radius: 1rem}.nav-pills .nav-link{color: #555}.nav-pills .nav-link.active{color: white}input[type="radio"]{margin-right: 5px}.bold{font-weight:bold}
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->



<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center" style="font-size: 25px">
            <h1 class="display-6" >Pay Using Your Card - Total Amount : <span style="color: #D90429">$ {{$total_price}}</span></h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                            <form
                            role="form"
                            action="{{ route('stripe.post',$total_price) }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form"
                            onsubmit="event.preventDefault()">
                            @csrf




                                <div class="form-group required">
                                    <label for="username">
                                        <h6>Card Name</h6>
                                    </label>
                                    <input type="text" size='4' placeholder="Card Name" class="form-control ">
                                </div>



                                <label for="cardNumber">
                                    <h6>Card number</h6>
                                </label>

                                <div class="form-group card required">
                                    <div class="input-group">
                                        <input type="text"  placeholder="Valid card number" class="form-control card-number" size='20' autocomplete='off'>
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                                <i class="fab fa-cc-visa mx-1"></i>
                                                <i class="fab fa-cc-mastercard mx-1"></i>
                                                <i class="fab fa-cc-amex mx-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>






                                <div class="row">


                                    <div class="col-sm-4">
                                        <div class="form-group mb-4 cvc required">
                                            <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label>
                                            <input type="text" autocomplete='off'  class='form-control card-cvc' placeholder='ex. 311' size='4'>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group expiration required">
                                            <label>
                                                <span class="hidden-xs">
                                                    <h6>Expiration Month</h6>
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" placeholder="MM" size='2'  class="form-control  card-expiry-month" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group expiration required">
                                            <label>
                                                <span class="hidden-xs">
                                                    <h6>Expiration Year</h6>
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" placeholder="YYYY" class="form-control card-expiry-year" size='4'>
                                            </div>
                                        </div>
                                    </div>










                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hidden'>
                                        <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="subscribe btn btn-outline-danger btn-block shadow-sm">Pay Now ($ {{$total_price}})</button>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


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

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hidden');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hidden');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hidden')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>
