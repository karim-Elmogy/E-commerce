<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::all();
        $carts=Cart::where('user_id',Auth::id())->get();
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('home.userpage',compact('product','carts','comment','reply'));
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if ($usertype=='1')
        {
            $total_product=Product::all()->count();
            $total_order=Order::all()->count();
            $total_user=User::all()->count();
            $order=Order::all();
            $total_revenue=0;
            foreach ($order as $order)
            {
                $total_revenue=$total_revenue+$order->price;
            }

            $total_delivered=Order::where('delivery_status','delivered')->get()->count();

            $total_processing=Order::where('delivery_status','Processing')->get()->count();

            return view('admin.home' ,compact('total_product','total_order','total_user','total_revenue',
            'total_delivered','total_processing'));
        }
        else
        {
            $product=Product::all();
            $carts=Cart::where('user_id',Auth::id())->get();
            $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
            return view('home.userpage',compact('product','carts','comment','reply'));
        }
    }

    public function product_details($id)
    {
        $product=Product::find($id);
        $carts=Cart::where('user_id',Auth::id())->get();
        return view('home.product_details',compact('product','carts'));
    }




    public function all_product()
    {
        $product=Product::all();
        $carts=Cart::where('user_id',Auth::id())->get();
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('home.all_product',compact('product','carts','comment','reply'));
    }

}
