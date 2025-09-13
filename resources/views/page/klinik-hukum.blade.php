@extends('app')

@section('head')
  @include('partial.head')
  <style>
    /* CSS KHUSUS HALAMAN KLINIK HUKUM */

    /* Hero Section (Bagian Atas) */
    .klinik-hero-section {
      /* Ganti dengan URL gambar Anda jika ada */
      background-image: linear-gradient(rgba(0, 79, 152, 0.85), rgba(0, 58, 117, 0.95)), url('{{ asset('media/background/hero-bg.jpg') }}');
      background-color: #004F98;
      /* Fallback jika gambar tidak ada */
      background-size: cover;
      background-position: center;
      padding: 6rem 0;
      color: #ffffff;
    }

    .klinik-hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .klinik-hero-section .btn-warning {
      /* Menggunakan warna kontras untuk tombol utama */
      padding: 0.8rem 2rem;
      font-size: 1.1rem;
      font-weight: 600;
      transition: all .3s ease;
    }

    .klinik-hero-section .btn-warning:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, .1);
    }

    /* Call to Action Bar */
    .cta-bar {
      background-color: #1e1e2d;
      /* Warna gelap yang elegan */
      padding: 1.5rem 0;
    }

    .cta-bar h4 {
      color: #ffffff;
    }

    .cta-bar .btn-light {
      font-weight: 600;
    }

    .cta-bar .btn-outline-danger {
      /* Warna merah untuk "Daftar" agar menonjol */
      font-weight: 600;
      color: #F1416C;
      border-color: #F1416C;
    }

    .cta-bar .btn-outline-danger:hover {
      color: #ffffff;
      background-color: #F1416C;
    }

    /* Section Umum */
    .feature-section {
      padding: 5rem 0;
    }

    .section-title {
      margin-bottom: 3.5rem;
    }

    .section-title h2 {
      font-size: 2.5rem;
      font-weight: 700;
      position: relative;
      padding-bottom: 1rem;
      display: inline-block;
    }

    .section-title h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background-color: #004F98;
      border-radius: 2px;
    }

    /* Feature Card (Layanan & Alur) */
    .feature-card {
      background-color: #ffffff;
      border: 1px solid #EFF2F5;
      border-radius: 0.5rem;
      padding: 2rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }

    .feature-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, .1) !important;
    }

    .feature-card .icon-container {
      width: 70px;
      height: 70px;
      background-color: #F1FAFF;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem auto;
    }

    .feature-card i {
      color: #004F98;
      font-size: 2.5rem;
    }

    .feature-card h5 {
      color: #181C32;
    }

    .feature-card p {
      font-size: 0.95rem;
    }

    .alur-section .feature-card {
      padding: 1.5rem;
    }

    /* Lokasi */
    .lokasi-section iframe {
      width: 100%;
      height: 450px;
      border-radius: .5rem;
    }
  </style>
@endsection

@section('content')
  @include('partial.topbar')

  <!-- Hero Section -->
  <section class="klinik-hero-section text-center">
    <div class="container">
      <h1 class="display-4 fw-bolder mb-3 text-white">Online Legal Consultation</h1>
      <p class="lead text-white-50 mb-4 col-md-8 mx-auto">Layanan konsultasi dan bantuan hukum gratis secara online dari
        Bagian Hukum Pemerintah Kabupaten Banjarnegara.</p>
      <a href="#" class="btn btn-warning rounded-pill">AJUKAN PERTANYAAN SEKARANG <i class="lni lni-arrow-right"></i></a>
    </div>
  </section>

  <!-- Call to Action Bar -->
  <section class="cta-bar">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
      <h4 class="mb-3 mb-md-0 fw-bold">Punya pertanyaan seputar <span style="color: #FFC700;">Hukum</span>? Jangan ragu
        untuk bertanya!</h4>
      <div>
        <a href="#" class="btn btn-light me-2">Lihat Forum Diskusi</a>
        <a href="#" class="btn btn-outline-danger">Daftar Akun</a>
      </div>
    </div>
  </section>

  <!-- Tentang Kami Section -->
  <section class="feature-section bg-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="fw-bolder">Tentang Kami</h2>
          <p class="text-muted mt-4">
            Online Legal Consultation (OLC) adalah platform konsultasi permasalahan hukum untuk masyarakat Kabupaten
            Banjarnegara yang dikelola oleh Bagian Hukum Setda. Layanan ini dapat disebut sebagai Klinik Hukum Online dan
            menyediakan berbagai macam layanan untuk membantu permasalahan hukum Anda, baik litigasi maupun non-litigasi.
          </p>
        </div>
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
          <img src="https://jdih.magelangkab.go.id/olc/assets/images/tentang-kami.png" alt="Tentang Kami"
            class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Layanan Section -->
  <section class="feature-section" style="background-color: #f8f9fa;">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center section-title">
          <h2 class="fw-bolder">Layanan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="feature-card shadow-sm text-center">
            <div class="icon-container"><i class="lni lni-comments"></i></div>
            <h5 class="fw-bold">Forum Diskusi</h5>
            <p class="text-muted">Lihat dan pelajari pertanyaan-pertanyaan yang sudah pernah diajukan oleh pengguna lain.
            </p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="feature-card shadow-sm text-center">
            <div class="icon-container"><i class="lni lni-pencil-alt"></i></div>
            <h5 class="fw-bold">Ajukan Pertanyaan</h5>
            <p class="text-muted">Ajukan pertanyaan hukum Anda secara rahasia dan akan dijawab oleh tim ahli kami.</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="feature-card shadow-sm text-center">
            <div class="icon-container"><i class="lni lni-library"></i></div>
            <h5 class="fw-bold">Publikasi Terpilih</h5>
            <p class="text-muted">Pertanyaan yang relevan untuk publik akan kami publikasikan tanpa identitas penanya.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Alur OLC Section -->
  <section class="feature-section bg-white">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center section-title">
          <h2 class="fw-bolder">Alur Konsultasi</h2>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg col-md-4 col-6">
          <div class="feature-card">
            <div class="icon-container"><i class="lni lni-user"></i></div>
            <h6 class="fw-bold">1. Register</h6>
            <p class="small text-muted">Daftar atau login ke akun Anda untuk memulai.</p>
          </div>
        </div>
        <div class="col-lg col-md-4 col-6">
          <div class="feature-card">
            <div class="icon-container"><i class="lni lni-pencil-alt"></i></div>
            <h6 class="fw-bold">2. Ajukan Pertanyaan</h6>
            <p class="small text-muted">Tuliskan pertanyaan hukum Anda melalui form yang tersedia.</p>
          </div>
        </div>
        <div class="col-lg col-md-4 col-6">
          <div class="feature-card">
            <div class="icon-container"><i class="lni lni-wechat"></i></div>
            <h6 class="fw-bold">3. Diskusi</h6>
            <p class="small text-muted">Tim kami akan meninjau dan menjawab pertanyaan Anda.</p>
          </div>
        </div>
        <div class="col-lg col-md-6 col-6">
          <div class="feature-card">
            <div class="icon-container"><i class="lni lni-volume-high"></i></div>
            <h6 class="fw-bold">4. Publikasi</h6>
            <p class="small text-muted">Pertanyaan dan jawaban mungkin dipublikasikan secara anonim.</p>
          </div>
        </div>
        <div class="col-lg col-md-6 col-12">
          <div class="feature-card">
            <div class="icon-container"><i class="lni lni-alarm"></i></div>
            <h6 class="fw-bold">5. Notifikasi</h6>
            <p class="small text-muted">Anda akan menerima notifikasi jika pertanyaan Anda telah dijawab.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Lokasi Section -->
  <section class="lokasi-section" style="background-color: #f8f9fa;">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center section-title">
          <h2 class="fw-bolder">Lokasi Bagian Hukum</h2>
        </div>
        <div class="col-12">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.398687834571!2d109.69577987488346!3d-7.420894992589578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aaaba9a2e6857%3A0x136a56e01a4a496f!2sKantor%20Bupati%20Banjarnegara!5e0!3m2!1sid!2sid!4v1692250000000!5m2!1sid!2sid"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

  @include('partial.footer')
@endsection

@section('footer')
  @include('partial.script')
@endsection