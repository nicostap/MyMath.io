@extends('base.base')

@section('content')
    <div class="flex h-screen w-full flex-col justify-center px-6 py-12 bg-gray-900 relative">
        <div class="absolute left-0 top-0 h-full w-full">
            <img src="{{ asset('math.jpg') }}" class="h-full w-full object-cover opacity-20 blur-sm" />
        </div>

        <!-- Login Form Card -->
        <div class="relative z-10 mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="sm:mx-auto sm:w-full sm:max-w-xs">
                    <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-black">Log In</h2>
                </div>
                
                <!-- Success Alert -->
                @if (session()->has('success'))
                    <div class="mt-5 relative z-10 mx-auto mb-4 w-full max-w-xs bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
        
                <!-- Error Alert -->
                @if (session()->has('loginError'))
                    <div class="mt-5 relative z-10 mx-auto mb-4 w-full max-w-xs bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded"
                        role="alert">
                        <span class="block sm:inline">{{ session('loginError') }}</span>
                    </div>
                @endif

                <form class="space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                autofocus>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <!-- Enlarged Button -->
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-5 py-3 text-lg font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Log in
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
