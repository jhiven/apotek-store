<x-app-layout>


    <img class="rounded-lg" src="{{ $drug->image_url }}" alt="" />

    <form action="{{ route('obat.update', $drug) }}" method="POST">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama') ?? $drug->nama"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="kegunaan" :value="__('Kegunaan')" />
            <x-text-input id="kegunaan" class="block mt-1 w-full" type="text" name="kegunaan" :value="old('kegunaan') ?? $drug->kegunaan"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="indikasi" :value="__('Indikasi')" />
            <x-text-input id="indikasi" class="block mt-1 w-full" type="text" name="indikasi" :value="old('indikasi') ?? $drug->indikasi"
                required />
            <x-input-error :messages="$errors->get('indikasi')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="jenis" :value="__('Jenis')" />
            <x-text-input id="jenis" class="block mt-1 w-full" type="text" name="jenis" :value="old('jenis') ?? $drug->jenis"
                required />
            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="dosis" :value="__('Dosis')" />
            <x-text-input id="dosis" class="block mt-1 w-full" type="text" name="dosis" :value="old('dosis') ?? $drug->dosis"
                required />
            <x-input-error :messages="$errors->get('dosis')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="harga" :value="__('Harga')" />
            <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga') ?? $drug->harga"
                required />
            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>
        <button type="submit"
            class="mt-4 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit
        </button>
    </form>

</x-app-layout>
