@props (['nickname','password'])

<div class="flex justify-center mt-32">
    <div class="flex justify-center w-profile h-profile bg-slate-600 mt-10">
        <div class=" w-inpro h-inpro bg-slate-300 mt-8 p-10">
            <div>
                <p class="text-center text-4xl">프로필 변경</p>
                <form action="/">
                    <div class="flex justify-center items-center mt-10">
                        <label class="mr-10" for="nickname">닉네임</label>
                        <input id="nickname" class="border-2 rounded-xl ml-5" type="text" name="nickname" value="{{ $nickname ?? $slot }}" required>
                    </div>
                    <div class="flex justify-center items-center mt-5">
                        <label class="mr-7" for="password">비밀번호</label>
                        <input id="profilePw" class="border-2 rounded-xl ml-4" type="password" name="password" placeholder="비밀번호 변경" requiredz>
                    </div>
                    <div class="flex justify-between mt-40">
                        <input class="bg-blue-500 border-2 w-20 h-10 rounded-xl hover:bg-blue-700" type="submit" value="취소">
                        <input class="bg-red-500 border-2 w-20 h-10 rounded-xl hover:bg-red-700" type="submit" value="수정">
                    </div>
                    
                </form>

            </div>
            
            
        </div>
    </div>
</div>