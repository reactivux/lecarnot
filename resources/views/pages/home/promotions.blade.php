{{--  
  @if ($currentPromos)
      <section class="section section-promotions df__pt   secondary-bg position-relative">
          <div class="container">
              <div class="row wow fadeInUp position-relative">
                  <div class="col-12">
                      <div class="heading ">
                          <h3 class="subtitle subtitle-h3 ">Une variété alléchante de délices à déguster</h3>
                          <h2 class="title title-h2 title-h2-center">Promotions </h2>
                      </div>
                  </div>
                  <div class="col-12 proposition-2 ">
                      <div class="promotions-swiper overflow-hidden ">
                          @php
                              $i = 0;
                          @endphp
                          <div class="swiper-wrapper">
                              @foreach ($currentPromos as $index => $promo)
                                  @php
                                      $i++;
                                  @endphp
                                  <div class="swiper-slide">
                                      <div class="promos-item item-bg-color">

                                          <div class="item-col">

                                              <div class="promos-content">
                                                  <h3 class="title title-h3 ">
                                                      {{ $promo['name'] }}
                                                  </h3>
                                                  <div class="promos-text">
                                                      <p class="text color-black balck-color">
                                                          {{ $promo['description'] }}</p>
                                                  </div>
                                              </div>
                                              <div class="mt-3 promos-img text-right text-end "><img
                                                      src="{{ env('MIX_BASE_URL') . $promo['path_image'] }}"
                                                      class="lazy" alt="{{ $promo['name'] }}"></div>
                                              <div class="promos-btn">
                                                  <a href="{{ route('single-product', ['slug' => $promo['product']['slug']]) }}"
                                                      class="buttons buttons-themex buttons-themex-border buttons-md">Découvrir</a>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div> 
                          <div
                              class="desktop-show swiper-position-right swiper-button-prev swiper-button-prev-promotion">
                          </div>
                          <div
                              class="desktop-show swiper-position-right swiper-button-next swiper-button-next-promotion">
                          </div> 
                          <div class="mobile-show swiper-pagination swiper-pagination-promotion"></div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  @endif --}}




@if ($currentPromos)
    <section class="section section-promotions df__pt   secondary-bg position-relative">
        <div class="container">
            <div class="row wow fadeInUp position-relative">
                <div class="col-12">
                    <div class="heading ">
                        <h3 class="subtitle subtitle-h3 ">Des offres qui font fondre les prix… et les gourmands,  uniquement sur
                        les formats méga !</h3>
                        <h2 class="title title-h2 title-h2-center">Nos Promotions </h2>
                    </div>
                </div>
                <div class="col-12 proposition-2 ">
                    <div class="promotions-swiper overflow-hidden ">
                        @php
    $i = 0;
                        @endphp
                        <div class="swiper-wrapper">
                            @foreach ($currentPromos as $index => $promo)
                                                                                @php
        $i++;
        $class = $index % 2 === 0 ? 'pair' : 'impair';
                                                                                @endphp
                                                                                <div class="swiper-slide">
                                                                                    <div class="promos-item promos-item-{{ $class }} ">

                                                                                        <div class="item-col"
                                                                                            style="display: flex;justify-content: center;align-items: center;">
                                                                                            <div class=" promos-img text-right text-end "><img
                                                                                                    src="{{ env('MIX_BASE_URL') . $promo['path_image'] }}"
                                                                                                    class="lazy" alt="{{ $promo['name'] }}"></div>
                                                                                            <div class="promos-content">
                                                                                                <h3 class="title title-h3 ">
                                                                                                    {{ $promo['name'] }}
                                                                                                </h3>
                                                                                                <div class="promos-text">
                                                                                                    <p class="text color-black balck-color">
                                                                                                        {{ $promo['description'] }}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                            @endforeach
                        </div>
                        <div class="desktop-show swiper-position-right swiper-button-prev swiper-button-prev-promotion">
                        </div>
                        <div class="desktop-show swiper-position-right swiper-button-next swiper-button-next-promotion">
                        </div>
                        <div class="mobile-show swiper-pagination swiper-pagination-promotion"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
