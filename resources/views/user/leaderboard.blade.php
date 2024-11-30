@extends('base.base')

@section('content')
<div class="bg-primary py-5">
    <div class="relative w-4/5 sm:w-1/2 mx-auto items-center justify-center text-white">
        <div class="my-3 relative shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left rtl:text-right text-quinary dark:text-gray-400">
                <caption class="text-gray-700 uppercase bg-gray-50 font-bold text-center px-6 py-4 text-lg">
                    Your Rank
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-quinary">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            {{ $user->rating }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            SMA
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @foreach ($ranks as $rank => $players)
        <div class="relative w-4/5 sm:w-1/2 mx-auto items-center justify-center text-white mt-5">
            <div class="my-3 relative shadow-md sm:rounded-md">
                <table class="w-full text-sm text-left rtl:text-right text-quinary dark:text-gray-400">
                    <caption class="text-quinary uppercase bg-gray-50 font-bold text-center px-6 py-4 text-lg">
                        {{ $rank }}
                    </caption>
                    <thead class="text-xs text-quinary uppercase bg-gray-50 dark:bg-gray-700 dark:text-quinary">
                        <tr>
                            <th scope="col" class="px-3 py-3">
                                Rank
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 hidden sm:block">
                                Current Education
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3">
                                Rating
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($players as $player)
                            <tr
                                class="{{ $player->id == $user->id ? 'bg-quaternary border-b' : 'bg-tertiary border-b dark:bg-tertiary dark:border-secondary' }}">
                                <td class="text-center text-quinary whitespace-nowrap">
                                    {{ ++$counter }}
                                </td>
                                <td scope="row" class="flex items-center px-3 sm:px-6 py-4 text-quinary  dark:text-quinary">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                        alt="no image">
                                    <div class="ps-3">
                                        <div class="text-sm sm:text-base font-semibold break-normal">{{ $player->name }}</div>
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 text-quinary whitespace-nowrap hidden sm:table-cell">
                                    High School
                                </td>
                                <td class="px-3 sm:px-6 text-quinary whitespace-nowrap">
                                    {{ $player->rating }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script type="module">
    $(document).ready(function () { });
</script>
@endsection