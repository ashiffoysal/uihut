<?php


use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
})->name('home.frontend');


Auth::routes();


use App\Http\Controllers\WebhookController;

Route::post('/paddle/webhook', WebhookController::class)->name('cashier.webhook');



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
Route::post('/admin/explore/update', [App\Http\Controllers\Admin\ExploreController::class, 'update'])->name('admin.explore.update');
Route::get('/admin/explore/delete/{id}', [App\Http\Controllers\Admin\ExploreController::class, 'Delete']);


Route::get('/admin/paddle/create', [App\Http\Controllers\Admin\ProductController::class, 'paddlecreate'])->name('admin.paddle.create');
Route::get('/admin/paddle/done', [App\Http\Controllers\Admin\LoginController::class, 'done'])->name('admin.paddle.done');


Route::get('/admin/configration/index', [App\Http\Controllers\Admin\ConfigarationController::class, 'index'])->name('admin.configration.index');

Route::post('/admin/configration/index', [App\Http\Controllers\Admin\ConfigarationController::class, 'update'])->name('admin.configration.index');

// Blog route start from here
Route::prefix('/admin/blog')->group(function(){
    Route::get('/',[App\Http\Controllers\Admin\BlogController::class, 'blogsIndex'])->name('admin.blog.index');
    Route::get('/create',[App\Http\Controllers\Admin\BlogController::class, 'blogsCreate'])->name('admin.blog.create');
    Route::post('/store',[App\Http\Controllers\Admin\BlogController::class, 'blogStore'])->name('admin.blog.store');
    Route::get('/status/{id}',[App\Http\Controllers\Admin\BlogController::class, 'blogsStatus'])->name('admin.blog.status.change');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\BlogController::class, 'blogsEdit'])->name('admin.blog.edit');
    Route::post('/update/{id}',[App\Http\Controllers\Admin\BlogController::class, 'blogsUpdate'])->name('admin.blog.update');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\BlogController::class, 'blogsDelete'])->name('admin.blog.delete');
    

    // blog category area start

    Route::prefix('/category')->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\BlogController::class, 'categoryIndex'])->name('admin.blog.category');
        Route::post('/create',[App\Http\Controllers\Admin\BlogController::class, 'categoryCreate'])->name('admin.blog.category.create');
        Route::get('/status/{id}',[App\Http\Controllers\Admin\BlogController::class, 'categoryStatusChange'])->name('admin.blog.category.status.change');

        Route::get('/edit/{id}',[App\Http\Controllers\Admin\BlogController::class, 'categoryEdit'])->name('admin.blog.category.edit');
        Route::post('/update/{id}',[App\Http\Controllers\Admin\BlogController::class, 'categoryUpdate'])->name('admin.blog.category.update');
        Route::get('/delete/{id}',[App\Http\Controllers\Admin\BlogController::class, 'categoryDelete'])->name('admin.blog.category.delete');
    });
});


// About pixify area start

Route::prefix('/pixefy')->group(function(){
    
    // About Piixefy route start
    Route::get('/',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyIndex'])->name('admin.pixefy.index');
    Route::get('/create',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyCreate'])->name('admin.pixefy.create');
    Route::post('/store',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyStore'])->name('admin.pixefy.store');
    Route::get('/status/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyStatus'])->name('admin.pixefy.status.change');
    Route::get('/edit/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyEdit'])->name('admin.pixefy.edit');
    Route::get('/delete/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyDelete'])->name('admin.pixefy.delete');
    Route::post('/update/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyUpdate'])->name('admin.pixefy.update');
    
    

    // Topic area start
    Route::get('/topics',[App\Http\Controllers\Admin\PixefyController::class, 'pixefyTopic'])->name('admin.pixefy.topics');
    Route::post('/topics/create',[App\Http\Controllers\Admin\PixefyController::class, 'topicCreate'])->name('admin.pixefy.topic.create');
    Route::get('/topics/status/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'topicChangeStatus'])->name('admin.pixefy.topic.status.change');
    Route::get('/topics/edit/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'topicEdit'])->name('admin.pixefy.topic.edit');
    Route::get('/topics/delete/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'topicDelete'])->name('admin.pixefy.topics.delete');
    Route::post('/topics/update/{id}',[App\Http\Controllers\Admin\PixefyController::class, 'topicUpdate'])->name('admin.pixefy.topic.update');
    
});

// subscriver
Route::get('/admin/subscriver/index', [App\Http\Controllers\Admin\SubscriverController::class, 'index'])->name('admin.subscriver.create');
Route::get('/admin/subscriver/active/{id}', [App\Http\Controllers\Admin\SubscriverController::class, 'active']);
Route::get('/admin/subscriver/deactive/{id}', [App\Http\Controllers\Admin\SubscriverController::class, 'deactive']);
Route::get('/admin/subscriver/delete/{id}', [App\Http\Controllers\Admin\SubscriverController::class, 'Delete']);
// product controller
Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product/alldelete', [App\Http\Controllers\Admin\ProductController::class, 'deleteall'])->name('admin.product.alldeleted');


Route::get('/admin/product/index', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
Route::post('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.create');
Route::get('/admin/product/active/{id}', [App\Http\Controllers\Admin\ProductController::class, 'active']);
Route::get('/admin/product/deactive/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deactive']);
Route::get('/admin/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
Route::post('/admin/product/update', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'Delete']);
Route::get('/get/subcategory/all/{cate_id}', [App\Http\Controllers\Admin\ProductController::class, 'getsubcategory']);
Route::get('/get/resubcategory/all/{subcate_id}', [App\Http\Controllers\Admin\ProductController::class, 'getresubcategory']);




Route::get('/admin/softwaretype/create', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'create'])->name('admin.softwaretype.create');
Route::post('/admin/softwaretype/create', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'store'])->name('admin.softwaretype.create');
Route::get('/admin/softwaretype/active/{id}', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'active']);
Route::get('/admin/softwaretype/deactive/{id}', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'deactive']);
Route::get('/admin/softwaretype/edit/{id}', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'edit']);
Route::post('/admin/softwaretype/update', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'update'])->name('admin.softwaretype.update');
Route::get('/admin/softwaretype/delete/{id}', [App\Http\Controllers\Admin\SoftwareTypeController::class, 'Delete']);

Route::get('/admin/subcription/index', [App\Http\Controllers\Admin\SubcriptionController::class, 'index'])->name('admin.allsubcription.index');

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any','[\/\w\.-]*');