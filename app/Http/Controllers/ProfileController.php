<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $componentName = "profile";
        $user_id = session()->get('user_id');
        $userData = User::find($user_id);

        return view('main',compact('componentName'))->with(['user_id'=>$userData->id, 'nickname'=>$userData->nickname]);
    }
}
