@extends('admin.wallpapers.index')
@section('wallpaper_content')

    @isset($wallpapers)
        <section class="slice">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-cards align-items-center">
                        <thead>
                        <tr>
                            <th scope="col" class="sort">#</th>
                            <th scope="col" class="sort">Картинка</th>
                            <th scope="col" class="sort">Название</th>
                            <th scope="col" class="sort">Категория</th>
                            <th scope="col" class="sort">Дата</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($wallpapers as $wallpaper)
                            @include('admin.wallpapers.tr')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $wallpapers->links() }}
            </div>
        </section>
    @else
        <section class="slice">
            <div class="container">
                @include('layouts.no-information')
            </div>
        </section>
    @endisset

@endsection
