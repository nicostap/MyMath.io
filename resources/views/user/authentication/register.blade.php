@extends('base.base')

@section('content')
    <div class="flex h-screen w-full flex-col justify-center px-6 py-12 bg-gray-900 relative">
        <div class="absolute left-0 top-0 h-full w-full">
            <img src="{{ asset('math.jpg') }}" class="h-full w-full object-cover opacity-20 blur-sm" />
        </div>

        <!-- Registration Form Card -->
        <div class="relative z-10 mt-10 sm:mx-auto sm:w-full sm:max-w-3xl"> <!-- Adjusted to max-w-3xl for larger width -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="sm:mx-auto sm:w-full sm:max-w-xs">
                    <h2 class="my-5 text-center text-2xl font-bold leading-9 tracking-tight text-black">Sign Up</h2>
                </div>

                <form class="space-y-6 lg:grid lg:grid-cols-2 lg:gap-6 lg:space-y-0" action="/register" method="POST">
                    @csrf

                    <!-- Column 1 -->
                    <div class="lg:col-span-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" autofocus>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="lg:col-span-1">
                        <label for="rating" class="block text-sm font-medium leading-6 text-gray-900">Education</label>
                        <select id="rating" name="rating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5">
                            <option value="100">SD</option>
                            <option value="1000">SMP</option>
                            <option value="2000">SMA</option>
                        </select>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    {{-- <div class="lg:col-span-1">
                        <label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                        <div class="mt-2">
                            <input id="confirm_password" name="confirm_password" type="password" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div> --}}

                    <!-- Submit Button spans both columns -->
                    <div class="lg:col-span-2">
                        <!-- Sign-up button with matching styles -->
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-5 py-3 text-lg font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module">
        $(document).ready(function() {

        });
    </script>
@endsection
