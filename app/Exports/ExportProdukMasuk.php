<?php

namespace App\Exports;

use App\Product_Masuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProdukMasuk implements FromView
{
    /**
     * nog te doen
     */
    use Exportable;

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('product_masuk.productMasukAllExcel',[
            'product_masuk' => Product_Masuk::all()
        ]);
    }
}
