<header class="header_section fixed-top bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="home/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="home/about.html">About</a></li>
                            <li><a href="home/testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all_product')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show_order')}}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a id="mini-cart-trigger" class="nav-link">
                            <i class="ion ion-md-basket"></i>
                            @if($carts->count() == 0)
                                <div></div>
                            @else
                            <div class="item-counter">
                                <span>{{$carts->count()}}</span>
                            </div>
                            @endif
                        </a>
                    </li>

                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                        @else
                    <li class="nav-item">
                        <a  class="btn btn-danger btn-sm mr-2 ml-2"  href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a  class="btn btn-outline-danger btn-sm" href="{{ route('register') }}">Register</a>
                    </li>
                        @endauth
                    @endif



                </ul>
            </div>
        </nav>
    </div>
</header>
