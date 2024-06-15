<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    public function exportExcel(Request $request) {
        $author = Auth::user()->username;
        $from = $this->sanitizeFilename($request->input('from'));
        $to = $this->sanitizeFilename($request->input('to'));

        $employees = $this->getExportingData(['from' => $from, 'to' => $to]);

        $filename = 'report_from_' . $from . '_to_' . $to . '.xlsx';
        return Excel::download(new EmployeesExport($employees), $filename);
    }

    public function exportPDF(Request $request) {
         $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];
        $employees = $this->getExportingData($constraints);
        $pdf = PDF::loadView('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
        return $pdf->download('report_from_'. $request['from'].'_to_'.$request['to'].'pdf');
        return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
    }


    private function sanitizeFilename($filename) {
        return preg_replace('/[\/\\\\]/', '_', $filename);
    }

    public function search(Request $request) {
        $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];

        $employees = $this->getHiredEmployees($constraints);
        return view('system-mgmt/report/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function getHiredEmployees($constraints) {
        $employees = Employee::where('date_join', '>=', $constraints['from'])
                        ->where('date_join', '<=', $constraints['to'])
                        ->get();
        return $employees;
    }


    private function getExportingData($constraints) {
        return DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->leftJoin('state', 'employees.state_id', '=', 'state.id')
        ->leftJoin('country', 'employees.country_id', '=', 'country.id')
        ->leftJoin('division', 'employees.division_id', '=', 'division.id')
        ->select('employees.firstname', 'employees.middlename', 'employees.lastname', 
        'employees.birthdate', 'employees.address', 'country.name as country', 'employees.zip', 'employees.date_join',
        'department.name as department_name', 'division.name as division_name')
        ->where('date_join', '>=', $constraints['from'])
        ->where('date_join', '<=', $constraints['to'])
        ->get()
        ->map(function ($item, $key) {
        return (array) $item;
        })
        ->all();
    }
}
