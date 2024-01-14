@extends('layouts.admin')


@section('content')

    <div class="row">

        <div class="col-12">

            <div class="card">

                {{-- breadcrumb part  --}}
                <div class="card-header py-3 d-flex justify-content-between">
                    <div class="card-naving">
                        <h3 class="font-weight-bold text-primary">
                            <i class="fa fa-folder"></i>
                            تصنيف طرق الدقع
                        </h3>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    الرئيسية
                                </a>
                                <i class="fa fa-solid fa-chevron-left chevron"></i>
                            </li>
                            <li>
                                إدارة تصنيفات طرق الدفع
                            </li>
                        </ul>
                    </div>

                    <div class="ml-auto">
                        @ability('admin', 'create_product_categories')
                            <a href="{{ route('admin.payment_categories.create') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus-square"></i>
                                </span>
                                <span class="text">إضافة محتوى جديد</span>
                            </a>
                        @endability
                    </div>

                </div>

                <div class="card-body">

                    {{-- filter form part  --}}
                    @include('backend.payment_categories.filter.filter')

                    {{-- table part --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>اسم الصنف</th>
                                    <th>الكاتب</th>
                                    <th>الحالة</th>
                                    <th class="d-none d-sm-table-cell">تاريخ النشر</th>
                                    <th class="text-center" style="width:30px;">الإعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            {{-- <img src="{{asset('assets/product_categories/girls-s-electronies_16999441521.jpg')}}" alt="not found"> --}}
                                            {{ $category->name_ar }}
                                        </td>
                                        <td>{{ $category->created_by }}</td>
                                        <td><span
                                                class="btn btn-round  rounded-pill btn-success btn-xs">{{ $category->status() }}</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">{{ $category->published_on }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.payment_categories.edit', $category->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-category-{{ $category->id }}').submit();}else{return false;}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.payment_categories.destroy', $category->id) }}"
                                                method="post" class="d-none"
                                                id="delete-product-category-{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No categories found</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="float-right">
                                        {!! $categories->appends(request()->all())->links() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
