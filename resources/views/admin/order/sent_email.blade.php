<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <style>
        .table td img{
            margin: auto;
            width: 60px;
            height: 40px;
            border-radius: unset;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial -->
    @include('admin.sidebar')
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->


        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('message'))
                                    <div class="alert alert-success m-4">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            x
                                        </button>
                                        {{session()->get('message')}}
                                    </div>
                                @endif


                                <h1 class="text-center">Sent Email To {{$order->email}}</h1>
                                <form class="forms-sample" action="{{route('send_user_email',$order->id)}}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label for=""> Greeting : </label>
                                            <input type="text" class="form-control"  name="greeting" placeholder="Enter Email Greeting">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> FirstLing : </label>
                                            <input type="text" class="form-control" name="firstline"  placeholder="Enter Email FirstLing">
                                        </div>
                                    <div class="form-group">
                                        <label for=""> Body : </label>
                                        <input type="text" class="form-control" name="body"  placeholder="Enter Email Body">
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Button Name : </label>
                                        <input type="text" class="form-control" name="button" placeholder="Enter Email Button Name">
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Url : </label>
                                        <input type="url" class="form-control" name="url" placeholder="Enter Email Url">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Last Line : </label>
                                        <input type="text" class="form-control" name="lastline" placeholder="Enter Email Last Line">
                                    </div>




                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>






    </div>
</div>
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin.script')
</body>
</html>





