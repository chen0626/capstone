<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Animals') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session()->has('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session()->get('status') }}</span>
                </div>
                @endif

                <div class="p-6 text-gray-900">
                    {{ __("You're logged in. Welcome to RescuePaws!") }}


                    <div class="flex mt-8 space-x-8">

                        <div class="flex-none bg-gray-100 p-4 rounded w-1/2">

                            <img src="{{ asset('images/pipi.jpg') }}" alt="Animal Image" width="200" height="299" class="mx-auto">
                            <h3 class="mt-4 font-semibold text-xl text-center">Pi Pi</h3>
                            <p class="mt-2 text-gray-600 text-center">This is Pi Pi, a 4 and a half-year-old male Alaskan Malamute. His owner abandoned him. Throughout his life, his living conditions have been very poor, but with the donations from everyone and our dedicated care, he is gradually regaining his vitality. Welcome everyone to contribute love to Pi Pi!</p>

                            <div class="text-center">
                                <a href="{{ route('donation.show', 'pipi') }}" class="mt-4 inline-block px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Donate
                                </a>
                            </div>
                        </div>

                        <div class="flex-none bg-gray-100 p-4 rounded w-1/2">
                            <img src="{{ asset('images/shengsheng.jpg') }}" alt="Animal Image" width="200" height="299" class="mx-auto">
                            <h3 class="mt-4 font-semibold text-xl text-center">Sheng Sheng</h3>

                            <p class="mt-2 text-gray-600 text-center">This is Sheng Sheng, a 2 and a half-year-old male American Bully. We rescued him from the streets. His personality is very shy and quiet, completely opposite to his appearance. Welcome everyone to contribute love to Sheng Sheng!</p>

                            <div class="text-center">
                                <a href="{{ route('donation.show', 'shengsheng') }}" class="mt-4 inline-block px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Donate
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- End of flex container -->
                    <div class="orders mt-8">
    @foreach($orders as $order)
        <div class="order-div card mb-3 figtree-font">
            <div class="card-header" style="background-color: #4f46e5; color: white;">
                Donation
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-dollar-sign"></i> 
                    Amount: ${{ $order->amount }} 
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Donor: {{ optional($order->user)->name ?? 'Unknown User' }}
                </h6>
                @if($order->User_id == auth()->id())
                    <form action="{{ route('order.updateNote', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="note-{{ $order->id }}" class="form-label">
                                <i class="fas fa-sticky-note"></i> 
                                Note:
                            </label>
                            <textarea name="note" class="form-control" id="note-{{ $order->id }}" rows="2">{{ $order->Note }}</textarea>
                        </div>
                        <button type="submit" class="btn" style="background-color: #4f46e5; color: white;">
                            <i class="fas fa-edit"></i>
                            Update Note
                        </button>
                    </form>
                @else
                    <p class="card-text">
                        <i class="fas fa-comment-dots"></i> 
                        Note: {{ $order->Note }}
                    </p>
                @endif
            </div>
        </div>
    @endforeach
</div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>