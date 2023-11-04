<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
  public function userName()
  {
    return 'id';
  }

  public function delete(Request $request, string $id)
  {
    $validation = $request -> validate([
      'confirmDel' => 'required'
    ]);
    $user = User::find($id);
    if (Hash::check($request->confirmDel, $user->password)){
        $user->delete();
        $request->session()->forget('user_id');
        return redirect()->route('main')->with('success','회원을 탈퇴하여 홈으로 돌아갑니다.');
    } else {
      return redirect()->back()->with('error','비밀번호를 잘못 입력하셨습니다.');
    }
  }
}
