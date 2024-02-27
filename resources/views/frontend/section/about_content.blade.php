    <!-- about-area -->
    <section id="aboutSection" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="about__icons__wrap">

                        <li>
                            <img class="light" src="{{ isset($images[0]) ? asset('upload/about/multiimage/' . $images[0]->multi_image) : 'frontend/assets/img/icons/skeatch_light.png' }}" alt="Sketch">
                        </li>

                        <li>
                            <img class="light" src="{{ isset($images[1]) ? asset('upload/about/multiimage/' . $images[1]->multi_image) : 'frontend/assets/img/icons/illustrator_light.png' }}" alt="Sketch">
                        </li>

                        <li>
                            <img class="light" src="{{ isset($images[2]) ? asset('upload/about/multiimage/' . $images[1]->multi_image) : 'frontend/assets/img/icons/hotjar_light.png' }}" alt="Sketch">
                        </li>

                        <li>
                            <img class="light" src="{{ isset($images[3]) ? asset('upload/about/multiimage/' . $images[1]->multi_image) : 'frontend/assets/img/icons/invision_light.png' }}" alt="Sketch">
                        </li>

                        <li>
                            <img class="light" src="{{ isset($images[4]) ? asset('upload/about/multiimage/' . $images[1]->multi_image) : 'frontend/assets/img/icons/photoshop_light.png' }}" alt="Sketch">
                        </li>

                        <li>
                            <img class="light" src="{{ isset($images[5]) ? asset('upload/about/multiimage/' . $images[1]->multi_image) : 'frontend/assets/img/icons/figma_light.png' }}" alt="Sketch">
                        </li>
                        
                        <li>
                            <img class="light" src="{{ isset($images[6]) ? asset('upload/about/multiimage/' . $images[1]->multi_image) : 'frontend/assets/img/icons/illustrator_light.png' }}" alt="Sketch">
                        </li>

                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <div class="section__title">
                            <span class="sub-title">01 - About me</span>
                            <h2 class="title">{{ $about->title ?? 'I have transform your ideas into remarkable digital products' }}</h2>
                        </div>
                        <div class="about__exp">
                            <div class="about__exp__icon">
                                <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                            </div>
                            <div class="about__exp__content">
                                <p>{{ $about->short_title ?? '20+ Years Experience In this game, Means Product Designing' }}</p>
                            </div>
                        </div>
                        <p class="desc">{{ $about->short_description ?? 'I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer' }}</p>
                        <a href="{{ $about->button_url ?? '#' }}" class="btn">{{ $about->button_name ?? 'Download my resume' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->
