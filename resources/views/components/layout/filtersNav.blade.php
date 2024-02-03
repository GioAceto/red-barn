<div class="flex flex-col">
    <div class="flex items-baseline justify-between pb-2 pt-24">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">{{ ucwords($majorCategory->name) }}
        </h1>
        <div class="flex shrink-0 items-center">
            <div x-data="{ isSelected: '{{ request('sort') === 'low_to_high' ? 'Low to High' : (request('sort') === 'high_to_low' ? 'High to Low' : 'Newest') }}' }">
                <div>
                    <button @click="showSortDropdown = !showSortDropdown" type="button"
                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                        id="menu-button" aria-expanded="false" aria-haspopup="true">
                        Sort:&nbsp;
                        <span x-text="isSelected"></span>
                        <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <form id="sortForm" x-show="showSortDropdown" @click.outside="showSortDropdown = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    @csrf
                    <div id="sortButtons" class="py-1" role="none">
                        <button type="button" data-sort="newest"
                            @click="showSortDropdown=false, applySorting('newest')"
                            class="w-full text-left hover:bg-gray-100 active:bg-gray-100 block px-4 py-2 text-sm"
                            :class="{
                                'text-gray-500': isSelected !== 'Newest',
                                'text-gray-900 font-medium': isSelected === 'Newest'
                            }"
                            role="menuitem" tabindex="-1" id="menu-item-0">Newest</button>

                        <button type="button" data-sort="low_to_high"
                            @click="showSortDropdown=false, applySorting('low_to_high')"
                            class="w-full text-left hover:bg-gray-100 active:bg-gray-100 block px-4 py-2 text-sm"
                            :class="{
                                'text-gray-500': isSelected !== 'Low to High',
                                'text-gray-900 font-medium': isSelected === 'Low to High'
                            }"
                            role="menuitem" tabindex="-1" id="menu-item-0">Price: Low to High</button>

                        <button type="button" data-sort="high_to_low"
                            @click="showSortDropdown=false, applySorting('high_to_low')"
                            class="w-full text-left hover:bg-gray-100 active:bg-gray-100 block px-4 py-2 text-sm"
                            :class="{
                                'text-gray-500': isSelected !== 'High to Low',
                                'text-gray-900 font-medium': isSelected === 'High to Low'
                            }"
                            role="menuitem" tabindex="-1" id="menu-item-0">Price: High to Low</button>
                    </div>
                </form>
            </div>

            <button @click="isOpenFilters = !isOpenFilters" type="button"
                class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                <span class="sr-only">Filters</span>
                <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    <div class="pb-2 min-h-[2rem] w-full flex flex-wrap justify-end items-center border-b border-gray-200">
        @foreach (request()->query() as $key => $value)
            @if ($key === 'country' && strpos($value, ',') !== false)
                @php
                    $countries = explode(',', $value);
                    sort($countries);
                @endphp

                @foreach ($countries as $country)
                    <span
                        class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                        {{ $country }}
                        <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                            @click="removeQueryParam($data, 'country', '{{ $country }}')">
                            <span class="sr-only">Remove</span>
                            <svg viewBox="0 0 14 14"
                                class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                                <path d="M4 4l6 6m0-6l-6 6" />
                            </svg>
                            <span class="absolute -inset-1"></span>
                        </button>
                    </span>
                @endforeach
            @elseif ($key === 'price' && strpos($value, ',') !== false)
                @php
                    $priceValues = explode(',', $value);
                    sort($priceValues);
                @endphp

                @foreach ($priceValues as $priceValue)
                    @php
                        $formattedPrice = $priceValue === 'max' ? 'max $' : '$' . str_replace('-', '-$', $priceValue);
                    @endphp

                    <span
                        class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                        {{ $formattedPrice }}
                        <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                            @click="removeQueryParam($data, 'price', '{{ $priceValue }}')">
                            <span class="sr-only">Remove</span>
                            <svg viewBox="0 0 14 14"
                                class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                                <path d="M4 4l6 6m0-6l-6 6" />
                            </svg>
                            <span class="absolute -inset-1"></span>
                        </button>
                    </span>
                @endforeach
            @elseif ($key === 'abv' && strpos($value, ',') !== false)
                @php
                    $abvValues = explode(',', $value);
                    sort($abvValues);
                @endphp

                @foreach ($abvValues as $abvValue)
                    <span
                        class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                        {{ $abvValue }}% abv
                        <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                            @click="removeQueryParam($data, 'abv', '{{ $abvValue }}')">
                            <span class="sr-only">Remove</span>
                            <svg viewBox="0 0 14 14"
                                class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                                <path d="M4 4l6 6m0-6l-6 6" />
                            </svg>
                            <span class="absolute -inset-1"></span>
                        </button>
                    </span>
                @endforeach
            @elseif ($key === 'size' && strpos($value, ',') !== false)
                @php
                    $sizeValues = explode(',', $value);
                    sort($sizeValues);
                @endphp

                @foreach ($sizeValues as $sizeValue)
                    <span
                        class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                        @php
                            $size = \App\Models\Size::where('size', $sizeValue)->first();
                        @endphp
                        {{ $sizeValue }}{{ $size->units }}
                        <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                            @click="removeQueryParam($data, 'size', '{{ $sizeValue }}')">
                            <span class="sr-only">Remove</span>
                            <svg viewBox="0 0 14 14"
                                class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                                <path d="M4 4l6 6m0-6l-6 6" />
                            </svg>
                            <span class="absolute -inset-1"></span>
                        </button>
                    </span>
                @endforeach
            @elseif (in_array($key, ['price', 'abv', 'size', 'country']))
                @php
                    $size = \App\Models\Size::where('size', $value)->first();
                @endphp
                <!-- Add more valid filter keys as needed -->
                <span
                    class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                    @if ($key === 'price')
                        {{ '$' . implode('-$', explode('-', $value)) }}
                    @elseif ($key === 'abv')
                        {{ $value }}% abv
                    @elseif ($key === 'size')
                        {{ $value }}{{ $size->units }}
                    @else
                        {{ $value }}
                    @endif
                    <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                        @click="removeQueryParam($data, '{{ $key }}')">
                        <span class="sr-only">Remove</span>
                        <svg viewBox="0 0 14 14"
                            class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                            <path d="M4 4l6 6m0-6l-6 6" />
                        </svg>
                        <span class="absolute -inset-1"></span>
                    </button>
                </span>
            @endif
        @endforeach


        <!-- Include minorCategory slug -->
        @if (isset($minorCategory))
            <span
                class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                {{ $minorCategory->name }}
                <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                    @click="removeQueryParam($data, 'minorCategory')">
                    <span class="sr-only">Remove</span>
                    <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                        <path d="M4 4l6 6m0-6l-6 6" />
                    </svg>
                    <span class="absolute -inset-1"></span>
                </button>
            </span>
        @endif

        <!-- Include style slug -->
        @if (isset($style))
            <span
                class="my-2 ml-2 inline-flex items-center gap-x-0.5 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                {{ $style->name }}
                <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-gray-500/20"
                    @click="removeQueryParam($data, 'style')">
                    <span class="sr-only">Remove</span>
                    <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-gray-700/50 group-hover:stroke-gray-700/75">
                        <path d="M4 4l6 6m0-6l-6 6" />
                    </svg>
                    <span class="absolute -inset-1"></span>
                </button>
            </span>
        @endif
        @if (count(request()->except('sort', 'page')) || $minorCategory || $style)
            <button onclick="clearFilters()" class="ml-4 underline text-xs">Clear Filters</button>
        @endif
    </div>
</div>


<script>
    function removeQueryParam({
        formData
    }, paramName, paramValue = null) {
        console.log('Removing:', paramName, 'with value:', paramValue);

        const currentUrl = window.location.href;
        const url = new URL(currentUrl);

        if (paramName === 'minorCategory' && formData.minorCategory) {
            console.log('Removing minorCategory');
            const styleRegex = new RegExp(`/${formData.style}(?=/|$)`, 'g');
            url.pathname = url.pathname.replace(styleRegex, '');
            formData.style = '';

            const minorCategoryRegex = new RegExp(`/${formData.minorCategory}(?=/|$)`, 'g');
            url.pathname = url.pathname.replace(minorCategoryRegex, '');
            formData.minorCategory = '';
        } else if (paramName === 'style' && formData.style) {
            console.log('Removing style');
            const styleRegex = new RegExp(`/${formData.style}(?=/|$)`, 'g');
            url.pathname = url.pathname.replace(styleRegex, '');
            formData.style = '';
        } else if (paramName === 'country' && paramValue) {
            console.log('Removing country:', paramValue);
            // Handle 'country' parameter with multiple values
            const currentCountries = url.searchParams.getAll('country');
            const currentCountriesArray = currentCountries.flatMap(country => country.split(','));
            const updatedCountries = currentCountriesArray.filter(country => country !== paramValue);

            console.log('Updated countries:', updatedCountries);

            // Set the 'country' parameter with the updated value
            url.searchParams.set('country', updatedCountries.join(','));

            // Update formData.abv
            formData.countries = updatedCountries.join(',');
        } else if (paramName === 'abv' && paramValue) {
            // Handle 'abv' parameter with multiple values
            const currentAbv = url.searchParams.getAll('abv');
            const currentAbvArray = currentAbv.flatMap(abv => abv.split(','));
            const updatedAbv = currentAbvArray.filter(abv => abv !== paramValue);

            // Set the 'country' parameter with the updated value
            url.searchParams.set('abv', updatedAbv.join(','));

            // Update formData.abv
            formData.abv = updatedAbv.join(',');
        } else if (paramName === 'price' && paramValue) {
            // Handle 'price' parameter with multiple values
            const currentPrice = url.searchParams.getAll('price');
            const currentPriceArray = currentPrice.flatMap(price => price.split(','));
            const updatedPrice = currentPriceArray.filter(price => price !== paramValue);

            // Set the 'country' parameter with the updated value
            url.searchParams.set('price', updatedPrice.join(','));

            // Update formData.abv
            formData.price = updatedPrice.join(',');
        } else if (paramName === 'size' && paramValue) {
            // Handle 'price' parameter with multiple values
            const currentSize = url.searchParams.getAll('size');
            const currentSizeArray = currentSize.flatMap(size => size.split(','));
            const updatedSize = currentSizeArray.filter(size => size !== paramValue);

            // Set the 'country' parameter with the updated value
            url.searchParams.set('size', updatedSize.join(','));

            // Update formData.abv
            formData.size = updatedSize.join(',')
        } else {
            console.log('Removing other parameter:', paramName);
            url.searchParams.delete(paramName);
        }

        // Check if 'page' parameter exists and set it to 1 if it does
        if (url.searchParams.has('page')) {
            url.searchParams.set('page', '1');
        }

        const newUrl = decodeURIComponent(url.toString());
        console.log('New URL:', newUrl);
        console.log(`formData: ${formData.abv}`);
        window.location.href = newUrl;
    }

    function clearFilters() {
        const majorCategory = {!! json_encode($majorCategory->name) !!};
        const currentUrl = new URL(window.location.href);

        // Preserve 'sort' parameter
        const sortParam = currentUrl.searchParams.get('sort');
        const sortQueryString = sortParam ? `sort=${sortParam}` : '';

        // Preserve 'page' parameter
        const pageParam = currentUrl.searchParams.get('page');
        const pageQueryString = pageParam ? `page=1` : '';

        // Construct the new search string without unnecessary '&'
        const newSearch = [sortQueryString, pageQueryString].filter(Boolean).join('&');

        window.location.href = `/shop/${majorCategory}${newSearch ? `?${newSearch}` : ''}`;
    }

    function applySorting(sortOption) {
        // Get the current URL
        const currentUrl = new URL(window.location.href);

        // Add the selected sorting option to the existing query parameters
        currentUrl.searchParams.set('sort', sortOption);

        // Update the browser's URL
        window.location.href = currentUrl.toString();
    }
</script>
