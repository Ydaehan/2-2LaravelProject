<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

use function Laravel\Prompts\alert;

class CommentController extends Controller
{
    public function create(Request $request, string $post_id){
        if(!$request->session()->get('user_id')){
            return redirect()->back()->with('error','로그인 후 이용해주세요');
        }
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
    public function update(Request $request, string $post_id ,string $comment_id) {
        $comment = Comment::find($comment_id);
        $comment -> update(['content' => $request->inputContent]);

        return redirect()->route('detailPost',$post_id);
    }
    
    public function delete(string $post_id, string $comment_id){
        Comment::find($comment_id)->delete();
        alert('삭제완료');
        return redirect()->route('detailPost',$post_id);
    }
}
