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
        $model = DB::table('inventarisasi_hukum');

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
}
