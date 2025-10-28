 @if ($topCategories)
     <section class="section section-top-categories df__pt   secondary-bg   position-relative">
         <div class="container">
             <div class="row position-relative">
                 <div class="col-12">
                     <div class="heading ">
                         <h3 class="subtitle subtitle-h3 ">Une variété alléchante de délices à savourer</h3>
                         <h2 class="title title-h2 title-h2-center">Parcourez nos catégories</h2>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="categories-swiper  categories-list">
                         <div class="swiper-wrapper ">
                             @foreach ($topCategories as $categorie)
                                 <div class="swiper-slide">
                                     <a class="w-100" href="/produits/#{{ $categorie['name'] }}"
                                         title="{{ $categorie['name'] }}">
                                         <div
                                             class="w-100 category-item bg-color-{{ $loop->iteration % 2 == 0 ? 0 : 1 }}">
                                             <div
                                                 class="category-head d-flex justify-content-center align-items-center">
                                                 <div class="category-img">
                                                     @if (isset($categorie['bankimage']) && $categorie['bankimage'] !== null)
                                                         <x-lazyimage width="175" height="175" :src="env('MIX_BASE_URL') .
                                                             $categorie['bankimage']['thumbnail_image']"
                                                             :placeholder="env('MIX_BASE_URL') .
                                                                 $categorie['bankimage']['thumbnail_image']" :alt="$categorie['name'] .
                                                                 ' - Le Carnot  '" :class="''" />
                                                     @else
                                                         <x-lazyimage width="175" height="175" :src="env('MIX_APP_URL') . env('MIX_DEFAULT_IMAGE')"
                                                             :placeholder="env('MIX_APP_URL') . env('MIX_DEFAULT_IMAGE')" :alt="$categorie['name'] .
                                                                 ' - Le Carnot  '" :class="''" />
                                                     @endif
                                                 </div>
                                                 <div class="category-name">
                                                     <h3 class="title title-h3">{{ $categorie['name'] }}</h3>

                                                     <div class="category-total">
                                                         <span class="total">
                                                             @if (isset($categorie['total_products']))
                                                                 {{ $categorie['total_products'] }}
                                                             @elseif (isset($categorie['products_count']))
                                                                 {{ $categorie['products_count'] }}
                                                             @endif
                                                             produits
                                                         </span>
                                                     </div>
                                                 </div>

                                             </div>


                                         </div>
                                     </a>
                                 </div>
                             @endforeach
                         </div>

                         <!-- If we need navigation buttons -->
                         <div
                             class="desktop-show swiper-position-right swiper-button-prev swiper-button-prev-categories">
                         </div>
                         <div
                             class="desktop-show swiper-position-right swiper-button-next swiper-button-next-categories">
                         </div>
                         <!-- If we need pagination -->
                         <div class="mobile-show swiper-pagination swiper-pagination-categories"></div>

                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endif
