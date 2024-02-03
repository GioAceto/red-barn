<x-templates.page>
    {{-- hero --}}
    <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
        <img src="/images/bottles-hero.jpeg" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Become a Rewards Member</h2>
            <p class="mt-6 text-lg leading-8 text-gray-300">Gain access to exclusive offers and events. Sign up for
                free.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12">
        {{-- registration form --}}
        <section class="md:mt-8 order-2 md:order-1 md:col-span-6">
            <div class="flex min-h-full flex-col justify-start px-6 pt-6 pb-12 md:py-12 lg:px-8">
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register
                </h2>
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" method="POST" action="/register">
                        @csrf
                        <div class="grid grid-cols-2 gap-x-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input id="first_name" name="first_name" type="text"
                                        value="{{ old('first_name') }}" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('first_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                    name</label>
                                <div class="mt-2">
                                    <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}"
                                        required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                @error('last_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email"
                                    value="{{ old('email') }}" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone
                                number</label>
                            <div class="mt-2">
                                <input id="phone_number" name="phone_number" type="tel" autocomplete="phone"
                                    value="{{ old('phone_number') }}" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('phone_number')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex items-center">
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>

                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex items-center">
                                <label for="password_confirmation"
                                    class="block text-sm font-medium leading-6 text-gray-900">Confirm
                                    Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    autocomplete="current-password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <fieldset>
                            <legend class="sr-only">Terms & Conditions</legend>
                            <div class="space-y-5">
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="is_21" aria-describedby="age-verification" name="is_21"
                                            type="checkbox" @if (old('is_21')) checked @endif
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="is_21" class="font-medium text-gray-900">I am of legal
                                            drinking age
                                        </label>
                                        <p id="age-verification-description" class="text-gray-500">Members must be
                                            at least 21 years old and will be requested to show a valid state ID
                                            upon purchase and in-store pickup.</p>
                                        @error('is_21')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="accepted_terms_at" aria-describedby="terms"
                                            name="accepted_terms_at" type="checkbox"
                                            @if (old('accepted_terms_at')) checked @endif
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="accepted_terms_at" class="font-medium text-gray-900">I agree to
                                            the
                                            legal terms and conditions
                                        </label>
                                        <p id="terms-description" class="text-gray-500">Vew the <a href="#"
                                                class="underline">Terms & Conditions</a> of this
                                            program
                                        </p>
                                        @error('accepted_terms_at')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input id="subscribe_to_newsletter" aria-describedby="newsletter-description"
                                            name="subscribe_to_newsletter" type="checkbox"
                                            @if (old('subscribe_to_newsletter')) checked @endif
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="subscribe_to_newsletter"
                                            class="font-medium text-gray-900">Subscribe to our
                                            newsletter (optional)</label>
                                        <p id="candidates-description" class="text-gray-500">Receive email
                                            notifications
                                            about upcoming deals and events.</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <hr />

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                                up
                            </button>
                        </div>

                    </form>

                    <p class="mt-10 text-center text-sm text-gray-500">
                        Already a Rewards Member?
                        <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign
                            in</a>
                    </p>
                </div>
            </div>
        </section>
        {{-- benefits section --}}
        <section class="mt-8 md:order-2 md:col-span-6">
            <div class="flex min-h-full flex-col justify-start items-center px-6 md:py-12 lg:px-8">
                <h2 class="mb-12 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Membership
                    Benefits
                </h2>
                <ul>
                    <li class="mb-12">
                        <div class="flex">
                            <div class="w-16 mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="3rem" viewBox="0 0 576 512">
                                    <path
                                        d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z" />
                                </svg>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold">Rewards</h4>
                                <p class="mt-1">Earn points with every purchase. Redeem to unlock savings.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-12">
                        <div class="flex">
                            <div class="w-16 mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="3rem" viewBox="0 0 640 512">
                                    <path
                                        d="M88 0C74.7 0 64 10.7 64 24s10.7 24 24 24h45.5c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5H552c13.3 0 24-10.7 24-24s-10.7-24-24-24H263.7c-11.5 0-21.4-8.2-23.6-19.5L234.7 288H523.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C640.6 57 621.4 32 595.1 32h-411C175 12.8 155.6 0 133.5 0H88zM240 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM24 96C10.7 96 0 106.7 0 120s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H24zm0 80c-13.3 0-24 10.7-24 24s10.7 24 24 24h96c13.3 0 24-10.7 24-24s-10.7-24-24-24H24zm0 80c-13.3 0-24 10.7-24 24s10.7 24 24 24H136c13.3 0 24-10.7 24-24s-10.7-24-24-24H24z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold">Online Ordering</h4>
                                <p class="mt-1">Save time by ordering online. Choose a pickup time and we'll have
                                    your order ready by the time you arrive.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-12">
                        <div class="flex">
                            <div class="w-16 mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="3rem" viewBox="0 0 512 512">
                                    <path
                                        d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold">Exclusive Offers</h4>
                                <p class="mt-1">Gain access to members only discounts and have the opportinity to
                                    enter our annual liquor lottery
                                    for rare allocated items.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-12">
                        <div class="flex">
                            <div class="w-16 mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="3rem" viewBox="0 0 640 512">
                                    <<path
                                        d="M155.6 17.3C163 3 179.9-3.6 195 1.9L320 47.5l125-45.6c15.1-5.5 32 1.1 39.4 15.4l78.8 152.9c28.8 55.8 10.3 122.3-38.5 156.6L556.1 413l41-15c16.6-6 35 2.5 41 19.1s-2.5 35-19.1 41l-71.1 25.9L476.8 510c-16.6 6.1-35-2.5-41-19.1s2.5-35 19.1-41l41-15-31.3-86.2c-59.4 5.2-116.2-34-130-95.2L320 188.8l-14.6 64.7c-13.8 61.3-70.6 100.4-130 95.2l-31.3 86.2 41 15c16.6 6 25.2 24.4 19.1 41s-24.4 25.2-41 19.1L92.2 484.1 21.1 458.2c-16.6-6.1-25.2-24.4-19.1-41s24.4-25.2 41-19.1l41 15 31.3-86.2C66.5 292.5 48.1 226 76.9 170.2L155.6 17.3zm44 54.4l-27.2 52.8L261.6 157l13.1-57.9L199.6 71.7zm240.9 0L365.4 99.1 378.5 157l89.2-32.5L440.5 71.7z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold">Members Only Events</h4>
                                <p class="mt-1">Participate in our monthly events where you'll get to learn more
                                    about the wine, beer, and spirits you love.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</x-templates.page>
