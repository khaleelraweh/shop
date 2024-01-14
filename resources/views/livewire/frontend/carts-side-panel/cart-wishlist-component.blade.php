<div wire:ignore.self>
    <div class="dropdn-content minicart-drop" id="dropdnMiniwishlist">
        <div class="dropdn-content-block">
            <div class="dropdn-close">
                <span class="js-dropdn-close">اغلاق</span>
            </div>
            <div class="minicart-drop-content js-dropdn-content-scroll">

                <!-- show cart item  -->
                @forelse ($wishlists as $item)
                    <div>
                        <div class="minicart-prd row">
                            {{-- image part  --}}
                            <div class="minicart-prd-image image-hover-scale-circle col">
                                <a href="{{ route('frontend.card', $item->model?->slug) }}"><img class="lazyload fade-up"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/cards/' . $item->model?->firstMedia->file_name) }}"
                                        alt="{{ $item->model?->name }}" /></a>
                            </div>
                            {{-- content part --}}
                            <div class="minicart-prd-info col">
                                <div class="minicart-prd-tag"><a
                                        href="{{ route('frontend.card_category', $item->model?->category?->slug) }}">{{ $item->model?->category?->name }}</a>
                                </div>
                                <h2 class="minicart-prd-name">
                                    <a href="{{ route('frontend.card', $item->model?->slug) }}">{{ $item->model?->name }}
                                    </a>
                                </h2>
                                <div class="minicart-prd-qty">
                                    <span class="minicart-prd-qty-label">الكمية:</span>
                                    {{-- <span class="minicart-prd-qty-value">{{ $item->qty }}
                                    </span> --}}
                                    <div class="quantity">
                                        <strong> الكمية </strong>
                                        <div class="quantity-choice">
                                            <div class="qty qty-changer">
                                                <button class="decrease" style="background: transparent;"
                                                    wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
                                                </button>

                                                <input type="text" class="qty-input" style="background: transparent"
                                                    value="{{ $item->qty }} " data-min="0" data-max="1000">

                                                <button style="background: transparent" class="increase"
                                                    wire:click="increaseQuantity('{{ $item->rowId }}')">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="minicart-prd-price prd-price">
                                    <div class="price-old">$200.00</div>
                                    <div class="price-new">{{ $item->model?->price * $item?->qty }}</div>
                                </div>
                            </div>
                            {{-- trash part --}}
                            <div class="minicart-prd-action">
                                <a href="#" class="js-product-remove" data-line-number="1"><i
                                        class="icon-recycle"></i></a>
                            </div>
                        </div>

                    </div>

                @empty
                    <!-- سلة الشراء فارغة  -->
                    <div class="cart">
                        <div class="card-body bg-transparent">
                            <div class="minicart-empty-icon">
                                <i class="icon-shopping-bag" style="font-size: 100px;"></i>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;"
                                    xml:space="preserve">
                                    <path class="st0"
                                        d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-center">السلة فارغة</h2>
                    </div>
                @endforelse

            </div>

            <div class="minicart-drop-fixed js-hide-empty">
                <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal="">
                    <span></span>
                </div>
                {{-- <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                    <div class="minicart-drop-total-txt col-auto heading-font">
                        الاجمالي
                    </div>
                    <div class="minicart-drop-total-price col" data-header-cart-total="">
                        {{ Cart::total() }}
                    </div>
                </div> --}}
                <div class="minicart-drop-actions">
                    <a href="{{ route('frontend.wishlist') }}" class="btn btn--md btn--grey">
                        <i class="icon-heart-stroke"></i>
                        <span>
                            استعراض المفضلة
                        </span>
                    </a>

                    {{-- <a href="{{ route('frontend.checkout') }}" class="btn btn--md">
                        <i class="icon-basket"></i>
                        <span>
                            نقل الكل للسلة
                        </span>
                    </a> --}}
                </div>

                <ul class="payment-link mb-2">
                    <li><i class="icon-amazon-logo"></i></li>
                    <li><i class="icon-visa-pay-logo"></i></li>
                    <li><i class="icon-skrill-logo"></i></li>
                    <li><i class="icon-klarna-logo"></i></li>
                    <li><i class="icon-paypal-logo"></i></li>
                    <li><i class="icon-apple-pay-logo"></i></li>
                </ul>
            </div>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>
</div>
