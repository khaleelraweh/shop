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
                            إدارة البطائق
                        </h3>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    الرئيسية
                                </a>
                                <i class="fa fa-solid fa-chevron-left chevron"></i>
                            </li>
                            <li>
                                إدارة البطائق
                            </li>
                        </ul>
                    </div>

                    <div class="ml-auto">
                        @ability('admin', 'create_card_categories')
                            <a href="{{ route('admin.card_categories.create') }}" class="btn btn-primary">
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
                    @include('backend.card_categories.filter.filter')

                    {{-- table part --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th>اسم الصنف</th>
                                    <th>عدد الباقات</th>
                                    <th class="d-none d-sm-table-cell">الكاتب</th>
                                    <th class="d-none d-sm-table-cell">الحالة</th>
                                    <th class="d-none d-sm-table-cell">تاريخ الانشاء</th>
                                    <th class="text-center" style="width:30px;">الإعدادات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            @if ($category->firstMedia)
                                                {{-- <td><img src="{{asset('assets/products/'.$product->photos()->first()->file_name)}}" width="60" alt="product Image"> </td> --}}
                                                <img src="{{ asset('assets/card_categories/' . $category->firstMedia->file_name) }}"
                                                    width="60" height="60" alt="{{ $category->name }}">
                                            @else
                                                <img src="{{ asset('assets/No-Image-Found.png') }}" width="60"
                                                    height="60" alt="{{ $category->name }}">
                                            @endif

                                        </td>

                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>{{ $category->products_count }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $category->created_by }}</td>
                                        <td class="d-none d-sm-table-cell"><span
                                                class="btn btn-round  rounded-pill btn-success btn-xs">{{ $category->status() }}</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">{{ $category->created_at }}</td>
                                        <td>

                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.card_categories.edit', $category->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-card-{{ $category->id }}').submit();}else{return false;}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.card_categories.destroy', $category->id) }}"
                                                method="post" class="d-none" id="delete-card-{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Cards found</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <tfoot>
                            <tr>
                                <td colspan="7">
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
