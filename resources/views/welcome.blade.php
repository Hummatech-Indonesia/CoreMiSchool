@extends('layouts.landing.layouts-landing')
@section('style')
<style>
    .banner_section .banner_text {
        color: var(--text-white);
        text-align: center;
        padding: 250px 100px 0 0;
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

    .analyze_section .analyze_image img {
        box-shadow: none;
        max-width: 100%;
        border-radius: none;
    }

</style>

<style>
    .company_logos .logo img {
        display: block;
        margin: 0 auto;
        width: 100%;
        transition: transform 0.3s ease-in-out;
        filter: none;
        opacity: 1;
    }

    .what_coustomer_says .coustomer_slide_box .avtar_profil {
        margin-top: 0px;
    }

    .faq_section .faq_panel .card-header .btn.active {
        color: var(--primary);
    }

</style>
@endsection

@section('content')

<!-- Unique features Start -->
<section class="row_am unique_section">
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <!-- h2 -->
            <h2>Fitur - Fitur </h2>
            <!-- p -->
            <p>Mischool dilengkapi dengan fitur - fitur penting untuk management sekolah, dibawah ini adalah fitur -
                fitur dari Mischool</p>
        </div>
        <div class="features_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
            <!-- card -->
            <div class="feature_card">
                <div style="text-align: start">
                    <img src="{{ asset('landing_assets/images/new/Secure-data.svg') }}" alt="image">
                </div>
                <div class="inner_text">
                    <h3 class="pt-3" style="text-align: start">E - Learning</h3>
                    <p style="text-align: start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio convallis
                        interdum. Cras id diam rhoncus,
                    </p>
                </div>
            </div>
            <!-- card -->
            <div class="feature_card">
                <div style="text-align: start">
                    <img src="{{ asset('landing_assets/images/new/Secure-data.svg') }}" alt="image">
                </div>
                <div class="inner_text">
                    <h3 class="pt-3" style="text-align: start">E - Learning</h3>
                    <p style="text-align: start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio convallis
                        interdum. Cras id diam rhoncus,
                    </p>
                </div>
            </div>
            <!-- card -->
            <div class="feature_card">
                <div style="text-align: start">
                    <img src="{{ asset('landing_assets/images/new/Secure-data.svg') }}" alt="image">
                </div>
                <div class="inner_text">
                    <h3 class="pt-3" style="text-align: start">E - Learning</h3>
                    <p style="text-align: start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio convallis
                        interdum. Cras id diam rhoncus,
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Unique features End -->

<!-- Analyze Section Strat -->
<section class="row_am analyze_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="analyze_image" data-aos="fade-in" data-aos-duration="1000">
                    <img data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100" class="" src="{{ asset('landing_assets/images/landing/about.png') }}" width="400px" alt="image">
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center ms-3">
                <div class="analyze_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                    <div class="section_title align-center">
                        <h2>Tentang Mischool</h2>
                        <p>Mischool merupakan website untuk mempermudahkan berbagai Sekolah-sekolah. Mischool adalah web
                            management sekolah yang menyediakan Fitur Absensi, Pelanggaran, E-learning, Raport, Ujian,
                            Buku Tamu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Analyze Section End -->

<!-- Interface overview-Section start -->
<section class="row_am interface_section">
    <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
        <h2>Preview Fitur MISCHOOL</h2>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typese tting indus
            orem Ipsum has beenthe standard dummy text ever since.
        </p>
    </div>
    <!-- screen slider start -->
    <div class="screen_slider" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
        <div id="screen_slider" class="owl-carousel owl-theme">
            <div class="item">
                <div class="screen_frame_img">
                    <img src="{{ asset('landing_assets/images/new/Interface-overview-01.png') }}" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="{{ asset('landing_assets/images/new/Interface-overview-02.png') }}" alt="image">
                    <h3 class="caption">Dashboard</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="{{ asset('landing_assets/images/new/Interface-overview-03.png') }}" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="{{ asset('landing_assets/images/new/Interface-overview-02.png') }}" alt="image">
                    <h3 class="caption">Dashboard</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="{{ asset('landing_assets/images/new/Interface-overview-01.png') }}" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
            <div class="item">
                <div class="screen_frame_img">
                    <img src="{{ asset('landing_assets/images/new/Interface-overview-02.png') }}" alt="image">
                    <h3 class="caption">Report Page</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- screen slider end -->
</section>
<!-- Interface overview-Section end -->

<!-- Powerful solution for your business Section Start -->
<section class="powerful_solution" data-aos="fade-in" data-aos-duration="1000">
    <section class="row_am unique_section">
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <!-- h2 -->
                <h2>Pengguna MISCHOOL</h2>
                <!-- p -->
                <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus orem Ipsum
                    has beenthe standard dummy text ever since.</p>
            </div>
            <div class="features_inner" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
                <!-- card -->
                <div class="feature_card">
                    <div class="icons">
                        <img src="{{ asset('landing_assets/images/new/features_icon_01.svg') }}" alt="image">
                        <div class="dot_block">
                            <span class="dot_anim"></span>
                            <span class="dot_anim"></span>
                            <span class="dot_anim"></span>
                        </div>
                    </div>
                    <div class="inner_text">
                        <h3>Sekolah</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                            convallis interdum. Cras id diam rhoncus,
                        </p>
                    </div>
                </div>
                <!-- card -->
                <div class="feature_card">
                    <div class="icons">
                        <img src="{{ asset('landing_assets/images/new/features_icon_01.svg') }}" alt="image">
                        <div class="dot_block">
                            <span class="dot_anim"></span>
                            <span class="dot_anim"></span>
                            <span class="dot_anim"></span>
                        </div>
                    </div>
                    <div class="inner_text">
                        <h3>Guru</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                            convallis interdum. Cras id diam rhoncus,
                        </p>
                    </div>
                </div>
                <!-- card -->
                <div class="feature_card">
                    <div class="icons">
                        <img src="{{ asset('landing_assets/images/new/features_icon_01.svg') }}" alt="image">
                        <div class="dot_block">
                            <span class="dot_anim"></span>
                            <span class="dot_anim"></span>
                            <span class="dot_anim"></span>
                        </div>
                    </div>
                    <div class="inner_text">
                        <h3>Siswa</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus felis non odio
                            convallis interdum. Cras id diam rhoncus,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Powerful solution for your business Section End -->

<!-- Trusted Section start -->
<section class="row_am trusted_section">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <h2>Mitra Mischool</h2>
            <p>Daftar - daftar sekolah yang telah bekerja sama dan menggunakan Mischool untuk management sekolah</p>
        </div>
        <!-- logos slider start -->
        <div class="company_logos" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <div id="company_slider" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('landing_assets/images/logo/logo-kanesa.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <!-- logos slider end -->
    </div>
    <!-- container end -->
</section>
<!-- Trusted Section ends -->

<!-- What Our Coustomer Section Start-->
<section class="what_coustomer_says">
    <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
            <h2>Apa yang dikatakan mereka</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting indus <br> orem Ipsum has beenthe
                standard dummy text ever since.</p>
        </div>
        <div id="coustomer_slider_white" class="owl-carousel owl-theme" data-aos="fade-in" data-aos-duration="1500">
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_01.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Shayna john</h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_02.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Mark </h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Simply dummy text of the print ing and typese tting us orem Ipsum has been lorem Ipsum.</p>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_01.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Willium Joe</h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
                </div>
            </div>
            <div class="item">
                <div class="coustomer_slide_box">
                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <div class="avtar_profil">
                                <div class="avatr">
                                    <img src="{{ asset('landing_assets/images/new/testi_03.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <h3>Shayna john</h3>
                                    <span>Careative inc.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rating">
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                                <span><i class="icofont-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the print ing and typese tting us orem Ipsum has been.</p>
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

<!-- Story-Section-Start -->
<section class="row_am latest_story" id="blog">
    <!-- container start -->
    <div class="container">
        <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
            <h2>Berita Terbaru</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe
                standard dummy.</p>
        </div>
        <!-- row start -->
        <div class="row">
            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                        <img src="{{ asset('landing_assets/images/empty/empty-news.png') }}" alt="image">
                        <span class="bg-primary text-white"><span>23</span> AUG</span>
                    </div>
                    <div class="story_text">
                        <div class="statstic text-primary">
                            <span><i class="icofont-user-suited text-primary"></i> Admin</span>
                            <span><i class="icofont-speech-comments text-primary"></i> 36 Comments</span>
                        </div>
                        <h3>Powerfull features makes
                            software awesome !</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has
                            been.</p>
                        <a href="blog-detail.html" class="btn text_btn text-primary">READ MORE <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                        <img src="{{ asset('landing_assets/images/empty/empty-news.png') }}" alt="image">
                        <span class="bg-primary text-white"><span>18</span> AUG</span>
                    </div>
                    <div class="story_text">
                        <div class="statstic text-primary">
                            <span><i class="icofont-user-suited text-primary"></i> Admin</span>
                            <span><i class="icofont-speech-comments text-primary"></i> 36 Comments</span>
                        </div>
                        <h3>Why software is globally used as best software</h3>
                        <p>Simply dummy text of the printing and typesetting industry lorem Ipsum has Lorem Ipsum is.
                        </p>
                        <a href="blog-detail.html" class="btn text_btn text-primary">READ MORE <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                        <img src="{{ asset('landing_assets/images/empty/empty-news.png') }}" alt="image">
                        <span class="bg-primary text-white"><span>9</span> AUG</span>
                    </div>
                    <div class="story_text">
                        <div class="statstic text-primary">
                            <span><i class="icofont-user-suited text-primary"></i> Admin</span>
                            <span><i class="icofont-speech-comments text-primary"></i> 36 Comments</span>
                        </div>
                        <h3>Beautiful user interface with bug free code.</h3>
                        <p>Printing and typesetting industry lorem Ipsum has Lorem simply dummy text of the.</p>
                        <a href="blog-detail.html" class="btn text_btn  text-primary">READ MORE <i class="icofont-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
    <!-- container end -->
</section>
<!-- Story-Section-end -->

<!-- FAQ-Section start -->
<section id="faqBlock" class="row_am faq_section" style="margin-bottom: 80px;">
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

@endsection
