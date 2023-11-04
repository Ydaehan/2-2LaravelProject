<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $componentName = "post";
        $posts = Post::orderByDesc("created_at")->get();
        return view('main',compact('componentName','posts'));
    }

    public function createPost() {
        $componentName = "create-post";
        
        $user_id = session()->get('user_id');
        if($user_id == null) {
            return redirect()->route("login")->with("error", "로그인 후 이용해주세요.");
        }
        return view('main',compact('componentName','user_id'));
    }

    public function create(Request $request) {
        $validated = $request->validate([
            'title'=> 'required|max:30|min:1',
            'content'=> 'required|min:1|max:300',
            'user_id' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();
        
        return redirect()->route('post');
    }

    public function show(Request $request, string $id) {
        $componentName = "detail-post";
        $post_id = $id;
        return view('main',compact('componentName','post_id'));
    }
}
