@extends('layouts.admin')



@section('content')

    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    إدارة الدول
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        الدول
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                @ability('admin', 'create_countries')
                    <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">إضافة محتوى جديد</span>
                    </a>
                @endability
            </div>

        </div>

        {{-- filter form part  --}}

        @include('backend.countries.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-sm-2">إسم الدولة</th>
                        <th class="d-none d-sm-table-cell">عدد المقاطعات</th>
                        <th class="d-none d-sm-table-cell">emoji</th>
                        <th>الحالة</th>
                        <th class="text-center" style="width:30px;">الإعدادات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($countries as $country)
                        <tr>
                            <td class="col-sm-2">{{ $country->name_native }}</td>
                            <td class="d-none d-sm-table-cell">{{ $country->states->count() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $country->emoji }}</td>
                            <td>{{ $country->status() }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-country-{{ $country->id }}').submit();}else{return false;}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="post"
                                    class="d-none" id="delete-country-{{ $country->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No countrys found</td>
                        </tr>
                    @endforelse
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="float-right">
                                {{-- {!! $countries->appends(request()->all())->onEachSide(0)->links() !!} --}}
                                {!! $countries->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>
@endsection
