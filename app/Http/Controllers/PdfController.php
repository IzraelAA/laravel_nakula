<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class PdfController extends Controller
{
    public function download()
    {

        $materi =  DB::table('materi')->get();
        // dd($materi);
        $pdf = PDF::loadView(
            'superadmin.pdf.tugas',
            [
                'materi' => $materi
            ]
        );
        return $pdf->download('materi.pdf');
    }
}
