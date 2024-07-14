<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::put('/changestatus', [App\Http\Controllers\UserController::class, 'changeAccountStatus'])->name('changeAccountStatus');
Route::put('/changePass', [App\Http\Controllers\UserController::class, 'changePass'])->name('changePass');
Route::put('/changephone', [App\Http\Controllers\UserController::class, 'changephone'])->name('changephone');
Route::get('/getuser', [App\Http\Controllers\UserController::class, 'getUser'])->name('getUser');


Route::get('/adminstats', [App\Http\Controllers\DashboardController::class, 'adminDash'])->name('adminDash');

Route::get('/company', [App\Http\Controllers\UserController::class, 'getCompanies'])->name('getCompany');
Route::post('/company', [App\Http\Controllers\UserController::class, 'createCompany'])->name('createCompany');
Route::put('/company', [App\Http\Controllers\UserController::class, 'updateCompany'])->name('updateCompany');

Route::get('/companytrainer', [App\Http\Controllers\UserController::class, 'getCompanyTrainers'])->name('getCompanyTrainers');
Route::get('/trainer', [App\Http\Controllers\UserController::class, 'getTrainers'])->name('getTrainer');
Route::post('/trainer', [App\Http\Controllers\UserController::class, 'createTrainer'])->name('createTrainer');
Route::put('/trainer', [App\Http\Controllers\UserController::class, 'updateTrainer'])->name('updateTrainer');
/*
Route::get('/manager', [App\Http\Controllers\UserController::class, 'getManagers'])->name('getManager');
Route::post('/manager', [App\Http\Controllers\UserController::class, 'createManager'])->name('createManager');
Route::put('/manager', [App\Http\Controllers\UserController::class, 'updateManager'])->name('updateManager');
*/
// Route::get('/student', [App\Http\Controllers\UserController::class, 'getStudents'])->name('getStudent');
// Route::post('/student', [App\Http\Controllers\UserController::class, 'createStudent'])->name('createStudent');
// Route::put('/student', [App\Http\Controllers\UserController::class, 'updateStudent'])->name('updateStudent');

Route::get('/course', [App\Http\Controllers\CourseController::class, 'getCourse'])->name('getCourse');
Route::post('/course', [App\Http\Controllers\CourseController::class, 'createCourse'])->name('createCourse');
Route::post('/courseupdate', [App\Http\Controllers\CourseController::class, 'updateCourse'])->name('updateCourse');
Route::put('/course', [App\Http\Controllers\CourseController::class, 'updateCourse'])->name('updateCourse');

Route::get('/studentcourse', [App\Http\Controllers\CourseController::class, 'getStudentsCourses'])->name('getStudentsCourses');
Route::get('/companyStudents', [App\Http\Controllers\CourseController::class, 'companyStudents'])->name('companyStudents');

Route::get('/companycourses', [App\Http\Controllers\CourseController::class, 'getCompanyCourses'])->name('getCompanyCourses');
Route::post('/companycourses', [App\Http\Controllers\CourseController::class, 'addCourseToCompany'])->name('addCourseToCompany');

Route::get('/coursetrainer', [App\Http\Controllers\TrainerCourseController::class, 'getTrainerByCourseId'])->name('getTrainerByCourseId');

Route::get('/trainercourses', [App\Http\Controllers\TrainerCourseController::class, 'getTrainerCourses'])->name('getTrainerCourses');
Route::post('/trainercourses', [App\Http\Controllers\TrainerCourseController::class, 'updateTrainerCourses'])->name('updateTrainerCourses');

Route::get('/trainerdetails', [App\Http\Controllers\TrainerCourseController::class, 'getTrainerByUserId'])->name('getTrainerByUserId');
Route::post('/trainerimage', [App\Http\Controllers\TrainerCourseController::class, 'updateTrainerImage'])->name('updateTrainerImage');
Route::post('/trainercert', [App\Http\Controllers\TrainerCourseController::class, 'updateTrainerCert'])->name('updateTrainerCert');
Route::post('/trainerwork', [App\Http\Controllers\TrainerCourseController::class, 'updateTrainerRemoteWork'])->name('updateTrainerRemoteWork');


Route::get('/companys', [App\Http\Controllers\CompanyController::class, 'getAllCompanies'])->name('getAllCompanies');

Route::get('/coursesdetails', [App\Http\Controllers\CompanyCourseController::class, 'getCompanyCoursesDetails'])->name('getCompanyCoursesDetails');

Route::get('/assesment', [App\Http\Controllers\AssesmentController::class, 'getTrainersAssess'])->name('getTrainersAssess');
Route::post('/assesment', [App\Http\Controllers\AssesmentController::class, 'assessTrainers'])->name('assessTrainers');
Route::put('/assesment', [App\Http\Controllers\AssesmentController::class, 'managerAssesment'])->name('managerAssesment');

Route::get('/city', [App\Http\Controllers\CityController::class, 'getCities'])->name('getCities');
Route::get('/managercompany', [App\Http\Controllers\ManagerController::class, 'managercompany'])->name('managercompany');

Route::get('/mngtrainer', [App\Http\Controllers\ManagerController::class, 'getManagerTrainers'])->name('getManagerTrainers');
Route::get('/mngstudents', [App\Http\Controllers\ManagerController::class, 'getManagerStudents'])->name('getManagerStudents');
Route::get('/companydetails', [App\Http\Controllers\CompanyController::class, 'getCompanyByUserId'])->name('getCompanyByUserId');
Route::post('/companyDoc', [App\Http\Controllers\CompanyController::class, 'updateCompanyDoc'])->name('updateCompanyDoc');
