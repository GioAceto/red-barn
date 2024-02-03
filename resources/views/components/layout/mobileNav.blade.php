<div x-show="isOpenMobile" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
    <div x-show="isOpenMobile" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-25"></div>

    <div class="fixed inset-0 z-40 flex">
        <div x-show="isOpenMobile" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
            <div class="flex px-4 pb-2 pt-5">
                <button @click="isOpenMobile = false" type="button"
                    class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Links -->
            <div class="mt-2">
                <!-- 'Men' tab panel, show/hide based on tab state. -->
                <div id="tabs-1-panel-2" class="space-y-12 px-4 pb-6 pt-10" aria-labelledby="tabs-1-tab-2"
                    role="tabpanel" tabindex="0">
                    <div class="grid grid-cols-1 items-start gap-x-6 gap-y-10">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-10">
                            <div>
                                <p id="mobile-featured-heading-1" class="font-medium text-gray-900">Wine
                                </p>
                                <ul role="list" aria-labelledby="mobile-featured-heading-1" class="mt-6 space-y-6">
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Red Wine</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">White Wine & Rosé</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Champagne & Sparkling</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Sweet Wines</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Shop All Wines</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p id="mobile-categories-heading" class="font-medium text-gray-900">Spirits
                                </p>
                                <ul role="list" aria-labelledby="mobile-featured-heading-1" class="mt-6 space-y-6">
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Whiskey, Bourbon, Scotch</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Brandy & Cognac</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Tequila & Mezcal</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Rum</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Vodka</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Gin</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Aperitif & Vermouth</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Liqueurs & Cordials</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Ready to Drink</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Non-Alcoholic Spirits</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Allocated Spirits</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Shop All Spirits</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-6 gap-y-10">
                            <div>
                                <p id="mobile-collection-heading" class="font-medium text-gray-900">Beer &
                                    Seltzers
                                </p>
                                <ul role="list" aria-labelledby="mobile-featured-heading-1"
                                    class="mt-6 space-y-6">
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Popular Beer Styles</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Import</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Hard Seltzer & Flavored
                                            Beverages</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Non-Alcoholic Beer</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Shop All Beer</a>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <p id="mobile-brand-heading" class="font-medium text-gray-900">Bar Extras</p>
                                <ul role="list" aria-labelledby="mobile-featured-heading-1"
                                    class="mt-6 space-y-6">
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Beer Accessories</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Bitters</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Coolers</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Glassware</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Mixers & Syrups</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Party Supplies</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Soft Drinks</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Wine Accessories</a>
                                    </li>
                                    <li class="flex">
                                        <a href="#" class="text-gray-500">Shop All Bar Extras</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Specials & Deals</a>
                </div>
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Events</a>
                </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Become a Rewards
                        Member</a>
                </div>
                <div class="flow-root">
                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
