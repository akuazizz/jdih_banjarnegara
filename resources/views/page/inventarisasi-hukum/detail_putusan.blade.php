@extends('app')
@section('head')
    <title>
        {{ strip_tags($data[0]->content) }}
    </title>
    <meta name="description" content="{{ strip_tags($data[0]->content) }}" />
    @if ($data[0]->no_peraturan != '0')
        <meta name="keywords"
            content="{{ __('Putusan') . ' ' . __('Nomor') . ' ' . $data[0]->no_peraturan . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }} , {{ $data[0]->content }}" />
    @else
        <meta name="keywords"
            content="{{ __('Putusan') . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }} , {{ $data[0]->content }}" />
    @endif
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
    <section class="latest-news-area section mt-3">
        <div class="container">
            <div class="col-md-7">
                <button onclick="window.history.back()" class="btn btn-bg-secondary rounded-full mr-2"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="lni lni-arrow-left fs-2"></i>
                    <span>{{ __('Kembali') }}</span>
                </button>
                <span class="btn mr-2">
                    {{ __('Detail Putusan') }}
                </span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-12">
                    <div class="mt-20 about-five-content mx-auto col-md-10">
                        <h1 class="news-header-title">
                            {{ __('Putusan') . ' ' . __('Nomor') . ' ' . $data[0]->no_peraturan . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }}
                        </h1>
                        <h6 class="text-lg">
                            <?= 'Tentang ' . Helper::string_rmv_html($data[0]->content) ?>
                        </h6>
                        <div class="about-five-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-who-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-who" type="button" role="tab" aria-controls="nav-who"
                                        aria-selected="true">{{ __('Detail Putusan') }}</button>
                                    <button class="nav-link" id="nav-vision-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-vision" type="button" role="tab"
                                        aria-controls="nav-vision" aria-selected="false">{{ __('File Putusan') }}</button>
                                    <button class="nav-link" id="nav-abstrak-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-abstrak" type="button" role="tab"
                                        aria-controls="nav-abstrak" aria-selected="false">{{ __('Abstrak') }}</button>
                                    <button class="nav-link" id="nav-dokumen-terkait-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-dokumen-terkait" type="button" role="tab"
                                        aria-controls="nav-dokumen-terkait" aria-selected="false">{{ __('Dokumen Terkait') }}</button>
                                    <button class="nav-link survey" id="nav-nilai-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-nilai" type="button" role="tab" aria-controls="nav-nilai"
                                        aria-selected="false">{{ __('Nilai Kami') }}</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-who" role="tabpanel"
                                    aria-labelledby="nav-who-tab">
                                    <table class="table text-m row px-6" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="25%"><strong>{{ __('Tipe Dokumen') }}</strong></td>
                                                <td class="text-center" width="3%">:</td>
                                                <td>{{ __('Putusan') }}</td>
                                            </tr>
                                            <tr>
                                                <td valign="top"><strong>{{ __('Judul') }}</strong></td>
                                                <td class="text-center" valign="top">:</td>
                                                <td id="indikator-sub-kegiatan-area">
                                                    <?= Helper::string_rmv_html($data[0]->content) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>T.E.U</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->tajuk_entri_utama }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Nomor') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->no_peraturan }}</td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><strong>{{ __('Jenis Peradilan') }}</strong></td>
                                                <td class="text-center" width="3%">:</td>
                                                <td>{{ $data[0]->jenis_peradilan }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Singkatan Jenis Peradilan') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->singkatan_jenis_peradilan }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Tempat Peradilan') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->tempat_peradilan }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Tanggal Dibacakan') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>
                                                    @if ($data[0]->tgl_dibacakan && $data[0]->tgl_dibacakan != '0000-00-00')
                                                        {{ helper::tgl_indo($data[0]->tgl_dibacakan) }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Sumber') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->sumber }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Subjek') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>
                                                    <span>
                                                        <?php
                                                        $separated = explode(',', $data[0]->file_tags);
                                                        foreach ($separated as $value) {
                                                            echo '<a href="' . url('inventarisasi-hukum/subjek/' . str_replace(' ', '-', trim($value))) . '" class="text-hover-danger text-gray-900">' . $value . '</a>&nbsp;';
                                                        }
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Status') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>
                                                    @if ($data[0]->status == 1)
                                                        Berlaku
                                                    @else
                                                        Tidak Berlaku
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Bahasa') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->language }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Bidang Hukum') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->bidhukumnama }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Lokasi') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->lokasi }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Tahun') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->tahun_diundang }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Author') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->file_author }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Diakses') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->view . ' ' . __('Kali') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Diunduh') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->unduh . ' ' . __('Kali') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-vision" role="tabpanel" aria-labelledby="nav-vision-tab">
                                    @if (!empty($data[0]->file))
                                        <div class="d-flex align-items-center py-1">
                                            <div class="symbol symbol-35px me-2">
                                                <span class="svg-icon svg-icon-dark svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path
                                                                d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="d-flex flex-column align-items-start justify-content-center">
                                                <span class="fs-4 text-gray-900 "> {{ $data[0]->file }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('inventarisasi-hukum.download', [encrypt($data[0]->id)]) }}"
                                            class="survey-download">
                                            <button class="btn btn-success">{{ __('Unduh') }}</button>
                                        </a>
                                        <p class="font-sm font-red-intense text-m">
                                            * Klik tombol UNDUH untuk melakukan download atau lihat dokumen dibawah untuk
                                            pratinjau file.
                                        </p>
                                        <iframe src="{{ asset($data[0]->file_url) }}" align="top" height="620"
                                            width="100%" frameborder="0" scrolling="auto"></iframe>
                                    @else
                                        <center>
                                            <img style="width:256px" src="{{ asset('folders.png') }}" alt="">
                                            <h4>Berkas Belum Tersedia</h4>
                                        </center>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-abstrak" role="tabpanel"
                                    aria-labelledby="nav-abstrak-tab">
                                    @if (!empty($data[0]->file_abstrak))
                                        <iframe src="{{ asset('produk_hukum/abstrak/' . $data[0]->file_abstrak) }}"
                                            align="top" height="620" width="100%" frameborder="0"
                                            scrolling="auto"></iframe>
                                    @else
                                        <center>
                                            <img style="width:256px" src="{{ asset('folders.png') }}" alt="">
                                            <h4>Berkas Belum Tersedia</h4>
                                        </center>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-dokumen-terkait" role="tabpanel"
                                    aria-labelledby="nav-dokumen-terkait-tab">
                                    @if($data[0]->relatedDocuments && $data[0]->relatedDocuments->count() > 0)
                                        <div class="row">
                                            @foreach($data[0]->relatedDocuments as $related)
                                            <div class="col-md-6 mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            @if($related->no_peraturan == 0)
                                                                {{ __($related->kategori_nama ?? ($related->tipe_dokumen == 4 ? 'Putusan' : 'Dokumen')) .' '.__('Tahun').' '.$related->tahun_diundang }}
                                                            @else
                                                                {{ __($related->kategori_nama ?? ($related->tipe_dokumen == 4 ? 'Putusan' : 'Dokumen')) .' '. __('Nomor') .' '.$related->no_peraturan.' '.__('Tahun').' '.$related->tahun_diundang }}
                                                            @endif
                                                        </h5>
                                                        <p class="card-text">{{ Helper::string_rmv_html($related->content) }}</p>
                                                        <a href="{{ url('inventarisasi-hukum/detail/' . $related->link) }}" class="btn btn-primary">{{ __('Lihat Detail') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                    <center>
                                        <img style="width:256px" src="{{ asset('folders.png') }}" alt="">
                                        <h4>Tidak ada dokumen terkait</h4>
                                    </center>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-nilai" role="tabpanel"
                                    aria-labelledby="nav-nilai-tab">
                                    <center>
                                        <h4>Silahkan nilai kepuasan Anda:</h4>
                                        <button type="button" class="btn btn-info mt-3 survey-only">Beri Penilaian</button>
                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            let surveySubmitting = false;

            $(document).ready(function() {
                $(".survey-only").on("click", function(e) {
                    e.preventDefault();
                    showSurveyModal();
                });

                $(".survey-download").on("click", function(e) {
                    e.preventDefault();
                    const downloadUrl = $(this).attr('href');
                    showSurveyModal(downloadUrl);
                });
            });

            $(document).on("click", ".survey-rate", function(e) {
                e.preventDefault();
                if (surveySubmitting) {
                    return;
                }
                surveySubmitting = true;

                const rating = $(this).data('rating');
                const downloadUrl = $(this).data('download');
                const baseUrl = window.location.protocol + '//' + window.location.host;

            $.ajax({
                url: `${baseUrl}/inventarisasi-hukum/review_score`,
                method: 'POST',
                data: {
                    status: rating
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function() {
                const baseUrl = window.location.protocol + '//' + window.location.host;
                Swal.fire({
                    title: "Terima kasih!",
                    html: `<div style="display:flex;flex-direction:column;align-items:center;gap:8px;">
                        <img src="${baseUrl}/survey/happy.png" alt="Success" style="width:56px;height:56px;">
                        <div>Penilaian Anda sudah kami terima.</div>
                    </div>`,
                    timer: 1500,
                    showConfirmButton: false,
                    background: '#ffffff',
                    backdrop: true,
                    customClass: {
                        popup: 'survey-popup'
                    }
                }).then(function() {
                    if (downloadUrl) {
                        window.location.href = downloadUrl;
                    } else {
                        surveySubmitting = false;
                    }
                });
            }).fail(function() {
                surveySubmitting = false;
                Swal.fire({
                    title: "Gagal",
                    text: "Penilaian belum tersimpan. Silakan coba lagi.",
                    icon: "error"
                });
            });
        });

            function showSurveyModal(downloadUrl = '') {
                const buttons = $('<div class="survey-options">')
                    .append(createButton('puas', downloadUrl))
                    .append(createButton('cukup', downloadUrl))
                    .append(createButton('kurang', downloadUrl))
                    .append(createButton('tidak', downloadUrl));

                Swal.fire({
                    title: "Nilai Kepuasan",
                    html: buttons,
                    showConfirmButton: false,
                    showCloseButton: true,
                    allowOutsideClick: true,
                    width: 560,
                    background: '#ffffff',
                    backdrop: true,
                    customClass: {
                        popup: 'survey-popup'
                    }
                });
            }

            function createButton(text, downloadUrl) {
                const baseUrl = window.location.protocol + '//' + window.location.host;
                const safeDownloadUrl = downloadUrl || '';
                return $(
                    `<button type="button" class="survey-rate" data-rating="${text}" data-download="${safeDownloadUrl}" style="background:transparent;border:0;padding:0;margin:6px;text-align:center;">
                        <img src="${baseUrl}/survey/${iconName(text)}.png" style="margin:5px;">
                        <div style="font-size:12px;color:#444;">${labelText(text)}</div>
                    </button>`
                );
            }

            function iconName(text) {
                if (text === 'puas') {
                    return 'happy';
                } else if (text === 'cukup') {
                    return 'smile';
                } else if (text === 'kurang') {
                    return 'neutral';
                }
                return 'angry';
            }

            function labelText(text) {
                if (text === 'puas') {
                    return 'Puas';
                } else if (text === 'cukup') {
                    return 'Cukup';
                } else if (text === 'kurang') {
                    return 'Kurang';
                }
                return 'Tidak Puas';
            }
        </script>

        <style>
            .survey-popup {
                background: #ffffff !important;
            }
            .swal2-container {
                background: rgba(0, 0, 0, 0.45) !important;
            }
            .survey-options {
                display: flex;
                flex-wrap: nowrap;
                gap: 8px;
                justify-content: center;
                align-items: center;
            }
        </style>

    </section>
    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
@endsection
