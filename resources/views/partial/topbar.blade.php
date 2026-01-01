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
                                    @if(app()->getLocale() == 'id')
                                        Profil Kami
                                    @else
                                        @php
                                            try {
                                                echo GoogleTranslate::trans('Profil Kami', app()->getLocale());
                                            } catch (\Exception $e) {
                                                echo 'Profil Kami';
                                            }
                                        @endphp
                                    @endif
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav1">
                                    <li><a href="{{ route('visi.misi') }}">
                                        @if(app()->getLocale() == 'id')
                                            Visi Misi
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Visi Misi', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Visi Misi';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('dasar.hukum') }}">
                                        @if(app()->getLocale() == 'id')
                                            Dasar Hukum
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Dasar Hukum', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Dasar Hukum';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('struktur.organisasi') }}">
                                        @if(app()->getLocale() == 'id')
                                            Struktur Organisasi
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Struktur Organisasi', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Struktur Organisasi';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('tupoksi') }}">
                                        @if(app()->getLocale() == 'id')
                                            Tupoksi Bagian Hukum
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Tupoksi Bagian Hukum', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Tupoksi Bagian Hukum';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ url('anggota-jdih') }}">
                                        @if(app()->getLocale() == 'id')
                                            Anggota KAB Banjarnegara
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Anggota JDIH KAB Banjarnegara', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Anggota JDIH KAB Banjarnegara';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('kedudukan.alamat') }}">
                                        @if(app()->getLocale() == 'id')
                                            Kedudukan dan Alamat
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Kedudukan dan Alamat', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Kedudukan dan Alamat';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('sop') }}">
                                        @if(app()->getLocale() == 'id')
                                            SOP
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('SOP', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'SOP';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav2"
                                    aria-controls="sub-nav2" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    @if(app()->getLocale() == 'id')
                                        Peraturan Perundang-Undangan
                                    @else
                                        @php
                                            try {
                                                echo GoogleTranslate::trans('Peraturan Perundang-Undangan', app()->getLocale());
                                            } catch (\Exception $e) {
                                                echo 'Peraturan Perundang-Undangan';
                                            }
                                        @endphp
                                    @endif

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav2">
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-daerah']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Peraturan Daerah
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Peraturan Daerah', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Peraturan Daerah';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-bupati']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Peraturan Bupati
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Peraturan Bupati', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Peraturan Bupati';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['dokumen-hukum-terjemahan']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Dokumen Hukum Terjemahan
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Dokumen Hukum Terjemahan', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Dokumen Hukum Terjemahan';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ url('inventarisasi-hukum/kategori/keputusan-bupati') }}">
                                        @if(app()->getLocale() == 'id')
                                            Keputusan Bupati
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Keputusan Bupati', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Keputusan Bupati';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['instruksi-bupati']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Instruksi Bupati
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Instruksi Bupati', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Instruksi Bupati';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ url('inventarisasi-hukum/kategori/keputusan-sekretaris-daerah') }}">
                                        @if(app()->getLocale() == 'id')
                                            Keputusan Sekretaris Daerah
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Keputusan Sekretaris Daerah', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Keputusan Sekretaris Daerah';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            @if(app()->getLocale() == 'id')
                                                Peraturan/Keputusan Kepala OPD
                                            @else
                                                @php
                                                    try {
                                                        echo GoogleTranslate::trans('Peraturan/Keputusan Kepala OPD', app()->getLocale());
                                                    } catch (\Exception $e) {
                                                        echo 'Peraturan/Keputusan Kepala OPD';
                                                    }
                                                @endphp
                                            @endif
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-kepala-opd']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Peraturan Kepala OPD
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Peraturan Kepala OPD', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Peraturan Kepala OPD';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['keputusan-kepala-opd']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Keputusan Kepala OPD
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Keputusan Kepala OPD', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Keputusan Kepala OPD';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            @if(app()->getLocale() == 'id')
                                                Dokumen Kerjasama
                                            @else
                                                @php
                                                    try {
                                                        echo GoogleTranslate::trans('Dokumen Kerjasama', app()->getLocale());
                                                    } catch (\Exception $e) {
                                                        echo 'Dokumen Kerjasama';
                                                    }
                                                @endphp
                                            @endif
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['nota-kesepakatan']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Nota Kesepakatan
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Nota Kesepakatan', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Nota Kesepakatan';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['kesepakatan-bersama']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Kesepakatan Bersama
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Kesepakatan Bersama', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Kesepakatan Bersama';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['memorandum-of-understanding']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Memorandum of Understanding
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Memorandum of Understanding', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Memorandum of Understanding';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['letter-of-intent']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Letter of Intent
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Letter of Intent', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Letter of Intent';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['dokumen-hukum-langka']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Dokumen Hukum Langka
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Dokumen Hukum Langka', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Dokumen Hukum Langka';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.subjek', ['Propemperda']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Propemperda
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Propemperda', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Propemperda';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ url('inventarisasi-hukum/katalog') }}">
                                        @if(app()->getLocale() == 'id')
                                            Katalog
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Katalog', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Katalog';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="https://jdihn.go.id/">
                                        @if(app()->getLocale() == 'id')
                                            Peraturan Pusat
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Peraturan Pusat', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Peraturan Pusat';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav3"
                                    aria-controls="sub-nav3" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    @if(app()->getLocale() == 'id')
                                        Monografi Hukum
                                    @else
                                        @php
                                            try {
                                                echo GoogleTranslate::trans('Monografi Hukum', app()->getLocale());
                                            } catch (\Exception $e) {
                                                echo 'Monografi Hukum';
                                            }
                                        @endphp
                                    @endif

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav3">
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['naskah-akademik']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Naskah Akademik
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Naskah Akademik', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Naskah Akademik';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['raperda']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Raperda
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Raperda', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Raperda';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['rekomendasi-kajian']) }}">
                                        @if(app()->getLocale() == 'id')
                                            Analisis Dan Evaluasi Hukum
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('Analisis Dan Evaluasi Hukum', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'Analisis Dan Evaluasi Hukum';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false" aria-label="Toggle navigation"
                                            href="javascript:void(0)">
                                            @if(app()->getLocale() == 'id')
                                                Hasil Fasilitasi
                                            @else
                                                @php
                                                    try {
                                                        echo GoogleTranslate::trans('Hasil Fasilitasi', app()->getLocale());
                                                    } catch (\Exception $e) {
                                                        echo 'Hasil Fasilitasi';
                                                    }
                                                @endphp
                                            @endif
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['hasil-fasilitasi-raperda-provinsi']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Hasil Fasilitasi Raperda Provinsi
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Hasil Fasilitasi Raperda Provinsi', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Hasil Fasilitasi Raperda Provinsi';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['hasil-fasilitasi-raperda-kabko']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Hasil Fasilitasi Raperda Kabupaten/Kota
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Hasil Fasilitasi Raperda Kabupaten/Kota', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Hasil Fasilitasi Raperda Kabupaten/Kota';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false" aria-label="Toggle navigation"
                                            href="javascript:void(0)">
                                            @if(app()->getLocale() == 'id')
                                                Surat Edaran
                                            @else
                                                @php
                                                    try {
                                                        echo GoogleTranslate::trans('Surat Edaran', app()->getLocale());
                                                    } catch (\Exception $e) {
                                                        echo 'Surat Edaran';
                                                    }
                                                @endphp
                                            @endif
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-bupati']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Bupati/Wakil Bupati
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Bupati/Wakil Bupati', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Bupati/Wakil Bupati';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-sekretaris']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Sekretaris Daerah
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Sekretaris Daerah', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Sekretaris Daerah';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-kepala-opd']) }}">
                                                @if(app()->getLocale() == 'id')
                                                    Kepala OPD
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Kepala OPD', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Kepala OPD';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                        </ul>
                                    </li>
                                    <li></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['ranham']) }}">
                                        @if(app()->getLocale() == 'id')
                                            RANHAM
                                        @else
                                            @php
                                                try {
                                                    echo GoogleTranslate::trans('RANHAM', app()->getLocale());
                                                } catch (\Exception $e) {
                                                    echo 'RANHAM';
                                                }
                                            @endphp
                                        @endif
                                    </a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('inventarisasi-hukum.kategori', ['artikel-bidang-hukum']) }}">
                                    @if(app()->getLocale() == 'id')
                                        Artikel Bidang Hukum
                                    @else
                                        @php
                                            try {
                                                echo GoogleTranslate::trans('Artikel Bidang Hukum', app()->getLocale());
                                            } catch (\Exception $e) {
                                                echo 'Artikel Bidang Hukum';
                                            }
                                        @endphp
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('inventarisasi-hukum.putusan') }}">
                                    @if(app()->getLocale() == 'id')
                                        Putusan
                                    @else
                                        @php
                                            try {
                                                echo GoogleTranslate::trans('Putusan', app()->getLocale());
                                            } catch (\Exception $e) {
                                                echo 'Putusan';
                                            }
                                        @endphp
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('inventarisasi-hukum.kategori', ['perjanjian-kerja-sama']) }}">
                                @if(app()->getLocale() == 'id')
                                    Kerja Sama Daerah
                                @else
                                    @php
                                        try {
                                            echo GoogleTranslate::trans('Kerja Sama Daerah', app()->getLocale());
                                        } catch (\Exception $e) {
                                            echo 'Kerja Sama Daerah';
                                        }
                                    @endphp
                                @endif
                            </a></li>
                                    {{-- <li class="nav-item">
                                <a href="https://jdih.jatengprov.go.id/perpus/"
                                    target="_blank">{{ app()->getLocale() == 'id' ? 'Perpustakaan' : GoogleTranslate::trans('Perpustakaan', app()->getLocale()) }}</a>
                            </li> --}}
                                    <li class="nav-item">
                                        <a class="page-scroll active" data-bs-toggle="collapse"
                                            data-bs-target="#sub-nav5" aria-controls="sub-nav5" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            @if(app()->getLocale() == 'id')
                                                Informasi
                                            @else
                                                @php
                                                    try {
                                                        echo GoogleTranslate::trans('Informasi', app()->getLocale());
                                                    } catch (\Exception $e) {
                                                        echo 'Informasi';
                                                    }
                                                @endphp
                                            @endif
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav5">
                                            <li><a href="{{ url('artikel') }}">
                                                @if(app()->getLocale() == 'id')
                                                    Berita
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Berita', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Berita';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ url('unduh') }}">
                                                @if(app()->getLocale() == 'id')
                                                    Download
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Download', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Download';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ url('galeris') }}">
                                                @if(app()->getLocale() == 'id')
                                                    Galeri
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Galeri', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Galeri';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
                                            <li><a href="{{ url('videos') }}">
                                                @if(app()->getLocale() == 'id')
                                                    Video
                                                @else
                                                    @php
                                                        try {
                                                            echo GoogleTranslate::trans('Video', app()->getLocale());
                                                        } catch (\Exception $e) {
                                                            echo 'Video';
                                                        }
                                                    @endphp
                                                @endif
                                            </a></li>
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
