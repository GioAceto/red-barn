<x-layout.partials.head />

<body class="antialiased" x-data="{ formData: $persist({ minorCategory: '{{ isset($minorCategory) ? $minorCategory->slug : '' }}', style: '{{ isset($style) ? $style->slug : '' }}', countries: {{ json_encode(isset($countries) ? $countries : []) }}, abv: {{ json_encode(isset($abv) ? $abv : []) }}, price: {{ json_encode(isset($price) ? $price : []) }}, size: {{ json_encode(isset($size) ? $size : []) }}, sort: {{ json_encode(isset($sort) ? $sort : 'newest') }} }) }" x-init="formData.minorCategory = '{{ isset($minorCategory) ? $minorCategory->slug : '' }}', formData.style = '{{ isset($style) ? $style->slug : '' }}', formData.countries = {{ json_encode(isset($countries) ? $countries : []) }}, formData.abv = {{ json_encode(isset($abv) ? $abv : []) }}, formData.price = {{ json_encode(isset($price) ? $price : []) }}, formData.size = {{ json_encode(isset($size) ? $size : []) }}">
    <div x-data="{ isOpenMobile: false, isOpenFilters: false, showSortDropdown: false }">
        <x-layout.mobileNav />
        <x-layout.nav />
        <div class="bg-white">
            <div>
                <div x-show="isOpenFilters" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                    <div x-show="isOpenFilters" x-transition:enter="transition-opacity ease-linear duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-linear duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 bg-black bg-opacity-25"></div>

                    <div class="fixed inset-0 z-40 flex">
                        <div x-show="isOpenFilters" x-transition:enter="transition ease-in-out duration-300 transform"
                            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition ease-in-out duration-300 transform"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                            class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                            <div class="flex items-center justify-between px-4">
                                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                                <button @click="isOpenFilters = !isOpenFilters" type="button"
                                    class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Mobile Filters Menu -->
                            <x-layout.filtersMobile />
                        </div>
                    </div>
                </div>

                <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <x-layout.filtersNav :majorCategory='$majorCategory' :majorCategories='$majorCategories' :minorCategories='$minorCategories' :style='$style'
                        :sizes='$sizes' :styles='$styles' :minorCategory='$minorCategory' :countries='$countries' :price='$price'
                        :abv='$abv' :size='$size' :countries='$countries' :availableCountries='$availableCountries' :region='$region'
                        :sort='$sort' />
                    <section aria-labelledby="products-heading" class="pb-24">
                        <h2 id="products-heading" class="sr-only">Products</h2>

                        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                            <!-- Filters -->
                            <x-layout.filters :majorCategory='$majorCategory' :majorCategories='$majorCategories' :minorCategories='$minorCategories'
                                :style='$style' :sizes='$sizes' :styles='$styles' :minorCategory='$minorCategory'
                                :countries='$countries' :price='$price' :abv='$abv' :size='$size'
                                :countries='$countries' :filteredSizes='$filteredSizes' :availablePrices='$availablePrices' :availableCountries='$availableCountries'
                                :availableAbv='$availableAbv' :region='$region' />

                            <!-- Product grid -->
                            <div class="lg:col-span-3">
                                {{ $slot }}
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
        <x-layout.footer />
    </div>
</body>

</html>
