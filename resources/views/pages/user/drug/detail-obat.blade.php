<x-app-layout>
    <div class="grid grid-cols-6 gap-5">
        <div>
            <img class="rounded-lg" src="{{ $drug->image_url }}" />
        </div>
        <div class="col-span-3">
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
        </div>
        <div class="col-span-2">
            <form action="{{ route('keranjang.store') }}" method="post"
                class="flex flex-col items-start overflow-hidden rounded-xl border border-slate-300 bg-white p-6">
                @csrf
                <input type="hidden" name="drug_id" value="{{ $drug->id }}">
                <p class="text-lg font-semibold">Atur jumlah dan catatan</p>
                <div class="mt-4 flex items-center">
                    <img src="{{ $drug->image_url }}" class="size-14 rounded object-cover" />
                    <p class="ml-3">Jenis: {{ $drug->jenis }}</p>
                </div>
                <div x-data="{ currentVal: 1, minVal: 1, maxVal: {{ $drug->stok }}, decimalPoints: 0, incrementAmount: 1 }" class="mt-4 flex flex-col gap-1">
                    <label for="quantity" class="text-sm">Jumlah</label>
                    <div class="flex items-center">
                        <div @dblclick.prevent class="flex items-center">
                            <x-secondary-button @click="currentVal = Math.max(minVal, currentVal - incrementAmount)"
                                class="flex h-10 w-12 items-center justify-center rounded-l-xl rounded-r-none border border-slate-300"
                                aria-label="subtract" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                            </x-secondary-button>
                            <x-text-input x-model="currentVal.toFixed(decimalPoints)" id="quantity" type="text"
                                class="border-x-none h-10 w-12 rounded-none border-slate-300 bg-blue-50 text-center text-blue-500"
                                name="quantity" readonly />
                            <x-secondary-button @click="currentVal = Math.min(maxVal, currentVal + incrementAmount)"
                                class="flex h-10 w-12 items-center justify-center rounded-l-none rounded-r-xl border border-slate-300"
                                aria-label="add" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </x-secondary-button>
                        </div>
                        <div class="ml-3">
                            <p>Stok: {{ $drug->stok }}</p>
                        </div>
                    </div>
                </div>
                <x-primary-button type="submit" class="mt-4 w-full text-sm">
                    + Keranjang
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
