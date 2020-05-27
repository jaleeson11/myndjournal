@if (count($breadcrumbs))
    <!-- Breadcrumb View -->
    <ol class="breadcrumb">
        <div class="container">
            <!-- For each breadcrumb show link and title -->
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </div>
    </ol>

@endif