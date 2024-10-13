@extends('base.base')

@section('content')
    <div class="flex h-screen w-full flex-col justify-start px-6 py-12 bg-gray-900 relative">
        <div class="absolute left-0 top-0 h-full w-full">
            <img src="{{ asset('math.jpg') }}" class="h-full w-full object-cover opacity-20 blur-sm" />
        </div>

        <div class="relative z-10 mt-10 sm:mx-auto sm:w-full sm:max-w-5xl">
            <div class="text-white text-left">
                <h2 class="my-5 text-center text-3xl font-bold leading-9 tracking-tight">Profile</h2>

                <div id="profile-view" class="space-y-8">
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-col">
                            <span class="text-lg font-medium leading-6">Name</span>
                            <div class="mt-3 pl-5 text-xl">
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-lg font-medium leading-6">Rating</span>
                            <div class="mt-3 pl-5 text-xl">
                                {{ $user->rating }}
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-lg font-medium leading-6">Email</span>
                            <div class="mt-3 pl-5 text-xl">
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>

                    <button onclick="toggleEdit(true)"
                        class="mt-8 flex w-full justify-center rounded-md bg-indigo-600 px-5 py-3 text-lg font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Edit Profile
                    </button>
                </div>

                <form id="profile-edit" class="hidden space-y-8" action="{{ route('update-profile') }}" method="POST">
                    @csrf

                    <div class="flex flex-col space-y-4">
                        <div class="flex items-center justify-between">
                            <label for="name" class="text-lg font-medium leading-6">Name</label>
                        </div>
                        <div class="mt-2 flex items-center">
                            <input id="name" name="name" type="text" value="{{ $user->name }}" disabled required
                                class="input-field flex-1 block w-full rounded-md border-0 py-2 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-lg sm:leading-6">
                            <button type="button" onclick="toggleField('name')"
                                class="ml-2 px-4 py-2 text-lg bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none">
                                Edit
                            </button>
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="email" class="text-lg font-medium leading-6">Email</label>
                        </div>
                        <div class="mt-2 flex items-center">
                            <input id="email" name="email" type="email" value="{{ $user->email }}" disabled required
                                class="input-field flex-1 block w-full rounded-md border-0 py-2 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-lg sm:leading-6">
                            <button type="button" onclick="toggleField('email')"
                                class="ml-2 px-4 py-2 text-lg bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none">
                                Edit
                            </button>
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="password" class="text-lg font-medium leading-6">Password</label>
                        </div>
                        <div class="mt-2 flex items-center">
                            <input id="password" name="password" type="password" placeholder="Enter new password" disabled required
                                class="input-field flex-1 block w-full rounded-md border-0 py-2 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-lg sm:leading-6">
                            <button type="button" onclick="toggleField('password')"
                                class="ml-2 px-4 py-2 text-lg bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none">
                                Edit
                            </button>
                        </div>
                    </div>

                    <div class="flex space-x-4 mt-8">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-green-600 px-5 py-3 text-lg font-semibold leading-7 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                            Save Changes
                        </button>
                        <button type="button" onclick="toggleEdit(false)"
                            class="flex w-full justify-center rounded-md bg-red-600 px-5 py-3 text-lg font-semibold leading-7 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .input-field:disabled {
            background-color: #333;
        }
    </style>

    <script>
        function toggleField(fieldId) {
            const field = document.getElementById(fieldId);
            field.disabled = !field.disabled;
            if (!field.disabled) {
                field.focus();
            }
        }

        function toggleEdit(editMode) {
            const profileView = document.getElementById('profile-view');
            const profileEdit = document.getElementById('profile-edit');

            if (editMode) {
                profileView.classList.add('hidden');
                profileEdit.classList.remove('hidden');
            } else {
                profileView.classList.remove('hidden');
                profileEdit.classList.add('hidden');
            }
        }

        function toggleAllFields(enable) {
            ['name', 'email', 'password'].forEach(fieldId => {
                const field = document.getElementById(fieldId);
                field.disabled = !enable;
            });
        }
    </script>
@endsection