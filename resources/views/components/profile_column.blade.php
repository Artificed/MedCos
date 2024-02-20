<div class="theme-grey my-4 p-5 flex lg:rounded-3xl items-center">
    <div class="mr-6">
        <img src="{{ asset('./storage/images/'.$logoImg) }}" alt="">
    </div>
    <div class="flex flex-col w-full">
        <p class="text-gray-500 text-xs mb-1">{{ $title }}</p>
        <input type="text" id="{{ $inputName }}" name="{{ $inputName }}" value="{{ $inputValue }}" class="theme-grey">
    </div>
</div>
