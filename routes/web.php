<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('layouts.master');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController');
    Route::get('/apiCategories', 'CategoryController@apiCategories')->name('api.categories');
    Route::get('/exportCategoriesAll', 'CategoryController@exportCategoriesAll')->name('exportPDF.categoriesAll');
    Route::get('/exportCategoriesAllExcel', 'CategoryController@exportExcel')->name('exportExcel.categoriesAll');

    Route::resource('customers', 'CustomerController');
    Route::get('/apiCustomers', 'CustomerController@apiCustomers')->name('api.customers');
    Route::post('/importCustomers', 'CustomerController@ImportExcel')->name('import.customers');
    Route::get('/exportCustomersAll', 'CustomerController@exportCustomersAll')->name('exportPDF.customersAll');
    Route::get('/exportCustomersAllExcel', 'CustomerController@exportExcel')->name('exportExcel.customersAll');

    Route::resource('sales', 'SaleController');
    Route::get('/apiSales', 'SaleController@apiSales')->name('api.sales');
    Route::post('/importSales', 'SaleController@ImportExcel')->name('import.sales');
    Route::get('/exportSalesAll', 'SaleController@exportSalesAll')->name('exportPDF.salesAll');
    Route::get('/exportSalesAllExcel', 'SaleController@exportExcel')->name('exportExcel.salesAll');

    Route::resource('suppliers', 'SupplierController');
    Route::get('/apiSuppliers', 'SupplierController@apiSuppliers')->name('api.suppliers');
    Route::post('/importSuppliers', 'SupplierController@ImportExcel')->name('import.suppliers');
    Route::get('/exportSuppliersAll', 'SupplierController@exportSuppliersAll')->name('exportPDF.suppliersAll');
    Route::get('/exportSuppliersAllExcel', 'SupplierController@exportExcel')->name('exportExcel.suppliersAll');

    Route::resource('products', 'ProductController');
    Route::get('/apiProducts', 'ProductController@apiProducts')->name('api.products');
    Route::get('products/create', 'ProductController@create')->name('products.create');
    Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

    Route::resource('productsOut', 'ProductKeluarController');
    Route::get('/apiProductsOut', 'ProductKeluarController@apiProductsOut')->name('api.productsOut');
    Route::get('/exportProductKeluarAll', 'ProductKeluarController@exportProductKeluarAll')->name('exportPDF.productKeluarAll');
    Route::get('/exportProductKeluarAllExcel', 'ProductKeluarController@exportExcel')->name('exportExcel.productKeluarAll');
    Route::get('/exportProductKeluar/{id}', 'ProductKeluarController@exportProductKeluar')->name('exportPDF.productKeluar');

    Route::resource('productsIn', 'ProductMasukController');
    Route::get('/apiProductsIn', 'ProductMasukController@apiProductsIn')->name('api.productsIn');
    Route::get('/exportProductMasukAll', 'ProductMasukController@exportProductMasukAll')->name('exportPDF.productMasukAll');
    Route::get('/exportProductMasukAllExcel', 'ProductMasukController@exportExcel')->name('exportExcel.productMasukAll');
    Route::get('/exportProductMasuk/{id}', 'ProductMasukController@exportProductMasuk')->name('exportPDF.productMasuk');
    Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');

    Route::resource('user-management', 'UserManagementController');

    Route::resource('employee-management', 'EmployeeManagementController');
    Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

    Route::get('/apiDepartments', 'DepartmentController@apiDepartments')->name('api.departments');
    Route::resource('system-management/department', 'DepartmentController');
    Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');
        Route::get('system-management/department/{department}/edit', 'DepartmentController@edit')->name('department.edit');
    Route::patch('system-management/department/{department}', 'DepartmentController@update')->name('department.update');
    Route::delete('system-management/department/{department}', 'DepartmentController@destroy')->name('department.destroy');
    Route::get('system-management/department/{department}/print', 'DepartmentController@print')->name('department.print');

    Route::resource('system-management/division', 'DivisionController');
    Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');
    Route::delete('system-management/division/{division}', 'DivisionController@destroy')->name('division.destroy');
    Route::patch('system-management/division/{division}/update', 'DivisionController@update')->name('division.update');
    Route::get('system-management/division/{division}/edit', 'DivisionController@edit')->name('division.edit');
    Route::get('system-management/division/{division}/print', 'DivisionController@print')->name('division.print');

    Route::get('system-management/country/{country}/edit', 'CountryController@edit')->name('country.edit');
    Route::patch('system-management/country/{country}', 'CountryController@update')->name('country.update');
    Route::delete('system-management/country/{country}', 'CountryController@destroy')->name('country.destroy');
    Route::resource('system-management/country', 'CountryController');
    Route::post('system-management/country/search', 'CountryController@search')->name('country.search');
    Route::get('system-management/country/{country}/print', 'CountryController@print')->name('country.print');

    Route::resource('system-management/state', 'StateController');
    Route::post('system-management/state/search', 'StateController@search')->name('state.search');
    Route::get('system-management/state/{state}/edit', 'StateController@edit')->name('state.edit');
    Route::patch('system-management/state/{state}', 'StateController@update')->name('state.update');
    Route::delete('system-management/state/{state}', 'StateController@destroy')->name('state.destroy');
    Route::get('system-management/state/{state}/print', 'StateController@print')->name('state.print');

    Route::resource('system-management/city', 'CityController');
    Route::post('system-management/city/search', 'CityController@search')->name('city.search');
    Route::get('system-management/city/{city}/edit', 'CityController@edit')->name('city.edit');
    Route::patch('system-management/city/{city}', 'CityController@update')->name('city.update');
    Route::delete('system-management/city/{city}', 'CityController@destroy')->name('city.destroy');
    Route::get('system-management/city/{city}/print', 'CityController@print')->name('city.print');

    Route::get('system-management/report', 'ReportController@index');
    Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
    Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
    Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');
    Route::get('/export', 'ReportController@prepareExportingData')->name('export');

    Route::get('avatars/{name}', 'EmployeeManagementController@load');

    Route::resource('user', 'UserController');
    Route::get('/apiUser', 'UserController@apiUsers')->name('api.users');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
