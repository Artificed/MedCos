@extends('layouts.layout')

@section('title', 'Home')

@section('content')

    @include('partials.navbar')

    <div class="py-32 px-5">
        @foreach ($products as $product)
            <div class="p-2 border-b-2 border-gray-300">
                <x-product_search :product="$product"/>
            </div>
        @endforeach
    </div>

    @include('partials.footer')

@endsection
