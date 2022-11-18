<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
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
                            <h5 class="card-title">Add Catagory</h5>
                            <form action="{{route('category.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name Catagory</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Enter Name Catagory">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>





                    <div class="col-xl-12 mb-30 mt-4">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Catagory Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->category_name}}</td>
                                            <td>
                                                <form action="{{route('category.destroy',$item->id)}}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Are You Sure Delete This Category')"
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
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin.script')
</body>
</html>

