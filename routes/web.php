<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\EmailVerificationController;
use App\Http\Controllers\auth\ProfileController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\profile\ProfilePersonlController;
use App\Http\Controllers\profile\ProfileProfessionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProposelController;
use App\Http\Controllers\ReviewRatingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('cms')->middleware('guest:admin,user,profession')->group(function () {
        Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('cms.login');
        Route::post('login', [AuthController::class, 'login']);
        Route::get('/choose', [RegisterController::class, 'choose'])->name('choose');
        Route::get('/register', [RegisterController::class, 'showRegister'])->name('cms.register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
        Route::get('/register/user', [RegisterController::class, 'showRegisterUser'])->name('cms.register-user');
        Route::post('/register/user', [RegisterController::class, 'registerUser'])->name('register-user');
    });
    Route::middleware('guest')->group(function () {
        Route::get('{guard}/forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('password.request');
        Route::post('/forgot-password', [ResetPasswordController::class, 'emailForgetPassword'])->name('password.email');
        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPassword'])->name('password.reset');
        Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
    });
      Route::prefix('cms')->middleware(['auth:user,profession'])->group(function () {
                Route::get('verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
                Route::get('send-verification', [EmailVerificationController::class, 'send'])->name('verification.send');
                Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
                Route::get('/chat',[MessageController::class, 'index'])->name('chat.index');

            });
    Route::prefix('cms')->middleware(['auth:profession','verified','CheckTrial'])->group(function () {
        Route::get('/Profile-Personal',[ProfilePersonlController::class, 'profileView'])->name('Profile-Personal');
        Route::resource('portfolios', PortfolioController::class);
        Route::put('/updatePassword', [AuthController::class, 'updatePassword']);
        Route::put('/updateProfile', [ProfilePersonlController::class, 'profileUpdate']);
        Route::put('/infoProfile', [ProfilePersonlController::class, 'infoProfile']);
        Route::get('/Profile-Profession',[ProfileProfessionController::class, 'profile'])->name('Profile');
        Route::get('/Portfolio-Profession',[ProfileProfessionController::class, 'portfolio'])->name('Portfolio');
        Route::post('/ProfessionSkill/store', [ProfilePersonlController::class, 'StoreSkill'])->name('profession.store-skills');
        Route::get('/plans', [PlanController::class, 'index'])->name('plan.choose');
        Route::get('/plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
        Route::post('/subscription', [PlanController::class, 'subscription'])->name("subscription.create");
        Route::get('/rating', [ReviewRatingController::class, 'index'])->name("rating.index");
 
    });

    Route::prefix('cms')->middleware(['auth:user','verified'])->group(function () {
        Route::resource('projects', ProjectController::class); 
    });
    Route::prefix('cms')->middleware(['auth:admin,user,profession'])->group(function () {
        Route::get('/category/{category_id}', [CategoryController::class, 'getSubCategory']);
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::resource('skills', SkillController::class);
        Route::resource('proposels', ProposelController::class); 
        Route::resource('professions', ProfessionController::class); 
        Route::get('/profession/portfolio/{portfolio}', [ProfessionController::class, 'showPortfolio'])->name('showPortfolio');
        Route::get('/Project/all',[ProjectController::class, 'projectView'])->name('Projects');
        Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
    });
    Route::prefix('cms')->middleware(['auth:admin,user,profession'])->group(function () {
        Route::view('/Account-Settings', 'cms.auth.accountSetting')->name('Account-Settings');
        Route::put('/update-password', [AuthController::class, 'updatePassword']);
        Route::put('/update-profile', [ProfileController::class, 'profileUpdate']);
        Route::resource('admins', AdminController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::get('roles/{role}/permission', [RoleController::class, 'editRolePermissions'])->name('role.edit-permission');
        Route::put('roles/{role}/permission', [RoleController::class, 'updateRolePermissions']);
        Route::get('/all-profession',[ProfessionController::class, 'allProfession'])->name('allProfession');
        Route::post('profession/change-notarized/{id}', [ProfessionController::class, 'Notarized'])->name('profession.Notrized');
        Route::post('/review-store', [ProfessionController::class, 'reviewstore'])->name('review.store');
    });
});
