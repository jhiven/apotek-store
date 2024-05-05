<x-app-layout>
    <h2 class="text-3xl font-bold text-black">
        {{ __('List semua user') }}
    </h2>
    <hr class="mb-8 mt-2" />
    <div class="flex flex-col gap-5">
        @foreach ($userList as $user)
            <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                <div>
                    <div class="text-xl">{{ $user->name }}</div>
                    <div class="mt-3 text-sm text-gray-600">{{ $user->email }}</div>
                </div>
                <div class="flex gap-4">
                    <x-secondary-button tag="a" href="{{ route('admin.user.cart', ['userId' => $user->id]) }}">
                        Keranjang
                    </x-secondary-button>
                    <x-secondary-button tag="a"
                        href="{{ route('admin.transaksi.user.show', ['userId' => $user->id]) }}">
                        Transaksi
                    </x-secondary-button>
                    <form action="{{ route('admin.user.destroy', ['userId' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-danger-button>
                            <x-gmdi-delete class="h-6 w-6 text-white" />
                        </x-danger-button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
