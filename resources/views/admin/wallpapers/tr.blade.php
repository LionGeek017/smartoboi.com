<tr>
    <th>
        {{ $wallpaper->id }}
    </th>
    <td>
        <img width="80" class="rounded" src="{{ URL::asset(!empty($wallpaper->img) ? 'img/img-80x80/' . $wallpaper->img : 'img/default.png') }}" />
    </td>
    <td>
        <h6 class="mb-1 text-sm">{{ $wallpaper->title_ru }}</h6>
        <h6 class="mb-1 text-sm">{{ $wallpaper->title_en }}</h6>
    </td>
    <td>
        <a href="{{ route('aaadminca.wallpapers.index', ['category_id' => $wallpaper->category->id]) }}">{{ $wallpaper->category->title_ru }}</a>
    </td>
    <td>
        <small>{{ \Carbon\Carbon::now()->subSeconds($dateUnix - strtotime($wallpaper->created_at))->diffForHumans() }}</small>
        <br/>
        <small>{{ \Carbon\Carbon::now()->subSeconds(($dateUnix - strtotime($wallpaper->updated_at)))->diffForHumans() }}</small>
    </td>
    <td class="text-right">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a href="{{ route('aaadminca.wallpapers.edit', ['wallpaper' => $wallpaper->id]) }}" class="nav-link px-2" title="Редактировать"><i class="fas fa-pencil-alt"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link pl-2 pr-0" onclick="event.preventDefault(); document.getElementById('form_deaction_wallpaper_{{ $wallpaper->id }}').submit();" title="Удалить"><i class="fas fa-trash-alt"></i></a>
            </li>
        </ul>
        <form id="form_deaction_wallpaper_{{ $wallpaper->id }}" action="{{ route('aaadminca.wallpapers.destroy', ['wallpaper' => $wallpaper->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $wallpaper->id }}">
        </form>
    </td>
</tr>
<tr class="table-divider"></tr>
