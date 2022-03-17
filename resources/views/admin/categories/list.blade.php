@extends('admin.categories.index')
@section('category_content')

    @isset($categories)
        <section class="slice">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-cards align-items-center">
                        <thead>
                        <tr>
                            <th scope="col" class="sort">#</th>
                            <th scope="col" class="sort">Картинка</th>
                            <th scope="col" class="sort">Название</th>
                            <th scope="col" class="sort">URL</th>
                            <th scope="col" class="sort">Meta Tags</th>
                            <th scope="col" class="sort">Обои</th>
                            <th scope="col" class="sort">Статус</th>
                            <th scope="col" class="sort">Дата</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($categories as $category)
                            @include('admin.categories.tr')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

{{--        {{ $categories->links() }}--}}
    @else
        @include('layouts.no-information')
    @endisset

@endsection
