@props (['posts'])
<div class="w-full h-full flex justify-center items-center p-10 font-bold text-4xl">
    <form action="/post/edit/{{ $posts->id }}" method="post" class="w-full h-full px-80">
        <div class="text-6xl">자유게시판</div>
        @csrf
        @method('put')
        <div class="mb-3 flex justify-between items-center">
            <label for="title">제목</label>
            <input id="title" type="text" name="title" value="{{ $posts->title }}" placeholder="제목" required class="text-4xl border-2 border-black rounded-lg">
        </div>
        <div class="mb-3 flex justify-between items-center">
            <label for="writer">작성자</label>
            <input id="writer" type="text" name="user_id" value="{{ $posts->user_id }}" readonly class="text-4xl border-2 border-black rounded-lg">
        </div>
        <div class="text_box relative flex justify-between items-center">
            <label for="content">내용</label>
            <textarea id="myTextarea" oninput="checkLength()" name="content" id="content" cols="50" rows="10" placeholder="내용" required class="text-4xl border-2 border-black rounded-lg">{{ $posts->content }}</textarea>
            <div class="count absolute right-5 bottom-4 text-gray-400"><span>0</span>/300</div>
        </div>
        <div class="flex justify-end p-3">
            <input type="submit" value="수정" class="bg-slate-200 rounded-md w-20 hover:bg-slate-300">
        </div>
    </form>
</div>
<script>
    function checkLength() {
        var textarea = document.getElementById("myTextarea");
        var countSpan = document.querySelector(".count span");
        var maxLength = 300;

        countSpan.textContent = textarea.value.length;

        if (textarea.value.length > maxLength) {
            alert("최대 300자까지 입력 가능합니다.");
            textarea.value = textarea.value.substring(0, maxLength);
            countSpan.textContent = maxLength;
        }
    }
</script>