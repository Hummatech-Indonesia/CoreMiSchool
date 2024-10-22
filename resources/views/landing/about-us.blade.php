@extends('layouts.landing.layouts.app')
@section('style')
    <style>
        .sl_two_colom_image {
            margin-bottom: 50px;
            margin-right: 100px;
        }
    </style>
@endsection
@section('banner')
    <!-- Bread Crumb -->
    <div class="bread_crumb" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">

        <div class="container">

            <!-- vertical line animation -->
            <div class="anim_line dark_bg">
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
                <span><img src="{{ asset('landing_assets/images/anim_line.png') }}" alt="anim_line"></span>
            </div>


            <div class="bred_text">
                <h1 class="text-primary">Tentang Kami</h1>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><span>»</span></li>
                    <li><a href="/about-us">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="about_us_page_section">
        <div class="dotes_anim_bloack">
            <div class="dots dotes_1"></div>
            <div class="dots dotes_2"></div>
            <div class="dots dotes_3"></div>
            <div class="dots dotes_4"></div>
            <div class="dots dotes_5"></div>
            <div class="dots dotes_6"></div>
            <div class="dots dotes_7"></div>
            <div class="dots dotes_8"></div>
        </div>
        <div class="container">
            <div class="about_block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section_title" data-aos="fade-in" data-aos-duration="1500">
                            <h2>Tentang Primadona</h2>
                            <p>Primadona adalah website manajemen sekolah yang dirancang untuk memudahkan pengelolaan
                                sekolah. Website ini dilengkapi dengan fitur-fitur seperti absensi, jurnal mengajar, jurnal
                                staff, pelanggaran dan perbaikan, tanggapan siswa, serta buku tamu.</p>
                            {{-- <p>Primadona merupakan platform yang memudahkan berbagai sekolah.
                                Primadona adalah platform manajemen akademik & data operasional yang menyediakan Fitur Absensi,
                                Pelanggaran, Perbaikan, Jurnal Mengajar & Jurnal Staf, Tanggapan Siwa, dan Buku Tamu

                                </p> --}}
                        </div>
                    </div>
                    <!-- image -->
                    <div class="col-md-6">
                        <div class="sl_two_colom_image" data-aos="fade-in" data-aos-duration="1000">
                            <img src="{{ asset('landing_assets/images/landing/about-2.png') }}" alt="image"
                                style="height: 587px">
                        </div>
                    </div>
                </div>
            </div>
            <div id="counter">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="counter_outer" data-aos="fade-up" data-aos-duration="1500">
                            <div class="counter_box">
                                <p><span class="counter-value" data-count="450">0</span><span>+</span></p>
                                <p style="font-size: 20px">Sekolah</p>
                                <p style="font-size: 14px">Kami telah melayani lebih dari 450 sekolah, memberikan solusi
                                    manajemen yang efektif dan efisien untuk meningkatkan kualitas pendidikan.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="counter_outer" data-aos="fade-up" data-aos-duration="1500">
                            <div class="counter_box">
                                <p><span class="counter-value" data-count="120">0</span><span>+</span></p>
                                <p style="font-size: 20px">Guru</p>
                                <p style="font-size: 14px">Kami memiliki lebih dari 120 guru berpengalaman yang berdedikasi
                                    untuk memberikan pendidikan berkualitas dan mendukung perkembangan siswa.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="counter_outer" data-aos="fade-up" data-aos-duration="1500">
                            <div class="counter_box">
                                <p><span class="counter-value" data-count="135">0</span><span>+</span></p>
                                <p style="font-size: 20px">Siswa</p>
                                <p style="font-size: 14px">Kami bangga memiliki lebih dari 135 siswa yang aktif dan
                                    berprestasi, siap menghadapi tantangan di masa depan dengan semangat belajar yang
                                    tinggi.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row_am service_list_two_colom">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-5">
                    <div class="sl_two_colom_image" data-aos="fade-in" data-aos-duration="1000">
                        <img src="{{ asset('landing_assets/images/landing/about-3.png') }}" alt="image">
                    </div>
                </div>

                <div class="col-md-6 mt-5">
                    <div class="sl_two_colom_text" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                        <div class="section_title">
                            <h2>Kenapa Memilih Primadona</h2>
                            <p>Primadona adalah solusi manajemen sekolah terdepan yang memudahkan pengelolaan sekolah dengan
                                fitur-fitur unggulan seperti berikut :</p>
                        </div>

                        <div class="service_list_point">
                            <ul data-aos="fade-up" data-aos-duration="2000">
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i>Absensi Siswa dan
                                    guru </li>
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i>Jurnal Mengajar
                                </li>
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Jurnal Staff </li>
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Pencatatan
                                    Pelanggaran Siswa </li>
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Pencatatan
                                    Perbaikan Siswa </li>
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Tanggapan Siswa
                                    Terhadap Pengajar </li>
                                <li> <i class="icofont-check-circled"
                                        style="color: #13DEB9; font-size: 23px; margin-right: 10px"></i> Buku Tamu </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
