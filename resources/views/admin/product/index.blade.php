@extends('admin.layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
@endsection
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
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
    <div class="flex justify-center">
        @if($errors->any())
        <div class="mb-8" style="color: #721c24; padding: 10px; border: 1px solid #721c24; background: #f8d7da;">
            Có lỗi xảy ra khi thêm sản phẩm, vui lòng kiểm tra lại!
        </div>
        @endif
        @if (session('success'))
        <div class="mb-8" style="color: green; padding: 10px; border: 1px solid green; background: #e9f7ef;">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="flex gap-3 w-full md:w-auto">
            <a href="{{ route('admin.product.trash') }}">
                <button class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm">
                    <i class="fas fa-trash mr-2"></i> Thùng rác
                </button>
            </a>
            <div class="relative w-full md:w-96">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Tìm kiếm sản phẩm..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition shadow-sm">
            </div>
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
            @foreach ($products as $product)
            <tbody class="divide-y divide-gray-100" x-data="{ open: false }">
                <tr @click="open = !open" class=" group hover:bg-blue-50 border-blue-200 transition" :class="open ? 'bg-gray-50 border-gray-200' : 'bg-white'"
                    class="border-b transition-colors duration-300">
                    <td class="p-4 text-sm font-medium border-r text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4 text-sm font-medium text-center">
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
                    <td class="p-4 text-right flex flex-row justify-center" @click.stop>
                        <button class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-edit fa-lg"></i></button>
                        <form action="{{ route('admin.product.delete', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-500 p-2 transition" @click="if(!confirm('Bạn có chắc chắn muốn xóa?')) $event.preventDefault()">
                                <i class=" fas fa-trash fa-lg"></i>
                            </button>
                        </form>
                        <button @click="open = !open" class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-chevron-down fa-lg" :class="open ? 'rotate-180' : ''"></i></button>
                    </td>
                </tr>
                <tr>
                    <template x-if="open">
                        <td colspan="9" class="p-0">
                            <div class="p-4 border-l-4 border-blue-500 ml-6">
                                <table class="w-full text-sm">
                                    <thead class="bg-blue-50 border-b border-gray-200">
                                        <tr class="text-center">
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">STT</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Mã số</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Màu sắc</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kích cỡ</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá gốc</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá giảm</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tồn kho</th>
                                            <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Trạng thái</th>
                                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->variants as $variant)
                                        <tr class="border-b text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $variant->id }}</td>
                                            <td>
                                                <span class="border px-2 rounded-full bg-[{{$variant->color->hex_code}}] mr-1"></span>{{ $variant->color->name }}
                                            </td>
                                            <td>{{ $variant->size->name }}</td>
                                            <td><x-money :value="$variant->price" /></td>
                                            <td><x-money :value="$variant->sale_price" /></td>
                                            <td>{{ $variant->quantity }}</td>
                                            <td>
                                                @if($variant->status)
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Hoạt động
                                                </span>
                                                @else
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Không hoạt động
                                                </span>
                                                @endif
                                            </td>
                                            <td class="p-4 flex justify-end">
                                                <button class="text-gray-400 hover:text-black p-2 transition"><i class="fas fa-edit"></i></button>
                                                <form method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-500 p-2 transition" @click="if(!confirm('Bạn có chắc chắn muốn xóa?')) $event.preventDefault()">
                                                        <i class=" fas fa-trash"></i>
                                                    </button>
                                                </form>
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
<div id="product-modal" class="fixed inset-0 z-50 hidden" x-data="{ isExpanded: false }">
    <div id="modal-backdrop" class=" absolute inset-0 bg-black/40 backdrop-blur-sm transition-opacity opacity-0"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="absolute inset-0" aria-hidden="true" onclick="closeModal()"></div>
        <div x-data="variantManager()" id="modal-panel" class="bg-white w-full max-w-2xl shadow-2xl transform scale-95 opacity-0 transition-all duration-300 rounded-lg flex max-h-[90vh]" :class="isExpanded ? 'max-w-7xl' : 'max-w-2xl'">
            <div class="overflow-y-auto flex-col max-w-2xl shrink-0">
                <!-- Header -->
                <div class="flex justify-between items-center p-6 border-b">
                    <h3 class="text-xl font-bold">Thêm sản phẩm mới</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition text-xl px-2">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="overflow-y-auto max-h-[79vh]">
                    <!-- Content -->
                    <div class="p-6 overflow-y-auto custom-scrollbar">
                        <form method="POST" action="{{ route('admin.product.store') }}" id="productForm" class="space-y-6" enctype="multipart/form-data">
                            @csrf
                            <!-- Tên -->
                            <div class="grid grid-cols-1 md:grid-cols-1">
                                <div>
                                    @foreach ($errors->all() as $error)
                                    <li class="text-red-700 text-sm flex items-start">
                                        <i class="fas fa-caret-right mt-1 mr-2 text-red-400"></i>
                                        {{ $error }}
                                    </li>
                                    @endforeach
                                    <label class="text-xs font-semibold uppercase text-gray-500">Tên sản phẩm</label>
                                    @error('name')
                                    <span class="text-xs text-red-500 italic">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <span id="name-error" class="text-xs text-red-500 italic">*</span>
                                    <input value="{{ old('name') }}" id="name-input" type="text" name="name" class="w-full p-2.5 border rounded text-sm" placeholder="Ví dụ: Áo thun basic" maxlength="255">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Danh mục -->
                                <div>
                                    <label for="category-select" class="text-xs font-semibold uppercase text-gray-500">Danh mục</label>
                                    @error('category_id')
                                    <span class="text-xs text-red-500 italic">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <span id="category-error" class="text-xs text-red-500 italic">*</span>
                                    <select value="{{ old('category_id') }}" x-ref="categorySelect" id="category-select" name="category_id" class="cursor-pointer">
                                        <option value="" disabled selected hidden>Chọn danh mục...</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @selected(old('category_id')==$category->id)>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Nhãn hiệu -->
                                <div>
                                    <label for="brand-select" class="text-xs font-semibold uppercase text-gray-500">Nhãn hiệu</label>
                                    @error('brand_id')
                                    <span class="text-xs text-red-500 italic">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <span id="brand-error" class="text-xs text-red-500 italic">*</span>
                                    <select value="{{ old('brand_id') }}" x-ref="brandSelect" id="brand-select" name="brand_id" class="cursor-pointer">
                                        <option value="" disabled selected hidden>Chọn nhãn hiệu...</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" @selected(old('brand_id')==$brand->id)>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="border rounded-xl grid grid-cols-1 md:grid-cols-1 p-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Kích thước -->
                                    <div>
                                        <label class="text-xs font-semibold uppercase text-gray-500">Kích cỡ</label>
                                        <span id="size-error" class="text-xs text-red-500 italic">Vui lòng chọn danh mục trước!</span>
                                        <select x-ref="sizeSelect" id="size-select" name="sizes[]" class="cursor-pointer" multiple>
                                            <option value="" disabled selected hidden>Chọn nhiều kích thước...</option>
                                        </select>
                                    </div>
                                    <!-- Màu sắc -->
                                    <div>
                                        <label for="color-select" class="text-xs font-semibold uppercase text-gray-500">Màu sắc</label>
                                        <span id="color-error" class="text-xs text-red-500 italic"></span>
                                        <select x-ref="colorSelect" id="color-select" name="colors[]" class="cursor-pointer uppercase" multiple>
                                            <option value="" disabled selected hidden>Chọn nhiều màu sắc...</option>
                                            @foreach ($colors as $color)
                                            <option value="{{$color->id}}" data-hex="{{$color->hex_code}}" {{ (is_array(old('colors')) && in_array($color->id, old('colors'))) ? 'selected' : '' }}>{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Giá + Tồn kho -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="text-xs font-semibold uppercase text-gray-500">Giá gốc</label>
                                        <input id="inputPrice" type="number" class="w-full p-2.5 border rounded text-sm" placeholder="0" min="0" step="1">
                                    </div>
                                    <div>
                                        <label class="text-xs font-semibold uppercase text-gray-500">Giá đã giảm</label>
                                        <input id="inputSalePrice" type="number" class="w-full p-2.5 border rounded text-sm" placeholder="0" min="0" step="1">
                                    </div>
                                    <div>
                                        <label class="text-xs font-semibold uppercase text-gray-500">Số lượng</label>
                                        <input id="inputStock" type="number" class="w-full p-2.5 border rounded text-sm" placeholder="0" min="0" step="1">
                                    </div>
                                </div>
                                <div class="text-center mt-5 gap-15">
                                    <button @click="isExpanded = !isExpanded" type="button" class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200">Ẩn/Hiện danh sách</button>
                                    <button @click="handleGenerateClick()" type="button" class="px-4 py-2 bg-black text-white text-sm rounded hover:bg-gray-800">Tạo biến thể</button>
                                </div>
                            </div>

                            <!-- Trạng thái -->
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                                <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl shadow-sm">
                                    <span class="text-xs font-semibold uppercase text-gray-500">Trạng thái của sản phẩm</span>
                                    <div class="inline-flex p-1 bg-gray-100 rounded-lg">
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="1" class="peer hidden" checked>
                                            <span class="flex items-center px-4 py-2 text-xs font-bold rounded-md transition-all peer-checked:bg-white peer-checked:text-green-600 peer-checked:shadow-sm text-gray-400 hover:text-gray-600">
                                                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                                                Hoạt động
                                            </span>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="0" class="peer hidden">
                                            <span class="flex items-center px-4 py-2 text-xs font-bold rounded-md transition-all peer-checked:bg-white peer-checked:text-red-500 peer-checked:shadow-sm text-gray-400 hover:text-gray-600">
                                                <span class="w-2 h-2 rounded-full bg-red-400 mr-2"></span>
                                                Tạm ẩn
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload ảnh -->
                            <div>
                                <label class="text-xs font-semibold uppercase text-gray-500">Hình ảnh</label>
                                <span id="image-error" class="text-xs text-red-500 italic"></span>
                                <div>
                                    <div id="crop-area" class="hidden mx-auto ">
                                        <div id="upload-crop"></div>
                                        <div class="flex justify-center gap-1">
                                            <button type="button" class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200" id="crop-cancel-button">Hủy</button>
                                            <button type="button" class="px-4 py-2 bg-black text-white text-sm rounded hover:bg-gray-800" id="crop-button">Cắt ảnh</button>
                                        </div>
                                    </div>
                                    <div id="image-area" class="max-w-4xl mx-auto p-4">
                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 h-[400px]">

                                            <div class="md:col-span-2 relative group overflow-hidden rounded-2xl shadow-lg">
                                                <div id="image-1" class="flex items-center justify-center w-full h-full">
                                                    <label for="upload-1" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                                            <p class="mb-2 text-sm text-gray-500 font-semibold text-center px-2">Nhấn để tải ảnh</p>
                                                            <p class="text-xs text-gray-400 font-medium">PNG, JPG hoặc JPEG (Tỉ lệ 3:4)</p>
                                                            <p class="text-xs text-gray-400 font-medium">Tối đa: 2MB</p>
                                                        </div>
                                                        <input id="upload-1" data-index="1" type="file" class="hidden image-upload" accept="image/*" />
                                                    </label>
                                                </div>
                                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" id="preview-1" src="" style="display:none;">
                                                <button type="button" onclick="removeImage(1)" id="btn-delete-1"
                                                    class="hidden absolute top-2 right-2 z-20 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full hover:bg-red-600 transition shadow-lg">
                                                    <i class="fas fa-trash-alt text-xs"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4 bg-white/80 backdrop-blur px-3 py-1 rounded-full text-sm font-semibold shadow-sm">
                                                    Ảnh chính
                                                </div>
                                            </div>

                                            <div class="md:col-span-2 grid grid-cols-4 md:grid-cols-2 gap-3 h-full">
                                                <div class="relative rounded-xl overflow-hidden cursor-pointer shadow-md">
                                                    <div id="image-2" class="flex items-center justify-center w-full h-full">
                                                        <label for="upload-2" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                                                <p class="mb-2 text-xs text-gray-500 font-semibold text-center px-2">Nhấn để tải ảnh</p>
                                                            </div>
                                                            <input id="upload-2" data-index="2" type="file" class="hidden image-upload" accept="image/*" />
                                                        </label>
                                                    </div>
                                                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" id="preview-2" src="" style="display:none;">
                                                    <button type="button" onclick="removeImage(2)" id="btn-delete-2"
                                                        class="hidden absolute top-2 right-2 z-20 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full hover:bg-red-600 transition shadow-lg">
                                                        <i class="fas fa-trash-alt text-xs"></i>
                                                    </button>
                                                </div>
                                                <div class="relative rounded-xl overflow-hidden cursor-pointer shadow-md">
                                                    <div id="image-3" class="flex items-center justify-center w-full h-full">
                                                        <label for="upload-3" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                                                <p class="mb-2 text-xs text-gray-500 font-semibold text-center px-2">Nhấn để tải ảnh</p>
                                                            </div>
                                                            <input id="upload-3" data-index="3" type="file" class="hidden image-upload" accept="image/*" />
                                                        </label>
                                                    </div>
                                                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" id="preview-3" src="" style="display:none;">
                                                    <button type="button" onclick="removeImage(3)" id="btn-delete-3"
                                                        class="hidden absolute top-2 right-2 z-20 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full hover:bg-red-600 transition shadow-lg">
                                                        <i class="fas fa-trash-alt text-xs"></i>
                                                    </button>
                                                </div>
                                                <div class="relative rounded-xl overflow-hidden cursor-pointer shadow-md">
                                                    <div id="image-4" class="flex items-center justify-center w-full h-full">
                                                        <label for="upload-4" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                                                <p class="mb-2 text-xs text-gray-500 font-semibold text-center px-2">Nhấn để tải ảnh</p>
                                                            </div>
                                                            <input id="upload-4" data-index="4" type="file" class="hidden image-upload" accept="image/*" />
                                                        </label>
                                                    </div>
                                                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" id="preview-4" src="" style="display:none;">
                                                    <button type="button" onclick="removeImage(4)" id="btn-delete-4"
                                                        class="hidden absolute top-2 right-2 z-20 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full hover:bg-red-600 transition shadow-lg">
                                                        <i class="fas fa-trash-alt text-xs"></i>
                                                    </button>
                                                </div>
                                                <div class="relative rounded-xl overflow-hidden cursor-pointer shadow-md">
                                                    <div id="image-5" class="flex items-center justify-center w-full h-full">
                                                        <label for="upload-5" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                                                <p class="mb-2 text-xs text-gray-500 font-semibold text-center px-2">Nhấn để tải ảnh</p>
                                                            </div>
                                                            <input id="upload-5" data-index="5" type="file" class="hidden image-upload" accept="image/*" />
                                                        </label>
                                                    </div>
                                                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" id="preview-5" src="" style="display:none;">
                                                    <button type="button" onclick="removeImage(5)" id="btn-delete-5"
                                                        class="hidden absolute top-2 right-2 z-20 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full hover:bg-red-600 transition shadow-lg">
                                                        <i class="fas fa-trash-alt text-xs"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nhãn -->
                            <div>
                                <label for="tag-select" class="text-xs font-semibold uppercase text-gray-500">Nhãn</label>
                                <span id="tag-error" class="text-xs text-red-500 italic"></span>
                                <select x-ref="tagSelect" id="tag-select" name="tags[]" multiple>
                                    <option value="" disabled selected hidden>Chọn nhiều nhãn...</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
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
                            <input type="hidden" name="variants_data" :value="JSON.stringify(variants)">
                            <input type="file" id="thumbnailInput" name="cropped-thumbnail" class="hidden">
                            <input type="file" id="imagesInput" name="cropped-images[]" class="hidden" multiple>
                        </form>
                    </div>
                </div>
            </div>

            <div class="overflow-y-auto flex-col flex-1">
                <div class="w-full h-full p-6 overflow-y-auto bg-gray-50 transition-all duration-500"
                    :class="isExpanded ? 'opacity-100' : 'w-0 opacity-0'">
                    <div class="flex justify-between items-center p-6 border-b bg-white rounded-tl-xl rounded-tr-xl">
                        <h3 class="text-xl font-bold">Chi tiết các biến thể</h3>
                    </div>
                    <table class="w-full text-sm bg-white rounded-xl shadow-xl">
                        <thead class="bg-blue-50 border-b border-gray-200">
                            <tr class="text-center">
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">STT</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Màu sắc</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kích cỡ</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá gốc</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Giá giảm</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tồn kho</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Hoạt động</th>
                                <th class="p-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(variant, index) in variants" :key="variant.id">
                                <tr class="border-b text-center">
                                    <td x-text="index + 1">
                                    </td>
                                    <td>
                                        <span class="px-2 rounded-full mr-1 border" :style="`background-color: ${getHex(variant.color_id)}`"></span>
                                    </td>
                                    <td class="p-2">
                                        <span x-text="variant.size.name"></span>
                                    </td>
                                    <td class="p-2">
                                        <input type="number" x-model.number="variant.price" min="0"
                                            class=" w-full border-0 focus:ring-2 focus:ring-blue-400 rounded bg-transparent hover:bg-white p-1 uppercase">
                                    </td>
                                    <td class="p-2">
                                        <input type="number" x-model.number="variant.sale_price" min="0" @blur="if(variant.sale_price > variant.price) variant.sale_price = variant.price;"
                                            class=" w-full border-0 focus:ring-2 focus:ring-blue-400 rounded bg-transparent hover:bg-white p-1 uppercase">
                                    </td>
                                    <td class="p-2">
                                        <input type="number" x-model.number="variant.quantity" min="0"
                                            class="w-full border-0 focus:ring-2 focus:ring-blue-400 rounded bg-transparent hover:bg-white p-1 uppercase">
                                    </td>
                                    <td class="p-2">
                                        <input type="checkbox" x-model="variant.status">
                                    </td>
                                    <td class="p-3 text-center">
                                        <button @click="removeRow(index)" class="text-red-500 font-bold">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function variantManager() {
        return {
            isExpanded: false,
            variants: JSON.parse(`{!! old('variants_data', '[]') !!}`),
            colors: @json(old("colors", "[]")),
            sizes: @json(old("sizes", "[]")),
            colorMap: JSON.parse('@json($colors -> pluck("hex_code", "id"))'),

            init() {
                this.tsCategory = new TomSelect(this.$refs.categorySelect, {
                    create: async function(input, callback) {
                        if (confirm('Xác nhận thêm?')) {
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
                        } else {
                            callback(false);
                        }
                    },
                    sortField: {
                        field: "text",
                        order: "asc"
                    },
                    onChange: async (value, callback) => {
                        if (!value) {
                            document.getElementById('size-error').innerHTML = "Vui lòng chọn danh mục!";
                            return
                        };
                        this.variants = [];
                        await this.loadSizesByCategory(value);
                    }
                });

                this.tsBrand = new TomSelect(this.$refs.brandSelect, {
                    create: async function(input, callback) {
                        if (confirm('Xác nhận thêm?')) {
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
                        } else {
                            callback(false);
                        }
                    },
                    sortField: {
                        field: "text",
                        order: "asc"
                    }
                });

                this.tsColor = new TomSelect(this.$refs.colorSelect, {
                    create: async function(input, callback) {
                        if (confirm('Xác nhận thêm?')) {
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
                                this.colorMap[result.data.id] = result.data.hex_code;
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
                        } else {
                            callback(false);
                        }
                    },
                    onChange: (val) => {
                        this.colors = val;
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
                    },
                    sortField: {
                        field: "text",
                        order: "asc",
                    },
                });

                this.tsSize = new TomSelect(this.$refs.sizeSelect, {
                    valueField: 'id',
                    labelField: 'name',
                    options: [],
                    create: async function(input, callback) {
                        if (confirm('Xác nhận thêm?')) {
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
                        } else {
                            callback(false);
                        }
                    },
                    render: {
                        option: function(data, escape) {
                            return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border">
                            ${escape(data.name)}
                            </span>`;
                        }
                    },
                    onChange: (val) => {
                        this.sizes = val.map(id => {
                            const data = this.tsSize.options[id];
                            return {
                                id: id,
                                name: data.name,
                            };
                        });
                    },
                    plugins: ['remove_button'],
                    searchField: 'name',
                    sortField: {
                        field: "name",
                        order: "asc",
                    },
                });

                this.tsTag = new TomSelect(this.$refs.tagSelect, {
                    create: async function(input, callback) {
                        if (confirm('Xác nhận thêm?')) {
                            const data = {
                                name: input
                            };
                            const msg = document.getElementById('tag-error');
                            try {
                                msg.innerHTML = "...";
                                const res = await axios.post("{{ route('admin.tag.store') }}", data)
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
                                    msg.innerHTML = Object.values(error?.response?.data?.errors).flat()[0];
                                } else {
                                    console.log('Fetch error:', error);
                                    alert('Không thể kết nối đến server');
                                }
                            }
                        } else {
                            callback(false);
                        }
                    },
                    render: {
                        option: function(data, escape) {
                            return `<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium border">
                            ${escape(data.text)}
                            </span>`;
                        }
                    },
                    plugins: ['remove_button'],
                    sortField: {
                        field: "text",
                        order: "asc"
                    }
                });
                if (this.tsCategory.getValue()) {
                    document.getElementById('size-error').innerHTML = '';
                    this.loadSizesByCategory(this.tsCategory.getValue());
                }
                console.table(this.colors);
            },

            async loadSizesByCategory(categoryId) {
                this.tsSize.clear();
                this.tsSize.clearOptions();
                const msg = document.getElementById('size-error');
                try {
                    msg.innerHTML = 'Đang tải...'
                    const res = await axios.get("{{ route('admin.category.size') }}", {
                        params: {
                            id: categoryId
                        }
                    })
                    msg.innerHTML = ''
                    this.tsSize.addOptions(res.data);
                    this.tsSize.refreshOptions(false); //Refresh lại option để không cần reload lại trang
                } catch (error) {
                    if (error.response) {
                        msg.className = 'text-xs text-red-500 italic';
                        msg.innerHTML = error.response.data.message;
                    } else {
                        console.log('Fetch error:', error);
                        alert('Không thể kết nối đến server');
                    }
                }
                if (this.sizes) {
                    this.tsSize.setValue(this.sizes);
                }
            },

            getHex(id) {
                return this.colorMap[id];
            },

            // Hàm này phải nằm TRONG object trả về
            handleGenerateClick() {
                this.generateVariants();
                console.log("Dữ liệu biến thể:", this.variants)
                console.table(this.variants)
                if (this.variants.length > 0) {
                    this.isExpanded = true;
                }
            },

            generateVariants() {
                const inputColor = document.getElementById('color-select');
                const inputSize = document.getElementById('size-select');
                const msg = document.getElementById('generate-error');

                if (!inputColor.value || !inputSize.value) {
                    msg.innerHTML = "Vui lòng chọn ít nhất 1 Kích cỡ và 1 Màu sắc";
                    return;
                }

                if (this.variants.length > 0 && !confirm("Dữ liệu bảng hiện tại sẽ bị thay thế. Bạn có chắc chắn?")) {
                    return;
                }
                const priceInput = Number(document.getElementById('inputPrice').value) || 0;
                const salePriceInput = Number(document.getElementById('inputSalePrice').value) || 0;

                // Logic tạo các biến thể
                let results = []
                this.colors.forEach(c => {
                    this.sizes.forEach(s => {
                        results.push({
                            id: Date.now() + Math.random(),
                            // Lưu object để hiển thị tên
                            size: s,

                            //Lưu id để xử lý
                            color_id: c,
                            size_id: s.id,

                            // Các trường nhập liệu
                            price: priceInput,
                            sale_price: salePriceInput > priceInput ? priceInput : salePriceInput,
                            quantity: Number(document.getElementById('inputStock').value) || 0,
                            status: true,
                        });
                    });
                });
                this.variants = results;
            },
            removeRow(index) {
                if (confirm('Xóa biến thể này?')) {
                    this.variants.splice(index, 1);
                }
            }
        }
    }

    // 1. Khởi tạo Croppie
    window.croppedImages = {};
    var el = document.getElementById('upload-crop');
    var uploadCrop = new Croppie(el, {
        viewport: {
            width: 300,
            height: 400,
            type: 'square'
        }, // Khung cắt
        boundary: {
            width: 500,
            height: 400,
        }, // Vùng bao ngoài
        showZoomer: true, // Hiện thanh trượt zoom
    });

    // 2. Khi chọn ảnh từ máy tính
    const uploadInputs = document.querySelectorAll('.image-upload');

    uploadInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Nếu có file và file đó không phải là image thì chặn (reset)
            const msg = document.getElementById("image-error");
            const index = this.getAttribute('data-index'); // Lấy số 1, 2, 3...
            if (this.files && this.files[0]) {

                if (!this.files[0].type.startsWith('image/')) {
                    msg.innerHTML = 'Chỉ được chọn hình ảnh!';
                    this.value = '';
                    return;
                }
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Hiển thị vùng cắt ảnh
                    document.getElementById('crop-area').classList.remove('hidden');
                    //Ẩn vùng thêm ảnh
                    document.getElementById('image-area').classList.add('hidden');
                    // Nạp ảnh vào Croppie
                    uploadCrop.bind({
                        url: e.target.result
                    });

                    // Lưu lại index hiện tại
                    document.getElementById('crop-button').setAttribute('data-target', index);
                    document.getElementById('crop-cancel-button').setAttribute('data-target', index);

                    msg.innerHTML = '';
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // Khi nhấn nút hủy cắt ảnh
    document.getElementById('crop-cancel-button').addEventListener('click', function() {
        const targetIndex = this.getAttribute('data-target');
        if (confirm('Xác nhận hủy?')) {
            //xóa input
            document.getElementById('upload-' + targetIndex).value = "";
            //Ẩn vùng cắt ảnh
            document.getElementById('crop-area').classList.add('hidden');
            //Hiển thị vùng thêm ảnh
            document.getElementById('image-area').classList.remove('hidden');
        }
    });
    // 3. Khi nhấn nút "Cắt ảnh"
    document.getElementById('crop-button').addEventListener('click', function() {
        // 1. Lấy index (1, 2, 3...) mà input đang xử lý
        const targetIndex = this.getAttribute('data-target');

        uploadCrop.result({
            type: 'blob',
            size: {
                width: 1200,
                height: 1600
            } // Tỉ lệ 3:4
        }).then(function(blob) {
            // 2. Hiển thị xem trước vào đúng ô
            const previewElement = document.getElementById('preview-' + targetIndex);

            if (previewElement) {
                var url = URL.createObjectURL(blob);
                previewElement.src = url;
                previewElement.style.display = 'block';
                //Ẩn vùng thêm ảnh
                document.getElementById('image-' + targetIndex).style.display = 'none';
                //Hiển thị nút xóa
                document.getElementById('btn-delete-' + targetIndex).classList.remove('hidden');
                //Hiển thị vùng thêm ảnh
                document.getElementById('image-area').classList.remove('hidden');
                if (targetIndex == 1) {
                    document.getElementById('image-error').innerHTML = '';
                }
            }
            // 3. Lưu blob vào mảng toàn cục theo Index
            window.croppedImages[targetIndex] = blob;

            //Ẩn vùng cắt ảnh
            document.getElementById('crop-area').classList.add('hidden');
        });
    });
    // Nút xóa ảnh
    window.removeImage = function(index) {
        if (confirm('Xóa ảnh này?')) {
            document.getElementById('preview-' + index).classList.add('hidden');
            document.getElementById('btn-delete-' + index).classList.add('hidden');
            document.getElementById('upload-' + index).value = ""; // Reset input
            document.getElementById('preview-' + index).src = ""; // Reset image
            document.getElementById('image-' + index).style.display = 'block'; //Hiện vùng thêm ảnh
            delete window.croppedImages[index];
        }
    };

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

    //Hàm lằng nghe submit
    document.getElementById('productForm').addEventListener('submit', function(e) {

        //Lấy json từ bảng biến thể
        const formData = new FormData(this);
        const variantsRaw = formData.get('variants_data');

        //Chia hình ảnh thumbnail và hình ảnh con
        const thumbnail = new DataTransfer();
        const images = new DataTransfer();

        //Kiểm tra trước khi submit
        const name = document.getElementById('name-input');
        const brand = document.getElementById('brand-select');
        const category = document.getElementById('category-select');

        // Kiểm tra rỗng
        if (!variantsRaw || variantsRaw === '[]') {
            alert('Danh sách biến thể không được để trống!');
            e.preventDefault(); // Dừng submit lại
        }

        if (!name.value) {
            e.preventDefault();
            const nameMsg = document.getElementById('name-error')
            nameMsg.innerHTML = "Tên sản phẩm không được để trống!";
            nameMsg.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            })
        }

        if (!brand.value) {
            e.preventDefault();
            const brandMsg = document.getElementById('brand-error')
            brandMsg.innerHTML = "Vui lòng chọn nhãn hiệu!";
            brandMsg.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            })
        }

        if (!category.value) {
            e.preventDefault();
            const brandMsg = document.getElementById('category-error')
            brandMsg.innerHTML = "Vui lòng chọn danh mục!";
            brandMsg.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            })
        }

        //Xử lý ảnh khi submit
        if (!window.croppedImages || !window.croppedImages[1]) {
            e.preventDefault();
            const img = document.getElementById('image-error');
            img.innerHTML = 'Hình ảnh chính là bắt buộc!';
            img.scrollIntoView();
            return;
        }

        // Duyệt qua mảng các ảnh đã crop
        Object.keys(window.croppedImages).forEach(index => {
            const blob = window.croppedImages[index];
            if (!blob) return;
            const file = new File([blob], `image_${index}.png`, {
                type: "image/png"
            });
            //Hình thumbnail
            if (index == "1") {
                thumbnail.items.add(file);
                console.log('Đã thêm hình ảnh thumbnail');
            } else {
                //Hình ảnh con
                images.items.add(file);
                console.log("Đã thêm hình con!");
            }
        });

        const thumbInput = document.getElementById('thumbnailInput');
        const imgsInput = document.getElementById('imagesInput');

        thumbInput.files = thumbnail.files;
        imgsInput.files = images.files;

        console.log("Files in Thumb Input:", thumbInput.files.length);
        console.log("Files in Images Input:", imgsInput.files.length);
    });

    document.querySelector('input[type="number"]').addEventListener('keydown', function(e) {
        // Chặn phím
        if (['.', ',', 'e', 'E', '-'].includes(e.key)) {
            e.preventDefault();
        }
    });

    document.addEventListener('blur', function(e) {
        // Kiểm tra nếu là input type="number"
        if (e.target && e.target.type === 'number') {
            // Nếu giá trị trống hoặc không phải là số hợp lệ
            if (e.target.value === '') {
                e.target.value = 0;

                // Nếu bạn đang dùng Alpine.js, cần thông báo để nó cập nhật dữ liệu
                e.target.dispatchEvent(new Event('input'));
            }
        }
    }, true);
</script>
@endsection
