@props(['title', 'src', 'href'])

<div
    class="flex flex-col justify-between overflow-hidden rounded-xl border border-neutral-200/60 bg-white text-neutral-700 shadow-sm hover:shadow-lg hover:transition-shadow">
    <div>

        <div class="relative">
            <img src="{{ $src }}" class="aspect-video h-auto w-full object-cover" />
        </div>
        <div class="p-7">
            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">{{ $title }}</h2>
            <p class="mb-5 line-clamp-4 text-neutral-500">
                {{ $slot }}
            </p>
        </div>
    </div>
    <div class="p-7 pt-0">
        <x-primary-button tag="a" href="{{ $href }}" class="w-full">
            Lihat
        </x-primary-button>
    </div>
</div>
