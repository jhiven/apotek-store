<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 text-center">
        {{ __('Pembayaran') }}
    </h2>

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
            <div class="mt-7">
                Produk {{ $key + 1 }}
                <div
                    class="flex flex-col mt-2 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 ">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                        src="{{ $cart->drug->image_url }}" alt="">
                    <div class="flex flex-col justify-between p-4 w-full leading-normal">
                        <div class="flex justify-between">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $cart->drug->nama }}</h5>
                            <div class="flex">
                                <div class="mr-2">{{ $cart->quantity }}</div>
                                <p>x</p>
                                <x-price class="mb-2 ml-2 tracking-tight text-gray-900 dark:text-white"
                                    value="{{ $cart->drug->harga }}">
                                </x-price>
                            </div>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jenis: {{ $cart->drug->jenis }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="flex justify-between mt-8">
            <x-price value="{{ $total }}" class="">
                Total pembayaran:
            </x-price>

            <x-primary-button>Beli</x-primary-button>
        </div>
    </form>

</x-app-layout>
