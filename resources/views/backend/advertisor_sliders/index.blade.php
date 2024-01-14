@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">



        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    عارض الشرائح
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        عارض شرائح الاعلانات
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                @ability('admin', 'create_advertisor_sliders')
                    <a href="{{ route('admin.advertisor_sliders.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">إضافة محتوى جديد</span>
                    </a>
                @endability
            </div>

        </div>


        @include('backend.advertisor_sliders.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th class="d-none d-sm-table-cell">الكاتب</th>
                        <th class="d-none d-sm-table-cell">تاريخ النشر </th>
                        <th>الحالة</th>
                        <th class="text-center" style="width:30px;">الاعدادات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($advertisor_sliders as $slider)
                        <tr>

                            <td>
                                @if ($slider->firstMedia)
                                    <img src="{{ asset('assets/advertisor_sliders/' . $slider->firstMedia->file_name) }}"
                                        width="60" height="60" alt="{{ $slider->name }}">
                                @else
                                    <img src="{{ asset('assets/No-Image-Found.png') }}" width="60" height="60"
                                        alt="{{ $slider->name }}">
                                @endif

                            </td>
                            <td>{{ $slider->title }}</td>
                            <td class="d-none d-sm-table-cell">{{ $slider->created_by }}</td>
                            <td class="d-none d-sm-table-cell">{{ $slider->published_on->Format('Y-m-d h:i A') }}</td>
                            <td>{{ $slider->status() }}</td>
                            <td>

                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.advertisor_sliders.edit', $slider->id) }}"
                                        class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-{{ $slider->id }}').submit();}else{return false;}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <form action="{{ route('admin.advertisor_sliders.destroy', $slider->id) }}" method="post"
                                    class="d-none" id="delete-product-{{ $slider->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Products found</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="float-right">
                                {!! $advertisor_sliders->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
