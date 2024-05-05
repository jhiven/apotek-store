@props(['tag' => 'button', 'href'])

@php
    $class =
        'inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-blue-500 transition-colors duration-100 rounded-xl focus:ring-2 focus:ring-blue-100 bg-blue-50 hover:text-blue-600 hover:bg-blue-100';
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
