<header class="bg-white">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1 items-center justify-between">
      <a href="/" class="-m-1.5 p-1.5 flex items-center">
        <img class="h-8 w-auto" src="https://cdn.pixabay.com/photo/2016/01/23/07/58/ball-1157113_1280.png" alt="home">
        <span class="font-bold text-5xl">EveryLog</span>
      </a>
      <div class="hidden lg:flex lg:gap-x-12 w-96">
        <a href="/post" class="text-3xl font-semibold leading-6 text-gray-900 hover:text-gray-300">자유게시판</a>
      </div>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <!-- <div class="hidden lg:flex lg:gap-x-12 w-96 justify-between">
      <a href="/post" class="text-3xl font-semibold leading-6 text-gray-900 hover:text-gray-300">자유게시판</a>
    </div> -->
    <div class="lg:flex lg:flex-1 lg:justify-end">
    @if(session('user_id'))
      @if(session('user_id' !== 'admin'))
      <form class="flex" action="/profile" method="get">
        @csrf
        <button id="profileBtn" class="hover:text-amber-300 text-3xl font-semibold leading-6 text-gray-900">Profile <span aria-hidden="true">🤵</span></button>
      </form>
      @endif
      &nbsp&nbsp&nbsp&nbsp
      <form class="flex" action="/logout" method="post">
        @csrf
        <button id="logoutBtn" class="hover:text-amber-300 text-3xl font-semibold leading-6 text-gray-900">Logout <span aria-hidden="true">🚶‍♂️</span></button>
      </form>
    @else
      <form class="flex" action="/register" method="get">
        @csrf
        <button id="registerBtn" class="hover:text-amber-300 text-3xl font-semibold leading-6 text-gray-900">Register <span aria-hidden="true">🆕</span></button>
      </form>
      &nbsp&nbsp&nbsp&nbsp
      <form class="flex" action="/login" method="get">
        @csrf
        <button id="loginBtn" class="hover:text-lime-400 text-3xl font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">🚀</span></button>
      </form>
    @endif
    </div>
  </nav>
</header>
