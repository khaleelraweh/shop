@extends('layouts.admin')

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    تعديل بطاقة : ({{ $cardCategory->name }})
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.card_categories.index') }}">
                            إدارة البطائق
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- body part  --}}
        <div class="card-body">
            <form action="{{ route('admin.card_categories.update', $cardCategory->id) }}" method="post"
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
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                            aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                </ul>

                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">

                    {{-- تاب بيانات المحتوي --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        <div class="row">

                            {{-- البيانات الاساسية --}}
                            <div class="col-md-7 col-sm-12 ">

                                {{-- عنوان التصنيف  --}}
                                <div class="row">
                                    <div class="col-sm-12 pt-4">
                                        <label for="name" class="control-label ">
                                            العنوان
                                            <span class="require red">*</span>
                                        </label>

                                        <div class="form-group">
                                            <input type="text" id="name" name="name"
                                                value="{{ old('name', $cardCategory->name) }}" class="form-control"
                                                placeholder="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- الوصف  --}}
                                <div class="row">
                                    <div class="col-sm-12 pt-4">
                                        <label for="description" class="control-label ">
                                            <span>التفاصيل</span>
                                            <span class="require red">*</span>
                                        </label>
                                        <div class="form-group">
                                            <textarea name="description" rows="3" class="form-control summernote">
                                                {!! old('description', $cardCategory->description) !!}
                                            </textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- مرفق الصورة --}}
                            <div class="col-md-5 col-sm-12 ">

                                {{-- الصورة  --}}
                                <div class="row">
                                    <div class="col-sm-12 pt-4">
                                        <label for="images" class="control-label ">
                                            <span>صورة</span>
                                            <span class="require red">*</span>
                                        </label>
                                        <div class="file-loading">
                                            <input type="file" name="images[]" id="category_image"
                                                class="file-input-overview " multiple>
                                            <span class="form-text text-muted">Image width should be 500px x 500px </span>
                                            @error('images')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- تاب بيانات النشر --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">

                        {{-- حالة التصنيف --}}
                        <div class="row">
                            <div class="col-md-12 col-sm-12 pt-4">
                                <label for="status" class="control-label ">
                                    <span>الحالة</span>
                                    <span class="require red">*</span>
                                </label>
                                <select name="status" class="form-control">
                                    <option value="">---</option>
                                    <option value="1"
                                        {{ old('status', $cardCategory->status) == '1' ? 'selected' : null }}>مفعل</option>
                                    <option value="0"
                                        {{ old('status', $cardCategory->status) == '0' ? 'selected' : null }}>غير مفعل
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', \Carbon\Carbon::parse($cardCategory->published_on)->Format('Y-m-d')) }}"
                                        class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12  pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', \Carbon\Carbon::parse($cardCategory->published_on)->Format('h:i A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 pt-4">
                                <label for="featured" class="control-label ">
                                    <span>المفضلة</span>
                                    <span class="require red">*</span>
                                </label>
                                <select name="featured" class="form-control">
                                    <option value="">---</option>
                                    <option value="1"
                                        {{ old('featured', $cardCategory->featured) == '1' ? 'selected' : null }}>نعم
                                    </option>
                                    <option value="0"
                                        {{ old('featured', $cardCategory->featured) == '0' ? 'selected' : null }}> لا
                                    </option>
                                </select>
                                @error('featured')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>


                {{-- submit part --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group pt-3 mx-3">
                            <button type="submit" name="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>

    </div>
@endsection


@section('script')
    <script>
        $(function() {

            $("#category_image").fileinput({
                theme: "fa5",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                // اضافات للتعامل مع الصورة عند التعديل علي احد اقسام المنتجات
                initialPreview: [
                    @if ($cardCategory->photo()->count() > 0)
                        @if ($cardCategory->photo->file_name != '')
                            "{{ asset('assets/card_categories/' . $cardCategory->photo->file_name) }}",
                        @endif
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($cardCategory->photo()->count() > 0)
                        @if ($cardCategory->photo->file_name != '')
                            {
                                caption: "{{ $cardCategory->photo->file_name }}",
                                size: '111',
                                width: "120px",
                                // url : الراوت المستخدم لحذف الصورة
                                url: "{{ route('admin.card_categories.remove_image', ['image_id' => $cardCategory->photo->id, 'product_category_id' => $cardCategory->id, '_token' => csrf_token()]) }}",

                                key: {{ $cardCategory->id }}
                            }
                        @endif
                    @endif
                ]
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


        });
    </script>
@endsection
