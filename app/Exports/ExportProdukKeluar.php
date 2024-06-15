<?php

namespace App\Exports;

use App\Product_Keluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProdukKeluar implements FromView
{
    /**
     * nog te doen
     */
    use Exportable;

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('product_keluar.productKeluarAllExcel',[
            'product_keluar' => Product_Keluar::all()
        ]);
    }
}
