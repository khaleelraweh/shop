@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    حسابات العملاء
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        حسابات العملاء
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                @ability('admin', 'create_customers')
                    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">إضافة محتوى جديد</span>
                    </a>
                @endability
            </div>

        </div>

        {{-- filter form part  --}}

        @include('backend.customers.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">صورة</th>
                        <th>الاسم</th>
                        <th class="d-none d-sm-table-cell">الايميل و الموبايل</th>
                        <th>الحالة</th>
                        <th class="d-none d-sm-table-cell">تاريخ الانشاء</th>
                        <th class="text-center" style="width:30px;">الإعدادات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                @if ($customer->user_image != '')
                                    <img src="{{ asset('assets/users/' . $customer->user_image) }}" width="60"
                                        height="60" alt="{{ $customer->full_name }}">
                                @else
                                    <img src="{{ asset('assets/users/avatar.svg') }}" width="60" height="60"
                                        alt="{{ $customer->full_name }}">
                                @endif
                            </td>
                            <td>
                                {{ $customer->full_name }} <br>
                                <strong>{{ $customer->username }}</strong>

                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $customer->email }} <br>
                                {{ $customer->mobile }}
                            </td>
                            <td>{{ $customer->status() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $customer->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-customer-{{ $customer->id }}').submit();}else{return false;}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="post"
                                    class="d-none" id="delete-customer-{{ $customer->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Customers found</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $customers->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
