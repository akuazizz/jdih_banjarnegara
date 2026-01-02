@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection
@section('content')
    <!--begin::Wrapper-->

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">PUTUSAN NOMOR
                        {{ $data->no_peraturan }} TAHUN {{ $data->tahun_diundang }}
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Form Update data Putusan</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <div class="card card-custom">
                            <!--begin::Form-->
                            <form id="post_file" class="form" action="#" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Tipe Dokumen</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" value="Putusan" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Judul</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Judul Putusan" id="judul" name="judul"
                                                value="{{ isset($data) && $data != '' ? $data->content : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">T.E.U</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="T.E.U" id="teu" name="teu"
                                                value="{{ isset($data) && $data != '' ? $data->tajuk_entri_utama : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Nomor</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Nomor Putusan" id="no_peraturan"
                                                name="no_peraturan"
                                                value="{{ isset($data) && $data != '' ? $data->no_peraturan : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Jenis Peradilan</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Jenis Peradilan" id="jenis_peradilan"
                                                name="jenis_peradilan"
                                                value="{{ isset($data) && $data != '' ? $data->jenis_peradilan : '' }}"
                                                required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Singkatan Jenis
                                            Peradilan</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Singkatan Jenis Peradilan"
                                                id="singkatan_jenis_peradilan" name="singkatan_jenis_peradilan"
                                                value="{{ isset($data) && $data != '' ? $data->singkatan_jenis_peradilan : '' }}"
                                                required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Tempat
                                            Peradilan</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Tempat Peradilan" id="tempat_peradilan"
                                                name="tempat_peradilan"
                                                value="{{ isset($data) && $data != '' ? $data->tempat_peradilan : '' }}"
                                                required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal
                                            Dibacakan</label>
                                        <div class="col-8">
                                            <input
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 pilihtanggal"
                                                type="text" placeholder="Tanggal Dibacakan" id="tgl_dibacakan"
                                                name="tgl_dibacakan"
                                                value="{{ isset($data) && $data != '' ? $data->tgl_dibacakan : '' }}"
                                                required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Sumber</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Sumber" id="sumber" name="sumber"
                                                value="{{ isset($data) && $data != '' ? $data->sumber : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Subjek</label>
                                        <div class="col-8">
                                            <select class="form-control form-select" id="subjek" name="subjek"
                                                multiple="multiple">
                                                <option></option>
                                                @if ($data->file_tags != '' || $data->file_tags != ',,')
                                                    @foreach (explode(',', $data->file_tags) as $tags)
                                                        <option selected="selected">{{ $tags }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Status</label>
                                        <div class="col-8">
                                            <select class="form-select form-select-solid form-control-lg"
                                                data-kt-select2="true" id="status">
                                                <option
                                                    <?= isset($data) && $data->status == 1 ? 'selected' : '' ?>
                                                    value="1">Berlaku</option>
                                                <option
                                                    <?= isset($data) && $data->status == 0 ? 'selected' : '' ?>
                                                    value="0">Tidak Berlaku</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Bahasa</label>
                                        <div class="col-8">
                                            <select class="form-select form-select-solid form-control-lg"
                                                data-kt-select2="true" id="bahasa">
                                                @foreach ($bahasa as $b)
                                                    <option <?= isset($data) && $data->bahasa == $b->id ? 'selected' : '' ?>
                                                        value="{{ $b->id }}">{{ $b->bahasa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Bidang Hukum</label>
                                        <div class="col-8">
                                            <select class="form-select form-select-solid mb-3 mb-lg-0" id="bidang"
                                                data-kt-select2="true" required>
                                                <option>-- Pilih Bidang Hukum --</option>
                                                @foreach ($bidang as $b)
                                                    <option
                                                        <?= isset($data) && $data->bid_hukum == $b->id ? 'selected' : '' ?>
                                                        value="{{ $b->id }}">{{ $b->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Lokasi</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="Lokasi" id="lokasi" name="lokasi"
                                                value="{{ isset($data) && $data != '' ? $data->lokasi : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Tahun</label>
                                        <div class="col-8">
                                            <select class="form-select form-select-solid form-control-lg"
                                                data-kt-select2="true" id="tahun">
                                                <option></option>
                                                @foreach (range(date('Y'), 1800) as $i)
                                                    <option
                                                        <?= isset($data) && $data->tahun_diundang == $i ? 'selected' : '' ?>
                                                        value="{{ $i }}">{{ $i }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Author</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="text" placeholder="author" id="author" name="author"
                                                value="{{ isset($data) && $data != '' ? $data->file_author : '' }}"
                                                required />
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Abstrak</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="file" placeholder="File Abstrak Putusan" id="abstrak"
                                                name="abstrak" accept=".pdf" />
                                            @if($data->abstrak)
                                            <small class="text-muted">File abstrak saat ini: {{ $data->abstrak }}</small>
                                            @endif
                                            <small class="text-muted">Upload file PDF abstrak (opsional)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">File Putusan</label>
                                        <div class="col-8">
                                            <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                type="file" placeholder="File Putusan" id="file"
                                                name="file" accept=".pdf" />
                                            @if($data->file)
                                            <small class="text-muted">File saat ini: {{ $data->file }}</small>
                                            @else
                                            <small class="text-danger">* Wajib diisi - Upload file PDF putusan</small>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Preview File Putusan -->
                                    @if(isset($data) && $data->file_url != '')
                                        <div class="form-group row mb-4">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Preview File Putusan</label>
                                            <div class="col-8">
                                                <iframe src="{{ asset($data->file_url) }}"
                                                    style="width:100%; height:400px; border:1px solid #ddd;" frameborder="0"></iframe>
                                                <small class="text-muted">File saat ini: {{ $data->file }}</small>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Dokumen Terkait</label>
                                        <div class="col-8">
                                            <select class="form-control form-select" id="dokumen_terkait" name="dokumen_terkait"
                                                multiple="multiple">
                                                <option></option>
                                            </select>
                                            <small class="text-muted">Pilih dokumen yang terkait dengan putusan ini (opsional)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">
                                        </div>
                                        <div class="col-8">
                                            <button type="submit" class="btn btn-success mr-2" id="simpanfile"><i
                                                    id="loading"></i>Simpan</button>
                                            <a href="{{ route('admin.master.file.putusan') }}">
                                                <button type="button" class="btn btn-danger mr-2">Batal</button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-bold me-1">2022©</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">JDIH Kabupaten
                    Banjarnegara</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
@endsection
@section('footer')
    @include('admin.partial.script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(".pilihtanggal").flatpickr({
            dateFormat: "Y-m-d"
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#subjek').select2({
                placeholder: "Pilih Subjek",
                closeOnSelect: false,
                minimumInputLength: 3,
                tags: true
            });
            $('#dokumen_terkait').select2({
                placeholder: "Pilih Dokumen Terkait",
                closeOnSelect: false,
                ajax: {
                    url: '{{ route("admin.master.file.getDokumenOptions") }}',
                    dataType: 'json',
                    delay: 300,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2
            });
            $('#simpanfile').on('click', function(e) {
                e.preventDefault();
                if (!document.querySelector('#post_file').checkValidity()) {
                    document.querySelector('#post_file').reportValidity();
                    return;
                }

                $('#loading').addClass('fa fa-spinner fa-spin fa-fw');

                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('idph', "{{ $data->id }}");
                formData.append('judul', $('#judul').val());
                formData.append('no_peraturan', $('#no_peraturan').val());
                formData.append('teu', $('#teu').val());
                formData.append('jenis_peradilan', $('#jenis_peradilan').val());
                formData.append('singkatan_jenis_peradilan', $('#singkatan_jenis_peradilan').val());
                formData.append('tempat_peradilan', $('#tempat_peradilan').val());
                formData.append('tgl_dibacakan', $('#tgl_dibacakan').val());
                formData.append('sumber', $('#sumber').val());
                formData.append('status', $('#status').val());
                formData.append('bahasa', $('#bahasa').val());
                formData.append('bidang', $('#bidang').val());
                formData.append('lokasi', $('#lokasi').val());
                formData.append('tahun', $('#tahun').val());
                formData.append('author', $('#author').val());
                formData.append('file', $('#file')[0].files[0]);
                $('#subjek').val().forEach(function(topic) {
                    formData.append('subjek[]', topic);
                });
                $('#dokumen_terkait').val().forEach(function(docId) {
                    formData.append('dokumen_terkait[]', docId);
                });
                Swal.fire("Silahkan Tungu ....")
                Swal.showLoading()
                axios.post('{{ route('admin.master.file.putusan.update.proses') }}', formData)
                    .then(function(response) {
                        if (response.status === 200) {
                            Swal.fire({
                                text: "Putusan berhasil diupdate!",
                                icon: "success",
                            }).then(() => {
                                window.location.href =
                                    `{{ route('admin.master.file.putusan') }}`;
                            })
                        } else {
                            Swal.fire({
                                text: "Putusan gagal diupdate!",
                                icon: "error",
                            });

                            $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');

                        }
                    })
                    .catch(function() {
                        Swal.fire({
                            text: "Terjadi kesalahan!",
                            icon: "error",
                        });

                        $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
                    })
            });
        });
    </script>
@endsection
