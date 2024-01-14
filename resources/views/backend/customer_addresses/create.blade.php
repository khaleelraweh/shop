@extends('layouts.admin')

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-plus-square"></i>
                    إضفافة عنوان جديد
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.customer_addresses.index') }}">
                            عناوين العملاء
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

            <form action="{{ route('admin.customer_addresses.store') }}" method="post">
                @csrf

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">المعلومات الشخصية</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link " id="address-tab" data-toggle="tab" href="#address" role="tab"
                            aria-controls="address" aria-selected="false"> معلومات العنوان</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                            aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">

                    {{-- content tab without image   --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        {{-- row part in content   --}}
                        <div class="row">
                            {{-- field one  --}}
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="user_id">العميل</label>
                                    <input type="text" class="form-control typeahead" name="customer_name"
                                        id="customer_name"
                                        value="{{ old('customer_name', request()->input('customer_name')) }}">
                                    <input type="hidden" class="form-control" name="user_id" id="user_id"
                                        value="{{ old('user_id', request()->input('user_id')) }}" readonly>
                                    @error('user_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- row part in content   --}}
                        <div class="row">

                            {{-- field one --}}
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="first_name">الاسم الاول</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                                        class="form-control">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- field two  --}}
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="last_name">الاسم الاخير</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                        class="form-control">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- row part in content   --}}
                        <div class="row">

                            {{-- field one  --}}
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="email">الايميل</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- field two --}}
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="mobile">موبايل</label>
                                    <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control">
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- address Tab --}}
                    <div class="tab-pane fade " id="address" role="tabpanel" aria-labelledby="address-tab">

                        {{-- row part in address   --}}
                        <div class="row">

                            {{-- field one --}}
                            <div class="col-sm-12 col-md-8 pt-4">
                                <div class="form-group">
                                    <label for="address_title">اسم العنوان </label>
                                    <input type="text" name="address_title" value="{{ old('address_title') }}"
                                        class="form-control">
                                    @error('address_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- field two --}}
                            <div class="col-sm-12 col-md-4 pt-4">
                                <div class="form-group">
                                    <label for="default_address">العنوان الافتراضي</label>
                                    <select name="default_address" id="" class="form-control">
                                        <option value="0" {{ old('default_address') == '0' ? 'selected' : null }}>نعم
                                        </option>
                                        <option value="1" {{ old('default_address') == '1' ? 'selected' : null }}>لا
                                        </option>
                                    </select>
                                    @error('default_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- row part in address   --}}
                        <div class="row">

                            {{-- field one --}}
                            <div class="col-sm-12 col-md-4 pt-4">
                                <div class="form-group">
                                    <label for="country_id">الدولة</label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">---</option>
                                        @forelse ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id') == $country->id ? 'selected' : null }}>
                                                {{ $country->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('country_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- field two --}}
                            <div class="col-sm-12 col-md-4 pt-4">
                                <div class="form-group">
                                    <label for="state_id">المقاطعة/المحافظة</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                    </select>
                                    @error('state_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- field three --}}
                            <div class="col-sm-12 col-md-4 pt-4">
                                <div class="form-group">
                                    <label for="city_id">المدينة</label>
                                    <select name="city_id" id="city_id" class="form-control">
                                    </select>
                                    @error('city_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- row part in address   --}}
                        <div class="row">

                            {{-- field one --}}
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="address">العنوان الاول </label>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- field two --}}
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="address2">العنوان البديل </label>
                                    <input type="text" name="address2" value="{{ old('address2') }}"
                                        class="form-control">
                                    @error('address2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        {{-- row part in address --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="zip_code">الرمز البريدي</label>
                                    <input type="text" name="zip_code" value="{{ old('zip_code') }}"
                                        class="form-control">
                                    @error('zip_code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="po_box">صندوق البريد </label>
                                    <input type="text" name="po_box" value="{{ old('po_box') }}"
                                        class="form-control">
                                    @error('po_box')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">

                        {{-- publish_start publish time field --}}
                        <div class="row">
                            <div class="col-sm-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', now()->format('Y-m-d')) }}" class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', now()->format('h:m A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- status and featured field --}}
                        <div class="row">
                            <div class="col-sm-12 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null }}>مفعل</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null }}>غير مفعل
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    {{-- submit button  --}}
                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">إضافة عنوان </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection



@section('script')
    <script src="{{ asset('backend/vendor/typeahead/bootstrap3-typeahead.min.js') }}"></script>

    {{-- related to common used for publish part  --}}
    <script>
        $(function() {



            // ======= start pickadate codeing ===========

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

            // ======= End pickadate codeing ===========

            $('.summernote').summernote({
                tabSize: 2,
                height: 120,
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

    <script>
        $(function() {

            $(".typeahead").typeahead({
                autoSelect: true,
                minLength: 3,
                delay: 400,
                displayText: function(item) {
                    return item.full_name + ' - ' + item.email;
                },
                source: function(query, process) {
                    // قم بالبحث في الرابط التالي الكويري التالي القادم من الحقل كاستمر اندرسكور نيم فقوق
                    return $.get("{{ route('admin.customers.get_customers') }}", {
                        'query': query
                    }, function(data) {
                        return process(data);
                    });
                },

                //  من الداتا المعادة قم باعطاء قيمة اي دي للحقل يوزر ايدي
                afterSelect: function(data) {
                    $('#user_id').val(data.id);
                }

            });

            populateStates();
            populateCities();

            $("#country_id").change(function() {
                populateStates();
                populateCities();
                return false;
            });

            $("#state_id").change(function() {
                populateCities();
                return false;
            });

            function populateStates() {
                let countryIdVal = $("#country_id").val() != null ? $("#country_id").val() :
                    '{{ old('country_id') }}';
                $.get("{{ route('admin.states.get_states') }}", {
                    country_id: countryIdVal
                }, function(data) {
                    $('option', $("#state_id")).remove();
                    $("#state_id").append($('<option></option>').val('').html('---'));
                    $.each(data, function(val, text) {
                        let selectVal = text.id == '{{ old('state_id') }}' ? "selected" : "";
                        $("#state_id").append($('<option' + selectVal + '></option>').val(text.id)
                            .html(text.name));
                    });
                }, "json");

            }

            function populateCities() {

                let stateIdVal = $("#state_id").val() != null ? $("#state_id").val() : '{{ old('state_id') }}';
                $.get("{{ route('admin.cities.get_cities') }}", {
                    state_id: stateIdVal
                }, function(data) {
                    $('option', $("#city_id")).remove();
                    $("#city_id").append($('<option></option>').val('').html('---'));
                    $.each(data, function(val, text) {
                        let selectVal = text.id == '{{ old('city_id') }}' ? "selected" : "";
                        $("#city_id").append($('<option' + selectVal + '></option>').val(text.id)
                            .html(text.name));
                    });
                }, "json");
            }

        });
    </script>
@endsection
