<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-control-label">Название RU</label>
            <input name="title_ru" class="form-control" type="text" placeholder="Название на русском" value="{{ old('title_ru') ?? $wallpaper->title_ru ?? '' }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-control-label">Название EN</label>
            <input name="title_en" class="form-control" type="text" placeholder="Название на английском" value="{{ old('title_en') ?? $wallpaper->title_en ?? '' }}">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-control-label">Категория</label>
            @isset($categories)
                <select class="form-control" data-toggle="select" name="category_id">
                    <option value="0">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $wallpaper->category->id ?? request()->category_id ?? '') == $category->id ? "selected" : "" }}
                            {{ $categories->where('category_id', $category->id)->count() > 0 ? 'disabled' : '' }}
                        >{{ $category->title_ru }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="text-danger">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            @else
                <p>
                    Для добавления обоев нужно <a class="link text-underline" href="{{ route('aaadminca.categories.create') }}">создать категорию</a>
                </p>
            @endisset
        </div>
    </div>
    <div class="col-lg-12">
        <label class="form-control-label">Картинка jpeg, png (максимум 5 mb)</label>
        <input type="file" name="img" id="img" class="custom-input-file @error('img') is-invalid @enderror" data-multiple-caption=""/>
        <label for="img">
            <i class="fa fa-upload"></i>
            <span>Загрузите качественную картинку</span>
        </label>
        @error('img')
        <small class="text-danger">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>

    <div class="col-12 mt-3">
        @isset($categories)
            <button type="submit" class="btn btn-sm btn-primary">Сохранить</button>
        @endisset
    </div>
</div>
