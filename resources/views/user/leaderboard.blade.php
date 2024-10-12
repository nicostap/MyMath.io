@extends('base.base')

@section('content')
    <div
        class="relative flex flex-col h-full w-full items-center justify-between gap-5 bg-gray-900 text-white overflow-hidden">
        <div class="absolute left-0 top-0 h-full w-full">
            <img src="{{ asset('math.jpg') }}" class="h-full w-full object-cover opacity-20 blur-sm" />
        </div>

        <div class="my-3 relative overflow-x-auto shadow-md sm:rounded-md">
            {{-- <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users">
                </div>
            </div> --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption class="text-xs text-gray-700 uppercase bg-gray-50 font-bold text-left px-6 py-1">Beginner</caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Rank
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Current Education
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rating
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Follow
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Action
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($players as $player)
                        <tr
                            class={{ $player->id == $user->id ? "bg-gray-600 border-b" : "bg-gray-800 border-b dark:bg-gray-800 dark:border-gray-700" }}>
                            <td class="px-6 py-4 text-white whitespace-nowrap">
                                {{ ++$counter }}
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-white whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    alt="no image">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $player->name }}</div>
                                    {{-- <div class="font-normal text-gray-500">{{ $player->email }}</div> --}}
                                </div>
                            </th>
                            <td class="px-6 py-4 text-white whitespace-nowrap">
                                High School
                            </td>
                            <td class="px-6 py-4 text-white whitespace-nowrap">
                                {{ $player->rating }}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <div class="flex items-center">Follow</div>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@endsection

@section('scripts')
    <script type="module">
        $(document).ready(function() {

        });
    </script>
@endsection
