<x-app-layout>
    <div class="flex justify-center">
        <img class="rounded-lg" src="{{ $drug->image_url }}" alt="{{ $drug->name }}" id="cover" />
    </div>

    <form action="{{ route('admin.obat.update', $drug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="image" :value="__('Cover image')" />
            <x-text-input id="image" class="mt-1 block w-full" type="file" name="image" :value="old('nama') ?? ''"
                accept="image/*" /> <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="mt-1 block w-full" type="text" name="nama" :value="old('nama') ?? $drug->nama"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="deskripsi" :value="__('deskripsi')" />
            <x-text-input id="deskripsi" class="mt-1 block w-full" type="text" name="deskripsi" :value="old('deskripsi') ?? $drug->deskripsi"
                required />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="indikasi" :value="__('Indikasi')" />
            <x-text-input id="indikasi" class="mt-1 block w-full" type="text" name="indikasi" :value="old('indikasi') ?? $drug->indikasi"
                required />
            <x-input-error :messages="$errors->get('indikasi')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="jenis" :value="__('Jenis')" />
            <x-text-input id="jenis" class="mt-1 block w-full" type="text" name="jenis" :value="old('jenis') ?? $drug->jenis"
                required />
            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="dosis" :value="__('Dosis')" />
            <x-text-input id="dosis" class="mt-1 block w-full" type="text" name="dosis" :value="old('dosis') ?? $drug->dosis"
                required />
            <x-input-error :messages="$errors->get('dosis')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="harga" :value="__('Harga')" />
            <x-text-input id="harga" class="mt-1 block w-full" type="text" name="harga" :value="old('harga') ?? $drug->harga"
                required />
            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="stok" :value="__('Stok')" />
            <x-text-input id="stok" class="mt-1 block w-full" type="text" name="stok" :value="old('stok') ?? $drug->stok"
                required />
            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>
        <x-primary-button class="mt-8 w-full">
            Edit
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
