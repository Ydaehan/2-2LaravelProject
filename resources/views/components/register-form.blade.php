
<div class="flex justify-center">
  <form action="/register" method="post">
    @csrf
    <div class="flex flex-col rounded-3xl border-4 w-register h-register mt-32 bg-slate-100">
      <h2 class="mt-8 text-center font-bold text-5xl">회원가입</h2>
      <div class="flex flex-row items-center justify-between mt-8">
        <span class="ml-7 font-bold text-3xl">아이디: </span>
        <input class="mr-7 font-bold text-3xl rounded-xl border-2" id="regUID" name="id" type="text" value="{{ old('id')}}" placeholder="ID" required>
      </div>
      <div class="h-7">
      @error('id')
        <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      </div>
      <div class="flex flex-row items-center justify-between mt-4">
        <span class="ml-7 font-bold text-3xl">닉네임:</span>
        <input class="mr-7 font-bold text-3xl rounded-xl border-2" id="regNickname" name="nickname" type="text" value="{{ old('nickname')}}" placeholder="nickname" required>
      </div>
      <div class="h-7">
      @error('nickname')
        <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      </div>
      <div class="flex flex-row items-center justify-between mt-4">
        <span class="ml-7 font-bold text-3xl">비밀번호: </span>
        <input class="mr-7 font-bold text-3xl rounded-xl border-2" id="regPw" name="password" type="password" value="{{ old('password')}}" placeholder="PW" required>
      </div>
      <div class="h-7">
      @error('password')
        <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      </div>
      <div class="flex flex-row items-center justify-between mt-4 mb-1.5">
        <span class="ml-7 font-bold text-3xl">비밀번호 확인: </span>
        <input class="mr-7 font-bold text-3xl rounded-xl border-2" id="regConfPW" type="password" name="confpw" value="{{ old('confPW')}}" placeholder="confpw" required>
      </div>
      <div class="h-7">
      @error('confPW')
        <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      </div>
      <div class="flex flex-row justify-between mt-3">
        <button id="cancelBtn" type="button" class="border-2 hover:bg-slate-100 rounded-full text-3xl w-20">취소</button>
        <button id="regBtn" type="submit" class="bg-red-700 hover:bg-red-500 rounded-full text-3xl hover:font-semibold text-white w-20">가입</button>
      </div>
    </div> 
  </form>
</div>
@if(session('login_error'))
  <script>
    alert("{{ session('login_error') }}");
  </script>
@endif