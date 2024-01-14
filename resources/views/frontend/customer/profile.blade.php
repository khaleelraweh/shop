@extends('layouts.app')
@section('content')
    <section class="py-5 pref">
        <div class="container ">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h4 text-uppercase mb-0">الملف الشخصي للعميل {{ auth()->user()->full_name }}</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 pref">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('customer.profile') }}">الملف الشخصي</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row">

            <div class="col-lg-8">
                {{-- <h2 class="h5 text-uppercase mb-4">General Information</h2> --}}
                <form class="pref" action="{{ route('customer.update_profile') }}" method="POST"
                    enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-lg-12 text-center mb-4">
                            @if (auth()->user()->user_image != '')
                                <img src="{{ asset('assets/users/' . auth()->user()->user_image) }}"
                                    alt="{{ auth()->user()->full_name }}" class="img-thumbnail" width="120">

                                <div class="mt-2">
                                    <a href="{{ route('customer.remove_profile_image') }}"
                                        class="btn btn-sm btn-outline-danger">حذف الصورة</a>
                                </div>
                            @else
                                <img src="{{ asset('assets/users/avatar.svg') }}" alt="{{ auth()->user()->full_name }}"
                                    class="img-thumbnail" width="120">
                            @endif
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="first_name">الاسم الاول </label>
                            <input class="form-control form-control-lg" name="first_name" type="text"
                                value="{{ old('first_name', auth()->user()->first_name) }}">
                            @error('first_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="last_name">اللقب </label>
                            <input class="form-control form-control-lg" name="last_name" type="text"
                                value="{{ old('last_name', auth()->user()->last_name) }}">
                            @error('last_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="email">الايميل </label>
                            <input class="form-control form-control-lg" name="email" type="text"
                                value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="mobile">رقم الجوال </label>
                            <input class="form-control form-control-lg" name="mobile" type="text"
                                value="{{ old('mobile', auth()->user()->mobile) }}">
                            @error('mobile')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="password">كلمة المرور <small
                                    class="ml-auto text-danger">(Optional)</small></label>
                            <input class="form-control form-control-lg" name="password" type="text"
                                value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="password_confirmation">تاكيد كلمة المرور
                                <small class="ml-auto text-danger">(Optional)</small> </label>
                            <input class="form-control form-control-lg" name="password_confirmation" type="text"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 form-group pt-2">
                            <label class="text-small text-uppercase" for="user_image">الصورة</label>
                            <input class="form-control form-control-lg" name="user_image" type="file"
                                value="{{ old('user_image') }}">
                            @error('user_image')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-12 form-group pt-3">
                            <button class="btn  pref-link" type="submit">تحديث الملف الشخصي </button>
                        </div>

                    </div>
                </form>

            </div>


            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                @include('partial.frontend.customer.sidebar')
            </div>
        </div>
    </section>
@endsection
