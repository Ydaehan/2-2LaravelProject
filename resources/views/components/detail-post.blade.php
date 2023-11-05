@props(["posts"])
<div class="px-60">
  <div class="px-4 sm:px-0 font-bold text-6xl mb-10">
    | 자유게시판
  </div>
  <div class="mt-6 border rounded-md border-gray-100 shadow-xl">
    <dl class="flex justify-between px-7 border border-gray-400 rounded-md bg-amber-200 bg-opacity-60">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="font-bold text-3xl leading-6 text-gray-900">제목</dt>
        <dd class="mt-1 text-2xl font-bold leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $posts->title }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="font-bold text-3xl leading-6 text-gray-900">작성자</dt>
        <dd class="mt-1 text-2xl font-bold leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $posts->user_id }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="font-bold text-3xl leading-6 text-gray-900">조회수</dt>
        <dd class="mt-1 text-2xl font-bold leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $posts->view }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="font-bold text-3xl leading-6 text-gray-900">작성일</dt>
        <dd class="mt-1 text-2xl font-bold leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $posts->created_at->format('Y-m-d') }}</dd>
      </div>
    </dl>
    <div class="flex-col px-4 py-6 sm:gap-4 sm:px-3 h-80 border border-gray-400 rounded-md shadow-xl">
        <div class="flex justify-start items-center h-60">
            <dt class="font-bold text-3xl leading-6 text-gray-900 w-12">내용</dt>
            <textarea class="mt-1 text-4xl font-bold rounded-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0 w-full h-full" readonly>{{ $posts->content }}</textarea>
        </div>
        @if(session('user_id') == $posts->user_id )
        <div class="flex justify-end py-2">
            <form action="/post/edit/{{ $posts->id }}" method="get">
                <input type="submit" class="mr-2 w-20 border border-gray-300 shadow-md rounded-md bg-cyan-400 hover:bg-cyan-300" value="수정">
            </form>
            <form action="/post/delete/{{ $posts->id }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="w-20 border border-gray-300 shadow-md rounded-md bg-red-500 hover:bg-red-400" value="삭제">
            </form>
        </div>
        @endif
    </div> 
  </div>
</div>
<x-comment :posts="$posts"/>
