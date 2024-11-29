@extends('base.base')

@section('content')
    <div class="bg-primary">
        <div class="relative isolate px-6 pt-5 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="grid grid-cols-[15%,35%,35%,15%] mx-auto max-w-screen pt-10 sm:pt-16 lg:pt-32">
                <div></div>
                <div class="text-center">
                    <h1 class="text-balance text-5xl font-semibold text-quaternary sm:text-7xl">
                        Boost your Mathematic,<br>
                        Play our game!
                    </h1>
                </div>
                <div class="items-center justify-center hidden lg:flex">
                    <img src="{{ asset('M.png') }}" class="w-2/3 rounded-2xl animate-bounce mask mask-image bg-quaternary" />
                </div>
                <div></div>
            </div>
            <div class="text-center mx-auto max-w-screen pb-5 sm:pb-10 lg:pb-16">
                <div class="sm:mb-8 sm:flex sm:justify-center pt-4">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        See how strong your math is. Beat the others and become the legend
                    </div>
                </div>
                @if (Auth::id())
                    <div class="mt-5 flex items-center justify-center gap-x-6">
                        <a href="{{ route('game.index', Auth::id()) }}"
                            class="rounded-md bg-quaternary px-3.5 py-2.5 text-sm font-semibold text-secondary shadow-sm hover:bg-tertiary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            Play Now!</a>
                    </div>
                @else
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('login') }}"
                            class="rounded-md bg-secondary px-3.5 py-2.5 text-sm font-semibold text-quinary shadow-sm hover:bg-tertiary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            Login</a>
                        <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-quinary">Sign Up <span
                                aria-hidden="true">→</span></a>
                    </div>
                @endif
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-primary py-5 sm:py-10">
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
            <p
                class="mx-auto max-w-lg text-balance text-center text-4xl font-semibold tracking-tight text-quinary sm:text-5xl">
                Practice and Challenge</p>
            <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-3 lg:grid-rows-2">
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                        <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Anytime,
                                Anywhere</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Play on your mobile device
                            </p>
                        </div>
                        <div
                            class="relative min-h-[30rem] w-full grow [container-type:inline-size] max-lg:mx-auto max-lg:max-w-sm">
                            <div
                                class="absolute inset-x-10 bottom-0 top-10 overflow-hidden rounded-t-[12cqw] border-x-[3cqw] border-t-[3cqw] border-gray-700 bg-gray-900 shadow-2xl">
                                <img class="size-full object-cover object-top" src="{{ asset('mobile.jpg') }}"
                                    alt="">
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
                            <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Performance
                            </p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Check your rank in
                                leaderboard</p>
                        </div>
                        <div
                            class="flex flex-1 items-center justify-center px-8 max-lg:pb-12 max-lg:pt-10 sm:px-10 lg:pb-2">
                            <img class="w-full max-lg:max-w-xs" src="{{ asset('SS_Leaderboard.jpg') }}" alt="">
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
                            <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">Test young
                                strength</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Challenge the other, push
                                your rating</p>
                        </div>
                        <div class="flex flex-1 items-center [container-type:inline-size] max-lg:py-6 lg:pb-2">
                            <img class="h-[min(152px,40cqw)] object-cover" src="{{ asset('SS_ResultGame.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5"></div>
                </div>
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                        <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 max-lg:text-center">FREE</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">With in-game purchase</p>
                        </div>
                        <div class="relative min-h-[30rem] w-full grow">
                            <div
                                class="absolute bottom-0 left-10 right-0 top-10 overflow-hidden rounded-tl-xl bg-gray-900 shadow-2xl">
                                <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                    <div class="-mb-px flex text-sm/6 font-medium text-gray-400">
                                        <div
                                            class="border-b border-r border-b-white/20 border-r-white/10 bg-white/5 px-4 py-2 text-white">
                                            TermAndCondition.TAC</div>
                                    </div>
                                </div>
                                <div class="px-6 pb-14 pt-6 text-white">
                                    if(free_player): <br>
                                    <span class="px-4">free game</span><br>
                                    <span class="px-4">with ads</span><br>
                                    else if(member_player): <br>
                                    <span class="px-4">free game</span><br>
                                    <span class="px-4">free course</span><br>
                                    <span class="px-4">ads free</span><br>
                                    <br>
                                    if(first_win_streak_10_times): <br>
                                    <span class="px-4">get free membership 1 week</span><br>
                                    <br>
                                    print("Enjoy the game!")
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

    <div class="relative isolate bg-primary px-6 py-10 sm:py-16 lg:px-8">
        <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-4xl text-center">
            <p class="mt-2 text-balance text-5xl font-semibold tracking-tight text-quinary sm:text-6xl">Pricing Plan</p>
        </div>
        <div
            class="mx-auto mt-16 grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-20 sm:gap-y-0 lg:max-w-4xl lg:grid-cols-2">
            <div
                class="rounded-3xl rounded-t-3xl bg-secondary p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-b-none sm:p-10 lg:mx-0 lg:rounded-bl-3xl lg:rounded-tr-none">
                <h3 id="tier-hobby" class="text-base/7 font-semibold text-quaternary">Gold</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-quinary">Only 75K</span>
                    <span class="text-base text-gray-500">/month</span>
                </p>
                <p class="mt-6 text-base/7 text-gray-600">The perfect plan if you&#039;re just getting started with our
                    product.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Join class
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Challenge friends
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        More tips
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-hobby"
                    class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-quaternary ring-1 ring-inset ring-tertiary hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Get
                    started today</a>
            </div>
            <div class="relative rounded-3xl bg-tertiary p-8 shadow-2xl ring-1 ring-gray-900/10 sm:p-10">
                <h3 id="tier-enterprise" class="text-base/7 font-semibold text-quinary">Platinum</h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-semibold tracking-tight text-primary">720K</span>
                    <span class="text-base text-secondary">/year</span>
                </p>
                <p class="mt-6 text-base/7 text-primary">Dedicated lesson for your mathematic.</p>
                <ul role="list" class="mt-8 space-y-3 text-sm/6 text-primary sm:mt-10">
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Join class
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Challenge friends
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Advanced analytics
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        More tips
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Create rooms
                    </li>
                    <li class="flex gap-x-3">
                        <svg class="h-6 w-5 flex-none text-quinary" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Early access
                    </li>
                </ul>
                <a href="#" aria-describedby="tier-enterprise"
                    class="mt-8 block rounded-md bg-secondary px-3.5 py-2.5 text-center text-sm font-semibold text-quinary shadow-sm hover:bg-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 sm:mt-10">Get
                    started today</a>
            </div>
        </div>
    </div>

    <div class="bg-primary py-10 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-quinary sm:text-5xl">From Our Beloved
                    Customer</h2>
                <p class="mt-2 text-lg/8 text-quaternary">Transform Your Math Skills with MyMath.io</p>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-quaternary pt-8 sm:mt-12 sm:pt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-tertiary">Mar 16, 2024</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg/6 font-semibold text-quinary ">
                            Boost Your Understanding of Mathematics
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-quaternary">
                            MyMath.io has completely transformed the way I learn math! The platform offers expert advice and
                            resources that are easy to understand and engaging.</p>
                    </div>
                    <div class="relative mt-4 flex items-center gap-x-4">
                        <div class="text-sm/6">
                            <p class="font-semibold text-tertiary">
                                Michael Foster
                            </p>
                        </div>
                    </div>
                </article>

                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-tertiary">May 16, 2024</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg/6 font-semibold text-quinary ">
                            Motivating and Challenging
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-quaternary">
                            I have never been this excited to learn math. It's so much fun!
                        </p>
                    </div>
                    <div class="relative mt-4 flex items-center gap-x-4">
                        <div class="text-sm/6">
                            <p class="font-semibold text-tertiary">
                                Jane Smith
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    
@endsection
