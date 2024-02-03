<form id="filterForm" class="pt-6 hidden lg:block">

    <h3 class="sr-only">Categories</h3>
    <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
        @foreach ($majorCategories as $majorCat)
            @if ($majorCat->name !== $majorCategory->name)
                <li>
                    <a href="/shop/{{ $majorCat->slug }}">{{ $majorCat->name }}</a>
                </li>
            @endif
        @endforeach
    </ul>

    <div x-show="!formData.minorCategory" x-data="{ isOpen: true }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button" @click="isOpen = !isOpen" type="button"
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500 hover:cursor-pointer"
                aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">Type</span>
                <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="isOpen" class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                <div class="flex items-center">
                    <ul>
                        @foreach ($minorCategories as $minorCat)
                            <li>
                                <input id="filter-color-0" name="type" value="{{ $minorCat->slug }}" type="radio"
                                    x-model="formData.minorCategory" @click="updateUrl($data, event)"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-0"
                                    class="ml-3 text-sm text-gray-600">{{ $minorCat->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div x-show="formData.minorCategory && !formData.style" x-data="{ isOpen: true }"
        class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button" @click="isOpen = !isOpen" type="button"
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500 hover:cursor-pointer"
                aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">Style</span>
                <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="isOpen" class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                <div class="flex items-center">
                    <ul>
                        @foreach ($styles as $style)
                            <li>
                                <input id="filter-color-0" name="style" value="{{ $style->slug }}" type="radio"
                                    x-model="formData.style" @click="updateUrl($data, event)"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-0"
                                    class="ml-3 text-sm text-gray-600">{{ $style->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ isOpen: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button" @click="isOpen = !isOpen" type="button"
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500 hover:cursor-pointer"
                aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">Price</span>
                <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="isOpen" class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                <div class="flex items-center">
                    <ul>
                        @foreach ($availablePrices as $key => $value)
                            <li>
                                <input @click="updateUrl($data, event)" name="price" value="{{ $key }}"
                                    type="checkbox" x-bind:checked="formData.price.includes('{{ $key }}')"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="{{ $key }}" class="ml-3 text-sm text-gray-600">
                                    {{ $value[1] }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ isOpen: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button" @click="isOpen = !isOpen" type="button"
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500 hover:cursor-pointer"
                aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">ABV</span>
                <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="isOpen" class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                <div class="flex items-center">
                    <ul>
                        @foreach ($availableAbv as $key => $value)
                            <li>
                                <input @click="updateUrl($data, event)" name="abv" value="{{ $key }}"
                                    type="checkbox" x-bind:checked="formData.abv.includes('{{ $key }}')"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="{{ $key }}" class="ml-3 text-sm text-gray-600">
                                    {{ $value[1] }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ isOpen: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button" @click="isOpen = !isOpen" type="button"
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500 hover:cursor-pointer"
                aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">Size</span>
                <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="isOpen" class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                <div class="flex items-center">
                    <ul>
                        @foreach ($filteredSizes as $size)
                            <li>
                                <input id="filter-color-0" name="size" value="{{ $size->size }}"
                                    type="checkbox" @click="updateUrl($data, event)"
                                    x-bind:checked="Array.isArray(formData.size) ? formData.size.includes('{{ $size->size }}') :
                                        formData.size.split(',').includes('{{ $size->size }}')"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-0"
                                    class="ml-3 text-sm text-gray-600">{{ $size->size }}{{ $size->units }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ isOpen: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button @click="isOpen = !isOpen" type="button"
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500 hover:cursor-pointer"
                aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">Country of Origin</span>
                <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="isOpen" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="isOpen" class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                <div class="flex items-center">
                    <ul>
                        @foreach ($availableCountries as $country)
                            <li>
                                <input name="country" value="{{ $country }}" type="checkbox"
                                    @click="updateUrl($data, event)"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                    x-bind:checked="formData.countries.includes('{{ $country }}')">
                                <label for="filter-color-0"
                                    class="ml-3 text-sm text-gray-600">{{ ucwords($country) }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</form>
<script>
    function updateUrl({
        formData
    }, event) {
        let selectedMinor;
        let selectedStyle;
        const majorCategory = {!! json_encode($majorCategory->slug) !!};
        const minorCategory = formData.minorCategory;
        const style = formData.style;

        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        const currentQueryString = searchParams.toString();
        const numberOfParams = Array.from(searchParams.keys()).length;
        // Initialize an empty object outside the function
        const queryParamsObject = {};

        function getQueryParameters() {
            const currentUrl = new URL(window.location.href);
            const searchParams = currentUrl.searchParams;

            searchParams.forEach((value, key) => {
                if (queryParamsObject.hasOwnProperty(key)) {
                    if (Array.isArray(queryParamsObject[key])) {
                        queryParamsObject[key].push(value);
                    } else {
                        queryParamsObject[key] = [queryParamsObject[key], value];
                    }
                } else {
                    queryParamsObject[key] = value;
                }
            });

            return queryParamsObject;
        }

        // Call the function and then log the result
        const queryParams = getQueryParameters();

        function handleQueryParams() {
            console.log(event.target.name);
            console.log(event.target.value);
            console.log(queryParamsObject);
            const paramName = event.target.name;
            const paramValue = event.target.value;

            // check if the target name exists as a property on queryParams
            if (!queryParamsObject.hasOwnProperty(paramName)) {
                // add the new parameter
                queryParamsObject[paramName] = paramValue;
                return queryParamsObject;
            } else {
                // if the existing object has the property already
                if (queryParamsObject.hasOwnProperty(paramName)) {
                    console.log(`The selected item: ${paramName} already exists on this object.`);
                    // get the existng property value
                    let propValues = queryParamsObject[paramName];
                    console.log(`The existing value string is: ${propValues}`);
                    // put the existing value string into an array as separate strings
                    propValuesArray = propValues.split(',');
                    console.log(`Here are the existing values split up into an array: ${propValuesArray}`);
                    // get the index of the value
                    let valueIndex = propValuesArray.indexOf(paramValue);
                    // if the selected value doesn't exist yet
                    if (valueIndex === -1) {
                        // put the selected value into an array
                        selectedValueArray = paramValue.split();
                        // merge the two arrays and form a new single string value
                        newValue = [...propValuesArray, ...selectedValueArray].join(',');
                        // replace the current value with the new value
                        console.log(queryParamsObject);
                        queryParamsObject[paramName] = newValue
                        console.log(`The new property value is ${queryParamsObject[paramName]}`);
                        return queryParamsObject;
                    } else {
                        // delete the selected value from the existing array based on its index
                        propValuesArray.splice(valueIndex, 1);
                        // check if the property is now empty
                        if (propValuesArray.length === 0) {
                            console.log(`Deleting property ${paramName}`)
                            // delete the property from the object
                            console.log(queryParamsObject)
                            delete queryParamsObject[paramName];
                            console.log(queryParamsObject)
                            console.log(Object.entries(queryParamsObject));
                            return queryParamsObject;
                        } else {
                            // convert the array back into a single string
                            newValue = propValuesArray.join(',');
                            // replace the current value with the new value
                            queryParamsObject[paramName] = newValue
                            console.log(`The new property value is ${queryParamsObject[paramName]}`);
                            return queryParamsObject;
                        }
                    }
                }
            }
        }

        if (event.target.name === "country" || event.target.name === "abv" || event.target.name === "price" || event
            .target.name === "size") {
            handleQueryParams();

            // Check if the "page" query parameter exists, and if it does, set it to 1
            if (queryParamsObject.hasOwnProperty('page')) {
                queryParamsObject.page = '1';
            }

            // Handle full deletion of parameters
            if (Object.keys(queryParamsObject).length === 0) {
                window.location.href = `${currentUrl.origin}${currentUrl.pathname}`;
            }
            // Handle adding a single parameter
            if (Object.keys(queryParamsObject).length === 1) {
                let property = Object.keys(queryParamsObject)[0];
                let queryString = `?${property}=${queryParamsObject[property]}`;
                window.location.href = `${currentUrl.origin}${currentUrl.pathname}${queryString}`;
                // Handle chaining multiple parameters
            } else {
                let queryString = '';

                let isFirstProperty = true;

                for (let key in queryParamsObject) {
                    if (queryParamsObject.hasOwnProperty(key)) {
                        // If it's not the first property, add an "&" before the next one
                        if (!isFirstProperty) {
                            queryString += '&';
                        } else {
                            // If it's the first property, add a "?" before it
                            queryString += '?';
                            isFirstProperty = false;
                        }

                        // Append the key-value pair to the query string
                        queryString += `${key}=${queryParamsObject[key]}`;
                    }
                }

                window.location.href = `${currentUrl.origin}${currentUrl.pathname}${queryString}`;
            }
        }

        if (event.target.name === "type") {
            // Handle type (minor category) changes
            if (event.target.value === minorCategory) {
                formData.minorCategory = '';
                formData.style = '';
            } else {
                selectedMinor = event.target.value;
                formData.style = '';
            }

            // Extract existing search parameters from the URL
            const currentSearchParams = currentUrl.searchParams;

            // Check if the "page" query parameter exists, and if it does, set it to 1
            if (currentSearchParams.has('page')) {
                currentSearchParams.set('page', '1');
            }

            // Construct the new URL with the updated slug and existing parameters
            const updatedUrl = `/shop/${majorCategory}${selectedMinor ? `/${selectedMinor}` : ''}`;

            // Check if there are parameters before adding the question mark
            const hasParams = currentSearchParams.toString() !== '';
            const questionMark = hasParams ? '?' : '';

            const newUrl = `${currentUrl.origin}${updatedUrl}${questionMark}${currentSearchParams}${currentUrl.hash}`;

            window.location.href = newUrl;
        }

        if (event.target.name === "style") {
            // Handle style changes
            if (event.target.value === style) {
                formData.style = '';
            } else {
                selectedStyle = event.target.value;
            }

            // Extract existing search parameters from the URL
            const currentSearchParams = currentUrl.searchParams;

            // Check if the "page" query parameter exists, and if it does, set it to 1
            if (currentSearchParams.has('page')) {
                currentSearchParams.set('page', '1');
            }

            // Construct the new URL with the updated style and existing parameters
            const updatedUrl = `/shop/${majorCategory}/${minorCategory}${selectedStyle ? `/${selectedStyle}` : ''}`;

            // Check if there are parameters before adding the question mark
            const hasParams = currentSearchParams.toString() !== '';
            const questionMark = hasParams ? '?' : '';

            const newUrl = `${currentUrl.origin}${updatedUrl}${questionMark}${currentSearchParams}${currentUrl.hash}`;

            window.location.href = newUrl;
        }
    }
</script>
