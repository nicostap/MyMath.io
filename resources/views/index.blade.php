@extends('base.base')

@section('content')
    {{ Auth::id() }}

    <div class="flex flex-col h-full w-full items-center justify-between gap-5 bg-gray-900 text-white">
        <div class="w-full py-16 sm:px-6 sm:py-24 lg:px-8">
            <div
                class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-80 lg:py-40">
                <svg viewBox="0 0 1024 1024"
                    class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                    aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                        fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" />
                        </radialGradient>
                    </defs>
                </svg>
                <div class="mx-auto w-full max-w-none lg:flex-auto lg:py-32 lg:text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Boost your Mathematic,<br>Play
                        our game now!</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-300">See how strong your math is. Beat the others and become
                        the legend</p>
                    <div class="mt-10 flex items-center justify-start gap-x-6">
                        <a href="{{ route('login') }}"
                            class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            Login</a>
                        <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-white">Sign Up <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
                <div class="relative mt-16 h-80 lg:mt-8">
                    <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10"
                        src={{ asset('Math.jpg') }} alt="App screenshot" width="1824" height="1080">
                </div>
            </div>
        </div>
    </div>


    <div class="flex flex-col h-full w-full items-center justify-between gap-5 bg-gray-900 text-white py-24 sm:py-32">
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8 py-20">
            <p class="mx-auto mt-2 max-w-lg text-pretty text-center text-4xl font-medium tracking-tight sm:text-5xl">
                Practice and Challenge</p>
            <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-3 lg:grid-rows-2">
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                        <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Anytime,
                                Anywhere</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Play on your mobile device
                            </p>
                        </div>
                        <div
                            class="relative min-h-[30rem] w-full grow [container-type:inline-size] max-lg:mx-auto max-lg:max-w-sm">
                            <div
                                class="absolute inset-x-10 bottom-0 top-10 overflow-hidden rounded-t-[12cqw] border-x-[3cqw] border-t-[3cqw] border-gray-700 bg-gray-900 shadow-2xl">
                                <img class="size-full object-cover object-top" src={{ asset('mobile.jpg') }} alt="">
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 lg:rounded-l-[2rem]">
                    </div>
                </div>
                <div class="relative max-lg:row-start-1">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                        <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">
                                Performance</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Check your rank in
                                leaderboard</p>
                        </div>
                        <div
                            class="flex flex-1 items-center justify-center px-8 max-lg:pb-12 max-lg:pt-10 sm:px-10 lg:pb-2">
                            <img class="w-full max-lg:max-w-xs" src={{ asset('SS_Leaderboard.jpg') }} alt="">
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]">
                    </div>
                </div>
                <div class="relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2">
                    <div class="absolute inset-px rounded-lg bg-white"></div>
                    <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)]">
                        <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Test young
                                strength
                            </p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Challenge the other, push
                                your rating</p>
                        </div>
                        <div class="flex flex-1 items-center [container-type:inline-size] max-lg:py-6 lg:pb-2">
                            <img class="h-[min(152px,40cqw)] object-cover object-center"
                                src={{ asset('SS_ResultGame.jpg') }} alt="">
                        </div>
                    </div>
                    <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5"></div>
                </div>
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                        <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">FREE</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">With in-game purchase</p>
                        </div>
                        <div class="relative min-h-[30rem] w-full grow">
                            <div
                                class="absolute bottom-0 left-10 right-0 top-10 overflow-hidden rounded-tl-xl bg-gray-900 shadow-2xl">
                                <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                    <div class="-mb-px flex text-sm font-medium leading-6 text-gray-400">
                                        <div
                                            class="border-b border-r border-b-white/20 border-r-white/10 bg-white/5 px-4 py-2 text-white">
                                            TermAndCondition.TAC</div>
                                    </div>
                                </div>
                                <div class="px-6 pb-14 pt-6">
                                    if(free_player): <br>
                                    <span class="px-4">free game</span><br>
                                    <span class="px-4">with ads</span><br>
                                    else if(member_player): <br>
                                    <span class="px-4">free game</span><br>
                                    <span class="px-4">free course</span><br>
                                    <span class="px-4">ads free</span><br>
                                    <br>
                                    if(win streak 10 times): <br>
                                    <span class="px-4">get free membership 1 week</span><br>
                                    <br>
                                    print("enjoy the game!")
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20 bg-gray-900 h-full w-full">
    </div>
    <div class="py-10 bg-gray-900 h-full w-full">
    </div>

    <div class="flex flex-col h-full w-full items-center justify-between gap-5 bg-gray-900 text-white isolate px-6 lg:px-8">
        <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl aria-hidden='true'">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-20 sm:gap-y-0 lg:max-w-4xl lg:grid-cols-2">
            <div
                class="rounded-3xl rounded-t-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-b-none sm:p-10 lg:mx-0 lg:rounded-bl-3xl lg:rounded-tr-none">
                <h3 id="tier-hobby" class="text-base font-semibold leading-7 text-indigo-600">Monthly</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-bold tracking-tight text-gray-900">Rp xxx</span>
                    <span class="text-base text-gray-500">/month</span>
                </p>
                <p class="mt-6 text-base leading-7 text-gray-600">The perfect plan if you&#039;re just getting started with
                    our product.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Join class
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Challenge friends
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        More tips
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-hobby"
                    class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Get
                    started today</a>
            </div>
            <div class="relative rounded-3xl bg-gray-800 p-8 shadow-2xl ring-1 ring-gray-900/10 sm:p-10">
                <h3 id="tier-enterprise" class="text-base font-semibold leading-7 text-indigo-400">Yearly</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-bold tracking-tight text-white">Rp xxx</span>
                    <span class="text-base text-gray-400">/year</span>
                </p>
                <p class="mt-6 text-base leading-7 text-gray-300">Dedicated lesson for your mathematic.
                </p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Join class
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Challenge friends
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        More tips
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Create rooms
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Early access
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-enterprise"
                    class="mt-8 block rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 sm:mt-10">Get
                    started today</a>
            </div>
        </div>
    </div>

    <div class="flex flex-col h-full w-full items-center justify-between gap-5 bg-gray-900 text-white sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">From Our Beloved Customer</h2>
                <p class="mt-2 text-lg leading-8 ">Transform Your Math Skills with MyMath.io</p>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="">Mar 16, 2024</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6  group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost Your Understanding of Mathematics
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 ">MyMath.io has completely transformed the way I
                            learn math! The platform offers expert advice and resources that are easy to understand and
                            engaging.</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <div class="text-sm leading-6">
                            <p class="font-semibold">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="">May 16, 2024</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6  group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Motivating and Challenging
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 ">I have never been this excited to learn math. It's
                            so much fun!</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <div class="text-sm leading-6">
                            <p class="font-semibold">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Jane Smith
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
