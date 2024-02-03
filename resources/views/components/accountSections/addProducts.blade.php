<div class="mb-12 px-6 py-12 w-full md:max-w-md lg:max-w-xl xl:max-w-3xl mx-auto border border-gray-400 rounded-lg">
    <form method="POST" action="/products" enctype="multipart/form-data" x-data="{ enabledDefaultSize: false, enabledOnSale: false, enabledAllocated: false, enabledSpecial: false, enabledGlutenFree: false, enabledNonAlcoholic: false }">
        @csrf
        @if ($errors->any())
            <ul class="mb-6 py-2 bg-red-200">
                @foreach ($errors->all() as $error)
                    <li>
                        <p class="px-2 text-red-500">- {{ $error }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
        <h2 class="text-base font-semibold leading-7 text-gray-900">Add Products</h2>
        <p class="mt-1 mb-6 text-sm leading-6 text-gray-600">Enter product details and submit.</p>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-x-4">
            <div class="mb-6 sm:mb-0">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Product Name" value="{{ old('name') }}" autocomplete="off">
                </div>
            </div>


            <div>
                <label for="brand" class="block text-sm font-medium leading-6 text-gray-900">Brand Name</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="brand" name="brand" list="brands"
                            class="block w-full rounded-md border-0
                py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                sm:leading-6 appearance-none"
                            placeholder="Brand Name" autocomplete="off" value="{{ old('brand') }}">

                        <datalist id="brands">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}">
                            @endforeach
                        </datalist>

                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div class="mb-6 sm:mb-0">
                <label for="major_category" class="block text-sm font-medium leading-6 text-gray-900">Major
                    Category</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="major_category" name="major_category" list="major_categories"
                            class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                            placeholder="Major Category" autocomplete="off" value="{{ old('major_category') }}">
                        <datalist id="major_categories">
                            @foreach ($majorCategories as $majorCategory)
                                <option value="{{ $majorCategory->name }}" key="{{ $majorCategory->id }}">
                                </option>
                            @endforeach
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-6 sm:mb-0">
                <label for="minor_category" class="block text-sm font-medium leading-6 text-gray-900">Minor
                    Category</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="minor_category" name="minor_category" list="minor_categories"
                            class="block w-full rounded-md border-0
                                py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                                sm:leading-6 appearance-none"
                            placeholder="Minor Category" autocomplete="off" value="{{ old('minor_category') }}">
                        <datalist id="minor_categories">
                            @foreach ($minorCategories as $minorCategory)
                                <option value="{{ $minorCategory->name }}" key="{{ $minorCategory->id }}">
                                </option>
                            @endforeach
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label for="style" class="block text-sm font-medium leading-6 text-gray-900">Style</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="style" name="style" list="styles"
                            class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                            placeholder="Style" autocomplete="off" value="{{ old('style') }}">
                        <datalist id="styles">
                            @foreach ($styles as $style)
                                <option value="{{ $style->name }}" key="{{ $minorCategory->id }}">
                                </option>
                            @endforeach
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div class="mb-6 sm:mb-0">
                <label for="major_slug" class="block text-sm font-medium leading-6 text-gray-900">Major
                    Category Slug</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="major_slug" name="major_slug" list="major_slugs"
                            class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                            placeholder="Major Slug" autocomplete="off" value="{{ old('major_slug') }}">
                        <datalist id="major_slugs">
                            @foreach ($majorCategories as $majorCategory)
                                <option value="{{ $majorCategory->name }}" key="{{ $majorCategory->id }}">
                                </option>
                            @endforeach
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-6 sm:mb-0">
                <label for="minor_slug" class="block text-sm font-medium leading-6 text-gray-900">Minor
                    Category Slug</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="minor_slug" name="minor_slug" list="minor_slugs"
                            class="block w-full rounded-md border-0
                                py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                                sm:leading-6 appearance-none"
                            placeholder="Minor Slug" autocomplete="off" value="{{ old('minor_slug') }}">
                        <datalist id="minor_slugs">
                            @foreach ($minorCategories as $minorCategory)
                                <option value="{{ $minorCategory->name }}" key="{{ $minorCategory->id }}">
                                </option>
                            @endforeach
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label for="style_slug" class="block text-sm font-medium leading-6 text-gray-900">Style Slug</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="style_slug" name="style_slug" list="style_slugs"
                            class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                            placeholder="Style Slug" autocomplete="off" value="{{ old('style_slug') }}">
                        <datalist id="style_slugs">
                            @foreach ($styles as $style)
                                <option value="{{ $style->name }}" key="{{ $minorCategory->id }}">
                                </option>
                            @endforeach
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div class="mb-6 sm:mb-0">
                <label for="abv" class="block text-sm font-medium leading-6 text-gray-900">ABV</label>
                <div class="mt-2">
                    <input type="text" name="abv" id="abv"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="ABV" value="{{ old('abv') }}">
                </div>
            </div>

            <div class="mb-6 sm:mb-0">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country of
                    Origin</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="country" name="country_of_origin" list="countries"
                            class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                            placeholder="Country" autocomplete="off" value="{{ old('country_of_origin') }}">
                        <datalist id="countries">
                            <option>Denmark</option>
                            <option>Ecuador</option>
                            <option>Nicaragua</option>
                            <option>United States</option>
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label for="state" class="block text-sm font-medium leading-6 text-gray-900">Region / State</label>
                <div class="mt-2">
                    <div class="relative">
                        <input type="text" id="state" name="state" list="regions"
                            class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                            placeholder="Region" autocomplete="off" value="{{ old('state') }}">
                        <datalist id="regions">
                            <option>Champagne</option>
                            <option>Cognac</option>
                            <option>Kentucky</option>
                            <option>Tennessee</option>
                        </datalist>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div class="mb-6">
                <label for="sku" class="block text-sm font-medium leading-6 text-gray-900">SKU</label>
                <div class="mt-2">
                    <input type="text" name="sku" id="sku"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="SKU #" value="{{ old('sku') }}">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-4">
                <div class="mb-6 sm:mb-0">
                    <label for="size" class="block text-sm font-medium leading-6 text-gray-900">Size</label>
                    <div class="mt-2">
                        <div class="relative">
                            <input type="text" id="size" name="size" list="sizes"
                                class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                                placeholder="Size" autocomplete="off" value="{{ old('size') }}">
                            <datalist id="sizes">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->size }}" key="{{ $size->id }}">
                                    </option>
                                @endforeach
                            </datalist>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6 sm:mb-0">
                    <label for="unit" class="block text-sm font-medium leading-6 text-gray-900">Units</label>
                    <div class="mt-2">
                        <div class="relative">
                            <select id="unit" name="units" list="units"
                                class="block w-full rounded-md border-0
                            py-1.5 pl-4 pr-8 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                            placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                            sm:leading-6 appearance-none"
                                placeholder="Units" autocomplete="off" value="{{ old('units') }}">
                                <option value="ml">ml</option>
                                <option value="l">l</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6 sm:mb-0 flex items-center">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button type="button"
                    :class="{ 'bg-indigo-600': enabledDefaultSize, 'bg-gray-200': !enabledDefaultSize }"
                    @click="enabledDefaultSize = !enabledDefaultSize"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                    role="switch" :aria-checked="enabledDefaultSize.toString()"
                    aria-labelledby="annual-billing-label">
                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                    <span aria-hidden="true"
                        :class="{ 'translate-x-5': enabledDefaultSize, 'translate-x-0': !enabledDefaultSize }"
                        class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label">
                    <span class="font-medium text-gray-900">Default Size?</span>
                </span>
            </div>
            <input type="hidden" name="is_default_size" :value="enabledDefaultSize ? 1 : 0">


        </div>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div class="mb-6 sm:mb-0">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="text" name="price" id="price"
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="0.00" aria-describedby="price-currency" value="{{ old('price') }}">
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                        <span class="text-gray-500 sm:text-sm" id="price-currency">USD</span>
                    </div>
                </div>
            </div>
            <div class="mb-6 sm:mb-0 pb-2 flex items-end">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button type="button" :class="{ 'bg-indigo-600': enabledOnSale, 'bg-gray-200': !enabledOnSale }"
                    @click="enabledOnSale = !enabledOnSale"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                    role="switch" :aria-checked="enabledOnSale.toString()" aria-labelledby="annual-billing-label">
                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                    <span aria-hidden="true"
                        :class="{ 'translate-x-5': enabledOnSale, 'translate-x-0': !enabledOnSale }"
                        class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label">
                    <span class="font-medium text-gray-900">On Sale?</span>
                </span>
            </div>
            <input type="hidden" name="deal" :value="enabledOnSale ? 1 : 0">
            <div class="mb-6 sm:mb-0">
                <label for="deal_price" class="block text-sm font-medium leading-6 text-gray-900">Sale Price</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="text" name="deal_price" id="deal_price" :class="{ 'opacity-50': !enabledOnSale }"
                        :disabled="!enabledOnSale"
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="0.00" aria-describedby="price-currency" value="{{ old('deal_price') }}">
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                        <span class="text-gray-500 sm:text-sm" id="price-currency">USD</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div class="mb-6 sm:mb-0 pb-2 flex items-end">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button type="button"
                    :class="{ 'bg-indigo-600': enabledAllocated, 'bg-gray-200': !enabledAllocated }"
                    @click="enabledAllocated = !enabledAllocated"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                    role="switch" :aria-checked="enabledAllocated.toString()"
                    aria-labelledby="annual-billing-label">
                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                    <span aria-hidden="true"
                        :class="{ 'translate-x-5': enabledAllocated, 'translate-x-0': !enabledAllocated }"
                        class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label">
                    <span class="font-medium text-gray-900">Allocated?</span>
                </span>
            </div>
            <input type="hidden" name="allocated" :value="enabledAllocated ? 1 : 0">
            <div class="mb-6 sm:mb-0 pb-2 flex items-end">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button type="button" :class="{ 'bg-indigo-600': enabledSpecial, 'bg-gray-200': !enabledSpecial }"
                    @click="enabledSpecial = !enabledSpecial"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                    role="switch" :aria-checked="enabledSpecial.toString()" aria-labelledby="annual-billing-label">
                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                    <span aria-hidden="true"
                        :class="{ 'translate-x-5': enabledSpecial, 'translate-x-0': !enabledSpecial }"
                        class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label">
                    <span class="font-medium text-gray-900">Special?</span>
                </span>
            </div>

            <div class="mb-6 sm:mb-0">
                <label for="special_id" class="block text-sm font-medium leading-6 text-gray-900">Special ID #</label>
                <div class="mt-2">
                    <input type="text" name="special_id" id="special_id"
                        :class="{ 'opacity-50': !enabledSpecial }"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Special ID #" :disabled="!enabledSpecial" value="{{ old('special_id') }}">
                </div>
            </div>
            <input type="hidden" name="special" :value="enabledSpecial ? 1 : 0">

        </div>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            <div>

            </div>
            <div class="mb-6 sm:mb-0 pb-2 flex items-end">
                <button type="button"
                    :class="{ 'bg-indigo-600': enabledGlutenFree, 'bg-gray-200': !enabledGlutenFree }"
                    @click="enabledGlutenFree = !enabledGlutenFree"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                    role="switch" :aria-checked="enabledGlutenFree.toString()"
                    aria-labelledby="annual-billing-label">
                    <span aria-hidden="true"
                        :class="{ 'translate-x-5': enabledGlutenFree, 'translate-x-0': !enabledGlutenFree }"
                        class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label">
                    <span class="font-medium text-gray-900">Gluten Free?</span>
                </span>
            </div>
            <input type="hidden" name="gluten_free" :value="enabledGlutenFree ? 1 : 0">

            <div class="mb-6 sm:mb-0 pb-2 flex items-end">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button type="button"
                    :class="{ 'bg-indigo-600': enabledNonAlcoholic, 'bg-gray-200': !enabledNonAlcoholic }"
                    @click="enabledNonAlcoholic = !enabledNonAlcoholic"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                    role="switch" :aria-checked="enabledNonAlcoholic.toString()"
                    aria-labelledby="annual-billing-label">
                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                    <span aria-hidden="true"
                        :class="{ 'translate-x-5': enabledNonAlcoholic, 'translate-x-0': !enabledNonAlcoholic }"
                        class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label">
                    <span class="font-medium text-gray-900">Non Alcoholic?</span>
                </span>
            </div>
            <input type="hidden" name="non_alcoholic" :value="enabledNonAlcoholic ? 1 : 0">

        </div>

        <div class="mb-6">
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Product
                    Description</label>
                <div class="mt-2">
                    <textarea rows="4" name="description" id="description"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"
                        value="{{ old('description') }}"></textarea>
                </div>
            </div>
        </div>
        <div class="mb-6 sm:mb-0">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image File</label>
            <div class="mt-2">
                <input type="file" name="image" id="image" accept="image/*"
                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="" value="{{ old('image') }}">
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit
                Product</button>
        </div>
    </form>
</div>
