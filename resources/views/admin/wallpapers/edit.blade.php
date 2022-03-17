@extends('admin.wallpapers.index')
@section('wallpaper_content')

    <!-- Form add cargo -->
    <section class="slice">
        <div class="container">
            <div class="mb-2">
                <h6 class="h5">Редактировать</h6>
                <p class="text-muted mb-0">Отредактируйте информацию об обоях</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form enctype="multipart/form-data" role="form" class="border p-4" method="POST" action="{{ route('aaadminca.wallpapers.update', ['wallpaper' => $wallpaper->id]) }}">
                        @csrf
                        @method('PATCH')
                        @include('admin.wallpapers.form')
                    </form>
                </div>
                <div class="col-md-6 bg-light d-flex align-items-center justify-content-center py-3">
                    <img width="100%" class="rounded" src="{{ URL::asset(!empty($wallpaper->img) ? 'img/original/' . $wallpaper->img : 'img/default.png') }}" />
                </div>
            </div>
        </div>
    </section>

@endsection
