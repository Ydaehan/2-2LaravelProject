<div class="flex justify-center">
  <form action="/login" method="post">
    @csrf
    <div class="flex flex-col border-4 w-login h-login mt-32  bg-slate-100 rounded-3xl">
      <h2 class="mt-10 text-center text-6xl">Login</h2>
      <div class="flex flex-row items-center justify-center mt-9 text-3xl">
        <label for="logUID" class="col-md-4 col-form-label text-md-right ml-10">{{ __('id')}}</label>
        <div class="col-md-6">
          <input class="ml-16 border-2 rounded font-bold text-2xl" id="logUID" name="id" type="text" value="{{ old('id')}}" placeholder="ID" required autocomplete="id" autofocus>
        </div>
      </div>
      <div class="flex flex-row items-center justify-center mt-4">
        <label for="logPw" class="col-md-4 col-form-label text-md-right ml-4 text-3xl">{{ __('password')}}</label>
        <div class="col-md-6">
          <input class="ml-5 border-2 rounded font-bold text-2xl" id="logPw" name="password" type="password" value="{{ old('password')}}" placeholder="PW" required autocomplete="password" autofocus>
        </div>
      </div>
      <div class="flex flex-row justify-between mt-24">
        <button id="cancelBtn" type="button" class="border-2 hover:bg-slate-200 rounded-full w-20 hover:font-semibold ">cancel</button>
        <button id="logBtn" type="submit" class="bg-red-700 hover:bg-red-500 rounded-full hover:font-semibold text-white w-20">login</button>
      </div>
    </div> 
  </form>
  @if(session('login_error'))
    <script>
      alert("{{ session('login_error') }}");
    </script>
  @endif
</div>    
<script>

</script>