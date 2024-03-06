@extends('frontend.frontend_master')
@section('content')
<style>
    /* CSS to remove button border */
    #share-button {
        border: none;
        background: none; /* Remove background color if needed */
        padding: 0; /* Adjust padding if needed */
        margin-left: 5px; /* Set the desired gap between button and count */
    }
</style>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">{{ $blog->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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


    <!-- blog-details-area -->
    <section class="standard__blog blog__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <img src="{{ asset('upload/blog/' . $blog->image) }}" alt="">
                        </div>
                        <div class="blog__details__content services__details__content">
                            <ul class="blog__post__meta">
                                @if(Carbon\Carbon::parse($blog->created_at)->diffInDays() <= 1)
                                    <li><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                                @else
                                    <li><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</li>
                                @endif
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>

                                <li class="post-share">
                                    <span id="copy-message" style="display: none;">URL copied to clipboard!</span>
                                    <span id="already-copied-message" style="display: none;">URL already copied!</span>
                                    <button id="share-button"><i class="fal fa-share-all"></i> <span id="share-count">(18)</span></button>
                                </li>

                            </ul>
                            <h2 class="title">{{ $blog->title }}</h2>
                            <div>{!! $blog->description !!}</div>
                        </div>
                        <div class="blog__details__bottom">
                            <ul class="blog__details__tag">
                                <li class="title">Tag:</li>

                                <li class="tags-list">
                                    @php
                                        $tags = explode(',', $blog->tags);
                                    @endphp
                                    @foreach($tags as $tag)
                                        <a href="#">{{ $tag }}</a>
                                    @endforeach
                                </li>

                            </ul>
                            <ul class="blog__details__social">
                                <li class="title">Share :</li>
                                <li class="social-icons">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="comment comment__wrap">
                            <div class="comment__title">
                                <h4 class="title">(04) Comment</h4>
                            </div>
                            <ul class="comment__list">

                                <li class="comment__item">
                                    <div class="comment__thumb">
                                        <img src="{{ asset('frontend/assets/img/blog/comment_thumb01.png') }}" alt="">
                                    </div>
                                    <div class="comment__content">
                                        <div class="comment__avatar__info">
                                            <div class="info">
                                                <h4 class="title">Rohan De Spond</h4>
                                                <span class="date">25 january 2021</span>
                                            </div>
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                                    </div>
                                </li>

                                <li class="comment__item">
                                    <div class="comment__thumb">
                                        <img src="{{ asset('frontend/assets/img/blog/comment_thumb03.png') }}" alt="">
                                    </div>
                                    <div class="comment__content">
                                        <div class="comment__avatar__info">
                                            <div class="info">
                                                <h4 class="title">Alexardy Ditartina</h4>
                                                <span class="date">25 january 2021</span>
                                            </div>
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comment__form">

                            <div class="comment__title">
                                <h4 class="title">Write your comment</h4>
                            </div>

                            <form action="#">

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Enter your name*">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" placeholder="Enter your mail*">
                                    </div>
                                </div>

                                <textarea name="message" id="message" placeholder="Enter your Massage*"></textarea>
                                <div class="form-grp checkbox-grp">
                                    <input type="checkbox" id="checkbox">
                                    <label for="checkbox">Save my name, email, and website in this browser for the next time I comment.</label>
                                </div>
                                <button type="submit" class="btn">post a comment</button>
                            </form>

                        </div>
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

                                @foreach ($recentblogs as $blog)
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="{{ route('blog.details', $blog->id) }}"><img src="{{ asset('upload/blog/' . $blog->image) }}" alt="image"></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h5>
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

                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @foreach ($blogcategory as $name)
                                <li class="sidebar__cat__item"><a href="{{ route('blog') }}">{{ $name->blog_category }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Comment --}}
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

                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul class="sidebar__tags">
                                @foreach($uniqueTags as $tag)
                                    <li><a href="#">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->

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

    <script>
        var copied = false; // Flag to track if URL has been copied

        document.getElementById('share-button').addEventListener('click', function() {
            var button = document.getElementById('share-button');
            var countElement = document.getElementById('share-count');

            // Check if the URL has already been copied
            if (copied) {
                var alreadyCopiedMessage = document.getElementById('already-copied-message');
                alreadyCopiedMessage.style.display = 'inline';
                setTimeout(function() {
                    alreadyCopiedMessage.style.display = 'none';
                }, 2000); // Adjust the delay (in milliseconds) as needed
                return; // Do nothing if URL has already been copied
            }

            var url = window.location.href;

            // Create a temporary input element
            var tempInput = document.createElement('input');
            tempInput.setAttribute('value', url);
            document.body.appendChild(tempInput);

            // Select and copy the URL
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Update the number after copying the URL
            var count = parseInt(countElement.textContent.substring(1, countElement.textContent.length - 1));
            count++;
            countElement.textContent = '(' + count + ')';

            // Show copied message inline
            var copyMessage = document.getElementById('copy-message');
            copyMessage.style.display = 'inline';

            // Set the copied flag to true
            copied = true;

            // Hide message after a delay
            setTimeout(function() {
                copyMessage.style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>


@endsection
