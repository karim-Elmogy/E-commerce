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
        .title {
            font-size: 14px;
            font-weight:bold;
        }
        .komen {
            font-size:14px;
        }
        .geser {
            margin-left:55px;
            margin-top:5px;
        }

        .add {
            margin-left:80px;
            margin-top:5px;
        }
    </style>
</head>
<body>
<div class="hero_area">

    @include('sweetalert::alert')



    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
</div>
<!-- why section -->
    @include('home.why')
<!-- end why section -->

<!-- arrival section -->
    @include('home.new_arival')
<!-- end arrival section -->

<!-- product section -->
    @include('home.product')
<!-- end product section -->





<div class="container py-5 text-center m-auto">
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="float-left">Add Comment : </label>
                <input name="comment" type="text" width="200px">
            </div>

            <button type="submit" class="btn btn-danger" style="color: red; border-color: red">Comment</button>
        </form>
</div>


<div class="container py-4">
    @foreach($comment as $comment)

        <div class="media mb-2">
            <div class="media-left mr-3">
                <img src="http://fakeimg.pl/50x50" class="media-object" style="width:40px">
                <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input name="id" id="id" type="hidden" value="{{$comment->id}}">
                    <button type="submit">remove</button>
                </form>
            </div>
            <div class="media-body">
                <h4 class="media-heading title">{{$comment->name}}</h4>
                <p class="komen">
                    {{$comment->comment}}<br>
                        <a href="javascript:void(0);" data-commentid="{{$comment->id}}" onclick="reply(this)">reply</a>
                   </div>
                </p>
            </div>
        </div>
        @foreach($reply as $item)
            @if($item->comment_id==$comment->id)
                <div class="geser">
                    <div class="media">
                        <div class="media-left mr-3">
                            <img src="http://fakeimg.pl/50x50" class="media-object" style="width:40px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading title">{{$item->name}}</h4>
                            <p class="komen">
                                {{$item->reply}}<br>
                                <a href="javascript:void(0);" data-commentid="{{$comment->id}}" onclick="reply(this)">reply</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach


    <div class="add replyDiv" style="display: none">
         <form action="{{route('Reply')}}" method="get">
             @csrf
             <label for="" class="float-left">Add Comment : </label><br>
             <div class="row">
                  <div class="col-md-4">
                      <input name="commentId" id="commentId" type="hidden">
                        <input name="reply"  type="text">
                  </div>
                  <div class="col-md-4">
                      <button type="submit" class="btn btn-outline-primary" style="color: #0069D9;">Reply</button>
                      <a href="javascript:void(0);" class="btn btn-outline-danger" onclick="reply_close(this)">close</a>
                  </div>
             </div>


         </form>
    </div>


</div>

















<!-- subscribe section -->
    @include('home.sub')
<!-- end subscribe section -->
<!-- client section -->
    @include('home.client')
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    function reply(caller)
    {
        document.getElementById('commentId').value=$(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }
    function reply_close(caller)
    {
        $('.replyDiv').hide();
    }
</script>



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

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) {
            window.scrollTo(0, scrollpos);
            sessionStorage.removeItem('scrollpos');
        }
    });

    window.addEventListener("beforeunload", function (e) {
        sessionStorage.setItem('scrollpos', window.scrollY);
    });
</script>
</body>
</html>
