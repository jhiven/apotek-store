<x-app-layout>
    <img class="rounded-lg" src="{{ $drug->image_url }}" alt="" />
    <p>nama: {{ $drug->nama }}</p>
    <p>kegunaan: {{ $drug->kegunaan }}</p>
    <form action="{{ route('keranjang.store') }}" method="post" class="flex flex-col items-start mt-8">
        @csrf
        <input type="hidden" name="drug_id" value="{{ $drug->id }}">
        <label for="quantity">Jumlah</label>
        <input type="text" id="quantity" name="quantity"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            placeholder="999" required />
        <x-primary-button type="submit" class="mt-4">
            Tambahkan ke keranjang
        </x-primary-button>
    </form>
</x-app-layout>