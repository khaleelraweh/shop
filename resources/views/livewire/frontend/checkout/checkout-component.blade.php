<div>
    <style>
        .cart-table {
            border: none;
        }

        .cart-table-prd {
            border: 1px solid #353136;
            border-radius: 10px;
        }

        .paypal_btn {
            width: 100%;
            height: 50px;
            border-radius: 30px;
            border: none;

            text-decoration: none;
            color: #fff;
            outline: none;
            background-color: #DC3C01;
            box-shadow: none !important;
        }

        .paypal_btn:hover {
            transition: all .2s ease;
            color: #0d080b !important;
            outline: 0;
            background-color: #fff;
        }
    </style>



    <div class="container">
        <h1 class="text-center">اكمال عملية الشراء</h1>

        <div class="row">
            <div class="col-sm-12 col-md-5">





                {{-- start --}}
                <div class="card col-md-12 bg-transparent mt-2">

                    <div class="card-body">

                        {{-- <h2>الدفع بواسطة </h2> --}}
                        {{-- <form>
                            <div class="payment-method__tabs is-hidden-phone mt-2">
                                <button class="paypal_btn" name="payment_key" type="submit">
                                    <div class="payment-method__tab-inner">
                                        <img alt="PayPal" width="95px" height="25px"
                                            src="https://public-assets.envato-static.com/assets/buying/paypal-logo-802cab56dfafa8b4bc682e9e4ba31ac076a0b6e520026fc397151baec13f3d36.svg">
                                    </div>
                                </button>
                            </div>
                        </form> --}}

                        {{-- show paymnt mehtod category  --}}
                        <div class=" payment-method mt-3">
                            <h2>طرق الدفع </h2>
                            <div class="form-group select-wrapper">
                                <select class="form-control js-payment-type form-control--sm rounded-pill"
                                    wire:model="payment_category_id">
                                    <option value="">اختر طريقة الدفع</option>

                                    @forelse ($payment_categories as $payment_category)
                                        <option value="{{ $payment_category->id }}"
                                            wire:click="updatePaymentCategory()">
                                            {{ $payment_category->name_ar }}
                                        </option>
                                    @empty
                                    @endforelse

                                </select>
                            </div>
                        </div>

                        {{-- show payment method element  --}}
                        {{-- @if (count($payment_methods) > 0) --}}
                        @if ($payment_category_id != '')
                            <div class="payment-details mt-3">
                                <div class="payment-type-1 js-bank">
                                    <h3 class="custom-color">بيانات التحويل عبر
                                        {{ $payment_category_name_ar }}
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label> {{ $payment_category_name_ar }}</label>
                                            <div class="form-group select-wrapper">


                                                <select class="form-control js-banks form-control--sm rounded-pill"
                                                    wire:model="payment_method_id">
                                                    <option value="">اختر نوع
                                                        {{ $payment_category_name_ar }} الذي تم/ يتم
                                                        التحويل بواسطته</option>


                                                    @forelse ($payment_methods as $payment_method)
                                                        <option value="{{ $payment_method->id }}">
                                                            {{ $payment_method->method_name }}
                                                        </option>
                                                    @empty
                                                    @endforelse


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endif







                        @if ($payment_category_id != '' && $payment_method_id != '')
                            @forelse ($payment_method_details as $payment_method_detail)
                                @if ($payment_method_detail->method_name == 'paypal')
                                    <form action="{{ route('checkout.payment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payType" value="0">

                                        <input type="hidden" name="payment_method_id"
                                            value="{{ old('payment_method_id', 1) }}" class="form-control">

                                        <div class="col-sm-12 mt-5">
                                            <button type="submit" name="submit"
                                                class="btn btn--full btn--md rounded-pill js-save-order"><span>اكمال
                                                    عملية الشراء عبر paypal</span></button>
                                        </div>

                                    </form>
                                @else
                                    <div class="banks-details row mt-3">
                                        <div class="bank-info-123456789 col-sm-12 mb-3">
                                            <div class="d-lg-flex flex-lg-row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <img src="{{ asset('assets/payment_method_offlines/' . $payment_method_detail->firstMedia?->file_name) }}"
                                                        alt="{{ $payment_method_detail->name }}"
                                                        class=" img-fluid rounded">
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <h2 class="">بيانات التحويل عبر
                                                        {{ $payment_method_detail->method_name }} </h2>
                                                    <h3 class="custom-color">
                                                        {{ $payment_method_detail->name }}</h3>
                                                    <label>رقم حسابنا في {{ $payment_method_detail->method_name }}
                                                        :</label>
                                                    <div class="form-group">
                                                        {{ $payment_method_detail->owner_account_number }} </div>
                                                    <label>اسم الحساب في
                                                        {{ $payment_method_detail->method_name }}:</label>
                                                    <div class="form-group">
                                                        {{ $payment_method_detail->owner_account_name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="bank-123456789" name="bank"
                                                class="form-control form-control--sm rounded-pill " value="4">
                                        </div>


                                        <form action="{{ route('checkout.payment_in') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="payType" value="1">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label>رقم الحساب البنكي للعميل</label>
                                                    <div class="form-group">
                                                        <input type="text" name="bankAccNumber"
                                                            class="form-control form-control--sm rounded-pill"
                                                            placeholder="رقم الحساب البنكي للعميل">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <label>صورة وصل التحويل</label>
                                                    <div class="form-group">
                                                        <input type="file" name="bankReceipt" id="bankReceipt"
                                                            class="form-control form-control--sm rounded-pill">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mt-5">
                                                    <button type="submit"
                                                        class="btn btn--full btn--md rounded-pill js-save-order"><span>اكمال
                                                            عملية الشراء</span></button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                @endif


                            @empty
                                "your have not choosen any things"
                            @endforelse
                        @else
                        @endif







                    </div>
                </div>
                {{-- end --}}

            </div>

            {{-- سيكون الشعل علي ملخص الطلب هذا لعرض  بيانات المنتجات  --}}
            <div class="col-sm-12 col-md-7 pl-lg-8 mt-2 mt-md-0">
                <h2 class="custom-color">ملخص الطلب</h2>
                <div class="cart-table cart-table--sm pt-3 pt-md-0">


                    @forelse (Cart::content('default') as $item)
                        <div class="cart-table-prd mt-3">
                            <div class="cart-table-prd-image">
                                <a href="{{ route('frontend.card', $item->model?->slug) }}" class="prd-img"><img
                                        class="lazyload fade-up"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/cards/' . $item->model?->firstMedia?->file_name) }}"
                                        alt="{{ $item->model?->name }}"></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <h2 class="cart-table-prd-name"><a
                                            href="{{ route('frontend.card', $item->model?->slug) }}">{{ $item->model?->name }}
                                        </a>
                                    </h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <span>{{ $item->qty }}</span>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    ${{ $item->qty * $item->model?->price }}
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>

                {{-- coupon part  --}}
                <div class="mt-2"></div>
                <div class="card checkout pref">
                    <div class="card-body">
                        <form class="col-md-12" wire:submit.prevent="applyDiscount()">
                            <div class="form-inline mt-2">

                                @if (!session()->has('coupon'))
                                    <input type="text" wire:model="coupon_code"
                                        class="form-control form-control--sm col-md-12 card-discount-txt rounded-pill"
                                        placeholder="كود الخصم">
                                @endif

                                @if (session()->has('coupon'))
                                    <button type="button" wire:click.prevent="removeCoupon()"
                                        class="btn btn--full btn--md rounded-pill">

                                        حذف كوبون الخصم
                                    </button>
                                @else
                                    <button type="submit" class="btn col-4 col-sm-4 card-discount-btn rounded-pill">
                                        تطبيق
                                    </button>
                                @endif
                            </div>
                        </form>

                        @if (session()->has('coupon'))
                            <div class="d-flex mt-2">
                                <div class="col">اجمالي الخصم للكوبون (
                                    <small>{{ getNumbers()->get('discount_code') }}</small>
                                    )
                                </div>

                                <div class="col-auto  card-discount-price text-right">
                                    ${{ $cart_discount }}</div>
                            </div>
                        @endif

                        <div class="cart-total-sm mt-3">
                            <span>المجموع</span>
                            <span class="card-total-price">$ 494.00</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
