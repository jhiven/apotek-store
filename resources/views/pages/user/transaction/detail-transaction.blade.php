<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 text-center">
        {{ __('Detail Transaksi') }}
    </h2>
    <div class="grid gap-5">
        @foreach ($detailTransactions as $detailTransaction)
            <div
                class="flex flex-col mt-2 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 ">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="{{ $detailTransaction->drug->image_url }}" alt="{{ $detailTransaction->drug_name }}">
                <div class="flex flex-col justify-between p-4 w-full leading-normal gap-5">
                    <div class="flex justify-between">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $detailTransaction->drug->nama }}</h5>
                        <div class="flex">
                            <div class="mr-2">{{ $detailTransaction->quantity }}</div>
                            <p>x</p>
                            <x-price class="mb-2 ml-2 tracking-tight text-gray-900 dark:text-white"
                                value="{{ $detailTransaction->drug->harga }}">
                            </x-price>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Jenis:
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

    <a href="{{ url()->previous() }}"
        class="mt-8 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        back
    </a>

</x-app-layout>
