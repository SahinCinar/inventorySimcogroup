<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    protected $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function collection()
    {
        return collect($this->employees);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Address',
            'Email',
            'Phone',
            // Add other necessary headings
        ];
    }
}

