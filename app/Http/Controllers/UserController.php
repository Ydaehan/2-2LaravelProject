<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
      $validated = $request->validate([
        'id' => 'required|unique:users|max:25|min:4',
        'nickname' => 'required|unique:users|max:10',
        'password' => 'required|min:4',
        'confPW' => 'required|same:password'
      ]);

      $user = new User;
      $user->id = $request->id;
      $user->nickname = $request->nickname;
      $user->password = $request->password;

      $user->save();

      $request->session()->flash('success', '회원가입이 완료되었습니다.');

      return redirect()->route('main');
    }

}
