<div wire:ignore>

    @if (count($random_cards) > 0)
        <div class="holder">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style custom-header-color">باقات متنوعة</h2>
                    <div class="carousel-arrows"></div>
                </div>

                <div
                    class="prd-grid product-listing data-to-show-5 data-to-show-md-3 data-to-show-sm-2 js-category-grid">

                    @forelse ($random_cards as $random_product_card)
                        <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-xxs">
                            <div class="prd-inside">
                                <div class="prd-img-area">
                                    <a href="{{ route('frontend.card', $random_product_card->slug) }}"
                                        class="prd-img image-container">

                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/cards/' . $random_product_card->firstMedia->file_name) }}"
                                            alt="بطائق الدفع" class="js-prd-img lazyload fade-up" />
                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{ asset('assets/cards/' . $random_product_card->lastMedia->file_name) }}"
                                            alt="بطائق الدفع" class="js-prd-img lazyload fade-up" />

                                        @if ($random_product_card->offer_price > 0)
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-sale">
                                                    <span>
                                                        {{ number_format(($random_product_card->offer_price / $random_product_card->price) * 100, 0, '.', ',') }}%-
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
                                            wire:click.prevent="addToWishList('{{ $random_product_card->id }}')"
                                            class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                            title="Add To Wishlist">
                                            <i class="icon-heart-stroke"></i>
                                        </a>
                                        <a href="#"
                                            class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                            title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>

                                    </div>
                                </div>
                                <div class="prd-info">
                                    <div class="prd-info-wrap">
                                        <div class="prd-info-top">
                                            <div class="prd-tag">
                                                <a
                                                    href="{{ route('frontend.card_category', $random_product_card->category->slug) }}">
                                                    {{ $random_product_card->category->name }}
                                                </a>
                                            </div>
                                        </div>

                                        <div class="prd-tag">
                                            <a
                                                href="{{ route('frontend.card_category', $random_product_card->category->slug) }}">
                                                {{ $random_product_card->category->name }}
                                            </a>
                                        </div>
                                        <h2 class="prd-title">
                                            <a
                                                href="{{ route('frontend.card', $random_product_card->slug) }}">{{ $random_product_card->name }}</a>
                                        </h2>
                                        <div class="prd-description">
                                            Quisque volutpat condimentum velit. Class aptent taciti
                                            sociosqu ad litora torquent per conubia nostra, per
                                            inceptos himenaeos. Nam nec ante sed lacinia.
                                        </div>
                                    </div>
                                    <div class="prd-hovers">
                                        <div class="prd-circle-labels">
                                            <div>
                                                <a href="#"
                                                    wire:click.prevent="addToWishList('{{ $random_product_card->id }}')"
                                                    class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                    title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                    href="#"
                                                    class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                    title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            </div>

                                        </div>
                                        <div class="prd-price">
                                            @if ($random_product_card->offer_price > 0)
                                                <div class="price-old">$ {{ $random_product_card->price }}</div>
                                                <div class="price-new custom-header-color">
                                                    $
                                                    {{ $random_product_card->price - $random_product_card->offer_price }}
                                                </div>
                                            @else
                                                <div class="price-new custom-header-color">$
                                                    {{ $random_product_card->price }}</div>
                                            @endif

                                        </div>
                                        <div class="prd-action">
                                            <div class="prd-action-left">
                                                <form action="#">
                                                    <button class="btn js-prd-addtocart rounded-pill"
                                                        wire:click.prevent="addToCart('{{ $random_product_card->id }}')"
                                                        data-product='{"name": "{{ $random_product_card->name }}", "path":"{{ asset('assets/cards/' . $random_product_card->lastMedia->file_name) }}", "url":"product.html", "aspect_ratio":0.778}'>
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
