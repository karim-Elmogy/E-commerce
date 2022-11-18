<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (Auth::id())
        {
            $comment=new Comment();
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;

            $comment->save();

            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }
    }


    public function Reply(Request $request)
    {
        if (Auth::id())
        {
            $reply=new Reply();
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;

            $reply->save();

            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy($id)
    {

        if (Auth::id())
        {
            $comment=Comment::where('id',$id)->where('user_id',Auth::id())->first();
            $comment->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
}
