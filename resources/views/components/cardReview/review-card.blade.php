@props(['review'])

<div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0">
    <div class="flex justify-between items-start mb-4">
        <div class="flex gap-4">
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center  font-bold text-gray-600 uppercase">
                {{ substr($review->user->name ?? 'A', 0, 1) }}
            </div>
            <div>
                <p class="text-sm font-bold text-gray-900">{{ $review->user->name ?? 'Người dùng ẩn danh' }}</p>
                <div class="flex items-center gap-2 mt-1">
                    {{-- Render số sao của user --}}
                    <div class="flex text-yellow-500 text-xs">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                        @endfor
                    </div>
                    <span class="text-xs text-gray-400">• {{ $review->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <p class="text-gray-600 text-sm leading-relaxed mb-4">
        {{ $review->comment }}
    </p>

    {{-- Admin Reply --}}
    @if($review->reply)
        <div class="mt-4 p-4 bg-gray-50 rounded-sm border-l-2 border-gray-900">
            <p class="text-xs font-bold text-gray-900 uppercase mb-1">Phản hồi từ cửa hàng</p>
            <p class="text-sm text-gray-600">{{ $review->reply }}</p>
        </div>
    @endif
</div>