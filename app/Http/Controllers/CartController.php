<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe;


class CartController extends Controller
{

    public function index()
    {

    }




    public function show(Request $request , $id)
    {
        if (Auth::id())
        {
            $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart();
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_id=$product->id;

            if ($product->discount!=null)
            {
                $cart->price=$product->discount * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            $cart->image=$product->image;
            $cart->quantity=$request->quantity;


            $cart->save();
            Alert::success('Product Added Successfully','We have added product to the cart');
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }

    }

    public function show_cart()
    {
        $carts=Cart::where('user_id',Auth::id())->get();
        return view('home.showcart',compact('carts'));
    }

    public function delete($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }



    public function cash_order()
    {
        $carts=Cart::where('user_id',Auth::id())->get();
        foreach ($carts as $cart)
        {
            $order=new  Order();
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->address=$cart->address;
            $order->phone=$cart->phone;
            $order->user_id=$cart->user_id;
            $order->product_name=$cart->product->name;
            $order->quantity=$cart->quantity;
            $order->price=$cart->price;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->payment_status='Cash On Delivery';
            $order->delivery_status='Processing';

            $order->save();


            $del=Cart::find($cart->id);
            $del->delete();


        }
        return redirect()->back()->with('massage','We Have Received Your Order. We Will Connect With You Soon ......');
    }

    public function stripe($total_price)
    {
        $carts=Cart::where('user_id',Auth::id())->get();
        return view('home.stripe',compact('total_price','carts'));
    }



    public function stripe_post(Request $request,$total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment."
        ]);

        $carts=Cart::where('user_id',Auth::id())->get();
        foreach ($carts as $cart)
        {
            $order=new  Order();
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->address=$cart->address;
            $order->phone=$cart->phone;
            $order->user_id=$cart->user_id;
            $order->product_name=$cart->product->name;
            $order->quantity=$cart->quantity;
            $order->price=$cart->price;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->payment_status='Paid';
            $order->delivery_status='Processing';

            $order->save();


            $del=Cart::find($cart->id);
            $del->delete();


        }

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
