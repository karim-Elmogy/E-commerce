<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category=Category::all();
        return view('admin.category',compact('category'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $catagory= new Category();
        $catagory->category_name=$request->category_name;
        $catagory->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }



    public function edit($id)
    {
        //
    }

    public function update(Request $request )
    {
        //
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }

}
