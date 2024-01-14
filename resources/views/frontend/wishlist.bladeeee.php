@extends('layouts.app')
@section('style')
    <style>
        .footer-shop-info,
        .footer-shop-info .row {
            background: #23232D !important;
        }

        .qty-changer button,
        .qty-changer input[type='number'],
        .qty-changer input[type='text'] {
            background-color: transparent;
        }

        .cart-table-prd-price .price-new {
            color: white !important;
        }

        .cart-table-prd-price .price-old {
            color: gray !important;
        }

        .btn.btn--grey {}
    </style>
@endsection
@section('content')
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                <li><span>مفضلاتي</span></li>
            </ul>
        </div>
    </div>

    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>استعراض المفضلة</h1>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="cart-table">
                        <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                            <div class="cart-table-prd-image text-center">
                                الصورة
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">الاسم</div>
                                <div class="cart-table-prd-qty">الكمية</div>
                                <div class="cart-table-prd-price">السعر</div>
                                <div class="cart-table-prd-action">&nbsp;</div>
                            </div>
                        </div>
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="product.html" class="prd-img"><img class="lazyload fade-up"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('frontend/images/temp/1.webp') }}" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <div class="cart-table-prd-price">
                                        <div class="price-old">$200.00</div>
                                        <div class="price-new">$180.00</div>
                                    </div>
                                    <h2 class="cart-table-prd-name"><a href="product.html">Leather Pegged
                                            Pants</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <button class="decrease"></button>
                                        <input type="text" class="qty-input" value="2" data-min="0"
                                            data-max="1000">
                                        <button class="increase"></button>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $360.00
                                </div>
                            </div>
                            <div class="cart-table-prd-action">
                                <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i
                                        class="icon-recycle"></i></a>
                            </div>
                        </div>
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="product.html" class="prd-img"><img class="lazyload fade-up"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('frontend/images/temp/8.webp') }}" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <div class="cart-table-prd-price">
                                        <div class="price-new">$220.00</div>
                                    </div>
                                    <h2 class="cart-table-prd-name"><a href="product.html">Cascade Casual
                                            Shirt</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <button class="decrease"></button>
                                        <input type="text" class="qty-input" value="2" data-min="0"
                                            data-max="1000">
                                        <button class="increase"></button>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $360.00
                                </div>
                            </div>
                            <div class="cart-table-prd-action">
                                <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i
                                        class="icon-recycle"></i></a>
                            </div>
                        </div>
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="product.html" class="prd-img"><img class="lazyload fade-up"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('frontend/images/temp/1.webp') }}" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <div class="cart-table-prd-price">
                                        <div class="price-new">$75.00</div>
                                    </div>
                                    <h2 class="cart-table-prd-name"><a href="product.html">Oversize Cotton
                                            Dress</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <button class="decrease"></button>
                                        <input type="text" class="qty-input" value="2" data-min="0"
                                            data-max="1000">
                                        <button class="increase"></button>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $360.00
                                </div>
                            </div>
                            <div class="cart-table-prd-action">
                                <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i
                                        class="icon-recycle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-1"><a href="#" class="btn btn--grey">افراغ المفضلة </a>
                    </div>
                    <div class="d-none d-lg-block">
                        <div class="mt-4"></div>
                        <div class="holder">
                            <div class="container">
                                <div class="title-wrap text-center">
                                    <h2 class="h1-style">قد يعجبك ايضا</h2>
                                    <div class="carousel-arrows carousel-arrows--center"></div>
                                </div>
                                <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
                                    data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/1.webp') }}"
                                                        alt="Midi Dress" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                    <div
                                                        class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                                                        <i class="icon-palette"><span class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span><span
                                                                class="path4"></span><span class="path5"></span><span
                                                                class="path6"></span><span class="path7"></span><span
                                                                class="path8"></span><span class="path9"></span><span
                                                                class="path10"></span></i>
                                                        <ul>
                                                            <li data-image="{{ asset('frontend/images/temp/1.webp') }}">
                                                                <a class="js-color-toggle" data-toggle="tooltip"
                                                                    data-placement="left" title="Color Name"><img
                                                                        src="{{ asset('frontend/images/temp/colorswatch/color-grey.webp') }}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li data-image="{{ asset('frontend/images/temp/1.webp') }}">
                                                                <a class="js-color-toggle" data-toggle="tooltip"
                                                                    data-placement="left" title="Color Name"><img
                                                                        src="{{ asset('frontend/images/temp/colorswatch/color-green.webp') }}"
                                                                        alt=""></a>
                                                            </li>
                                                            <li data-image="{{ asset('frontend/images/temp/1.webp') }}">
                                                                <a class="js-color-toggle" data-toggle="tooltip"
                                                                    data-placement="left" title="Color Name"><img
                                                                        src="{{ asset('frontend/images/temp/colorswatch/color-black.webp') }}"
                                                                        alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/1.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/1.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">Seiko</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Midi Dress</a>
                                                    </h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Midi Dress", "path":"{{ asset('frontend/images/temp/1.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>استعراض سريع</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Midi Dress", "path":"{{ asset('frontend/images/temp/1.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                        alt="Stand Collar Shirt" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                        <div class="label-sale"><span>-10% <span
                                                                    class="sale-text">Sale</span></span>
                                                            <div class="countdown-circle">
                                                                <div class="countdown js-countdown"
                                                                    data-countdown="2021/07/01"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/2.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/2.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Stand Collar
                                                            Shirt</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Stand Collar Shirt", "path":"{{ asset('frontend/images/temp/2.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>QUICK
                                                                    VIEW</span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-old">$ 200</div>
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Stand Collar Shirt", "path":"{{ asset('frontend/images/temp/2.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                        alt="Genuine Leather" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                        <div class="label-new"><span>جديد</span></div>
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/3.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/3.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/3.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/3.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Genuine
                                                            Leather</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Genuine Leather", "path":"{{ asset('frontend/images/temp/3.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>Add
                                                                To Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>QUICK
                                                                    VIEW</span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Genuine Leather", "path":"{{ asset('frontend/images/temp/3.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>Add
                                                                    To Cart</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/4.webp') }}"
                                                        alt="Pureboost Shoes" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/4.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/4.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/4.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/4.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/5.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/5.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Pureboost
                                                            Shoes</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Pureboost Shoes", "path":"{{ asset('frontend/images/temp/4.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>إستعراض سريع</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Pureboost Shoes", "path":"{{ asset('frontend/images/temp/4.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="product.html" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('frontend/images/temp/5.webp') }}"
                                                        alt="Multiple Pocket" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#"
                                                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                        href="#"
                                                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                    <a href="#"
                                                        class="circle-label-qview js-prd-quickview prd-hide-mobile"
                                                        data-src="ajax/ajax-quickview.html"><i
                                                            class="icon-eye"></i><span>استعراض سريع</span></a>
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{ asset('frontend/images/temp/5.webp') }}"
                                                        class="active"><a href="#" class="js-color-toggle"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/5.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/6.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/6.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="{{ asset('frontend/images/temp/7.webp') }}">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                            data-placement="right" title="Color Name"><img
                                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                data-src="{{ asset('frontend/images/temp/7.webp') }}"
                                                                class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i><i
                                                                class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i><i
                                                            class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">FOXic</a></div>
                                                    <h2 class="prd-title"><a href="product.html">Multiple
                                                            Pocket</a></h2>
                                                    <div class="prd-description">
                                                        Quisque volutpat condimentum velit. Class aptent taciti
                                                        sociosqu ad litora torquent per conubia nostra, per inceptos
                                                        himenaeos. Nam nec ante sed lacinia.
                                                    </div>
                                                    <div class="prd-action">
                                                        <form action="#">
                                                            <button class="btn js-prd-addtocart"
                                                                data-product='{"name": "Multiple Pocket", "path":"{{ asset('frontend/images/temp/5.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                للسلة
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                                title="Add To Wishlist"><i
                                                                    class="icon-heart-stroke"></i></a><a href="#"
                                                                class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                title="Remove From Wishlist"><i
                                                                    class="icon-heart-hover"></i></a></div>
                                                        <div class="prd-hide-mobile"><a href="#"
                                                                class="circle-label-qview js-prd-quickview"
                                                                data-src="ajax/ajax-quickview.html"><i
                                                                    class="icon-eye"></i><span>إستعراض سريع
                                                                </span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-new">$ 180</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#">
                                                                <button class="btn js-prd-addtocart"
                                                                    data-product='{"name": "Multiple Pocket", "path":"{{ asset('frontend/images/temp/5.webp') }}", "url":"product.html", "aspect_ratio":0.778}'>إضافة
                                                                    للسلة
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mt-3 mt-md-0">
                    <div class="cart-promo-banner">
                        <div class="cart-promo-banner-inside">
                            <div class="txt1">Save 50%</div>
                            <div class="txt2">فقط اليوم!</div>
                        </div>
                    </div>
                    <div class="card-total">
                        <div class="text-right">
                            <button class="btn btn--grey"><span>تحديث المفضلة</span><i class="icon-refresh"></i></button>
                        </div>
                        <div class="row d-flex">
                            <div class="col card-total-txt">الاجمالي</div>
                            <div class="col-auto card-total-price text-right">$ 475.00</div>
                        </div>
                        <button class="btn btn--full btn--lg"><span>دفع</span></button>

                    </div>
                    <div class="mt-2"></div>
                    <div class="panel-group  prd-block_accordion" id="productAccordion">
                        <div class=" panel panel-default">
                            <div class="panel-heading active">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">خيارات
                                        الشحن
                                    </a>
                                    <span class="toggle-arrow"><span></span><span></span></span>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <label>الدولة:</label>
                                    <div class="form-group select-wrapper select-wrapper-sm">
                                        <select class="form-control form-control--sm">
                                            <option value="United States">الولايات المتحدة</option>
                                            <option value="Canada">كنداء</option>
                                            <option value="China">China</option>
                                            <option value="India">India</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Mexico">Mexico</option>
                                        </select>
                                    </div>
                                    <label>المقاطعة:</label>
                                    <div class="form-group select-wrapper select-wrapper-sm">
                                        <select class="form-control form-control--sm">
                                            <option value="AL">الباما</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                        </select>
                                    </div>
                                    <label>Zip/Postal code:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control--sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">كود الخصم
                                    </a>
                                    <span class="toggle-arrow"><span></span><span></span></span>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse ">
                                <div class="panel-body">
                                    <p>حصلت على الرمز الترويجي؟ ثم تكون على بعد بضعة خطوات وحروف مجمعة بشكل عشوائي
                                        من التوفير الرائع!</p>
                                    <div class="form-inline mt-2">
                                        <input type="text" class="form-control form-control--sm"
                                            placeholder="Promotion/Discount Code">
                                        <button type="submit" class="btn">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">ملاحضات
                                        للبائع
                                    </a>
                                    <span class="toggle-arrow"><span></span><span></span></span>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse ">
                                <div class="panel-body">
                                    <textarea class="form-control form-control--sm textarea--height-100" placeholder="Text here"></textarea>
                                    <div class="card-text-info mt-2">
                                        <p>* تشمل التوفيرات العروض الترويجية، والكوبونات، وrueBUCKS، والشحن (إذا
                                            ملائم).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="holder">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-trolley"></i>
                        </div>
                        <div class="text">
                            <h4>تسليم سريع للغاية</h4>
                            <p>
                                سيتم تسليم طلبك خلال 3-5 أيام عمل بعد كل ذلك
                                العناصر الخاصة بك متاحة
                            </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-currency"></i>
                        </div>
                        <div class="text">
                            <h4>افضل سعر</h4>
                            <p>
                                سنقوم بمطابقة أسعار المنتجات الرئيسية عبر الإنترنت والمحلية
                                المنافسين على الفور
                            </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-diplom"></i>
                        </div>
                        <div class="text">
                            <h4>يضمن</h4>
                            <p>
                                إذا كان العنصر الذي تريده متاحًا، فيمكننا معالجة عملية الإرجاع
                                ووضع طلب جديد
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
