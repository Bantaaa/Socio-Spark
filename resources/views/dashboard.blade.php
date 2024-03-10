<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('admin') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Administrator
            </a>
            <!-- <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Blank Page
            </a> -->
            <a href="{{ route('orga') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Event Organizer
            </a>
            <!-- <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a> -->
            <!-- <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tabbed Content
            </a>
            <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Calendar
            </a>
        </nav>
        <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Upgrade to Pro!
        </a> -->
    </aside>

    <!--  -->




    <!--  -->
    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ asset('images/profile/'.$currentUser->image) }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="tables.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Tables</h1>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Categories
                    </p>
                    <form id="categoryForm" action="{{ route('categoryUpdate', ['id' => 'idd']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex">
                            <input id="categoryInput" type="text" name="name" value="" class="rounded-l-lg px-4 py-2 w-full focus:outline-none focus:border-blue-500 border">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg px-4 py-2">
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </form>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Events</th>
                                    <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($categories as $category)
                                <tr>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $category->name }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">69</td>
                                    <td class="w-1/6 text-center py-3 px-4">
                                        <div class="flex justify-center">
                                            <button type="button" class="border-none bg-transparent p-0" onclick="syncCategory('{{ $category->id }}', '{{ $category->name }}')">
                                                <i class="fas fa-sync-alt text-blue-500 hover:text-blue-600 cursor-pointer"></i>
                                            </button>
                                            <form action="{{ route('categoryDelete', ['id'=>$category->id]) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="border-none bg-transparent p-0 ml-4">
                                                    <i class="fas fa-times text-red-500 hover:text-red-600 cursor-pointer"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        No categories have been added yet.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <script>
                        function syncCategory(categoryId, categoryName) {
                            var categoryInput = document.getElementById('categoryInput');
                            var categoryForm = document.getElementById('categoryForm');
                            var categoryAction = "{{ route('categoryUpdate', ['id' => 'idd']) }}";

                            categoryInput.value = categoryName;
                            categoryForm.action = categoryAction.replace('idd', categoryId);
                        }
                    </script>


                </div>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Event requests
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="w-2/6 text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Place</th>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Reservation Mode</th>
                                    <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($nonApprovedEvents as $event)
                                <tr>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $event->title }}</td>
                                    <td class="w-2/6 text-left py-3 px-4">{{ $event->description }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $event->place }}</td>
                                    <td class="w-1/12 text-left py-3 px-4">{{ $event->Category->name }}</td>
                                    <td class="w-1/12 text-left py-3 px-4">{{ $event->quantity }}</td>
                                    @if( $event->autoTicket == 1)
                                    <td class="w-1/6 text-left py-3 px-4">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                                            Automatic
                                        </button>
                                    </td>
                                    @elseif( $event->autoTicket == 0)
                                    <td class="w-1/6 text-left py-3 px-4">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                                            Manual
                                        </button>
                                    </td>
                                    @endif
                                    <td class="w-1/6 text-center py-3 px-4">
                                        <div class="flex">
                                            <form action="{{ route('approveEvent', $event->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="border-none bg-transparent p-0">
                                                    <i class="fas fa-check text-green-500 hover:text-green-600 cursor-pointer"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('rejectEvent', $event->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="border-none bg-transparent p-0 ml-4">
                                                    <i class="fas fa-times text-red-500 hover:text-red-600 cursor-pointer"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <!-- No reservations message -->
                                <tr>
                                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        No event requests have been made yet.
                                    </td>
                                </tr>
                                @endforelse
                                <!-- Add more rows for other events as needed -->
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i> Approved Events
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="w-2/6 text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Place</th>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Reservation Mode</th>
                                    <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($approvedEvents as $event)
                                <tr>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $event->title }}</td>
                                    <td class="w-2/6 text-left py-3 px-4">{{ $event->description }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $event->place }}</td>
                                    <td class="w-1/12 text-left py-3 px-4">{{ $event->Category->name }}</td>
                                    <td class="w-1/12 text-left py-3 px-4">{{ $event->quantity }}</td>
                                    @if( $event->autoTicket == 1)
                                    <td class="w-1/6 text-left py-3 px-4">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                                            Automatic
                                        </button>
                                    </td>
                                    @elseif( $event->autoTicket == 0)
                                    <td class="w-1/6 text-left py-3 px-4">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                                            Manual
                                        </button>
                                    </td>
                                    @endif
                                    <td class="w-1/6 text-center py-3 px-4">
                                        <div class="flex">
                                            <form action="{{ route('rejectEvent', $event->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="border-none bg-transparent p-0 ml-4">
                                                    <i class="fas fa-times text-red-500 hover:text-red-600 cursor-pointer"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <!-- No reservations message -->
                                <tr>
                                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        No events have been approved yet.
                                    </td>
                                </tr>
                                @endforelse
                                <!-- Add more rows for other events as needed -->
                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-times-circle text-red-500 mr-3"></i> Canceled Events
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="w-2/6 text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Place</th>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Reservation Mode</th>
                                    <th class="w-1/6 text-center py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($canceledEvents as $event)
                                <tr>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $event->title }}</td>
                                    <td class="w-2/6 text-left py-3 px-4">{{ $event->description }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $event->place }}</td>
                                    <td class="w-1/12 text-left py-3 px-4">{{ $event->Category->name }}</td>
                                    <td class="w-1/12 text-left py-3 px-4">{{ $event->quantity }}</td>
                                    @if( $event->autoTicket == 1)
                                    <td class="w-1/6 text-left py-3 px-4">
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                                            Automatic
                                        </button>
                                    </td>
                                    @elseif( $event->autoTicket == 0)
                                    <td class="w-1/6 text-left py-3 px-4">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                                            Manual
                                        </button>
                                    </td>
                                    @endif
                                    <td class="w-1/6 text-center py-3 px-4">
                                        <div class="flex">
                                            <form action="{{ route('destroy', $event->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="border-none bg-transparent p-0 ml-4">
                                                    <i class="fas fa-trash-alt text-red-500 hover:text-red-600 cursor-pointer"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <!-- No reservations message -->
                                <tr>
                                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        No events have been canceled yet.
                                    </td>
                                </tr>
                                @endforelse
                                <!-- Add more rows for other events as needed -->
                            </tbody>
                        </table>
                    </div>


                </div>


                <!-- <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Table Example
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="text-left w-full border-collapse"> 
                            <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Last Name</th>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Phone</th>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                                    <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                                    <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                                    <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                                    <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                                    <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                                    <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                                    <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                                    <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                                    <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                                </tr>
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                                    <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                                    <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                                    <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="pt-3 text-gray-600">
                        Source: <a class="underline" href="https://tailwindcomponents.com/component/table">https://tailwindcomponents.com/component/table</a>
                    </p>
                </div> -->

                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-user mr-3"></i> Users list
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        User
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Created at
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-full h-full rounded-full" src="{{ asset('images/profile/'.$user->image) }}" alt="{{$user->name}}" />
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($user->role_id == 1)
                                        <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                        @elseif($user->role_id == 2)
                                        <p class="text-gray-900 whitespace-no-wrap">Organizer</p>
                                        @elseif($user->role_id == 3)
                                        <p class="text-gray-900 whitespace-no-wrap">User</p>
                                        @elseif($user->role_id == 4)
                                        <p class="text-gray-900 whitespace-no-wrap">Banned</p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$user->created_at}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($user->active == 1)
                                        <span class="bg-green-500 text-white font-bold py-2 px-4 rounded-full">
                                            Active
                                        </span>
                                        @elseif($user->active == 0)
                                        <span class="bg-red-500 text-white font-bold py-2 px-4 rounded-full">
                                            Suspended
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($user->active == 0)
                                        <form action="{{ route('unban', $user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:text-red-600" title="Unban">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('ban', $user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:text-red-600" title="ban">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                                @empty
                                <!-- No reservations message -->
                                <tr>
                                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        No users have been created yet.
                                    </td>
                                </tr>
                                @endforelse
                                <!-- Add more rows for other users as needed -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </main>

            <!-- <footer class="w-full bg-white text-right p-4">
            </footer> -->
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>