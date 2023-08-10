<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                {{ __("You're donating for: ") }} {{ ucwords($animal) }}

                    <form action="{{ route('donation.store') }}" method="post">
                        @csrf
                       
                        <div class="mt-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                            <input type="number" name="amount" id="amount" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mt-4">
                            <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                            <textarea name="note" id="note" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="animal" value="{{ $animal }}">

                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                Submit Donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
