<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 lg:max-w-7xl">
        <div class="relative overflow-hidden rounded-lg lg:h-96">
            <div class="absolute inset-0">
                <img src="{{ $minorCategory ? '/images/' . $minorCategory->slug . '.jpeg' : '/images/' . $majorCategory->slug . '.jpeg' }}"
                    alt="{{ $majorCategory->name }}" class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="relative h-96 w-full lg:hidden"></div>
            <div aria-hidden="true" class="relative h-32 w-full lg:hidden"></div>
            <div
                class="absolute inset-x-0 bottom-0 rounded-bl-lg rounded-br-lg bg-black bg-opacity-75 p-6 backdrop-blur backdrop-filter sm:flex sm:items-center sm:justify-between lg:inset-x-auto lg:inset-y-0 lg:w-96 lg:flex-col lg:items-start lg:rounded-br-none lg:rounded-tl-lg">
                <div>
                    <h2 class="text-4xl font-bold text-white">
                        {{ ucwords($minorCategory ? $minorCategory->name : $majorCategory->name) }}</h2>
                </div>
                <a href="/shop/{{ $minorCategory ? $majorCategory->slug . '/' . $minorCategory->slug : $majorCategory->slug }}"
                    id="exploreBtn">Shop
                    All {{ ucwords($minorCategory ? $minorCategory->name : $majorCategory->name) }}</a>
            </div>
        </div>
    </div>
</div>
