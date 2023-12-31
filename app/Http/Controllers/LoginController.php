<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
  public function index () {
    $componentName = "login-form";
    return view('main',compact('componentName'));
  }

  public function login(Request $request) {
    $validated = $request->validate([
        'id' => 'required',
        'password' => 'required'
    ]);

    $userType = $validated['id'];

    if ($userType === 'admin') {
      if (Auth::guard('admins')->attempt($validated)) {
        // 로그인 성공
        $request->session()->put('user_id', $request->id);
        dd(session()->all());
        return redirect()->route('main');
      } else {
          // 로그인 실패
          dd("로그인 실패: 아이디나 비밀번호가 다릅니다.");
          return redirect()->back()->with('login_error', '아이디나 비밀번호가 다릅니다.');
      }
    } else {
      if(Auth::attempt($validated)){
        $request->session()->put('user_id', $request->id);
        return redirect()->route('main');
      } else {
        return redirect()->back()->with('login_error','아이디나 비밀번호가 다릅니다.');
      }
    }
    
  }
  
  public function logout(Request $request) {
      Auth::logout();
      $request->session()->forget('user_id');
      return redirect()->route('main');
  }
}
