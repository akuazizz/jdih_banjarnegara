@extends('app')

@section('head')
    @include('partial.head')
    <style>
        /* CSS Khusus untuk halaman berita */
        .news-list-main .card-img-top {
            height: 400px;
            object-fit: cover;
        }

        .news-list-item .news-image {
            width: 200px;
            height: 130px;
            object-fit: cover;
        }

        .news-list-item .card-body {
            padding: 1.5rem;
        }

        .pagination .page-link {
            color: #004F98;
        }

        .pagination .page-item.active .page-link {
            background-color: #004F98;
            border-color: #004F98;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    @include('partial.topbar')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl">
            <!-- Header Halaman -->
            <div class="text-center my-5 pt-5">
                <h1 class="fw-bolder">Pengumuman / Berita</h1>
                <p class="text-muted">Media Informasi dan Berita terkini JDIH Kabupaten Banjarnegara</p>
            </div>

            <!-- Konten Berita -->
            <div class="card card-flush shadow-sm">
                <div class="card-body">

                    @if($data->isNotEmpty())
                        <!-- Berita Utama (Paling Atas) -->
                        <div class="news-list-main mb-5">
                            @php $first_news = $data->first(); @endphp
                            <a href="{{ route('artikel.detail', [$first_news->link]) }}">
                                <img src="{{ asset('berita/' . $first_news->images) }}" class="card-img-top rounded"
                                    alt="{{ $first_news->nama }}">
                            </a>
                            <div class="mt-4">
                                <div class="d-flex align-items-center text-muted small mb-2">
                                    <span><i class="lni lni-calendar me-1"></i>
                                        {!! Helper::tgl_indo(date('Y-m-d', strtotime($first_news->tgl_publish))) !!}</span>
                                    <span class="mx-2">•</span>
                                    <span><i class="lni lni-eye me-1"></i> {{ $first_news->views }} Kali</span>
                                    <span class="mx-2">•</span>
                                    <span><i class="lni lni-user me-1"></i> {{ $first_news->penulis }}</span>
                                </div>
                                <h2 class="fw-bolder">
                                    <a href="{{ route('artikel.detail', [$first_news->link]) }}"
                                        class="text-dark text-hover-primary">{{ $first_news->nama }}</a>
                                </h2>
                                <p class="text-muted mt-2">{!! Str::limit(strip_tags($first_news->isi), 250) !!}</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <!-- Daftar Berita Lainnya -->
                        @foreach($data->slice(1) as $var)
                            <div class="news-list-item d-flex align-items-center mb-4 pb-4 @if(!$loop->last) border-bottom @endif">
                                <div class="flex-shrink-0">
                                    <a href="{{ route('artikel.detail', [$var->link]) }}">
                                        <img src="{{ asset('berita/' . $var->images) }}" class="rounded news-image"
                                            alt="{{ $var->nama }}">
                                    </a>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h5 class="fw-bolder mb-1">
                                        <a href="{{ route('artikel.detail', [$var->link]) }}"
                                            class="text-dark text-hover-primary">{{ $var->nama }}</a>
                                    </h5>
                                    <div class="text-muted small">
                                        <span><i class="lni lni-calendar me-1"></i>
                                            {!! Helper::tgl_indo(date('Y-m-d', strtotime($var->tgl_publish))) !!}</span>
                                        <span class="mx-2">•</span>
                                        <span><i class="lni lni-user me-1"></i> {{ $var->penulis }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <p class="text-center">Belum ada berita untuk ditampilkan.</p>
                    @endif

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $data->links('vendor.pagination.bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->

    @include('partial.footer')
@endsection

@section('footer')
    @include('partial.script')
@endsection