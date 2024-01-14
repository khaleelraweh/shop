@extends('layouts.app')

@section('style')
    <style>
        .pagination>li>a,
        .pagination>li>span {
            background-color: white;
            color: black;
            border-color: white;
        }

        .pagination>li>a:hover,
        .pagination>li>a:focus,
        .pagination>li>span:hover,
        .pagination>li>span:focus {
            background: #dc3c01;
            border-color: #dc3c01;
            color: black;
        }

        .page-item.active .page-link,
        .page-item.active .page-link:hover {
            background: #dc3c01;
            border-color: #dc3c01;
            color: black;
        }

        .page-link:focus {
            box-shadow: 0 0 0 0.2rem #dc3c01;
        }
    </style>
@endsection

@section('content')
    {{-- <div class="container"> --}}

    <div class="page-content">

        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumb pref">
                    <li>
                        <a href="{{ route('frontend.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>

                    <li>
                        المدونة
                    </li>

                </ul>
            </div>
        </div>

        <div class="holder">
            <div class="container">

                <div class="row ">

                    <div class="col-md-4 aside aside--sidebar aside--right aside--sticky js-sticky-collision">
                        <div class="aside-content">


                            @if (count($tags) > 0)
                                <div class="aside-block">
                                    <h2 class="text-uppercase">الكلمات الشائعة</h2>
                                    <ul class="tags-list">

                                        @forelse ($tags as $tag)
                                            <li><a
                                                    href="{{ route('frontend.blog_tag', $tag->slug) }}">{{ $tag->name }}</a>
                                            </li>
                                        @empty
                                        @endforelse

                                    </ul>
                                </div>
                            @endif

                            @if (count($random_posts) > 0)
                                <div class="aside-block">
                                    <h2 class="text-uppercase">اخترنا لك </h2>

                                    @forelse ($random_posts as $rand_post)
                                        <div class="post-prw-simple-sm">
                                            <a href="{{ route('frontend.blog.post', $rand_post->slug) }}"
                                                class="post-prw-img">
                                                <img style="height: 200px"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/news/' . $rand_post->firstMedia?->file_name) }}"
                                                    class="lazyload fade-up" alt="{{ $rand_post->name }}">
                                            </a>
                                            <div class="post-prw-links">
                                                <div class="post-prw-date"><i class="icon-calendar"></i>
                                                    {{ $rand_post->published_on->format('Y-F-d') }}
                                                </div>
                                                <a href="{{ route('frontend.blog.post', $rand_post->slug) }}"
                                                    class="post-prw-author">
                                                    {{ $rand_post->created_by ? 'بواسطة ' . $rand_post->created_by : '' }}
                                                </a>
                                            </div>
                                            <h4 class="post-prw-title"><a
                                                    href="{{ route('frontend.blog.post', $rand_post->slug) }}">موضوع
                                                    {{ $rand_post->name }}</a>
                                            </h4>

                                            {{-- <a href="#" class="post-prw-comments"><i class="icon-chat"></i>15
                                                comments</a> --}}
                                        </div>
                                    @empty
                                    @endforelse





                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8 aside aside--content">

                        <div class="post-prws-listing">

                            @forelse ($blog as $post)
                                <div class="post-prw">
                                    <div class="row vert-margin-middle">
                                        <div class="post-prw-img col-md-6">
                                            <a href="blog-post.html">
                                                <img style="height: 240px"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{ asset('assets/news/' . $post->firstMedia?->file_name) }}"
                                                    class="lazyload
                                                    fade-up"
                                                    alt="{{ $post->name }}">
                                            </a>
                                        </div>

                                        <div class="post-prw-text col-md-6">
                                            <div class="post-prw-links">
                                                <div class="post-prw-date"><i
                                                        class="icon-calendar"></i>{{ $post->published_on->format('Y - d - F ') }}
                                                </div>
                                                {{-- <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div> --}}
                                            </div>
                                            <h4 class="post-prw-title">
                                                <a href="{{ route('frontend.blog.post', $post->slug) }}">
                                                    {{ $post->name }}
                                                </a>
                                            </h4>
                                            <div class="post-prw-teaser">
                                                {!! Str::limit($post->description, 150, ' ...') !!}
                                            </div>
                                            <div class="post-prw-btn">
                                                <a href="{{ route('frontend.blog.post', $post->slug) }}"
                                                    class="btn btn--sm">إقراء اكثر</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                لم يتم اضافة اي مدونة الى الان
                            @endforelse




                        </div>



                        <!-- PAGINATION-->
                        {!! $blog->appends(request()->all())->onEachSide(3)->links() !!}

                    </div>



                </div>
            </div>
        </div>
    </div>

    {{-- </div> --}}

    <div class="holder">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-tag "></i>
                        </div>
                        <div class="text">
                            <h4>أسعارنا الأفضل</h4>
                            {{-- <p>
                                سيتم تسليم طلبك خلال 3-5 أيام عمل بعد كل ذلك
                                العناصر الخاصة بك متاحة
                            </p> --}}
                        </div>
                    </div>

                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-shopping"></i>
                        </div>
                        <div class="text">
                            <h4>عروضنا الأقوى</h4>
                        </div>
                    </div>

                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-call-center"></i>
                        </div>
                        <div class="text">
                            <h4>خدمة عملاء متميزة</h4>

                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-shopping-1"></i>
                        </div>
                        <div class="text">
                            <h4>منتجات تناسب احتياجك</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
