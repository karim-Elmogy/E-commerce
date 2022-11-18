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

                                <h4 class="card-title">All Orders</h4>

                                    <form class="forms-sample" action="{{route('Search')}}" method="get">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="search" placeholder="Search  For Something">
                                       </div>

                                        <button type="submit" class="btn btn-primary mb-4">Search</button>
                                    </form>


                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: white;">
                                        <tr>
                                            <th> # </th>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Address </th>
                                            <th> Phone </th>
                                            <th> Product Name </th>
                                            <th> Quantity </th>
                                            <th> Price </th>
                                            <th> Payment Status </th>
                                            <th> Delivery Status </th>
                                            <th> Image </th>
                                            <th> Delivered </th>
                                            <th> Sent Email </th>
                                            <th> Print </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$loop->iteration}} </td>
                                                <td>{{$order->name}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->address}}</td>
                                                <td>{{$order->phone}}</td>
                                                <td>{{$order->product_name}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td>$ {{$order->price}}</td>
                                                <td>
                                                    {{$order->payment_status}}
                                                </td>
                                                <td>
                                                    @if($order->delivery_status=='Processing')
                                                        <label class="badge badge-danger">{{$order->delivery_status}}</label>
                                                    @else
                                                        <label class="badge badge-success">{{$order->delivery_status}}</label>
                                                    @endif
                                                </td>
                                                <td><img src="/product/{{$order->image}}"></td>
                                                <td>
                                                    @if($order->delivery_status=='Processing')
                                                    <form action="{{route('orders.update',$order->id)}}" method="post">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $order->id }}">
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger">
                                                            Delivered
                                                        </button>
                                                    </form>
                                                    @else
                                                        <label  class="badge badge-success">Delivered</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a  href="{{route('send_email',$order->id)}}" class="btn btn-outline-secondary btn-icon-text"> Sent Email</a>
                                                </td>
                                                <td>
                                                    <a  href="{{route('print_pdf',$order->id)}}" class="btn btn-outline-primary btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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




