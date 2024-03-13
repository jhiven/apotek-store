<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($drug->nama) }}
        </h2>

    </x-slot>

    <img class="rounded-lg" src="{{ $drug->image_url }}" alt="" />
    <p>nama: {{ $drug->nama }}</p>
    <p>kegunaan: {{ $drug->kegunaan }}</p>
    <p>indikasi: {{ $drug->indikasi }}</p>
    <p>jenis: {{ $drug->jenis }}</p>
    <p>dosis: {{ $drug->dosis }}</p>
    <p>harga: {{ $drug->harga }}</p>

</x-app-layout>
