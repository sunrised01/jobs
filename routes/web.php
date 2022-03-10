<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\AjaxController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/cache-clear', function () {

     Artisan::call('cache:clear');

     Artisan::call('route:clear');

     dd("cache clear All");
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('dependent-dropdown', [DropdownController::class, 'index']);
Route::post('fetch-states', [DropdownController::class, 'fetchState']);
Route::post('fetch-cities', [DropdownController::class, 'fetchCity']);
Route::post('upload-logo', [AjaxController::class, 'uploadLogo']);
Route::post('upload-cover', [AjaxController::class, 'uploadCover']);
Route::post('update-info', [AjaxController::class, 'updateInfo']);
Route::post('update-social-info', [AjaxController::class, 'updateInfo']);
Route::post('update-contact-info', [AjaxController::class, 'updateInfo']);

Route::middleware('auth')->prefix('account')->group(function () {
     Route::get('dashboard', [CandidateController::class, 'index'])->name('account.dashboard');
     Route::get('profile', [CandidateController::class, 'index'])->name('account.profile');
     Route::get('resume', [CandidateController::class, 'index'])->name('account.resume');
     Route::get('applied-jobs', [CandidateController::class, 'index'])->name('account.applied-jobs');
     Route::get('job-alerts', [CandidateController::class, 'index'])->name('account.job-alerts');
     Route::get('cv-manager', [CandidateController::class, 'index'])->name('account.cv-manager');
     Route::get('messages', [CandidateController::class, 'index'])->name('account.messages');
     Route::get('change-password', [CandidateController::class, 'changePassword'])->name('account.change-password');
     Route::post('job/delete', [CandidateController::class, 'deleteJob'])->name('candidate.deletejob');
});

Route::post('employer/job/save', [EmployerController::class, 'saveJob'])->name('employer.savejob');
Route::post('employer/job/update', [EmployerController::class, 'updateJob'])->name('employer.updatejob');
Route::post('change-password', [AjaxController::class, 'changePassword']);


Route::middleware('auth')->prefix('employer')->group(function () {
     Route::get('dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');
     Route::get('profile', [EmployerController::class, 'profile'])->name('employer.profile');
     Route::get('job/add', [EmployerController::class, 'postJob'])->name('employer.postjob');
     Route::get('job/edit/{id}', [EmployerController::class, 'editJob'])->name('employer.editjob');
     Route::get('jobs', [EmployerController::class, 'getJobs'])->name('employer.jobs');
     Route::get('fetch-jobs', [EmployerController::class, 'fetchjobs'])->name('employer.fetch-jobs');
     Route::get('applicants', [EmployerController::class, 'applicants'])->name('employer.applicants');
     Route::get('changepassword', [EmployerController::class, 'changePassword'])->name('employer.changepassword');
     Route::get('deleteprofile', [EmployerController::class, 'index'])->name('employer.deleteprofile');
     Route::post('job/delete', [EmployerController::class, 'deleteJob'])->name('employer.deletejob');

});

Route::middleware('auth')->prefix('admin')->group(function () {
     Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
     Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
     Route::get('fetch-categories', [CategoryController::class, 'fetchCategories'])->name('admin.fetch-categories');
     Route::get('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.editcategory');
     Route::post('category/add', [CategoryController::class, 'addCategory'])->name('admin.add-category');
});


//auth routes
// Route::middleware('auth')->prefix('account')->group(function () {
//   //every auth routes AccountController
  
//     

//   //Admin Role Routes
//   Route::group(['middleware' => ['role:admin']], function () {
//     Route::get('dashboard', [AdminController::class, 'dashboard'])->name('account.dashboard');
//     Route::get('view-all-users', [AdminController::class, 'viewAllUsers'])->name('account.viewAllUsers');
//     Route::delete('view-all-users', [AdminController::class, 'destroyUser'])->name('account.destroyUser');

//     Route::get('category/{category}/edit', [CompanyCategoryController::class, 'edit'])->name('category.edit');
//     Route::post('category', [CompanyCategoryController::class, 'store'])->name('category.store');
//     Route::put('category/{id}', [CompanyCategoryController::class, 'update'])->name('category.update');
//     Route::delete('category/{id}', [CompanyCategoryController::class, 'destroy'])->name('category.destroy');
//   });

//   //Author Role Routes
//   Route::group(['middleware' => ['role:author']], function () {
//     Route::get('author-section', [AuthorController::class, 'authorSection'])->name('account.authorSection');

//     Route::get('job-application/{id}', [JobApplicationController::class, 'show'])->name('jobApplication.show');
//     Route::delete('job-application', [JobApplicationController::class, 'destroy'])->name('jobApplication.destroy');
//     Route::get('job-application', [JobApplicationController::class, 'index'])->name('jobApplication.index');

//     Route::get('post/create', [PostController::class, 'create'])->name('post.create');
//     Route::post('post', [PostController::class, 'store'])->name('post.store');
//     Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
//     Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
//     Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

//     Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
//     Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
//     Route::post('company', [CompanyController::class, 'store'])->name('company.store');
//     Route::get('company/edit', [CompanyController::class, 'edit'])->name('company.edit');
//     Route::delete('company', [CompanyController::class, 'destroy'])->name('company.destroy');
//   });

//   //User Role routes
//   Route::group(['middleware' => ['role:user']], function () {
//     Route::get('become-employer', [AccountController::class, 'becomeEmployerView'])->name('account.becomeEmployer');
//     Route::post('become-employer', [AccountController::class, 'becomeEmployer'])->name('account.becomeEmployer');
//   });
// });