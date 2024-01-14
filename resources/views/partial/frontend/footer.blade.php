@php
    use App\Models\SiteSetting;
@endphp


<footer class="page-footer {{ !request()->routeIs('frontend.product') ? 'footer-style-1' : 'footer-style-6' }}">
    <div class="footer-top">
        <div class="container">
            <div class="row mt-0">

                {{-- <div class="col-lg-4 col-xl-3 last-mobile"> --}}

                <div class="col-lg-3 col-xl-3 last-mobile">


                    <div class="footer-block">
                        <div class="footer-logo">
                            <a href="{{ route('frontend.index') }}"><img class="lazyload fade-up"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                    data-srcset="{{ asset('frontend/images/games/logo-games.webp') }} 1x, {{ asset('frontend/images/games/logo-games2x.webp') }} 2x"
                                    alt="Logo" /></a>
                        </div>
                        <ul>

                            @if (array_key_exists('site_phone', $site_setting))
                                <li>
                                    تلفون: {{ $site_setting['site_phone'] }}
                                </li>
                            @endif

                            @if (array_key_exists('site_email1', $site_setting))
                                <li>
                                    ايميل:
                                    <a href="mailto:{{ $site_setting['site_email1'] }}">
                                        {{ $site_setting['site_email1'] }}
                                    </a>
                                </li>
                            @endif

                            @if (array_key_exists('site_fax', $site_setting))
                                <li>
                                    فاكس: {{ $site_setting['site_fax'] }}
                                </li>
                            @endif

                            @if (array_key_exists('site_po_box', $site_setting))
                                <li>
                                    الصندوق البريدي: {{ $site_setting['site_po_box'] }}
                                </li>
                            @endif

                            @if (array_key_exists('site_workTime', $site_setting))
                                <li>
                                    وقت العمل: {{ $site_setting['site_workTime'] }}
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-xl-3">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>حول سنترباي</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>

                                @foreach ($helps_menu as $menu)
                                    @if (count($menu->appearedChildren) == false)
                                        {{-- <li><a href="{{ url($menu->link) }}">{{ $menu->name_ar }}</a></li> --}}
                                        <li><a
                                                href="{{ $menu->link != null ? url($menu->link) : '#' }}">{{ $menu->name_ar }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xl-3">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>منصات التواصل الاجتماعية</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul class="social-list-circle-sm">

                                @if (array_key_exists('site_facebook', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_facebook'] }}">
                                            <i class="icon-facebook"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (array_key_exists('site_twitter', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_twitter'] }}">
                                            <i class="icon-twitter"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (array_key_exists('site_google', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_google'] }}">
                                            <i class="icon-google"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (array_key_exists('site_instagram', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_instagram'] }}">
                                            <i class="icon-instagram"></i>
                                        </a>
                                    </li>
                                @endif


                                @if (array_key_exists('site_fancy', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_fancy'] }}">
                                            <i class="icon-fancy"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (array_key_exists('site_vimeo', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_vimeo'] }}">
                                            <i class="icon-vimeo"></i>
                                        </a>
                                    </li>
                                @endif


                                @if (array_key_exists('site_youtube', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_youtube'] }}">
                                            <i class="icon-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (array_key_exists('site_pinterest', $site_setting))
                                    <li>
                                        <a href="{{ $site_setting['site_pinterest'] }}">
                                            <i class="icon-pinterest"></i>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>

                    @if (array_key_exists('site_mobile', $site_setting))
                        <div class="footer-block collapsed-mobile">
                            <div class="title">
                                <h4>اذا كان لديك سؤال</h4>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="collapsed-content">
                                <ul class="list-icon-lg">
                                    <li>
                                        <i class="icon-phone"></i><a
                                            href="tel_3A#">{{ $site_setting['site_mobile'] }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif


                </div>

                <div class="col-lg-3 col-xl-3">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>وسائل الدفع</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul class="payment-link">

                                @if (array_key_exists('site_pay_amazon', $site_setting) && $site_setting['site_pay_amazon'] != 0)
                                    <li><i class="icon-amazon-logo"></i></li>
                                @endif
                                @if (array_key_exists('site_pay_visa_card', $site_setting) && $site_setting['site_pay_visa_card'] != 0)
                                    <li><i class="icon-visa-pay-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_skrill', $site_setting) && $site_setting['site_pay_skrill'] != 0)
                                    <li><i class="icon-skrill-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_master_card', $site_setting) && $site_setting['site_pay_master_card'] != 0)
                                    <li><i class="icon-master-card-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_paypal', $site_setting) && $site_setting['site_pay_paypal'] != 0)
                                    <li><i class="icon-paypal-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_apple_pay', $site_setting) && $site_setting['site_pay_apple_pay'] != 0)
                                    <li><i class="icon-apple-pay-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_klarna', $site_setting) && $site_setting['site_pay_klarna'] != 0)
                                    <li><i class="icon-klarna-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_payoneer', $site_setting) && $site_setting['site_pay_payoneer'] != 0)
                                    <li><i class="icon-payoneer-logo"></i></li>
                                @endif

                                @if (array_key_exists('site_pay_bpay', $site_setting) && $site_setting['site_pay_bpay'] != 0)
                                    <li><i class="icon-bpay-logo"></i></li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-lg-4 col-xl-3">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>عن سنتر باي</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <p>Store - worldwide fashion store<br />since 2015.</p>
                            <p>We sell over 5000+ branded products</p>
                        </div>
                    </div>
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Vouchers & Discounts</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <div class="box-coupon">
                                <div class="box-coupon-icon">
                                    <i class="icon-scissors"></i>
                                </div>
                                <div class="box-coupon-text">
                                    <span class="custom-color">FOXIC</span> THEME
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom--bg">
        <div class="container">
            <div class="footer-copyright text-center">
                <a href="#">CenterPay</a> ©2020 copyright
            </div>
        </div>
    </div>
</footer>

<div class="footer-sticky">
    <div class="sticky-addcart js-stickyAddToCart closed">
        <div class="container">
            <div class="row">
                <div class="col-auto sticky-addcart_image">
                    <a href="product.html">
                        <img src="{{ asset('frontend/images/skins/fashion/products/product-01-1.webp') }}"
                            alt="" />
                    </a>
                </div>
                <div class="col col-sm-5 col-lg-4 col-xl-5 sticky-addcart_info">
                    <h1 class="sticky-addcart_title">Leather Pegged Pants</h1>
                    <div class="sticky-addcart_price">
                        <span class="sticky-addcart_price--actual">$180.00</span>
                        <span class="sticky-addcart_price--old">$210.00</span>
                    </div>
                </div>
                <div class="col-auto sticky-addcart_options prd-block prd-block_info--style1">
                    <div class="select-wrapper">
                        <select class="form-control form-control--sm">
                            <option value="">--Please choose an option--</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto sticky-addcart_actions">
                    <div class="prd-block_qty">
                        <span class="option-label">الكمية:</span>
                        <div class="qty qty-changer">
                            <button class="decrease"></button>
                            <input type="number" class="qty-input" value="1" data-min="1" data-max="1000" />
                            <button class="increase"></button>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <button class="btn js-prd-addtocart" data-fancybox data-src="#modalCheckOut">
                            اضافة للسلة
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-addedtocart js-popupAddToCart closed" data-close="90000">
        <div class="container">
            <div class="row">
                <div class="popup-addedtocart-close js-popupAddToCart-close">
                    <i class="icon-close"></i>
                </div>
                <div class="popup-addedtocart-cart js-open-drop" data-panel="#dropdnMinicart">
                    <i class="icon-basket"></i>
                </div>
                <div class="col-auto popup-addedtocart_logo">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{ asset('frontend/images/logo-white-sm.webp') }}" class="lazyload fade-up"
                        alt="" />
                </div>
                <div class="col popup-addedtocart_info">
                    <div class="row">
                        <a href="product.html" class="col-auto popup-addedtocart_image">
                            <span class="image-container w-100">
                                <img src="{{ asset('frontend/images/skins/fashion/products/product-01-1.webp') }}"
                                    alt="" />
                            </span>
                        </a>
                        <div class="col popup-addedtocart_text">
                            <a href="product.html" class="popup-addedtocart_title"></a>
                            <span class="popup-addedtocart_message">تمت إضافتها إلى
                                <a href="{{ route('frontend.cart') }}" class="underline">سلة التسوق</a></span>
                            <span class="popup-addedtocart_error_message"></span>
                        </div>
                    </div>
                </div>
                <div class="col-auto popup-addedtocart_actions">
                    <span>يمكنك الاستمرار</span>
                    <a href="{{ route('frontend.cart') }}" class="btn btn--grey btn--sm js-open-drop"
                        data-panel="#dropdnMinicart"><i class="icon-basket"></i><span>فحص سلة التسوق</span></a>
                    <span>او</span>
                    <a href="{{ route('frontend.checkout') }}" class="btn btn--invert btn--sm"><i
                            class="icon-envelope-1"></i><span>إكمال عملية الشراء</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-addcart popup-selectoptions js-popupSelectOptions closed" data-close="300000">
        <div class="container">
            <div class="row">
                <div class="popup-selectoptions-close js-popupSelectOptions-close">
                    <i class="icon-close"></i>
                </div>
                <div class="col-auto sticky-addcart_image sticky-addcart_image--zoom">
                    <a href="#" data-caption="">
                        <span class="image-container"><img src="#" alt="" /></span>
                    </a>
                </div>
                <div class="col col-sm-5 col-lg-4 col-xl-5 sticky-addcart_info">
                    <h1 class="sticky-addcart_title"><a href="#">&nbsp;</a></h1>
                    <div class="sticky-addcart_price">
                        <span class="sticky-addcart_price--actual"></span>
                        <span class="sticky-addcart_price--old"></span>
                    </div>
                    <div class="sticky-addcart_error_message">Error Message</div>
                </div>
                <div class="col-auto sticky-addcart_options prd-block prd-block_info--style1">
                    <div class="select-wrapper">
                        <select class="form-control form-control--sm sticky-addcart_options_select">
                            <option value="none">Select Option please..</option>
                        </select>
                        <div class="invalid-feedback">Can't be blank</div>
                    </div>
                </div>
                <div class="col-auto sticky-addcart_actions">
                    <div class="prd-block_qty">
                        <span class="option-label">الكمية:</span>
                        <div class="qty qty-changer">
                            <button class="decrease"></button>
                            <input type="number" class="qty-input" value="2" data-min="1"
                                data-max="10000" />
                            <button class="increase"></button>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <button class="btn js-prd-addtocart">اضافة للسلة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top">
        <i class="icon icon-angle-up"></i>
    </a>
    <div class="loader-horizontal js-loader-horizontal">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
        </div>
    </div>
</div>


{{-- notification footer --}}
{{-- <div class="footer-sticky">
    <div class="payment-notification-wrap js-pn" data-visible-time="3000" data-hidden-time="3000" data-delay="500"
        data-from="Aberdeen,Bakersfield,Birmingham,Cambridge,Youngstown"
        data-products='[{"productname":"Leather Pegged Pants", "productlink":"product.html","productimage":"assests/images/skins/fashion/products/product-01-1.webp"},{"productname":"Black Fabric Backpack", "productlink":"product.html","productimage":"assests/images/skins/fashion/products/product-28-1.webp"},{"productname":"Combined Chunky Sneakers", "productlink":"product.html","productimage":"assests/images/skins/fashion/products/product-23-1.webp"}]'>
        <div class="payment-notification payment-notification--squared">
            <div class="payment-notification-inside">
                <div class="payment-notification-container">
                    <!-- <div class="{{route('frontend.index')}}"> -->
                    <a href="#" class="payment-notification-image js-pn-link">
                        <img src="{{ asset('frontend/images/products/product-01.webp') }}" class="js-pn-image"
                            alt="" />
                    </a>
                    <div class="payment-notification-content-wrapper">
                        <div class="payment-notification-content">
                            <div class="payment-notification-text">Someone purchased</div>
                            <a href="product.html"
                                class="payment-notification-name js-pn-name js-pn-link">Applewatch</a>
                            <div class="payment-notification-bottom">
                                <div class="payment-notification-when">
                                    <span class="js-pn-time">32</span> min ago
                                </div>
                                <div class="payment-notification-from">
                                    from <span class="js-pn-from">Riverside</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-notification-close">
                    <i class="icon-close-bold"></i>
                </div>
                <div class="payment-notification-qw prd-hide-mobile js-prd-quickview"
                    data-src="ajax/ajax-quickview.html">
                    <i class="icon-eye"></i>
                </div>
            </div>
        </div>
    </div>
</div> --}}
