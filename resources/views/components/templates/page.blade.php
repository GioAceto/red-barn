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
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</body>

</html>
