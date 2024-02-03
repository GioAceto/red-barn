<x-templates.account>
    <template x-if="menuSelection === 1">
        <x-accountSections.accountInfo />
    </template>
    <template x-if="menuSelection === 2">
        <x-accountSections.myEvents />
    </template>
    <template x-if="menuSelection === 3">
        <x-accountSections.wishList />
    </template>
    <template x-if="menuSelection === 4">
        <x-accountSections.users />
    </template>
    <template x-if="menuSelection === 5">
        <x-accountSections.addProducts :brands='$brands' :majorCategories='$majorCategories' :minorCategories='$minorCategories' :styles='$styles'
            :sizes='$sizes' />
    </template>
    <template x-if="menuSelection === 6">
        <x-accountSections.editProducts />
    </template>
</x-templates.account>
