<div class="pb-12 bg-white">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">

        <div
            class="pb-10 mx-w-full mt-6 grid grid-flow-col auto-cols-max overflow-x-auto gap-x-4 gap-y-0 sm:gap-x-6 lg:gap-x-8">
            @if ($styles)
                @foreach ($styles as $style)
                    <div class="group relative">
                        <div
                            class="h-62 w-40 overflow-hidden flex flex-col justify-between items-center rounded-md bg-white border border-gray-300 group-hover:opacity-75">
                            <img src="" alt="" class="pt-4 pb-4 h-48 w-full object-cover object-center">
                            <h3
                                class="px-2 w-full h-14 text-sm flex justify-center items-center text-center text-white bg-gray-900 font-medium">
                                <a
                                    href="/shop/{{ $majorCategory->slug }}/{{ $minorCategory->slug }}/{{ $style->slug }}">
                                    <span class="absolute inset-0"></span>
                                    {{ ucwords($style->name) }}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($minorCategories as $minorCategory)
                    <div class="group relative">
                        <div
                            class="h-62 w-40 overflow-hidden flex flex-col justify-between items-center rounded-md bg-white border border-gray-300 group-hover:opacity-75">
                            <img src="/images/{{ $minorCategory->slug }}.webp" alt="{{ $minorCategory->name }}"
                                class="pt-4 pb-4 h-48 w-full object-cover object-center">
                            <h3
                                class="px-2 w-full h-14 text-sm flex justify-center items-center text-center text-white bg-gray-900 font-medium">
                                <a href="/explore/{{ $majorCategory->slug }}/{{ $minorCategory->slug }}">
                                    <span class="absolute inset-0"></span>
                                    {{ ucwords($minorCategory->name) }}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</div>
