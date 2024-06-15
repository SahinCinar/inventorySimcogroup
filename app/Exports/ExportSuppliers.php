<?php

namespace App\Exports;

use App\Supplier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSuppliers implements FromView
{
    /**
     * nog te doen
     */
    use Exportable;

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('suppliers.SuppliersAllExcel',[
            'suppliers' => Supplier::all()
        ]);
    }
}
