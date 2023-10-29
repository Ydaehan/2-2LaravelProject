
<div class="flex justify-center">
  <form action="/register" method="post">
    @csrf
    <div class="flex flex-col border-4 w-register h-register mt-32 ">
      <h2 class="mt-10 text-center">Register</h2>
      <div class="flex flex-row items-center justify-between mt-16">
        <span class="ml-7">id: </span>
        <input class="mr-7" id="regUID" name="id" type="text" value="{{ old('id')}}" placeholder="ID" required>
      </div>
      @error('id')
        <div class="text-sm alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      <div class="flex flex-row items-center justify-between mt-4">
        <span class="ml-7">nickname</span>
        <input class="mr-7" id="regNickname" name="nickname" type="text" value="{{ old('nickname')}}" placeholder="nickname" required>
      </div>
      @error('nickname')
        <div class="text-sm alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      <div class="flex flex-row items-center justify-between mt-4">
        <span class="ml-7">password: </span>
        <input class="mr-7" id="regPw" name="password" type="password" value="{{ old('password')}}" placeholder="PW" required>
      </div>
      @error('password')
        <div class="text-sm alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      <div class="flex flex-row items-center justify-between mt-4 mb-1.5">
        <span class="ml-7">password_confirmation: </span>
        <input class="mr-7" id="regConfPW" type="password" name="confPW" value="{{ old('confPW')}}" placeholder="confirmPW" required>
      </div>
      @error('confPW')
        <div class="text-sm alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
      @enderror
      <div class="flex flex-row justify-between mt-3">
        <button id="rCancelBtn" type="button" class="border-2 hover:bg-slate-100 rounded-full w-20">cancel</button>
        <button id="regBtn" type="submit" class="bg-red-700 hover:bg-red-500 rounded-full font-sans hover:font-semibold text-white w-20">register</button>
      </div>
    </div> 
  </form>
</div>
