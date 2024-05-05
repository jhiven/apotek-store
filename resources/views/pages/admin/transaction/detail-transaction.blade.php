<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('Detail Transaksi') }}
    </h2>
    <hr class="mb-8 mt-2" />

    <div class="grid gap-5">
        @foreach ($detailTransactions as $detailTransaction)
            <div
                class="mt-2 flex flex-col items-center overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm md:flex-row">
                <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="{{ $detailTransaction->drug->image_url }}" alt="{{ $detailTransaction->drug_name }}">
                <div class="flex w-full flex-col justify-between gap-2 p-4 leading-normal">
                    <div class="flex justify-between">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $detailTransaction->drug->nama }}</h5>
                        <div class="flex">
                            <div class="mr-2">{{ $detailTransaction->quantity }}</div>
                            <p>x</p>
                            <x-price class="mb-2 ml-2 tracking-tight text-gray-900"
                                value="{{ $detailTransaction->drug->harga }}">
                            </x-price>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="font-normal text-gray-700">Jenis:
                            {{ $detailTransaction->drug->jenis }}
                        </p>
                        <x-price value="{{ $detailTransaction->subtotal }}">
                            Subtotal:
                        </x-price>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <x-primary-button tag="a" href="{{ url()->previous() }}"
        class="mt-8">
        back
    </x-primary-button>

</x-app-layout>
