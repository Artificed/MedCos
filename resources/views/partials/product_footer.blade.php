<div class="h-36 w-screen theme-grey flex items-center justify-center fixed bottom-0 text-black">
    <div class="flex flex-col items-center justify-center mb-2 px-8 lg:mb-0">
        <form action="{{ route('AddProduct') }}" method="POST" class="flex items-center mb-2">
            @csrf
            <div class="flex mx-3 lg:mx-10">
                <button type="button" class="border border-black py-2 px-5 border-r-0" id="minus-button">-</button>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" id="quantity" value="1" class="border w-12 border-black py-2 theme-grey text-center" readonly>
                <input type="hidden" name="max_quantity" id="max-quantity" value="{{ $product->stock }}">
                <button type="button" class="border border-black py-2 px-5 border-l-0" id="plus-button">+</button>
            </div>
            <div class="mx-3 lg:mx-10">
                @if ($product->stock > 0)
                    <button type="submit" class="border border-black text-lg px-5 py-2 my-2 bg-white">Add To Cart</button>
                @else
                    <button type="button" class="border border-black text-lg px-5 py-2 my-2 bg-white">Out Of Stock</button>
                @endif
            </div>
        </form>
        <div class="text-xs">
            <div class="text-gray-500">stok: {{ $product->stock }}</div>
        </div>
    </div>
</div>

<script>
    const productQuantity = document.getElementById('quantity');
    const minQuantity = 1
    const maxQuantity = document.getElementById('max-quantity');
    const minusButton = document.getElementById('minus-button');
    const plusButton = document.getElementById('plus-button');

    minusButton.addEventListener('click', function() {
        if(parseInt(productQuantity.value) > minQuantity) {
            productQuantity.value--;
        }
    });
    plusButton.addEventListener('click', function() {
        if(parseInt(productQuantity.value) < parseInt(maxQuantity.value)) {
            productQuantity.value = parseInt(productQuantity.value) + 1;
        }
    });

</script>
