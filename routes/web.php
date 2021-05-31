<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'loginfrom'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'AdminLogOut'])->name('admin.logout');
// admin sattings
Route::get('/admin/account/profile', [App\Http\Controllers\Admin\AdminController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/account/update', [App\Http\Controllers\Admin\AdminController::class, 'adminUpdate'])->name('admin.update');
Route::post('/admin/account/update', [App\Http\Controllers\Admin\AdminController::class, 'adminUpdateSubmit'])->name('admin.update');
Route::post('/admin/account/email/update', [App\Http\Controllers\Admin\AdminController::class, 'adminUpdateEmail'])->name('admin.email.update');
Route::post('/admin/account/password/update', [App\Http\Controllers\Admin\AdminController::class, 'adminUpdatePassword'])->name('admin.password.update');
// setting controller
Route::get('/admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'generalSetting'])->name('admin.generalsetting');
Route::post('/admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'generalSettingSubmit'])->name('admin.generalsetting');

Route::get('/admin/seo', [App\Http\Controllers\Admin\SettingController::class, 'seoSetting'])->name('admin.seo');
Route::post('/admin/seo', [App\Http\Controllers\Admin\SettingController::class, 'seoSettingSubmit'])->name('admin.seo');

Route::get('/admin/social', [App\Http\Controllers\Admin\SettingController::class, 'socialSetting'])->name('admin.social');
Route::post('/admin/social', [App\Http\Controllers\Admin\SettingController::class, 'socialSettingSubmit'])->name('admin.social');
// category
Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.create');

Route::get('/admin/category/active/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'active']);
Route::get('/admin/category/deactive/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deactive']);
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::post('/admin/category/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'Delete']);
// subcategory
Route::get('/admin/subcategory/create', [App\Http\Controllers\Admin\SubCategoryController::class, 'create'])->name('admin.subcategory.create');
Route::post('/admin/subcategory/create', [App\Http\Controllers\Admin\SubCategoryController::class, 'store'])->name('admin.subcategory.create');
Route::get('/admin/subcategory/active/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'active']);
Route::get('/admin/subcategory/deactive/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'deactive']);
Route::get('/admin/subcategory/edit/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);
Route::post('/admin/subcategory/update', [App\Http\Controllers\Admin\SubCategoryController::class, 'update'])->name('admin.subcategory.update');
Route::get('/admin/subcategory/delete/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'Delete']);
// resubcategory
Route::get('/admin/resubcategory/create', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'create'])->name('admin.resubcategory.create');
Route::post('/admin/resubcategory/create', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'store'])->name('admin.resubcategory.create');
Route::get('/admin/resubcategory/active/{id}', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'active']);
Route::get('/admin/resubcategory/deactive/{id}', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'deactive']);
Route::get('/admin/resubcategory/edit/{id}', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'edit']);
Route::post('/admin/resubcategory/update', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'update'])->name('admin.resubcategory.update');
Route::get('/admin/resubcategory/delete/{id}', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'Delete']);
Route::get('/get/subcategory/all/{cate_id}', [App\Http\Controllers\Admin\ReSubCategoryController::class, 'geSubCategory']);
// frontendsetting
Route::get('/admin/firstsection/update', [App\Http\Controllers\Admin\FrontendController::class, 'firstSection'])->name('admin.firstsection.update');
Route::post('/admin/firstsection/update', [App\Http\Controllers\Admin\FrontendController::class, 'firstSectionUpdate'])->name('admin.firstsection.update');
// Client Review
Route::get('/admin/clientreview/create', [App\Http\Controllers\Admin\ClientReviewController::class, 'create'])->name('admin.clientreview.create');
Route::post('/admin/clientreview/create', [App\Http\Controllers\Admin\ClientReviewController::class, 'store'])->name('admin.clientreview.create');
Route::get('/admin/clientreview/active/{id}', [App\Http\Controllers\Admin\ClientReviewController::class, 'active']);
Route::get('/admin/clientreview/deactive/{id}', [App\Http\Controllers\Admin\ClientReviewController::class, 'deactive']);
Route::get('/admin/clientreview/edit/{id}', [App\Http\Controllers\Admin\ClientReviewController::class, 'edit']);
Route::post('/admin/clientreview/update', [App\Http\Controllers\Admin\ClientReviewController::class, 'update'])->name('admin.clientreview.update');
Route::get('/admin/clientreview/delete/{id}', [App\Http\Controllers\Admin\ClientReviewController::class, 'Delete']);
// package
Route::get('/admin/package/create', [App\Http\Controllers\Admin\PackageController::class, 'create'])->name('admin.package.create');
Route::post('/admin/package/create', [App\Http\Controllers\Admin\PackageController::class, 'store'])->name('admin.package.create');
Route::get('/admin/package/active/{id}', [App\Http\Controllers\Admin\PackageController::class, 'active']);
Route::get('/admin/package/deactive/{id}', [App\Http\Controllers\Admin\PackageController::class, 'deactive']);
Route::get('/admin/package/edit/{id}', [App\Http\Controllers\Admin\PackageController::class, 'edit']);
Route::post('/admin/package/update', [App\Http\Controllers\Admin\PackageController::class, 'update'])->name('admin.package.update');
Route::get('/admin/package/delete/{id}', [App\Http\Controllers\Admin\PackageController::class, 'Delete']);
// faq
Route::get('/admin/faq/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('admin.faq.create');
Route::post('/admin/faq/create', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('admin.faq.create');
Route::get('/admin/faq/active/{id}', [App\Http\Controllers\Admin\FaqController::class, 'active']);
Route::get('/admin/faq/deactive/{id}', [App\Http\Controllers\Admin\FaqController::class, 'deactive']);
Route::get('/admin/faq/edit/{id}', [App\Http\Controllers\Admin\FaqController::class, 'edit']);
Route::post('/admin/faq/update', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('admin.faq.update');
Route::get('/admin/faq/delete/{id}', [App\Http\Controllers\Admin\FaqController::class, 'Delete']);
// about page
Route::get('/admin/aboutbanner/update', [App\Http\Controllers\Admin\AboutPageController::class, 'aboutPageBanner'])->name('admin.aboutbanner.update');
Route::post('/admin/aboutbanner/update', [App\Http\Controllers\Admin\AboutPageController::class, 'aboutPageBannerUpdate'])->name('admin.aboutbanner.update');
// Terms and Condition
Route::get('/admin/termscondition/update', [App\Http\Controllers\Admin\SupportController::class, 'termsupdate'])->name('admin.termscondition.update');
Route::post('/admin/termscondition/update', [App\Http\Controllers\Admin\SupportController::class, 'termsconditionupdate'])->name('admin.termscondition.update');
// priacy policy
Route::get('/admin/privacypolicy/update', [App\Http\Controllers\Admin\SupportController::class, 'privacypolicyupdate'])->name('admin.privacypolicy.update');
Route::post('/admin/privacypolicy/update', [App\Http\Controllers\Admin\SupportController::class, 'privacypolicyupdateSubmit'])->name('admin.privacypolicy.update');
// license
Route::get('/admin/license/update', [App\Http\Controllers\Admin\SupportController::class, 'licenseupdate'])->name('admin.license.update');
Route::post('/admin/license/update', [App\Http\Controllers\Admin\SupportController::class, 'licenseupdateSubmit'])->name('admin.license.update');
// explore
Route::get('/admin/explore/create', [App\Http\Controllers\Admin\ExploreController::class, 'create'])->name('admin.explore.create');
Route::post('/admin/explore/create', [App\Http\Controllers\Admin\ExploreController::class, 'store'])->name('admin.explore.create');
Route::get('/admin/explore/active/{id}', [App\Http\Controllers\Admin\ExploreController::class, 'active']);
Route::get('/admin/explore/deactive/{id}', [App\Http\Controllers\Admin\ExploreController::class, 'deactive']);
Route::get('/admin/explore/edit/{id}', [App\Http\Controllers\Admin\ExploreController::class, 'edit']);
Route::post('/admin/explore/update', [App\Http\Controllers\Admin\ExploreController::class, 'update'])->name('admin.faq.update');
Route::get('/admin/explore/delete/{id}', [App\Http\Controllers\Admin\ExploreController::class, 'Delete']);
