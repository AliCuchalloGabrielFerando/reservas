@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-white dark:text-black inline-flex items-center px-1 pt-1 border-b-4 border-white dark:border-black text-sm font-medium leading-5 focus:outline-none focus:border-blue-600 transition'
            : 'text-white dark:text-black inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-medium leading-5  hover:text-blue-200 hover:border-blue-200 focus:outline-none focus:text-blue-200 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
