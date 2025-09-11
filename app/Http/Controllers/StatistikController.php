<?php

namespace App\Http\Controllers;

use App\Models\InventarisasiHukum;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use PDF;

class StatistikController extends Controller
{
    public function index()
    {
        $phpcurrentyear = date("Y");

        // =========================================================================
        // PERBAIKAN UNTUK GRAFIK BULANAN (REAL-TIME)
        // =========================================================================

        // 1. Siapkan array kosong untuk 12 bulan untuk setiap kategori (kunci dimulai dari 1)
        $perda = array_fill(1, 12, 0);
        $pergub = array_fill(1, 12, 0);
        $katalog = array_fill(1, 12, 0);
        $naskah = array_fill(1, 12, 0);
        $rekom = array_fill(1, 12, 0);
        $kepgub = array_fill(1, 12, 0);
        $instgub = array_fill(1, 12, 0);
        $se = array_fill(1, 12, 0);

        // 2. Ambil semua data bulanan dalam satu query yang efisien
        $monthlyData = InventarisasiHukum::select(
            DB::raw('MONTH(created_at) as bulan'),
            'jenis',
            DB::raw('COUNT(*) as total')
        )
            ->where('tahun_diundang', $phpcurrentyear)
            ->groupBy('bulan', 'jenis')
            ->get();

        // 3. Isi array data dengan hasil query
        foreach ($monthlyData as $data) {
            switch ($data->jenis) {
                case 1:
                    $perda[$data->bulan] = $data->total;
                    break;
                case 2:
                    $pergub[$data->bulan] = $data->total;
                    break;
                case 3:
                    $katalog[$data->bulan] = $data->total;
                    break;
                case 4:
                    $naskah[$data->bulan] = $data->total;
                    break;
                case 5:
                    $rekom[$data->bulan] = $data->total;
                    break;
                case 6:
                    $kepgub[$data->bulan] = $data->total;
                    break;
                case 7:
                    $instgub[$data->bulan] = $data->total;
                    break;
                case 8:
                    $se[$data->bulan] = $data->total;
                    break;
            }
        }

        // 4. Hapus key bulan (1-12) agar menjadi array biasa yang bisa dibaca Chart.js
        $perda = array_values($perda);
        $pergub = array_values($pergub);
        $katalog = array_values($katalog);
        $naskah = array_values($naskah);
        $rekom = array_values($rekom);
        $kepgub = array_values($kepgub);
        $instgub = array_values($instgub);
        $se = array_values($se);

        // =========================================================================
        // DATA LAIN UNTUK HALAMAN STATISTIK (TIDAK DIUBAH)
        // =========================================================================
        $pengunjung = DB::select("SELECT date as tgl, sum(hits) as jml FROM visitor group by date ");
        $tgl = array_column($pengunjung, 'tgl');
        $jml = array_column($pengunjung, 'jml');

        $tahunber = InventarisasiHukum::select(DB::raw("tahun_diundang"))
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            ->where('tahun_diundang', '!=', '0000')
            ->get();

        $tahunberlakutakberlaku = InventarisasiHukum::select(DB::raw("tahun_diundang"))
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            ->limit(6)
            ->pluck('tahun_diundang')->toArray();

        $grafikkategori = InventarisasiHukum::select(DB::raw("count(*) as count"))
            ->join('kategori', 'inventarisasi_hukum.jenis', '=', 'kategori.id')
            ->orderBy("kategori.nama", 'asc')
            ->groupBy(DB::raw("kategori.nama"))
            ->pluck('count')->toArray();

        $tahunan_perundangan = DB::select("
        select 
            tahun_diundang
            , sum(case when jenis= 1 then 1 else 0 end) perda
            , sum(case when jenis= 2 then 1 else 0 end) pergub
            , sum(case when jenis= 3 then 1 else 0 end) katalog
            , sum(case when jenis= 4 then 1 else 0 end) naskah
            , sum(case when jenis= 5 then 1 else 0 end) rekom
            , sum(case when jenis= 6 then 1 else 0 end) kepgub
            , sum(case when jenis= 7 then 1 else 0 end) instruksi
            , sum(case when jenis= 8 then 1 else 0 end) surat
            from inventarisasi_hukum
            where tahun_diundang != '0000'
            group by tahun_diundang
            order by tahun_diundang desc");

        return view('page/pengunjung/statistik')
            ->with('tahunberlakutakberlaku', json_encode($tahunberlakutakberlaku, JSON_NUMERIC_CHECK))
            ->with('tahunber', $tahunber)
            ->with('tahunan_perundangan', $tahunan_perundangan)
            ->with('grafikkategori', json_encode($grafikkategori, JSON_NUMERIC_CHECK))
            ->with('tgl', json_encode($tgl, JSON_NUMERIC_CHECK))
            ->with('jml', json_encode($jml, JSON_NUMERIC_CHECK))
            ->with('perda', json_encode($perda, JSON_NUMERIC_CHECK))
            ->with('pergub', json_encode($pergub, JSON_NUMERIC_CHECK))
            ->with('katalog', json_encode($katalog, JSON_NUMERIC_CHECK))
            ->with('naskah', json_encode($naskah, JSON_NUMERIC_CHECK))
            ->with('rekom', json_encode($rekom, JSON_NUMERIC_CHECK))
            ->with('kepgub', json_encode($kepgub, JSON_NUMERIC_CHECK))
            ->with('instgub', json_encode($instgub, JSON_NUMERIC_CHECK))
            ->with('se', json_encode($se, JSON_NUMERIC_CHECK));
    }

    public function perbidang()
    {
        $data = InventarisasiHukum::select(DB::raw("count(*) as jml, bidang_hukum.nama"))
            ->leftJoin('bidang_hukum', 'bidang_hukum.id', '=', 'inventarisasi_hukum.bid_hukum')
            ->whereRaw('bidang_hukum.nama is not null')
            ->groupBy('bidang_hukum.nama')
            ->get();

        return json_encode($data);
    }

    public function matrix_perkategori()
    {
        $data = InventarisasiHukum::select(DB::raw("count(*) as jml, kategori.nama, tahun"))
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->groupBy('inventarisasi_hukum.tahun_diundang')
            ->get();

        return json_encode($data);
    }

    public function berlaku_takberlaku()
    {
        $data = DB::select(
            "
        select 
            tahun_diundang
            , sum(case when status= 1 then 1 else 0 end) berlaku
            , sum(case when status= 0 then 1 else 0 end) tak_berlaku
            from inventarisasi_hukum
            group by tahun_diundang 
            order by tahun_diundang desc
            limit 6"
        );


        return json_encode($data);
    }

    public function tahunan_perundangan()
    {
        $data = DB::select(
            "
        select 
            tahun_diundang
            , sum(case when jenis= 1 then 1 else 0 end) perda
            , sum(case when jenis= 2 then 1 else 0 end) pergub
            , sum(case when jenis= 3 then 1 else 0 end) katalog
            , sum(case when jenis= 4 then 1 else 0 end) naskah
            , sum(case when jenis= 5 then 1 else 0 end) rekom
            , sum(case when jenis= 6 then 1 else 0 end) kepgub
            , sum(case when jenis= 7 then 1 else 0 end) instruksi
            , sum(case when jenis= 8 then 1 else 0 end) surat
            from inventarisasi_hukum
            group by tahun_diundang
            order by tahun_diundang desc
        limit 6"
        );


        return json_encode($data);
    }

    public function bulanan_perundangan()
    {
        $phpcurrentyear = date("Y");
        $data = DB::select(
            "
        SELECT 
            MONTH(created_at) as bulan,
            SUM(CASE WHEN jenis = 1 THEN 1 ELSE 0 END) AS perda,
            SUM(CASE WHEN jenis = 2 THEN 1 ELSE 0 END) AS pergub,
            SUM(CASE WHEN jenis = 3 THEN 1 ELSE 0 END) AS katalog,
            SUM(CASE WHEN jenis = 4 THEN 1 ELSE 0 END) AS naskah,
            SUM(CASE WHEN jenis = 5 THEN 1 ELSE 0 END) AS rekom,
            SUM(CASE WHEN jenis = 6 THEN 1 ELSE 0 END) AS kepgub,
            SUM(CASE WHEN jenis = 7 THEN 1 ELSE 0 END) AS instruksi,
            SUM(CASE WHEN jenis = 8 THEN 1 ELSE 0 END) AS surat
        FROM inventarisasi_hukum
        WHERE tahun_diundang = $phpcurrentyear
        GROUP BY MONTH(created_at)
        ORDER BY MONTH(created_at) ASC"
        );

        return json_encode($data);
    }
}
