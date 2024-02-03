@php
    use App\Models\ProductSize;
    if (!function_exists('uniqueSizesCount')) {
        function uniqueSizesCount($productId)
        {
            return \App\Models\ProductSize::where('product_id', $productId)->count();
        }
    }
@endphp

<div class="pb-12 bg-white">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold">{{ ucwords($title) }}</h2>
        <div
            class="pb-10 mx-w-full mt-6 grid grid-flow-col auto-cols-max overflow-x-auto gap-x-4 gap-y-0 sm:gap-x-6 lg:gap-x-8">
            @foreach ($filteredProducts as $filteredProduct)
                <div class="group relative">
                    <div
                        class="h-96 w-56 overflow-hidden flex flex-col justify-between rounded-md bg-white border border-gray-300 group-hover:opacity-75">
                        @if ($filteredProduct->deal)
                            <p class="absolute left-4 top-2 text-red-500 text-xs font-bold tracking-tight">SALE</p>
                        @endif
                        <img src="{{ asset('storage/' . $filteredProduct->image) }}" alt="{{ $filteredProduct->name }}"
                            class="pt-4 pb-4 h-64 w-full object-cover object-center">
                        <div class="px-4 w-full h-28 text-sm flex flex-col">
                            <p class="mb-2">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $filteredProduct->name }}
                                </a>
                            </p>
                            <p class="mb-2 text-xs text-gray-600">
                                @php
                                    $count = @uniqueSizesCount($filteredProduct->product_id);
                                    $size = ProductSize::where('product_id', $filteredProduct->product_id)->first();
                                @endphp

                                @if ($count > 1 && !$filteredProduct->deal)
                                    {{ $count }} Options
                                @else
                                    {{ intval($size->size->size) }}{{ $size->size->units }}
                                @endif
                                | {{ $filteredProduct->brand }}
                            </p>
                            <div class="flex items-center">
                                @php
                                    $productSizes = ProductSize::where('product_id', $filteredProduct->product_id)->get();
                                @endphp
                                @if ($count > 1 && !$filteredProduct->deal)
                                    @php
                                        $minPrice = $productSizes->min('price');
                                        $maxPrice = $productSizes->max('price');
                                    @endphp
                                    <p class="font-semibold">${{ number_format($minPrice, 2) }} -
                                        ${{ number_format($maxPrice, 2) }}</p>
                                @elseif (!$filteredProduct->deal)
                                    <p class="font-semibold">${{ number_format($productSizes->first()->price, 2) }}</p>
                                @else
                                    <p class="mr-2 text-red-500 font-semibold">
                                        ${{ number_format($productSizes->first()->deal_price, 2) }}</p>
                                    <p class="line-through font-medium text-xs">
                                        ${{ number_format($productSizes->first()->price, 2) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
