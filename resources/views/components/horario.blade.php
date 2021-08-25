<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-center bg-blue-500 p-1 border border-black text-white w-full']) }}>
    {{ $slot }}
</button>
