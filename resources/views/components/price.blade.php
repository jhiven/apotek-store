@props(['value'])

<p {{ $attributes->merge(['class']) }}>
    {{ $slot }}

    {{ Illuminate\Support\Number::currency($value, in: 'Rp.', locale: 'id') }}
</p>
