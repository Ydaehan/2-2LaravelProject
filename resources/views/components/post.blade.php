<div class="w-full h-full flex flex-col font-normal text-4xl px-20 py-10">
    <div class="font-bold text-6xl mb-10">
        | 자유게시판
    </div>
    <table>
        <tr class="border-solid border-2 border-black text-center bg-amber-200 bg-opacity-60">
            <td class="border-dashed border-2 border-black w-20">순번</td>
            <td class="border-dashed border-2 border-black w-inpro">제목</td>
            <td class="border-dashed border-2 border-black w-36">작성자</td>
            <td class="border-dashed border-2 border-black w-24">조회수</td>
            <td class="border-dashed border-2 border-black w-72">작성일</td>
        </tr>
        @if($posts !== null)
            @foreach($posts as $index => $post)
            <tr class="border-solid border-2 border-black text-center h-8">
                <form action="/post/{{ $post->id }}" method="get">
                    @csrf
                    <td>{{ $index+1 + ($posts->perPage() * ($posts->currentPage() - 1)) }}</td>
                    <td class="border-dashed border-2 border-black "><input type="submit" value="{{$post->title}}" class="hover:font-bold"></td>
                    <td class="border-dashed border-2 border-black ">{{ $post->user_id }}</td>
                    <td class="border-dashed border-2 border-black ">{{ $post->view }}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                </form>
            </tr>
            @endforeach
            @if(session('user_id') !== 'admin')
            <form action="/create/post" method="get" class="flex justify-end absolute right-0 bottom-0">
                <input type="submit" value="글쓰기" class="w-20 pt-1 pb-2 m-4 border-black border-2 rounded-xl hover:bg-slate-200">
            </form>
            @endif
        @else
            <tr class="border-solid border-2 border-black text-center w-half h-44 relative">
                <td colspan="5" class="font-bold">
                    아직 게시물이 존재하지 않습니다.
                    <!-- <input type="submit" value="수정" class="bg-cyan-300 hover:bg-cyan-400 rounded-xl w-12">
                    <input type="submit" value="삭제" class="bg-red-400 hover:bg-red-500 rounded-xl w-12"> -->
                    @if (session('user_id') !== 'admin')
                    <form action="/create/post" method="get" class="flex justify-end absolute right-0 bottom-0">
                        <input type="submit" value="글쓰기" class="w-20 pt-1 pb-2 m-4 border-black border-2 rounded-xl hover:bg-slate-200">
                    </form>
                    @endif
                </td> 
            </tr>
        @endif
    </table>
    <x-pagination :items="$posts"/>
</div>