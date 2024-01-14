{{-- <div> --}}
<div class="dropdn-content minicart-drop" id="dropdnMinicart" wire:ignore.self>
    <div class="dropdn-content-block">
        <div class="dropdn-close">
            <span class="js-dropdn-close">اغلاق</span>
        </div>
        <div class="minicart-drop-content js-dropdn-content-scroll ">

            <!-- show cart item  -->
            @forelse (Cart::instance('default')->content() as $item)
                {{-- <div class="minicart-prd row" x-data="{ open_{{$item->model->id}}: true }" x-show="open_{{$item->model->id}}"> --}}
                <div>
                    <div class="minicart-prd row" x-data="{ open_{{ $item->model->id }}: true }" x-show="open_{{ $item->model->id }}">

                        <!-- image part  -->
                        <div class="minicart-prd-image image-hover-scale-circle col">
                            <a href="{{ route('frontend.card', $item->model->slug) }}"><img class="lazyload fade-up"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                    data-src="{{ asset('assets/cards/' . $item->model?->firstMedia->file_name) }}"
                                    alt="{{ $item->model->name }}" /></a>
                        </div>

                        <!-- content part part  -->
                        <div class="minicart-prd-info col">
                            <div class="minicart-prd-tag"><a
                                    href="{{ route('frontend.card_category', $item->model->category->slug) }}">{{ $item->model->category->name }}</a>
                            </div>
                            <h2 class="minicart-prd-name">
                                <a href="{{ route('frontend.card', $item->model->slug) }}">{{ $item->model->name }}
                                </a>
                            </h2>

                            <div class="minicart-prd-price prd-price pt-0 mt-1">
                                <span class="minicart-prd-qty-label">
                                    <small>
                                        سعر الحبة :
                                    </small>
                                </span>
                                @if ($item->model->offer_price > 0)
                                    <div class="price-old">$ {{ $item->model->price }}</div>
                                    <div class="price-new">$
                                        {{ $item->model->price - $item->model->offer_price }}</div>
                                @else
                                    <div class="price-new">$
                                        {{ $item->model->price }}</div>
                                @endif
                            </div>

                            <div class="mt-auto default_custom_price">
                                <div class="minicart-prd-qty d-flex align-items-center mt-0">
                                    <span class="minicart-prd-qty-label ">
                                        الكمية:
                                    </span>
                                    <span class="minicart-prd-qty-value">

                                        <div class="quantity-choice">
                                            <div class="qty qty-changer">
                                                <button class="decrease" style=""
                                                    wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
                                                </button>
                                                <div class="qty-input  px-3">{{ $item->qty }} </div>

                                                <button class="increase"
                                                    wire:click="increaseQuantity('{{ $item->rowId }}')">
                                                </button>
                                            </div>
                                        </div>

                                    </span>
                                </div>

                                <div class="minicart-prd-price prd-price pt-1 mt-0">

                                    <span class="minicart-prd-qty-label">
                                        <small>
                                            الاجمالي:
                                        </small>
                                    </span>
                                    @if ($item->model->offer_price > 0)
                                        <div class="price-old">$ {{ $item->model->price * $item->qty }} </div>

                                        <div class="price-new">$
                                            {{ $item->model->price * $item->qty - $item->model->offer_price * $item->qty }}
                                            {{-- build session here  --}}
                                            @php
                                                // if (session()->has('offer_discount1')) {
                                                //     $temp = session()->get('offer_discount1');
                                                //     $temp = $temp + $item->model->offer_price * $item->qty;
                                                //     session()->forget('offer_discount1');
                                                //     session()->put('offer_discount1', $temp);
                                                // } else {
                                                //     session()->put('offer_discount1', $item->model->offer_price * $item->qty);
                                                // }
                                            @endphp
                                        </div>
                                    @else
                                        <div class="price-new">$ {{ $item->model->price * $item->qty }} </div>
                                    @endif


                                </div>
                            </div>


                        </div>

                        <!-- Trash part  -->
                        <div class="minicart-prd-action">
                            <a wire:click.prevent="removeFromCart('{{ $item->rowId }}')"
                                x-on:click="open_{{ $item->model->id }} = ! open_{{ $item->model->id }}"
                                class="js-product-remove" title="حذف من السلة" style="cursor: pointer">
                                <i class="icon-recycle"></i>
                            </a>
                        </div>
                    </div>

                </div>


            @empty

                <!-- سلة الشراء فارغة  -->
                <div class="cart">
                    <div class="card-body bg-transparent">
                        <div class="minicart-empty-icon">
                            <i class="icon-shopping-bag" style="font-size: 100px;"></i>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262"
                                style="enable-background:new 0 0 306 262;" xml:space="preserve">
                                <path class="st0"
                                    d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-center">السلة فارغة</h2>
                </div>
            @endforelse


            <a href="#" class="minicart-drop-countdown mt-3">
                <div class="countdown-box-full">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="icon-gift icon--giftAnimate"></i>
                        </div>
                        <div class="col">
                            <div class="countdown-txt">
                                عند شرائك لبطاقتين او اكثر احصل على هدية
                            </div>
                            <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="minicart-drop-info d-none d-md-block">
                <div class="shop-feature-single row no-gutters align-items-center">
                    <div class="shop-feature-icon col-auto">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="shop-feature-text col">
                        <b>تسوق!</b> واصل التسوق واحصل على توصيل مجاني خلال فترة اسبوع
                    </div>
                </div>
            </div>
        </div>
        <div class="minicart-drop-fixed js-hide-empty">
            <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal="">
                <span></span>
            </div>
            <div
                class="minicart-drop-total  js-minicart-drop-total row no-gutters align-items-center minicart-prd-price prd-price mx-auto">
                <div class="minicart-drop-total-txt col-auto heading-font">
                    الاجمالي
                </div>
                <div class="minicart-drop-total-price col d-flex justify-content-end align-items-center"
                    data-header-cart-total="">

                    @if ($total_offer_price > 0)
                        {{-- <div class="price-old"><sub>${{ $total_original_price }}</sub> </div> --}}
                        <div class="price-old mx-2"><sub style="font-size: 14px">${{ Cart::total() }}</sub></div>

                        <div class="price-new">${{ $total_final_price }}</div>
                    @else
                        <div class="price-new">${{ $total_final_price }}</div>
                    @endif

                </div>

            </div>
            @if ($total_offer_price > 0)
                {{-- we made display none in the underline --}}
                <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center d-none">
                    <div class="minicart-drop-total-txt col-auto heading-font" style="font-size: 12px">
                        حافظت على :
                    </div>
                    <div class="minicart-drop-total-price col " style="font-size: 12px" data-header-cart-total="">
                        ${{ $total_offer_price }}
                    </div>

                </div>
                {{-- <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                    <div class="minicart-drop-total-txt col-auto heading-font">
                        السعر القديم :
                    </div>
                    <div class="minicart-drop-total-price col" data-header-cart-total="">
                        ${{ $total_original_price }}
                    </div>

                </div> --}}
            @endif




            <div class="minicart-drop-actions">
                <a href="{{ route('frontend.cart') }}" class="btn btn--md btn--grey"><i
                        class="icon-basket"></i><span>سلة
                        المشتريات</span></a>
                <a href="{{ route('frontend.checkout') }}" class="btn btn--md"><i class="icon-checkout"></i><span>عملية
                        الدفع</span></a>
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
{{-- </div> --}}
