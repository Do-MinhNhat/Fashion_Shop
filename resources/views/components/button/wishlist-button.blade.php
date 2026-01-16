@props(['product', 'class' => ''])

@php
    $isWishlisted = false;
    if(auth()->check()) {
        $isWishlisted = auth()->user()->wishlists->contains('product_id', $product->id);
    }
@endphp

<button 
    type="button" 
    class="btn-wishlist {{ $class }} {{ $isWishlisted ? 'active' : '' }} w-12 h-12 border border-gray-300 flex items-center justify-center text-gray-600 hover:text-red-500 hover:border-red-500 transition" 
    data-product-id="{{ $product->id }}"
    data-url="{{ route('user.wishlist.toggle') }}"
    data-mode="{{ Route::currentRouteName() == 'product.detail' ? 'detail' : 'card' }}"
>
    <i class="{{ $isWishlisted ? 'fas' : 'far' }} fa-heart"></i>
    <span>{{ $slot }}</span>
</button>