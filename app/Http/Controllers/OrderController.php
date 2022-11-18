<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::all();
        return view('admin.order.index',compact('orders'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show_order()
    {
        if (Auth::id())
        {
            $carts=Cart::where('user_id',Auth::id())->get();
            $orders=Order::where('user_id',Auth::id())->get();
            return view('home.order' ,compact('carts','orders'));
        }
        else
        {
            return redirect('login');
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $order=Order::find($request->id);

        $order->delivery_status='Delivered';
        $order->payment_status='Paid';
        $order->save();


        return redirect()->back();
    }


    public function print($id)
    {
        $order=Order::find($id);
        return view('admin.order.pdf',compact('order'));
    }
    public function send_email($id)
    {
        $order=Order::find($id);
        return view('admin.order.sent_email',compact('order'));
    }

    public function send_user_email(Request $request , $id)
    {
        $order=Order::find($id);

        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,

        ];
        Notification::send($order,new \App\Notifications\MyFirstNotification($details));
        return redirect()->back();
    }

    public function Search(Request $request)
    {
        $Search=$request->search;
        $orders=Order::where('name',$Search)->orWhere('phone',$Search)->orWhere('product_name',$Search)->get();
        return view('admin.order.index',compact('orders'));
    }

    public function product_search(Request $request)
    {
        $Search=$request->search;
        $product=Product::where('name',$Search)->get();
        $carts=Cart::where('user_id',Auth::id())->get();
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view('home.userpage',compact('product','carts','comment','reply'));
    }

    public function cancel_order($id)
    {
        $order=Order::find($id);
        $order->delivery_status='You Canceled The Order';
        $order->save();
        return redirect()->back();
    }

}
