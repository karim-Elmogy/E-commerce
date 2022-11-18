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
        @media print {
            #print_Button {
                display: none;
            }
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


                                    <div class="row row-sm">
                                        <div class="col-md-12 col-xl-12">
                                            <div class=" main-content-body-invoice" id="print">
                                                <div class="card card-invoice">
                                                    <div class="card-body">

                                                        <!-- invoice-header -->
                                                        <div class="row mg-t-20">




                                                            <div class="col-md">
                                                                <label class="tx-gray-600">Information Order</label>
                                                                <p class="invoice-info-row"><span>Name : </span>
                                                                    <span>{{ $order->name }}</span></p>
                                                                <p class="invoice-info-row"><span>Email : </span>
                                                                    <span>{{ $order->email }}</span></p>
                                                                <p class="invoice-info-row"><span>Address : </span>
                                                                    <span>{{ $order-> address}}</span></p>
                                                                <p class="invoice-info-row"><span>Phone : </span>
                                                                    <span>{{ $order->phone }}</span></p>
                                                                <p class="invoice-info-row"><span>Date : </span>
                                                                    <span>
                                                                        <?php
                                                                        date_default_timezone_set("Egypt");
                                                                           echo date("F j, Y , h:i:sa");
                                                                        ?>
                                                                    </span></p>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mg-t-40 mt-5 text-center">
                                                            <table class="table table-bordered  border text-md-nowrap mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th class="wd-20p">#</th>
                                                                    <th class="wd-40p">Product Name</th>
                                                                    <th class="tx-center">Quantity</th>
                                                                    <th class="tx-right">Image</th>
                                                                    <th class="tx-right">Total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td class="tx-12">{{ $order->product_name }}</td>
                                                                    <td class="tx-center">{{ $order->quantity }}</td>
                                                                    <td><img src="/product/{{$order->image}}"></td>
                                                                    <td class="tx-right">{{ $order->price }}</td>

                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <hr class="mg-b-40">



                                                        <button class="btn btn-primary  float-right mt-3 mr-2" id="print_Button" onclick="printDiv()"> Print<i
                                                                class="mdi mdi-printer ml-1"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- COL-END -->
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


<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

</script>
</body>
</html>





