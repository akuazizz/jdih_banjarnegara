@extends('app')
@section('head')
    @include('partial.head')
    <style>
        .select2-container .select2-selection--single {
            height: auto !important;
        }
    </style>

    <script>
        var year = {{ $tahunberlakutakberlaku }};
        var nama = ["Surat Edaran", "Rekomendasi Kajian", "Peraturan Bupati", "Peraturan Daerah", "Naskah Akademik",
            "Keputusan Bupati", "Katalog Produk Hukum", "Instruksi Bupati"
        ];
        var produk = ['Berlaku', 'Tidak Berlaku'];
        var data_berlaku = {{ $berlaku }};
        var data_tidakberlaku = {{ $tidakberlaku }};
        var grafikkategori = {{ $grafikkategori }};

        var barChartData = {
            labels: year,
            datasets: [{
                label: '{{ __('Berlaku') }}',
                backgroundColor: "#50cd89",
                data: data_berlaku
            }, {
                label: '{{ __('Tidak Berlaku') }}',
                backgroundColor: "#009ef7",
                data: data_tidakberlaku
            }]
        };

        var barChartData2 = {
            labels: nama,
            datasets: [{
                label: '',
                data: grafikkategori,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(0, 255, 0)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly Website Visitor'
                    }
                }
            });

            var ctx = document.getElementById("canvas2").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData2,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

        };
    </script>
@endsection
@section('content')
    @include('partial.topbar')

    <section class="slider-area slider-one pt-22">
        <div class="bd-example">
            <div id="carouselOne" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselOne" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselOne" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselOne" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($slider as $var)
                        <div class="carousel-item  @if ($loop->first) active @endif"
                            style="background-image: url({{ asset('banner/' . $var->gambar) }});background-size:100%;">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-xl-8 col-lg-8">

                                        </div>
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- container -->
                            </div>
                            <!-- carousel caption -->
                        </div>
                    @endforeach
                </div>
                <!-- carousel-inner -->
                <a class="carousel-control-prev" href="#carouselOne" role="button" data-bs-slide="prev">
                    <i class="lni lni-chevron-left"></i>
                </a>
                <a class="carousel-control-next" href="#carouselOne" role="button" data-bs-slide="next">
                    <i class="lni lni-chevron-right"></i>
                </a>
            </div>
            <!-- carousel -->
        </div>
        <!-- bd-example -->
    </section>
    <!--====== SLIDER ONE PART ENDS ======-->

    <!--====== HEADER ONE PART START ======-->
    <section id="hero-area" class="testimonial-one slider-three header-area header-eight"
        style="background-color: var(--semi-transparent)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content">
                        <h1 class="text-center mt-5 mb-5">{!! app()->getLocale() == 'id'
                            ? 'Jaringan Dokumentasi dan Informasi Hukum <br> Kabupaten Banjarnegara'
                            : GoogleTranslate::trans(
                                'Jaringan Dokumentasi dan Informasi Hukum <br> Kabupaten Banjarnegara',
                                app()->getLocale(),
                            ) !!}</h1>
                        @include('partial.pencarian')
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row justify-content-center">
                <!-- <div class="col-lg-6" style="margin-bottom:50px;">
                                                                                    <div class="section-title align-center">
                                                                                        <h2 class="fw-bold text-gray-500 text-center">
                                                                                            {{ GoogleTranslate::trans('Informasi produk dan layanan hukum Jawa Tengah dalam satu portal', app()->getLocale()) }}
                                                                                        </h2>
                                                                                        <p class="text-gray-500 text-center">
                                                                                            {{ GoogleTranslate::trans('Biro Hukum Jawa Tengah, Ngayemi Dan Nglayani', app()->getLocale()) }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div> -->
                <div class="col-lg-12">
                    <div class="section-title align-center">
                        <center><iframe width="800" height="500"
                                src="https://www.youtube.com/embed/kvSrT-q2ju8?si=IiqNFT1hmaBrz7_P"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe></center>
                    </div>
                </div>
            </div>

        </div>
        <!-- container -->
    </section>

    <!--====== TESTIMONIAL ONE PART ENDS ======-->

    <!--====== Tiny Slider js ======-->
    <script src="https://cdn.ayroui.com/1.0/js/tiny-slider.js"></script>
    </script>

    <script>
        //======== tiny slider for testimonial-one
        // tns({
        //     autoplay: true,
        //     autoplayButtonOutput: false,
        //     mouseDrag: true,
        //     gutter: 0,
        //     container: ".-items-active",
        //     center: false,
        //     nav: true,
        //     navPosition: "bottom",
        //     controls: false,
        //     speed: 400,
        //     controlsText: [
        //         '<i class="lni lni-arrow-left-circle"></i>',
        //         '<i class="lni lni-arrow-right-circle"></i>',
        //     ],
        //     responsive: {
        //         0: {
        //             items: 1,
        //         },

        //         768: {
        //             items: 2,
        //         },
        //         992: {
        //             items: 3,
        //         },
        //     },
        // });
    </script>

    <!--====== HEADER ONE PART ENDS ======-->

    <!--====== SLIDER 2 PART START ======-->

    <section class="slider-three">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="section-title text-center">
                        <h3 class="title">
                            {{ app()->getLocale() == 'id' ? 'Produk Hukum' : GoogleTranslate::trans('Produk Hukum', app()->getLocale()) }}
                        </h3>
                        <p class="text">
                            {{ app()->getLocale() == 'id' ? 'Daftar Peraturan sesuai keterkaitan dengan produk hukum' : GoogleTranslate::trans('Daftar Peraturan sesuai keterkaitan dengan produk hukum', app()->getLocale()) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="slider-items-wrapper">
                <div class="row  sliders-items-active3">
                    @foreach ($produk_hukum as $var)
                        <div class="col-lg-4 col-md-7 col-sm-9">
                            <div class="features-style-one text-center d-flex">
                                <div class="features-icon me-3">
                                    <i class="lni lni-book"></i>
                                </div>
                                <div class="features-content">
                                    <h4 class="">
                                        {{ app()->getLocale() == 'id' ? $var->nama : GoogleTranslate::trans($var->nama, app()->getLocale()) }}
                                    </h4>
                                    <div class="features-btn rounded-buttons">
                                        <a class="btn primary-btn-outline rounded-full"
                                            href="{{ route('inventarisasi-hukum.kategori', [$var->link]) }}">
                                            {{ $var->jumlah . ' ' . (app()->getLocale() == 'id') ? 'Dokumen' : GoogleTranslate::trans('Dokumen', app()->getLocale()) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--====== SLIDER THREE PART ENDS ======-->

    <!-- Start Latest News Area -->
    <section id="blog" class="latest-news-area section">
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h1 class="fw-bold">
                                {{ app()->getLocale() == 'id' ? 'Pengumuman / Berita' : GoogleTranslate::trans('Pengumuman / Berita', app()->getLocale()) }}
                            </h1>
                            <p>
                                {{ app()->getLocale() == 'id' ? 'Media Informasi dan Berita terkini JDIH Kabupaten Banjarnegara' : GoogleTranslate::trans('Media Informasi dan Berita terkini JDIH Kabupaten Banjarnegara', app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--======  End Section Title Five ======-->
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="single-news">
                        <div class="image">
                            <img src="{{ asset('berita/' . $data[0]->images) }}" alt="Blog" />
                            <div class="meta-details">
                                <img class="thumb" src="{{ asset('media/svg/avatars/blank.svg') }}" alt="Author">
                                <span>{{ $data[0]->views . ' ' . (app()->getLocale() == 'id') ? 'Kali' : GoogleTranslate::trans('Kali', app()->getLocale()) }}</span>
                            </div>
                        </div>
                        <div class="content-body">
                            <h4 class="title">
                                <a href="{{ route('artikel.detail', [$data[0]->link]) }}">
                                    {{ app()->getLocale() == 'id' ? Helper::string_rmv_html($data[0]->nama) : GoogleTranslate::trans(Helper::string_rmv_html($data[0]->nama), app()->getLocale()) }}</a>
                            </h4>
                            <p>
                                {!! app()->getLocale() == 'id'
                                    ? substr($data[0]->isi, 0, 360)
                                    : GoogleTranslate::trans(substr($data[0]->isi, 0, 360), app()->getLocale()) !!} ...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-12">
                    @foreach ($data as $key => $var)
                        @if ($key > 0)
                            <div class="d-flex align-items-sm-center mb-1">
                                <div class="symbol symbol-150px symbol-2by3 me-4 mt-10">
                                    <div class="symbol-label"
                                        style="background-image: url('{{ asset('berita/' . $var->images) }}')"></div>
                                </div>
                                <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                    <div class="single-news d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                        <div class="content-body">
                                            <h4 class="mt-6">
                                                <a href="{{ route('artikel.detail', [$var->link]) }}"
                                                    class="text-gray-900 text-hover-danger">
                                                    {{ app()->getLocale() == 'id' ? $var->nama : GoogleTranslate::trans($var->nama, app()->getLocale()) }}
                                                </a>
                                            </h4>
                                            <div class="blog-content mt-3">
                                                <span><i class="lni lni-calendar"></i>
                                                    <?= helper::tgl_indo(date('Y-m-d', strtotime($var->tgl_publish))) ?>
                                                </span>
                                                <span><i class="lni lni-write"></i> {{ $var->penulis }}</span>
                                                <br />
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest News Area -->

    <!-- ===== service-area start ===== -->
    <section id="services" class="produk-hukum">

        <div class="container">
            <div class="row card-flush mx-auto bg-white col-md-12">
                <div class="col-lg-6 col-md-6 col-xxl-6 mb-5 mb-xl-0">
                    <div class="single-services p-5">
                        <div class="service-content">
                            <div class="py-1">
                                <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label fw-bolder text-dark">{{ app()->getLocale() == 'id' ? 'Grafik Status Produk Hukum' : GoogleTranslate::trans('Grafik Status Produk Hukum', app()->getLocale()) }}</span>
                                </h3>
                            </div>
                            <canvas id="canvas" class="mb-20 mr-3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xxl-6 mb-5 mb-xl-0">
                    <div class="single-services align-right p-5">
                        <div class="service-content">
                            <div class="py-1">
                                <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label fw-bolder text-dark">{{ app()->getLocale() == 'id' ? 'Grafik Kategori Produk Hukum' : GoogleTranslate::trans('Grafik Kategori Produk Hukum', app()->getLocale()) }}
                                    </span>
                                </h3>
                            </div>
                            <div class="chart-container">
                                <canvas id="canvas2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 align-right p-5">
                    <a href="{{ url('statistik') }}" class="btn primary-btn-outline rounded-full mr-2"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span>{{ app()->getLocale() == 'id' ? 'Statistik' : GoogleTranslate::trans('Statistik', app()->getLocale()) }}</span>
                        <i class="lni lni-arrow-right fs-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== service-area end ===== -->

    <!-- Start Cta Area -->
    <section id="services" class="latest-news-area section">
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h1 class="fw-bold">
                                {{ app()->getLocale() == 'id' ? 'Daftar Produk Hukum' : GoogleTranslate::trans('Daftar Produk Hukum', app()->getLocale()) }}
                            </h1>
                            <p>
                                {{ app()->getLocale() == 'id' ? 'Daftar Peraturan sesuai keterkaitan dengan produk hukum' : GoogleTranslate::trans('Daftar Peraturan sesuai keterkaitan dengan produk hukum', app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="col-xl-10 col-lg-8 mx-auto">
                        <div class="section-title text-center">
                            <h3 class="mb-10">
                                {{ app()->getLocale() == 'id' ? 'Populer' : GoogleTranslate::trans('Populer', app()->getLocale()) }}
                            </h3>
                        </div>
                    </div>
                    @foreach ($terpopuler as $key => $var)
                        <div class="d-flex align-items-sm-center">
                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                    <span class="text-gray-600 fw-semibold fs-6 mt-10">
                                        {{ app()->getLocale() == 'id' ? 'Subjek :' : GoogleTranslate::trans('Subjek :', app()->getLocale()) }}
                                        <?php
                                        $separated = explode(',', $var->file_tags);
                                        foreach ($separated as $value) {
                                            echo '<a href="' . url('inventarisasi-hukum/subjek/' . str_replace(' ', '-', trim($value))) . '" class="text-hover-danger text-uppercase text-gray-900">' . $value . '</a>&nbsp;';
                                        }
                                        ?>
                                    </span>
                                    <h4 class="title">
                                        <a href="{{ url('inventarisasi-hukum/detail/' . $var->link) }}"
                                            class="text-hover-danger text-gray-900">
                                            {{ app()->getLocale() == 'id' ? $var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang : GoogleTranslate::trans($var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang, app()->getLocale()) }}
                                        </a>
                                    </h4>
                                    <div class="d-flex align-items-center mb-4">
                                        <p class="p-1em">
                                            {{ app()->getLocale() == 'id' ? 'Tentang ' . Helper::string_rmv_html($var->content) : GoogleTranslate::trans('Tentang ' . Helper::string_rmv_html($var->content), app()->getLocale()) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <span class="badge fs-8 fw-bold my-2">
                                <span class="text-gray-400 fw-semibold fs-7">
                                    # {{ $key + 1 }}
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-12">
                    <div class="col-xl-10 col-lg-8 mx-auto">
                        <div class="section-title text-center">
                            <h3 class="mb-10">
                                {{ app()->getLocale() == 'id' ? 'Terbaru' : GoogleTranslate::trans('Terbaru', app()->getLocale()) }}
                            </h3>
                        </div>
                    </div>
                    @foreach ($terbaru as $key => $var)
                        <div class="d-flex align-items-sm-center">
                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                    <span class="text-gray-600 fw-semibold fs-6 mt-10">
                                        {{ app()->getLocale() == 'id' ? 'Subjek :' : GoogleTranslate::trans('Subjek :', app()->getLocale()) }}
                                        <?php
                                        $separated = explode(',', $var->file_tags);
                                        foreach ($separated as $value) {
                                            echo '<a href="' . url('inventarisasi-hukum/subjek/' . str_replace(' ', '-', trim($value))) . '" class="text-hover-danger text-uppercase text-gray-900">' . $value . '</a>&nbsp;';
                                        }
                                        ?>
                                    </span>
                                    <h4 class="title">
                                        <a href="{{ url('inventarisasi-hukum/detail/' . $var->link) }}"
                                            class="text-hover-danger text-gray-900">
                                            {{ app()->getLocale() == 'id' ? $var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang : GoogleTranslate::trans($var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang, app()->getLocale()) }}
                                        </a>
                                    </h4>
                                    <div class="d-flex align-items-center mb-4">
                                        <p class="p-1em">
                                            {{ app()->getLocale() == 'id' ? 'Tentang ' . Helper::string_rmv_html($var->content) : GoogleTranslate::trans('Tentang ' . Helper::string_rmv_html($var->content), app()->getLocale()) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <span class="badge fs-8 fw-bold my-2">
                                <span class="text-gray-400 fw-semibold fs-7">
                                    # {{ $key + 1 }}
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Cta Area -->

    <!-- Start Brand Area -->
    <section class="slider-three">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h3 class="title">
                            {{ app()->getLocale() == 'id' ? 'Tautan' : GoogleTranslate::trans('Tautan', app()->getLocale()) }}
                        </h3>
                        <p class="text">
                            {{ app()->getLocale() == 'id' ? 'Tautan Terkait JDIH Kabupaten Banjarnegara' : GoogleTranslate::trans('Tautan Terkait JDIH Kabupaten Banjarnegara', app()->getLocale()) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="features-style-two text-center d-flex">
                        <div class="features-icon">
                            <img src="{{ asset('media/banjarnegara.png') }}">
                        </div>
                        <div class="features-content">
                            <h4 class="">
                                <a class="text-gray-900 text-hover-danger" href="http://banjarnegarakab.go.id">
                                    {{ app()->getLocale() == 'id' ? 'Pemerintah Kabupaten Banjarnegara' : GoogleTranslate::trans('Pemerintah Kabupaten Banjarnegara', app()->getLocale()) }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-items-wrapper">
                <div class="row sliders-items-active2">
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/kemendagri.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="http://www.kemendagri.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Kementrian Dalam Negeri Republik Indonesia' : GoogleTranslate::trans('Kementrian Dalam Negeri Republik Indonesia', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/setneg.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="https://www.setneg.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Kementerian Sekretariat Negara Republik Indonesia' : GoogleTranslate::trans('Kementerian Sekretariat Negara Republik Indonesia', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/jdihn.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="https://www.jdihn.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Jaringan Dokumentasi dan Informasi Hukum Nasional' : GoogleTranslate::trans('Jaringan Dokumentasi dan Informasi Hukum Nasional', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/svg/logo-jawa-tengah.svg') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="http://jdih.dprd.jatengprov.go.id">
                                        {{ __('JDIH DPRD Kabupaten Banjarnegara') }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/bphn.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="http://www.bphn.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Badan Pembinaan Hukum Nasional - Kemenkumhan RI' : GoogleTranslate::trans('Badan Pembinaan Hukum Nasional - Kemenkumhan RI', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/pustaka.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="https://pustaka.ham.go.id/">
                                        Pustaka HAM Indonesia Digital
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="false" aria-controls="collapseOne">
                                Website OPD
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="https://setda.banjarnegarakab.go.id">Sekertariat Daerah</a></li>
                                    <li><a href="https://dprd.banjarnegarakab.go.id">DPRD</a></li>
                                    <li><a href="https://inspektorat.banjarnegarakab.go.id">Inspektorat</a></li>
                                    <li><a href="https://bkd.banjarnegarakab.go.id">BKD</a></li>
                                    <li><a href="https://baperlitbang.banjarnegarakab.go.id">BAPERLITBANG</a></li>
                                    <li><a href="https://bppkad.banjarnegarakab.go.id">BPPKAD</a></li>
                                    <li><a href="https://bpbd.banjarnegarakab.go.id">BPBD</a></li>
                                    <li><a href="https://bakesbangpol.banjarnegarakab.go.id">BAKESBANGPOL</a></li>
                                    <li><a href="https://dindikpora.banjarnegarakab.go.id">Dinas Pendidikan Pemuda dan
                                            Olahraga</a></li>
                                    <li><a href="https://dinkes.banjarnegarakab.go.id">Dinas Kesehatan</a></li>
                                    <li><a href="https://dpupr.banjarnegarakab.go.id">DPUPR</a></li>
                                    <li><a href="https://dpkplh.banjarnegarakab.go.id">DPKP LH</a></li>
                                    <li><a href="https://dinsospppa.banjarnegarakab.go.id">DINSOS PPPA</a></li>
                                    <li><a href="https://disnakerpmptsp.banjarnegarakab.go.id">DISNAKER PMPTSP</a></li>
                                    <li><a href="https://dindukcapil.banjarnegarakab.go.id">DINDUKCAPIL</a></li>
                                    <li><a href="https://dispermadesppkb.banjarnegarakab.go.id">DISPERMADES PPKB</a></li>
                                    <li><a href="https://koni.banjarnegarakab.go.id">KONI</a></li>
                                    <li><a href="https://dinkominfo.banjarnegarakab.go.id">DINKOMINFO</a></li>
                                    <li><a href="https://dinhub.banjarnegarakab.go.id">DINHUB</a></li>
                                    <li><a href="https://disarpus.banjarnegarakab.go.id">DISARPUS</a></li>
                                    <li><a href="https://wisata.banjarnegarakab.go.id">DISPARBUD</a></li>
                                    <li><a href="https://distankan.banjarnegarakab.go.id">DISTANKAN</a></li>
                                    <li><a href="https://disperindagkopukm.banjarnegarakab.go.id">DISPERINDAGKOPUKM</a>
                                    </li>
                                    <li><a href="https://rsud.banjarnegarakab.go.id">RSUD</a></li>
                                    <li><a href="https://satpolpp.banjarnegarakab.go.id">SATPOLPP</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwi">
                                Website Kecamatan
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="https://banjarmangu.banjarnegarakab.go.id">Banjarmangu</a></li>
                                    <li><a href="https://kecbna.banjarnegarakab.go.id">Banjarnegara</a></li>
                                    <li><a href="https://batur.banjarnegarakab.go.id">Batur</a></li>
                                    <li><a href="https://bawang.banjarnegarakab.go.id">Bawang</a></li>
                                    <li><a href="https://kalibening.banjarnegarakab.go.id">Kalibening</a></li>
                                    <li><a href="https://karangkobar.banjarnegarakab.go.id">Karangkobar</a></li>
                                    <li><a href="https://madukara.banjarnegarakab.go.id">Madukara</a></li>
                                    <li><a href="https://mandiraja.banjarnegarakab.go.id">Mandiraja</a></li>
                                    <li><a href="https://pagedongan.banjarnegarakab.go.id">Pagedongan</a></li>
                                    <li><a href="https://pagentan.banjarnegarakab.go.id">Pagentan</a></li>
                                    <li><a href="https://pandanarum.banjarnegarakab.go.id">Pandanarum</a></li>
                                    <li><a href="https://pejawaran.banjarnegarakab.go.id">Pejawaran</a></li>
                                    <li><a href="https://punggelan.banjarnegarakab.go.id">Punggelan</a></li>
                                    <li><a href="https://purwanegara.banjarnegarakab.go.id">Purwanegara</a></li>
                                    <li><a href="https://purwarejaklampok.banjarnegarakab.go.id">Purwareja Klampok</a></li>
                                    <li><a href="https://rakit.banjarnegarakab.go.id">Rakit</a></li>
                                    <li><a href="https://sigaluh.banjarnegarakab.go.id">Sigaluh</a></li>
                                    <li><a href="https://susukan.banjarnegarakab.go.id">Susukan</a></li>
                                    <li><a href="https://wanadadi.banjarnegarakab.go.id">Wanadadi</a></li>
                                    <li><a href="https://wanayasa.banjarnegarakab.go.id">Wanayasa</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" href="https://banjarnegarakab.go.id/daftar-website-desa/">
                                Website Desa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Brand Area -->

    <!-- Start Video Area -->
    <section class="slider-three" style="background-color:white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h3 class="title">
                            {{ app()->getLocale() == 'id' ? 'Video' : GoogleTranslate::trans('Tautan', app()->getLocale()) }}
                        </h3>
                        <p class="text">
                            {{ app()->getLocale() == 'id' ? 'Video Terkait JDIH Kabupaten Banjarnegara' : GoogleTranslate::trans('Video Terkait JDIH Kabupaten Banjarnegara', app()->getLocale()) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="slider-items-wrapper">
                <div class="row videos-items-active">
                    @foreach ($dataVideo as $video)
                        <div class="col-lg-4 col-md-7 col-sm-9">
                            <div class="features-style-two  d-flex mb-0">
                                <a href="{{ $video->link_youtube_video }}" target="__blank">
                                    <img src="{{ asset('video/' . $video->thumbnail_video) }}">
                                </a>
                            </div>
                            <div class="features-style-two  d-flex mt-0" style="padding: 0px 20px">
                                <h4 class="section-title text-center">
                                    <a href="{{ $video->link_youtube_video }}" target="__blank"
                                        class="text-hover-danger text-gray-900">
                                        {{ $video->judul_video }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="col-md-7 align-right p-5">
                <a href="{{ url('videos') }}" class="btn primary-btn-outline rounded-full mr-2"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <span>{{ app()->getLocale() == 'id' ? 'Selengkapnya' : GoogleTranslate::trans('Selengkapnya', app()->getLocale()) }}</span>
                    <i class="lni lni-arrow-right fs-2"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- End Video Area -->

    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Apakah informasi atau produk hukum yang anda cari tidak tersedia?',
                text: 'Silahkan buka website jdih versi lama untuk mencari informasi maupun produk hukum yang anda inginkan',
                background: 'white',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Buka JDIH V1',
                cancelButtonText: 'Tidak, terimakasih',
                showDenyButton: true,
                denyButtonText: 'Survei Kepuasan Masyarakat'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'https://v1.jdih.banjarnegarakab.go.id';
                } else if (result.isDenied) {
                    window.location.href =
                        'https://docs.google.com/forms/d/e/1FAIpQLSeTgXt18qBKiVPtlgbMAK8Dtdt3HHnKk2xPKkJSdJWSIhUyEg/viewform?embedded=true';
                }
            });
        });
    </script>


    <script>
        tns({
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            container: ".sliders-items-active2",
            center: true,
            nav: true,
            navPosition: "bottom",
            controls: false,
            speed: 400,
            controlsText: [
                '<i class="lni lni-arrow-left-circle"></i>',
                '<i class="lni lni-arrow-right-circle"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });
        tns({
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            container: ".sliders-items-active3",
            center: true,
            nav: true,
            navPosition: "bottom",
            controls: false,
            speed: 400,
            controlsText: [
                '<i class="lni lni-arrow-left-circle"></i>',
                '<i class="lni lni-arrow-right-circle"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });

        tns({
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            container: ".videos-items-active",
            center: false,
            nav: true,
            navPosition: "bottom",
            controls: false,
            speed: 400,


            controlsText: [
                '<i class="lni lni-arrow-left-circle"></i>',
                '<i class="lni lni-arrow-right-circle"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });

        $(document).ready(function() {
            $(".kt_advanced_search_button_1").click(function() {
                let namadokumen = $("#nama_dokumen").val();
                let kategori_ = $("#kategori_").val();
                let tahun_ = $("#tahun_").val();
                let nomor_ = $("#nomor_").val();

                let tipe_dokumen = $("#tipe_dokumen").val();
                let status_dokumen = $("#status_dokumen").val();
                let url = "{{ route('pencarian.pencarian') }}?status_dokumen=" + status_dokumen +
                    "&tipe_dokumen=" + tipe_dokumen + "&dokumen=" + namadokumen + "&kategori=" + kategori_ +
                    "&tahun=" + tahun_ + "&nomor=" + nomor_;
                window.location.href = url
            });
        });
    </script>
@endsection
