@extends('layouts.admin')
@section('head')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hoàn thiện</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { font-family: "Inter", sans-serif; }
    </style>
</head>
@endsection
@section('content')
    
        
        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 shadow-sm z-10">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="text-lg font-semibold text-gray-700">Tổng quan doanh thu</div>
                </div>

                <div class="flex items-center gap-4">
                    <button class="relative text-gray-500 hover:text-blue-500 transition-colors">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="h-8 w-px bg-gray-200 mx-2"></div>
                    <div class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" class="w-8 h-8 rounded-full">
                        <div class="hidden md:block text-sm">
                            <p class="font-medium text-gray-700">Admin User</p>
                            <p class="text-xs text-gray-500">Super Admin</p>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-400 hidden md:block"></i>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Tổng doanh thu</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">120.5M ₫</h3>
                            </div>
                            <div class="p-2 bg-green-100 text-green-600 rounded-lg"><i class="fas fa-dollar-sign"></i></div>
                        </div>
                        <p class="text-green-500 text-xs mt-4 flex items-center font-medium">
                            <i class="fas fa-arrow-up mr-1"></i> +12% <span class="text-gray-400 ml-1 font-normal">so với tháng trước</span>
                        </p>
                    </div>

                    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Đơn hàng mới</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">45</h3>
                            </div>
                            <div class="p-2 bg-blue-100 text-blue-600 rounded-lg"><i class="fas fa-shopping-bag"></i></div>
                        </div>
                        <p class="text-blue-500 text-xs mt-4 flex items-center font-medium">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></span> 5 đơn chưa xử lý
                        </p>
                    </div>

                     <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Khách hàng</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">1,203</h3>
                            </div>
                            <div class="p-2 bg-purple-100 text-purple-600 rounded-lg"><i class="fas fa-users"></i></div>
                        </div>
                        <p class="text-green-500 text-xs mt-4 flex items-center font-medium">
                             <i class="fas fa-arrow-up mr-1"></i> +3% <span class="text-gray-400 ml-1 font-normal">tuần này</span>
                        </p>
                    </div>

                    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Tồn kho thấp</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">8</h3>
                            </div>
                            <div class="p-2 bg-red-100 text-red-600 rounded-lg"><i class="fas fa-exclamation-triangle"></i></div>
                        </div>
                        <p class="text-red-500 text-xs mt-4 flex items-center font-medium">
                            Cần nhập hàng gấp
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="font-bold text-gray-700">Biểu đồ doanh thu (2024)</h4>
                            <select class="text-sm border-gray-200 border rounded p-1 text-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option>Tháng này</option>
                                <option>Năm nay</option>
                            </select>
                        </div>
                        <div class="relative h-72 w-full">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <h4 class="font-bold text-gray-700 mb-4">Sản phẩm bán chạy</h4>
                        <ul class="space-y-4 overflow-y-auto max-h-72 pr-2">
                            <li class="flex items-center justify-between border-b border-gray-50 pb-3">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=100&q=80" class="w-10 h-10 object-cover rounded bg-gray-100">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Áo sơ mi lụa</p>
                                        <p class="text-xs text-gray-500">SKU: SM-001</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-700">45 bán</span>
                            </li>
                            <li class="flex items-center justify-between border-b border-gray-50 pb-3">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100&q=80" class="w-10 h-10 object-cover rounded bg-gray-100">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Giày Sneaker Red</p>
                                        <p class="text-xs text-gray-500">SKU: SN-202</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-700">32 bán</span>
                            </li>
                            <li class="flex items-center justify-between border-b border-gray-50 pb-3">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?w=100&q=80" class="w-10 h-10 object-cover rounded bg-gray-100">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Áo Thun Basic</p>
                                        <p class="text-xs text-gray-500">SKU: AT-990</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-700">28 bán</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=100&q=80" class="w-10 h-10 object-cover rounded bg-gray-100">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Quần Jeans Slim</p>
                                        <p class="text-xs text-gray-500">SKU: QJ-101</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-slate-700">15 bán</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h4 class="font-bold text-gray-700">Đơn hàng gần đây</h4>
                        <button class="text-blue-500 text-sm hover:underline">Xem tất cả</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3">ID Đơn</th>
                                    <th class="px-6 py-3">Khách hàng</th>
                                    <th class="px-6 py-3">Sản phẩm</th>
                                    <th class="px-6 py-3">Tổng tiền</th>
                                    <th class="px-6 py-3">Trạng thái</th>
                                    <th class="px-6 py-3">Ngày đặt</th>
                                    <th class="px-6 py-3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">#ORD-001</td>
                                    <td class="px-6 py-4">Nguyễn Văn A</td>
                                    <td class="px-6 py-4 truncate max-w-[150px]">Áo sơ mi lụa, Quần Jean</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">1.500.000 ₫</td>
                                    <td class="px-6 py-4"><span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Chờ duyệt</span></td>
                                    <td class="px-6 py-4">2024-01-05</td>
                                    <td class="px-6 py-4"><button class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i></button></td>
                                </tr>
                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">#ORD-002</td>
                                    <td class="px-6 py-4">Trần Thị B</td>
                                    <td class="px-6 py-4 truncate max-w-[150px]">Giày Sneaker Red</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">850.000 ₫</td>
                                    <td class="px-6 py-4"><span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Đang giao</span></td>
                                    <td class="px-6 py-4">2024-01-04</td>
                                    <td class="px-6 py-4"><button class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i></button></td>
                                </tr>
                                <tr class="bg-white hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">#ORD-003</td>
                                    <td class="px-6 py-4">Lê Văn C</td>
                                    <td class="px-6 py-4 truncate max-w-[150px]">Áo Thun Basic (x3)</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">450.000 ₫</td>
                                    <td class="px-6 py-4"><span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Hoàn thành</span></td>
                                    <td class="px-6 py-4">2024-01-03</td>
                                    <td class="px-6 py-4"><button class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            // Toggle translate class to show/hide sidebar
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                // Close sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                    datasets: [{
                        label: 'Doanh thu (Triệu VNĐ)',
                        data: [65, 59, 80, 81, 56, 55, 40, 70, 90, 110, 105, 120],
                        borderColor: 'rgb(59, 130, 246)', // Tailwind Blue-500
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 2,
                        tension: 0.3, // Curve the line slightly
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f3f4f6'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection