<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $componentName = "profile";
        $user_id = session()->get('user_id');
        $userData = User::find($user_id);

        return view('main',compact('componentName'))->with(['user_id'=>$userData->id, 'nickname'=>$userData->nickname]);
    }

    public function update(Request $request) {
        // update nickname and password 
        $validated = $request->validate([
            'nickname' => 'required|max:10',
            'password' => 'nullable|min:4|regex:/^[a-zA-Z0-9]+$/',
            'confpw' => 'nullable|same:password',
        ]);
        $nickname=$request->nickname;
        $password=$request->password;

        $user_id = session()->get('user_id');
        $dupNickname = User::where('nickname',$nickname)->first();
        $nickname_check = $dupNickname !== null ? true : false; 

        $user = User::find($user_id);
        if (Hash::check($password, $user->password)){
            return redirect()->back()->with('error','기존 비밀번호와 일치합니다.');
        }

        if(!$nickname_check && $password == null){
            // update nickname only
            User::where('id',$user_id)->update(['nickname' => $nickname]);
        }else if($nickname_check && $password !== null) {
            // update password only
            User::where('id',$user_id)->update(['password' => bcrypt($password)]);
        }else{
            // update all
            User::where('id',$user_id)->update(['nickname' => $nickname, 'password' => bcrypt($password)]);
        }

        // 닉네임만 입력받았을 경우


        return redirect()->route('profile')->with('success','회원정보를 성공적으로 변경했습니다.');       
    }
}
