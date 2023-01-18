<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;

use App\Http\Controllers\Profilcontroller;
use App\Http\Controllers\Subusercontroller;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\Sub_WriterController;
use Illuminate\Support\Facades\Auth;



use App\Http\Controllers\writer\WriterController;
use App\Http\Controllers\admin\AdminController;
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

//--------------------------------------------------------------------------
// Auth Admin
//--------------------------------------------------------------------------

Auth::routes();

// Route::prefix('user')->name('user.')->group(function () {


//     Route::middleware('guest:web')->group(function () {
//         Route::get('signup_us', [UserController::class, 'signup'])->name('signup_user');
//         Route::get('login_us', [UserController::class, 'login'])->name('login_user');
//         Route::post('login_inc', [UserController::class, 'login_inc'])->name('login_inc_user');
//         Route::post('signup_inc', [UserController::class, 'signup_inc'])->name('signup_inc_user');
//     });
//     Route::middleware('auth:web')->group(function () {
//         // Route::view('/dashborad', 'admin.dashboard')->name('dashboard');
//         Route::get('logout', [UserController::class, 'logout'])->name('logout');

//         Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
//         Route::get('profile', [Profilcontroller::class, 'profile'])->name('profile');
//         Route::post('profile_inc', [Profilcontroller::class, 'profile_inc'])->name('profile_inc');

//         Route::get('setting', [SettingController::class, 'setting'])->name('setting');
//         Route::post('add_setting', [SettingController::class, 'add_setting'])->name('add_setting');
//         Route::get('Sub_user', [Subusercontroller::class, 'Sub_user'])->name('Sub_user');
//         Route::get('add_Sub', [Subusercontroller::class, 'add_Sub_user'])->name('add_sub_user');
//         Route::post('add_Sub_user_inc', [Subusercontroller::class, 'add_Sub_user_inc'])->name('add_Sub_user_inc');
//         Route::get('edit_sub/{id}', [Subusercontroller::class, 'edit_sub']);
//         Route::post('update_sub', [Subusercontroller::class, 'update_sub'])->name('update_sub');
//         Route::get('delete/{id}', [Subusercontroller::class, 'delete']);
//         Route::get('/', [homecontroller::class, 'home'])->name('home');
//         Route::get('calander', [homecontroller::class, 'calander'])->name('calander');
//         Route::get('about_page', [homecontroller::class, 'about_page'])->name('about_page');
//         Route::get('contact', [homecontroller::class, 'contact'])->name('contact')->middleware('checkus');
//         Route::get('show_blog/{id}', [homecontroller::class, 'show_blog']);
//         Route::post('add_contact', [homecontroller::class, 'add_contact'])->name('add_contact');
//         Route::get('loginuser', [homecontroller::class, 'loginuser'])->name('loginuser');
//         Route::post('signupuser_inc', [homecontroller::class, 'signupuser_inc'])->name('signupuser_inc');
//         Route::post('loginuser_inc', [homecontroller::class, 'loginuser_inc'])->name('loginuser_inc');
//         Route::get('blog', [BlogController::class, 'blog'])->name('blog');
//         Route::get('add_blog', [BlogController::class, 'add_blog'])->name('add_blog');
//         Route::post('add_blog_inc', [BlogController::class, 'add_blog_inc'])->name('add_blog_inc');
//         Route::get('edit_blog/{id} ', [BlogController::class, 'edit_blog']);
//         Route::post('edit_blog_inc', [BlogController::class, 'edit_blog_inc'])->name('edit_blog_inc');
//         Route::get('add_about', [Aboutcontroller::class, 'add_about'])->name('add_about');
//         // Route::post('add_about_inc', [Aboutcontroller::class, 'add_about_inc'])->name('add_about_inc');
//     });
// });




// -------------------------------------------------------------------------------



// -------------------------------------------------------------------------------
// --------------------------------------------------------------------------
// Auth User
// --------------------------------------------------------------------------


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('signup_admin', [AdminController::class, 'signup'])->name('signup');
        Route::get('login_admin', [AdminController::class, 'login'])->name('login');
        Route::post('login_inc', [AdminController::class, 'login_inc'])->name('login_inc');
        Route::post('signup_inc', [AdminController::class, 'signup_inc'])->name('signup_inc');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');


        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [Profilcontroller::class, 'profile'])->name('profile');
        Route::post('profile_inc', [Profilcontroller::class, 'profile_inc'])->name('profile_inc');

        Route::get('setting', [SettingController::class, 'setting'])->name('setting');
        Route::post('add_setting', [SettingController::class, 'add_setting'])->name('add_setting');

        // sub writer

        Route::get('Sub_writer', [Sub_WriterController::class, 'Sub_writer'])->name('Sub_writer');
        Route::get('add_Sub_writer', [Sub_WriterController::class, 'add_Sub_writer'])->name('add_sub_writer');
        Route::post('add_Sub_writer_inc', [Sub_WriterController::class, 'add_Sub_writer_inc'])->name('add_Sub_writer_inc');
        Route::get('edit_Sub_writer/{id}', [Sub_WriterController::class, 'edit_Sub_writer']);
        Route::post('update_writer', [Sub_WriterController::class, 'update_writer'])->name('update_writer');
        Route::get('delete_writer/{id}', [Sub_WriterController::class, 'delete_writer']);





        //-----------------------------------------------------------------------
        Route::get('Sub_user', [Subusercontroller::class, 'Sub_user'])->name('Sub_user');
        Route::get('add_Sub', [Subusercontroller::class, 'add_Sub_user'])->name('add_sub_user');
        Route::post('add_Sub_user_inc', [Subusercontroller::class, 'add_Sub_user_inc'])->name('add_Sub_user_inc');


        Route::get('edit_sub/{id}', [Subusercontroller::class, 'edit_sub']);
        Route::post('update_sub', [Subusercontroller::class, 'update_sub'])->name('update_sub');
        Route::get('delete_user/{id}', [Subusercontroller::class, 'delete_user']);
        Route::get('/', [homecontroller::class, 'home'])->name('home');
        Route::get('calander', [homecontroller::class, 'calander'])->name('calander');
        Route::get('about_page', [homecontroller::class, 'about_page'])->name('about_page');
        Route::get('contact', [homecontroller::class, 'contact'])->name('contact')->middleware('checkus');
        Route::get('show_blog/{id}', [homecontroller::class, 'show_blog']);
        Route::post('add_contact', [homecontroller::class, 'add_contact'])->name('add_contact');
        Route::get('loginuser', [homecontroller::class, 'loginuser'])->name('loginuser');
        Route::post('signupuser_inc', [homecontroller::class, 'signupuser_inc'])->name('signupuser_inc');
        Route::post('loginuser_inc', [homecontroller::class, 'loginuser_inc'])->name('loginuser_inc');
        Route::get('blog', [BlogController::class, 'blog'])->name('blog');
        Route::get('add_blog', [BlogController::class, 'add_blog'])->name('add_blog');
        Route::post('add_blog_inc', [BlogController::class, 'add_blog_inc'])->name('add_blog_inc');
        Route::get('edit_blog/{id} ', [BlogController::class, 'edit_blog']);
        Route::post('edit_blog_inc', [BlogController::class, 'edit_blog_inc'])->name('edit_blog_inc');
        Route::get('delete/{id}', [BlogController::class, 'delete_blog']);
        Route::get('add_about', [Aboutcontroller::class, 'add_about'])->name('add_about');
        Route::post('add_about_inc', [Aboutcontroller::class, 'add_about_inc'])->name('add_about_inc');
        Route::get('message/{id}', [AdminController::class, 'message']);
        Route::get('inbox', [AdminController::class, 'inbox'])->name('inbox');
        Route::get('delete_message/{id}', [AdminController::class, 'delete_message']);
    });
});

//--------------------------------------------------------------------------
// Auth Writer
//--------------------------------------------------------------------------

Route::prefix('writer')->name('writer.')->group(function () {

    Route::middleware('guest:writer')->group(function () {
        Route::get('signup_writer', [WriterController::class, 'signup'])->name('signup_writer');
        Route::get('writer_login', [WriterController::class, 'login'])->name('login_writer');
        Route::post('login_inc', [WriterController::class, 'login_inc'])->name('login_inc_writer');
        Route::post('signup_inc', [WriterController::class, 'signup_inc'])->name('signup_inc_writer');
    });
    Route::middleware('auth:writer')->group(function () {
        Route::get('logout', [WriterController::class, 'logout_writer'])->name('writer_logout');

        Route::get('/dashboard_writer', [WriterController::class, 'dashboard'])->name('dashboard');
        Route::get('profile_writer', [Profilcontroller::class, 'profile_writer'])->name('profile');
        Route::post('profile_writer_inc', [Profilcontroller::class, 'profile_writer_inc'])->name('profile_writer_inc');

        // Route::get('setting', [SettingController::class, 'setting_writer'])->name('setting');
        // Route::post('add_setting', [SettingController::class, 'add_setting_writer'])->name('add_setting');
        Route::get('Sub_user', [Sub_WriterController::class, 'Sub_user'])->name('Sub_user');
        Route::get('add_Sub', [Sub_WriterController::class, 'add_Sub_user'])->name('add_sub_user');
        Route::post('add_Sub_user_inc', [Sub_WriterController::class, 'add_Sub_user_inc'])->name('add_Sub_user_inc');
        Route::get('edit_sub/{id}', [Sub_WriterController::class, 'edit_sub_user']);
        Route::post('update_sub', [Sub_WriterController::class, 'update_sub_user'])->name('update_sub_user');
        Route::get('delete/{id}', [Sub_WriterController::class, 'delete_user'])->name('delete_user');
        Route::get('/', [homecontroller::class, 'home'])->name('home');
        Route::get('calander', [homecontroller::class, 'calander'])->name('calander');
        Route::get('about_page', [homecontroller::class, 'about_page'])->name('about_page');
        Route::get('contact', [homecontroller::class, 'contact'])->name('contact')->middleware('checkus');
        Route::get('show_blog/{id}', [homecontroller::class, 'show_blog']);
        Route::post('add_contact', [homecontroller::class, 'add_contact'])->name('add_contact');
        Route::get('loginuser', [homecontroller::class, 'loginuser'])->name('loginuser');
        Route::post('signupuser_inc', [homecontroller::class, 'signupuser_inc'])->name('signupuser_inc');
        Route::post('loginuser_inc', [homecontroller::class, 'loginuser_inc'])->name('loginuser_inc');
        Route::get('blog', [BlogController::class, 'blog_writer'])->name('blog');
        Route::get('add_blog', [BlogController::class, 'add_blog_writer'])->name('add_blog');
        Route::post('add_blog_inc', [BlogController::class, 'add_blog_writer_inc'])->name('add_blog_inc');
        Route::get('edit_blog/{id} ', [BlogController::class, 'edit_blog_writer']);
        Route::post('edit_blog_inc', [BlogController::class, 'edit_blog_writer_inc'])->name('edit_blog_writer_inc');
        Route::get('delete/{id}', [BlogController::class, 'delete_blog_writer']);

        Route::get('message/{id}', [Admincontroller::class, 'message']);
        Route::get('inbox', [Admincontroller::class, 'inbox'])->name('inbox');
        Route::get('delete_message/{id}', [Admincontroller::class, 'delete_message']);
        Route::get('message/{id}', [WriterController::class, 'message']);
        Route::get('inbox', [WriterController::class, 'inbox'])->name('inbox');
        Route::get('delete_message/{id}', [WriterController::class, 'delete_message']);
        // Route::get('add_about', [Aboutcontroller::class, 'add_about_writer'])->name('add_about');
        // Route::post('add_about_inc', [Aboutcontroller::class, 'add_about_writer_inc'])->name('add_about_inc');
    });
});

// -------------------------------------------------------------------------------

//                                        home controller

Route::get('/', [homecontroller::class, 'home'])->name('home');
Route::get('calander', [homecontroller::class, 'calander'])->name('calander');
Route::get('about_page', [homecontroller::class, 'about_page'])->name('about_page');
Route::get('contact', [homecontroller::class, 'contact'])->name('contact')->middleware('auth');
Route::get('show_blog/{id}', [homecontroller::class, 'show_blog']);
Route::post('add_contact', [homecontroller::class, 'add_contact'])->name('add_contact');
Route::get('loginuser', [homecontroller::class, 'loginuser'])->name('loginuser');
Route::post('signupuser_inc', [homecontroller::class, 'signupuser_inc'])->name('signupuser_inc');
Route::post('loginuser_inc', [homecontroller::class, 'loginuser_inc'])->name('loginuser_inc');
Route::get('logout', [homecontroller::class, 'logout'])->name('logout_user');

//--------------------------------------------------------------------------------------------------------------------

//                                     Admin controller

// Route::get('signup', [Admincontroller::class, 'signup']);
// Route::get('login', [Admincontroller::class, 'login'])->name('login');
// Route::post('login_inc', [Admincontroller::class, 'login_inc'])->name('login_inc');
// Route::post('signup_inc', [Admincontroller::class, 'signupinc'])->name('signup_inc');
// Route::get('dashboard', [Admincontroller::class, 'dashboard'])->name('dashboard');
// Route::get('logout', [Admincontroller::class, 'logout']);
// Route::get('view_blog', [Admincontroller::class, 'view_blog'])->name('view_blog');
// Route::get('edit', [Admincontroller::class, 'edit']);
// Route::post('update', [Admincontroller::class, 'update'])->name('update');
// Route::get('message/{id}', [Admincontroller::class, 'message']);
// Route::get('inbox', [Admincontroller::class, 'inbox'])->name('inbox');
// Route::get('delete_message/{id}', [Admincontroller::class, 'delete_message']);


//--------------------------------------------------------------------------------------------------------------------

//                                     Profile controller

// Route::get('profile', [Profilcontroller::class, 'profile'])->name('profile');
// Route::post('profile_inc', [Profilcontroller::class, 'profile_inc'])->name('profile_inc');
//--------------------------------------------------------------------------------------------------------------------
//                                     Subuser controller

// Route::get('Sub_user', [Subusercontroller::class, 'Sub_user'])->name('Sub_user');
// Route::get('add_Sub', [Subusercontroller::class, 'add_Sub_user'])->name('add_sub_user');
// Route::post('add_Sub_user_inc', [Subusercontroller::class, 'add_Sub_user_inc'])->name('add_Sub_user_inc');
// Route::get('edit_sub/{id}', [Subusercontroller::class, 'edit_sub']);
// Route::post('update_sub', [Subusercontroller::class, 'update_sub'])->name('update_sub');
// Route::get('delete/{id}', [Subusercontroller::class, 'delete']);
//--------------------------------------------------------------------------------------------------------------------
//                                     Settings controller

// Route::get('setting', [SettingController::class, 'setting'])->name('setting');
// Route::post('add_setting', [SettingController::class, 'add_setting'])->name('add_setting');
//--------------------------------------------------------------------------------------------------------------------

//                                     Blog controller
// Route::get('blog', [BlogController::class, 'blog'])->name('blog');
// Route::get('add_blog', [BlogController::class, 'add_blog'])->name('add_blog');
// Route::post('add_blog_inc', [BlogController::class, 'add_blog_inc'])->name('add_blog_inc');
// Route::get('edit_blog/{id} ', [BlogController::class, 'edit_blog']);
// Route::post('edit_blog_inc', [BlogController::class, 'edit_blog_inc'])->name('edit_blog_inc');
//--------------------------------------------------------------------------------------------------------------------
//                                     About controller

// Route::get('add_about', [Aboutcontroller::class, 'add_about'])->name('add_about');
// Route::post('add_about_inc', [Aboutcontroller::class, 'add_about_inc'])->name('add_about_inc');
//--------------------------------------------------------------------------------------------------------------------

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
