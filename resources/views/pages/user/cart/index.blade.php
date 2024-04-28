<x-app-layout>
    <h2 class="mb-4 text-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Keranjang anda') }}
    </h2>
    <x-input-error :messages="$errors->get('carts')" class="mt-2" />
    <form action="{{ route('transaksi.create') }}" id="checkout-form">
        @csrf
        @foreach ($carts as $cart)
            <div class="mt-4 flex items-center rounded border border-gray-200 px-4 dark:border-gray-700">
                <input id="{{ $cart->id }}" type="checkbox" name="carts[{{ $cart->id }}]" form="checkout-form"
                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600">
                <label for="{{ $cart->id }}"
                    class="ms-2 flex w-full justify-between py-4 text-sm font-medium text-gray-900 dark:text-gray-300">
                    <div class="flex">
                        <img class="size-20 ms-3 aspect-square rounded-lg object-cover"
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
                                Jumlah: {{ $cart->quantity }}
                            </p>
                        </div>
                    </div>
                </label>
            </div>
        @endforeach
        <div class="mt-5 flex justify-end" x-data="{ isCartsNotEmpty: {{ $carts->isNotEmpty() }} }">
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
