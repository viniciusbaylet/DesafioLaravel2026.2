@props([
    'id' => null,
    'label' => null,
    'type' => 'text',
    'name' => '',
    'placeholder' => ''
])

<div class="flex flex-col gap-1 w-full">
    @if($label)
        <label for="{{ $name }}" class="text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}" 
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => 'w-full bg-[#E0E0E0] rounded-xl h-10 px-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0D1B2A] transition']) }}
    >
</div>