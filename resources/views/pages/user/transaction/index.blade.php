<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 text-center">
        {{ __('Transaksi Anda') }}
    </h2>
    <div class="grid gap-5">
        @foreach ($transactions as $transaction)
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-5">
                    <p class="mb-3 font-normal text-2xl">
                        Pembelian obat:
                        {{ $transaction->detail_transactions->map(function ($detail_transaction) {
                                return [
                                    'nama' => $detail_transaction->drug->nama,
                                ];
                            })->implode('nama', ', ') }}
                    </p>
                    <div class="flex justify-between">
                        <x-price value="{{ $transaction->total_harga }}">Total harga: </x-price>
                        <a href="{{ route('transaksi.show', $transaction->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Lihat detail transaksi
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
