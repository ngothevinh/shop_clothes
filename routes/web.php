<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\GenerateImageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
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

//Front-end



//Generate blog
//Route::get('/blog_generate', [GenerateBlogController::class, 'generate_blog']);
//Route::post('/blog_generate', [GenerateBlogController::class, 'post_blog'])->name('blog_generate');

Route::get('/',[HomeController::class,'index']);

//Chat
Route::get('/chat', [\App\Http\Controllers\ChatGPTController::class, 'chat_index']);
Route::post('/chat/send', [\App\Http\Controllers\ChatGPTController::class, 'sendChat']);

Route::prefix('shop')->group(function (){
    Route::get('product/{id}',[ShopController::class,'show']);
    Route::post('product/{id}',[ShopController::class,'postComment']);
    Route::get('',[ShopController::class,'index']);
    Route::get('/category/{categoryName}',[ShopController::class,'category']);
});
Route::prefix('cart')->group(function (){
    Route::get('',[CartController::class,'index']);
    Route::get('add',[CartController::class,'add']);
    Route::get('delete',[CartController::class,'delete']);
    Route::get('destroy',[CartController::class,'destroy']);
    Route::get('update',[CartController::class,'update']);
});
Route::prefix('checkout')->group(function (){
    Route::get('',[CheckOutController::class,'index']);
    Route::post('',[CheckOutController::class,'addOrder']);
    Route::get('/result',[CheckOutController::class,'result']);
    Route::get('/vnPayCheck',[CheckOutController::class,'vnPayCheck']);
});
Route::prefix('account')->group(function (){
    Route::get('login',[AccountController::class,'login']);
    Route::post('login',[AccountController::class,'checkLogin']);
    Route::get('logout',[AccountController::class,'logout']);
    Route::get('register',[AccountController::class,'register']);
    Route::post('register',[AccountController::class,'postRegister']);

    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function (){
        Route::get('/',[AccountController::class,'myOrderIndex']);
        Route::get('/{id}',[AccountController::class,'myOrderShow']);
    });
});
Route::prefix('blog')->group(function (){
    Route::get('',[BlogController::class,'index']);
    Route::get('/details/{id}',[BlogController::class,'show']);
    Route::post('/details/{id}',[BlogController::class,'postComment']);
});
Route::prefix('contact')->group(function (){
    Route::get('',[ContactController::class,'index']);
});


//Dashboard admin
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
    Route::redirect('','admin/user')->name('home');

    Route::resource('user',UserController::class);
    Route::resource('category',ProductCategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product/{product_id}/image',ProductImageController::class);
    Route::resource('product/{product_id}/detail',ProductDetailController::class);
    Route::resource('order',OrderController::class);
    Route::resource('blog',\App\Http\Controllers\Admin\BlogController::class);


    Route::prefix('login')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('',[\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });
    Route::get('/image_generate', [GenerateImageController::class, 'generate_image'])->name('image_generate');
    Route::post('/image_show', [GenerateImageController::class, 'post_image'])->name('image.image_show');

    Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class,'logout']);
});
