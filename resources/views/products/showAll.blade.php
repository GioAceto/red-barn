<x-templates.page>
    <x-layout.breadcrumbs :majorCategory='$majorCategory' :minorCategory="$minorCategory ?? null" />
    <x-layout.hero :majorCategory="$majorCategory" :minorCategory="$minorCategory ?? null" />
    <x-layout.categoriesGrid :majorCategory='$majorCategory' :minorCategories='$minorCategories' :minorCategory="$minorCategory ?? null" :styles="$styles ?? null" />
    <x-layout.highlights title='best sellers' :filteredProducts='$trendingProducts' :majorCategory='$majorCategory' :minorCategories='$minorCategories' />
    <x-layout.highlights title='on sale' :filteredProducts='$dealProducts' type="sale" :majorCategory='$majorCategory' :minorCategories='$minorCategories' />
    <x-layout.highlights title='newest arrivals' :filteredProducts='$recentProducts' type="new" :majorCategory='$majorCategory'
        :minorCategories='$minorCategories' />
</x-templates.page>
