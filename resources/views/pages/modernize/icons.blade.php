<!DOCTYPE html>
<html lang="en">

<head>
    @include('../partials/head')
    <title>Modernize TailwindCSS HTML Admin Template</title>
</head>

<body class="DEFAULT_THEME bg-white">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex">
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white  left-sidebar   transition-all duration-300">
                @include('../partials/sidebar')
            </aside>
            <div class="w-full page-wrapper overflow-hidden">

                <!--  Header Start -->
                <header class="container full-container w-full text-sm   py-4">
                    <div class=" w-full">
                        @include('../partials/header')
                    </div>
                </header>
                <!--  Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto  max-w-full  pt-4">
                    <div class="container full-container py-5 ">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-lg text-gray-600 font-semibold mb-6">Icons</h6>
                                <iframe src="https://tabler-icons.io/" frameborder="0" class="w-full"
                                    data-simplebar=""></iframe>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Main Content End -->

            </div>
        </div>
        <!--end of project-->
    </main>

    @include('../partials/scripts')
</body>

</html>
