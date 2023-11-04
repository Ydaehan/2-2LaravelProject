@props (['user_id'])
<div class="w-full h-full flex justify-center items-center p-10 font-bold text-4xl">
    <form action="/post" method="post" class="w-full h-full px-80">
        <div class="text-6xl">자유게시판</div>
        @csrf
        <div class="mb-3 flex justify-between items-center">
            <label for="title">제목</label>
            <input id="title" type="text" name="title" placeholder="제목" required class="text-4xl border-2 border-black rounded-lg">
        </div>
        <div class="mb-3 flex justify-between items-center">
            <label for="writer">작성자</label>
            <input id="writer" type="text" name="user_id" value="{{ $user_id }}" readonly class="text-4xl border-2 border-black rounded-lg">
        </div>
        <div class="flex justify-between items-center">
            <label for="content">내용</label>
            <textarea name="content" id="content" cols="50" rows="10" placeholder="내용" required class="text-4xl border-2 border-black rounded-lg"></textarea>
        </div>
        <div class="flex justify-end p-3">
            <input type="submit" value="작성" class="bg-slate-200 rounded-md w-20 hover:bg-slate-300">
        </div>
    </form>
</div>