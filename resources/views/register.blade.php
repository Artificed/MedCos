@extends('layouts.layout')

@section('title', 'Sign Up')

@section('content')

    @include('partials.plain_header')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="h-full px-12 py-5 lg:px-96 lg:py-30">
        <h1 class="text-3xl">Sign Up</h1>
        <form action="{{ route('Register') }}" method="POST" class="my-5 flex flex-col">
            @csrf
            <x-form_section title="Nama" name="name" id="name" placeholder="Masukkan Nama"/>
            <x-form_section type="number" title="Nomor Telp." name="phone" id="phone" placeholder="Masukkan Nomor Telpon Anda"/>
            <x-form_section title="Alamat" name="address" id="address" placeholder="Masukkan Alamat Anda"/>
            <x-form_section title="Email" name="email" id="email" placeholder="Masukkan Email Anda"/>
            <x-form_section type="password" title="Password" name="password" id="password" placeholder="Masukkan Password Anda"/>
            <x-form_section type="password" title="Konfirmasi Password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password Anda"/>
            <div class="ml-auto my-1">
                Sudah memiliki akun?
                <a href="{{ route('LoginPage') }}" class="underline">Login</a>
            </div>
            <x-button content="Sign Up"/>
        </form>
    </div>

@endsection
