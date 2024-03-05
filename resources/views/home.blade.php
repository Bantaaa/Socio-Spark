@extends('includes.layout')

@section('content')


<div class="container mx-auto flex flex-wrap py-6 test">

    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3 ">


        <!-- POST FORM  -->



        <div class="grid grid-cols-3 gap-4">
    @forelse ($events as $event)
    <div class="bg-white rounded-lg shadow-md relative">
        <div class="relative">
            <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded-t-lg">
            <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-2">
                <h5 class="text-lg font-bold">{{ $event->title }}</h5>
            </div>
        </div>
        <div class="p-4">
            <p class="text-gray-700">Quantity: {{ $event->quantity }}</p>
            <div class="flex justify-center mt-4">
                <a href="{{ route('singleEvent', ['id' => $event->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Show
                </a>
                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Reserve
                </a>
                <form action="{{ route('destroy', ['id' => $event->id]) }}" method="POST">
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
        <p class="text-gray-700">No events available</p>
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
        </div>

        @else
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-8">
            <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-20 w-20 rounded-full mb-4">
            <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
        </div>
        @endif

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
                    <a href="{{ route('singleEvent', ['id' => $event->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
                </li>
                @endforeach
                <!-- Add more events here -->
            </ul>
        </div>

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->



</div>
@endsection