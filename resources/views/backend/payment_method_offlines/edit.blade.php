@extends('layouts.admin')

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    تعديل بيانات طريقة الدفع
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.payment_method_offlines.index') }}">
                            إدارة طرق الدفع
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
            <form action="{{ route('admin.payment_method_offlines.update', $paymentMethodOffline->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات المحتوي</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab"
                            aria-controls="account" aria-selected="false">بيانات مالك الحساب البنكي</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customer" role="tab"
                            aria-controls="customer" aria-selected="false">بيانات حساب العميل </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                            aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                </ul>


                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">

                    {{-- Content Tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="row">
                            {{-- البيانات الاساسية --}}
                            <div class="col-md-7 col-sm-12 ">
                                {{-- category name  field --}}
                                <div class="row">
                                    <div class="col-sm-12 pt-4 ">
                                        <label for="category_id">تصنيف طريقة الدفع</label>
                                        <select name="payment_category_id" class="form-control">
                                            <option value="">---</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('payment_category_id', $paymentMethodOffline->payment_category_id) == $category->id ? 'selected' : null }}>
                                                    {{ $category->name_ar }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                {{-- product method_name field --}}
                                <div class="row">
                                    <div class="col-sm-12 pt-4">
                                        <div class="form-group">
                                            <label for="method_name">العنوان</label>
                                            <input type="text" id="method_name" name="method_name"
                                                value="{{ old('method_name', $paymentMethodOffline->method_name) }}"
                                                class="form-control" placeholder="method_name">
                                            @error('method_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- product method_description field --}}
                                <div class="row">
                                    <div class="col-sm-12 pt-4">
                                        <label for="method_description">الوصف</label>
                                        <textarea name="method_description" rows="10" class="form-control summernote">
                                            {!! old('method_description', $paymentMethodOffline->method_description) !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- مرفق الصور  --}}
                            <div class="col-md-5 col-sm-12 ">

                                <div class="row">
                                    <div class="col-sm-12 pt-4">
                                        <label for="images">الصورة/ الصور</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="images[]" id="product_images"
                                                class="file-input-overview" multiple="multiple">
                                            @error('images')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- account Tab --}}
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">

                        {{-- owner name and owner number fields --}}
                        <div class="row">

                            {{-- owner name field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="owner_account_name"> اسم الحساب</label>
                                <input type="text" name="owner_account_name" id="owner_account_name"
                                    value="{{ old('owner_account_name', $paymentMethodOffline->owner_account_name) }}"
                                    class="form-control" placeholder="owner_account_name">
                                @error('owner_account_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- owner_account_number field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="owner_account_number">رقم الحساب</label>
                                <input type="text" name="owner_account_number" id="owner_account_number"
                                    value="{{ old('owner_account_number', $paymentMethodOffline->owner_account_number) }}"
                                    class="form-control" placeholder="owner_account_number">
                                @error('owner_account_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- owner country and  phone fields --}}
                        <div class="row">
                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="owner_account_country">الدولة</label>
                                <input type="text" name="owner_account_country" id="owner_account_country"
                                    value="{{ old('owner_account_country', $paymentMethodOffline->owner_account_country) }}"
                                    class="form-control" placeholder="owner_account_country">
                                @error('owner_account_country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="owner_account_phone">رقم هاتف التواصل</label>
                                <input type="text" name="owner_account_phone" id="owner_account_phone"
                                    value="{{ old('owner_account_phone', $paymentMethodOffline->owner_account_phone) }}"
                                    class="form-control" placeholder="owner_account_phone">
                                @error('owner_account_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- customer Tab --}}
                    <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">

                        {{-- owner name and owner number fields --}}
                        <div class="row">

                            {{-- owner name field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="customer_account_name"> اسم الحساب</label>
                                <input type="text" name="customer_account_name" id="customer_account_name"
                                    value="{{ old('customer_account_name', $paymentMethodOffline->customer_account_name) }}"
                                    class="form-control" placeholder="customer_account_name..">
                                @error('customer_account_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- customer_account_number field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="customer_account_number">رقم الحساب</label>
                                <input type="text" name="customer_account_number" id="customer_account_number"
                                    value="{{ old('customer_account_number', $paymentMethodOffline->customer_account_number) }}"
                                    class="form-control" placeholder="customer_account_number">
                                @error('customer_account_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        {{-- owner country and  phone fields --}}
                        <div class="row">
                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="customer_account_country">الدولة</label>
                                <input type="text" name="customer_account_country" id="customer_account_country"
                                    value="{{ old('customer_account_country') }}" class="form-control"
                                    placeholder="customer_account_country">
                                @error('customer_account_country', $paymentMethodOffline->customer_account_country)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="customer_account_phone">رقم هاتف التواصل</label>
                                <input type="text" name="customer_account_phone" id="customer_account_phone"
                                    value="{{ old('customer_account_phone', $paymentMethodOffline->customer_account_phone) }}"
                                    class="form-control" placeholder="customer_account_phone">
                                @error('customer_account_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', \Carbon\Carbon::parse($paymentMethodOffline->published_on)->Format('Y-m-d')) }}"
                                        class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', \Carbon\Carbon::parse($paymentMethodOffline->published_on)->Format('h:i A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- status and featured field --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1"
                                        {{ old('status', $paymentMethodOffline->status) == '1' ? 'selected' : null }}>مفعل
                                    </option>
                                    <option value="0"
                                        {{ old('status', $paymentMethodOffline->status) == '0' ? 'selected' : null }}>غير
                                        مفعل</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        later work...
                    </div>

                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">تعديل طريقة الدفع</button>
                    </div>

                </div>


            </form>
        </div>

    </div>

@endsection

@section('script')
    {{-- Call select2 plugin --}}
    <script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>

    {{-- pickadate calling js --}}
    <script src="{{ asset('backend/vendor/datepicker/picker.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.date.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.time.js') }}"></script>

    <script>
        $(function() {
            const link = document.getElementById('checkIn');
            const result = link.hasAttribute('checked');
            if (result) {
                document.getElementById('quantity').readOnly = true;
            }
        });
    </script>

    <script>
        $(function() {

            $("#product_images").fileinput({
                theme: "fa5",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if ($paymentMethodOffline->photos()->count() > 0)
                        @foreach ($paymentMethodOffline->photos as $media)
                            "{{ asset('assets/payment_method_offlines/' . $media->file_name) }}",
                        @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($paymentMethodOffline->photos()->count() > 0)
                        @foreach ($paymentMethodOffline->photos as $media)
                            {
                                caption: "{{ $media->file_name }}",
                                size: '{{ $media->file_size }}',
                                width: "120px",
                                // url : الراوت المستخدم لحذف الصورة
                                url: "{{ route('admin.payment_method_offlines.remove_image', ['image_id' => $media->id, 'payment_method_offline_id' => $paymentMethodOffline->id, '_token' => csrf_token()]) }}",
                                key: {{ $media->id }}
                            },
                        @endforeach
                    @endif

                ]
            }).on('filesorted', function(event, params) {
                console.log(params.previewId, params.oldIndex, params.newIndex, params.stack);
            });


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


            //select2: code to search in data 
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function(idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            // select2 : .select2 : is  identifier used with element to be effected
            $(".select2").select2({
                tags: true,
                colseOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });

        });
    </script>
@endsection
