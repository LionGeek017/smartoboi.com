@extends('admin.categories.index')
@section('category_content')

    <!-- Form add cargo -->
    <section class="slice">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="mb-2 d-flex align-items-center">
                        <div>
                            <h6 class="h5">Редактировать</h6>
                            <p class="text-muted mb-0">Отредактируйте категорию</p>
                        </div>
                        <div class="ml-auto">
                            @if(isset($category))
                                <img height="50" src="{{ URL::asset($category->img ? 'img/img-80x80/' . $category->img : 'img/default.jpg') }}" />
                            @endif
                        </div>
                    </div>
                    <div>
                        <form enctype="multipart/form-data" role="form" class="border p-4" method="POST" action="{{ route('aaadminca.categories.update', ['category' => $category->id]) }}">
                            @csrf
                            @method('PATCH')
                            @include('admin.categories.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
