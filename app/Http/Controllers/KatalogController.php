<?php

namespace App\Http\Controllers;

use App\Models\KatalogDownload;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class KatalogController extends Controller
{

    public function index()
    {
        $data = KatalogDownload::select(['katalog.*'])
            ->orderBy('id', 'desc')
            ->get();
        $title = 'Katalog';
        $kategori = DB::table("kategori")->get();
        return view('page/katalog/index', compact('data', 'title', 'kategori'));
    }



}
