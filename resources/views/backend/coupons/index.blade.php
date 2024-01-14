@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    كوبونات الخصم
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        كوبونات الخصم
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                @ability('admin', 'create_coupons')
                    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">إضافة محتوى جديد</span>
                    </a>
                @endability
            </div>

        </div>

        {{-- filter form part  --}}

        @include('backend.coupons.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>اسم الكوبون</th>
                        <th>قيمة الخصم</th>
                        <th class="d-none d-sm-table-cell">عدد مرات الاستخدام</th>
                        <th>تاريخ الصلاحية </th>
                        <th class="d-none d-sm-table-cell">اكبر من </th>
                        <th class="d-none d-sm-table-cell">حالة الكوبون</th>
                        <th class="d-none d-sm-table-cell">تاريخ الانشاء </th>
                        <th class="text-center" style="width:30px;">الاعدادات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->value }} {{ $coupon->type == 'fixed' ? '$' : '%' }}</td>
                            <td class="d-none d-sm-table-cell">{{ $coupon->used_times . '/' . $coupon->use_times }}</td>
                            <td>{{ $coupon->start_date != '' ? $coupon->start_date->format('Y-m-d') . '  -  ' . $coupon->expire_date->format('Y-m-d') : '-' }}
                            </td>
                            <td class="d-none d-sm-table-cell">{{ $coupon->greater_than ?? '-' }}</td>
                            <td class="d-none d-sm-table-cell">{{ $coupon->status() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $coupon->created_at->format('Y-m-d h:i a') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-coupon-{{ $coupon->id }}').submit();}else{return false;}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="post"
                                    class="d-none" id="delete-product-coupon-{{ $coupon->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No Coupons found</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="float-right">
                                {!! $coupons->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
