@extends('layouts.app')

@section('content')
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                <li><span>السلة</span></li>
            </ul>
        </div>
    </div>

    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1> سلة التسوق</h1>
            </div>


            <div class="row">

                <div class="col-md-8 js-hide-empty">

                    <div
                        class="prd-grid product-listing data-to-show-2 data-to-show-md-2 data-to-show-sm-1 js-category-grid">

                        {{-- عناصر سلة التسوق  --}}
                        @forelse (Cart::content('default') as $item)
                            {{--  show item in cart using livewire --}}

                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-xxs">

                                <livewire:frontend.cart.cart-item-component :item="$item->rowId" />
                            </div>

                        @empty
                            {{-- سلة الشراء فارغة  --}}
                            <div class="cart">
                                <div class="card-body bg-transparent">
                                    <div class="minicart-empty-text text-center">
                                        <h1>سلة الشراء فارغة</h1>
                                    </div>
                                    <div class="minicart-empty-icon">
                                        <i class="icon-shopping-bag"></i>
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;"
                                            xml:space="preserve">
                                            <path class="st0"
                                                d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <livewire:frontend.cart.destroy-cart-items-component />

                    {{-- wanted more section  --}}
                    @if (count($more_cards) > 0)
                        <div class="d-none d-lg-block">
                            <div class="mt-4"></div>
                            <div class="holder">
                                <div class="container">
                                    <div class="title-wrap text-center">
                                        <h2 class="h1-style">قد يعجبك ايضا</h2>
                                        <div class="carousel-arrows carousel-arrows--center"></div>
                                    </div>
                                    {{-- may want more   --}}
                                    <livewire:frontend.cart.more-cards-component :more_cards="$more_cards" />

                                </div>
                            </div>
                        </div>
                    @endif


                </div>

                <div class="col-md-4 mt-3 mt-md-0 js-hide-empty">

                    <div class="text-center">
                        <h2>الإجمالي</h2>
                    </div>

                    {{-- call to card total panel --}}
                    <livewire:frontend.cart.cart-total-component />

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
