<?php

use App\Models\Course;
use App\Models\Slider;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RolesController ;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalaryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PartinerController;
use App\Http\Controllers\CompanyTeamController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\VisionController;

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


Route::get('/home/login', [App\Http\Controllers\HomeController::class, 'getLogin'])->name('home.getLogin');
Route::Post('/home/login', [App\Http\Controllers\HomeController::class, 'postLogin'])->name('home.postLogin');
Route::get('/home/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home.logout');




Route::get('/', function () {

    $data['slider'] = Slider::where('active' , 1)->get() ;
    $data['courses'] = Course::limit(6)->get() ;
    $data['training'] = Training::limit(6)->get() ;

    return view('store' , $data);
   // return  redirect()->route('home.getLogin' );
   // return redirect()->route('home') ;

})->name('store');

Route::get('/login', function () {
     return view('auth.login');

 });

Auth::routes();

Route::get('/home/about', [App\Http\Controllers\FrontController::class, 'about'])->name('home.about');
Route::get('/home/news', [App\Http\Controllers\FrontController::class, 'news'])->name('home.news');








Route::resource('roles', RolesController::class);
Route::resource('sliders', SliderController::class);


Route::get('sliders/activate/{id}', [SliderController::class, 'activate'])->name('sliders.activate');

Route::resource('news', NewsController::class);
Route::get('news/activate/{id}', [NewsController::class, 'activate'])->name('news.activate');
Route::resource('aboutus', AboutUsController::class);
Route::resource('setting', SettingController::class);
Route::resource('service', ServiceController::class);
Route::resource('about', AboutController::class);

Route::get('about/activate/{id}', [AboutController::class, 'activate'])->name('about.activate');
Route::resource('partiner', PartinerController::class);
Route::get('partiner/activate/{id}', [PartinerController::class, 'activate'])->name('partiner.activate');
Route::resource('company_team', CompanyTeamController::class);
Route::get('company_team/activate/{id}', [CompanyTeamController::class, 'activate'])->name('company_team.activate');
Route::resource('history', HistoryController::class);
Route::get('history/activate/{id}', [HistoryController::class, 'activate'])->name('history.activate');
Route::resource('vision', VisionController::class);
Route::get('vision/activate/{id}', [VisionController::class, 'activate'])->name('vision.activate');






//Route::resource('galary', GalaryController::class);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/homepage', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

Route::get('/project_follow', [App\Http\Controllers\HomeController::class, 'project_follow'])->name('project_follow');




///////////////////////////////// start  new add  ////////////////////




//////////////////// project ///////////////////

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('getProject');
//Route::get('/createproject', [App\Http\Controllers\ProjectController::class, 'create'])->name('createProject');
Route::post('/createproject', [App\Http\Controllers\ProjectController::class, 'store'])->name('createProject');
Route::get('/editproject/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('editProject');
Route::put('/updateproject/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('updateProject');
Route::delete('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');


/////////////////////////////////// galary //////////////////////

Route::get('/galary/{id}', [GalaryController::class, 'index'])->name('galary.index');
Route::get('/creat_galary/{id}', [GalaryController::class, 'create'])->name('galary.create');
Route::post('/galary/{id}', [GalaryController::class, 'store'])->name('galary.store');
Route::get('/edit_galary/{id}', [GalaryController::class, 'edit'])->name('galary.edit');
Route::Put('/update_galary/{id}', [GalaryController::class, 'update'])->name('galary.update');






//////////////////// profile  ////////
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index')->middleware('permission:users-List');
Route::post('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/updateProfile', [App\Http\Controllers\UserController::class, 'update_profile'])->name('updateProfile');


Route::any('user-logout' , function(){

    Auth::logout();
    return redirect('/login');

})->name('user.logout');


///////////////////////////////////// ajax ///////////
Route::get('/getCityStates/{id}', function($id){

    $data=App\Models\State::where('city_id',$id)->pluck('name','id');
   // return $data ;
    return json_encode( $data);

});


//ClearCache
Route::get('/clearcache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

