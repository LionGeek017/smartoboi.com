<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Родительская категория</label>
            <select class="form-control" data-toggle="select" name="category_id">
                <option>Выбрать ...</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @isset($category) @if($category->category_id == $cat->id) selected @endif @endisset>{{ $cat->title_ru }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Название RU</label>
            <input name="title_ru" class="form-control @error('title_ru') is-invalid @enderror" type="text" placeholder="Название на русском" value="{{ old('title_ru') ?? $category->title_ru ?? '' }}">
            @error('title_ru')
            <small class="text-danger">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Название UK</label>
            <input name="title_uk" class="form-control @error('title_uk') is-invalid @enderror" type="text" placeholder="Название на украинском" value="{{ old('title_uk') ?? $category->title_uk ?? '' }}">
            @error('title_uk')
            <small class="text-danger">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Название EN</label>
            <input name="title_en" class="form-control @error('title_en') is-invalid @enderror" type="text" placeholder="Название на английском" value="{{ old('title_en') ?? $category->title_en ?? '' }}">
            @error('title_en')
            <small class="text-danger">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>

    <div class="col-lg-12">
        <label class="form-control-label">Заставка</label>
        <input type="file" name="img" id="img" class="custom-input-file @error('img') is-invalid @enderror" data-multiple-caption=""/>
        <label for="img">
            <i class="fa fa-upload"></i>
            <span>Загрузите заставку категории</span>
        </label>
        @error('img')
        <small class="text-danger">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>

    <div class="col-lg-4 pt-4">
        <div class="form-group">
            <label class="form-control-label">Краткое описание (несколько слов) RU</label>
            <textarea class="form-control" rows="3" resize="none" name="text_short_ru">{{ old('text_short_ru') ?? $category->text_short_ru ?? '' }}</textarea>
        </div>
    </div>
    
    <div class="col-lg-4 pt-4">
        <div class="form-group">
            <label class="form-control-label">Краткое описание (несколько слов) UK</label>
            <textarea class="form-control" rows="3" resize="none" name="text_short_uk">{{ old('text_short_uk') ?? $category->text_short_uk ?? '' }}</textarea>
        </div>
    </div>

    <div class="col-lg-4 pt-4">
        <label class="form-control-label">Краткое описание (несколько слов) EN</label>
        <textarea class="form-control" rows="3" resize="none" name="text_short_en">{{ old('text_short_en') ?? $category->text_short_en ?? '' }}</textarea>
    </div>

    <div class="col-lg-12 pt-2 pb-4">
        <label class="form-control-label">СЕО описание RU</label>
        <textarea class="textarea-editor" name="text_full_ru">{{ old('text_full_ru') ?? $category->text_full_ru ?? '' }}</textarea>
    </div>
    
    <div class="col-lg-12 pt-2 pb-4">
        <label class="form-control-label">СЕО описание UK</label>
        <textarea class="textarea-editor" name="text_full_uk">{{ old('text_full_uk') ?? $category->text_full_uk ?? '' }}</textarea>
    </div>

    <div class="col-lg-12">
        <label class="form-control-label">СЕО описание EN</label>
        <textarea class="textarea-editor" name="text_full_en">{{ old('text_full_en') ?? $category->text_full_en ?? '' }}</textarea>
    </div>

    <div class="col-lg-4 py-4">
        <div class="form-group">
            <label class="form-control-label">Meta title RU</label>
            <input name="meta_title_ru" class="form-control" type="text" placeholder="Название на русском" value="{{ old('meta_title_ru') ?? $category->meta_title_ru ?? '' }}">
        </div>
    </div>
    
    <div class="col-lg-4 py-4">
        <div class="form-group">
            <label class="form-control-label">Meta title UK</label>
            <input name="meta_title_uk" class="form-control" type="text" placeholder="Название на украинском" value="{{ old('meta_title_uk') ?? $category->meta_title_uk ?? '' }}">
        </div>
    </div>

    <div class="col-lg-4 py-4">
        <div class="form-group">
            <label class="form-control-label">Meta title EN</label>
            <input name="meta_title_en" class="form-control" type="text" placeholder="Название на английськом" value="{{ old('meta_title_en') ?? $category->meta_title_en ?? '' }}">
        </div>
    </div>

    <div class="col-lg-4 pb-4">
        <label class="form-control-label">Meta description RU</label>
        <textarea class="form-control" rows="3" resize="none" name="meta_description_ru">{{ old('meta_description_ru') ?? $category->meta_description_ru ?? '' }}</textarea>
    </div>
    
    <div class="col-lg-4 pb-4">
        <label class="form-control-label">Meta description UK</label>
        <textarea class="form-control" rows="3" resize="none" name="meta_description_uk">{{ old('meta_description_uk') ?? $category->meta_description_uk ?? '' }}</textarea>
    </div>

    <div class="col-lg-4 pb-4">
        <label class="form-control-label">Meta description EN</label>
        <textarea class="form-control" rows="3" resize="none" name="meta_description_en">{{ old('meta_description_en') ?? $category->meta_description_en ?? '' }}</textarea>
    </div>

    <div class="col-lg-4 pb-4">
        <label class="form-control-label">Meta keywords RU</label>
        <textarea class="form-control" rows="3" resize="none" name="meta_keywords_ru">{{ old('meta_keywords_ru') ?? $category->meta_keywords_ru ?? '' }}</textarea>
    </div>
    
    <div class="col-lg-4 pb-4">
        <label class="form-control-label">Meta keywords UK</label>
        <textarea class="form-control" rows="3" resize="none" name="meta_keywords_uk">{{ old('meta_keywords_uk') ?? $category->meta_keywords_uk ?? '' }}</textarea>
    </div>

    <div class="col-lg-4 pb-4">
        <label class="form-control-label">Meta keywords EN</label>
        <textarea class="form-control" rows="3" resize="none" name="meta_keywords_en">{{ old('meta_keywords_en') ?? $category->meta_keywords_en ?? '' }}</textarea>
    </div>

    <div class="col-lg-12">
        <div class="custom-control custom-checkbox mt-4">
            <input type="checkbox" class="custom-control-input" id="active" name="active"
                   value="1" {{ old('active', $station->active ?? true) ? 'checked' : '' }}>
            <label class="custom-control-label" for="active">Активная</label>
        </div>
    </div>

    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-sm btn-primary">Сохранить</button>
    </div>
</div>
