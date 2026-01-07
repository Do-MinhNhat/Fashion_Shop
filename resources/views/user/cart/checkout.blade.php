<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thanh Toán - CDHN</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <script>
            tailwind.config = {
                theme: { extend: { fontFamily: { serif: ['"Playfair Display"', 'serif'], sans: ['"Lato"', 'sans-serif'] } } }
            }
        </script>
        <style>
            .no-scrollbar::-webkit-scrollbar { display: none; }
            .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

            body {
                font-family: "Inter", sans-serif;
            }
        </style>
    </head>
    <body class="bg-white  text-gray-800">
        <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
            <div class="p-8 lg:p-20 order-2 lg:order-1">
                <a href="/Client/index.html" class="text-2xl font-serif font-bold tracking-widest uppercase mb-10 block">CDHN.</a>
                
                <div class="mb-8">
                    <h2 class="text-lg font-bold uppercase tracking-wide mb-6">Thông tin giao hàng</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <input type="text" placeholder="Họ" class="w-full border-b border-gray-300 py-3 focus:border-black outline-none transition bg-transparent placeholder-gray-400">
                            <input type="text" placeholder="Tên" class="w-full border-b border-gray-300 py-3 focus:border-black outline-none transition bg-transparent placeholder-gray-400">
                        </div>
                        <input type="text" placeholder="Số điện thoại" class="w-full border-b border-gray-300 py-3 focus:border-black outline-none transition bg-transparent placeholder-gray-400">
                        <input type="text" placeholder="Địa chỉ chi tiết" class="w-full border-b border-gray-300 py-3 focus:border-black outline-none transition bg-transparent placeholder-gray-400">
                        <div class="grid grid-cols-2 gap-6">
                            <select class="w-full border-b border-gray-300 py-3 focus:border-black outline-none bg-transparent text-gray-500">
                                <option>Tỉnh / Thành phố</option>
                            </select>
                            <select class="w-full border-b border-gray-300 py-3 focus:border-black outline-none bg-transparent text-gray-500">
                                <option>Quận / Huyện</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="mb-8">
                    <h2 class="text-lg font-bold uppercase tracking-wide mb-6">Phương thức thanh toán</h2>
                    <div class="space-y-3">
                        <label class="flex items-center p-4 border border-gray-200 cursor-pointer hover:border-black transition">
                            <input type="radio" name="payment" class="w-4 h-4 text-black focus:ring-black">
                            <span class="ml-3 font-medium">Thanh toán khi nhận hàng (COD)</span>
                        </label>
                        <label class="flex items-center p-4 border border-gray-200 cursor-pointer hover:border-black transition">
                            <input type="radio" name="payment" class="w-4 h-4 text-black focus:ring-black">
                            <span class="ml-3 font-medium">Chuyển khoản ngân hàng / QR Code</span>
                        </label>
                    </div>
                </div>

                <button class="w-full bg-black text-white py-4 uppercase tracking-widest text-sm font-bold hover:bg-gray-800 transition mt-4">
                    Hoàn tất đơn hàng
                </button>
            </div>

            <div class="bg-gray-50 p-8 lg:p-20 order-1 lg:order-2">
                <h2 class="text-lg font-bold uppercase tracking-wide mb-6">Giỏ hàng (2)</h2>
                <div class="space-y-6 mb-8">
                    <div class="flex gap-4">
                        <div class="relative w-20 h-24 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=200" class="w-full h-full object-cover">
                            <span class="absolute -top-2 -right-2 bg-gray-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">1</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-serif font-bold">Silk Elegance Dress</h4>
                            <p class="text-sm text-gray-500">Size: M / Màu: Đen</p>
                        </div>
                        <p class="font-medium">1.200.000 ₫</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="relative w-20 h-24 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1539008835657-9e8e9680c956?q=80&w=200" class="w-full h-full object-cover">
                            <span class="absolute -top-2 -right-2 bg-gray-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">1</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-serif font-bold">Velvet Blazer</h4>
                            <p class="text-sm text-gray-500">Size: L / Màu: Xanh</p>
                        </div>
                        <p class="font-medium">2.500.000 ₫</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6 space-y-2 text-sm">
                    <div class="flex justify-between text-gray-500">
                        <span>Tạm tính</span>
                        <span>3.700.000 ₫</span>
                    </div>
                    <div class="flex justify-between text-gray-500">
                        <span>Phí vận chuyển</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="flex justify-between text-xl font-serif font-bold mt-4 pt-4 border-t border-gray-200">
                        <span>Tổng cộng</span>
                        <span>3.700.000 ₫</span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
