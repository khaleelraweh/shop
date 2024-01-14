@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    المدونة
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        إدارة المنشورات
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                @ability('admin', 'create_news')
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">إضافة محتوى جديد</span>
                    </a>
                @endability
            </div>

        </div>

        {{-- filter form part  --}}

        @include('backend.news.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th>الكاتب</th>
                        <th>الحالة</th>
                        <th class="d-none d-sm-table-cell"> الوصف</th>
                        <th class="d-none d-sm-table-cell">تاريخ النشر </th>
                        <th class="text-center" style="width:30px;">الاعدادات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $new)
                        <tr>
                            <td>
                                @if ($new->firstMedia)
                                    <img src="{{ asset('assets/news/' . $new->firstMedia->file_name) }}" width="60"
                                        height="60" alt="{{ $new->name }}">
                                @else
                                    <img src="{{ asset('assets/No-Image-Found.png') }}" width="60" height="60"
                                        alt="{{ $new->name }}">
                                @endif

                            </td>
                            <td>
                                {{ Str::limit($new->name, 50) }}
                            </td>
                            <td>{{ $new->created_by }}</td>
                            <td>{{ $new->status() }}</td>
                            <td class="d-none d-sm-table-cell">{!! Str::limit($new->description, 50, ' ...') !!}</td>
                            <td class="d-none d-sm-table-cell">{{ $new->published_on->format('Y-m-d h:i a') ?? '-' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-new-{{ $new->id }}').submit();}else{return false;}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <form action="{{ route('admin.news.destroy', $new->id) }}" method="post" class="d-none"
                                    id="delete-new-{{ $new->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No news found</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $news->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
