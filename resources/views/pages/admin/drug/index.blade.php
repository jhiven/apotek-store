<x-app-layout>
    <div class="mb-5 flex items-center justify-between rounded-xl border bg-white p-5 shadow-sm">
        <p class="text-lg font-medium">Tambahkan obat baru</p>
        <x-primary-button tag="a" href="{{ route('admin.obat.create') }}">
            Buat
        </x-primary-button>
    </div>

    <div class="grid grid-cols-4 gap-5">
        @foreach ($drugs as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('admin.obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>
</x-app-layout>
