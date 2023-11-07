@props(["posts"])
<div class="px-60 py-10">
  <label for="comment" class="text-3xl">댓글</label>
  <span class="text-3xl">0개</span>
  <form action="/post/{{ $posts->id }}/comments" method="post" class="flex justify-end">
    @csrf
    <input type="text" name="comment" placeholder="댓글" class="text-2xl border-gray-700 rounded-3xl border-2 h-10 w-full" required>
    <input type="submit" value="작성" class="border-gray-700 rounded-3xl border-2 w-12 bg-sky-300 hover:bg-sky-200">
  </form>
  <div>
    <table class="mt-5 w-full">
      <tbody class="border-2 border-gray-700 ">
        @if($posts->comment == null)
            <tr class="items-center">
              <td>아직 댓글이 없습니다.</td>
            </tr>
        @else
          <tr class="flex justify-between px-7 border-b-2 border-dotted border-slate-400 last:border-0 bg-amber-200 bg-opacity-60">
            <td>순번</td>
            <td>내용</td>
            <td>작성자</td>
            <td>작성일자</td>
          </tr>
          @foreach ($posts->comment as $index => $comment)
            <tr class="flex justify-between px-7 border-b-2 border-dotted border-slate-400 last:border-0">
              <td>{{ $index + 1 }}</td>
              <td>{{ $comment->content }}</td>
              <td>{{ $comment->user_id }}</td>
              <td>{{ $comment->created_at->format('Y-m-d')}}</td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>