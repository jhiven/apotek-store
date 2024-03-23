<x-app-layout>

    <img class="rounded-lg" src="{{ $drug->image_url }}" alt="" />
    <p>nama: {{ $drug->nama }}</p>
    <p>kegunaan: {{ $drug->kegunaan }}</p>
    <p>indikasi: {{ $drug->indikasi }}</p>
    <p>jenis: {{ $drug->jenis }}</p>
    <p>dosis: {{ $drug->dosis }}</p>
    <p>harga: {{ $drug->harga }}</p>
    <a href="{{ route('obat.edit', $drug->id) }}"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Edit
    </a>
    <a href="{{ route('keranjang.create', ['id' => $drug->id]) }}"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Tambahkan ke keranjang
    </a>

</x-app-layout>
