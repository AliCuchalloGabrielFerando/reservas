@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-white text-sm font-medium leading-5 text-white focus:outline-none focus:border-blue-600 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-medium leading-5 text-white hover:text-blue-200 hover:border-blue-200 focus:outline-none focus:text-blue-200 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
