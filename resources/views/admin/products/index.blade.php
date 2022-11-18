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
                                        <a class="btn btn-primary mb-5" href="{{route('products.create')}}">Add Product</a>
                                        <h4 class="card-title">All Products</h4>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Product Name </th>
                                                    <th> Product Description </th>
                                                    <th> Product Price </th>
                                                    <th> Product Discount </th>
                                                    <th> Product Quantity </th>
                                                    <th> Product Category </th>
                                                    <th> Product Image</th>
                                                    <th colspan="2"> Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td>{{$loop->iteration}} </td>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->descr}}</td>
                                                        <td>{{$product->price}} $</td>
                                                        <td>{{$product->discount}} $</td>
                                                        <td>{{$product->quantity}}</td>
                                                        <td>{{$product->category->category_name}}</td>
                                                        <td><img src="/product/{{$product->image}}"></td>
                                                        <td>
                                                            <a class="btn btn-outline-primary" href="{{route('products.edit',$product->id)}}">
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{route('products.destroy',$product->id)}}" method="post">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button
                                                                    type="submit"
                                                                    onclick="return confirm('Are You Sure Delete This Product')"
                                                                    class="btn btn-danger">
                                                                    Delete
                                                                </button>
                                                            </form>
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



