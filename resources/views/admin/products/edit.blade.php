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
        [type='text']
        {
            background-color: unset;
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


                    <div class="card card-statistics mb-30 m-auto" style="width: 500px;margin-top: 10px!important;">
                        @if(session()->has('message'))
                            <div class="alert alert-success m-4">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Edit Product</h5>
                            <form class="forms-sample" action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PATCH') }}


                                <div class="form-group">
                                    <input id="id" type="hidden" name="id" class="form-control"
                                           value="{{ $product->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <input type="text" class="form-control" name="descr" value="{{$product->descr}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="number" class="form-control" name="price" min="0" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Discount</label>
                                    <input type="number" class="form-control" name="discount" min="0" value="{{$product->discount}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="number" class="form-control" name="quantity" min="0" value="{{$product->quantity}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Product Category</label><br>
                                    <select name="category_id"  id="exampleFormControlSelect1">
                                        <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                                    @foreach($category as $item)
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Current Image</label>
                                    <img style="margin: auto" src="/product/{{$product->image}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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



