<section class="services">
    <div class="container">
      <div class="services__title__wrap">
        <div class="row align-items-center justify-content-between">
          <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="section__title">
              <span class="sub-title">02 - my Services</span>
              <h2 class="title">Creates amazing digital experiences</h2>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-4">
            <div class="services__arrow"></div>
          </div>
        </div>
      </div>
      <div class="row gx-0 services__active">

        @if ($experience && count($experience) > 0)
          @foreach($experience as $data)
            <div class="col-xl-3">
              <div class="services__item">
                <div class="services__thumb">
                  <a href="{{ route('experience.details', $data->id) }}""><img src="{{ asset('upload/experience/blog/' . $data->image) }}" alt=""></a>
                </div>
                <div class="services__content">
                  <div class="services__icon">
                    <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon02.png') }}" alt="">
                  </div>
                  <h3 class="title"><a href="{{ route('experience.details', $data->id) }}"">{{ $data->title }}</a></h3>
                  {!! $data->short_description !!}
                  <a href="{{ route('experience.details', $data->id) }}"" class="btn border-btn">Read more</a>
                </div>
              </div>
            </div>
          @endforeach
        @else

                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/images/services_img02.jpg') }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon02.png') }}" alt="">
                            </div>
                            <h3 class="title"><a href="#">Business Strategy</a></h3>
                            <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.</p>
                            <ul class="services__list">
                                <li>Research & Data</li>
                                <li>Branding & Positioning</li>
                                <li>Business Consulting</li>
                                <li>Go To Market</li>
                            </ul>
                            <a href="#" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/images/services_img02.jpg') }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon02.png') }}" alt="">
                                <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon02.png') }}" alt="">
                            </div>
                            <h3 class="title"><a href="#">Brand Strategy</a></h3>
                            <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.</p>
                            <ul class="services__list">
                                <li>User Research & Testing</li>
                                <li>UX Design</li>
                                <li>Visual Design</li>
                                <li>Information Architecture</li>
                            </ul>
                            <a href="#" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/images/services_img03.jpg') }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon03.png') }}" alt="">
                                <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon03.png') }}" alt="">
                            </div>
                            <h3 class="title"><a href="#">Product Design</a></h3>
                            <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.</p>
                            <ul class="services__list">
                                <li>User Research & Testing</li>
                                <li>UX Design</li>
                                <li>Visual Design</li>
                                <li>Information Architecture</li>
                            </ul>
                            <a href="#" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/images/services_img04.jpg') }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon04.png') }}" alt="">
                                <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon04.png') }}" alt="">
                            </div>
                            <h3 class="title"><a href="#">Visual Design</a></h3>
                            <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.</p>
                            <ul class="services__list">
                                <li>User Research & Testing</li>
                                <li>UX Design</li>
                                <li>Visual Design</li>
                                <li>Information Architecture</li>
                            </ul>
                            <a href="#" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="#"><img src="{{ asset('frontend/assets/img/images/services_img03.jpg') }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light" src="{{ asset('frontend/assets/img/icons/services_light_icon02.png') }}" alt="">
                                <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon02.png') }}" alt="">
                            </div>
                            <h3 class="title"><a href="#">Web Development</a></h3>
                            <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a forward-looking plan.</p>
                            <ul class="services__list">
                                <li>User Research & Testing</li>
                                <li>UX Design</li>
                                <li>Visual Design</li>
                                <li>Information Architecture</li>
                            </ul>
                            <a href="#" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>
    <!-- services-area-end -->
