<div class="header-side-panel">

    <!-- القائمة الجانبية عرض روابط الصفحة في الموبايل   -->
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">اغلاق</div>
            <div class="mobilemenu-scroll">
                <div class="mobilemenu-search"></div>
                <div class="nav-wrapper show-menu">
                    <div class="nav-toggle">
                        <span class="nav-back"><i class="icon-angle-left"></i></span>
                        <span class="nav-title"></span>
                        {{-- <a href="#" class="nav-viewall">عرض الكل</a> --}}
                    </div>


                    <ul class="nav nav-level-1">
                        @foreach ($user_side_menu as $menu)

                            @if (count($menu->appearedChildren) == false)
                                {{-- عرض العنصر الرئيسي الذي ليس له ابناء  --}}
                                <li>
                                    <a href="{{ $menu->link != null ? url($menu->link) : '#' }}">
                                        {{ $menu->name_ar }}
                                    </a>
                                </li>
                            @else
                                {{-- عرض العنصر الرئيسي الذي لديه ابناء  --}}
                                <li>
                                    <a href="javascript: void(0);">
                                        {{ $menu->name_ar }}

                                        <span class="arrow">
                                            {{-- <i class="icon-angle-right"></i><!-- right in english  --> --}}
                                            <i class="icon-angle-left"></i>
                                        </span>
                                    </a>

                                    @if ($menu->appearedChildren !== null && count($menu->appearedChildren) > 0)
                                        <ul class="nav-level-2">
                                            @foreach ($menu->appearedChildren as $sub_menu)
                                                <li>
                                                    <a
                                                        href="{{ $sub_menu->link != null ? url($sub_menu->link) : '#' }}">
                                                        {{ $sub_menu->name_ar }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif


                                </li>
                            @endif
                        @endforeach

                    </ul>






                </div>

                <div class="mobilemenu-bottom">
                    <div class="mobilemenu-currency">
                        <div class="dropdn_currency">
                            <div class="dropdn dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link">دولار امريكي<i
                                        class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        <li class="active">
                                            <a href="#"><span>دولار امريكي</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span>يورو</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span>باند امريكي</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobilemenu-language">
                        <div class="dropdn_language">
                            <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link"><span
                                        class="js-dropdn-select-current">العربية</span><i
                                        class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        <li class="active">
                                            <a href="#"><img src="{{ asset('frontend/images/flags/en.webp') }}"
                                                    alt="" />الانجليزية</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/images/flags/sp.webp') }}"
                                                    alt="" />الاسبانية</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/images/flags/de.webp') }}"
                                                    alt="" />الالمانية</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/images/flags/fr.webp') }}"
                                                    alt="" />الفرنسية</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- القائمة الجانبية تسجيل الدخول   -->
    @guest
        <!-- القائمة الجانبية تسجيل الدخول   -->
        {{-- <div class="dropdn-content account-drop {{ request()->routeIs('login') ? 'is-opened' : null }}" id="dropdnAccount"> --}}
        <div class="dropdn-content account-drop" id="dropdnAccount">
            <div class="dropdn-content-block">
                <div class="dropdn-close">
                    <span class="js-dropdn-close">اغلاق</span>
                </div>
                <ul>
                    <li>
                        <div class="mb-4">
                            <img srcset="
                                    {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                                    {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                                alt="سنتر باي" width="200">
                        </div>
                    </li>
                    <li>
                        <!-- <a href="account-create.html"> -->
                        <h5>
                            <i class="icon-login custom-color"></i>
                            <span>تسجيل الدخول</span>
                        </h5>
                        <!-- </a> -->
                    </li>
                    <li>
                        <h6 class="small-body-subtitle">
                            مستخدم جديد ؟
                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon custom-color"
                                data-panel="#dropdnSignUp">
                                <!-- <i class="icon-user"></i> -->
                                <span>انشاء حساب جديد الان</span>
                            </a>
                        </h6>
                    </li>
                    <li>
                        <!-- <a href="checkout.html"><span>الدفع</span><i class="icon-card"></i></a> -->
                    </li>
                </ul>
                <div class="dropdn-form-wrapper">


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" value="{{ old('username') }}" required
                                autocomplete="username" class="form-control form-control--sm js_email_fe rounded-pill"
                                placeholder="ادخل اسم المستخدم" />

                            @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- <div class="invalid-feedback">لا يكون الحقل فارغ</div> -->
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" required autocomplete="current-password"
                                class="form-control form-control--sm js_email_fe rounded-pill"
                                placeholder="ادخل كلمة المرور" />

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- <div class="invalid-feedback">لا يكون الحقل فارغ</div> -->
                        </div>

                        <button type="submit" class="btn mt-3 col-sm-12 rounded-pill js-login-btn">تسجل الدخول</button>

                        <div class="mt-3">
                            @if (Route::has('password.request'))
                                <a class="  " href="{{ route('password.request') }}">
                                    {{ __('نسيت كلمة المرور ؟') }}
                                </a>
                            @endif


                        </div>




                    </form>
                </div>
            </div>
            <div class="drop-overlay js-dropdn-close"></div>
        </div>
    @else
        <div class="dropdn-content account-drop" id="dropdnAccount">
            <div class="dropdn-content-block">
                <div class="dropdn-close">
                    <span class="js-dropdn-close">اغلاق</span>
                </div>
                <ul>
                    <li>
                        <div class="mb-4">
                            <img srcset="
                                {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                                {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                                alt="سنتر باي" width="200">
                        </div>
                    </li>
                    <li>
                        <h5>
                            <i class="icon-user"></i>
                            <span>الملف الشخصي </span>
                        </h5>
                    </li>

                    <li>
                        <h6>
                            <span>مرحبا : </span>
                            @if (auth()->user()->full_name != null)
                                <span class="custom-color">{{ auth()->user()?->full_name }}</span>
                            @endif

                            @if (auth()->user()->email_verified_at != null)
                            @else
                                {{-- <div class="mt-2">
                                    من فضلك , قم بتفعيل حسابك لدينا عبر النقر على رسالة التاكيد الى ارسلناها الي بريدك
                                    الالكتروني
                                </div> --}}

                                <div class="mt-4">

                                    <h5 class=" mb-3">تاكيد عنوان البريد الإلكتروني</h5>

                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert"
                                            style="margin-bottom: 5px ; background-color:rgba(200 , 100 , 100,0.3) ; border-radius: 10px">
                                            تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                                        </div>
                                    @endif

                                    {{ __('قبل المتابعة، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.') }}
                                    <br> <br>
                                    {{ __('إذا لم تتلق البريد الإلكتروني') }},

                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 px-1 py-1 m-0 align-baseline"
                                            style="border-radius: 5px">{{ __('انقر هنا لطلب آخر') }}</button>.
                                    </form>
                                </div>
                            @endif

                        </h6>
                    </li>

                    @if (auth()->user()->email_verified_at != null)
                        {{-- <li>
                            <h5>
                                <i class="icon-user"></i>
                                <span>الملف الشخصي </span>
                            </h5>
                        </li> --}}
                        <li>
                            <div class="card border-0 rounded-0 p-lg-2 pref" style="padding: 0px">
                                <div class="card-body" style="background: #261F23; border-radius: 5px 40px 5px 40px;">
                                    <h5 class="text-uppercase mb-4">المحتوي</h5>



                                    @if (auth()->user()->roles->first()->allowed_route != '')
                                        <div class=" pref-link">
                                            <a href="{{ route('admin.index') }}">
                                                <strong class="small text-uppercase font-weight-bold">لوحة التحكم
                                                    الرئيسية</strong>
                                            </a>
                                        </div>

                                        <div class=" pref-link">
                                            <a href="{{ route('admin.account_settings') }}">
                                                <strong class="small text-uppercase font-weight-bold">الملف الشخصي</strong>
                                            </a>
                                        </div>

                                        <div class=" pref-link">
                                            <a href="javascript:void(0);"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <strong class="small text-uppercase font-weight-bold">تسجيل الخروج</strong>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        {{-- <div
                                            class=" pref-link {{ Route::currentRouteName() == 'customer.dashboard' ? 'active text-white' : 'p ?>' }}  ">
                                            <a href="{{ route('customer.dashboard') }}">
                                                <strong class="small text-uppercase font-weight-bold">لوحة التحكم
                                                    الرئيسية</strong>
                                            </a>
                                        </div> --}}

                                        <div
                                            class=" pref-link {{ Route::currentRouteName() == 'customer.profile' ? 'active text-white' : '' }} ">
                                            <a href="{{ route('customer.profile') }}">
                                                <strong class="small text-uppercase font-weight-bold">الملف الشخصي</strong>
                                            </a>
                                        </div>

                                        <div
                                            class=" pref-link {{ Route::currentRouteName() == 'customer.addresses' ? 'active text-white' : '' }} ">
                                            <a href="{{ route('customer.addresses') }}">
                                                <strong class="small text-uppercase font-weight-bold">العناوين</strong>
                                            </a>
                                        </div>

                                        <div
                                            class=" pref-link {{ Route::currentRouteName() == 'customer.orders' ? 'active text-white' : '' }} ">
                                            <a href="{{ route('customer.orders') }}">
                                                <strong class="small text-uppercase font-weight-bold">طلباتي</strong>
                                            </a>
                                        </div>

                                        <div class=" pref-link">
                                            <a href="javascript:void(0);"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <strong class="small text-uppercase font-weight-bold">تسجيل الخروج</strong>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @endif






                                </div>
                            </div>


                        </li>
                    @else
                    @endif



                </ul>

            </div>
            <div class="drop-overlay js-dropdn-close"></div>
        </div>
    @endguest

    <!-- القائمة الجانبية إنشاء حساب جديد -->
    <div class="dropdn-content signup-drop " id="dropdnSignUp">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">اغلاق</span></div>
            <div id="js_signup_panel" class="dropdn-form-wrapper">
                <div class="mb-4">
                    <img srcset="
                    {{ asset('frontend/images/games/logo-games.webp') }} 1x,
                    {{ asset('frontend/images/games/logo-games2x.webp') }} 2x "
                        alt="سنتر باي" width="200">
                </div>
                <h5><i class="fa fa-sign-in custom-color"></i> انشاء حساب جديد</h5>
                <h6 class="small-body-subtitle">هل لديك حساب؟
                    <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon custom-color"
                        data-panel="#dropdnAccount">
                        <span>تسجيل الدخول</span>
                    </a>
                </h6>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="first_name">
                                <i class="fa fa-user custom-color"></i>
                                الاسم الاول
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="first_name" id="first_name"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="الاسم الاول">

                            @error('first_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="last_name">
                                <i class="fa fa-user custom-color"></i>
                                اللقب
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="last_name" id="last_name"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="اللقب">

                            @error('last_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="username">
                                <i class="fa fa-user custom-color"></i>
                                اسم المستخدم
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="username" id="username"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="اسم المستخدم">

                            @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="email">
                                <i class="fa fa-envelope custom-color"></i>
                                البريد الالكتروني
                                <span class="required">*</span>
                            </label>

                            <input type="email" name="email" id="email"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="your@email.com" autocomplete="email" autocapitalize="none">

                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">
                            <label for="CustomerCountry">
                                <i class="fa fa-flag custom-color"></i>
                                الدولة
                                <span class="required">*</span>
                            </label>
                            <select class="select-wrapper rounded-pill" id="CustomerCountry" name="Country">
                                <option value="8">+967 - اليمن</option>
                                <option value="1">+966 - السعودية</option>
                                <option value="2">+971 - الامارات</option>
                                <option value="3">+965 - الكويت</option>
                                <option value="4">+974 - قطر</option>
                            </select>
                        </p>

                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="mobile">
                                <i class="fa fa-mobile-phone custom-color"></i>
                                رقم الجوال
                                <span class="required">*</span>
                            </label>

                            <input type="text" name="mobile" id="mobile"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="رقم الجوال بدون رمز الدولة">
                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="password">
                                <i class="fa fa-user custom-color"></i>
                                كلمة المرور
                                <span class="required">*</span>
                            </label>

                            <input type="password" name="password" id="password"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="كلمة المرور">

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="form-group js_login_fe">
                        <p class="form-row mb-3">

                            <label for="password_confirmation">
                                <i class="fa fa-user custom-color"></i>
                                تاكيد كلمة المرور
                                <span class="required">*</span>
                            </label>

                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control form-control--sm rounded-pill" value=""
                                placeholder="تاكيد كلمة المرور">

                            @error('password_confirmation')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </p>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn mt-3 col-sm-12 rounded-pill js-signup-btn">إنشاء
                            حساب</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>

    <!-- القائمة الجانبية قائمة المفضلات -->
    @livewire('frontend.carts-side-panel.cart-wishlist-component')

    <!-- القائمة الجانبية سلة الشراء  -->
    @livewire('frontend.carts-side-panel.cart-default-component')


</div>
