@extends('layouts.app')

@section('content')
    <section class="py-5 pref">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">{{ __('إعادة تعيين كلمة المرور') }}</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="h5 text-uppercase mb-3">{{ __('إعادة تعيين كلمة المرور') }}</h2>
                    @if (session('status'))
                        <div class="alert alert-success"
                            style="margin-bottom: 5px ; background-color:rgba(200 , 100 , 100,0.3) ; border-radius: 10px"
                            role="alert">
                            <div class="d-none">{{ session('status') }}</div>
                            تم ارسال رابط اعادة تعيين كلمة المرور الى بريدك الالكتروني
                        </div>
                    @endif


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn mt-3 col-sm-12 rounded-pill ">إرسال رابط إعادة
                                    التعيين
                                </button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </section>
@endsection
