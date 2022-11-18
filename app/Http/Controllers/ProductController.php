<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $category=Category::all();
        return view('admin.products.add',compact('category'));
    }

    public function store(Request $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $product->descr=$request->descr;
        $product->category_id=$request->category_id;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount=$request->discount;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);


        $product->image=$imagename;


        $product->save();

        return redirect()->route('products.index')->with('message','Product Added Successfully');

    }


    public function edit($id)
    {
        $product=Product::where('id',$id)->first();
        $category=Category::all();
        return view('admin.products.edit',compact('category','product'));
    }


    public function update(Request $request)
    {
        $product=Product::find($request->id);

        $image=$request->image;
        if ($request->hasFile('image'))
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);


            $product->image=$imagename;
        }


        $product->name=$request->name;
        $product->descr=$request->descr;
        $product->category_id=$request->category_id;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->save();

        return redirect()->route('products.index')->with('message','Product Updated Successfully');
    }


    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('message','Product Deleted Successfully');
    }


}
