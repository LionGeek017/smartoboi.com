@extends('admin.index')
@section('admin_content')

    <div class="container pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item"><a class="text-dark text-underline text-sm" href="{{ route('aaadminca.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item active text-sm" aria-current="page">Список категорий</li>
            </ol>
        </nav>
    </div>

    <section class="slice">
        <div class="container">
            <div class="actions-toolbar">
                <h5 class="mb-1">Категории</h5>
                <p class="text-sm text-muted mb-0">Раздел для управления категориями</p>
            </div>
            <div class="actions-toolbar mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('aaadminca.categories.index') ? 'active' : '' }}" href="{{ route('aaadminca.categories.index') }}">Все</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link {{ Route::is('aaadminca.categories.create') ? 'active' : '' }}" href="{{ route('aaadminca.categories.create') }}">Добавить категорию</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    @yield('category_content')

@endsection
