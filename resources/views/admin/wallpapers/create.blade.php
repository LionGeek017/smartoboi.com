@extends('admin.wallpapers.index')
@section('wallpaper_content')

    <!-- Form add cargo -->
    <section class="slice">
        <div class="container">
            <div class="mb-2">
                <h6 class="h5">Новые обои</h6>
                <p class="text-muted mb-0">Добавьте красивые и качественные обои</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form enctype="multipart/form-data" role="form" class="border p-4" method="POST" action="{{ route('aaadminca.wallpapers.store') }}">
                        @csrf
                        @include('admin.wallpapers.form')
                    </form>
                </div>
                <div class="col-md-6 bg-light d-flex align-items-center justify-content-center">
                    <p class="text-muted">Здесь будет отображаться загруженная обоя</p>
                </div>
            </div>
        </div>
    </section>

@endsection
