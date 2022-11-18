<!-- Mini Cart -->
<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            YOUR CART
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list">
            @foreach($carts as $item)
                <li class="clearfix">
                    <a href="{{route('product_details',$item->product_id)}}">
                        <img src="/product/{{$item->image}}" alt="Product">
                        <span class="mini-item-name">{{$item->product->name}}</span>
                        <span class="mini-item-price">$ {{$item->product->price}}</span>
                        <span class="mini-item-quantity"> x {{$item->quantity}} </span>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left">Total:</span>
            <span class="mini-total-price float-right">
                @if($carts->count()==0)
                    $ 0
                @else
                $ {{$item->sum('price')}}
                @endif
            </span>
        </div>
        <div class="mini-action-anchors">
            <a href="{{route('show_cart')}}" class="cart-anchor">View Cart</a>
            <a href="checkout.html" class="checkout-anchor">Checkout</a>
        </div>
    </div>
</div>
<!-- Mini Cart /- -->
