<div wire:ignore>
    <div class="holder">
        <div class="container">

            <div class="title-wrap text-center">
                <h2 class="h1-style">قد يعجبك ايضا </h2>
                <div class="carousel-arrows carousel-arrows--center"></div>
            </div>

            <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
                data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>

                @forelse ($related_cards as $related_card)
                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">

                                {{-- image area --}}
                                <a href="{{ route('frontend.card', $related_card->slug) }}"
                                    class="prd-img image-hover-scale image-container">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/cards/' . $related_card->firstMedia->file_name) }}"
                                        alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">

                                    {{-- rounded circle discount --}}
                                    @if ($related_card->offer_price > 0)
                                        <div class="foxic-loader"></div>
                                        <div class="prd-big-circle-labels">
                                            <div class="label-sale">
                                                <span>
                                                    {{ number_format(($related_card->offer_price / $related_card->price) * 100, 0, '.', ',') }}%-
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

                                {{-- top control area  --}}
                                <div class="prd-circle-labels">
                                    <a href="#" wire:click.prevent="addToWishList('{{ $related_card->id }}')"
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

                                {{-- Link style switcher  --}}
                                <ul class="list-options color-swatch">

                                    @foreach ($related_card->photos as $photo)
                                        <li data-image="{{ asset('assets/cards/' . $photo->file_name) }}"
                                            class="{{ $loop->first ? 'active' : null }}">
                                            <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                data-placement="right" title="{{ $related_card->name }}">
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/cards/' . $photo->file_name) }}"
                                                    class="lazyload fade-up" alt="{{ $related_card->name }}">
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                            {{-- button info --}}
                            <div class="prd-info">
                                <div class="prd-info-wrap">


                                    <div class="prd-tag">
                                        <a href="{{ route('frontend.card_category', $related_card->category->slug) }}">
                                            {{ $related_card->category->name }}
                                        </a>
                                    </div>

                                    <h2 class="prd-title">
                                        <a href="{{ route('frontend.card', $related_card->slug) }}">
                                            {{ $related_card->name }}
                                        </a>
                                    </h2>

                                    <div class="prd-action">
                                        <form action="#">
                                            <button class="btn js-prd-addtocart rounded-pill"
                                                wire:click.prevent="addToCart('{{ $related_card->id }}')"
                                                data-product='{"name": "Midi Dress with Belt", "path":"{{ asset('
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                												frontend/assests/images/skins/fashion/cards/product-06-1.webp') }}", "url"
												:"product.html", "aspect_ratio" :0.778}'>
                                                اضافة للسلة
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="prd-hovers">
                                    <div class="prd-circle-labels">
                                        <div><a href="#"
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

                                    </div>

                                    <div class="prd-price">
                                        @if ($related_card->offer_price > 0)
                                            <div class="price-old">$ {{ $related_card->price }}</div>
                                            <div class="price-new">$
                                                {{ $related_card->price - $related_card->offer_price }}</div>
                                        @else
                                            <div class="price-new">$
                                                {{ $related_card->price }}</div>
                                        @endif

                                    </div>

                                    <div class="prd-action">
                                        <div class="prd-action-left">
                                            <form action="#">
                                                <button class="btn js-prd-addtocart rounded-pill"
                                                    wire:click.prevent="addToCart('{{ $related_card->id }}')"
                                                    data-product='{"name": "{{ $related_card->name }}", "path":"{{ asset('assets/cards/' . $related_card->firstMedia->file_name) }}", "url":"{{ route('frontend.card', $related_card->slug) }}", "aspect_ratio":0.778}'>
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
                    There is no Product related to this Product
                @endforelse
            </div>
        </div>
    </div>
</div>
