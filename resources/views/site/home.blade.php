@extends('site.index')
@section('site_content')

<section class="slice slice-lg">
    <div class="container pt-5 swiper-js-container">
      <div class="swiper-container" data-swiper-effect="coverflow" data-swiper-centered-slides="true" data-swiper-initial-slide="2" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="4" data-swiper-sm-space-between="0">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-7.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-1.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-2.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-3.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-4.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-5.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-7.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="{{ route('wallpaper.index') }}" data-fancybox="apps">
              <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/mobile-1.jpg') }}" class="img-fluid rounded">
            </a>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="slice mt-5 bg-secondary">
    <div class="container">
        <div class="mb-5 text-center">
            <h2 class=" mt-0">Фото на обои: подборка новинок</h2>
            <div class="fluid-paragraph mt-3">
                <p class="lead lh-180">Здесь ты сможешь всегда найти самые классные обои на телефон, планшет и ноутбук</p>
            </div>
        </div>
        <div class="row">
            @if(count($wallpapers) > 0)
                @foreach ($wallpapers as $picture)
                    <div class="col-lg-2">
                        <div class="mb-5" data-animate-hover="1">
                        <div class="animate-this">
                            <a href="{{ route('wallpaper.view', ['category' => $picture->category->slug, 'id' => $picture->id]) }}">
                            <img alt="Image placeholder" class="img-fluid rounded shadow" src="{{ URL::asset('img/original/' . $picture->img) }}">
                            </a>
                        </div>
                        </div>
                    </div>
                @endforeach
            @else
                @include('layouts.no-information')
            @endif
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
            <div class="mt-5">
                <a href="{{ route('wallpaper.index') }}" class="btn btn-primary rounded-pill hover-translate-y-n3">
                    <span class="btn-inner--icon mr-2"><i class="fas fa-search-plus"></i></span>
                    <span>Показать больше обоев</span>
                </a>
            </div>
            </div>
        </div>

    </div>
  </section>

  <section class="slice slice-lg">
    <div class="container">
      <div class="mb-5 text-center">
        <h2 class="mt-4">Наши преимущества</h2>
        <div class="fluid-paragraph mt-3">
          <p class="lead lh-180">Почему именно на SmartOboi скачать картинки на рабочий стол лучше всего?</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card hover-shadow-lg hover-scale-110">
            <div class="card-body py-4">
              <div class="d-flex align-items-start">
                <div class="icon text-primary rounded-circle">
                    <i class="far fa-images"></i>
                </div>
                <div class="icon-text pl-4">
                  <h5 class="ma-0 ">Большой выбор</h5>
                  <p class="mb-0">База картинок постоянно обновляется. Мы регулярно пополняем категории обоев новыми тематическими фотографиями.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card hover-shadow-lg hover-scale-110">
            <div class="card-body py-4">
              <div class="d-flex align-items-start">
                <div class="icon text-primary rounded-circle">
                    <i class="fas fa-external-link-alt"></i>
                </div>
                <div class="icon-text pl-4">
                  <h5 class="ma-0 ">Высокое качество</h5>
                  <p class="mb-0">Все картинки для обоев отличаются исключительно высоким качеством. На сайте и в приложении ты найдешь любимые обои в HD формате.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card hover-shadow-lg hover-scale-110">
            <div class="card-body py-4">
              <div class="d-flex align-items-start">
                <div class="icon text-primary rounded-circle">
                    <i class="far fa-laugh-beam"></i>
                </div>
                <div class="icon-text pl-4">
                  <h5 class="ma-0 ">Удобный функционал</h5>
                  <p class="mb-0">Сайт максимально удобный в пользовании. Здесь нет ничего лишнего, а только удобная навигация и красивые картинки на обои.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card hover-shadow-lg hover-scale-110">
            <div class="card-body py-4">
              <div class="d-flex align-items-start">
                <div class="icon text-primary rounded-circle">
                    <i class="far fa-hand-peace"></i>
                </div>
                <div class="icon-text pl-4">
                  <h5 class="ma-0 ">Бесплатное пользование</h5>
                  <p class="mb-0">Все обои для планшета, телефона или ноутбука на нашем сайте абсолютно бесплатные. Скачивать обои можно без ограничений.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="slice slice-lg delimiter-top delimiter-bottom bg-secondary">
    <div class="container">
      <div class="row align-items-md-center">
        <div class="col-lg-3 col-6 mb-5 mb-lg-0">
          <div class="text-center mb-5 mb-lg-0">
            <div class="icon icon-lg text-danger">
                <i class="fas fa-heart"></i>
            </div>
            <span class="d-block mt-4 h3 text-danger">97%</span>
            <span class="d-block mt-2 h6">довольных пользователей</span>
          </div>
        </div>
        <div class="col-lg-3 col-6 mb-5 mb-lg-0">
          <div class="text-center mb-5 mb-lg-0">
            <div class="icon icon-lg text-primary">
                <i class="fas fa-rocket"></i>
            </div>
            <span class="d-block mt-4 h3 text-primary">100%</span>
            <span class="d-block mt-2 h6">картинок в HD качестве</span>
          </div>
        </div>
        <div class="col-lg-3 col-6 mb-5 mb-lg-0">
          <div class="text-center">
            <div class="icon icon-lg text-warning">
                <i class="fab fa-buffer"></i>
            </div>
            <span class="d-block mt-4 h3 text-warning">5000+</span>
            <span class="d-block mt-2 h6">обоев на все случаи жизни</span>
          </div>
        </div>
        <div class="col-lg-3 col-6 mb-5 mb-lg-0">
          <div class="text-center">
            <div class="icon icon-lg text-info">
                <i class="fas fa-undo"></i>
            </div>
            <span class="d-block mt-4 h2 text-info">24/7</span>
            <span class="d-block mt-2 h6">обновление ассортимента</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="slice slice-lg">
    <div class="container">
      <div class="row row-grid justify-content-around align-items-center">
        <div class="col-lg-5">
          <div class="">
            <h5 class=" h3">У нас есть картинки для заставки всех размеров</h5>
            <p class="lead my-4">На сайте и в приложении ты можешь найти фото обои для всех гаджетов. Скачать понравившуюся картинку можно всего в пару кликов!</p>
            <a href="{{ route('wallpaper.index') }}" class="link link-underline-info font-weight-bold">Смотреть обои</a>
          </div>
        </div>
        <div class="col-lg-6">
          <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/presentation-1.png') }}" class="img-fluid img-center">
        </div>
      </div>
    </div>
  </section>
  <!-- Features (v15) -->
  <section class="slice slice-lg">
    <div class="container">
      <div class="row row-grid justify-content-around align-items-center">
        <div class="col-lg-5 order-lg-2">
          <div class=" pr-lg-4">
            <h5 class=" h3">У нас есть удобное приложение для смартфонов</h5>
            <p class="lead my-4">SmartOboi – это очень удобно. Ты можешь пользоваться приложением на смартфоне и каждый день загружать новые яркие обои на заставку!</p>
            <a href="https://play.google.com/store/apps/details?id=smartoboi.smart_oboi" class="link link-underline-warning font-weight-bold">Скачать приложение</a>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <img alt="Image placeholder" src="{{ URL::asset('img/theme/light/presentation-2.png') }}" class="img-fluid img-center">
        </div>
      </div>
    </div>
  </section>

    <section class="slice slice-lg bg-secondary" id=sct-call-to-action>
        <a href="#sct-call-to-action" class="tongue tongue-up tongue-section-primary" data-scroll-to>
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="container">
            <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
                <h3 class="font-weight-400">Ты готов начать пользоваться крутым приложением SmartOboi? Тогда скачай красивые картинки на телефон уже сейчас!</h3>
                <div class="mt-5">
                    <a href="https://play.google.com/store/apps/details?id=smartoboi.smart_oboi" class="btn btn-primary rounded-pill hover-translate-y-n3">
                    Скачать приложение<span class="badge badge-pill badge-soft-warning badge-floating border-">Бесплатно</span>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="slice slice-lg">
        <div class="container">
          <div class="mb-5 text-center">
            <h3 class=" mt-4">Что о нас говорят пользователи</h3>
            <div class="fluid-paragraph mt-3">
              <p class="lead lh-180">Всегда читай отзывы других людей. Они уже скачали фото обои и готовы поделиться впечатлениями!</p>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-11">
              <div class="swiper-js-container row align-items-center">
                <div class="col-xl-12">
                  <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide p-4">
                        <!-- Testimonial entry 1 -->
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <img alt="Image placeholder" src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim('mail_1@mail.ru') ) ) }}?d=identicon" class="avatar  rounded-circle"/>
                              </div>
                              <div class="pl-3">
                                <h5 class="h6 mb-0">Михаил</h5>
                                <small class="d-block text-muted">Сайт</small>
                              </div>
                            </div>
                            <p class="mt-4 lh-180">Пользуюсь этим сайтом и очень доволен. Ничего лишнего, только годные обои. Часто обновляют категории, есть из чего выбрать. Картинки отличного качества. На днях скачал их приложение. Тоже все ок. Работает без проблем.</p>
                            <span class="static-rating static-rating-sm">
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide p-4">
                        <!-- Testimonial entry 2 -->
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <img alt="Image placeholder" src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim('mail_2@mail.ru') ) ) }}?d=identicon" class="avatar  rounded-circle"/>
                              </div>
                              <div class="pl-3">
                                <h5 class="h6 mb-0">Евгений</h5>
                                <small class="d-block text-muted">Сайт</small>
                              </div>
                            </div>
                            <p class="mt-4 lh-180">Мне нравится этот сайт. Тут много красивых картинок и нет навязчивой рекламы. Спокойно себе скачиваю обои и пользуюсь с удовольствием. Все ок, ничего лишнего. Сайт проверенный и для меня этого достаточно.</p>
                            <span class="static-rating static-rating-sm">
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide p-4">
                        <!-- Testimonial entry 3 -->
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <img alt="Image placeholder" src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim('mail_3@mail.ru') ) ) }}?d=identicon" class="avatar  rounded-circle"/>
                              </div>
                              <div class="pl-3">
                                <h5 class="h6 mb-0">Катя</h5>
                                <small class="d-block text-muted">Приложение</small>
                              </div>
                            </div>
                            <p class="mt-4 lh-180">Я на сайт не очень часто захожу. В основном пользуюсь приложением SmartOboi. В целом работает хорошо, картинки грузит быстро. Есть хороший выбор, часто обновляют галерею. Советую.</p>
                            <span class="static-rating static-rating-sm">
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                            </span>
                          </div>
                        </div>
                      </div>


                      <div class="swiper-slide p-4">
                        <!-- Testimonial entry 3 -->
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <img alt="Image placeholder" src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim('mail_4@mail.ru') ) ) }}?d=identicon" class="avatar  rounded-circle"/>
                              </div>
                              <div class="pl-3">
                                <h5 class="h6 mb-0">Egor</h5>
                                <small class="d-block text-muted">Приложение</small>
                              </div>
                            </div>
                            <p class="mt-4 lh-180">Этим сайтом я пользуюсь регулярно. Заскакиваю на минут десять, нахожу прикольные обои, скачиваю и пользуюсь потом неделю. Нравится мне часто менять заставки на рабочем столе. Не скучно хоть. Сайт норм. Мне подходит.</p>
                            <span class="static-rating static-rating-sm">
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide p-4">
                        <!-- Testimonial entry 3 -->
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <img alt="Image placeholder" src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim('mail_5@mail.ru') ) ) }}?d=identicon" class="avatar  rounded-circle"/>
                              </div>
                              <div class="pl-3">
                                <h5 class="h6 mb-0">Анна</h5>
                                <small class="d-block text-muted">Приложение</small>
                              </div>
                            </div>
                            <p class="mt-4 lh-180">Рекомендую этот сайт и приложение. Ребята не наглые, рекламу не суют везде, где только можно. Главное, что есть фото обои высокого качества и есть разнообразие. </p>
                            <span class="static-rating static-rating-sm">
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                              <i class="star fas fa-star voted"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination w-100 pt-4 d-flex align-items-center justify-content-center"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    @if (!collect($meta)->isEmpty())
    <section class="slice slice-lg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="seo-main hide">
                        {!! $meta->seo_main ?? ''  !!}
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-soft-info seo-main-open">Читать далее</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection

