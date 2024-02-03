<x-templates.pageWithFilters :majorCategory='$majorCategory' :majorCategories='$majorCategories' :minorCategories='$minorCategories' :style='$style' :styles='$styles'
    :sizes='$sizes' :minorCategory='$minorCategory' :countries='$countries' :price='$price' :abv='$abv' :size='$size'
    :countries='$countries' :availablePrices='$availablePrices' :filteredSizes='$filteredSizes' :availableCountries='$availableCountries' :availableAbv='$availableAbv' :region='$region'
    :sort='$sort'>
    <x-layout.productsGrid :majorCategory='$majorCategory' :products='$products' :size='$size' :sort='$sort' />
    <x-layout.pagination :products='$products' />
</x-templates.pageWithFilters>
