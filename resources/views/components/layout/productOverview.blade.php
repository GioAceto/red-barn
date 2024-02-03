@php
    $size = request('size');
@endphp
<div class="bg-white" x-data="{ selectedSize: '750', price: '', imagePath: '' }">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
            <!-- Image gallery -->
            <div class="flex flex-col-reverse">

                <div class="aspect-h-1 aspect-w-1 w-full">
                    <!-- Tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <img src="{{ isset($size)
                            ? asset(
                                'storage/' .
                                    optional(
                                        $product->productSizes()->join('sizes', 'product_sizes.size_id', '=', 'sizes.id')->where('sizes.size', $size)->first(),
                                    )->image,
                            )
                            : asset(
                                'storage/' .
                                    optional(
                                        $product->productSizes()->where('is_default_size', 1)->first(),
                                    )->image,
                            ) }}"
                            alt="{{ $product->name }} Image"
                            class="h-full w-full object-cover object-center sm:rounded-lg">


                    </div>

                    <!-- More images... -->
                </div>
            </div>

            <!-- Product info -->
            <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>

                <div class="mt-3">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">
                        {{ isset($size)? $product->productSizes()->join('sizes', 'product_sizes.size_id', '=', 'sizes.id')->where('sizes.size', $size)->first()->price: $product->productSizes()->where('is_default_size', 1)->first()->price }}
                    </p>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6 text-base text-gray-700">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <!-- Size picker -->
                    <div class="mt-8">
                        <fieldset class="mt-2">
                            <legend class="sr-only">Choose a size</legend>
                            <div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
                                @foreach ($product->productSizes as $productSize)
                                    <button onclick="changeSize('{{ $productSize->size->size }}')"
                                        class="flex items-center justify-center rounded-md border py-3 px-3 text-sm font-medium uppercase sm:flex-1 cursor-pointer focus:outline-none
                                        @if ((!$size && $productSize->is_default_size) || request('size') == $productSize->size->size) ring-2 ring-indigo-500 ring-offset-2 @endif
                                        @if ((!$size && $productSize->is_default_size) || request('size') == $productSize->size->size) border-transparent bg-indigo-600 text-white hover:bg-indigo-700 @else border-gray-200 bg-white text-gray-900 hover:bg-gray-50 @endif">
                                        <input type="radio" name="size-choice" value="XXS" class="sr-only"
                                            aria-labelledby="size-choice-0-label">
                                        <span
                                            id="size-choice-0-label">{{ $productSize->size->size }}{{ $productSize->size->units }}</span>
                                    </button>
                                @endforeach
                            </div>

                            <div class="mt-10 flex">
                                <button type="submit"
                                    class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Add
                                    to cart</button>

                                <button type="button"
                                    class="ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                                    <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    <span class="sr-only">Add to favorites</span>
                                </button>
                            </div>
                    </div>

                    <section aria-labelledby="details-heading" class="mt-12">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>
                        <div class="pt-6 divide-y divide-gray-200 border-t">
                            <div>
                                <h3 class="mb-4 text-gray-900 text-sm font-medium">Product Details</h3>
                                <div id="disclosure-1">
                                    <ul class="text-xs" role="list">
                                        <li class="grid grid-cols-2" style="grid-template-columns: 25% 75%;">
                                            <div class="font-medium  p-2">Country</div>
                                            <div class="p-2">{{ ucwords($product->country_of_origin) }}</div>
                                        </li>
                                        @if (isset($product->state))
                                            <li class="grid grid-cols-2" style="grid-template-columns: 25% 75%;">
                                                <div class="font-medium  p-2">Region</div>
                                                <div class="p-2">{{ ucwords($product->state) }}
                                                </div>
                                            </li>
                                        @endif
                                        <li class="grid grid-cols-2" style="grid-template-columns: 25% 75%;">
                                            <div class="font-medium p-2">Brand</div>
                                            <div class="p-2">{{ ucwords($product->brand) }}</div>
                                        </li>
                                        <li class="grid grid-cols-2" style="grid-template-columns: 25% 75%;">
                                            <div class="font-medium p-2">
                                                {{ ucwords($product->majorCategory->name) }} Type</div>
                                            <div class="p-2">{{ ucwords($product->minorCategory->name) }}</div>
                                        </li>
                                        <li class="grid grid-cols-2" style="grid-template-columns: 25% 75%;">
                                            <div class="font-medium p-2">Style</div>
                                            <div class="p-2">{{ ucwords($product->style->name) }}</div>
                                        </li>
                                        <li class="grid grid-cols-2" style="grid-template-columns: 25% 75%;">
                                            <div class="font-medium p-2">
                                                ABV</div>
                                            <div class="p-2">
                                                {{ rtrim(rtrim($product->abv, '0'), '.') }}%</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeSize(size) {
            // Update the URL with the new size parameter
            var currentUrl = window.location.href;
            var newUrl;

            if (currentUrl.includes('?size=')) {
                // If the URL already contains a size parameter, replace it
                newUrl = currentUrl.replace(/(\?size=)[^\&]+/, '$1' + encodeURIComponent(size));
            } else {
                // If there is no size parameter in the URL, add it
                newUrl = currentUrl + (currentUrl.includes('?') ? '&' : '?') + 'size=' + encodeURIComponent(size);
            }

            // Redirect to the new URL
            window.location.href = newUrl;
        }
    </script>
