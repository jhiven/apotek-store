<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('Tambah obat baru') }}
    </h2>
    <hr class="mb-8 mt-2" />

    <img class="rounded-lg" src="" alt="" />

    <form action="{{ route('admin.obat.store') }}" method="POST">
        @csrf
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="mt-1 block w-full" type="text" name="nama" :value="old('nama') ?? ''"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <input type="hidden" id="image_url" name="image_url" value="https://placehold.co/600x400?text=obat+test">
        <div class="mt-4">
            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
            <x-text-input id="deskripsi" class="mt-1 block w-full" type="text" name="deskripsi" :value="old('deskripsi') ?? ''"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="indikasi" :value="__('Indikasi')" />
            <x-text-input id="indikasi" class="mt-1 block w-full" type="text" name="indikasi" :value="old('indikasi') ?? ''"
                required />
            <x-input-error :messages="$errors->get('indikasi')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="jenis" :value="__('Jenis')" />
            <x-text-input id="jenis" class="mt-1 block w-full" type="text" name="jenis" :value="old('jenis') ?? ''"
                required />
            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="dosis" :value="__('Dosis')" />
            <x-text-input id="dosis" class="mt-1 block w-full" type="text" name="dosis" :value="old('dosis') ?? ''"
                required />
            <x-input-error :messages="$errors->get('dosis')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="harga" :value="__('Harga')" />
            <x-text-input id="harga" class="mt-1 block w-full" type="text" name="harga" :value="old('harga') ?? ''"
                required />
            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="stok" :value="__('Stok')" />
            <x-text-input id="stok" class="mt-1 block w-full" type="text" name="stok" :value="old('stok') ?? ''"
                required />
            <x-input-error :messages="$errors->get('stok')" class="mt-2" />
        </div>
        <x-primary-button class="mt-8 w-full">
            Buat
        </x-primary-button>
    </form>

</x-app-layout>
