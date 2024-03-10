@extends('includes.layout')

@section('content')


<div class="container mx-auto flex flex-wrap py-6 test">

    <!-- Tickets Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3 ">

        <!-- TICKET FORM -->

        <div class="grid grid-cols-3 gap-4">
            @forelse ($reservations as $reservation)
            <div class="bg-white rounded-lg shadow-md relative">
                <div class="relative">
                    <img src="{{ asset('images/' . $item[$reservation->id]->User->image) }}" alt="{{ $ticket->event->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-2">
                        <h5 class="text-lg font-bold">{{ $reservation->event->title }}</h5>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-gray-700">Quantity: {{ $ticket->quantity }}</p>
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('singleTicket', ['id' => $ticket->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Show
                        </a>
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Redeem
                        </a>
                        <form action="{{ route('deleteTicket', ['id' => $ticket->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-lg shadow-md p-4">
                <p class="text-gray-700">No tickets available</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-3">
            <!-- links -->
        </div>

        <!-- Pagination -->
        <div class="flex items-center py-8">
            <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
            <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
            <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
        </div>

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <!-- Mini Profile Section -->
        @if($currentUser)
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-8">
            <img src="{{ asset('images/profile/'.$currentUser->image) }}" alt="Profile Picture" class="h-20 w-20 rounded-full mb-4">
            <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
            <div class="mt-4">
                <button class="bg-purple-500 text-white font-semibold px-4 py-2 rounded transition-colors duration-300 hover:bg-purple-700">
                    <i class="fas fa-ticket-alt mr-2"></i>Tickets
                </button>
            </div>
        </div>
        @else
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-8">
            <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-20 w-20 rounded-full mb-4">
            <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
        </div>
        @endif

        <!-- List of Connections Section -->

        <!-- List of Tickets Section -->
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-6">
            <p class="text-xl font-semibold pb-5">Other tickets</p>
            <ul class="w-full">
                @forelse ($tickets as $ticket)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <imgsrc="{{ asset('images/' . $ticket->event->image) }}" alt="{{ $ticket->event->title }}" class="w-12 h-12 object-cover rounded-full mr-4">
                        <div>
                            <h5 class="text-lg font-bold">{{ $ticket->event->title }}</h5>
                            <p class="text-gray-700">Quantity: {{ $ticket->quantity }}</p>
                        </div>
                    </div>
                    <a href="{{ route('singleTicket', ['id' => $ticket->id]) }}" class="text-blue-500 hover:text-blue-700 font-bold">
                        Show
                    </a>
                </li>
                @empty
                <li class="py-2">No other tickets available</li>
                @endforelse
            </ul>
        </div>

    </aside>

</div>
@endsection