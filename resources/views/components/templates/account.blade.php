<x-layout.partials.head />

<body class="antialiased">
    <div x-data="{ isOpenMobile: false, menuSelection: $persist(1).using(sessionStorage) }">
        <div class="bg-white">
            <x-layout.mobileNav />
            <x-layout.nav />
            <nav class="pt-6 pb-2 mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div>
                            <a href="/" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Home</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                                aria-hidden="true">
                                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                            </svg>
                            <a href="/account"
                                class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Rewards Account</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-4 mb-10 bg-gray-900">
                <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="mx-auto max-w-7xl lg:mx-0">
                        <div class="w-full relative">
                            <h2 class="pt-16 text-4xl font-bold tracking-tight text-white sm:text-6xl">My Rewards
                                Account
                            </h2>
                        </div>
                        <p class="pb-12 mt-6 text-xl leading-8 text-gray-300">Welcome
                            {{ ucwords(auth()->user()->first_name) }}!</p>
                    </div>
                </div>
            </div>


            <div class="flex flex-col md:flex-row mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="w-full md:w-60 flex-col gap-y-5 overflow-y-auto">
                    <nav x-data="{ expandMenu: true }"
                        class="relative mb-10 px-4 pt-2 md:px-6 md:py-6 w-90 flex flex-col rounded-lg bg-gray-900">
                        <div class="pb-2 flex items-center justify-end text-gray-400">
                            <button x-show="expandMenu" @click="expandMenu = false" type="button"
                                class="hover:text-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" width="1.5rem"
                                    viewBox="0 0 448 512">

                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path class="fill-current"
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm88 200H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                </svg>
                            </button>
                            <button x-show="!expandMenu" @click="expandMenu = true" type="button"
                                class="hover:text-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" width="1.5rem"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path class="fill-current"
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </button>
                        </div>
                        <ul x-show="expandMenu" role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="-mx-2 space-y-1">
                                    <li>
                                        <button @click="menuSelection = 1" type="button"
                                            class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            :class="menuSelection === 1 ? 'bg-gray-800 text-gray-100' :
                                                'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'">
                                            <svg class=xmlns="http://www.w3.org/2000/svg" height="1.2rem" width="1.2rem"
                                                viewBox="0 0 448 512">
                                                <path class="fill-current"
                                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                            </svg>
                                            Account Info
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="menuSelection = 2" type="button"
                                            class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            :class="menuSelection === 2 ? 'bg-gray-800 text-gray-100' :
                                                'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" width="1.2rem"
                                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path class="fill-current"
                                                    d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                            </svg>
                                            My Events
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="menuSelection = 3" type="button"
                                            class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            :class="menuSelection === 3 ? 'bg-gray-800 text-gray-100' :
                                                'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" width="1.2rem"
                                                viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path class="fill-current"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            </svg>
                                            My Wish List
                                        </button>
                                    </li>
                                    {{-- Admin panel start --}}
                                    <hr class="border-gray-400 text-gray-400 bg-gray-400" />
                                    <li>
                                        <button @click="menuSelection = 4" type="button"
                                            class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            :class="menuSelection === 4 ? 'bg-gray-800 text-gray-100' :
                                                'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" width="1.2rem"
                                                viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path class="fill-current"
                                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" />
                                            </svg>
                                            Users
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="menuSelection = 5" type="button"
                                            class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            :class="menuSelection === 5 ? 'bg-gray-800 text-gray-100' :
                                                'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" width="1.2rem"
                                                viewBox="0 0 576 512">
                                                <path class="fill-current"
                                                    d="M96 32C43 32 0 75 0 128v32H64V128c0-17.7 14.3-32 32-32h32V32H96zM0 192V320H64V192H0zM64 352H0v32c0 53 43 96 96 96h32V416H96c-17.7 0-32-14.3-32-32V352zM384 128v70.6c15.3-4.3 31.4-6.6 48-6.6c5.4 0 10.7 .2 16 .7V128c0-53-43-96-96-96H320V96h32c17.7 0 32 14.3 32 32zM160 480H296.2c-15.3-18.5-26.9-40.2-33.6-64H160v64zm0-384H288V32H160V96zM432 512a144 144 0 1 0 0-288 144 144 0 1 0 0 288zm16-208v48h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V384H368c-8.8 0-16-7.2-16-16s7.2-16 16-16h48V304c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                            Add Products
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="menuSelection = 6" type="button"
                                            class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                            :class="menuSelection === 6 ? 'bg-gray-800 text-gray-100' :
                                                'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" width="1.2rem"
                                                viewBox="0 0 512 512">
                                                <path class="fill-current"
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                            </svg>
                                            Edit / Delete Products
                                        </button>
                                    </li>
                                    {{-- Admin panel end --}}
                                    <hr class="border-gray-400 text-gray-400 bg-gray-400" />
                                    <li class="pb-2">
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button @click="menuSelection = 7" type="submit"
                                                class="w-full flex items-center gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                                :class="menuSelection === 7 ? 'bg-gray-800 text-gray-100' :
                                                    'text-gray-400 group hover:bg-gray-800 hover:text-gray-100'"">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem"
                                                    width="1.2rem"
                                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path class="fill-current"
                                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                                </svg>
                                                Log out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                {{ $slot }}
            </div>
        </div>
        <x-layout.footer />
</body>

</html>
