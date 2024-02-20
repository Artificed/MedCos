@extends('layouts.layout')

@section('title', 'Cart')
    <script src="{{ asset('js/CartFormManager.js') }}" defer></script>
@section('content')

    <form action="{{ route('MakeOrder') }}" method="POST">
        @csrf
        <div class="relative my-28 flex flex-col items-center">
            <div class="">
                <img src="{{ asset('./storage/images/back_arrow.png') }}" alt="" class="absolute left-8 top-2" onclick="window.history.back()">
            </div>
            <div class="text-3xl">Shopping Cart</div>
            <div class="mt-10">
                @foreach ($cart_items as $cart_item)
                    <x-cart_item :item="$cart_item"/>
                @endforeach
            </div>
        </div>
        <div class="h-28 pb-2 w-screen flex items-center justify-center fixed bottom-0 text-black border-t bg-white">
            <div class="flex items-center mb-2 lg:mb-0">
                <div class="flex flex-col absolute left-8 lg:left-40 text-xl">
                    <div class="">Total</div>
                    <input type="text" name="total_price" id="total_price" value="{{ 'Rp' . number_format(0, 0, ',', '.') }}" readonly>
                </div>
                <div class="flex items-center absolute w-28 right-8 lg:right-40">
                    <x-button content="Checkout" class="w-full"/>
                </div>
            </div>
        </div>
    </form>

@endsection
