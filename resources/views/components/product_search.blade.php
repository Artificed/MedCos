<div class="flex items-center">
    <div class="w-1/2 flex justify-center" onclick="window.location.href='{{ route('ProductPage', ['product_name' => $product->name ]) }}'">
        <img src={{ asset('./storage/images/'.$product->ProductImage->first()->image) }} alt="" class="max-h-48">
    </div>
    <form action="{{ route('AddProduct') }}" method="POST" class="flex flex-col w-1/2 ml-10">
        @csrf
        <div class="text-lg">{{ $product->name }}</div>
        <div class="text-xl">{{ 'Rp' . number_format($product->price, 0, ',', '.') }}</div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        @if ($product->stock > 0)
            <button type="submit" class="border border-black text-xs p-1 my-2 max-w-48">ADD TO CART</button>
        @else
            <button type="button" class="border border-black text-xs px-2 py-1 my-2">OUT OF STOCK</button>
        @endif
    </form>
</div>
