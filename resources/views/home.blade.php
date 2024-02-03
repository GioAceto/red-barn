<x-templates.page>
    @if (auth()->check() && auth()->user()->email_verified_at)
        You're logged in!
    @endif
    <x-layout.carousel />
    <x-layout.newsletter />
    <x-layout.specialOrder />
</x-templates.page>
