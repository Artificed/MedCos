@extends('layouts.layout')

@section('title', 'Home')

@section('content')

    @include('partials.navbar')

    <div class="pt-32 ml-5">

        <h1 class="text-xl mb-2">Produk Terbaru</h1>
        <div class="border-t border-t-black flex overflow-scroll no-scrollbar">
            @foreach ($new_products as $new_product)
                <div class="w-48 lg:w-72 mr-8">
                    <x-product :product="$new_product"/>
                </div>
            @endforeach
        </div>

        <h1 class="text-xl mb-2 mt-4">Best Seller</h1>
        <div class="border-t border-t-black flex overflow-scroll no-scrollbar">
            @foreach ($best_sellers as $best_seller)
                <div class="w-48 lg:w-72 mr-8">
                    <x-product :product="$best_seller"/>
                </div>
            @endforeach
        </div>

    </div>

    @include('partials.footer')

@endsection
