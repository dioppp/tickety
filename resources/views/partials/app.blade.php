<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Tickety</title>
</head>

<body class="DEFAULT_THEME bg-white">
    <main>
        <div id="main-wrapper" class=" flex">
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white  left-sidebar   transition-all duration-300">
                @include('partials.sidebar')
            </aside>
            <div class="w-full page-wrapper overflow-hidden">
                <!--  Header Start -->
                <header class="container full-container w-full text-sm   py-4">
                    <div class=" w-full">
                        @include('partials.header')
                    </div>
                </header>
                <!--  Header End -->

                <!-- Content Start -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    <div class="container full-container py-5 flex flex-col gap-6">
                        @yield('content')
                    </div>
                </main>
                <!-- Content End -->

                <!-- Include the alert component -->
                @include('components.alert')
            </div>
        </div>
    </main>

    @include('partials.scripts')
    @stack('scripts')
</body>

</html>
