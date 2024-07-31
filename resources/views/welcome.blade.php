@extends('layouts.landing.layouts-landing')
@section('style')
<style>
    .banner_section .banner_text {
        color: var(--text-white);
        text-align: center;
        padding: 250px 100px 0 0;
    }

    .unique_section .features_inner .feature_card {
        text-align: start;
    }

    .banner_section .banner_text {
        color: var(--text-white);
        text-align: center;
        padding: 120px 50px 50px 50px;
    }

    .btn_main {
        background: linear-gradient(45deg, #00bfff, #1e90ff);
        /* Gradasi biru */
        color: white;
        /* Warna teks putih */
        border: none;
        /* Hilangkan border */
        padding: 10px 20px;
        /* Padding untuk ukuran tombol */
        font-size: 16px;
        /* Ukuran font */
        cursor: pointer;
        /* Ubah cursor menjadi pointer */
        transition: background 0.3s;
        /* Animasi transisi saat hover */
    }

    .btn_main:hover {
        background: linear-gradient(45deg, #1e90ff, #00bfff);
        /* Ubah gradasi saat hover */
    }

</style>
@endsection

@section('content')
<!-- Unique features Start -->
@include('landing.fiturs')
<!-- Unique features End -->

<!-- Analyze Section Strat -->
<section class="row_am analyze_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="analyze_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                    <span class="icon"><img src="{{ asset('landing_assets/images/new/Analyze_Icon.svg') }}" alt="image"></span>
                    <div class="section_title">
                        <h2>Analyze your data with powerful tool</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and types
                            etting industry lorem Ipsum has been the industrys standard dummy text ever since the when
                            an unknown
                            printer took a galley of type and.</p>
                    </div>
                    <ul>
                        <li data-aos="fade-up" data-aos-duration="2000">
                            <h3>Carefully designed</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typ esetting industry lorem Ipsum
                                has.</p>
                        </li>
                        <li data-aos="fade-up" data-aos-duration="2000">
                            <h3>Seamless Sync</h3>
                            <p>Simply dummy text of the printing and typesetting inustry lorem Ipsum has Lorem dollar
                                summit.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="analyze_image" data-aos="fade-in" data-aos-duration="1000">
                    <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="moving_animation" src="images/new/analyze-data-01.png" alt="image">
                    <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="moving_animation" src="images/new/analyze-data-02.png" alt="image">
                    <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="" src="images/new/analyze-data-03.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Analyze Section End -->

<!-- Collaborate Section Strat -->
<section class="row_am collaborate_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="collaborate_image" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                    <div class="img_block" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                        <img class="icon_img moving_animation" src="{{ asset('landing_assets/images/new/Collaborate-icon_1.png') }}" alt="image">
                        <img src="images/new/Collaborate-01.png" alt="image">
                    </div>
                    <div class="img_block" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                        <img src="images/new/Collaborate-02.png" alt="image">
                        <img class="icon_img moving_animation" src="{{ asset('landing_assets/images/new/Collaborate-icon_2.png') }}" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="collaborate_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                    <span class="icon"><img src="images/new/securely.svg" alt="image"></span>
                    <div class="section_title">
                        <h2>Collaborate securely everything</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and types
                            etting industry lorem Ipsum has been the indu has been the industrys standard dummy text
                            ever since
                            the when an unknown printer took a galley of type and.</p>
                    </div>
                    <ul>
                        <li data-aos="fade-up" data-aos-duration="2000">
                            <h3>Sync followers</h3>
                            <p>Simply dummy text of the printing and typesetting
                                inustry lorem Ipsum has Lorem dollar summit.</p>
                        </li>
                        <li data-aos="fade-up" data-aos-duration="2000">
                            <h3>Globally connected</h3>
                            <p>Simply dummy text of the printing and typesetting
                                inustry lorem Ipsum has Lorem dollar summit.</p>
                        </li>
                    </ul>
                    <a href="service-detail.html" data-aos="fade-up" data-aos-duration="2000" class="btn btn_main">READ
                        MORE <i class="icofont-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Analyze Section End -->

<!-- Communication Section Strat -->
<section class="row_am communication_section">
    <div class="communication_inner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="communication_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                        <span class="icon"><img src="{{ asset('landing_assets/images/new/comunication.svg') }}" alt="image"></span>
                        <div class="section_title">
                            <h2>Easy communication wherever you are live</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and types
                                etting industry lorem Ipsum has been the industrys standard dummy text ever since the
                                when an unknown
                                printer took a galley of type and.</p>
                        </div>
                        <ul>
                            <li data-aos="fade-up" data-aos-duration="2000">
                                <h3>Carefully designed</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typ esetting industry lorem
                                    Ipsum has.</p>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="2000">
                                <h3>Seamless Sync</h3>
                                <p>Simply dummy text of the printing and typesetting inustry lorem Ipsum has Lorem
                                    dollar summit.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="communication_image" data-aos="fade-in" data-aos-duration="1000">
                        <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="moving_animation" src="{{ asset('landing_assets/images/new/cominication-data-03.png') }}" alt="image">
                        <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="moving_animation" src="{{ asset('landing_assets/images/new/cominication-data-02.png') }}" alt="image">
                        <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="" src="{{ asset('landing_assets/images/new/cominication-data-01.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Communication Section End -->

<!-- Advance Feature-section-Start  -->
<section class="row_am advance_feature_section" id="getstarted">
    <!-- container start -->
    <div class="container">
        <div class="advance_feature_inner" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">

            <!-- vertical line animation -->
            <div class="anim_line dark_bg">
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line_2.png') }}" alt="anim_line"></span>
            </div>

            <!-- Section Title -->
            <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                <h2>Advaced features</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus orem Ipsum has beenthe
                    standard
                    dummy text ever since.</p>
            </div>
            <!-- row start -->
            <div class="row">
                <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="feature_block">
                        <div class="icon">
                            <img src="{{ asset('landing_assets/images/new/Secure-data.svg') }}" alt="image">
                        </div>
                        <div class="text_info">
                            <h3>Secure data</h3>
                            <p>Lorem Ipsum is simply dummy text of the prin
                                ting and type setting indus ideas orem Ipsum has beenthe standard dummy text ever since
                                the when an
                                type setting indus ideas own.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="feature_block">
                        <div class="icon">
                            <img src="images/new/Fully-functional.svg" alt="image">
                        </div>
                        <div class="text_info">
                            <h3>Fully functional</h3>
                            <p>Simply dummy text of the printing and type se
                                tting indus ideas orem Ipsum has beenthe stanard dummy text ever since the when an type
                                setting
                                indus iLorem Ipsum is.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="feature_block">
                        <div class="icon">
                            <img src="images/new/Live-chat.svg" alt="image">
                        </div>
                        <div class="text_info">
                            <h3>Live chat</h3>
                            <p>Lorem Ipsum is simply dummy text of the prin
                                ting and type setting indus ideas orem Ipsum has beenthe standard dummy text ever since
                                the when an
                                type setting indus ideas own.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="feature_block">
                        <div class="icon">
                            <img src="images/new/24-7-Support.svg" alt="image">
                        </div>
                        <div class="text_info">
                            <h3>24-7 Support</h3>
                            <p>Lorem Ipsum is simply dummy text of the prin
                                ting and type setting indus ideas orem Ipsum has beenthe standard dummy text ever since
                                the when an
                                type setting indus ideas own.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
    </div>
    <!-- container end -->
</section>

<!-- Powerful solution for your business Section Start -->
<section class="powerful_solution" data-aos="fade-in" data-aos-duration="1000">

    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1000">
            <h2>Powerful solution for your business</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus orem Ipsum has beenthe standard
                dummy text ever since.</p>
        </div>
        <div class="quality_lable" data-aos="fade-up" data-aos-duration="1000">
            <ul>
                <li>
                    <p><i class="icofont-check-circled"></i>
                        Highly customizable</p>
                </li>
                <li>
                    <p><i class="icofont-check-circled"></i>
                        Pixel perfect design</p>
                </li>
                <li>
                    <p><i class="icofont-check-circled"></i>
                        Worldwide support</p>
                </li>
            </ul>
        </div>
        <div class="counters_block" data-aos="fade-up" data-aos-duration="1000">
            <ul class="app_statstic" id="counter" data-aos="fade-in" data-aos-duration="1500">
                <li>
                    <div class="text">
                        <p><span class="counter-value" data-count="450">0</span><span>+</span></p>
                        <p>Million of client logins monthly</p>
                    </div>
                </li>
                <li>
                    <div class="text">
                        <p><span class="counter-value" data-count="120">0 </span><span>+</span></p>
                        <p>Languages and countries</p>
                    </div>
                </li>
                <li>
                    <div class="text">
                        <p><span class="counter-value" data-count="135">1500</span><span>+</span></p>
                        <p>Percent yearly turnover increase</p>
                    </div>
                </li>
                <li>
                    <div class="text">
                        <p><span class="counter-value" data-count="324">0</span><span>+</span></p>
                        <p>Million active accounts</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="images_gallery_block row">
            <div class="gl_block col-md-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="img"><img src="images/new/Powerful-solution-01.png" alt="image"></div>
                <div class="img"><img src="images/new/Powerful-solution-02.png" alt="image"></div>
            </div>
            <div class="gl_block col-md-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="img"><img src="images/new/Powerful-solution-03.png" alt="image"></div>
                <div class="img"><img src="images/new/Powerful-solution-04.png" alt="image"></div>
                <div class="img"><img src="images/new/Powerful-solution-05.png" alt="image"></div>
            </div>
            <div class="gl_block col-md-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
                <div class="img"><img src="images/new/Powerful-solution-06.png" alt="image"></div>
                <div class="img"><img src="images/new/Powerful-solution-07.png" alt="image"></div>
            </div>
            <div class="gl_block col-md-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="img"><img src="images/new/Powerful-solution-08.png" alt="image"></div>
                <div class="img"><img src="images/new/Powerful-solution-09.png" alt="image"></div>
            </div>
        </div>
    </div>
</section>
<!-- Powerful solution for your business Section End -->

<!-- Easy integration Section Start -->
<section class="row_am integration_section">
    <div class="integration_section_inner">
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Easy integration <br> with popular platforms</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus orem Ipsum has beenthe
                    standard
                    dummy.</p>
            </div>
            <div class="platforms_list">
                <div class="row">
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_01.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Mailchimp</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_02.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Google Drive</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_03.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Whatsapp</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_02.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Google Drive</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_04.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Mailchimp</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_05.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Dropbox</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_06.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Skype</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_07.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Wordpress</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_08.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Smashing</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_09.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Firefox</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_10.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Yahoo</p>
                            </div>
                        </div>
                    </div>
                    <!-- list Block Strat -->
                    <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list_block">
                            <div class="icon">
                                <img src="images/new/platforms_11.png" alt="image">
                            </div>
                            <div class="caption">
                                <p>Bing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Easy integration Section End -->

<!-- What Our Coustomer Section Start-->
<section class="what_coustomer_says">
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
            <h2>What our customer says</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus <br> orem Ipsum has beenthe
                standard dummy text ever since.</p>
        </div>
        <div id="coustomer_slider_white" class="owl-carousel owl-theme" data-aos="fade-in" data-aos-duration="1500">
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="rating">
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                    <div class="avtar_profil">
                        <div class="avatr">
                            <img src="images/new/testi_01.png" alt="image">
                        </div>
                        <div class="text">
                            <h3>Shayna john</h3>
                            <span>Careative inc.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="rating">
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                    </div>
                    <p>Simply dummy text of the print ing and typese tting us orem Ipsum has been lorem Ipsum.</p>
                    <div class="avtar_profil">
                        <div class="avatr">
                            <img src="images/new/testi_02.png" alt="image">
                        </div>
                        <div class="text">
                            <h3>Mark </h3>
                            <span>Careative inc.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="rating">
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                    <div class="avtar_profil">
                        <div class="avatr">
                            <img src="images/new/testi_01.png" alt="image">
                        </div>
                        <div class="text">
                            <h3>Willium Joe</h3>
                            <span>Careative inc.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="rating">
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                    <div class="avtar_profil">
                        <div class="avatr">
                            <img src="images/new/testi_03.png" alt="image">
                        </div>
                        <div class="text">
                            <h3>Shayna john</h3>
                            <span>Careative inc.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review_summery">
            <div class="rating">
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
                <span><i class="icofont-star"></i></span>
            </div>
            <p><span>5.0 / 5.0 -</span> <a href="testimonial.html">3689 Total User Reviews <i class="icofont-arrow-right"></i></a></p>
        </div>
    </div>
</section>
<!-- What Our Coustomer Section End-->

<!-- Trusted Section start -->
<section class="row_am trusted_section">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <h2>Trusted by <span>150+</span> companies</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe
                standard dummy.</p>
        </div>
        <!-- logos slider start -->
        <div class="company_logos" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <div id="company_slider" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="logo">
                        <img src="images/paypal.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/spoty.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/shopboat.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/slack.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/envato.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/paypal.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/spoty.png" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="images/shopboat.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <!-- logos slider end -->
    </div>
    <!-- container end -->
</section>
<!-- Trusted Section ends -->

<!-- Pricing-Section -->
<section class="row_am pricing_section" id="pricing" data-aos="fade-in" data-aos-duration="1000">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <h2>Best plans, pay what you use</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus <br> orem Ipsum has beenthe
                standard dummy text ever since.</p>
        </div>
        <!-- toggle button -->
        <div class="toggle_block" data-aos="fade-up" data-aos-duration="1500">
            <span class="month active">Monthly</span>
            <div class="tog_block">
                <span class="tog_btn"></span>
            </div>
            <span class="years">Yearly</span>
            <span class="offer">50% off</span>
        </div>

        <!-- pricing box  monthly start -->
        <div class="pricing_pannel monthly_plan active" data-aos="fade-up" data-aos-duration="1500">
            <!-- row start -->
            <div class="row">
                <!-- pricing box 1 -->
                <div class="col-md-4">
                    <div class="pricing_block blockwhite">
                        <div class="icon">
                            <img src="images/new/Free-Trial-01.svg" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="pkg_name">
                            <h3>Free Trial</h3>
                            <span>For the basics</span>
                        </div>
                        <span class="price">$0<span>/Month</span></span>
                        <ul class="benifits">
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>7 Days free trial</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>2 platform of your choice</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>10 GB Dedicated Hosting free</p>
                            </li>
                            <li class="exclude">
                                <p><i class="icofont-close-circled"></i>Unlimited updates</p>
                            </li>
                            <li class="exclude">
                                <p><i class="icofont-close-circled"></i>Live support</p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn_main">BUY NOW <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>

                <!-- pricing box 2 -->
                <div class="col-md-4">
                    <div class="pricing_block highlited_block">
                        <div class="icon">
                            <img src="images/new/unlimited.png" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="pkg_name">
                            <h3>Unlimited</h3>
                            <span>For the professionals</span>
                        </div>
                        <span class="price">$99<span>/Month</span></span>
                        <ul class="benifits">
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>7 Days free trial</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>2 platform of your choice</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>10 GB Dedicated Hosting free</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>Unlimited updates</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>Live support</p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn_main">BUY NOW <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>

                <!-- pricing box 3 -->
                <div class="col-md-4">
                    <div class="pricing_block blockwhite">
                        <div class="icon">
                            <img src="images/new/Premium.svg" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="pkg_name">
                            <h3>Premium</h3>
                            <span>For small team</span>
                        </div>
                        <span class="price">$55<span>/Month</span></span>
                        <ul class="benifits">
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>7 Days free trial</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>2 platform of your choice</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>10 GB Dedicated Hosting free</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>Unlimited updates</p>
                            </li>
                            <li class="exclude">
                                <p><i class="icofont-close-circled"></i>Live support</p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn_main">BUY NOW <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- pricing box monthly end -->

        <!-- pricing box yearly start -->
        <div class="pricing_pannel yearly_plan" data-aos="fade-up" data-aos-duration="1500">
            <div class="row">

                <!-- pricing box 1 -->
                <div class="col-md-4">
                    <div class="pricing_block">
                        <div class="icon">
                            <img src="images/new/Free-Trial-01.svg" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="pkg_name">
                            <h3>Free Trial</h3>
                            <span>For the basics</span>
                        </div>
                        <span class="price">$0<span>/Year</span></span>
                        <ul class="benifits">
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>7 Days free trial</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>2 platform of your choice</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>10 GB Dedicated Hosting free</p>
                            </li>
                            <li class="exclude">
                                <p><i class="icofont-close-circled"></i>Unlimited updates</p>
                            </li>
                            <li class="exclude">
                                <p><i class="icofont-close-circled"></i>Live support</p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn_main">BUY NOW <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>

                <!-- pricing box 2 -->
                <div class="col-md-4">
                    <div class="pricing_block highlited_block">
                        <div class="icon">
                            <img src="images/new/unlimited.png" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="pkg_name">
                            <h3>Unlimited</h3>
                            <span>For the professionals</span>
                        </div>
                        <span class="price">$999<span>/Year</span></span>
                        <ul class="benifits">
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>7 Days free trial</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>2 platform of your choice</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>10 GB Dedicated Hosting free</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>Unlimited updates</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>Live support</p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn_main">BUY NOW <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>

                <!-- pricing box 3 -->
                <div class="col-md-4">
                    <div class="pricing_block">
                        <div class="icon">
                            <img src="images/new/Premium.svg" alt="image">
                            <div class="dot_block">
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                                <span class="dot_anim"></span>
                            </div>
                        </div>
                        <div class="pkg_name">
                            <h3>Premium</h3>
                            <span>For small team</span>
                        </div>
                        <span class="price">$555<span>/Year</span></span>
                        <ul class="benifits">
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>7 Days free trial</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>2 platform of your choice</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>10 GB Dedicated Hosting free</p>
                            </li>
                            <li class="include">
                                <p><i class="icofont-check-circled"></i>Unlimited updates</p>
                            </li>
                            <li class="exclude">
                                <p><i class="icofont-close-circled"></i>Live support</p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn_main">BUY NOW <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- container start end -->
</section>
<!-- Pricing-Section end -->

<!-- FAQ-Section start -->
<section id="faqBlock" class="row_am faq_section">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <!-- h2 -->
            <h2><span>FAQ</span> - Frequently Asked Questions</h2>
            <!-- p -->
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe
                standard dummy.</p>
        </div>
        <!-- faq data -->
        <div class="faq_panel">
            <div class="accordion" id="accordionExample">
                <div class="card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link active" data-toggle="collapse" data-target="#collapseOne">
                                <i class="icon_faq icofont-plus"></i> How can i pay ?</button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum
                                has. been the
                                industrys standard dummy text ever since the when an unknown printer took a galley of
                                type and
                                scrambled it to make a type specimen book. It has survived not only five cen turies but
                                also the
                                leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                    </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="icon_faq icofont-plus"></i> How to setup account
                                ?</button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum
                                has. been the
                                industrys standard dummy text ever since the when an unknown printer took a galley of
                                type and
                                scrambled it to make a type specimen book. It has survived not only five cen turies but
                                also the
                                leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                    </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="icon_faq icofont-plus"></i>What is process to
                                get refund
                                ?</button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum
                                has. been the
                                industrys standard dummy text ever since the when an unknown printer took a galley of
                                type and
                                scrambled it to make a type specimen book. It has survived not only five cen turies but
                                also the
                                leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                    </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"><i class="icon_faq icofont-plus"></i>What is process to
                                get refund
                                ?</button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum
                                has. been the
                                industrys standard dummy text ever since the when an unknown printer took a galley of
                                type and
                                scrambled it to make a type specimen book. It has survived not only five cen turies but
                                also the
                                leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
<!-- FAQ-Section end -->


<!-- Interface overview-Section start -->
<section class="row_am interface_section">
    <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
        <h2>Interface overview</h2>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typese tting indus orem Ipsum has beenthe standard
            dummy text ever since.
        </p>
    </div>
    <!-- screen slider start -->
    <div class="screen_slider" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
        <div id="screen_slider" class="owl-carousel owl-theme">
            <div class="item">
                <div class="screen_frame_img">
                    <img src="images/new/Interface-overview-01.png" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="images/new/Interface-overview-02.png" alt="image">
                    <h3 class="caption">Dashboard</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="images/new/Interface-overview-03.png" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="images/new/Interface-overview-02.png" alt="image">
                    <h3 class="caption">Dashboard</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="images/new/Interface-overview-01.png" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="images/new/Interface-overview-03.png" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- screen slider end -->
</section>
<!-- Interface overview-Section end -->

<!-- Start Your Free Trial Section Start -->
<section class="free_trial_section" data-aos="fade-in" data-aos-duration="1500">
    <div class="free_inner">
        <!-- vertical line animation -->
        <div class="anim_line dark_bg">
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
            <span><img src="images/anim_line_2.png" alt="anim_line"></span>
        </div>
        <div class="text">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
                <h2>Start Your 14-Day Free Trial</h2>
                <p>Instant free download from apple and play store orem Ipsum is simply dummy
                    text of the printing.</p>
            </div>
            <ul data-aos="fade-up" data-aos-duration="1500">
                <li>
                    <p><i class="icofont-check-circled"></i>Free 14-day trial</p>
                </li>
                <li>
                    <p><i class="icofont-check-circled"></i>No credit card required</p>
                </li>
                <li>
                    <p><i class="icofont-check-circled"></i>Support 24/7</p>
                </li>
                <li>
                    <p><i class="icofont-check-circled"></i>Cancel anytime</p>
                </li>
            </ul>
            <div class="start_and_watch" data-aos="fade-up" data-aos-duration="1500">
                <a href="contact-us.html" class="btn btn_main">GET STARTED <i class="icofont-arrow-right"></i></a>
                <a class="popup-youtube play-button" data-url="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&amp;mute=1" data-toggle="modal" data-target="#myModal" title="XJj2PbenIsU">
                    <div class="play_btn">
                        <img src="images/play_icon-white.png" alt="image">
                        <div class="waves-block">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                    <span>WATCH PROMO</span>
                </a>
            </div>
        </div>
        <div class="side_img">
            <img src="images/new/start-free-side-img.png" alt="image">
        </div>
    </div>
</section>
<!-- Start Your Free Trial Section End -->


<!-- Story-Section-Start -->
<section class="row_am latest_story" id="blog">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
            <h2>Read latest <span>story</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe
                standard dummy.</p>
        </div>
        <!-- row start -->
        <div class="row">
            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                        <img src="images/new/story-01.png" alt="image">
                        <span><span>23</span> AUG</span>
                    </div>
                    <div class="story_text">
                        <div class="statstic">
                            <span><i class="icofont-user-suited"></i> Admin</span>
                            <span><i class="icofont-speech-comments"></i> 36 Comments</span>
                        </div>
                        <h3>Powerfull features makes
                            software awesome !</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has
                            been.</p>
                        <a href="blog-detail.html" class="btn text_btn">READ MORE <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                        <img src="images/new/story-02.png" alt="image">
                        <span><span>18</span> AUG</span>
                    </div>
                    <div class="story_text">
                        <div class="statstic">
                            <span><i class="icofont-user-suited"></i> Admin</span>
                            <span><i class="icofont-speech-comments"></i> 36 Comments</span>
                        </div>
                        <h3>Why software is globally used as best software</h3>
                        <p>Simply dummy text of the printing and typesetting industry lorem Ipsum has Lorem Ipsum is.
                        </p>
                        <a href="blog-detail.html" class="btn text_btn">READ MORE <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                        <img src="images/new/story-03.png" alt="image">
                        <span><span>9</span> AUG</span>
                    </div>
                    <div class="story_text">
                        <div class="statstic">
                            <span><i class="icofont-user-suited"></i> Admin</span>
                            <span><i class="icofont-speech-comments"></i> 36 Comments</span>
                        </div>
                        <h3>Beautiful user interface with bug free code.</h3>
                        <p>Printing and typesetting industry lorem Ipsum has Lorem simply dummy text of the.</p>
                        <a href="blog-detail.html" class="btn text_btn">READ MORE <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
    <!-- container end -->
</section>
<!-- Story-Section-end -->

<!-- Need support Section Start -->
<section class="need_section">
    <div class="need_section_inner">
        <div class="container">
            <div class="need_block">
                <div class="need_text">
                    <div class="section_title">
                        <h2>Need support ? contact our team</h2>
                        <p><i class="icofont-clock-time"></i> Mon - Fri: 9 am to 5 am</p>
                    </div>
                </div>
                <div class="need_action">
                    <a href="tel:1234567899" class="btn"><i class="icofont-phone-circle"></i> +1 123 456 7890</a>
                    <a href="#faqBlock" class="faq_btn">Read The FAQ </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Need support Section End -->
@endsection
