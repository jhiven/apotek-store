<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        @if (isset($user))
            List transaksi {{ $user->name }}
        @else
            List transaksi semua user
        @endif
    </h2>
    <hr class="mb-8 mt-2" />
    <div class="grid gap-5">
        @foreach ($transactions as $transaction)
            <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                <p class="text-xl font-medium">
                    Pembelian obat:
                    {{ $transaction->detail_transactions->map(function ($detail_transaction) {
                            return [
                                'nama' => $detail_transaction->drug->nama,
                            ];
                        })->implode('nama', ', ') }}
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <p>{{ $transaction->user->name }}</p>
                        <p>|</p>
                        <x-price value="{{ $transaction->total_harga }}" class="text-sm text-gray-800">Total: </x-price>
                    </div>
                    <x-secondary-button tag="a" href="{{ route('admin.transaksi.show', $transaction->id) }}">
                        Lihat detail transaksi
                    </x-secondary-button>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
