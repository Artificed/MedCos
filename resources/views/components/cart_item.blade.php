<div class="px-3 py-4 flex items-center border-b first:border-t w-screen relative">
    <input type="checkbox" name="{{ $item->Product->id }}_checkbox" id="{{ $item->Product->id }}_checkbox" class="rounded-none scale-125 checkbox">
    <div class="w-20 mx-3 flex items-center justify-center">
        <img src="{{ asset('./storage/images/'.$item->Product->ProductImage->first()->image) }}" alt="" class="max-h-20">
    </div>
    <div class="">
        <p class="text-sm">{{ $item->Product->name }}</p>
        <p name="{{ $item->Product->id }}_price" id="{{ $item->Product->id }}_price" class="price">{{'Rp'.number_format($item->Product->price, 0, ',', '.')}}</p>
    </div>
    <div class="absolute right-2 bottom-4 flex items-center *:px-2">
        <img src="{{ asset('./storage/images/trash_logo.png') }}" alt="" class="h-full trash"
                            onclick="window.location.href='{{ route('DeleteProduct', ['product_id' => $item->Product->id]) }}'">
        <div class="flex h-8">
            <button type="button" class="border border-black border-r-0 w-8 min-button" id="{{ $item->Product->id }}_minusButton">-</button>
            <input type="number" name="{{ $item->Product->id }}_quantity" id="{{ $item->Product->id }}_quantity"
                                                value="{{ $item->quantity }}" class="border w-12 border-black text-center quantity" readonly>
            <input type="hidden" name="{{ $item->Product->id }}_limit" id="{{ $item->Product->id }}_limit" value="{{ $item->Product->stock }}">
            <button type="button" class="border border-black border-l-0 w-8 plus-button" id="{{ $item->Product->id }}_plusButton">+</button>
        </div>
    </div>
</div>
