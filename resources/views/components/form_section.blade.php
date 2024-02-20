<div>
    <div class="ml-1">{{ $title }}</div>
    <input name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
     {{ $attributes->merge(['type' => 'text', 'class' => 'border border-black rounded-xl w-full h-14 p-5 my-2']) }}>
</div>
