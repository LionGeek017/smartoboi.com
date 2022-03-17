@extends('admin.index')
@section('admin_content')

    <!-- <div class="container pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item"><a class="text-dark text-underline text-sm" href="{{ route('aaadminca.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item active text-sm" aria-current="page">Список категорий</li>
            </ol>
        </nav>
    </div> -->

    <section class="slice">
        <div class="container">
            <div class="actions-toolbar">
                <h5 class="mb-1">Парсер</h5>
                <p class="text-sm text-muted mb-0">Парсер картинок по сайту Pexels</p>
            </div>
        </div>
    </section>


    <section class="slice">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <form role="form" class="border p-4" method="POST" action="{{ route('aaadminca.parser.get') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">URL</label>
                                <textarea name="link" class="form-control @error('link') is-invalid @enderror" placeholder="API ссылка" readonly>{{ old('link') ?? $queryUrl->link ?? '' }}</textarea>
                                @error('link')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Запрос</label>
                                <input name="query" class="form-control @error('query') is-invalid @enderror" type="text" placeholder="Запрос, на пример: nature" value="{{ old('query') ?? $queryUrl->query ?? '' }}">
                                @error('query')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label class="form-control-label">Страница</label>
                                <select class="form-control" name="page">
                                    @isset($responseJson)
                                        @for ($i = 0; $i < ceil($responseJson['total_results'] / $responseJson['per_page']); $i++)
                                            <option value="{{ $i+1 }}" {{ request()->page == $i+1 ? 'selected' : '' }}>{{ $i+1 }}</option>
                                        @endfor
                                    @else
                                        <option value="1">1</option>
                                    @endisset
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary">Найти</button>
                            </div>
                        </form>
                    </div>
                    @isset($responseJson)
                        <div class="text-center mt-5 mb-1">
                            <h5>Сохранить обои</h5>
                            <small class="text-sm text-muted">Сохранить все обои с этой страницы</small>
                        </div>
                        <div>
                            <form role="form" class="border p-4" method="POST" action="{{ route('aaadminca.parser.save') }}">
                                @csrf
                                <input type="hidden" name="response_json" value="{{ json_encode($responseJson) }}" />
                                <div class="form-group">
                                    <label class="form-control-label">Категория</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title_ru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Сохранить все</button>
                                </div>
                            </form>
                        </div>
                    @endisset    
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @isset($responseJson)
                            @foreach ($responseJson['photos'] as $photo)
                                <div class="col-md-3 pb-2">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('form_save_picture_')"><img class="w-100" src="{{ $photo['src']['portrait'] }}" alt=""></a>
                                </div>
                            @endforeach
                        @endisset    
                    </div>
                </div>
            </div>
        </div>
    </section>    

@endsection
