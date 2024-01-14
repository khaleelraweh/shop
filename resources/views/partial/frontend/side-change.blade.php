@forelse (Cart::instance('wishlist')->content() as $item)

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
                    {{-- <span
                        class="minicart-prd-qty-value">{{ $item->qty }}
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
                <a href="#" class="js-product-remove" data-line-number="1"><i class="icon-recycle"></i></a>
            </div>
        </div>

    </div>

@empty
