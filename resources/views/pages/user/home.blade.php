<x-app-layout>
    <x-carousel
        data="[{
            imgSrc: '{{ $drugs[0]->image_url }}',
            imgAlt: '{{ $drugs[0]->nama }}',
            title: '{{ $drugs[0]->nama }}',
            description: '{{ $drugs[0]->deskripsi }}',
        },
        {
            imgSrc: '{{ $drugs[1]->image_url }}',
            imgAlt: '{{ $drugs[1]->nama }}',
            title: '{{ $drugs[1]->nama }}',
            description: '{{ $drugs[1]->deskripsi }}',
        },
        {
            imgSrc: '{{ $drugs[2]->image_url }}',
            imgAlt: '{{ $drugs[2]->nama }}',
            title: '{{ $drugs[2]->nama }}',
            description: '{{ $drugs[2]->deskripsi }}',
        },
    ]"></x-carousel>

    <p class="mt-8 text-2xl font-medium">Obat jenis tablet</p>
    <div class="mt-2 grid grid-cols-5 gap-3">
        @foreach ($drugs->where('jenis', 'Tablet')->take(5) as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>

    <p class="mt-8 text-2xl font-medium">Obat jenis sirup</p>
    <div class="mt-2 grid grid-cols-5 gap-3">
        @foreach ($drugs->where('jenis', 'Sirup')->take(5) as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>

    <p class="mt-8 text-2xl font-medium">Obat jenis serbuk</p>
    <div class="mt-2 grid grid-cols-5 gap-3">
        @foreach ($drugs->where('jenis', 'Serbuk')->take(5) as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>

</x-app-layout>
