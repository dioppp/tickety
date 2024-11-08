<nav class=" w-full bg-gray-800  flex items-center justify-between" aria-label="Global">
    <ul class="icon-nav flex items-center gap-4">
        <li class="relative xl:hidden">
            <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                aria-label="Toggle navigation" href="javascript:void(0)">

            </a>
        </li>

        {{-- <li class="relative">
            @include('partials.header-components.dd-notification')
        </li> --}}
    </ul>
    <div class="flex items-center gap-4">
        <a href="#" class="btn font-medium hover:bg-blue-700 py-2" aria-current="page">
            <i class="ti ti-calendar-plus relative z-1"></i>
            Buat Event
        </a>
        @include('partials.header-components.dd-profile')
    </div>
</nav>
