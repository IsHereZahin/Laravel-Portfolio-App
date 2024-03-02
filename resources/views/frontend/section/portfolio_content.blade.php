    <!-- portfolio-area -->
    <section class="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center">
                        <span class="sub-title">04 - Portfolio</span>
                        <h2 class="title">All creative work</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="portfolioTabContent">
            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col">
                            <div class="portfolio__active">

                                @if ($portfolio && count($portfolio) > 0)
                                @foreach ($portfolio as $data)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('upload/portfolio/' . $data->image) }}" alt="Image">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $data->name }}</span>
                                        <h4 class="title"><a href="{{ route('portfolio.details', $data->id) }}">{{ $data->title }}</a></h4>
                                        <a href="{{ route('portfolio.details', $data->id) }}" class="link">Case Study</a>
                                    </div>
                                </div>
                                @endforeach

                                @else
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('frontend/assets/img/portfolio/portfolio_img02.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>Web Design</span>
                                        <h4 class="title"><a href="#">Banking Management System</a></h4>
                                        <a href="#" class="link">Case Study</a>
                                    </div>
                                </div>
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('frontend/assets/img/portfolio/portfolio_img03.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>UX/UI Design</span>
                                        <h4 class="title"><a href="#">Banking Management System</a></h4>
                                        <a href="#" class="link">Case Study</a>
                                    </div>
                                </div>
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('frontend/assets/img/portfolio/portfolio_img04.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>Web Development</span>
                                        <h4 class="title"><a href="#">Banking Management System</a></h4>
                                        <a href="#" class="link">Case Study</a>
                                    </div>
                                </div>
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('frontend/assets/img/portfolio/portfolio_img05.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>Web Development</span>
                                        <h4 class="title"><a href="#">Banking Management System</a></h4>
                                        <a href="#" class="link">Case Study</a>
                                    </div>
                                </div>
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('frontend/assets/img/portfolio/portfolio_img06.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>Web Development</span>
                                        <h4 class="title"><a href="#">Banking Management System</a></h4>
                                        <a href="#" class="link">Case Study</a>
                                    </div>
                                </div>
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset('frontend/assets/img/portfolio/portfolio_img07.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>Web Development</span>
                                        <h4 class="title"><a href="#">Banking Management System</a></h4>
                                        <a href="#" class="link">Case Study</a>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-area-end -->
