<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        Cart user {{ $user->name }}
    </h2>
    <hr class="mb-8 mt-2" />
    <div class="grid gap-5">
        @foreach ($carts as $cart)
            <div
                class="mt-2 flex flex-col items-center overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm md:flex-row">
                <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="{{ $cart->drug->image_url }}" alt="{{ $cart->drug_name }}">
                <div class="flex w-full flex-col justify-between gap-2 p-4 leading-normal">
                    <div class="flex justify-between">
                        <a class="mb-2 text-2xl text-gray-900 hover:underline"
                            href="{{ route('admin.obat.show', $cart->drug->id) }}">
                            {{ $cart->drug->nama }}
                        </a>
                        <div class="flex">
                            <div class="mr-2">{{ $cart->quantity }}</div>
                            <p>x</p>
                            <x-price class="mb-2 ml-2 tracking-tight text-gray-900" value="{{ $cart->drug->harga }}">
                            </x-price>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="font-normal text-gray-700">Jenis:
                            {{ $cart->drug->jenis }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <x-primary-button tag="a" href="{{ url()->previous() }}" class="mt-8">
        back
    </x-primary-button>
</x-app-layout>
