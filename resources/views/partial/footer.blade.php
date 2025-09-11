<!--begin::Footer-->
<footer class="footer-eleven">
    <div class="container">
        <div class="row">

            <!-- Kolom Informasi Kontak (Kiri) -->
            <div class="col-lg-4 col-md-12 mb-5 mb-lg-0">
                <div class="footer-widget">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('media/Banjarnegara.png') }}" alt="Logo JDIH"
                            style="height: 60px; margin-right: 10px;">
                        <span style="color: white; font-weight: 500; line-height: 1.2;">
                            Bagian Hukum Pemerintah Kabupaten <br>
                            Banjarnegara
                        </span>
                    </div>

                    <div class="footer-info-item">
                        <i class="lni lni-map-marker"></i>
                        <div>
                            <strong>Alamat</strong><br>
                            Jl. Ahmad Yani No. 16, Krandegan, Banjarnegara
                        </div>
                    </div>
                    <div class="footer-info-item">
                        <i class="lni lni-phone"></i>
                        <div>
                            <strong>Telepon</strong><br>
                            (0286) 591218
                        </div>
                    </div>
                    <div class="footer-info-item">
                        <i class="lni lni-envelope"></i>
                        <div>
                            <strong>Email</strong><br>
                            jdih@banjarnegarakab.go.id
                        </div>
                    </div>

                    <!-- Media Sosial -->
                    <h5 class="widget-title mt-4">Media Sosial</h5>
                    <div class="footer-social mt-2">
                        <a href="https://www.instagram.com/jdih_banjarnegara/" target="_blank" class="me-3">
                            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg"
                                alt="Instagram" width="26" height="26" style="filter: invert(1);" />
                            <span>@Jdih_banjarnegara</span>
                        </a>
                        <a href="https://www.tiktok.com/@jdih_banjarnegara" target="_blank">
                            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/tiktok.svg"
                                alt="TikTok" width="26" height="26" style="filter: invert(1);" />
                            <span>JDIH Kabupaten Banjarnegara</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kolom Peta Lokasi (Tengah) -->
            <div class="col-lg-4 col-md-6 mb-5 mb-md-0">
                <div class="footer-widget">
                    <h5 class="widget-title">Lokasi Kami</h5>
                    <div class="map-container" style="overflow:hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.0978141460477!2d109.694395!3d-7.395765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa9162d14f899%3A0xa47a337bd70d216f!2sBagian%20Pemerintahan%20Setda%20Kabupaten%20Banjarnegara!5e0!3m2!1sid!2sid!4v1692250000000!5m2!1sid!2sid"
                            width="110%" height="250" style="border:0; margin-left:-20px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Kolom Statistik (Kanan) -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <h5 class="widget-title">Statistik</h5>

                    <div class="stats-list">
                        <p class="fw-bold mb-3">Pengunjung</p>
                        <div class="d-flex justify-content-between align-items-center"><span>Daily</span><span
                                class="badge">21</span></div>
                        <div class="d-flex justify-content-between align-items-center"><span>Weekly</span><span
                                class="badge">8133</span></div>
                        <div class="d-flex justify-content-between align-items-center"><span>Monthly</span><span
                                class="badge">44217</span></div>
                        <div class="d-flex justify-content-between align-items-center"><span>Yearly</span><span
                                class="badge">56383</span></div>
                    </div>

                    <hr class="my-4">

                    <div class="stats-list">
                        <p class="fw-bold mb-3">Survei Kepuasan</p>
                        <div class="d-flex justify-content-between align-items-center"><span>Sangat Puas</span><span
                                class="badge">1364</span></div>
                        <div class="d-flex justify-content-between align-items-center"><span>Puas</span><span
                                class="badge">421</span></div>
                        <div class="d-flex justify-content-between align-items-center"><span>Kurang Puas</span><span
                                class="badge">49</span></div>
                        <div class="d-flex justify-content-between align-items-center"><span>Tidak Puas</span><span
                                class="badge">61</span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<!--begin::Footer Bottom-->
<div class="footer-bottom">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="copyright-text">
                Hak Cipta 2024© Bagian Hukum Pemerintah Kabupaten Banjarnegara
            </div>
            <div class="disclaimer-link">
                <a href="{{ route('disclaimer') }}">Disclaimer</a>
            </div>
        </div>
    </div>
</div>
<!--end::Footer Bottom-->