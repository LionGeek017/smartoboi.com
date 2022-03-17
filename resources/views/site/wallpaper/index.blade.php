@extends('site.index')
@section('site_content')

<section class="slice">
    <div class="container">
        <div class="text-left">
            <h2 class="h4 m-0">Обои</h2>
            <p class="text-sm">Галерея обоев в HD качестве</p>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3">
                <div class="card">
                    <div class="text-left p-4">
                        <h5 class="h5 m-0">Категории</h5>
                        <p class="text-sm p-0 m-0">Все категории обоев</p>
                    </div>
                    <nav class="nav px-2 flex-column">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <a class="nav-link" href="{{ route('wallpaper.index', ['category' => $category->slug]) }}">{{ $category->title_ru }}</a>
                            @endforeach
                        @endif
                    </nav>
                </div>
            </div>
            <div class="col-lg-9">
                @if (count($wallpapers) > 0)
                <div class="row">
                    @foreach ($wallpapers as $picture)
                        <div class="col-lg-2">
                            <div class="mb-5" data-animate-hover="1">
                            <div class="animate-this">
                                <a href="{{ route('wallpaper.view', ['category' => $picture->category->slug,'id' => $picture->id]) }}">
                                <img alt="Image placeholder" class="img-fluid rounded shadow" src="{{ URL::asset('img/img-300x300/' . $picture->img) }}">
                                </a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $wallpapers->links() }}
                @else
                    @include('layouts.no-information')
                @endif
            </div>
        </div>

    </div>
</section>

@if (Route::is('wallpaper.index') && !request()->has('page'))
<section class="slice bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {!! $meta->seo_category !!}
            </div>
        </div>
    </div>
</section>
@endif

@endsection
