@extends('layouts.app')



@section('content')
    <div class="container">



        {{-- for fast link of this content  --}}
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
                        <a href="{{ route('frontend.card_category', $card_category->slug) }}" class="active">
                            {{ $card_category->name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="holder">
            <div class="container">

                <div class="page-title text-center">
                    <h1>{{ $card_category->name }}</< /h1>
                </div>

                <div class="row prd-block prd-block--prv-bottom">
                    <div class="col-md-5 col-lg-5 col-xl-5 aside--sticky js-sticky-collision">
                        <div class="aside-content">
                            <div class="mb-2 js-prd-m-holder"></div>

                            {{-- image show --}}
                            <div class="prd-block_main-image">
                                <div class="prd-block_main-image-holder" id="prdMainImage">

                                    <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

                                        @foreach ($card_category->photos as $photo)
                                            <div data-value="Beige">
                                                <span class="prd-img">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{ asset('assets/card_categories/' . $photo->file_name) }}"
                                                        class="lazyload fade-up elzoom" alt="{{ $card_category->name }}"
                                                        data-zoom-image="{{ asset('assets/card_categories/' . $photo->file_name) }}" />
                                                </span>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>


                            </div>
                            {{-- image show temp  --}}
                            <div class="product-previews-wrapper">

                                <div class="product-previews-carousel js-product-previews-carousel">

                                    @foreach ($card_category->photos as $photo)
                                        <a href="#" data-value="Beige">
                                            <span class="prd-img">
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/card_categories/' . $photo->file_name) }}"
                                                    class="lazyload fade-up" alt="" />
                                            </span>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- cards of the above card category  --}}
                    <livewire:frontend.card-category.related-cards-component :cards="$cards" />


                </div>
            </div>
        </div>


        {{-- card categories  --}}
        @if (count($more_categories) > 0)
            <div class="holder global_width">
                <div class="container">
                    <div class="title-wrap text-center">
                        <h2 class="h1-style">قد يعجبك ايضا</h2>
                    </div>
                    <div class="prd-grid prd-promo-carousel data-to-show-4 js-prd-promo-carousel">

                        @forelse ($more_categories as $more_category)
                            <div class="prd-promo prd-promo--lg prd-has-loader">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="{{ route('frontend.card_category', $more_category->slug) }}"
                                            class="image-hover-scale">
                                            <img src="{{ asset('assets/card_categories/' . $more_category->firstMedia->file_name) }}"
                                                alt="{{ $more_category->name }}" class="js-prd-img" />

                                        </a>
                                    </div>
                                    <div class="prd-info text-center">
                                        <h2 class="prd-title"><a href="product.html">{{ $more_category->name }}</a></h2>

                                        <div class="prd-hover">

                                            <div class="prd-action">
                                                <a class="btn js-prd-addtocart"
                                                    href="{{ route('frontend.card_category', $more_category->slug) }}">
                                                    عرض الباقات
                                                </a>

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
