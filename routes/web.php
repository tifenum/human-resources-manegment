<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\DelayController;
use App\Http\Controllers\ExitDemandController;
use App\Http\Controllers\CertificateController;




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
    return view('auth.hotel');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
// Route::get('/login1', [App\Http\Controllers\HomeController::class, 'index1'])->name('login1');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('em/dashboard', [App\Http\Controllers\HomeController::class, 'emDashboard'])->name('em/dashboard');
Route::post('/admin/toggle-registration-link', [App\Http\Controllers\UserManagementController::class, 'toggleRegistrationLink'])->name('admin.toggleRegistrationLink');
// -----------------------------settings----------------------------------------//
Route::get('company/settings/page', [App\Http\Controllers\SettingController::class, 'companySettings'])->middleware('auth')->name('company/settings/page');
Route::get('holidays', [App\Http\Controllers\HolidayController::class, 'index'])->middleware('auth')->name('holidays');
Route::get('exits_demands', [App\Http\Controllers\ExitDemandController::class, 'index'])->middleware('auth')->name('exits_demands');
Route::get('exits_demands2', [App\Http\Controllers\ExitDemandController::class, 'index2'])->middleware('auth')->name('exits_demands2');

Route::get('delays', [App\Http\Controllers\DelayController::class, 'index'])->middleware('auth')->name('delays');
Route::get('delays2', [App\Http\Controllers\DelayController::class, 'index2'])->middleware('auth')->name('delays2');

Route::get('certificates', [App\Http\Controllers\CertificateController::class, 'index'])->middleware('auth')->name('certificates');
Route::get('certificates2', [App\Http\Controllers\CertificateController::class, 'index2'])->middleware('auth')->name('certificates2');

Route::post('/advance/store', [App\Http\Controllers\AdvanceController::class, 'store'])->name('advance.store');
Route::get('/advance/create', [App\Http\Controllers\AdvanceController::class, 'create'])->name('advance.create');
Route::get('/holiday-request', [App\Http\Controllers\HolidayController::class, 'index'])->name('holiday.index');
Route::get('/holiday-request2', [App\Http\Controllers\HolidayController::class, 'index2'])->name('holiday.index2');
Route::post('/holiday-request/store', [App\Http\Controllers\HolidayController::class, 'store'])->name('holiday.store');
Route::get('/holidays', [App\Http\Controllers\HolidayController::class, 'index'])->middleware('auth')->name('holiday.index');
Route::get('/holidays2', [App\Http\Controllers\HolidayController::class, 'index2'])->middleware('auth')->name('holiday.index2');

// In routes/web.php

// web.php
Route::post('/departments', [App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');
Route::delete('/departments/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('departments.destroy');

Route::post('/positions', [App\Http\Controllers\PositionController::class, 'store'])->name('positions.store');
Route::delete('/positions/{id}', [App\Http\Controllers\PositionController::class, 'destroy'])->name('positions.destroy');



Route::delete('/holidays/{id}', [App\Http\Controllers\HolidayController::class, 'destroy'])->name('holiday.destroy');
Route::put('/holiday/{id}', [App\Http\Controllers\HolidayController::class, 'update'])->name('holiday.update');

Route::get('/delay/create', [App\Http\Controllers\DelayController::class, 'create'])->name('delay.create');
Route::post('/delay/store', [App\Http\Controllers\DelayController::class, 'store'])->name('delay.store');
Route::get('/exit_demand/create', [App\Http\Controllers\ExitDemandController::class, 'create'])->name('exitdemand.create');
Route::post('/exit_demand/store', [App\Http\Controllers\ExitDemandController::class, 'store'])->name('exitdemand.store');
Route::get('/exit_demands', [App\Http\Controllers\ExitDemandController::class, 'index'])->middleware('auth')->name('exitdemand.index');
Route::put('/exit_demand/update/{id}', [App\Http\Controllers\ExitDemandController::class, 'update'])->name('exitdemand.update');
Route::delete('/exit_demand/destroy/{id}', [App\Http\Controllers\ExitDemandController::class, 'destroy'])->name('exitdemand.destroy');
Route::get('certificate/create', [App\Http\Controllers\CertificateController::class, 'create'])->name('certificate.create');
Route::post('certificate', [App\Http\Controllers\CertificateController::class, 'store'])->name('certificate.store');
Route::get('advances', [App\Http\Controllers\AdvanceController::class, 'index'])->middleware('auth')->name('advance.index');
Route::get('certificate', [App\Http\Controllers\CertificateController::class, 'index'])->name('certificate.index');
Route::get('delay', [App\Http\Controllers\DelayController::class, 'index'])->name('delay.index');
Route::get('exit', [App\Http\Controllers\ExitDemandController::class, 'index'])->name('exit.index');
Route::delete('/advances/{id}', [App\Http\Controllers\AdvanceController::class, 'destroy'])->name('advance.destroy');
Route::get('/advances/{id}/edit', [App\Http\Controllers\AdvanceController::class, 'edit'])->name('advance.edit');
Route::put('/advance/{id}', [App\Http\Controllers\AdvanceController::class, 'update'])->name('advance.update');
Route::get('delay/create', [App\Http\Controllers\DelayController::class, 'index'])->name('delay.create');
// web.php

// web.php
Route::patch('advance/{advance}/updateStatus', [App\Http\Controllers\AdvanceController::class, 'updateStatus'])->name('advance.updateStatus');
Route::patch('holiday/{holiday}/updateStatus', [App\Http\Controllers\HolidayController::class, 'updateStatus'])->name('holiday.updateStatus');
Route::patch('exit/{demand}/updateStatus', [App\Http\Controllers\ExitDemandController::class, 'updateStatus'])->name('exitdemand.updateStatus');
Route::patch('delay/{delay}/updateStatus', [App\Http\Controllers\DelayController::class, 'updateStatus'])->name('delays.updateStatus');
Route::patch('certificate/{id}/updateStatus', [App\Http\Controllers\CertificateController::class, 'updateStatus'])->name('certificate.updateStatus');

// Route for creating a certificate (shows the form)
Route::get('/certificate/create', [CertificateController::class, 'create'])->name('certificate.create');

// Route for storing a new certificate
Route::post('/certificate/store', [CertificateController::class, 'store'])->name('certificate.store');

// Route for listing all certificates
Route::get('/certificate/index', [CertificateController::class, 'index'])->name('certificate.index');

// Route for showing the form to edit a certificate
Route::get('/certificate/{id}/edit', [CertificateController::class, 'edit'])->name('certificate.edit');
Route::get('/certificate/generate/{id}', [CertificateController::class, 'generateCertificate'])->name('certificate.generateCertificate');

// Route for updating a certificate
Route::put('/certificate/{id}', [CertificateController::class, 'update'])->name('certificate.update');

// Route for deleting a certificate
Route::delete('/certificate/{id}', [CertificateController::class, 'destroy'])->name('certificate.destroy');
// Route to store a new delay request
Route::post('delay', [App\Http\Controllers\DelayController::class, 'store'])->name('delays.store');

// Route to display all delay requests

// Route to update an existing delay request
Route::put('/delay/{id}', [App\Http\Controllers\DelayController::class, 'update'])->name('delays.update');

// Route to delete a delay request
Route::delete('delay/{id}', [App\Http\Controllers\DelayController::class, 'destroy'])->name('delays.destroy');

Route::get('roles/permissions/page', [App\Http\Controllers\SettingController::class, 'rolesPermissions'])->middleware('auth')->name('roles/permissions/page');
Route::post('roles/permissions/save', [App\Http\Controllers\SettingController::class, 'addRecord'])->middleware('auth')->name('roles/permissions/save');
Route::post('roles/permissions/update', [App\Http\Controllers\SettingController::class, 'editRolesPermissions'])->middleware('auth')->name('roles/permissions/update');
Route::post('roles/permissions/delete', [App\Http\Controllers\SettingController::class, 'deleteRolesPermissions'])->middleware('auth')->name('roles/permissions/delete');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');
Route::put('/update-profile', [App\Http\Controllers\UserManagementController::class, 'updateProfile'])->name('updateProfile');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->middleware('auth')->name('profile_user');
Route::post('profile/information/save', [App\Http\Controllers\UserManagementController::class, 'profileInformation'])->name('profile/information/save');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::post('user/delete', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth')->name('user/delete');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

// ----------------------------- search user management ------------------------------//
Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');

// ----------------------------- form change password ------------------------------//
Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- job ------------------------------//
Route::get('form/job/list', [App\Http\Controllers\JobController::class, 'jobList'])->name('form/job/list');
Route::get('form/job/view', [App\Http\Controllers\JobController::class, 'jobView'])->name('form/job/view');

// ----------------------------- form employee ------------------------------//
Route::get('advance', [App\Http\Controllers\AdvanceController::class, 'index'])->middleware('auth')->name('advance');
Route::get('advance2', [App\Http\Controllers\AdvanceController::class, 'index2'])->middleware('auth')->name('advance2');
Route::get('all/employee/list', [App\Http\Controllers\EmployeeController::class, 'listAllEmployee'])->middleware('auth')->name('all/employee/list');
Route::post('all/employee/save', [App\Http\Controllers\EmployeeController::class, 'saveRecord'])->middleware('auth')->name('all/employee/save');
Route::get('all/employee/view/edit/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'viewRecord'])->middleware('auth');
Route::post('all/employee/update', [App\Http\Controllers\EmployeeController::class, 'updateRecord'])->middleware('auth')->name('all/employee/update');
Route::get('all/employee/delete/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'deleteRecord'])->middleware('auth');
Route::post('all/employee/search', [App\Http\Controllers\EmployeeController::class, 'employeeSearch'])->name('all/employee/search');
Route::post('all/employee/list/search', [App\Http\Controllers\EmployeeController::class, 'employeeListSearch'])->name('all/employee/list/search');

// ----------------------------- profile employee ------------------------------//
Route::get('employee/profile/{rec_id}', [App\Http\Controllers\EmployeeController::class, 'profileEmployee'])->middleware('auth');


// ----------------------------- form holiday ------------------------------//
Route::get('form/holidays/new', [App\Http\Controllers\HolidayController::class, 'holiday'])->middleware('auth')->name('form/holidays/new');
Route::post('form/holidays/save', [App\Http\Controllers\HolidayController::class, 'saveRecord'])->middleware('auth')->name('form/holidays/save');
Route::post('form/holidays/update', [App\Http\Controllers\HolidayController::class, 'updateRecord'])->middleware('auth')->name('form/holidays/update');

// ----------------------------- form leaves ------------------------------//
Route::get('form/leaves/new', [App\Http\Controllers\LeavesController::class, 'leaves'])->middleware('auth')->name('form/leaves/new');
Route::get('form/leavesemployee/new', [App\Http\Controllers\LeavesController::class, 'leavesEmployee'])->middleware('auth')->name('form/leavesemployee/new');
Route::post('form/leaves/save', [App\Http\Controllers\LeavesController::class, 'saveRecord'])->middleware('auth')->name('form/leaves/save');
Route::post('form/leaves/edit', [App\Http\Controllers\LeavesController::class, 'editRecordLeave'])->middleware('auth')->name('form/leaves/edit');
Route::post('form/leaves/edit/delete', [App\Http\Controllers\LeavesController::class, 'deleteLeave'])->middleware('auth')->name('form/leaves/edit/delete');

// ----------------------------- form attendance  ------------------------------//
Route::get('form/leavesettings/page', [App\Http\Controllers\LeavesController::class, 'leaveSettings'])->middleware('auth')->name('form/leavesettings/page');
Route::get('attendance/page', [App\Http\Controllers\LeavesController::class, 'attendanceIndex'])->middleware('auth')->name('attendance/page');
Route::get('attendance/employee/page', [App\Http\Controllers\LeavesController::class, 'AttendanceEmployee'])->middleware('auth')->name('attendance/employee/page');
Route::get('form/shiftscheduling/page', [App\Http\Controllers\LeavesController::class, 'shiftScheduLing'])->middleware('auth')->name('form/shiftscheduling/page');
Route::get('form/shiftlist/page', [App\Http\Controllers\LeavesController::class, 'shiftList'])->middleware('auth')->name('form/shiftlist/page');

// ----------------------------- form payroll  ------------------------------//
Route::get('form/salary/page', [App\Http\Controllers\PayrollController::class, 'salary'])->middleware('auth')->name('form/salary/page');
Route::post('form/salary/save', [App\Http\Controllers\PayrollController::class, 'saveRecord'])->middleware('auth')->name('form/salary/save');
Route::post('form/salary/update', [App\Http\Controllers\PayrollController::class, 'updateRecord'])->middleware('auth')->name('form/salary/update');
Route::post('form/salary/delete', [App\Http\Controllers\PayrollController::class, 'deleteRecord'])->middleware('auth')->name('form/salary/delete');
Route::get('form/salary/view/{rec_id}', [App\Http\Controllers\PayrollController::class, 'salaryView'])->middleware('auth');
Route::get('form/payroll/items', [App\Http\Controllers\PayrollController::class, 'payrollItems'])->middleware('auth')->name('form/payroll/items');

// ----------------------------- reports  ------------------------------//
Route::get('form/expense/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'index'])->middleware('auth')->name('form/expense/reports/page');
Route::get('form/invoice/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'invoiceReports'])->middleware('auth')->name('form/invoice/reports/page');
Route::get('form/invoice/view/page', [App\Http\Controllers\ExpenseReportsController::class, 'invoiceView'])->middleware('auth')->name('form/invoice/view/page');
Route::get('form/daily/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'dailyReport'])->middleware('auth')->name('form/daily/reports/page');
Route::get('form/leave/reports/page', [App\Http\Controllers\ExpenseReportsController::class, 'leaveReport'])->middleware('auth')->name('form/leave/reports/page');

// ----------------------------- performance  ------------------------------//
Route::get('form/performance/indicator/page', [App\Http\Controllers\PerformanceController::class, 'index'])->middleware('auth')->name('form/performance/indicator/page');
Route::get('form/performance/page', [App\Http\Controllers\PerformanceController::class, 'performance'])->middleware('auth')->name('form/performance/page');
Route::get('form/performance/appraisal/page', [App\Http\Controllers\PerformanceController::class, 'performanceAppraisal'])->middleware('auth')->name('form/performance/appraisal/page');
Route::post('form/performance/indicator/save', [App\Http\Controllers\PerformanceController::class, 'saveRecordIndicator'])->middleware('auth')->name('form/performance/indicator/save');
Route::post('form/performance/indicator/delete', [App\Http\Controllers\PerformanceController::class, 'deleteIndicator'])->middleware('auth')->name('form/performance/indicator/delete');
Route::post('form/performance/indicator/update', [App\Http\Controllers\PerformanceController::class, 'updateIndicator'])->middleware('auth')->name('form/performance/indicator/update');

Route::post('form/performance/appraisal/save', [App\Http\Controllers\PerformanceController::class, 'saveRecordAppraisal'])->middleware('auth')->name('form/performance/appraisal/save');
Route::post('form/performance/appraisal/update', [App\Http\Controllers\PerformanceController::class, 'updateAppraisal'])->middleware('auth')->name('form/performance/appraisal/update');
Route::post('form/performance/appraisal/delete', [App\Http\Controllers\PerformanceController::class, 'deleteAppraisal'])->middleware('auth')->name('form/performance/appraisal/delete');

// ----------------------------- training  ------------------------------//
Route::get('form/training/list/page', [App\Http\Controllers\TrainingController::class, 'index'])->middleware('auth')->name('form/training/list/page');
Route::post('form/training/save', [App\Http\Controllers\TrainingController::class, 'addNewTraining'])->middleware('auth')->name('form/training/save');
Route::post('form/training/delete', [App\Http\Controllers\TrainingController::class, 'deleteTraining'])->middleware('auth')->name('form/training/delete');
Route::post('form/training/update', [App\Http\Controllers\TrainingController::class, 'updateTraining'])->middleware('auth')->name('form/training/update');

// ----------------------------- trainers  ------------------------------//
Route::get('form/trainers/list/page', [App\Http\Controllers\TrainersController::class, 'index'])->middleware('auth')->name('form/trainers/list/page');
Route::post('form/trainers/save', [App\Http\Controllers\TrainersController::class, 'saveRecord'])->middleware('auth')->name('form/trainers/save');
Route::post('form/trainers/update', [App\Http\Controllers\TrainersController::class, 'updateRecord'])->middleware('auth')->name('form/trainers/update');
Route::post('form/trainers/delete', [App\Http\Controllers\TrainersController::class, 'deleteRecord'])->middleware('auth')->name('form/trainers/delete');

// ----------------------------- training type  ------------------------------//
Route::get('form/training/type/list/page', [App\Http\Controllers\TrainingTypeController::class, 'index'])->middleware('auth')->name('form/training/type/list/page');
Route::post('form/training/type/save', [App\Http\Controllers\TrainingTypeController::class, 'saveRecord'])->middleware('auth')->name('form/training/type/save');
Route::post('form//training/type/update', [App\Http\Controllers\TrainingTypeController::class, 'updateRecord'])->middleware('auth')->name('form//training/type/update');
Route::post('form//training/type/delete', [App\Http\Controllers\TrainingTypeController::class, 'deleteTrainingType'])->middleware('auth')->name('form//training/type/delete');

