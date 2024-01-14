@extends('layouts.app')

@section('content')
    <section class="py-3 pref">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">{{ __('إنشاء حساب جديد') }}</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 ">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="h5 text-uppercase mb-3">{{ __('إنشاء حساب جديد') }}</h2>

                {{-- <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="first_name" class="text-small text-uppercase">{{ __('FirstName') }}</label>
                                <input id="first_name" name="first_name" type="text"
                                    class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                    placeholder="Enter Your First Name" value="{{ old('first_name') }}" required
                                    autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="last_name" class="text-small text-uppercase">{{ __('LastName') }}</label>
                                <input id="last_name" name="last_name" type="text"
                                    class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                    placeholder="Enter Your Last Name" value="{{ old('last_name') }}" required
                                    autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="username" class="text-small text-uppercase">{{ __('UserName') }}</label>
                                <input id="username" name="username" type="text"
                                    class="form-control form-control-lg @error('username') is-invalid @enderror"
                                    placeholder="Enter Your User Name" value="{{ old('username') }}" required
                                    autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="email" class="text-small text-uppercase">{{ __('E-mail Address') }}</label>
                                <input id="email" name="email" type="text"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Enter Your E-mail Address" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="mobile" class="text-small text-uppercase">{{ __('Mobile Number') }}</label>
                                <input id="mobile" name="mobile" type="text"
                                    class="form-control form-control-lg @error('mobile') is-invalid @enderror"
                                    placeholder="Enter Your Mobile Number" value="{{ old('mobile') }}" required
                                    autocomplete="mobile" autofocus>
                                @error('mobile')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="password" class="text-small text-uppercase">{{ __('password Number') }}</label>
                                <input id="password" name="password" type="text"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Enter Your Password Number" value="{{ old('password') }}" required
                                    autocomplete="password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="password_confirmation"
                                    class="text-small text-uppercase">{{ __('Password Confirmation Number') }}</label>
                                <input id="password_confirmation" name="password_confirmation" type="text"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Enter Your Password Confirmation Number"
                                    value="{{ old('password_confirmation') }}" required
                                    autocomplete="password_confirmation" autofocus>
                                @error('password_confirmation')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Register') }}
                                </button>
                                @if (Route::has('login'))
                                    <a class="btn btn-link  " href="{{ route('login') }}">
                                        {{ __('Have an account') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </form> --}}

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
                                class="form-control form-control--sm rounded-pill" value="" placeholder="الاسم الاول">

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
                                class="form-control form-control--sm rounded-pill" value="" placeholder="اللقب">

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
                    <div class="mt-3"></div>
                    <h6 class="small-body-subtitle">هل لديك حساب؟
                        <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon custom-color"
                            data-panel="#dropdnAccount">
                            <span>تسجيل الدخول</span>
                        </a>
                    </h6>
                </form>
            </div>
        </div>
    </section>
@endsection
