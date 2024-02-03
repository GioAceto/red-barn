@php
    $appPath = app_path();
    $userData = require "$appPath/data/nav_data.php";
@endphp

<header class="relative z-10">
    <nav x-data="{ navCategory: 'none' }" aria-label="Top" @click.outside="navCategory = 'none'"
        @mouseover.away="navCategory = 'none'">
        <!-- Top navigation -->
        <div class="hidden lg:block lg:py-0 bg-gray-800">
            <div class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <div class="w-3/4 flex justify-center">
                    <p class="pl-[25%] flex-1 text-center text-sm font-medium text-white lg:flex-none lg:block">
                        Maine's finest selection of spirits and beverages.<a href="#" class="ml-4 underline">Shop
                            our
                            best
                            deals</a></p>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:w-1/4 lg:items-center lg:justify-end lg:space-x-6">
                    @if (auth()->check() && auth()->user()->email_verified_at)
                        <a href="/account" class="text-sm font-medium text-white hover:text-gray-100">My account</a>
                        <span class="h-6 w-px bg-gray-600" aria-hidden="true"></span>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-white hover:text-gray-100">Log
                                out</button>
                        </form>
                    @else
                        <a href="/register" class="text-sm font-medium text-white hover:text-gray-100">Rewards
                            Program</a>
                        <span class="h-6 w-px bg-gray-600" aria-hidden="true"></span>
                        <a href="/login" class="text-sm font-medium text-white hover:text-gray-100">Sign
                            in</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="bg-barnRed">
            <div class="py-4 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <a class="inline-block" href="/">
                    <img width="350" src="/images/rb.svg" alt="Red Barn Liquor Logo" />
                </a>
            </div>
        </div>
        <!-- Secondary navigation -->
        <div class="bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex h-16 items-center justify-between">
                        <div class="hidden h-full lg:flex">
                            <!-- Mega menus -->
                            <div>
                                <div class="flex h-full justify-center space-x-8">
                                    <div x-data="{ wineSelection: 'red' }" class="flex">
                                        <div class="relative flex">
                                            <a href="/explore/wine" @mouseover="navCategory = 'wine'"
                                                :class="{
                                                    'border-gray-800 text-gray-800': navCategory === 'wine',
                                                    'border-transparent text-gray-700 hover:text-gray-800': navCategory !== 'wine'
                                                }"
                                                class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out"
                                                aria-expanded="false">Wine</a>
                                        </div>
                                        <div x-show="navCategory === 'wine'"
                                            x-transition:enter="transition ease-out duration-0"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-x-0 top-full text-gray-500 sm:text-sm">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true">
                                            </div>

                                            <div class="relative bg-white">
                                                <div class="mx-auto max-w-7xl px-8">
                                                    <div
                                                        class="grid grid-cols-12 items-start gap-x-8 gap-y-10 pb-10 pt-4">
                                                        <ul role="list" aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2"
                                                            :class="{ 'border-r border-gray-200': wineSelection !== 'all-wine' }">
                                                            @foreach ($nav_data['Wine'] as $category => $items)
                                                                @if (isset($items['tag']))
                                                                    <li @mouseover="wineSelection = '{{ $items['tag'] }}'"
                                                                        class="flex"
                                                                        :class="{
                                                                            'bg-gray-100': wineSelection === '{{ $items['tag'] }}',
                                                                        }">
                                                                        <a href="{{ $items['route'] ?? '#' }}"
                                                                            {{-- Use the route if available, otherwise fallback to '#' --}}
                                                                            class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                        <div x-show="wineSelection === 'red'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['Red Wine']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list"
                                                                aria-labelledby="desktop-collection-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['Red Wine']['sub_categories'], 5, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list" aria-labelledby="desktop-brand-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['Red Wine']['sub_categories'], 10, 1) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div x-show="wineSelection === 'white'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['White Wine & Rosé']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list"
                                                                aria-labelledby="desktop-collection-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['White Wine & Rosé']['sub_categories'], 5, 3) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div x-show="wineSelection === 'champagne'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['Champagne & Sparkling']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div x-show="wineSelection === 'sweet'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['Sweet Wines']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list"
                                                                aria-labelledby="desktop-collection-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Wine']['Sweet Wines']['sub_categories'], 5, 2) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-data="{ spiritSelection: 'whiskey' }" class="flex">
                                        <div class="relative flex">
                                            <a href="/explore/spirits" @mouseover="navCategory = 'spirits'"
                                                :class="{
                                                    'border-gray-800 text-gray-800': navCategory === 'spirits',
                                                    'border-transparent text-gray-700 hover:text-gray-800': navCategory !== 'spirits'
                                                }"
                                                class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out"
                                                aria-expanded="false">Spirits</a>
                                        </div>
                                        <div x-show="navCategory === 'spirits'"
                                            x-transition:enter="transition ease-out duration-0"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-x-0 top-full text-gray-500 sm:text-sm">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true">
                                            </div>

                                            <div class="relative bg-white">
                                                <div class="mx-auto max-w-7xl px-8">
                                                    <div
                                                        class="grid grid-cols-12 items-start gap-x-8 gap-y-10 pb-10 pt-4">
                                                        <ul role="list"
                                                            aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2">
                                                            @foreach (array_slice($nav_data['Spirits'], 0, 5) as $category => $items)
                                                                @if (isset($items['tag']))
                                                                    <li @mouseover="spiritSelection = '{{ $items['tag'] }}'"
                                                                        class="flex"
                                                                        :class="{
                                                                            'bg-gray-100': spiritSelection === '{{ $items['tag'] }}',
                                                                        }">
                                                                        <a href="{{ $items['route'] ?? '/explore/spirits' }}"
                                                                            {{-- Use the route if available, otherwise fallback to '#' --}}
                                                                            class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>

                                                                        {{-- Check if there are subcategories --}}
                                                                        @if (isset($items['tag']) && isset($nav_data[$items['tag']]) && isset($nav_data[$items['tag']]['sub_categories']))
                                                                            <ul role="list" class="space-y-2">
                                                                                @foreach ($nav_data[$items['tag']]['sub_categories'] as $subCategory => $subDetails)
                                                                                    <li class="flex">
                                                                                        <a href="{{ $subDetails['route'] ?? '#' }}"
                                                                                            class="pl-2 py-2 w-full hover:text-gray-800">{{ $subCategory }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>

                                                        <ul role="list"
                                                            aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2">
                                                            @foreach (array_slice($nav_data['Spirits'], 5, 5) as $category => $details)
                                                                <li @mouseover="spiritSelection = '{{ $category }}'"
                                                                    class="flex"
                                                                    :class="{
                                                                        'bg-gray-100': spiritSelection === '{{ $category }}',
                                                                    }">
                                                                    <a href="{{ $details['route'] ?? '/explore/spirits' }}"
                                                                        class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                        <ul role="list"
                                                            aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2">
                                                            @foreach (array_slice($nav_data['Spirits'], 10, 2) as $category => $details)
                                                                <li @mouseover="spiritSelection = '{{ $category }}'"
                                                                    class="flex"
                                                                    :class="{
                                                                        'bg-gray-100': spiritSelection === '{{ $category }}',
                                                                    }">
                                                                    <a href="{{ $details['route'] ?? '/explore/spirits' }}"
                                                                        class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-data="{ beerSelection: 'styles' }" class="flex">
                                        <div class="relative flex">
                                            <a href="/explore/beer" @mouseover="navCategory = 'beer'"
                                                :class="{
                                                    'border-gray-800 text-gray-800': navCategory === 'beer',
                                                    'border-transparent text-gray-700 hover:text-gray-800': navCategory !== 'beer'
                                                }"
                                                class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out"
                                                aria-expanded="false">Beer & Seltzers</a>
                                        </div>
                                        <div x-show="navCategory === 'beer'"
                                            x-transition:enter="transition ease-out duration-0"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-x-0 top-full text-gray-500 sm:text-sm">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true">
                                            </div>

                                            <div class="relative bg-white">
                                                <div class="mx-auto max-w-7xl px-8">
                                                    <div
                                                        class="grid grid-cols-12 items-start gap-x-8 gap-y-10 pb-10 pt-4">
                                                        <ul role="list"
                                                            aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2"
                                                            :class="{
                                                                'border-r border-gray-200': beerSelection !== 'all-beer' &&
                                                                    beerSelection !== 'na-beer'
                                                            }">
                                                            @foreach ($nav_data['Beer & Seltzer'] as $category => $items)
                                                                @if (isset($items['tag']))
                                                                    <li @mouseover="beerSelection = '{{ $items['tag'] }}'"
                                                                        class="flex"
                                                                        :class="{
                                                                            'bg-gray-100': beerSelection === '{{ $items['tag'] }}',
                                                                        }">
                                                                        <a href="{{ $items['route'] ?? '/explore/beer' }}"
                                                                            {{-- Use the route if available, otherwise fallback to '#' --}}
                                                                            class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                        <div x-show="beerSelection === 'styles'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Beer & Seltzer']['Popular Beer Styles']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list"
                                                                aria-labelledby="desktop-collection-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Beer & Seltzer']['Popular Beer Styles']['sub_categories'], 5, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list" aria-labelledby="desktop-brand-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Beer & Seltzer']['Popular Beer Styles']['sub_categories'], 10, 2) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div x-show="beerSelection === 'import'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Beer & Seltzer']['Import']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <ul role="list"
                                                                aria-labelledby="desktop-collection-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Beer & Seltzer']['Import']['sub_categories'], 5, 3) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div x-show="beerSelection === 'seltzer'"
                                                            class="grid grid-cols-3 col-span-9">
                                                            <ul role="list"
                                                                aria-labelledby="desktop-categories-heading"
                                                                class="mt-6 space-y-2">
                                                                @foreach (array_slice($nav_data['Beer & Seltzer']['Hard Seltzer & Flavored Beverages']['sub_categories'], 0, 5) as $sub_category => $details)
                                                                    <li class="flex"><a
                                                                            href="{{ $details['route'] ?? '#' }}"
                                                                            class="py-2 hover:text-gray-800">{{ $sub_category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-data="{ extrasSelection: 'beer-accessories' }" class="flex">
                                        <div class="relative flex">
                                            <!-- Item active: "border-gray-800 text-gray-800", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                                            <a href="/explore/bar-extras" @mouseover="navCategory = 'extras'"
                                                :class="{
                                                    'border-gray-800 text-gray-800': navCategory === 'extras',
                                                    'border-transparent text-gray-700 hover:text-gray-800': navCategory !== 'extras'
                                                }"
                                                class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out"
                                                aria-expanded="false">Bar Extras</a>
                                        </div>
                                        <div x-show="navCategory === 'extras'"
                                            x-transition:enter="transition ease-out duration-0"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-x-0 top-full text-gray-500 sm:text-sm">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true">
                                            </div>

                                            <div class="relative bg-white">
                                                <div class="mx-auto max-w-7xl px-8">
                                                    <div
                                                        class="grid grid-cols-12 items-start gap-x-8 gap-y-10 pb-10 pt-4">
                                                        <ul role="list"
                                                            aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2">
                                                            @foreach (array_slice($nav_data['Bar Extras'], 0, 5) as $category => $items)
                                                                @if (isset($items['tag']))
                                                                    <li @mouseover="extrasSelection = '{{ $items['tag'] }}'"
                                                                        class="flex"
                                                                        :class="{
                                                                            'bg-gray-100': extrasSelection === '{{ $items['tag'] }}',
                                                                        }">
                                                                        <a href="{{ $items['route'] ?? '/explore/bar-extras' }}"
                                                                            {{-- Use the route if available, otherwise fallback to '#' --}}
                                                                            class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>

                                                                        {{-- Check if there are subcategories --}}
                                                                        @if (isset($items['tag']) && isset($nav_data[$items['tag']]) && isset($nav_data[$items['tag']]['sub_categories']))
                                                                            <ul role="list" class="space-y-2">
                                                                                @foreach ($nav_data[$items['tag']]['sub_categories'] as $subCategory => $subDetails)
                                                                                    <li class="flex">
                                                                                        <a href="{{ $subDetails['route'] ?? '#' }}"
                                                                                            class="pl-2 py-2 w-full hover:text-gray-800">{{ $subCategory }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>

                                                        <ul role="list"
                                                            aria-labelledby="desktop-featured-heading-0"
                                                            class="pr-6 col-span-3 mt-6 space-y-2">
                                                            @foreach (array_slice($nav_data['Bar Extras'], 5, 5) as $category => $details)
                                                                <li @mouseover="extrasSelection = '{{ $category }}'"
                                                                    class="flex"
                                                                    :class="{
                                                                        'bg-gray-100': extrasSelection === '{{ $category }}',
                                                                    }">
                                                                    <a href="{{ $details['route'] ?? '/explore/bar-extras' }}"
                                                                        class="pl-2 py-2 w-full hover:text-gray-800">{{ $category }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/explore/specials-deals" @mouseover="navCategory = 'specials'"
                                        :class="{
                                            'border-gray-800 text-gray-800': navCategory === 'specials',
                                            'border-transparent text-gray-700 hover:text-gray-800': navCategory !== 'specials'
                                        }"
                                        class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out"
                                        aria-expanded="false">Specials & Deals</a>
                                    <a href="/events" @mouseover="navCategory = 'events'"
                                        :class="{
                                            'border-gray-800 text-gray-800': navCategory === 'events',
                                            'border-transparent text-gray-700 hover:text-gray-800': navCategory !== 'events'
                                        }"
                                        class="relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out"
                                        aria-expanded="false">Events</a>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile menu and search (lg-) -->
                        <div class="flex flex-1 items-center lg:hidden">
                            <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                            <button @click="isOpenMobile = true" type="button"
                                class="-ml-2 rounded-md bg-white p-2 text-gray-400">
                                <span class="sr-only">Open menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>

                            <!-- Search -->
                            <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Search</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </a>
                        </div>

                        <!-- Logo (lg-) -->
                        <a href="#" class="lg:hidden">
                            <span class="sr-only">Your Company</span>
                            <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt=""
                                class="h-8 w-auto">
                        </a>

                        <div class="flex flex-1 items-center justify-end">
                            <div class="flex items-center lg:ml-8">
                                <div class="flex space-x-8">
                                    <div class="hidden lg:flex">
                                        <a href="#" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Search</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <span class="mx-4 h-6 w-px bg-gray-200 lg:mx-6" aria-hidden="true"></span>

                                <div class="flow-root">
                                    <a href="#" class="group -m-2 flex items-center p-2">
                                        <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        <span
                                            class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                        <span class="sr-only">items in cart, view bag</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
