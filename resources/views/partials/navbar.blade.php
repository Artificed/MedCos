<script src="{{ asset('js/NavbarManager.js') }}" defer></script>

<div class="h-28 w-screen theme-blue flex items-center justify-center fixed" id="default-nav">
    <div class="flex items-center mt-14 px-24 lg:mt-0">
        <div class="flex items-center absolute left-5">
            <img src="{{ asset('./storage/images/burger_button.png') }}" alt="" class="h-5 mb-1 lg:mx-10 burger">
            <img src="{{ asset('./storage/images/logo.png') }}" alt="" class="h-12 mx-5 mb-1" onclick="window.location.href='{{ route('HomePage') }}'">
        </div>
        <div class="flex items-center absolute right-0">
            <img src="{{ asset('./storage/images/search_img.png') }}" alt="" id="search-switcher">
            <img src="{{ asset('./storage/images/cart_img.png') }}" alt="" class="mx-5 lg:mx-20" onclick="window.location.href='{{ route('CartPage') }}'">
        </div>
    </div>
</div>

<div class="h-28 w-screen theme-blue items-center justify-center fixed hidden" id="form-nav">
    <form action="{{ route('SearchPage') }}" method="GET">
        <div class="flex items-center mt-14 lg:mt-0">
            <div class="flex items-center">
                <img src="{{ asset('./storage/images/burger_button.png') }}" alt="" class="h-5 mb-1 mx-5 lg:mx-10 absolute left-0 burger">
                <input type="text" name="filter" id="filter" class="h-10 rounded-xl p-4 ml-16 w-72 lg:w-96">
                <button type="submit"><img src="{{ asset('./storage/images/search_img.png') }}" alt="" class="mx-5 lg:mx-10"></button>
            </div>
        </div>
    </form>
</div>

<div id="sidebar" class="h-full w-full z-20 fixed hidden">
    <div class="bg-white opacity-100 z-20 w-80 h-full pt-14">
        <div id="" class="flex flex-col border-t-2">
            <div id="switch-sidebar-buttons" class="w-full h-20 flex">
                <x-sidebar_toggle id="category-button" img="{{ asset('./storage/images/category_button.png') }}" class="selected-grey"/>
                <x-sidebar_toggle id="profile-button" img="{{ asset('./storage/images/profile_button.png') }}"/>
            </div>
            <div id="category-section" class="flex flex-col">
                <x-sidebar_button id="alat-kecantikan" text="Alat Kecantikan"
                                onclick="window.location.href='{{ route('CategoryPage', ['category_name' => 'Alat Kecantikan']) }}'"/>
                <x-sidebar_button id="produk" text="Produk"
                                onclick="window.location.href='{{ route('CategoryPage', ['category_name' => 'Produk']) }}'"/>
                <x-sidebar_button id="spare-part" text="Spare Parts"
                                onclick="window.location.href='{{ route('CategoryPage', ['category_name' => 'Spare Parts']) }}'"/>
            </div>
            <div id="profile-section" class="hidden">
                <x-sidebar_button id="profile" text="Profile" onclick="window.location.href='{{ route('ProfilePage') }}'"/>
                <x-sidebar_button id="sign-out" text="Sign Out" onclick="window.location.href='{{ route('Logout') }}'"/>
            </div>
        </div>
    </div>
    <div id="sidebar-bg" class="bg-black opacity-50 z-20 w-20 flex-grow"></div>
</div>
