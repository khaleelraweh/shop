@extends('layouts.app')

@section('content')
    <div class="container">

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
                            <a href="{{ route('frontend.blog') }}">
                                المدونة
                            </a>
                            <i class="fa fa-solid fa-chevron-left chevron"></i>
                        </li>

                        <li class="active">

                            {{ $post->name }}

                        </li>

                        {{-- <li>
                            <a href="{{ route('frontend.card', $card->slug) }}" class="active">
                                {{ $card->name }}
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="holder">
                <div class="container">
                    {{-- <div class="page-title text-center">
                        <h1>منشورات المدونة </h1>
                    </div> --}}

                    <div class="row flex-column-reverse flex-md-row">

                        <div class="col-md-4 aside aside--sidebar aside--right">

                            @if (count($tags) > 0)
                                <div class="aside-block">
                                    <h2 class="text-uppercase">الكلمات الشائعة</h2>
                                    <ul class="tags-list">

                                        @foreach ($tags as $tag)
                                            <li><a
                                                    href="{{ route('frontend.blog_tag', $tag->slug) }}">{{ $tag->name }}</a>
                                            </li>
                                        @endforeach

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
                                                    {{ $rand_post->name }}
                                                </a></h4>
                                            {{-- <a href="#" class="post-prw-comments"><i class="icon-chat"></i>15
                                                comments</a> --}}
                                        </div>
                                    @empty
                                    @endforelse





                                </div>
                            @endif



                            {{-- <div class="aside-block">
                                <h2 class="text-uppercase">الارشيف</h2>
                                <ul class="list list--nomarker">
                                    <li><a href="#">January 2018</a></li>
                                    <li><a href="#">February 2018</a></li>
                                    <li><a href="#">March 2018</a></li>
                                </ul>
                            </div> --}}

                        </div>

                        <div class="col-md-8 aside aside--content">
                            <div class="post-full">
                                <h2 class="post-title">{{ $post->name }}</h2>
                                <div class="post-links">
                                    <div class="post-date"><i
                                            class="icon-calendar"></i>{{ $post->published_on->format('Y-m-d') }}</div>
                                    <a href="#" class="post-link">
                                        {{ $post->created_by ? 'بواسطة ' . $post->created_by : '' }}</a>
                                    {{-- <a href="#postComments" class="js-scroll-to"><i class="icon-chat"></i>15
                                        تعليق(ات)</a> --}}
                                </div>
                                <div class="post-img image-container" style="padding-bottom: 60.95%">
                                    <img class="lazyload fade-up-fast"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-src="{{ asset('assets/news/' . $post->firstMedia?->file_name) }}"
                                        alt="{{ $post->name }}">
                                </div>
                                <div class="post-text">

                                    {!! $post->description !!}

                                </div>
                                <div class="post-bot">

                                    <ul class="tags-list post-tags-list">
                                        @foreach ($post->tags as $tag)
                                            <li><a
                                                    href="{{ route('frontend.blog_tag', $tag->slug) }}">{{ $tag->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('frontend.blog_tag', $tag->slug) }}" class="post-share">
                                        <script src="../../../https@s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d92f2937e44d337"></script>
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="related-posts">
                                <div class="title-with-arrows">
                                    <h3 class="h2-style">
                                        المنشورات ذات الصلة
                                    </h3>
                                    <div class="carousel-arrows"></div>
                                </div>

                                {{-- <div class="post-prws post-prws-carousel js-post-prws-carousel"
                                    data-slick='{"slidesToShow": 1, "responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'> --}}

                                <div class="post-prws post-prws-carousel post-prws-carousel--single js-post-prws-carousel"
                                    data-slick='{"slidesToShow": 1, "responsive": [{"breakpoint": 1200,"settings": {"slidesToShow": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>

                                    @forelse ($related_posts as $related_post)
                                        <div class="post-prw">
                                            <div class="row vert-margin-middle">

                                                <div class="post-prw-img col-sm-6">
                                                    <a href="{{ route('frontend.blog.post', $related_post->slug) }}"
                                                        class="d-block image-container" style="padding-bottom: 88.92%">
                                                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                            data-src="{{ asset('assets/news/' . $related_post->firstMedia?->file_name) }}"
                                                            class="lazyload fade-up" alt="Blog Title" />
                                                    </a>
                                                </div>

                                                <div class="post-prw-text col-sm-6">
                                                    <h4 class="post-prw-title">
                                                        <a href="{{ route('frontend.blog.post', $related_post->slug) }}">
                                                            {{ $related_post->name }} </a>
                                                    </h4>
                                                    <div class="post-prw-links">
                                                        <div class="post-prw-date">
                                                            <i
                                                                class="icon-calendar1"></i><span>{{ $related_post->published_on }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="post-prw-teaser">
                                                        {{-- {!! $related_post->description !!} --}}
                                                        {!! Str::limit($post->description, 150, ' ...') !!}
                                                    </div>
                                                    <div class="post-prw-btn">
                                                        <a href="#" class="btn btn--md">اقرأ المزيد</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>

                            {{-- <div class="post-comments mt-3 mt-md-4" id="postComments">
                                <h3 class="h2-style">اكتب تعليقا</h3>
                                <div class="post-comment">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="post-comment-author-img">
                                                <img src="{{ asset('frontend/images/blog/comment-author.webp') }}"
                                                    alt="" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="post-comment-date"><i class="icon-calendar"></i>October 27, 2020
                                            </div>
                                            <div class="post-comment-author"><a href="#">مايلز بلاك</a></div>
                                            <div class="post-comment-text">
                                                <p>
                                                    حسنًا، كم أشعر بالروعة الآن. رائع على أقل تقدير. الزبون
                                                    كانت الخدمة رائعة، على الجانب الأكبر أنا نفسي للغاية
                                                    واعية، فريقك من السيدات الجميلات الطيبات جعلني أشعر بذلك
                                                    خاص. لقد وجدت بالفعل مجموعتين رائعتين ولم أستطع العثور على أي منهما
                                                    أكثر سعادة.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comment">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="post-comment-author-img">
                                                <img src="{{ asset('frontend/images/blog/comment-author-2.webp') }}"
                                                    alt="" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="post-comment-date"><i class="icon-calendar"></i>October 15, 2020
                                            </div>
                                            <div class="post-comment-author"><a href="#">جيني باركر</a></div>
                                            <div class="post-comment-text">
                                                <p>
                                                    لقد كان دعم العملاء ممتازًا، مثل أي مشكلات صغيرة أو أخطاء بسيطة أو
                                                    حتى الطلبات الصغيرة تم تلبيتها جميعًا بطريقة سريعة ومهنية
                                                    وفي الوقت المناسب.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="post-comment-form mt-3 mt-md-4">
                                <h3 class="h2-style">اترك تعليقك</h3>
                                <form action="#" class="comment-form">
                                    <div class="form-group">
                                        <div class="row vert-margin-middle">
                                            <div class="col-lg">
                                                <input type="text" name="name" class="form-control form-control--sm"
                                                    placeholder="الاسم" required>
                                            </div>
                                            <div class="col-lg">
                                                <input type="text" name="email" class="form-control form-control--sm"
                                                    placeholder="الايميل" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control form-control--sm textarea--height-200" name="message" placeholder="الرسالة" required></textarea>
                                    </div>
                                    <button class="btn" type="submit">إرسال تعليق</button>
                                </form>
                            </div> --}}

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

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
