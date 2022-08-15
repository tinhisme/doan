<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Backend\BackendTagController;
use App\Http\Controllers\Backend\BackendHomeController;
use App\Http\Controllers\Backend\BackendMenuController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendOrderController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Backend\BackendArticleController;
use App\Http\Controllers\Backend\BackendKeywordController;
use App\Http\Controllers\Backend\BackendProductController;
use App\Http\Controllers\Backend\BackendProfileController;
use App\Http\Controllers\Backend\BackendSettingController;
use App\Http\Controllers\Frontend\ArticleDetailController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendSupplierController;
use App\Http\Controllers\Auth\Admin\AdminRegisterController;
use App\Http\Controllers\Backend\BackendAttributeController;

// Route::get('/', function () {
//     return view('welcome');
// });




// Route::group(['namespace' => 'frontend'], function () {
//     Route::get('/',[HomeController::class,'index'])->name('get.home');
// });

Route::prefix('account')->group(function () {
    Route::get('register',[RegisterController::class,'getFormRegister'])->name('register');
    Route::post('register',[RegisterController::class,'postRegister'])->name('register');;

    Route::get('login',[LoginController::class,'getFormLogin'])->name('login');
    Route::post('login',[LoginController::class,'postLogin'])->name('login');

    Route::get('logout',[LoginController::class,'logout'])->name('logout');

});

//FRONTEND
Route::prefix('')->group(function () {
     //TRANG CHỦ
    Route::get('',[HomeController::class,'index'])->name('get.home');
    
    Route::get('san-pham',[ProductController::class,'index'])->name('get.product.list');
    Route::get('danh-muc/{slug}',[CategoryController::class,'getCategory'])->name('get.category');
    Route::get('san-pham/{slug}',[ProductDetailController::class,'getProductDetail'])->name('get.product.detail');
    
    
    Route::get('menu/{slug}',[MenuController::class,'index'])->name('get.menu');
    Route::get('bai-viet/{slug}',[ArticleDetailController::class,'index'])->name('get.article_detail');


    //cart
    Route::get('don-hang',[CartController::class,'index'])->name('shopping.list');

    Route::prefix('shopping')->group(function () {
        Route::get('add/{id}', [CartController::class,'add'])->name('shopping.add');
        Route::get('delete/{id}', [CartController::class,'delete'])->name('shopping.delete');
        Route::get('update/{id}', [CartController::class,'update'])->name('shopping.update');

        Route::post('pay', [CartController::class,'postPay'])->name('shopping.pay');
    });
});



Route::prefix('admin-auth')->group(function () {
    // ACCOUNT ADMIN
    Route::get('login',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login',[AdminLoginController::class,'login'])->name('admin.login.submit');

    Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    //BACKEND
    Route::prefix('admin')->group(function () {
        // TRANG CHỦ
        Route::get('/',[BackendHomeController::class,'index'])->name('get_backend.index');
        
        //PRODUCT
        Route::prefix('product')->group(function () {
            Route::get('',[BackendProductController::class,'index'])->name('get_backend.product.index');
    
            Route::get('create',[BackendProductController::class,'create'])->name('get_backend.product.create');
            Route::post('store',[BackendProductController::class,'store'])->name('get_backend.product.store');
    
            Route::get('edit/{id}',[BackendProductController::class,'edit'])->name('get_backend.product.edit');
            Route::post('update/{id}',[BackendProductController::class,'update'])->name('get_backend.product.update');
        
            Route::delete('destroy/{id}',[BackendProductController::class,'destroy'])->name('get_backend.product.destroy');
    
            Route::get('status/{id}',[BackendProductController::class,'status'])->name('get_backend.product.status');
            Route::get('hot/{id}',[BackendProductController::class,'hot'])->name('get_backend.product.hot');
        });
    
        //CATEGORY
        Route::prefix('category')->group(function () {
            Route::get('',[BackendCategoryController::class,'index'])->name('get_backend.category.index');
    
            Route::get('create',[BackendCategoryController::class,'create'])->name('get_backend.category.create');
            Route::post('store',[BackendCategoryController::class,'store'])->name('get_backend.category.store');;
    
            Route::get('edit/{id}',[BackendCategoryController::class,'edit'])->name('get_backend.category.edit');
            Route::post('update/{id}',[BackendCategoryController::class,'update'])->name('get_backend.category.update');
        
            Route::delete('destroy/{id}',[BackendCategoryController::class,'destroy'])->name('get_backend.category.destroy');
            
            Route::get('status/{id}',[BackendCategoryController::class,'status'])->name('get_backend.category.status');
            Route::get('hot/{id}',[BackendCategoryController::class,'hot'])->name('get_backend.category.hot');
    
        });
    
        //SUPPLIER
        Route::resource('supplier', BackendSupplierController::class);
    
        //KEYWORD
        Route::prefix('keyword')->group(function () {
            Route::get('',[BackendKeywordController::class,'index'])->name('get_backend.keyword.index');
    
            Route::get('create',[BackendKeywordController::class,'create'])->name('get_backend.keyword.create');
            Route::post('create',[BackendKeywordController::class,'store'])->name('get_backend.keyword.store');;
    
            Route::get('edit/{id}',[BackendKeywordController::class,'edit'])->name('get_backend.keyword.edit');
            Route::post('update/{id}',[BackendKeywordController::class,'update'])->name('get_backend.keyword.update');;
        
            Route::delete('destroy/{id}',[BackendKeywordController::class,'destroy'])->name('get_backend.keyword.destroy');
            Route::get('hot/{id}',[BackendKeywordController::class,'hot'])->name('get_backend.keyword.hot');
        });
    
    
        //ATTRIBUTE
        Route::prefix('attribute')->group(function () {
            Route::get('',[BackendAttributeController::class,'index'])->name('get_backend.attribute.index');
    
            Route::get('create',[BackendAttributeController::class,'create'])->name('get_backend.attribute.create');
            Route::post('create',[BackendAttributeController::class,'store'])->name('get_backend.attribute.store');;
    
            Route::get('edit/{id}',[BackendAttributeController::class,'edit'])->name('get_backend.attribute.edit');
            Route::post('update/{id}',[BackendAttributeController::class,'update'])->name('get_backend.attribute.update');;
        
            Route::delete('destroy/{id}',[BackendAttributeController::class,'destroy'])->name('get_backend.attribute.destroy');
            Route::get('hot/{id}',[BackendAttributeController::class,'hot'])->name('get_backend.attribute.hot');
        });
    
        //order
        Route::prefix('order')->group(function () {
            Route::get('',[BackendOrderController::class,'index'])->name('get_backend.order.index');
            Route::delete('destroy/{id}',[BackendOrderController::class,'destroy'])->name('get_backend.order.destroy');
        
            Route::get('view-order/{id}',[BackendOrderController::class, 'getOrderDetail'])->name('get_backend.order.detail');
            Route::delete('destroy-order/{id}',[BackendOrderController::class,'destroyOrder'])->name('get_backend.order.destroy_order');
            
        });
    
        //MENU
        Route::prefix('menu')->group(function () {
            Route::get('',[BackendMenuController::class,'index'])->name('get_backend.menu.index');
    
            Route::get('create',[BackendMenuController::class,'create'])->name('get_backend.menu.create');
            Route::post('create',[BackendMenuController::class,'store']);
    
            Route::get('edit/{id}',[BackendMenuController::class,'edit'])->name('get_backend.menu.edit');
            Route::post('update/{id}',[BackendMenuController::class,'update']);
        
            Route::get('delete/{id}',[BackendMenuController::class,'delete'])->name('get_backend.menu.delete');
        });
    
        //TAG
        Route::prefix('tag')->group(function () {
            Route::get('',[BackendTagController::class,'index'])->name('get_backend.tag.index');
    
            Route::get('create',[BackendTagController::class,'create'])->name('get_backend.tag.create');
            Route::post('create',[BackendTagController::class,'store']);
    
            Route::get('edit/{id}',[BackendTagController::class,'edit'])->name('get_backend.tag.edit');
            Route::post('update/{id}',[BackendTagController::class,'update']);
    
            Route::get('delete/{id}',[BackendTagController::class,'delete'])->name('get_backend.tag.delete');
        });
    
        //ARTICLE
        Route::prefix('article')->group(function () {
            Route::get('',[BackendArticleController::class,'index'])->name('get_backend.article.index');
    
            Route::get('create',[BackendArticleController::class,'create'])->name('get_backend.article.create');
            Route::post('create',[BackendArticleController::class,'store']);
    
            Route::get('edit/{id}',[BackendArticleController::class,'edit'])->name('get_backend.article.edit');
            Route::post('update/{id}',[BackendArticleController::class,'update']);
        
            Route::get('delete/{id}',[BackendArticleController::class,'delete'])->name('get_backend.article.delete');
        });
    
        //USER
        Route::prefix('user')->group(function () {
            Route::get('',[BackendUserController::class,'index'])->name('get_backend.user.index');
    
            Route::get('create',[BackendUserController::class,'create'])->name('get_backend.user.create');
            Route::post('create',[BackendUserController::class,'store']);
    
            Route::get('edit/{id}',[BackendUserController::class,'edit'])->name('get_backend.user.edit');
            Route::post('update/{id}',[BackendUserController::class,'update']);
        
            Route::get('delete/{id}',[BackendUserController::class,'delete'])->name('get_backend.user.delete');
        });
    
        //SETTING
        Route::get('setting',[BackendSettingController::class,'index'])->name('get_backend.setting.index');
        Route::post('setting',[BackendSettingController::class,'createOrUpdate'])->name('get_backend.setting.store');
    
        //PROFILE
        Route::get('profile',[BackendProfileController::class,'index'])->name('get_backend.profile.index');
        Route::post('profile',[BackendProfileController::class,'createOrUpdate'])->name('get_backend.profile.store');
    
    });
});



