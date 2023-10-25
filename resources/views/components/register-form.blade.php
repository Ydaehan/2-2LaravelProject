<div id="registerModal" class="hidden relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div id="rModalOut" class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg h-half	">
      <form method="post" action="/">
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 h-80">
          <div class="sm:flex sm:items-start h-full">
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full h-full">
              <h3 class="mt-10 text-center font-semibold leading-6 text-gray-900" id="modal-title">회원가입</h3>
              <div class="flex flex-col items-center">
                <div class="mt-20 flex flex-row items-center">
                  <label class="text-center">id</label>
                  <input id="userId" class="text-center ml-16" type="text" placeholder="id" />
                </div>
                <div class="mt-5 flex flex-row items-center">
                  <label class="text-center">password</label>
                  <input id="userPw" class="text-center ml-2.5" type="text" placeholder="password" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button id="btnRegister" type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">register</button>
          <button id="btnRCancel" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">cancel</button>
        </div>
      </form>   
      </div>
    </div>
  </div>
</div>
