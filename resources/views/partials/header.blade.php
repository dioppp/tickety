<!-- ========== HEADER ========== -->

<nav class=" w-full bg-gray-800  flex items-center justify-between" aria-label="Global">
    <ul class="icon-nav flex items-center gap-4">
        <li class="relative xl:hidden">
            <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                aria-label="Toggle navigation" href="javascript:void(0)">
                <i class="ti ti-menu-2 relative z-1"></i>
            </a>
        </li>

        <li class="relative">
            @include('partials.header-components.dd-notification')
        </li>
    </ul>
    <div class="flex items-center gap-4">
        <a href="#" class="btn font-medium hover:bg-blue-700 py-2" aria-current="page">Download Free</a>
        @include('partials.header-components.dd-profile')
    </div>
</nav>

<!-- ========== END HEADER ========== -->
