<x-app-layout>
    <div class="grid grid-cols-4 gap-5">
        @foreach ($drugs as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>
</x-app-layout>
