<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');

 Route::get('/employeeList', [EmployeeController::class, 'index'])->name('employeeList');
Route::get('/companyList', [CompanyController::class, 'index'])->name('companyList');

Route::get('/createCompany', [CompanyController::class, 'create'])->name('createCompany');
Route::get('/createEmp', [EmployeeController::class, 'create'])->name('createEmp');

Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::get('/edit_comp/{id}',[CompanyController::class,'edit_comp'])->name('company.edit');
//Route::get('/distroy/{id}',[RegisterController::class,'distroy'])->name('company.distroy');

Route::post('/insertCompany', [CompanyController::class, 'action_post'])->name('insertCompany');
Route::post('/updateCompany', [CompanyController::class, 'action_update'])->name('updateCompany');

Route::post('/insertEmp', [EmployeeController::class, 'action_post'])->name('insertEmp');
Route::post('/updateEmp', [EmployeeController::class, 'update'])->name('updateEmp');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
