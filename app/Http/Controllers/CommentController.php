<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request, string $post_id){
        $validated = $request->validate([
            'comment'=> 'required|min:1|max:300'
        ]);

        $comment = new Comment;
        $comment->post_id = $post_id;
        $comment->content = $request->comment;
        $comment->user_id = session()->get('user_id');
        $comment->save();

        return redirect()->route('detailPost',$post_id);
    }
}
