<x-app-layout>
    <div class="grid grid-cols-6 gap-5">
        <div class="col-span-2">
            <img class="rounded" src="{{ $drug->image_url }}" />
        </div>
        <div class="col-span-4">
            <h2 class="text-2xl font-bold">{{ $drug->nama }}</h2>
            <div class="flex items-center">
                <x-price value="{{ $drug->harga }}" class="text-lg font-semibold text-slate-500"></x-price>
                <p class="mx-2">•</p>
                <p class="text-sm text-slate-700">Stok: {{ $drug->stok }}</p>
            </div>
            <p class="mt-6 text-lg font-semibold">deskripsi</p>
            <p>{{ $drug->deskripsi }}</p>
            <p class="mt-3 text-lg font-semibold">Indikasi</p>
            <p>{{ $drug->indikasi }}</p>
            <p class="mt-3 text-lg font-semibold">Jenis</p>
            <p>{{ $drug->jenis }}</p>
            <p class="mt-3 text-lg font-semibold">Dosis</p>
            <p>{{ $drug->dosis }}</p>

            <div class="mt-4 flex items-center gap-5">
                <x-primary-button tag="a" class="w-36" href="{{ route('admin.obat.edit', $drug->id) }}">
                    Edit
                </x-primary-button>
                <form action="{{ route('admin.obat.destroy', $drug->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-danger-button>
                        <x-gmdi-delete class="h-6 w-6 text-white" />
                    </x-danger-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
