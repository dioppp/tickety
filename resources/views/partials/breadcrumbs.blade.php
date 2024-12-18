<div class="card px-4 py-3">
    <div class="flex gap-2">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$loop->last)
                <a class="inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent text-blue-600 hover:text-blue-700"
                    href="{{ $breadcrumb['url'] }}">
                    {{ $breadcrumb['name'] }}
                    <i class="ti ti-chevron-right text-base"></i>
                </a>
            @else
                <span
                    class="inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent text-gray-500">
                    {{ $breadcrumb['name'] }}
                </span>
            @endif
        @endforeach
    </div>
</div>
