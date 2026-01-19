<div x-data="{ open: {{ $errors->add->any()? 'true' : 'false' }}, oldData: {{ $errors->add->any()? json_encode(old()) : json_encode((object)['status' => 1]) }} }"
    x-show="open"
    x-on:open-add-modal.window="open = true"
    style="display: none;"
    class="fixed inset-0 z-[9999] overflow-y-auto">

    <template x-teleport="body">
        <div x-show="open" class="fixed inset-0 z-[9999] flex items-center justify-center p-4">

            <div x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="open = false"
                class="absolute inset-0 bg-black/50 backdrop-blur-sm">
            </div>

            <div x-show="open"
                x-data="brandAddManager()"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white shadow-2xl rounded-lg flex relative w-2/5 max-h-[90vh] overflow-hidden transition-all">

                <div class="overflow-y-auto max-h-[79vh] flex-grow">
                    <div class="flex-col overflow-y-auto max-w-2xl">
                        <div class="flex justify-between items-center p-6 border-b">
                            <h3 class="text-lg font-bold mr-2">Thêm thương hiệu mới</h3>
                            <button @click="open = false" class="text-gray-400 hover:text-red-500 transition text-xl px-2">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- Content -->
                        <div class="p-6 overflow-y-auto custom-scrollbar">
                            <form method="POST" action="{{ route('admin.brand.store') }}" x-ref="brandForm" class="space-y-6" @submit="handleSubmit($event)">
                                @csrf
                                @foreach ($errors->add->all() as $error)
                                <li class="text-red-700 text-sm flex items-start">
                                    <i class="fas fa-caret-right mt-1 mr-2 text-red-400"></i>
                                    {{ $error }}
                                </li>
                                @endforeach
                                <div class="border rounded-xl grid grid-cols-1 md:grid-cols-1 p-5">
                                    <div class=" grid grid-cols-1 md:grid-cols-1">
                                        <div>
                                            <label class="text-xs font-semibold uppercase text-gray-500">Tên thương hiệu</label>
                                            <span x-ref="nameError" class="text-xs text-red-500 italic">*</span>
                                            <input x-model="oldData.name" x-ref="nameInput" type="text" name="name" class="w-full p-2.5 border rounded text-sm" placeholder="Nhập tên thương hiệu" maxlength="255">
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="flex justify-end gap-3 pt-3 border-t">
                                    <button type="button" @click="open = false" class="px-4 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200">Hủy</button>
                                    <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded hover:bg-gray-800">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
@push('scripts')
<script>
    function brandAddManager() {
        return {
            handleSubmit(e) {
                //Kiểm tra trước khi submit
                const name = this.$refs.nameInput;
                if (!name.value) {
                    e.preventDefault();
                    const nameMsg = this.$refs.nameError;
                    nameMsg.innerHTML = "Tên thương hiệu không được để trống!";
                    nameMsg.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    })
                }
            }
        }
    }
</script>
@endpush