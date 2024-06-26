@props(['disabled' => false])

@php
    $class =
        'flex rounded-xl border border-input bg-transparent px-3 py-2 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $class]) }}>
