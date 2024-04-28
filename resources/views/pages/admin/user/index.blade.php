<x-app-layout>
    <div class="flex flex-col gap-5">
        @foreach ($userList as $user)
            <div class="flex items-center justify-between rounded border border-gray-200 p-4 dark:border-gray-700">
                <div>
                    <div class="text-xl">{{ $user->name }}</div>
                    <div class="text-sm text-gray-400">{{ $user->email }}</div>
                </div>
                <div class="flex gap-4">
                    <x-secondary-button>See cart</x-secondary-button>
                    <x-secondary-button>See transaction</x-secondary-button>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
