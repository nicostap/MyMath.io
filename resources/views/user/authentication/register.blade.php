@extends('base.base')

@section('content')
    <div class="h-full w-full flex flex-col justify-center px-6 py-auto bg-primary relative">
        <div class="relative z-10 mt-10 sm:mx-auto sm:w-full sm:max-w-3xl">
            <div class="bg-white border border-quaternary shadow-lg rounded-lg p-6">
                <div class="sm:mx-auto sm:w-full sm:max-w-xs">
                    <h2 class="my-5 text-center text-2xl font-bold leading-9 tracking-tight text-black">Sign Up</h2>
                </div>

                <form class="space-y-6 lg:grid lg:grid-cols-2 lg:gap-6 lg:space-y-0" action="/register" method="POST">
                    @csrf

                    <div class="lg:col-span-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-quaternary sm:text-sm sm:leading-6" autofocus>
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-quaternary sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="rating" class="block text-sm font-medium leading-6 text-gray-900">Education</label>
                        <select id="rating" name="rating"
                            class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-quaternary sm:text-sm sm:leading-6">
                            <option value="100">SD</option>
                            <option value="1000">SMP</option>
                            <option value="2000">SMA</option>
                        </select>
                    </div>

                    <div class="lg:col-span-1">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-quaternary sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-quaternary px-5 py-3 text-lg font-semibold leading-7 text-white shadow-sm hover:bg-tertiary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-quaternary">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection