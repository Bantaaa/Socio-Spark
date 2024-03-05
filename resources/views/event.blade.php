@extends('includes.layout')

@section('content')


<div class="container mx-auto flex flex-wrap py-6 test">

    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <!-- article -->
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-6">
            <img src="{{ asset('images/'.$event->image) }}" alt="Event Image" class="mb-4">
            <h2 class="text-2xl font-semibold">{{ $event->title }}</h2>
            <p class="text-gray-600">{{$event->description}}</p>
            <p class="text-gray-600">Quantity: {{$event->quantity}}</p>
            <button class="bg-blue-500 text-white text-2xl px-8 py-4 rounded mt-4 hover:bg-blue-400">
                Reserve
            </button>
        </div>
    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
        <div class="border-b-4 border-blue-500 mb-4">
            <h2 id="regulartext" class="text-2xl font-semibold">Your Ticket</h2>
        </div>

        <!-- Regular Ticket Information -->
        <div id="regularTicket" class="w-full bg-white shadow flex my-4 border border-blue-500">
            <!-- Profile Picture -->
            <div class="flex-shrink-0 p-6 flex flex-col items-center">
                <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-20 w-20 rounded-full">
                <div class="mt-4">
                    <button id="regularTicketButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Take ticket
                    </button>
                </div>
                <div class="mt-4">
                    <p>left: 69</p>
                </div>
            </div>

            <!-- Ticket Information -->
            <div class="flex-grow py-6 px-8">
                <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
                <div class="mt-6">
                    <h4 class="text-lg font-semibold">Event:</h4>
                    <p class="text-gray-600">{{ $event->title }}</p>
                </div>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold">Category:</h4>
                    <p class="text-gray-600">{{ $event->category }}</p>
                </div>
            </div>
        </div>

        <div class="border-b-4 border-yellow-500 mb-4" id="vipTextContainer" style="display: none;">
            <h2 id="viptext" class="text-2xl font-semibold">Your VIP Ticket</h2>
        </div>

        <!-- VIP Ticket Button -->
        <div id="vipTicket" class="w-full bg-white shadow-lg flex my-4 border border-yellow-500" style="display: none;">
            <!-- Profile Picture -->
            <div class="flex-shrink-0 p-6 flex flex-col items-center">
                <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-20 w-20 rounded-full">
                <div class="mt-4">
                    <button id="vipTicketButton" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                        Take VIP ticket
                    </button>
                </div>
                <div class="mt-4">
                    <p>left: 69</p>
                </div>
            </div>

            <!-- Ticket Information -->
            <div class="flex-grow py-6 px-8">
                <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
                <div class="mt-6">
                    <h4 class="text-lg font-semibold">Event:</h4>
                    <p class="text-gray-600">{{ $event->title }}</p>
                </div>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold">Category:</h4>
                    <p class="text-gray-600">{{ $event->category }}</p>
                </div>
                <div class="mt-4">
                    <h4 class="text-lg font-semibold">VIP Benefits:</h4>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Priority seating</li>
                        <li>Access to VIP lounge</li>
                        <li>Exclusive merchandise</li>
                        <!-- Add more VIP benefits here -->
                    </ul>
                </div>
            </div>
        </div>

        <!-- Toggle Buttons -->
        <div id="toggleButtons" class="flex">
            <button id="toggleToRegularButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" style="display: none;">
                Switch to Regular
            </button>
            <button id="toggleToVIPButton" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                Switch to VIP
            </button>
        </div>

        <!-- JavaScript to toggle the visibility of ticket plans -->
        <script>
            const regularTicketButton = document.querySelector('#regularTicketButton');
            const regularTextButton = document.querySelector('#regulartext');
            constvipTextButton = document.querySelector('#viptext');
            const vipTextContainer = document.querySelector('#vipTextContainer');
            const vipTicketButton = document.querySelector('#vipTicketButton');
            const regularTicketInfo = document.querySelector('#regularTicket');
            const vipTicketInfo = document.querySelector('#vipTicket');
            const toggleToRegularButton = document.querySelector('#toggleToRegularButton');
            const toggleToVIPButton = document.querySelector('#toggleToVIPButton');

            regularTicketButton.addEventListener('click', () => {
                regularTicketInfo.style.display = 'none';
                vipTicketInfo.style.display = 'flex';
                toggleToRegularButton.style.display = 'inline-block';
                toggleToVIPButton.style.display = 'none';
                vipTextContainer.style.display = 'block';
            });

            toggleToRegularButton.addEventListener('click', () => {
                regularTextButton.style.display = 'block';
                regularTicketInfo.style.display = 'flex';
                vipTicketInfo.style.display = 'none';
                toggleToRegularButton.style.display = 'none';
                toggleToVIPButton.style.display = 'inline-block';
                vipTextContainer.style.display = 'none';
            });

            toggleToVIPButton.addEventListener('click', () => {
                regularTextButton.style.display = 'none';
                regularTicketInfo.style.display = 'none';
                vipTicketInfo.style.display = 'flex';
                toggleToRegularButton.style.display = 'inline-block';
                toggleToVIPButton.style.display = 'none';
                vipTextContainer.style.display = 'block';
            });
        </script>

        <!-- List of Connections Section -->

        <!-- List of Events Section -->
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-6">
            <p class="text-xl font-semibold pb-5">Other events</p>
            <ul class="w-full">
                @foreach ($events as $event)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <img src="{{ asset('images/'.$event->image) }}" alt="Event 1" class="h-12 w-12 rounded-full">
                        <p class="ml-4">{{ $event->title }}</p>
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View</button>
                </li>
                @endforeach
                <!-- Add more events here -->
            </ul>
        </div>
    </aside>

</div>
@endsection