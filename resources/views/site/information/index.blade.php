@extends('site.index')
@section('site_content')

<section class="slice">
    <div class="container">
        <div class="text-left">
            <h2 class="h4 m-0">{{ $information->name }}</h2>
            <p class="text-sm">{{ $information->short_text }}</p>
        </div>

        <div class="mt-3">
            {!! str_ireplace('{name}', $name, $information->full_text) !!}
        </div>

    </div>
</section>

@endsection
