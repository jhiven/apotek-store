<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 text-center">
        {{ __('Keranjang anda') }}
    </h2>
    <form action="{{ route('transaksi.create') }}" id="checkout-form">
        @csrf
        @foreach ($carts as $cart)
            <div class="flex items-center px-4 border border-gray-200 rounded dark:border-gray-700 mt-4">
                <input id="{{ $cart->id }}" type="checkbox" name="carts[{{ $cart->id }}]" form="checkout-form"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="{{ $cart->id }}"
                    class="w-full py-4 ms-2 flex text-sm font-medium text-gray-900 dark:text-gray-300 justify-between">
                    <div class="flex">
                        <img class="rounded-lg ms-3 aspect-square object-cover size-20"
                            src="{{ $cart->drug->image_url }}" alt="{{ 'gambar ' . $cart->nama }}" />
                        <div class="ml-6">
                            <a class="text-2xl hover:underline" href="{{ route('obat.show', $cart->drug->id) }}">
                                {{ $cart->drug->nama }}
                            </a>
                            <p class="text-lg">
                                {{ $cart->drug->kegunaan }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button onclick="hapusCartItem(`{{ route('keranjang.destroy', $cart->id) }}`)" type="button">
                            <x-gmdi-delete class="h-8 w-8 text-red-400" />
                        </button>
                        <div>
                            <p class="mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                Jumlah
                            </p>
                            <div class="flex items-center max-w-[8rem]" x-data="{ quantity: {{ $cart->quantity }} }">
                                <button type="button" id="decrement-button" x-on:click="quantity--"
                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="quantity-input" form="checkout-form" x-model="quantity"
                                    name="quantity[]"
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="999" required />
                                <button type="button" id="increment-button" x-on:click="quantity++"
                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        @endforeach
        <div class="flex justify-end mt-5" x-data="{ isCartsNotEmpty: {{ $carts->isNotEmpty() }} }">
            <x-primary-button type="submit" form="checkout-form" x-show="isCartsNotEmpty">
                Checkout
            </x-primary-button>
        </div>
    </form>
</x-app-layout>

<script>
    function hapusCartItem(url) {
        axios.delete(url)
            .then(function(response) {
                console.log('Berhasil menghapus cart item', response);
            })
            .catch(function(error) {
                console.log('Gagal menghapus cart item', error);
            }).then(() => {
                location.reload();
            });
    }
</script>
