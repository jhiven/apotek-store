<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('Tambah obat baru') }}
    </h2>
    <hr class="mb-8 mt-2" />

    <div class="flex justify-center">
        <img class="rounded-lg" id="cover"/>
    </div>

    <form action="{{ route('admin.obat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="image" :value="__('Cover image')" />
            <x-text-input id="image" class="mt-1 block w-full" type="file" name="image" :value="old('nama') ?? ''"
                accept="image/*" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="mt-1 block w-full" type="text" name="nama" :value="old('nama') ?? ''"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
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

<script>
    const chooseFile = document.getElementById("image");
    const imgPreview = document.getElementById("cover");
    chooseFile.addEventListener("change", function() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function() {
                imgPreview.src = this.result
            });
        }
    });
</script>
