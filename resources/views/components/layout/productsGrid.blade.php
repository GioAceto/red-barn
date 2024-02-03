<div class="mb-6 bg-white">
    <div class="mx-auto max-w-7xl overflow-hidden">
        <h2 class="sr-only">Products</h2>

        <div class="-mx-px grid grid-cols-2 border-l border-gray-200 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                @php
                    $sizes = $product->productSizes;
                    $sizeCount = $sizes->count();
                    $sizeInfo = !$size ? ($sizeCount == 1 ? $sizes[0]->size->size . $sizes[0]->size->units : $sizeCount . ' Options') : $product->product_size . $product->product_units;
                @endphp
                <div class="group relative border-b border-r border-gray-200 p-4 sm:p-6">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden group-hover:opacity-75">
                        @if (!$size)
                            <img src="{{ asset('storage/' . $product->productSizes->firstWhere('is_default_size', 1)->image) }}"
                                alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                        @else
                            <img src="{{ asset('storage/' . $product->size_image) }}" alt="{{ $product->name }}"
                                class="h-full w-full object-cover object-center">
                        @endif
                    </div>

                    <div class="pb-4 pt-10">
                        <h3 class="mb-2 text-sm text-gray-900">
                            <a
                                href="/shop/{{ urlencode($majorCategory->name) }}/product/{{ urlencode(str_replace(' ', '-', strtolower(rawurlencode($product->name)))) }}{{ !empty($size) ? '?size=' . $product->product_size : '' }}">

                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->name }}
                            </a>

                        </h3>
                        <p class="mb-2 text-xs text-gray-600">
                            {{ $sizeInfo }} | {{ $product->brand }}
                        </p>
                        <div class="flex items-center">
                            <p class="text-sm font-semibold">
                                @php
                                    $price = '';

                                    if (!$size) {
                                        if ($sizes->count() > 1) {
                                            // Convert the Collection to an array
                                            $sizesArray = $sizes->toArray();

                                            // Calculate minimum and maximum prices
                                            $minPrice = min(array_column($sizesArray, 'price'));
                                            $maxPrice = max(array_column($sizesArray, 'price'));

                                            $price = '$' . number_format($minPrice, 2) . ' - $' . number_format($maxPrice, 2);
                                        } else {
                                            $price = '$' . number_format($sizes[0]->price, 2);
                                        }
                                    } else {
                                        $price = '$' . number_format($product->size_price, 2);
                                    }
                                @endphp

                                {{ $price }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- More products... -->
        </div>
    </div>
</div>
