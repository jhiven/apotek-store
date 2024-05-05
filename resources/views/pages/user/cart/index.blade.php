<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('Keranjang anda') }}
    </h2>
    <hr class="mt-2 mb-8" />

    <x-input-error :messages="$errors->get('carts')" class="mt-2" />
    <form action="{{ route('transaksi.create') }}" id="checkout-form">
        @csrf
        @foreach ($carts as $cart)
            <div class="mt-4 flex items-center rounded-xl border border-gray-200 bg-white px-4 shadow-sm">
                <input id="{{ $cart->id }}" type="checkbox" name="carts[{{ $cart->id }}]" form="checkout-form"
                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                <label for="{{ $cart->id }}"
                    class="ms-2 flex w-full justify-between py-4 text-sm font-medium text-gray-900">
                    <div class="flex">
                        <img class="size-20 ms-3 aspect-square rounded-lg object-cover"
                            src="{{ $cart->drug->image_url }}" alt="{{ 'gambar ' . $cart->nama }}" />
                        <div class="ml-6">
                            <a class="text-2xl hover:underline" href="{{ route('obat.show', $cart->drug->id) }}">
                                {{ $cart->drug->nama }}
                            </a>
                            <p class="mt-2 text-slate-600">
                                {{ $cart->drug->jenis }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="mr-2">
                            <p class="mb-1 text-sm font-medium text-gray-900">
                                Jumlah: {{ $cart->quantity }}
                            </p>
                        </div>
                        <button onclick="hapusCartItem(`{{ route('keranjang.destroy', $cart->id) }}`)" type="button">
                            <x-gmdi-delete class="h-8 w-8 text-red-400" />
                        </button>
                    </div>
                </label>
            </div>
        @endforeach
        @if ($carts->isNotEmpty())
            <div class="mt-5 flex justify-end">
                <x-primary-button type="submit" form="checkout-form">
                    Checkout
                </x-primary-button>
            </div>
        @endif
    </form>
</x-app-layout>

<script>
    function hapusCartItem(url) {
        axios.delete(url).then(() => {
            location.reload();
        });
    }
</script>
