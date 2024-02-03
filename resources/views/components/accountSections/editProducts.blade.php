<div class="mb-12 px-6 py-12 w-full md:max-w-md lg:max-w-xl xl:max-w-3xl mx-auto border border-gray-400 rounded-lg">
    <form class="space-y-12">
        <div class="pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit / Delete Products</h2>
            <p class="mt-1 mb-4 text-sm leading-6 text-gray-600">Search by product name, brand, or SKU.</p>

            <div class="mb-4 max-w-md lg:max-w-lg xl:max-w-xl">
                <ul class="mb-4 flex justify-start">
                    <li class="mr-8">
                        <label for="name-filter" class="mr-2 text-sm">Name</label>
                        <input type="radio" id="name-filter" name="filter" checked="checked">
                    </li>
                    <li class="mr-8">
                        <label for="brand-filter" class="mr-2 text-sm">Brand</label>
                        <input type="radio" id="brand-filter" name="filter">
                    </li>
                    <li>
                        <label for="sku-filter" class="mr-2 text-sm">SKU</label>
                        <input type="radio" id="sku-filter" name="filter">
                    </li>
                </ul>
                <div class="mb-6">
                    <div class="w-full">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="search" name="search"
                                class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Search" type="search" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
