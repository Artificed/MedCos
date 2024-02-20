<div class="flex flex-col items-center w-48">
    <div class="h-48 mt-3" onclick="window.location.href='{{ route('ProductPage', ['product_name' => $product->name ]) }}'">
        <img src={{ asset('./storage/images/'.$product->ProductImage->first()->image) }} alt="" class="max-h-48">
    </div>
    <form action="{{ route('AddProduct') }}" method="POST" class="flex flex-col">
        @csrf
        <div class="text-lg">{{ $product->name }}</div>
        <div class="text-xl">{{ 'Rp' . number_format($product->price, 0, ',', '.') }}</div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        @if ($product->stock > 0)
            <button type="submit" class="border border-black text-xs px-2 py-1 my-2">ADD TO CART</button>
        @else
            <button type="button" class="border border-black text-xs px-2 py-1 my-2">OUT OF STOCK</button>
        @endif

    </form>
</div>
