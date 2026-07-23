<button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-[#0D1B2A] text-white h-10 px-4 rounded-xl font-medium cursor-pointer transition hover:opacity-90 active:scale-95 disabled:opacity-50 flex items-center justify-center gap-2']) }}>
    {{ $slot }}
</button>