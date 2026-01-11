@extends('admin.layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('head-script')
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    serif: ['"Playfair Display"', 'serif'],
                    sans: ['"Inter"', 'sans-serif']
                },
                colors: {
                    brand: {
                        black: '#1a1a1a',
                        gray: '#f4f4f5'
                    }
                }
            }
        }
    }
    window.axios = axios;
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    }
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
@section('style')
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    body {
        scrollbar-width: thin;
        scrollbar-color: #d1d5db #f1f1f1;
        font-family: "Inter", sans-serif;
    }
</style>
@endsection
@section('content')
<div class="flex-1 overflow-y-auto p-6 custom-scrollbar">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                <i class="fas fa-cube"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Tổng sản phẩm</p>
                <p class="text-2xl font-bold text-gray-900">{{ $products->count() }}</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center text-xl">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Sắp hết hàng</p>
                <p class="text-2xl font-bold text-red-500">12</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center text-xl">
                <i class="fas fa-eye"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Đang hiển thị</p>
                <p class="text-2xl font-bold text-gray-900">1,180</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="relative w-full md:w-96">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Tìm kiếm sản phẩm..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition shadow-sm">
        </div>
        <div class="flex gap-3 w-full md:w-auto">
            <button class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm">
                <i class="fas fa-filter mr-2"></i> Bộ lọc
            </button>
            <button onclick="openModal()" class="px-5 py-2.5 bg-black text-white rounded-lg text-sm font-bold hover:bg-gray-800 shadow-lg shadow-black/20 flex items-center gap-2 transition-transform active:scale-95">
                <i class="fas fa-plus"></i> Thêm mới
            </button>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="p-4 w-10 text-center"><input type="checkbox" class="rounded accent-black"></th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">STT</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Mã số</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Sản phẩm</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Danh mục</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nhãn hiệu</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Trạng thái</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Tổng tồn kho</th>
                    <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right pr-12">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                </tr>
                @foreach ($products as $product)
            <tbody x-data="{ open: false }">
                <tr class="group hover:bg-blue-50 border-blue-200 transition" :class="open ? 'bg-blue-50 border-blue-200' : 'bg-white'"
                    class="border-b transition-colors duration-300">
                    <td class="p-4 text-center"><input type="checkbox" class="rounded accent-black"></td>
                    <td class="p-4 text-sm font-medium">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4 text-sm font-medium">
                        {{ $product->id }}
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/'.$product->thumbnail) }}" class="w-10 h-14 object-cover rounded bg-gray-100">
                            <div>
                                <p class="font-medium text-gray-900 group-hover:text-blue-600 transition">{{ $product->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm font-medium">
                        {{ $product->category->name }}
                    </td>
                    <td class="p-4 text-sm font-medium">
                        {{ $product->brand->name }}
                    </td>
                    <td class="p-4 text-center">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                            @if($product->status)
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Hoạt động
                            @else
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Không hoạt động
                            @endif
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <span class="text-sm text-gray-600">{{ $product->variants->sum('quantity') }}</span>
                    </td>
                    <td class="p-4 text-right">
                        <button class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-edit"></i></button>
                        <button class="text-gray-400 hover:text-red-500 p-2 transition"><i class="fas fa-trash"></i></button>
                        <button class="text-gray-400 hover:text-black p-2 transition" @click="open = !open">
                            <i class="fas fa-chevron-down" :class="open ? 'rotate-180' : ''">
                            </i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <template x-if="open">
                        <td colspan="9" class="p-0">
                            <div class="p-4 border-l-4 border-blue-500 ml-6">
                                <table class="w-full text-sm">
                                    <thead class="bg-blue-50 border-b border-gray-200">
                                        <tr class="text-center">
                                            <th class="p-2 w-10 text-center"><input type="checkbox" class="rounded accent-black"></th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">STT</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Mã số</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Màu sắc</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kích cỡ</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá gốc</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá giảm</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tồn kho</th>
                                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->variants as $variant)
                                        <tr class="border-b text-center">
                                            <td class="p-2 text-center"><input type="checkbox" class="rounded accent-black"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $variant->id }}</td>
                                            <td>
                                                <span class="px-2 rounded-full bg-[{{$variant->color->hex_code}}] mr-1"></span>{{ $variant->color->name }}
                                            </td>
                                            <td>{{ $variant->size->name }}</td>
                                            <td><x-money :value="$variant->price" /></td>
                                            <td><x-money :value="$variant->sale_price" /></td>
                                            <td>{{ $variant->quantity }}</td>
                                            <td class="p-4 text-right">
                                                <button class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-edit"></i></button>
                                                <button class="text-gray-400 hover:text-red-500 p-2 transition"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </template>
                </tr>
            </tbody>
            @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
@section('pop')
<!-- Popup Add Product -->
<div id="product-modal" class="fixed inset-0 z-50 hidden">
    <div id="modal-backdrop" class=" absolute inset-0 bg-black/40 backdrop-blur-sm transition-opacity opacity-0"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="absolute inset-0" aria-hidden="true" onclick="closeModal()"></div>
        <div id="modal-panel" class="bg-white w-full max-w-2xl shadow-2xl transform scale-95 opacity-0 transition-all duration-300 rounded-lg flex flex-col max-h-[90vh]">

            <!-- Header -->
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-bold">Thêm sản phẩm mới</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition text-xl px-2">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Content -->
            <div class="p-6 overflow-y-auto custom-scrollbar">
                <form id="productForm" class="space-y-6">
                    <!-- Tên -->
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Tên sản phẩm</label>
                            <input type="text" name="name" class="w-full p-2.5 border rounded text-sm" placeholder="Ví dụ: Áo thun basic" required>
                        </div>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Danh mục -->
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Danh mục</label>
                            <span id="category-error" class="text-xs text-red-500 italic"></span>
                            <select id="category-select" name="category_id" class="cursor-pointer">
                                <option value="" disabled selected hidden>Chọn danh mục...</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Nhãn hiệu -->
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Nhãn hiệu</label>
                            <span id="brand-error" class="text-xs text-500-red italic"></span>
                            <select id="brand-select" name="brand_id" class="cursor-pointer">
                                <option value="" disabled selected hidden>Chọn nhãn hiệu...</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Kích thước -->
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Kích thước</label>
                            <span id="size-error" class="text-xs text-red-500 italic">Vui lòng chọn danh mục!</span>
                            <select id="size-select" name="sizes[]" class="cursor-pointer" multiple>
                                <option value="" disabled selected hidden>Chọn nhiều kích thước...</option>
                            </select>
                        </div>
                        <!-- Màu sắc -->
                        <div>
                            <label for="color_picker" class="text-xs font-semibold uppercase text-gray-500">Màu sắc</label>
                            <span id="color-error" class="text-xs text-red-500 italic"></span>
                            <select id="color-select" name="colors[]" class="cursor-pointer" multiple>
                                <option value="" disabled selected hidden>Chọn nhiều màu sắc...</option>
                                @foreach ($colors as $color)
                                <option value="{{$color->id}}" data-hex="{{$color->hex_code}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Giá + Tồn kho -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Giá nhập</label>
                            <input type="number" class="w-full p-2.5 border rounded text-sm" placeholder="0">
                        </div>
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Giá bán</label>
                            <input type="number" class="w-full p-2.5 border rounded text-sm" placeholder="0" required>
                        </div>
                        <div>
                            <label class="text-xs font-semibold uppercase text-gray-500">Số lượng</label>
                            <input type="number" class="w-full p-2.5 border rounded text-sm" placeholder="0" required>
                        </div>
                    </div>

                    <!-- Trạng thái -->
                    <div>
                        <label class="text-xs font-semibold uppercase text-gray-500">Trạng thái</label>
                        <select class="w-full p-2.5 border rounded text-sm cursor-pointer">
                            <option value="active">Đang bán</option>
                            <option value="hidden">Ẩn</option>
                            <option value="out_stock">Hết hàng</option>
                        </select>
                    </div>

                    <!-- Upload ảnh -->
                    <div>
                        <label class="text-xs font-semibold uppercase text-gray-500">Hình ảnh</label>
                        <input type="file" id="productImage" accept="image/*" class="w-full border p-2.5 text-sm rounded cursor-pointer" onchange="previewImage(event)">
                        <img id="productPreview" class="mt-3 w-20 h-24 object-cover rounded hidden border">
                    </div>

                    <!-- Mô tả -->
                    <div>
                        <label class="text-xs font-semibold uppercase text-gray-500">Mô tả</label>
                        <textarea rows="3" class="w-full p-2.5 border rounded text-sm" placeholder="Mô tả ngắn sản phẩm..."></textarea>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-end gap-3 pt-3 border-t">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200">Hủy</button>
                        <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded hover:bg-gray-800">Lưu sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    new TomSelect("#category-select", {
        create: async function(input, callback) {
            const data = {
                name: input
            };
            const msg = document.getElementById('category-error');
            try {
                msg.innerHTML = "...";
                const res = await axios.post("{{ route('admin.category.store') }}", data)
                const result = res.data;
                callback({
                    value: result.data.id,
                    text: result.data.name,
                });
                msg.className = 'text-xs text-green-500 italic'
                msg.innerHTML = `Đã thêm "${result.data.name}" thành công!`;
            } catch (error) {
                callback(false);
                if (error.response) {
                    msg.className = 'text-xs text-red-500 italic';
                    msg.innerHTML = Object.values(error.response.data.errors).flat()[0];
                } else {
                    console.log('Fetch error:', error);
                    alert('Không thể kết nối đến server');
                }
            }
        },
        sortField: {
            field: "text",
            order: "asc"
        }
    });
    new TomSelect("#brand-select", {
        create: async function(input, callback) {
            const data = {
                name: input
            };
            const msg = document.getElementById('brand-error');
            try {
                msg.innerHTML = "...";
                const res = await axios.post("{{ route('admin.brand.store') }}", data)
                const result = res.data;
                callback({
                    value: result.data.id,
                    text: result.data.name,
                });
                msg.className = 'text-xs text-green-500 italic'
                msg.innerHTML = `Đã thêm "${result.data.name}" thành công!`;
            } catch (error) {
                callback(false);
                if (error.response) {
                    msg.className = 'text-xs text-red-500 italic';
                    msg.innerHTML = Object.values(error.response.data.errors).flat()[0];
                } else {
                    console.log('Fetch error:', error);
                    alert('Không thể kết nối đến server');
                }
            }
        },
        sortField: {
            field: "text",
            order: "asc"
        }
    });

    new TomSelect("#color-select", {

        create: async function(input, callback) {
            const pick = this.dropdown.querySelector('#color-picker');
            const data = {
                name: input,
                hex_code: pick.value,
            }
            if (data.hex_code === '#000000') {
                const confirmBlack = confirm("Bạn đang chọn màu đen mặc định, tiếp tục?");
                if (!confirmBlack) return callback(false);
            }
            const msg = document.getElementById('color-error');
            try {
                msg.innerHTML = "...";
                const res = await axios.post("{{ route('admin.color.store') }}", data)
                const result = res.data;
                callback({
                    value: result.data.id,
                    text: result.data.name,
                    hex: result.data.hex_code,
                });
                msg.className = 'text-xs text-green-500 italic'
                msg.innerHTML = `Đã thêm "${result.data.name}" thành công!`;
            } catch (error) {
                callback(false);
                if (error.response) {
                    msg.className = 'text-xs text-red-500 italic';
                    msg.innerHTML = error.response.data.message;
                } else {
                    console.log('Fetch error:', error);
                    alert('Không thể kết nối đến server');
                }
            }
        },
        plugins: ['remove_button'],
        render: {
            option_create: function(data, escape) {
                return `
                <div class="create flex items-center justify-between p-2">
                    <span>Thêm màu: <strong>${escape(data.input)}</strong></span>
                    <div class="flex items-center gap-2" onclick="event.stopPropagation();">
                        <input type="color" id="color-picker"
                               class="w-6 h-6 border-none cursor-pointer" value='NULL'>
                        <span class="text-xs text-blue-600 font-bold">Chọn màu</span>
                    </div>
                </div>`;
            },
            item: function(data, escape) {
                return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border">
                <span class="w-4 h-4 rounded-full bg-[${escape(data.hex)}] mr-1 border"></span>
                ${escape(data.text)}
            </span>`;
            },
            option: function(data, escape) {
                return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border">
                <span class="w-4 h-4 rounded-full bg-[${escape(data.hex)}] mr-1 border"></span>
                ${escape(data.text)}
            </span>`;
            }
            // Cách hiển thị trong DANH SÁCH THẢ XUỐNG
        },
        sortField: {
            field: "text",
            order: "asc",
        },
    });

    const size = new TomSelect("#size-select", {
        valueField: 'id',
        labelField: 'name',
        options: [],
        create: async function(input, callback) {
            const data = {
                name: input,
                category_id: document.getElementById('category-select').value,
            }
            const msg = document.getElementById('size-error');
            try {
                msg.innerHTML = "...";
                const res = await axios.post("{{ route('admin.size.store') }}", data)
                const result = res.data;
                callback({
                    id: result.data.id,
                    name: result.data.name,
                });
                msg.className = 'text-xs text-green-500 italic'
                msg.innerHTML = `Đã thêm "${result.data.name}" thành công!`;
            } catch (error) {
                callback(false);
                if (error.response) {
                    msg.className = 'text-xs text-red-500 italic';
                    msg.innerHTML = error.response.data.message;
                } else {
                    console.log('Fetch error:', error);
                    alert('Không thể kết nối đến server');
                }
            }
        },
        plugins: ['remove_button'],
        searchField: 'name',
        sortField: {
            field: "name",
            order: "asc",
        },
    });

    const cate = document.getElementById('category-select');
    cate.onchange = async function() {
        size.clear();
        size.clearOptions();
        const msg = document.getElementById('size-error');
        try {
            msg.innerHTML = 'Đang tải...'
            const res = await axios.get("{{ route('admin.category.size') }}", {
                params: {
                    id: this.value
                }
            })
            msg.innerHTML = ''
            size.addOptions(res.data);
            size.refreshOptions(false);
        } catch (error) {
            if (error.response) {
                msg.className = 'text-xs text-red-500 italic';
                msg.innerHTML = error.response.data.message;
            } else {
                console.log('Fetch error:', error);
                alert('Không thể kết nối đến server');
            }
        }
    }

    function openModal() {
        const modal = document.getElementById('product-modal');
        const panel = document.getElementById('modal-panel');
        const backdrop = document.getElementById('modal-backdrop');

        modal.classList.remove('hidden');
        setTimeout(() => {
            panel.classList.remove('opacity-0', 'scale-95');
            panel.classList.add('opacity-100', 'scale-100');
            backdrop.classList.remove("opacity-0");
            backdrop.classList.add("opacity-100");
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('product-modal');
        const panel = document.getElementById('modal-panel');
        const backdrop = document.getElementById('modal-backdrop');

        panel.classList.add('opacity-0', 'scale-95');
        panel.classList.remove('opacity-100', 'scale-100');
        backdrop.classList.add("opacity-0");

        setTimeout(() => {
            modal.classList.add('hidden');
            backdrop.classList.remove("opacity-100");
        }, 200);
    }

    function previewImage(e) {
        const img = document.getElementById('productPreview');
        img.src = URL.createObjectURL(e.target.files[0]);
        img.classList.remove("hidden");
    }

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        if (sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    }
</script>
@endsection