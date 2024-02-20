@extends('layouts.layout')

@section('title', 'Product')

@section('content')

    @include('partials.navbar')

    <div class="pb-36 pt-28">
        <div class="flex overflow-x-scroll no-scrollbar h-96 w-screen border">
            @foreach ($product_images as $product_image)
                <div class="w-screen flex overflow-hidden flex-shrink-0 h-full justify-center">
                    <img src="{{ asset('./storage/images/'.$product_image->image) }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="p-5">
            <div class="flex relative">
                <div class="text-xl">{{ $product->name }}</div>
                <img src="{{ asset('./storage/images/share_logo.png') }}"
                        alt="" class="absolute right-0 mt-1" onclick="navigator.clipboard.writeText(window.location.href)">
            </div>
            <div class="text-2xl">{{ 'Rp' . number_format($product->price, 0, ',', '.') }}</div>

            <div class="my-4 pb-3 border-b-2 border-black">
                <div class="text-sm">Deskripsi:</div>
                <div class="text-sm mt-4">{{ $product->description }}</div>
            </div>

            <div class="text-sm">Rekomendasi:</div>
            <div class="flex overflow-scroll no-scrollbar">
                @foreach ($best_sellers as $best_seller)
                    <div class="w-48 lg:w-72 mr-8">
                        <x-product :product="$best_seller"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.product_footer')

@endsection
