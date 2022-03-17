<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light bg-white shadow" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="{{ route('home') }}">
            <!-- <img alt="Image placeholder" src="" id="navbar-logo" style="height: 50px;"> -->
            SmartOboi
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('wallpaper.index') }}">Обои</a>
                </li>
                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Блог</a>
                    {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($blogCategories as $blogCategory)
                                <li class="nav-item" data-toggle="hover">
                                    <a href="{{ route('category.index', ['category_slug' => $blogCategory->slug]) }}" class="list-group-item list-group-item-action" role="button">
                                        <div class="media d-flex align-items-center">
                                            <img class="img-fluid rounded" width="90" src="{{ URL::asset($blogCategory->img ?? 'img/default.jpg') }}" />
                                            <!-- Media body -->
                                            <div class="media-body ml-3">
                                                <h6 class="mb-1">{{ $blogCategory->name }}</h6>
                                                <p class="mb-0">{{ $blogCategory->description }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </li>
            </ul>
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item mr-2">
                    <a href="" class="nav-link d-lg-none">Добавить фото</a>
                    <a href="" class="btn btn-sm btn-secondary btn-icon rounded-pill d-none d-lg-inline-flex" data-toggle="tooltip" data-placement="left">
                      <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                      <span class="btn-inner--text">Добавить фото</span>
                    </a>
                </li>
                <li class="nav-item mr-0">
                  <a href="" class="nav-link d-lg-none">Оставить заявку</a>
                  <a href="" class="btn btn-sm btn-secondary btn-icon rounded-pill d-none d-lg-inline-flex" data-toggle="tooltip" data-placement="left">
                    <span class="btn-inner--icon"><i class="fas fa-cart-plus"></i></span>
                    <span class="btn-inner--text">Оставить заявку</span>
                  </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
