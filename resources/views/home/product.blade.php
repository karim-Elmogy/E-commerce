<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>

       <div style="margin-left: 425px">
           <form action="{{route('product_search')}}" method="get">
               @csrf
               <div class="row m-auto">
                   <div class="col-md-4">
                       <input name="search"  type="text" style="border-color: #DC3545">
                   </div>
                   <div class="col-md-4">
                       <button type="submit" class="btn btn-outline-danger">Search</button>
                   </div>
               </div>
           </form>
       </div>
        @if(session()->has('message'))
            <div class="alert alert-success m-4">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    x
                </button>
                {{session()->get('message')}}
            </div>
        @endif

        <div class="row">
            @foreach($product as $item)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('product_details',$item->id)}}" class="option1">
                                    Product Details
                                </a>

                                <form  action="{{route('carts',$item->id)}}" method="post">
                                    @csrf
                                    <div class="row m-auto pt-2">
                                        <div class="col-md-6 m-auto">
                                            <input type="number"  name="quantity" value="1" min="0" max="50" >
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-danger"  type="submit">Cart</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{$item->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$item->name}}
                            </h5>

                            @if($item->discount!= null)
                                <h6>
                                    $  {{$item->discount}}
                                </h6>
                                <h6 style="text-decoration: line-through; color: red">
                                    $  {{$item->price}}
                                </h6>
                            @else
                                <h6>
                                    $  {{$item->price}}
                                </h6>
                            @endif



                        </div>

                    </div>


                </div>
            @endforeach




    </div>
</section>
