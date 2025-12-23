@if (count($breadcrumbs))
<div class="breadcrumbsContainer">
    <div class="container">
        <div class="breadcrumbsRow">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    <span class="separator">/</span>
                @else
                    <span>{{ $breadcrumb->title }}</span>
                @endif

            @endforeach
        </div>
    </div>
</div>
@endif
