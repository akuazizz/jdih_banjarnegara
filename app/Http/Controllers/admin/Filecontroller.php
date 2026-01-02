<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\InventarisasiHukum;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Filecontroller extends Controller
{
    private function getKategoriIdByLink($link)
    {
        return Kategori::where('link', $link)->value('id');
    }

    public function index()
    {
        $kategori = Kategori::get();
        return view('admin.page.file.file', compact('kategori'));
    }

    public function detail($id = null)
    {
        $data = InventarisasiHukum::where('id', $id)->first();

        // dd($data);
        return view('admin.page.file.file_detail', compact('data'));
    }
    public function proses($id = null)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        // dd($data);
        return view('admin.page.file.file_proses', compact('data'));
    }
    public function update($id = null)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        $kategori = Kategori::get();
        $bidang = DB::table('bidang_hukum')->get();
        $abstrak = DB::table('abstrak')->where('id_ph', $id)->first();
        $bahasa = DB::table('master_bahasa')->get();

        return view('admin.page.file.file_update', compact('data', 'kategori', 'bidang', 'abstrak', 'bahasa'));
    }

    public function datatable(Request $request)
    {
        $model = DB::table('inventarisasi_hukum')->where('tipe_dokumen', '!=', 4);

        if ($request->judul != '') $model->where('content', 'like', '%' . $request->judul . '%');
        if ($request->nomor != '') $model->where('no_peraturan', $request->nomor);
        if ($request->tahun != '') $model->where('tahun_diundang', $request->tahun);
        if ($request->kategori != '') $model->where('jenis', $request->kategori);

        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapusfile" style="margin:5px;" id="' . $data->id . '">Hapus </a>';
                $html .= "<a href='" . route('admin.master.file.update', [$data->id]) . "' class='btn btn-sm btn-success' style='margin:5px;' id='editfile'>Edit </a>";
                $html .= "<a href='" . route('admin.master.file.detail', [$data->id]) . "' class='btn btn-sm btn-primary' style='margin:5px;' id='detailfile'>Detail </a>";
                if (session('role') == 'validator' || session('role') == 'superadmin') {
                    $html .= "<a href='" . route('admin.master.file.proses', [$data->id]) . "' class='btn btn-sm btn-info' style='margin:5px;' id='detailproses'>Proses </a>";
                }
                return $html;
            })
            ->addColumn('publish', function ($data) {
                if ($data->publish == '1') {
                    $html_1 = "<a class='btn btn-sm btn-success' style='margin:5px;' id='aktif'>Aktif </a>";
                    // $html_1 = "<a href='". route('admin.master.file.publish',[$data->id]) ."' class='btn btn-sm btn-success' style='margin:5px;' id='aktif'>Aktif </a>";
                } elseif ($data->publish == '2') {
                    $html_1 = "<a class='btn btn-sm btn-warning' style='margin:5px;' id=''>Menunggu Konfirmasi </a>";
                } elseif ($data->publish == '3') {
                    $html_1 = "<a class='btn btn-sm btn-danger' style='margin:5px;' id=''>Validasi Ditolak </a>";
                } else {
                    $html_1 = "<a class='btn btn-sm btn-danger' style='margin:5px;' id='tidak_aktif'>Tidak Aktif </a>";
                }
                return $html_1;
            })
            ->rawColumns(['publish', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function publish($id)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        if ($data->publish == '1') {
            $data->publish = '0';
        } else {
            $data->publish = '1';
        }

        $data->save();
        return redirect()->back();
    }

    public function tolak($id)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        $data->publish = '3';
        $data->save();
        return redirect()->back();
    }

    public function tambah()
    {
        $kategori = Kategori::get();
        $bidang = DB::table('bidang_hukum')->get();
        $bahasa = DB::table('master_bahasa')->get();

        return view('admin.page.file.tambah', compact('kategori', 'bidang', 'bahasa'));
    }

    public function store(Request $request)
    {

        $id = Auth::id();
        $abstrak = $request->abstrak;
        $kat = Kategori::where('id', $request->jenis)->first();

        $singkatan = strtoupper($kat->singkatan);

        $no1link = str_replace('/', '-', $request->no_peraturan);
        $noPeraturanlink = str_replace('.', '-', $no1link);

        $no1 = str_replace('/', '_', $request->no_peraturan);
        $noPeraturan = str_replace('.', '_', $no1);

        if ($request->file != 'undefined') {

            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();

            $destinationPath = public_path() . "/produk_hukum/" . $kat->singkatan . "/";
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, $mode = 0777, true, true);
            }

            if (!in_array($file_ex, array('pdf'))) {
                return response()->json(['status' => 'error', 'message' => 'jenis file yang di ijinkan hanya pdf'], 400);
            }
            $upf = $file->move($destinationPath, $file_name);
            $fu = "produk_hukum/" . $kat->singkatan . "/" . $file_name;
        }

        if ($abstrak != 'undefined') {
            $destinationPathAbstrak = public_path() . "/produk_hukum/abstrak/";
            $abstrakname = "abstrak_" . $kat->singkatan . "_" . $noPeraturan . "_th_" . $request->tahun . ".pdf";
            $upa = $abstrak->move($destinationPathAbstrak, $abstrakname);
        } else {
            $abstrakname = "";
        }

        $filename = $kat->singkatan . "_" . $noPeraturan . "_th_" . $request->tahun . ".pdf";

        if (in_array($request->jenis, [4, 10, 5, 9, 19, 20, 21, 18])) {
            $link = $kat->singkatan . "_" . $noPeraturanlink . "_th_" . $request->tahun;
            $existingLinksCount = InventarisasiHukum::where('link', 'like', $link . '_%')->count();
            $incrementId = $existingLinksCount > 0 ? $existingLinksCount + 1 : 1;
            $link .= '_' . $incrementId;
        } else {
            $link = $kat->singkatan . "_" . $noPeraturanlink . "_th_" . $request->tahun;
        }

        $tambah = InventarisasiHukum::create([
            'jenis' => $request->jenis,
            'tipe_dokumen' => $request->tipe_dokumen,
            'bid_hukum' => $request->bidang,
            'singkatan_jenis' => $singkatan,
            'no_peraturan' => $request->no_peraturan,
            'pengarang' => $request->pengarang,
            'tgl_ditetap' => date('Y-m-d', strtotime($request->tgl_ditetapkan)),
            'tgl_diundang' => date('Y-m-d', strtotime($request->tgl_diundang)),
            'tahun_diundang' => $request->tahun,
            'content' => $request->tentang,
            'abstrak' => $abstrakname,
            'tmp_terbit' => $request->tempat_terbit,
            'penerbit' => $request->penerbit,
            'sumber' => $request->sumber,
            'isbn' => $request->isbn,
            'no_panggil' => $request->no_panggil,
            'no_induk_buku' => $request->no_induk_buku,
            'file'  => $file_name ?? "",
            'file_tags' => implode(", ", $request->tags),
            'file_date' => date('Y-m-d H:i:s'),
            'file_author' => $request->author,
            'file_url' => $fu ?? "",
            'pemrakarsa' => $request->pemrakarsa,
            'tajuk_entri_utama' => $request->teu,
            'penandatangan' => $request->penandatangan,
            'status' => $request->status,
            'hasil_uji_materi' => $request->hasil_uji_materi,
            'file_custom_status' => $request->ket_status,
            'link' => $link,
            'bahasa' => $request->bahasa,
            'publish' => 2,
            'unduh' => 0,
            'view' => 0,
            'lokasi' => $request->lokasi,
            'deskripsi_fisik' => $request->deskripsi_fisik,
        ]);

        $createabstrak = DB::table('abstrak')->insert([
            'id_ph' => $tambah->id,
            'file_abstrak' => $abstrakname
        ]);

        // Handle dokumen terkait
        if ($request->has('dokumen_terkait') && is_array($request->dokumen_terkait)) {
            foreach ($request->dokumen_terkait as $relatedId) {
                DB::table('inventarisasi_hukum_related')->insert([
                    'inventarisasi_hukum_id' => $tambah->id,
                    'related_id' => $relatedId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if ($tambah) {
            return response()->json(['status' => 'success', 'message' => 'tambah Produk hukum baru berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'tambah Produk hukum baru gagal'], 400);
        }
    }

    public function update_proses(Request $request)
    {
        // dd($request->all());
        $file = $request->file;
        // $file_name = $file->getClientOriginalName();
        // $file_size = round($file->getSize() / 1024);
        if ($file != 'undefined') {
            $file_ex = $file->getClientOriginalExtension();
        }
        $ph = InventarisasiHukum::where('id', $request->idph);

        $no1link = str_replace('/', '-', $request->no_peraturan);
        $noPeraturanlink = str_replace('.', '-', $no1link);

        $no1 = str_replace('/', '_', $request->no_peraturan);
        $noPeraturan = str_replace('.', '_', $no1);

        $getid = $ph->first();
        $kat = Kategori::where('id', $request->jenis)->first();
        $getabstrak = DB::table('abstrak')->where('id_ph', $request->idph)->first();
        $abstrak = $request->abstrak;
        $singkatan = strtoupper($kat->singkatan);

        if ($file != 'undefined') {
            if (!in_array($file_ex, array('pdf'))) {
                return response()->json(['status' => 'error', 'message' => 'jenis file yang di ijinkan hanya pdf'], 400);
            }
        }
        $destinationPath = public_path() . "/produk_hukum/" . $kat->singkatan . "/";
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }
        $destinationPathAbstrak = public_path() . "/produk_hukum/abstrak/";

        if ($abstrak != 'undefined') {
            $abstrakname = "abstrak_" . $kat->singkatan . "_" . str_replace('/', '_', $request->no_peraturan) . "_th_" . $request->tahun . ".pdf";
            $abstrak->move($destinationPathAbstrak, $abstrakname);
        } else {
            $abstrakname = $getid->abstrak;
        }

        if ($file != 'undefined') {
            $file_name = $file->getClientOriginalName();
            $filename = $kat->singkatan . "_" . str_replace('/', '_', $request->no_peraturan) . "_th_" . $request->tahun . ".pdf";
            $file->move($destinationPath, $file_name);
        } else {
            $file_name = $getid->file;
        }

        $fu = "produk_hukum/" . $kat->singkatan . "/" . $file_name;

        if ($request->tags != '') {
            $tags = implode(", ", $request->tags);
        } else {
            $tags = "";
        }
        $tambah = $ph->update([
            'jenis' => $request->jenis,
            'tipe_dokumen' => $request->tipe_dokumen,
            'bid_hukum' => $request->bidang,
            'singkatan_jenis' => $singkatan,
            'no_peraturan' => $request->no_peraturan,
            'pengarang' => $request->pengarang,
            'tgl_ditetap' => date('Y-m-d', strtotime($request->tgl_ditetapkan)),
            'tgl_diundang' => date('Y-m-d', strtotime($request->tgl_diundang)),
            'tahun_diundang' => $request->tahun,
            'content' => $request->tentang,
            'abstrak' => $abstrakname,
            'tmp_terbit' => $request->tempat_terbit,
            'penerbit' => $request->penerbit,
            'sumber' => $request->sumber,
            'isbn' => $request->isbn,
            'no_panggil' => $request->no_panggil,
            'no_induk_buku' => $request->no_induk_buku,
            'file'  => $file_name,
            'file_tags' => $tags,
            'file_date' => date('Y-m-d H:i:s'),
            'file_author' => $request->author,
            'file_url' => $fu,
            'pemrakarsa' => $request->pemrakarsa,
            'tajuk_entri_utama' => $request->teu,
            'penandatangan' => $request->penandatangan,
            'status' => $request->status,
            'hasil_uji_materi' => $request->hasil_uji_materi,
            'file_custom_status' => $request->ket_status,
            'bahasa' => $request->bahasa,
            'publish' => 2,
            'lokasi' => $request->lokasi,
            'deskripsi_fisik' => $request->deskripsi_fisik,

        ]);

        if ($getabstrak != '') {
            DB::table('abstrak')->where('id_ph', $request->idph)->update([
                'file_abstrak' => $abstrakname
            ]);
        } else {
            DB::table('abstrak')->insert([
                'id_ph' => $request->idph,
                'file_abstrak' => $abstrakname
            ]);
        }

        // Handle dokumen terkait - hapus yang lama dan tambahkan yang baru
        DB::table('inventarisasi_hukum_related')->where('inventarisasi_hukum_id', $request->idph)->delete();
        if ($request->has('dokumen_terkait') && is_array($request->dokumen_terkait)) {
            foreach ($request->dokumen_terkait as $relatedId) {
                DB::table('inventarisasi_hukum_related')->insert([
                    'inventarisasi_hukum_id' => $request->idph,
                    'related_id' => $relatedId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if ($tambah) {
            return response()->json(['status' => 'success', 'message' => 'Update data Produk hukum baru berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Update data Produk hukum baru gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $id = $req->idf;
        $hapus = InventarisasiHukum::where('id', $id)->delete();
        if ($hapus) {
            return response()->json(['status' => 'success', 'message' => 'Hapus Produk Hukum berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'tambah Produk hukum baru gagal'], 400);
        }
    }

    // Putusan methods
    public function indexPutusan()
    {
        return view('admin.page.file.file_putusan');
    }

    public function datatablePutusan(Request $request)
    {
        $model = DB::table('inventarisasi_hukum')->where('tipe_dokumen', 4);

        if ($request->judul != '') $model->where('content', 'like', '%' . $request->judul . '%');
        if ($request->nomor != '') $model->where('no_peraturan', $request->nomor);
        if ($request->tahun != '') $model->where('tahun_diundang', $request->tahun);

        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapusfile" style="margin:5px;" id="' . $data->id . '">Hapus </a>';
                $html .= "<a href='" . route('admin.master.file.putusan.update', [$data->id]) . "' class='btn btn-sm btn-success' style='margin:5px;' id='editfile'>Edit </a>";
                $html .= "<a href='" . route('admin.master.file.putusan.detail', [$data->id]) . "' class='btn btn-sm btn-primary' style='margin:5px;' id='detailfile'>Detail </a>";
                if (session('role') == 'validator' || session('role') == 'superadmin') {
                    $html .= "<a href='" . route('admin.master.file.putusan.proses', [$data->id]) . "' class='btn btn-sm btn-info' style='margin:5px;' id='detailproses'>Proses </a>";
                }
                return $html;
            })
            ->addColumn('publish', function ($data) {
                if ($data->publish == '1') {
                    $html_1 = "<a class='btn btn-sm btn-success' style='margin:5px;' id='aktif'>Aktif </a>";
                } elseif ($data->publish == '2') {
                    $html_1 = "<a class='btn btn-sm btn-warning' style='margin:5px;' id=''>Menunggu Konfirmasi </a>";
                } elseif ($data->publish == '3') {
                    $html_1 = "<a class='btn btn-sm btn-danger' style='margin:5px;' id=''>Validasi Ditolak </a>";
                } else {
                    $html_1 = "<a class='btn btn-sm btn-danger' style='margin:5px;' id='tidak_aktif'>Tidak Aktif </a>";
                }
                return $html_1;
            })
            ->rawColumns(['publish', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function tambahPutusan()
    {
        $bidang = DB::table('bidang_hukum')->get();
        $bahasa = DB::table('master_bahasa')->get();

        return view('admin.page.file.tambah_putusan', compact('bidang', 'bahasa'));
    }

    public function storePutusan(Request $request)
    {
        $id = Auth::id();
        $putusanKategoriId = $this->getKategoriIdByLink('putusan');

        $no1link = str_replace('/', '-', $request->no_peraturan);
        $noPeraturanlink = str_replace('.', '-', $no1link);

        $no1 = str_replace('/', '_', $request->no_peraturan);
        $noPeraturan = str_replace('.', '_', $no1);

        if ($request->file != 'undefined') {
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();

            $destinationPath = public_path() . "/produk_hukum/putusan/";
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, $mode = 0777, true, true);
            }

            if (!in_array($file_ex, array('pdf'))) {
                return response()->json(['status' => 'error', 'message' => 'jenis file yang di ijinkan hanya pdf'], 400);
            }
            $upf = $file->move($destinationPath, $file_name);
            $fu = "produk_hukum/putusan/" . $file_name;
        } else {
            return response()->json(['status' => 'error', 'message' => 'File putusan wajib diupload'], 400);
        }

        $link = "putusan_" . $noPeraturanlink . "_th_" . $request->tahun;

        $abstrak = $request->file('abstrak');
        $abstrakname = "";

        if ($abstrak) {
            $destinationPathAbstrak = public_path() . "/produk_hukum/abstrak/";
            if (!file_exists($destinationPathAbstrak)) {
                File::makeDirectory($destinationPathAbstrak, $mode = 0777, true, true);
            }
            $abstrakname = "abstrak_putusan_" . $noPeraturanlink . "_th_" . $request->tahun . ".pdf";
            $abstrak->move($destinationPathAbstrak, $abstrakname);
        }

        $tambah = InventarisasiHukum::create([
            'nama' => 'Putusan',
            'tipe_dokumen' => 4,
            'jenis' => $putusanKategoriId,
            'content' => $request->judul,
            'tajuk_entri_utama' => $request->teu,
            'no_peraturan' => $request->no_peraturan,
            'jenis_peradilan' => $request->jenis_peradilan,
            'singkatan_jenis_peradilan' => $request->singkatan_jenis_peradilan,
            'tempat_peradilan' => $request->tempat_peradilan,
            'tgl_dibacakan' => date('Y-m-d', strtotime($request->tgl_dibacakan)),
            'sumber' => $request->sumber,
            'file_tags' => implode(", ", $request->subjek),
            'status' => $request->status,
            'bahasa' => $request->bahasa,
            'bid_hukum' => $request->bidang,
            'lokasi' => $request->lokasi,
            'file' => $file_name ?? "",
            'file_url' => $fu ?? "",
            'file_date' => date('Y-m-d H:i:s'),
            'file_author' => $request->author,
            'tahun_diundang' => $request->tahun,
            'link' => $link,
            'publish' => 2,
            'unduh' => 0,
            'view' => 0,
            'abstrak' => $abstrakname,
        ]);

        if ($abstrakname) {
            DB::table('abstrak')->insert([
                'id_ph' => $tambah->id,
                'file_abstrak' => $abstrakname
            ]);
        }

        // Handle dokumen terkait
        if ($request->has('dokumen_terkait') && is_array($request->dokumen_terkait)) {
            foreach ($request->dokumen_terkait as $relatedId) {
                DB::table('inventarisasi_hukum_related')->insert([
                    'inventarisasi_hukum_id' => $tambah->id,
                    'related_id' => $relatedId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if ($tambah) {
            return response()->json(['status' => 'success', 'message' => 'tambah Putusan baru berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'tambah Putusan baru gagal'], 400);
        }
    }

    public function updatePutusan($id = null)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        $bidang = DB::table('bidang_hukum')->get();
        $bahasa = DB::table('master_bahasa')->get();

        return view('admin.page.file.file_update_putusan', compact('data', 'bidang', 'bahasa'));
    }

    public function updatePutusanProses(Request $request)
    {
        $putusanKategoriId = $this->getKategoriIdByLink('putusan');
        $file = $request->file;
        if ($file != 'undefined') {
            $file_ex = $file->getClientOriginalExtension();
        }

        $ph = InventarisasiHukum::where('id', $request->idph);

        $no1link = str_replace('/', '-', $request->no_peraturan);
        $noPeraturanlink = str_replace('.', '-', $no1link);

        $getid = $ph->first();
        $getabstrak = DB::table('abstrak')->where('id_ph', $request->idph)->first();

        if ($file != 'undefined') {
            if (!in_array($file_ex, array('pdf'))) {
                return response()->json(['status' => 'error', 'message' => 'jenis file yang di ijinkan hanya pdf'], 400);
            }
        }

        $destinationPath = public_path() . "/produk_hukum/putusan/";
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }
        $destinationPathAbstrak = public_path() . "/produk_hukum/abstrak/";

        $abstrak = $request->file('abstrak');
        if ($abstrak) {
            $abstrakname = "abstrak_putusan_" . $noPeraturanlink . "_th_" . $request->tahun . ".pdf";
            $abstrak->move($destinationPathAbstrak, $abstrakname);
        } else {
            $abstrakname = $getid->abstrak;
        }

        if ($file != 'undefined') {
            $file_name = $file->getClientOriginalName();
            $file->move($destinationPath, $file_name);
        } else {
            if (!$getid->file) {
                return response()->json(['status' => 'error', 'message' => 'File putusan wajib diupload'], 400);
            }
            $file_name = $getid->file;
        }

        $fu = "produk_hukum/putusan/" . $file_name;

        $tags = implode(", ", $request->subjek);

        $tambah = $ph->update([
            'nama' => 'Putusan',
            'tipe_dokumen' => 4,
            'jenis' => $putusanKategoriId ?: $getid->jenis,
            'content' => $request->judul,
            'tajuk_entri_utama' => $request->teu,
            'no_peraturan' => $request->no_peraturan,
            'jenis_peradilan' => $request->jenis_peradilan,
            'singkatan_jenis_peradilan' => $request->singkatan_jenis_peradilan,
            'tempat_peradilan' => $request->tempat_peradilan,
            'tgl_dibacakan' => date('Y-m-d', strtotime($request->tgl_dibacakan)),
            'sumber' => $request->sumber,
            'file_tags' => $tags,
            'status' => $request->status,
            'bahasa' => $request->bahasa,
            'bid_hukum' => $request->bidang,
            'lokasi' => $request->lokasi,
            'file' => $file_name,
            'file_url' => $fu,
            'file_date' => date('Y-m-d H:i:s'),
            'file_author' => $request->author,
            'tahun_diundang' => $request->tahun,
            'publish' => 2,
            'abstrak' => $abstrakname,
        ]);

        if ($getabstrak != '') {
            DB::table('abstrak')->where('id_ph', $request->idph)->update([
                'file_abstrak' => $abstrakname
            ]);
        } elseif ($abstrakname) {
            DB::table('abstrak')->insert([
                'id_ph' => $request->idph,
                'file_abstrak' => $abstrakname
            ]);
        }

        // Handle dokumen terkait - hapus yang lama dan tambahkan yang baru
        DB::table('inventarisasi_hukum_related')->where('inventarisasi_hukum_id', $request->idph)->delete();
        if ($request->has('dokumen_terkait') && is_array($request->dokumen_terkait)) {
            foreach ($request->dokumen_terkait as $relatedId) {
                DB::table('inventarisasi_hukum_related')->insert([
                    'inventarisasi_hukum_id' => $request->idph,
                    'related_id' => $relatedId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if ($tambah) {
            return response()->json(['status' => 'success', 'message' => 'Update data Putusan berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Update data Putusan gagal'], 400);
        }
    }

    public function detailPutusan($id = null)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        $bahasa = DB::table('master_bahasa')->where('id', $data->bahasa)->value('bahasa');
        return view('admin.page.file.file_detail_putusan', compact('data', 'bahasa'));
    }

    public function prosesPutusan($id = null)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        $bahasa = DB::table('master_bahasa')->where('id', $data->bahasa)->value('bahasa');
        return view('admin.page.file.file_proses_putusan', compact('data', 'bahasa'));
    }

    public function publishPutusan($id)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        if ($data->publish == '1') {
            $data->publish = '0';
        } else {
            $data->publish = '1';
        }
        $data->save();
        return redirect()->back();
    }

    public function tolakPutusan($id)
    {
        $data = InventarisasiHukum::where('id', $id)->first();
        $data->publish = '3';
        $data->save();
        return redirect()->back();
    }

    public function deletePutusan(Request $req)
    {
        $id = $req->idf;
        $hapus = InventarisasiHukum::where('id', $id)->delete();
        if ($hapus) {
            return response()->json(['status' => 'success', 'message' => 'Hapus Putusan berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hapus Putusan gagal'], 400);
        }
    }

    public function getDokumenOptions(Request $request)
    {
        try {
            $search = $request->get('q', '');
            $page = $request->get('page', 1);
            $perPage = 30;

            // Debug: Log the request parameters
            \Log::info('getDokumenOptions called', [
                'search' => $search,
                'page' => $page,
                'user' => auth()->check() ? auth()->id() : 'not authenticated'
            ]);

            $query = InventarisasiHukum::select(
                'inventarisasi_hukum.id',
                'no_peraturan',
                'tahun_diundang',
                'content',
                'inventarisasi_hukum.tipe_dokumen',
                'kategori.nama'
            )
                ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
                ->where('inventarisasi_hukum.publish', 1);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('no_peraturan', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orWhere('nama', 'like', '%' . $search . '%');
                });
            }

            $total = $query->count();
            \Log::info('Total results found: ' . $total);

            $results = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

            $items = $results->map(function ($item) {
                // Untuk putusan, gunakan nama "Putusan", untuk lainnya gunakan nama kategori
                $namaDokumen = ($item->tipe_dokumen == 4) ? 'Putusan' : $item->nama;
                return [
                    'id' => $item->id,
                    'text' => ($namaDokumen ? $namaDokumen . ' ' : '') .
                        ($item->no_peraturan ? 'No. ' . $item->no_peraturan . ' ' : '') .
                        'Tahun ' . $item->tahun_diundang .
                        ' - ' . substr(strip_tags($item->content), 0, 50) . '...'
                ];
            });

            \Log::info('Returning ' . count($items) . ' items');

            return response()->json([
                'items' => $items,
                'total_count' => $total
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in getDokumenOptions: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Internal server error: ' . $e->getMessage(),
                'items' => [],
                'total_count' => 0
            ], 500);
        }
    }
}
