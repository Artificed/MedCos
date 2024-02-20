@extends('layouts.layout')

@section('title', 'Login')

@section('content')

    @include('partials.plain_header')

    <div class="h-full px-12 py-20 lg:px-96 lg:py-30">
        <h1 class="text-3xl">Log In</h1>
        <form action="{{ route('Login') }}" method="POST" class="my-16 flex flex-col">
            @csrf
            <x-form_section title="Email" name="email" id="email" placeholder="Masukkan Email"/> <br>
            <x-form_section type="password" title="Password" name="password" id="password" placeholder="Masukkan Password"/>
            <div class="ml-auto my-1">
                Tidak memiliki akun?
                <a href="{{ route('RegisterPage') }}" class="underline">Sign up</a>
            </div>
            <x-button content="Log In"/>
        </form>
    </div>

@endsection
