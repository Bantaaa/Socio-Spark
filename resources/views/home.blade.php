@extends('includes.layout')

@section('content')


<div class="container mx-auto flex flex-wrap py-6 test">

    <!-- Posts Section -->
        <form id="searchForm" class="w-full md:w-2/3 flex items-center bg-white rounded-md shadow-md overflow-hidden mb-4">
            <input id="searchInput" name="query" type="text" class="w-full px-4 py-2 focus:outline-none" placeholder="Search...">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Search</button>
        </form>
        <script>
    $(document).ready(function() {
        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var keyword = $('#searchInput').val();

            $.ajax({
                type: 'GET',
                url: '/search/events',
                data: {
                    title_s: keyword
                },
                success: function(data) {
                    $('#eventList').empty();
                    console.log(data);
                    data.forEach(function(user) {
                        var listItem =
                        $('#eventList').append(listItem);
                    });
                },
                error: function(error) {
                    console.error("Error during search:", error);
                }
                
            });
        });
    });
</script>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3 ">


        <!-- POST FORM  -->



        <div class="grid grid-cols-3 gap-4">
            @forelse ($events as $event)
            <ul id="eventList">
            <div class="bg-white rounded-lg shadow-md relative">
                <div class="relative">
                    <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-fit rounded-t-lg">
                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-2">
                        <h5 class="text-lg font-bold">{{ $event->title }}</h5>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-gray-700">Quantity: {{ $event->quantity }}</p>
                    @if(session('user_id'))
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('singleEvent', ['id' => $event->id]) }}" class="bg-custom-lime hover:bg-custom-lime-dark text-white font-bold py-2 px-4 rounded mr-2">
                            <i class="fas fa-eye mr-1"></i> View
                        </a>
                        @if(session('user_id') == $event->user_id)
                        <form action="{{ route('destroy', ['id' => $event->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                Delete
                            </button>
                        </form>
                        @endif
                    </div>
                    @else
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('login')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Show
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </ul>
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
            <img src="{{ asset('images/profile/'.$currentUser->image) }}" alt="Profile Picture" class="h-20 w-20 rounded-full mb-4 object-fit">
            <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
            <div class="mt-4">
                <form action="{{ route('tickets') }}">
                    <button class="bg-purple-500 text-white font-semibold px-4 py-2 rounded transition-colors duration-300 hover:bg-purple-700">
                        <i class="fas fa-ticket-alt mr-2"></i>Tickets
                    </button>
                </form>
            </div>
        </div>

        @else
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-8">
            <img src="{{ asset('images/2919906.png') }}" alt="Profile Picture" class="h-20 w-20 rounded-full mb-4 object-fit">
            <h3 class="text-2xl font-semibold">{{ session('name') }}</h3>
        </div>
        @endif

        <!-- List of Connections Section -->


        <!-- List of Events Section -->
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-6">
            <p class="text-xl font-semibold pb-5">Other events</p>
            <ul class="w-full">
                @forelse ($events as $event)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <img src="{{ asset('images/'.$event->image) }}" alt="Event 1" class="h-12 w-12 rounded-full object-fit">
                        <p class="ml-4">{{ $event->title }}</p>
                    </div>
                    <a href="{{ route('singleEvent', ['id' => $event->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
                </li>
                @empty
                <li class="flex items-center justify-center py-2">
                    <p class="text-gray-500">No events found</p>
                </li>
                @endforelse
                <!-- Add more events here -->
            </ul>
        </div>
        <!-- pending events -->
        <div class="w-full bg-white shadow flex flex-col items-center my-4 p-6">
            @if($myEvents)
            <p class="text-xl font-semibold pb-5">My events status</p>
            <ul class="w-full">

                @forelse ($myEvents as $eventx)
                @if($eventx->validated == 0)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <img src="{{ asset('images/'.$eventx->image) }}" alt="Event 1" class="h-12 w-12 rounded-full object-fit">
                        <p class="ml-4">{{ $eventx->title }}</p>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('singleEvent', ['id' => $eventx->id]) }}" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            <i class="fas fa-clock text-white mr-2"></i> <!-- White clock icon -->
                            <span class="text-white">View</span>
                        </a>
                    </div>
                </li>
                @elseif($eventx->validated == 1)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <img src="{{ asset('images/'.$eventx->image) }}" alt="Event 1" class="h-12 w-12 rounded-full object-fit">
                        <p class="ml-4">{{ $eventx->title }}</p>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('singleEvent', ['id' => $eventx->id]) }}" class="btn bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                            <i class="fas fa-check text-white mr-2"></i> <!-- White checkmark icon -->
                            <span class="text-white">View</span>
                        </a>
                    </div>
                </li>
                @elseif($eventx->validated == 3)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <img src="{{ asset('images/'.$eventx->image) }}" alt="Event 1" class="h-12 w-12 rounded-full object-fit">
                        <p class="ml-4">{{ $eventx->title }}</p>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('singleEvent', ['id' => $eventx->id]) }}" class="btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                            <i class="fas fa-times text-white mr-2"></i> <!-- White X icon -->
                            <span class="text-white">View</span>
                        </a>
                    </div>
                </li>
                @endif
                @empty
                <li class="flex items-center justify-center py-2">
                    <p class="text-gray-500">No events found</p>
                </li>
                @endforelse

                <!-- Add more events here -->
            </ul>
            @endif
        </div>
    </aside>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->



</div>
@endsection