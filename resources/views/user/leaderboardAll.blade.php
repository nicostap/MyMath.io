@extends('base.base')

@section('content')
    @foreach ($ranks as $rank => $players)
        <div class= "relative flex flex-col h-full w-full items-center justify-between gap-5 bg-primary text-quinary">
            <div class="my-3 relative overflow-x-auto shadow-md sm:rounded-md">
                <table class="w-full text-sm text-left rtl:text-right text-quinary dark:text-quinary">
                    <caption class="text-quinary uppercase bg-secondary font-bold text-left px-6 py-1 text-lg">
                        {{ $rank }}
                    </caption>
                    <thead class="text-xs text-quinary uppercase bg-secondary dark:bg-secondary dark:text-quinary">
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
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($players as $player)
                            <tr class='bg-tertiary border-b dark:bg-tertiary dark:border-quatenary'>
                                <td class="px-6 py-4 quinary whitespace-nowrap">
                                    {{ ++$counter }}
                                </td>
                                <th scope="row"
                                    class="flex items-center px-6 py-4 quinary whitespace-nowrap dark:quinary">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                        alt="no image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $player->name }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4 quinary whitespace-nowrap">
                                    High School
                                </td>
                                <td class="px-6 py-4 quinary whitespace-nowrap">
                                    {{ $player->rating }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach




    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script type="module">
        $(document).ready(function() {

        });
    </script>
@endsection
