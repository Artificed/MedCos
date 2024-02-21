@extends('layouts.layout')

@section('title', '404 Error')

@section('content')

    @include('partials.navbar')

    <div class="h-screen flex flex-col items-center justify-center">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-3xl mb-5">Product Not Found</h1>
            <x-button content="Back to Home Page" class="w-48"
                    onclick="window.location.href='{{ route('HomePage') }}'"/>
        </div>
    </div>

    @include('partials.footer')

@endsection
