<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeDetailsController;
use App\Http\Controllers\EmployeeAttachmentsController;
use App\Http\Controllers\Employees_Report;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('employees' , EmployeesController::class);

Route::resource('/employee_details' , EmployeeDetailsController::class);

Route::resource('/employee_attachments', EmployeeAttachmentsController::class);

Route::post('/employee_details_destroy', [App\Http\Controllers\EmployeeDetailsController::class, 'destroy'])->name('employee_details_destroy');

Route::post('/employee_attachment_destroy', [App\Http\Controllers\EmployeeAttachmentsController::class, 'destroy'])->name('employee_attachment_destroy');

//سيجلب معه رقم الوطني واسم الملف لانه نحنا ضمن المجلد ببلك قمنا بحفظ المرفق في مجلد باسم الفاتور
Route::get('View_file/{natual_number}/{file_name}', [App\Http\Controllers\EmployeeAttachmentsController::class, 'open_file'])->name('View_file');

//سيجلب معه رقم الفاتورة واسم الملف لانه نحنا ضمن المجلد ببلك قمنا بحفظ المرفق في مجلد باسم الفاتور
Route::get('download/{natual_number}/{file_name}', [App\Http\Controllers\EmployeeAttachmentsController::class, 'get_file'])->name('download');

Route::get('/edit_employee_details/{id}', [App\Http\Controllers\EmployeeDetailsController::class, 'edit_employee_details'])->name('edit_employee_details');

Route::post('/update_employees_details/{id}', [App\Http\Controllers\EmployeeDetailsController::class, 'update'])->name('update_employees_details');

Route::get('/EmployeesDetails/{id}', [App\Http\Controllers\EmployeeDetailsController::class, 'edit'])->name('EmployeesDetails');

Route::get('export_employees', [App\Http\Controllers\EmployeesController::class, 'export'])->name('export_employees');

Route::get('/edit_employee/{id}', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('edit_employee');

Route::post('/update_employees/{id}', [App\Http\Controllers\EmployeesController::class, 'update'])->name('update_employees');

Route::get('/Print_employees/{id}', [App\Http\Controllers\EmployeesController::class, 'Print_employees'])->name('Print_employees');

Route::get('/employee_study/{id}', [App\Http\Controllers\EmployeesController::class, 'employee_study'])->name('employee_study');

Route::get('/employee_create', [App\Http\Controllers\EmployeeDetailsController::class, 'create'])->name('employee_create');

Route::get('employees_report', [App\Http\Controllers\Employees_Report::class, 'index'])->name('employees_report');

Route::post('Search_employees', [App\Http\Controllers\Employees_Report::class, 'Search_employees'])->name('Search_employees');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('/roles' , RoleController::class);
    Route::resource('/users' , UserController::class);
    });
   
    Route::post('import', [App\Http\Controllers\EmployeesController::class, 'import'])->name('employees.import');



    Route::get('MarkAsRead_all', [App\Http\Controllers\EmployeesController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('/{page}', [App\Http\Controllers\AdminController::class, 'index'])->name('page');
