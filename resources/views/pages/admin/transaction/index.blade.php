<x-app-layout>
    <h2 class="mb-4 text-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('List transaksi') }}
    </h2>
    <div class="grid gap-5">
        @foreach ($transactions as $transaction)
            <div
                class="flex flex-col gap-3 rounded-lg border border-gray-200 bg-white p-5 shadow dark:border-gray-700 dark:bg-gray-800">
                <p class="text-xl font-normal">
                    Pembelian obat:
                    {{ $transaction->detail_transactions->map(function ($detail_transaction) {
                            return [
                                'nama' => $detail_transaction->drug->nama,
                            ];
                        })->implode('nama', ', ') }}
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex gap-3 items-end">
                        <p>{{ $transaction->user->name }}</p>
                        <p>|</p>
                        <x-price value="{{ $transaction->total_harga }}" class="text-sm text-gray-400">Total: </x-price>
                    </div>
                    <a href=""
                        class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300">
                        Lihat detail transaksi
                        <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
