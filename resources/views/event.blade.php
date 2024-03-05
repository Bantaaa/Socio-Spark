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
    <h2 class="text-2xl font-semibold">Your Ticket</h2>
    <!-- Mini Profile Section -->
    <div class="w-full bg-white shadow flex my-4 border border-blue-500">
        <!-- Profile Picture -->
        <div class="flex-shrink-0 p-6 flex flex-col items-center">
            <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-20 w-20 rounded-full">
            <div class="mt-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
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

    <!-- List of Connections Section -->

    <!-- List of Users Section -->
    <div class="w-full bg-white shadow flex flex-col items-center my-4 p-6">
        <p class="text-xl font-semibold pb-5">Users</p>
        <form id="searchForm" class="mb-5">
            <input type="text" id="searchInput" name="query" placeholder="Search" class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-400">Search</button>
        </form>
        <ul id="userList" class="space-y-4 w-96">
            <!--  -->
            @foreach($events as $event)
            <li class="flex items-center">
                <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-8 w-8 rounded-full">
                <h4 class="ml-3">{{$event->title}}</h4>
                <div class="ml-auto relative">
                    <form action="" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-400">
                            view
                        </button>
                    </form>
                </div>
            </li>
            <!--  -->
            @endforeach
        </ul>
    </div>
</aside>
</div>
@endsection