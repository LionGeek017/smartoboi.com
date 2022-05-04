<tr>
    <th>
        {{ $category->id }}
    </th>
    <td>
        <img width="80" class="rounded" src="{{ URL::asset(!empty($category->img) ? 'img/img-80x80/' . $category->img : 'img/default.png') }}" />
    </td>
    <td>
        <h6 class="mb-1 text-sm">{{ $category->title_ru }}</h6>
        <h6 class="mb-1 text-sm">{{ $category->title_uk }}</h6>
        <h6 class="mb-1 text-sm">{{ $category->title_en }}</h6>
    </td>
    <td>
        <h6 class="mb-1 text-sm">{{ $category->slug }}</h6>
    </td>
    <td>
        <p class="p-0 m-0" style="cursor: default;" data-toggle="tooltip" data-placement="top" title="{{ $category->meta_title_ru }} / {{ $category->meta_title_en }}"><i class="far fa-eye"></i> Title</p>
        <p class="p-0 m-0" style="cursor: default;" data-toggle="tooltip" data-placement="top" title="{{ $category->meta_description_ru }} / {{ $category->meta_description_en }}"><i class="far fa-eye"></i> Description</p>
        <p class="p-0 m-0" style="cursor: default;" data-toggle="tooltip" data-placement="top" title="{{ $category->meta_keywords_ru }} / {{ $category->meta_keywords_en }}"><i class="far fa-eye"></i> Keywords</p>
    </td>
    <td>
        @if($categories->where('category_id', $category->id)->count() == 0)
            <a href="{{ route('aaadminca.wallpapers.index', ['category_id' => $category->id]) }}">{{ $category->wallpaper->count() }} {{ RusEnding($category->wallpaper->count(), 'обоя', 'обои', 'обоев') }}</a>
        @endif
    </td>
    <td>
        <span class="badge badge-pill {{ $category->active ? 'badge-soft-success' : 'badge-soft-danger' }} text-small">{{ $category->active ? 'активная' : 'неактивная' }}</span>
    </td>
    <td>
        <small>{{ \Carbon\Carbon::now()->subSeconds($dateUnix - strtotime($category->created_at))->diffForHumans() }}</small>
        <br/>
        <small>{{ \Carbon\Carbon::now()->subSeconds(($dateUnix - strtotime($category->updated_at)))->diffForHumans() }}</small>
    </td>
    <td class="text-right">
{{--        <a href="{{ route('aaadminca.categories.edit', ['category' => $category->id]) }}" class="dropdown-item px-3"><i class="fas fa-pencil-alt"></i></a>--}}

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a href="{{ route('aaadminca.categories.edit', ['category' => $category->id]) }}" class="nav-link px-2" title="Редактировать"><i class="fas fa-pencil-alt"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link pl-2 pr-0" onclick="event.preventDefault(); document.getElementById('form_deaction_category_{{ $category->id }}').submit();" title="Удалить"><i class="fas fa-trash-alt"></i></a>
            </li>
        </ul>
        <form id="form_deaction_category_{{ $category->id }}" action="{{ route('aaadminca.categories.destroy', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $category->id }}">
        </form>
    </td>
</tr>
<tr class="table-divider"></tr>
