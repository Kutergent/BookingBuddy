@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-700 transition duration-150 ease-in-out rounded-r-xl w-11/12'
    : 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-gray-400 hover:text-black hover:bg-gray-100 hover:border-gray-300 hover:rounded-r-xl focus:outline-none focus:text-gray-700 w-11/12 focus:bg-gray-100 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
