<x-app-layout>
    <h2 class="mb-4 text-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('List Obat') }}
    </h2>
    <x-primary-button>Create</x-primary-button>
    <div class="grid grid-cols-3 gap-3">
        @foreach ($drugs as $drug)
            <div
                class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                <img class="rounded-t-lg" src="{{ $drug->image_url }}" alt="" />
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $drug->nama }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $drug->kegunaan }}
                    </p>
                    <a href="{{ route('obat.show', $drug->id) }}"
                        class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
