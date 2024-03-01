    <!-- testimonial-area -->
    <section class="testimonial">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial__wrap">
                        <div class="section__title">
                            <span class="sub-title">06 - Client Feedback</span>
                            <h2 class="title">Happy clients feedback</h2>
                        </div>
                        <div class="testimonial__active">

                            @if ($feedback && count($feedback) > 0)
                            @foreach ($feedback as $data)
                            <div class="testimonial__item">
                                <div class="testimonial__icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial__content">
                                    <p>{{ $data->message }}</p>
                                    <div class="testimonial__avatar">
                                        <span>{{ $data->name }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else
                            <div class="testimonial__item">
                                <div class="testimonial__icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial__content">
                                    <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                    <div class="testimonial__avatar">
                                        <span>Rasalina De Wiliamson</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial__item">
                                <div class="testimonial__icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial__content">
                                    <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                    <div class="testimonial__avatar">
                                        <span>Rasalina De Wiliamson</span>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="testimonial__arrow"></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <ul class="about__icons__wrap">
                        @for ($i = 0; $i < 7; $i++)
                          <li>
                            <img class="light" src="{{ isset($feedback[$i]) ? asset('upload/clients_feedback/' . $feedback[$i]->image) : 'images/client_no_img.png' }}" alt="{{ $feedback[$i]->alt_text ?? 'Client Feedback' }}">
                          </li>
                        @endfor
                      </ul>
                                      </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
