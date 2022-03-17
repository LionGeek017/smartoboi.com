@extends('admin.index')
@section('admin_content')

    <div class="container pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item"><a class="text-dark text-underline text-sm" href="{{ route('aaadminca.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item"><a class="text-dark text-underline text-sm" href="{{ route('aaadminca.wallpapers.index') }}">Обои</a></li>
                <li class="breadcrumb-item active text-sm" aria-current="page">Список обоев</li>
            </ol>
        </nav>
    </div>

    <section class="slice">
        <div class="container">
            <div class="actions-toolbar">
                <h5 class="mb-1">Обои</h5>
                <p class="text-sm text-muted mb-0">Раздел для управления обоями</p>
            </div>
            <div class="actions-toolbar mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ !request()->has('category_id') ? 'active' : '' }}" href="{{ route('aaadminca.wallpapers.index') }}">Все</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link {{ Route::is('aaadminca.wallpapers.create') ? 'active' : '' }}" href="{{ route('aaadminca.wallpapers.create', request()->has('category_id') ? ['category_id' => request()->category_id] : '') }}">Добавить обои</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    @yield('wallpaper_content')

@endsection
