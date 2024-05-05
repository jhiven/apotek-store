<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('Transaksi anda') }}
    </h2>
    <hr class="mb-8 mt-2" />

    <div class="grid gap-5">
        @foreach ($transactions as $transaction)
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="p-5">
                    <p class="mb-2 text-xl font-normal">
                        Pembelian obat:
                        {{ $transaction->detail_transactions->map(function ($detail_transaction) {
                                return [
                                    'nama' => $detail_transaction->drug->nama,
                                ];
                            })->implode('nama', ', ') }}
                    </p>
                    <div class="flex justify-between">
                        <x-price value="{{ $transaction->total_harga }}" class="text-slate-800">Total harga: </x-price>
                        <x-primary-button tag="a" href="{{ route('transaksi.show', $transaction->id) }}">
                            Lihat detail transaksi
                        </x-primary-button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
