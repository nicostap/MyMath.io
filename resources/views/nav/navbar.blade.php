<nav class="bg-quaternary border-gray-200 dark:bg-quaternary">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <img src="{{ asset('M.png') }}" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MyMath.io</span>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-quaternary rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom" onclick="clicker()">
                <span class="sr-only">Open user menu</span>
                <x-iconoir-profile-circle />
            </button>
        </div>
    </div>
</nav>

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
