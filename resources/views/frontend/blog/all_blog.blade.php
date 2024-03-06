@extends('frontend.frontend_master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Recent Article</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @if ($blogs && count($blogs) > 0)
                    @foreach ($blogs as $index => $blog)
                        @php
                            // Generate a random number between 1 and 100
                            $randomCount = ($index === 0) ? rand(100, 200) : rand(1, 100);
                        @endphp
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset('upload/blog/' . $blog->image) }}" alt=""></a>
                            <a href="{{ route('blog.details', $blog->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ asset('frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                                <span class="post__by">By : <a href="#">Halina Spond</a></span>
                            </div>
                            <h2 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h2>
                            <p>{{ $blog->short_description }}</p>
                            <ul class="blog__post__meta" style="margin-top: -20px">
                                @if(Carbon\Carbon::parse($blog->created_at)->diffInDays() <= 1)
                                    <li><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                                @else
                                    <li><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</li>
                                @endif
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                <li class="post-share">
                                    <a href="{{ route('blog.details', $blog->id) }}"><i class="fal fa-eye"></i> <span id="blogCount_{{ $index }}"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <script>
                        // Set the random number for each blog post
                        document.getElementById("blogCount_{{ $index }}").textContent = "(" + {{ $randomCount }} + ")";
                    </script>
                    @endforeach

                    @else
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/blog_thumb01.jpg') }}" alt=""></a>
                            <a href="blog-details.html" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ asset('frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                                <span class="post__by">By : <a href="#">Halina Spond</a></span>
                            </div>
                            <h2 class="title"><a href="blog-details.html">Best website traffice Booster with great tools.</a></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> 25 january 2021</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/blog_thumb02.jpg') }}" alt=""></a>
                            <a href="blog-details.html" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ asset('frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                                <span class="post__by">By : <a href="#">Rasalina D.</a></span>
                            </div>
                            <h2 class="title"><a href="blog-details.html">How you should start product design</a></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> 28 january 2021</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (12)</a></li>
                                <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/blog_thumb03.jpg') }}" alt=""></a>
                            <a href="blog-details.html" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ asset('frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                                <span class="post__by">By : <a href="#">Halina Spond</a></span>
                            </div>
                            <h2 class="title"><a href="blog-details.html">How to start sketch after build a website</a></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> 28 january 2021</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (12)</a></li>
                                <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/blog_thumb04.jpg') }}" alt=""></a>
                            <a href="blog-details.html" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ asset('frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                                <span class="post__by">By : <a href="#">Halina Spond</a></span>
                            </div>
                            <h2 class="title"><a href="blog-details.html">Best website traffics Booster with great tools.</a></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> 28 january 2021</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (12)</a></li>
                                <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="pagination-wrap">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Blog</h4>
                            <ul class="rc__post">

                                @if ($latestblog && count($latestblog) > 0)
                                @foreach ($latestblog as $blog)
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset('upload/blog/' . $blog->image) }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{$blog->title}}</a></h5>
                                        <span class="post-date">
                                            @if(Carbon\Carbon::parse($blog->created_at)->diffInDays() <= 1)
                                                <i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                                            @else
                                                <i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                                            @endif
                                        </span>
                                    </div>
                                </li>
                                @endforeach

                                @else
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb01.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">Best website traffick booster with
                                        great tools.</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                    </div>
                                </li>

                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb02.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">How to become a best sale marketer
                                        in a year!</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                    </div>
                                </li>

                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb03.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">Google take latest step & catch the
                                        black SEO</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                    </div>
                                </li>

                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb04.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">Businesses are thriving societies. Time for urgent change</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                    </div>
                                </li>

                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb05.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">TikTok influencer marketing:How to
                                        work with influencer</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                    </div>
                                </li>
                                @endif

                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @if ($blogcategory)
                                @foreach ($blogcategory as $name)
                                <li class="sidebar__cat__item"><a href="#">{{ $name->blog_category }}</a></li>
                                @endforeach
                                @else
                                <li class="sidebar__cat__item"><a href="#">Web Development (4)</a></li>
                                <li class="sidebar__cat__item"><a href="#">Product Design (9)</a></li>
                                <li class="sidebar__cat__item"><a href="#">Animation (6)</a></li>
                                <li class="sidebar__cat__item"><a href="#">Ui/Ux Design (8)</a></li>
                                <li class="sidebar__cat__item"><a href="#">Branding Design (12)</a></li>
                                <li class="sidebar__cat__item"><a href="#">Web Design (6)</a></li>
                                <li class="sidebar__cat__item"><a href="#">Logo Design (6)</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Comment</h4>
                            <ul class="sidebar__comment">
                                <li class="sidebar__comment__item">
                                    <a href="blog-details.html">Rasalina Sponde</a>
                                    <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                </li>
                                <li class="sidebar__comment__item">
                                    <a href="blog-details.html">Rasalina Sponde</a>
                                    <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                </li>
                                <li class="sidebar__comment__item">
                                    <a href="blog-details.html">Rasalina Sponde</a>
                                    <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                </li>
                                <li class="sidebar__comment__item">
                                    <a href="blog-details.html">Rasalina Sponde</a>
                                    <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                </li>
                            </ul>
                        </div>

                        @if ($blog)
                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul class="sidebar__tags">
                                @foreach($uniqueTags as $tag)
                                    <li><a href="#">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul class="sidebar__tags">
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">apps</a></li>
                                <li><a href="#">landing page</a></li>
                                <li><a href="#">data</a></li>
                                <li><a href="#">website</a></li>
                                <li><a href="#">book</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">product design</a></li>
                                <li><a href="#">landing page</a></li>
                                <li><a href="#">data</a></li>
                            </ul>
                        </div>
                        @endif

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


    <!-- contact-area -->
    <section class="homeContact homeContact__style__two">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="#">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter mail*">
                                <input type="number" placeholder="Enter number*">
                                <textarea name="message" placeholder="Enter Massage*"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

@endsection
