@extends('layouts.layout')
    <script src="{{ asset('js/ProfileFormManager.js') }}" defer></script>
@section('title', 'Profile')

@section('content')

    @include('partials.navbar')

    <form action="{{ route('UpdateProfile') }}" method="POST" enctype="multipart/form-data" class="pt-36 flex flex-col items-center">
        @csrf
        <div class="text-2xl mb-4">Profile</div>

        <label for="image-upload" class="relative flex flex-col justify-center items-center">
            <img id="profile-image" src="{{ asset('./storage/images/'.Auth::user()->image) }}" alt="" class="w-32 h-32 rounded-full z-10">
        </label>
        <input type="file" name="image_upload" id="image-upload" accept="image/*" class="hidden">

        <div class="text-xl mt-4">{{ Auth::user()->name }}</div>
        <div class="w-full mt-8 mb-4 lg:w-1/2">
            <x-profile_column title="Email" logoImg="profile_mail.png" inputName="email" inputValue="{{ Auth::user()->email ?? '' }}"/>
            <x-profile_column title="Nomor Telpon" logoImg="profile_phone.png" inputName="phone" inputValue="{{ Auth::user()->phone ?? '' }}"/>
            <x-profile_column title="Alamat" logoImg="profile_location.png" inputName="address" inputValue="{{ Auth::user()->address ?? '' }}"/>
        </div>

        <x-button content="Save Changes" id="submit-button" class="hidden"/>
    </form>

@endsection
