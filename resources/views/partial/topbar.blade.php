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
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav1"
                                    aria-controls="sub-nav1" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Profil Kami' : GoogleTranslate::trans('Profil Kami', app()->getLocale()) }}

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav1">
                                    <li><a
                                            href="{{ route('visi.misi') }}">{{ app()->getLocale() == 'id' ? 'Visi Misi' : GoogleTranslate::trans('Visi Misi', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('dasar.hukum') }}">{{ app()->getLocale() == 'id' ? 'Dasar Hukum' : GoogleTranslate::trans('Dasar Hukum', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('struktur.organisasi') }}">{{ app()->getLocale() == 'id' ? 'Struktur Organisasi' : GoogleTranslate::trans('Struktur Organisasi', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('tupoksi') }}">{{ app()->getLocale() == 'id' ? 'Tupoksi Bagian Hukum' : GoogleTranslate::trans('Tupoksi Bagian Hukum', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('anggota-jdih') }}">{{ app()->getLocale() == 'id' ? 'Anggota KAB Banjarnegara' : GoogleTranslate::trans('Anggota JDIH KAB Banjarnegara', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('kedudukan.alamat') }}">{{ app()->getLocale() == 'id' ? 'Kedudukan dan Alamat' : GoogleTranslate::trans('Kedudukan dan Alamat', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('sop') }}">{{ app()->getLocale() == 'id' ? 'SOP' : GoogleTranslate::trans('SOP', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav2"
                                    aria-controls="sub-nav2" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Peraturan Perundang-Undangan' : GoogleTranslate::trans('Peraturan Perundang-Undangan', app()->getLocale()) }}

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav2">
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['peraturan-daerah']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Daerah' : GoogleTranslate::trans('Peraturan Daerah', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['peraturan-bupati']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Bupati' : GoogleTranslate::trans('Peraturan Bupati', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['dokumen-hukum-terjemahan']) }}">{{ app()->getLocale() == 'id' ? 'Dokumen Hukum Terjemahan' : GoogleTranslate::trans('Dokumen Hukum Terjemahan', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('inventarisasi-hukum/kategori/keputusan-bupati') }}">{{ app()->getLocale() == 'id' ? 'Keputusan Bupati' : GoogleTranslate::trans('Keputusan Bupati', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['instruksi-bupati']) }}">{{ app()->getLocale() == 'id' ? 'Instruksi Bupati' : GoogleTranslate::trans('Instruksi Bupati', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('inventarisasi-hukum/kategori/keputusan-sekretaris-daerah') }}">{{ app()->getLocale() == 'id' ? 'Keputusan Sekretaris Daerah' : GoogleTranslate::trans('Keputusan Sekretaris Daerah', app()->getLocale()) }}</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Peraturan/Keputusan Kepala OPD' : GoogleTranslate::trans('Peraturan/Keputusan Kepala OPD', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['peraturan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Kepala OPD' : GoogleTranslate::trans('Peraturan Kepala OPD', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['keputusan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Keputusan Kepala OPD' : GoogleTranslate::trans('Keputusan Kepala OPD', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Dokumen Kerjasama' : GoogleTranslate::trans('Dokumen Kerjasama', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['nota-kesepakatan']) }}">{{ app()->getLocale() == 'id' ? 'Nota Kesepakatan' : GoogleTranslate::trans('Nota Kesepakatan', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['kesepakatan-bersama']) }}">{{ app()->getLocale() == 'id' ? 'Kesepakatan Bersama' : GoogleTranslate::trans('Kesepakatan Bersama', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['perjanjian-kerja-sama']) }}">{{ app()->getLocale() == 'id' ? 'Perjanjian Kerjasama' : GoogleTranslate::trans('Perjanjian Kerjasama', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['memorandum-of-understanding']) }}">{{ app()->getLocale() == 'id' ? 'Memorandum of Understanding' : GoogleTranslate::trans('Memorandum of Understanding', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['letter-of-intent']) }}">{{ app()->getLocale() == 'id' ? 'Letter of Intent' : GoogleTranslate::trans('Letter of Intent', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Kepala OPD' : GoogleTranslate::trans('Peraturan Kepala OPD', app()->getLocale()) }}</a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['keputusan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Keputusan Kepala OPD' : GoogleTranslate::trans('Keputusan Kepala OPD', app()->getLocale()) }}</a></li> -->
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['dokumen-hukum-langka']) }}">{{ app()->getLocale() == 'id' ? 'Dokumen Hukum Langka' : GoogleTranslate::trans('Dokumen Hukum Langka', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.subjek', ['Propemperda']) }}">{{ app()->getLocale() == 'id' ? 'Propemperda' : GoogleTranslate::trans('Propemperda', app()->getLocale()) }}</a>
                                    </li>
                                    <!--<li><a-->
                                    <!--        href="{{ route('inventarisasi-hukum.subjek', ['Propempergub']) }}">{{ app()->getLocale() == 'id' ? 'Propempergub' : GoogleTranslate::trans('Propempergub', app()->getLocale()) }}</a>-->
                                    <!--</li>-->
                                    <li><a
                                            href="{{ url('inventarisasi-hukum/katalog') }}">{{ app()->getLocale() == 'id' ? 'Katalog' : GoogleTranslate::trans('Katalog', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="https://jdihn.go.id/">{{ app()->getLocale() == 'id' ? 'Peraturan Pusat' : GoogleTranslate::trans('Peraturan Pusat', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav3"
                                    aria-controls="sub-nav3" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Monografi Hukum' : GoogleTranslate::trans('Monografi Hukum', app()->getLocale()) }}

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav3">
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['naskah-akademik']) }}">{{ app()->getLocale() == 'id' ? 'Naskah Akademik' : GoogleTranslate::trans('Naskah Akademik', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['raperda']) }}">{{ app()->getLocale() == 'id' ? 'Raperda' : GoogleTranslate::trans('Raperda', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['rekomendasi-kajian']) }}">{{ app()->getLocale() == 'id' ? 'Analisis Dan Evaluasi Hukum' : GoogleTranslate::trans('Analisis Dan Evaluasi Hukum', app()->getLocale()) }}</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Hasil Fasilitasi' : GoogleTranslate::trans('Hasil Fasilitasi', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['hasil-fasilitasi-raperda-provinsi']) }}">{{ app()->getLocale() == 'id' ? 'Hasil Fasilitasi Raperda Provinsi' : GoogleTranslate::trans('Hasil Fasilitasi Raperda Provinsi', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['hasil-fasilitasi-raperda-kabko']) }}">{{ app()->getLocale() == 'id' ? 'Hasil Fasilitasi Raperda Kabupaten/Kota' : GoogleTranslate::trans('Hasil Fasilitasi Raperda Kabupaten/Kota', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Surat Edaran' : GoogleTranslate::trans('Surat Edaran', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-bupati']) }}">{{ app()->getLocale() == 'id' ? 'Bupati/Wakil Bupati' : GoogleTranslate::trans('Bupati/Wakil Bupati', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-sekretaris']) }}">{{ app()->getLocale() == 'id' ? 'Sekretaris Daerah' : GoogleTranslate::trans('Sekretaris Daerah', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Kepala OPD' : GoogleTranslate::trans('Kepala OPD', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li></li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['ranham']) }}">{{ app()->getLocale() == 'id' ? 'RANHAM' : GoogleTranslate::trans('RANHAM', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('inventarisasi-hukum.kategori', ['artikel-bidang-hukum']) }}">{{ app()->getLocale() == 'id' ? 'Artikel Bidang Hukum' : GoogleTranslate::trans('Artikel Bidang Hukum', app()->getLocale()) }}</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('inventarisasi-hukum.kategori', ['putusan']) }}">{{ app()->getLocale() == 'id' ? 'Putusan' : GoogleTranslate::trans('Putusan', app()->getLocale()) }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="https://jdih.jatengprov.go.id/perpus/"
                                    target="_blank">{{ app()->getLocale() == 'id' ? 'Perpustakaan' : GoogleTranslate::trans('Perpustakaan', app()->getLocale()) }}</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav5"
                                    aria-controls="sub-nav5" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Informasi' : GoogleTranslate::trans('Informasi', app()->getLocale()) }}
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav5">
                                    <li><a
                                            href="{{ url('artikel') }}">{{ GoogleTranslate::trans('Berita', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('unduh') }}">{{ GoogleTranslate::trans('Download', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('galeris') }}">{{ GoogleTranslate::trans('Galeri', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('videos') }}">{{ GoogleTranslate::trans('Video', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
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
