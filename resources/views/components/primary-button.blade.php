@props(['tag' => 'button', 'href'])

@php
    $class =
        'inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-xl hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:shadow-outline focus:outline-none';
@endphp

@if ($tag == 'button')
    <button {{ $attributes->merge(['form', 'type' => 'submit', 'class' => $class]) }}>
        {{ $slot }}
    </button>
@elseif ($tag == 'a' && $href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@endif
