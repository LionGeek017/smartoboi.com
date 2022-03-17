@extends('site.index')
@section('site_content')

<section class="slice py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-sm">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('wallpaper.index', ['category' => $wallpaper->category->slug]) }}">{{ $wallpaper->category->title_ru }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $wallpaper->title_ru ?? 'Просмотр обоев' }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="slice mt-3">
    <div class="container">

        <div class="text-left">
            <h2 class="h4 m-0">Обои</h2>
            <p class="text-sm">Страница просмотра и скачивания обоев</p>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="text-center card p-5 shadow">
                    <img class="img-fluid rounded" src="{{ URL::asset('img/original/' . $wallpaper->img) }}" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-light p-5">
                    <a class="btn btn-success" href="{{ URL::asset('img/original/' . $wallpaper->img) }}" target="_blank">Скачать обои бесплатно</a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
