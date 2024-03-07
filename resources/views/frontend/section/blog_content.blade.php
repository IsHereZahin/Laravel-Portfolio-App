<!-- blog-area -->
    <section class="blog">
        <div class="container">
            <div class="row gx-0 justify-content-center">

                @if ($blogs && count($blogs) > 0)
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset('upload/Blog/' . $blog->image) }}" alt="image"></a>
                            <div class="blog__post__tags">
                                <a href="{{ route('blog.details', $blog->id) }}">{{ $blog->category->blog_category }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                            <h3 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <a href="{{ route('blog.details', $blog->id) }}" class="read__more">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else

                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/blog/blog_post_thumb02.jpg') }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">Social</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">13 january 2021</span>
                            <h3 class="title"><a href="#">Make communication Fast and Effectively.</a></h3>
                            <a href="#" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/blog/blog_post_thumb02.jpg') }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">Social</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">13 january 2021</span>
                            <h3 class="title"><a href="#">Make communication Fast and Effectively.</a></h3>
                            <a href="#" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/blog/blog_post_thumb03.jpg') }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">Work</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">13 january 2021</span>
                            <h3 class="title"><a href="#">How to increase your productivity at work - 2021</a></h3>
                            <a href="#" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <div class="blog__button text-center">
                <a href="{{ route('blog') }}" class="btn">more blog</a>
            </div>

        </div>
    </section>
    <!-- blog-area-end -->
