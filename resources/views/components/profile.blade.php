@props (['nickname','password'])

<div class="flex flex-row justify-center mt-32">
    <div class="flex justify-center w-profile border-gray-400 border-2 h-profile bg-opacity-50 rounded-3xl bg-slate-400 mt-10">
        <div class=" w-inpro h-inpro bg-slate-200  bg-opacity-35 rounded-full mt-8 p-10">
            <div>
                <p class="text-center font-bold text-5xl">프로필 변경</p>
                <form action="/profile" method="post">
                    @csrf
                    @method('patch')
                    <div class="flex justify-center items-center mt-10">
                        <label class="mr-10 text-3xl font-bold" for="nickname">닉네임:</label>
                        <input id="nickname" type="text" name="nickname" value="{{ $nickname ?? $slot }}" required class="border-2 rounded-xl ml-5 text-2xl font-bold" >
                    </div>
                    <div class="h-9">
                        @error('nickname')
                            <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center">
                        <label class="mr-7 text-3xl font-bold" for="password">비밀번호:</label>
                        <input id="profilePw" type="password" name="password" placeholder="password" class="border-2 rounded-xl ml-6 text-2xl font-bold">
                    </div>
                    <div class="h-9">
                        @error('password')
                            <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center">
                        <label class="mr-7 text-3xl font-bold" for="profileConfPw">비밀번호확인:</label>
                        <input id="profileConfPw" type="password" name="confpw" placeholder="confpw" class="border-2 rounded-xl mr-2 text-2xl font-bold">
                    </div>
                    <div class="h-14">
                        @error('confpw')
                            <div class="text-3xl alert alert-danger text-red-600 text-end mr-5">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-between">
                        <input id="cancelBtn" type="submit" value="취소" class="bg-blue-500 border-2 w-20 h-10 rounded-xl hover:bg-blue-700 font-bold">
                        <input id="proUpdateBtn"type="submit" value="수정" class="bg-red-500 border-2 w-20 h-10 rounded-xl hover:bg-red-700 font-bold">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-10 font-bold rounded-3xl w-inpro h-40 bg-slate-500">
        <form action="/delete/{{ session()->get('user_id') }}" method="post" class="w-full h-full">
            @csrf
            @method('delete')
            <div class="flex flex-col items-center mt-4">
                <label for="confirmDel">회원탈퇴</label>
                <input id="confirmDel" type="text" name="confirmDel" placeholder="password" required class="border-2 rounded-xl mr-2 text-2xl font-bold">
                <input type="submit" value="탈퇴" class="bg-stone-400 border-2 w-20 h-9 rounded-xl hover:bg-red-500 mt-2">
            </div>            
        </form>
    </div>
</div>
