@extends('layouts.app')



@section('content')
    <div class="container">


        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumb pref">
                    <li>
                        <a href="{{ route('frontend.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>

                    <li>
                        <a href="{{ route('frontend.card_category', $card->category->slug) }}">
                            {{ $card->category->name }}
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>

                    <li>
                        <a href="{{ route('frontend.card', $card->slug) }}" class="active">
                            {{ $card->name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- review and card show image and detail part --}}
        <div class="holder">
            <div class="container js-prd-gallery" id="prdGallery">
                <div class="row prd-block prd-block-under prd-block--prv-bottom">

                    {{-- rating and  review part --}}
                    <div class="col">
                        <div class="js-prd-d-holder">
                            <div class="prd-block_title-wrap">

                                {{-- <div class="prd-block_reviews" data-toggle="tooltip" data-placement="top"
                                    title="Scroll To Reviews">

                                    @if (round($card->reviews_avg_rating) != '')
                                        @for ($i = 0; $i < 5; $i++)
                                            <i
                                                class="{{ $card->reviews_avg_rating <= $i ? 'icon-star' : 'icon-star-fill fill' }}"></i>
                                        @endfor
                                    @else
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    @endif
                                    <span class="reviews-link">
                                        <a href="#" class="js-reviews-link">
                                            (17 reviews)
                                        </a>
                                    </span>
                                </div> --}}

                            </div>
                        </div>
                    </div>



                </div>
                <div class="row prd-block prd-block--prv-bottom">
                    {{-- slider show for card product  --}}
                    <div class="col-md-5 col-lg-5 col-xl-5 aside--sticky js-sticky-collision">
                        <div class="aside-content">
                            <div class="mb-2 js-prd-m-holder"></div>

                            {{-- This part is for main product image of the product  --}}
                            <div class="prd-block_main-image">
                                <div class="prd-block_main-image-holder" id="prdMainImage">
                                    {{-- main images in the frame  --}}
                                    <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

                                        @foreach ($card->photos as $photo)
                                            <div data-value="Beige">
                                                <span class="prd-img">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('assets/cards/' . $photo->file_name) }}"
                                                        class="lazyload fade-up elzoom" alt="{{ $card->name }}"
                                                        data-zoom-image="{{ asset('assets/cards/' . $photo->file_name) }}" />
                                                </span>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>

                            {{-- images link views --}}
                            <div class="product-previews-wrapper">

                                <div class="product-previews-carousel js-product-previews-carousel">

                                    @foreach ($card->photos as $photo)
                                        <a href="#" data-value="Beige">
                                            <span class="prd-img">
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/cards/' . $photo->file_name) }}"
                                                    class="lazyload fade-up" alt="" />
                                            </span>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- description part  --}}
                    <div class="col-md-7 col-lg-7 col-xl-7 mt-1 mt-md-0">
                        <div class="prd-block_info prd-block_info--style1"
                            data-prd-handle="/cards/copy-of-suede-leather-mini-skirt">
                            <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                                <div class="prd-block_price prd-block_price--style2">
                                    <div class="prd-block_price--actual">${{ $card->price - $card->offer_price }}</div>
                                    <div class="prd-block_price-old-wrap">
                                        <span class="prd-block_price--old">${{ $card->price }}</span>
                                        <span class="prd-block_price--text">حافظت على : ${{ $card->offer_price }}
                                            (
                                            {{ number_format(($card->offer_price / $card->price) * 100, 0, '.', ',') }}%
                                            )</span>
                                    </div>
                                </div>
                                <div class="prd-block_viewed-wrap d-none d-md-flex">
                                    <div class="prd-block_viewed">
                                        <i class="icon-time"></i>
                                        <span>تمت مشاهدة هذا المنتج 13 مرة خلال الساعة الماضية</span>
                                    </div>
                                </div>
                            </div>
                            <div class="prd-block_description prd-block_info_item ">
                                <h3>وصف قصير</h3>
                                <p>
                                    {!! $card->description !!}
                                </p>
                                <div class="mt-1"></div>
                                {{-- نصائح الاستخدام --}}
                                {{-- <div class="row vert-margin-less">
                                    <div class="col-sm">
                                        <ul class="list-marker">
                                            <li>100% Polyester</li>
                                            <li>Lining:100% Viscose</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm">
                                        <ul class="list-marker">
                                            <li>Do not dry clean</li>
                                            <li>Only non-chlorine</li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="prd-progress prd-block_info_item" data-left-in-stock="">
                                <div class="prd-progress-text">
                                    اسرع اكثر ! تبقى <span class="prd-progress-text-left js-stock-left">26</span> في المخزون
                                </div>
                                <div class="prd-progress-text-null"></div>
                                <div class="prd-progress-bar-wrap progress">
                                    <div class="prd-progress-bar progress-bar active"
                                        data-stock="50, 10, 30, 25, 1000, 15000" style="width: 53%;"></div>
                                </div>
                            </div> --}}
                            {{-- <div class="prd-block_countdown js-countdown-wrap prd-block_info_item countdown-init">
                                <div class="countdown-box-full-text w-md">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-auto text-center">
                                            <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                        </div>
                                        <div class="col">
                                            <div class="countdown-txt"> TIME IS RUNNING OUT!</div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="prd-block_order-info prd-block_info_item " data-order-time="" data-locale="en">
                                <i class="icon-box-2"></i>
                                <div>Order in the next <span class="prd-block_order-info-time countdownCircleTimer"
                                        data-time="8:00:00, 15:30:00, 23:59:59"><span><span>04</span>:</span><span><span>46</span>:</span><span><span>24</span></span></span>
                                    to get it by <span data-date="">Tuesday, September 08, 2020</span></div>
                            </div> --}}
                            {{-- <div class="prd-block_info_item prd-block_info-when-arrives d-none" data-when-arrives>
                                <div class="prd-block_links prd-block_links m-0 d-inline-flex">
                                    <i class="icon-email-1"></i>
                                    <div><a href="#" data-follow-up="" data-name="Oversize Cotton Dress"
                                            class="prd-in-stock" data-src="#whenArrives">Inform me when the item
                                            arrives</a></div>
                                </div>
                            </div> --}}
                            <div class="prd-block_info-box prd-block_info_item bg-transparent">
                                <div class="two-column">
                                    <p>التوفر :
                                        <span class="prd-in-stock" data-stock-status="">هذه البطاقة متوفرة</span>
                                    </p>
                                    <p class="prd-taxes">المعلومات الضريبية :
                                        <span>شامل الضريبة.</span>
                                    </p>
                                    <p>التصنيف :
                                        <span>
                                            <a href="{{ route('frontend.card_category', $card->category->slug) }}"
                                                data-toggle="tooltip" data-placement="top"
                                                data-original-title="View all">{{ $card->category->name }}
                                            </a>

                                        </span>
                                    </p>
                                    <p>رمز sku : <span data-sku="">{{ $card->sku }}</span></p>
                                    <p>المزود : <span>سنتر باي</span></p>
                                    <p>الكمية :
                                        <span>{{ $card->quantity >= 0 ? $card->quantity : 'الكمية غير محدودة' }}</span>
                                    </p>
                                </div>
                            </div>

                            {{-- quentity , add to card , add to wishlist part using livewire  --}}
                            <livewire:frontend.card.update-qty-component :card="$card" />

                            <div class="prd-block_info_item">
                                <ul class="prd-block_links list-unstyled">

                                    <li>
                                        <i class="icon-delivery-1"></i>
                                        <a href="#" data-fancybox class="modal-info-link" data-src="#deliveryInfo">
                                            التسليم واعادة الطلب
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icon-email-1"></i>
                                        <a href="#" data-fancybox class="modal-info-link" data-src="#contactModal">
                                            اسأل عن هذا المنتج
                                        </a>
                                    </li>
                                </ul>



                                <div id="deliveryInfo" style="display: none;"
                                    class="modal-info-content modal-info-content-lg">

                                    <div class="modal-info-heading">
                                        <div class="mb-1">
                                            <i class="icon-delivery-1"></i>
                                        </div>
                                        <h2>
                                            التسليم واعادة الطلب
                                        </h2>
                                    </div>
                                    <br>
                                    <h5>لدينا خدمة البريد السريع الطرود</h5>
                                    <p>
                                        تفتخر شركة Foxic بتقديم خدمة شحن الطرود الدولية الاستثنائية. هو - هي
                                        من السهل جدًا تنظيم شحن الطرود الدولية. ملكنا
                                        يعمل فريق خدمة العملاء على مدار الساعة للتأكد من حصولك على جودة عالية
                                        خدمة البريد السريع الجودة من البداية إلى النهاية.
                                    </p>
                                    <p>
                                        إرسال الطرود معنا أمر بسيط. لبدء العملية، ستحتاج أولاً إلى ذلك
                                        احصل على عرض أسعار باستخدام خدمة عرض الأسعار المجانية عبر الإنترنت. من هذا، سوف تكون
                                        قادرًا
                                        للتنقل عبر النموذج عبر الإنترنت لحجز تاريخ استلام الطرود الخاصة بك،
                                        اختيار يوم الشحن المناسب لك.
                                    </p>
                                    <br>
                                    <h5>وقت الشحن</h5>
                                    <p>
                                        يعتمد وقت الشحن على طريقة الشحن التي اخترتها.
                                        <br>
                                        EMS يستغرق حوالي 5-10 أيام عمل للتسليم.
                                        <br>
                                        DHL يستغرق حوالي 2-5 أيام عمل للتسليم.
                                        <br>
                                        DPEX يستغرق حوالي 2-8 أيام عمل للتسليم.
                                        <br>
                                        JCEX يستغرق حوالي 3-7 أيام عمل للتسليم.
                                        <br>
                                        يستغرق البريد الصيني المسجل 20-40 يوم عمل للتسليم.
                                    </p>

                                </div>

                                <div id="contactModal" style="display: none;"
                                    class="modal-info-content modal-info-content-sm">

                                    <div class="modal-info-heading">
                                        <div class="mb-1">
                                            <i class="icon-envelope"></i>
                                        </div>
                                        <h2>
                                            لدي سؤال؟
                                        </h2>
                                    </div>
                                    <form method="post" action="#" id="contactForm" class="contact-form">
                                        <div class="form-group">
                                            <input type="text" name="contact[name]" class="form-control form-control--sm"
                                                placeholder="الاسم">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact[email]"
                                                class="form-control form-control--sm" placeholder="الايميل"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact[phone]"
                                                class="form-control form-control--sm" placeholder="رقم التلفون">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control textarea--height-170" name="contact[body]" placeholder="Message" required=""></textarea>
                                        </div>
                                        <button class="btn" type="submit">
                                            اسأل مستشارنا
                                        </button>
                                        <p class="p--small mt-15 mb-0">
                                            وسوف نتواصل بك قريبا
                                        </p>
                                        <input name="recaptcha-v3-token" type="hidden"
                                            value="03AGdBq27T8WvzvZu79QsHn8lp5GhjNX-w3wkcpVJgCH15Ehh0tu8c9wTKj4aNXyU0OLM949jTA4cDxfznP9myOBw9m-wggkfcp1Cv_vhsi-TQ9E_EbeLl33dqRhp2sa5tKBOtDspTgwoEDODTHAz3nuvG28jE7foIFoqGWiCqdQo5iEphqtGTvY1G7XgWPAkNPnD0B9V221SYth9vMazf1mkYX3YHAj_g_6qhikdQDsgF2Sa2wOcoLKWiTBMF6L0wxdwhIoGFz3k3VptYem75sxPM4lpS8Y_UAxfvF06fywFATA0nNH0IRnd5eEPnnhJuYc5LYsV6Djg7_S4wLBmOzYnahC-S60MHvQFf-scQqqhPWOtgEKPihUYiGFBJYRn2p1bZwIIhozAgveOtTNQQi7FGqmlbKkRWCA">
                                    </form>
                                </div>
                            </div>

                            {{-- طرق الدفع --}}
                            <div class="prd-block_info_item">
                                <img class="img-responsive lazyload d-none d-sm-block"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                    data-src="{{ asset('frontend/images/payment/safecheckout.webp') }}" alt="">
                                <img class="img-responsive lazyload d-sm-none"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                    data-src="{{ asset('frontend/images/payment/safecheckout-m.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="holder prd-block_links-wrap-bg d-none d-md-block">
            <div class="prd-block_links-wrap prd-block_info_item container mt-2 mt-md-5 py-1 pref">
                <div class="prd-block_link"><span><i class="icon-call-center"></i>24/7 الدعم</span></div>
                <div class="prd-block_link">
                    <span>انشي حساب في center pay لتحصل على تخفيض 15 %</span>
                </div>
                <div class="prd-block_link"><span><i class="icon-delivery-truck"></i> استجابة سريعة</span></div>
            </div>
        </div> --}}

        <div class="holder mt-3 mt-md-5 card-accordion">
            <div class="container">
                <ul class="nav nav-tabs product-tab">
                    <li class="nav-item">
                        <a href="#Tab1" class="nav-link" data-toggle="tab">
                            الوصف
                            <span class="toggle-arrow">
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#Tab4" class="nav-link" data-toggle="tab">
                            كلمات مفتاحية مخصصة
                            <span class="toggle-arrow">
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#Tab5" class="nav-link" data-toggle="tab">
                            التعليقات
                            <span class="toggle-arrow">
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                    </li>
                </ul>


                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade bg-transparent" id="Tab1">
                        {{-- <h4 class="mb-15">{!!$card->name!!}</h4> --}}
                        <p class="bg-transparent">{!! $card->description !!}</p>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="Tab4">
                        <ul class="tags-list">
                            <li>
                                <a class="pref-link active" href="#">
                                    Jeans
                                </a>
                            </li>
                            <li>
                                <a class="pref-link active" href="#">
                                    St.Valentine’s gift
                                </a>
                            </li>
                            <li>
                                <a class="pref-link active" href="#">
                                    Sunglasses
                                </a>
                            </li>
                            <li>
                                <a class="pref-link active" href="#">
                                    Discount
                                </a>
                            </li>

                        </ul>

                        <h3>اضف كلماتك المفتاحية على المنتج</h3>
                        <form class="form--simple" action="#">
                            <label>
                                كلمة مفتاحية
                                <span class="required">*</span>
                            </label>
                            <input class="form-control form-control--sm tag-input">
                            <button class="btn btn--md">
                                ارسال التاج
                            </button>
                            <div class="required-text">
                                * حقل مطلوب
                            </div>
                        </form>


                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="Tab5">
                        <div id="productReviews">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2>تعليقات العملاء</h2>
                                </div>
                                <div class="col-18 col-md-auto mb-3 mb-md-0">
                                    <a href="#" class="review-write-link">
                                        <i class="icon-pencil"></i>
                                        إكتب تعليق
                                    </a>
                                </div>
                            </div>
                            <div id="productReviewsBottom">
                                <div class="review-item">
                                    <div class="review-item_rating">
                                        <i class="icon-star-fill fill"></i>
                                        <i class="icon-star-fill fill"></i>
                                        <i class="icon-star-fill fill"></i>
                                        <i class="icon-star-fill fill"></i>
                                        <i class="icon-star-fill fill"></i>
                                    </div>
                                    <div class="review-item_top row align-items-center">
                                        <div class="col">
                                            <h5 class="review-item_author">
                                                جادن نجو في 25 مايو 2018
                                            </h5>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="review-item_report">
                                                لإبلاغ كغير لائق
                                            </a>
                                        </div>
                                    </div>
                                    <div class="review-item_content">
                                        <h4>كرة جيدة وشركة</h4>
                                        <p>
                                            لقد اشتريت هذه الكرة مؤخرًا وهذه هي الكرة الأولى التي أشتريها بالفعل
                                            بناءً على الجودة والمواد، كنت دائمًا ألعب الكرة مع صديقي وواحد
                                            منهم من نصحني بهذا، وقرأت بعض التقييمات عبر الإنترنت وقررت شراءه،
                                            تبدو الكرة لزجة في البداية ولكن الجودة جيدة والخط مكتوب بخط اليد
                                            كان رائعًا لأنه يوضح مدى اهتمام منشئ الموسم فعليًا
                                            زبائنهم.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- related cards with livewire note: $related_cards came from FrontendController#card --}}
        @if (count($related_cards) > 0)
            <livewire:frontend.card.related-cards-component :related_cards="$related_cards" />
        @endif

    </div>

    <div class="holder">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-tag "></i>
                        </div>
                        <div class="text">
                            <h4>أسعارنا الأفضل</h4>
                            {{-- <p>
                                سيتم تسليم طلبك خلال 3-5 أيام عمل بعد كل ذلك
                                العناصر الخاصة بك متاحة
                            </p> --}}
                        </div>
                    </div>

                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-shopping"></i>
                        </div>
                        <div class="text">
                            <h4>عروضنا الأقوى</h4>
                        </div>
                    </div>

                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-call-center"></i>
                        </div>
                        <div class="text">
                            <h4>خدمة عملاء متميزة</h4>

                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-shopping-1"></i>
                        </div>
                        <div class="text">
                            <h4>منتجات تناسب احتياجك</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
