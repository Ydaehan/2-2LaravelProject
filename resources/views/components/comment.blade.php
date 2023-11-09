@props(['posts','comments'])
<div class="px-60 py-10">
  <label for="comment" class="text-3xl">댓글</label>
  <span class="text-3xl">{{$comments->total()}}개</span>
  <form action="/post/{{ $posts->id }}/comments" method="post" class="flex justify-end">
    @csrf
    <input type="text" name="comment" placeholder="댓글" class="text-2xl border-gray-700 rounded-3xl border-2 h-10 w-full" required>
    <input type="submit" value="작성" class="border-gray-700 rounded-3xl border-2 w-12 bg-sky-300 hover:bg-sky-200">
  </form>
  <div>
    <table class="mt-5 w-full">
      <tbody class="border-2 border-gray-700 ">
        @if($posts->comment->isEmpty())
            <tr class="items-center">
              <td>아직 댓글이 없습니다.</td>
            </tr>
        @else
          <tr class="flex justify-between px-7 border-b-2 border-dotted border-slate-400 last:border-0 bg-amber-200 bg-opacity-60">
            <td>순번</td>
            <td class="w-40">내용</td>
            <td>작성자</td>
            <td>작성일자</td>
            <td class="w-20">수정 / 삭제</td>
          </tr>
          @foreach ($comments as $index => $comment)
            <tr class="flex justify-between px-7 border-b-2 border-dotted border-slate-400 last:border-0 items-center">
              <td>{{ $index+1 + ($comments->perPage() * ($comments->currentPage() - 1)) }}</td>
              <td><textarea id="editTextarea{{$comment->id}}" onkeyup="autoResize(this)" onkeydown="autoResize(this)" type="text" name="content" form="editForm{{$comment->id}}" class="commentCtt resize-none border-0 rounded-2xl w-full whitespace-pre-wrap text-2xl box-border"  required readonly>{{ $comment->content }}</textarea></td>
              <td>{{ $comment->user_id }}</td>  
              <td>{{ $comment->created_at->format('Y-m-d')}}</td>
            @if( session('user_id') == $comment->user_id )
              <form id="editForm{{$comment -> id}}" action="{{ route('commentDelete', [$posts->id, $comment->id])}}" method="post">
                @csrf
                @method('patch')
                <input id="editedContent{{$comment -> id}}" type="hidden" name="inputContent">
                <td><input type="submit" data-id="{{ $comment->id}}" class="cttEditBtn w-20 border border-gray-300 shadow-md rounded-md bg-cyan-400 hover:bg-cyan-300" value="수정">
              </form>
              <form action="{{ route('commentDelete', [$posts->id, $comment->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="w-20 border border-gray-300 shadow-md rounded-md bg-red-500 hover:bg-red-400" value="삭제"></td>
              </form>
              @else
                <td class="w-20"></td>
              @endif
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    <x-pagination :items="$comments"/>
  </div>
</div>
<script>

  // comment 내용 줄바꿈 처리
  const loadResize = (contentInput) => {
    contentInput.style.height = "0px";

    let scrollHeight = contentInput.scrollHeight;
    let style = window.getComputedStyle(contentInput);
    let borderTop = parseInt(style.borderTop);
    let borderBottom = parseInt(style.borderBottom);

    contentInput.style.height = (scrollHeight + borderTop + borderBottom) + "px";
  }

  window.addEventListener("load", () => {
    const allCommentTextareas = document.querySelectorAll('.commentCtt');
    allCommentTextareas.forEach((textarea) => {
      loadResize(textarea);
    });
  });
  window.onresize = () => {
    const allCommentTextareas = document.querySelectorAll('.commentCtt');
    allCommentTextareas.forEach((textarea) => {
      loadResize(textarea);
    });
  };

  
  const editButtons = document.querySelectorAll('.cttEditBtn');
  editButtons.forEach((button) => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const row = button.closest('tr'); // closest는 가까운 부모태그를 찾음
      const contentInput = row.querySelector('.commentCtt');  // textarea
      const tdWithButtons = contentInput.parentElement;
      const closeButton = document.createElement('button');
      
      if (contentInput.readOnly) {
        closeButton.innerHTML = '&#10006;'; // X 표시
        closeButton.style.color = 'red'; // 빨간색
        closeButton.style.backgroundColor = 'transparent'; // 배경색 투명으로
        closeButton.style.border = 'none'; // 테두리 없애기
        closeButton.style.marginLeft = '10px'; // 버튼 간격을 위한 여백

        closeButton.addEventListener('click', () => {
          contentInput.readOnly = true;
          tdWithButtons.removeChild(closeButton);
        });
        tdWithButtons.appendChild(closeButton);
        
        contentInput.readOnly = !contentInput.readOnly;
        contentInput.focus();
      } else {
        const id = button.getAttribute('data-id'); 
        const textarea = document.getElementById(`editTextarea${id}`);
        const input = document.getElementById(`editedContent${id}`);
        console.log('textarea 값' + textarea.value);
        input.value = textarea.value
        const form = document.getElementById(`editForm${id}`);
        form.submit();
      }
    })
  });
  
  const autoResize = (textarea) => {
    textarea.style.height = '1px';
    textarea.style.height = textarea.scrollHeight + 'px';
  }
</script>