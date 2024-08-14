<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\SampahModel;
use Illuminate\Http\Request;
use App\TimbangSampah;
use ConsoleTVs\Charts\Facades\Charts;

class GrafikController extends Controller
{
    //

    public function showChart()
    {
        $timbang = TimbangSampah::all();
       
        $totalBeratAnorganik = 0;

        foreach ($timbang as $item) {
            $totalBeratAnorganik += $item->berat_anorganik;
        }

        $totalBeratOrganik = 0;

        foreach ($timbang as $item) {
            $totalBeratOrganik += $item->berat_organik;
        }
        
          return view('dashpengguna', compact('timbang','totalBeratAnorganik','totalBeratOrganik'));
    }

    public function showChartCount()
    {
        $countSampah = Pengajuan::count();

        $sampah = Pengajuan::all();

      
        
        return view('homepetugas', compact('sampah','countSampah'));

    }

    public function date(){
        $date = Pengajuan::all();

        $tanggal = 0;

        foreach ($date as $item) {
            $tanggal += $item->tanggal;
        }        return view('homepetugas', compact('date','tanggal'));
    }
}
