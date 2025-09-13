<section id="header" class="navbar-area navbar-one sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('') }}" style="width:20%;">
                        <img src="{{ asset('media/logo_jdih_banjarnegara.png') }}" alt="JDIH" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOne"
                        aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                        <ul class="navbar-nav m-auto">

                            <!-- Menu Profil Kami -->
                            <li class="nav-item">
                                <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav-profil" href="javascript:void(0)">
                                    Profil Kami <i class="lni lni-chevron-down"></i>
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav-profil">
                                    <li><a href="{{ route('visi.misi') }}">Visi Misi</a></li>
                                    <li><a href="{{ route('dasar.hukum') }}">Dasar Hukum</a></li>
                                    <li><a href="{{ route('struktur.organisasi') }}">Struktur Organisasi</a></li>
                                    <li><a href="{{ route('tupoksi') }}">Tupoksi</a></li>
                                    <li><a href="{{ url('anggota-jdih') }}">Anggota JDIH</a></li>
                                    <li><a href="{{ route('kedudukan.alamat') }}">Kedudukan & Alamat</a></li>
                                    <li><a href="{{ route('sop') }}">SOP</a></li>
                                </ul>
                            </li>

                            <!-- Menu Peraturan -->
                            <li class="nav-item">
                                <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav-peraturan" href="javascript:void(0)">
                                    Peraturan <i class="lni lni-chevron-down"></i>
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav-peraturan">
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-daerah']) }}">Peraturan Daerah</a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-bupati']) }}">Peraturan Bupati</a></li>
                                    <li><a href="{{ url('inventarisasi-hukum/kategori/keputusan-bupati') }}">Keputusan Bupati</a></li>
                                    <li><a href="{{ url('inventarisasi-hukum/kategori/keputusan-sekretaris-daerah') }}">Keputusan Sekda</a></li>
                                     <li><a href="{{ route('inventarisasi-hukum.kategori', ['instruksi-bupati']) }}">Instruksi Bupati</a></li>
                                </ul>
                            </li>

                            <!-- Menu Monografi Hukum -->
                             <li class="nav-item">
                                <a href="{{ route('inventarisasi-hukum.kategori', ['monografi-hukum']) }}">Monografi Hukum</a>
                            </li>

                            <!-- Menu Artikel & Putusan -->
                            <li class="nav-item">
                                <a href="{{ route('inventarisasi-hukum.kategori', ['artikel-bidang-hukum']) }}">Artikel Hukum</a>
                            </li>
                             <li class="nav-item">
                                <a href="{{ route('inventarisasi-hukum.kategori', ['putusan']) }}">Putusan</a>
                            </li>
                            
                            <!-- Menu Informasi -->
                            <li class="nav-item">
                                <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav-info" href="javascript:void(0)">
                                    Informasi <i class="lni lni-chevron-down"></i>
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav-info">
                                    <li><a href="{{ url('artikel') }}">Berita</a></li>
                                    <li><a href="{{ url('galeris') }}">Galeri</a></li>
                                    <li><a href="{{ url('videos') }}">Video</a></li>
                                    <li><a href="{{ url('statistik') }}">Statistik</a></li>
                                </ul>
                            </li>
                            
                            <!-- Menu Klinik Hukum -->
                            <li class="nav-item">
                                <a href="{{ route('klinik-hukum') }}">Klinik Hukum</a>
                            </li>

                        </ul>
                        @include('partial/language_switcher')
                    </div>
                </nav>
                <!-- navbar -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>