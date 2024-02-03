<x-layout.partials.head />

<body class="antialiased">
    <div x-data="{ isOpenMobile: false }">
        <div class="bg-white">
            <x-layout.mobileNav />
            <x-layout.nav />
            {{ $slot }}
            <x-layout.footer />
        </div>
    </div>
</body>

</html>
