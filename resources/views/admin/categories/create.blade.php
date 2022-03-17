@extends('admin.categories.index')
@section('category_content')

    <!-- Form add cargo -->
    <section class="slice">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="mb-2">
                        <h6 class="h5">Новая категория</h6>
                        <p class="text-muted mb-0">Добавьте новую категорию для обоев</p>
                    </div>
                    <div>
                        <form enctype="multipart/form-data" role="form" class="border p-4" method="POST" action="{{ route('aaadminca.categories.store') }}">
                            @csrf
                            @include('admin.categories.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
