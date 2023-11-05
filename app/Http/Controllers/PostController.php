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

    public function show(string $post_id) {
        $componentName = "detail-post";
        $posts = Post::find($post_id);
        $view = $posts->view + 1;
        Post::where('id',$post_id)->update(['view' => $view]);

        $posts = Post::find($post_id);
        return view('main',compact('componentName','posts'));
    }

    public function edit(string $post_id) {
        dd($post_id);
    }

    public function delete(string $post_id) {
        Post::find($post_id)->delete();
        return redirect()->route('post');
    }
}
