<div wire:ignore>
    @if (count($featured_cards) > 0)

        <div class="holder">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style custom-header-color">الباقات الجديدة</h2>
                    <div class="carousel-arrows"></div>
                </div>
                <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
                    data-slick='{"slidesToShow": 5, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>

                    @forelse ($featured_cards as $featured_card)
                        <div class=" prd prd--style2 prd-labels--max prd-labels-shadow ">
                            <div class="prd-inside">
                                <div class="prd-img-area">
                                    <a href="{{ route('frontend.card', $featured_card->slug) }}"
                                        class="prd-img image-container">
                                        {{-- first image  --}}
                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/cards/' . $featured_card->firstMedia->file_name) }}"
                                            alt="بطائق الدفع" class="js-prd-img lazyload fade-up" />
                                        {{-- second image in the same product card the other side  --}}
                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/cards/' . $featured_card->lastMedia->file_name) }}"
                                            alt="بطائق الدفع" class="js-prd-img lazyload fade-up" />

                                        {{-- rounded circle discount --}}
                                        @if ($featured_card->offer_price > 0)
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-sale">
                                                    <span>
                                                        {{ number_format(($featured_card->offer_price / $featured_card->price) * 100, 0, '.', ',') }}%-
                                                        {{-- <span class="sale-text">
                                                        <small>تخفيض</small>
                                                    </span> --}}
                                                    </span>
                                                    <div class="countdown-circle">
                                                        <div class="countdown js-countdown" data-countdown="2021/07/01">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </a>

                                    <div class="prd-circle-labels">
                                        <a href="#"
                                            wire:click.prevent="store( 'wishlist' , {{ $featured_card->id }} , '{{ $featured_card->name }}' , 1 , {{ $featured_card->price }})"
                                            class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                            title="Add To Wishlist">
                                            <i class="icon-heart-stroke"></i>
                                        </a>
                                        <a href="#"
                                            class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                            title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                        {{-- <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                        data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>استعراض
                                            سريع</span></a> --}}
                                    </div>
                                </div>
                                <div class="prd-info">
                                    <div class="prd-info-wrap">

                                        <div class="prd-info-top">
                                            <div class="prd-tag">
                                                <a
                                                    href="{{ route('frontend.card_category', $featured_card->category->slug) }}">
                                                    {{ $featured_card->category->name }}
                                                </a>
                                            </div>
                                        </div>

                                        {{-- <div class="prd-rating justify-content-center">
                                        <i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
                                            class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
                                            class="icon-star-fill fill"></i>
                                    </div> --}}

                                        <div class="prd-tag">
                                            <a
                                                href="{{ route('frontend.card_category', $featured_card->category->slug) }}">
                                                {{ $featured_card->category->name }}
                                            </a>
                                        </div>

                                        <h2 class="prd-title">
                                            <a href="{{ route('frontend.card', $featured_card->slug) }}">
                                                {{ $featured_card->name }}
                                            </a>
                                        </h2>


                                    </div>
                                    <div class="prd-hovers">
                                        <div class="prd-circle-labels">
                                            <div>
                                                <a href="#"
                                                    wire:click.prevent="store( 'wishlist' , {{ $featured_card->id }} , '{{ $featured_card->name }}' , 1 , {{ $featured_card->price }})"
                                                    class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                    title="Add To Wishlist">
                                                    <i class="icon-heart-stroke"></i>
                                                </a>
                                                <a href="#"
                                                    class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                    title="Remove From Wishlist">
                                                    <i class="icon-heart-hover"></i>
                                                </a>
                                            </div>

                                            {{-- <div>
                                            <a href="#"
                                                class="circle-label-qview prd-hide-mobile js-prd-quickview"
                                                data-src="ajax/ajax-quickview.html"><i
                                                    class="icon-eye"></i><span>استعراض سريع</span></a>
                                        </div> --}}
                                        </div>

                                        <div class="prd-price">
                                            @if ($featured_card->offer_price > 0)
                                                <div class="price-old">$ {{ $featured_card->price }}</div>
                                                <div class="price-new custom-header-color">$
                                                    {{ $featured_card->price - $featured_card->offer_price }}</div>
                                            @else
                                                <div class="price-new custom-header-color">$
                                                    {{ $featured_card->price }}</div>
                                            @endif

                                        </div>

                                        <div class="prd-action">
                                            <div class="prd-action-left">
                                                <form action="#">
                                                    <button class="btn js-prd-addtocart rounded-pill"
                                                        wire:click.prevent="store( 'default' , {{ $featured_card->id }} , '{{ $featured_card->name }}' , 1 , {{ $featured_card->price }})"
                                                        data-product='{"name": "{{ $featured_card->name }}", "path":"{{ asset('assets/cards/' . $featured_card->firstMedia->file_name) }}", "url":"{{ route('frontend.card', $featured_card->slug) }}", "aspect_ratio":0.778}'>
                                                        اضافة للسلة
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>

    @endif



</div>
