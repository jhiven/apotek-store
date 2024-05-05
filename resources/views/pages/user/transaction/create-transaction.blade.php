<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('Pembayaran') }}
    </h2>
    <hr class="mt-2 mb-8" />

    @php
        $total = 0;
    @endphp

    <form action="{{ route('transaksi.store') }}" method="post">
        @csrf
        @foreach ($carts as $key => $cart)
            @php
                $subtotal = $cart->quantity * $cart->drug->harga;
                $total += $subtotal;
            @endphp
            <input type="hidden" name="drugIdList[]" value="{{ $cart->drug_id }}">
            <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
            <input type="hidden" name="subtotal[]" value="{{ $subtotal }}">
            <div>
                Produk {{ $key + 1 }}
                <div
                    class="mt-2 flex flex-col items-center overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm md:flex-row">
                    <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                        src="{{ $cart->drug->image_url }}" alt="">
                    <div class="flex w-full flex-col justify-between p-4 leading-normal">
                        <div class="flex justify-between">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
                                {{ $cart->drug->nama }}</h5>
                            <div class="flex">
                                <div class="mr-2">{{ $cart->quantity }}</div>
                                <p>x</p>
                                <x-price class="mb-2 ml-2 tracking-tight text-gray-900"
                                    value="{{ $cart->drug->harga }}">
                                </x-price>
                            </div>
                        </div>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ $cart->drug->jenis }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-8 flex items-center justify-between">
            <x-price value="{{ $total }}" class="text-lg">
                Total pembayaran:
            </x-price>
            <x-primary-button>Beli</x-primary-button>
        </div>
    </form>

</x-app-layout>
