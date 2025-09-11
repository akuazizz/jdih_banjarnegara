<!DOCTYPE html>
<html lang="id">

<head>
  @yield('head')

  {{-- CSS GLOBAL UNTUK SEMUA HALAMAN --}}
  <style>
    body {
      overflow-x: hidden !important;
      /* Mencegah scroll horizontal */
      overflow-y: auto !important;
      /* Memastikan scroll vertikal selalu aktif */
    }

    .footer-eleven {
      background-color: #004F98;
      /* Warna biru navbar */
      color: #E4E6EF;
      padding: 70px 0 50px 0;
      font-size: 0.95rem;
    }

    .footer-eleven a {
      color: #E4E6EF;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-eleven a:hover {
      color: #ffffff;
    }

    .footer-widget .widget-title,
    .footer-widget h4 {
      color: #ffffff;
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 25px;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .footer-info-item {
      display: flex;
      align-items: flex-start;
      margin-bottom: 15px;
    }

    .footer-info-item i {
      color: #ffffff;
      font-size: 1.2rem;
      margin-right: 15px;
      margin-top: 4px;
      width: 20px;
      text-align: center;
    }

    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      margin-right: 10px;
      transition: background-color 0.3s ease;
    }

    .social-icon i {
      color: #ffffff !important;
      font-size: 1.3rem;
    }

    .social-icon:hover {
      background-color: #ffffff;
    }

    .social-icon:hover i {
      color: #004F98 !important;
    }

    .map-container iframe {
      border-radius: 0.475rem;
    }

    .stats-list .d-flex {
      margin-bottom: 0.85rem;
      font-size: 0.9rem;
    }

    .stats-list .badge {
      background-color: rgba(255, 255, 255, 0.15);
      color: #ffffff;
      font-weight: 500;
    }

    .footer-bottom {
      background-color: #003a75;
      padding: 1.25rem 0;
      color: #B5B5C3;
      font-size: 0.85rem;
    }

    .footer-bottom a {
      color: #E4E6EF;
    }
  </style>
</head>

{{-- Pastikan tag body ini sama dengan yang Anda miliki sebelumnya --}}

<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
  @yield('content')
  @yield('footer')
</body>

</html>