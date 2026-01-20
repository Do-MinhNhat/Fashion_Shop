<div id="loginModal"
 class="fixed inset-0 z-[9999] bg-black/50 hidden
        items-center justify-center">

  <div class="bg-white w-96 p-6 rounded-lg relative pointer-events-auto">
    <h2 class="text-xl font-bold mb-4">Đăng nhập</h2>

    <form id="loginForm">
      @csrf

      <input type="email" name="email"
       placeholder="Email"
       class="w-full border p-2 mb-3">

      <input type="password" name="password"
       placeholder="Mật khẩu"
       class="w-full border p-2 mb-3">
      <p id="loginError" class="text-red-500 text-sm mb-3"></p>
      <button class="w-full bg-black text-white py-2">
        Đăng nhập
      </button>
    </form>
    <button onclick="closeLoginModal()"
     class="mt-3 text-sm text-gray-500">Đóng</button>
  </div>
</div>
