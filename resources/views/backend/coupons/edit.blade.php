@extends('layouts.admin')
@section('style')
    {{-- pickadate calling css --}}
    <link rel="stylesheet" href="{{ asset('backend/vendor/datepicker/themes/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/datepicker/themes/classic.date.css') }}">

    <style>
        .picker__select--month,
        .picker__select--year {
            padding: 0 !important;
        }

        .picker__list {
            list-style-type: none;
        }
    </style>
@endsection
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    تعديل كوبون الخصم
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.coupons.index') }}">
                            كوبونات الخصم
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            {{-- erorrs show is exists --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- enctype used cause we will save images  --}}
            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات الشريحة</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                            aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">

                    {{-- content tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        <div class="row">

                            <div class="col-sm-12 col-md-7">
                                {{-- code and type field --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="code">Code</label>
                                            <input type="text" id="code" name="code"
                                                value="{{ old('code', $coupon->code) }}" class="form-control">
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <label for="type">نوع الكوبون</label>
                                        <select name="type" class="form-control">
                                            <option value="">---</option>
                                            <option value="fixed"
                                                {{ old('type', $coupon->type) == 'fixed' ? 'selected' : null }}>قيمة ثابته
                                            </option>
                                            <option value="percentage"
                                                {{ old('type', $coupon->type) == 'percentage' ? 'selected' : null }}>نسبة
                                                المئوية</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- value and use_time field --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="value">قيمة التخفيض </label>
                                            <input type="number" id="value" name="value"
                                                value="{{ old('value', $coupon->value) }}" class="form-control">
                                            @error('value')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="use_times">عدد مرات الاستخدام</label>
                                            <input type="number" id="use_times" name="use_times"
                                                value="{{ old('use_times', $coupon->use_times) }}" class="form-control">
                                            @error('use_times')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- start date and expired date of the coupon use  --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="text" id="start_date" name="start_date"
                                                value="{{ old('start_date', $coupon->start_date->format('Y-m-d')) }}"
                                                class="form-control">
                                            @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="expire_date">Expire Date</label>
                                            <input type="text" id="expire_date" name="expire_date"
                                                value="{{ old('expire_date', $coupon->expire_date->format('Y-m-d')) }}"
                                                class="form-control">
                                            @error('expire_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- greater than field  --}}
                                <div class="row">
                                    <div class="col-sm-12 col-ms-12 pt-4">
                                        <div class="form-group">
                                            <label for="greater_than">يطبق على تسعيرة اكبر من </label>
                                            <input type="number" id="greater_than" name="greater_than"
                                                value="{{ old('greater_than', $coupon->greater_than) }}"
                                                class="form-control">
                                            @error('greater_than')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-12 col-md-5">

                                {{-- description row --}}
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <label for="description">الوصف</label>
                                        <textarea name="description" rows="10" class="form-control summernote">
                                            {!! old('description', $coupon->description) !!}
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">

                        {{-- status and featured field --}}
                        <div class="row">
                            <div class="col-6 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1"
                                        {{ old('status', $coupon->status) == '1' ? 'selected' : null }}>مفعل</option>
                                    <option value="0"
                                        {{ old('status', $coupon->status) == '0' ? 'selected' : null }}>غير مفعل</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 pt-4">
                                <label for="featured">عرض في المفضلة</label>
                                <select name="featured" class="form-control">
                                    <option value="1"
                                        {{ old('featured', $coupon->featured) == '1' ? 'selected' : null }}>نعم</option>
                                    <option value="0"
                                        {{ old('featured', $coupon->featured) == '0' ? 'selected' : null }}>لا</option>
                                </select>
                                @error('featured')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- published_on and published_on_time  --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', \Carbon\Carbon::parse($coupon->published_on)->Format('Y-m-d')) }}"
                                        class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', \Carbon\Carbon::parse($coupon->published_on)->Format('h:i A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- view_in_main and  tags fields --}}
                        <div class="row ">
                            {{-- view_in_main field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="view_in_main" class="control-label "><span>عرض في الرئيسية</span><span
                                        class="require red">*</span></label>
                                <select name="view_in_main" class="form-control">
                                    <option value="1"
                                        {{ old('view_in_main', $coupon->view_in_main) == '1' ? 'selected' : null }}>مفعل
                                    </option>
                                    <option value="0"
                                        {{ old('view_in_main', $coupon->view_in_main) == '0' ? 'selected' : null }}>غير
                                        مفعل</option>
                                </select>
                                @error('view_in_main')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">إنشاء الكوبون</button>
                    </div>
                </div>







            </form>
        </div>

    </div>

@endsection

@section('script')
    {{-- pickadate calling js --}}

    <script src="{{ asset('backend/vendor/datepicker/picker.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.date.js') }}"></script>
    <script>
        $(function() {

            // ======= start pickadate codeing ===========
            $('#start_date').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            $('#expire_date').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true, // Creates a dropdoen to control month
                selectYears: true, // Creates a dropdown to control month 
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close upon selecting a date ,
            });

            var startdate = $('#start_date').pickadate(
                'picker'); // set startdate in the picker to the start date in the #start_date elemet
            var enddate = $('#expire_date').pickadate('picker');

            // when change date 
            $('#start_date').change(function() {
                selected_ci_date = "";
                selected_ci_date = $('#start_date')
                    .val(); // make selected start date in picker = start_date value
                if (selected_ci_date != null) {
                    var cidate = new Date(
                        selected_ci_date
                    ); // make cidate(start date ) = current date you selected in selected ci date (selected start date )
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate() +
                        1); // minimum selected date to be expired shoud be current date plus one 
                    enddate.set('min', min_codate);
                }

            });


            // ======= End pickadate codeing ===========

            // ======= start pickadate codeing  for start and end date ===========
            $('#published_on').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            var publishedOn = $('#published_on').pickadate(
                'picker'); // set startdate in the picker to the start date in the #start_date elemet

            // when change date 
            $('#published_on').change(function() {
                selected_ci_date = "";
                selected_ci_date = now() // make selected start date in picker = start_date value  

            });

            $('#published_on_time').pickatime({
                clear: ''
            });
            // ======= End pickadate codeing for publish start and end date  ===========

            $('#code').keyup(function() {
                this.value = this.value.toUpperCase();
            });

            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });


        });
    </script>
@endsection
