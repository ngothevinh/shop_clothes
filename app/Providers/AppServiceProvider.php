<?php

namespace App\Providers;

use App\Respositories\Blog\BlogRepository;
use App\Respositories\Blog\BlogRepositoryInterface;
use App\Respositories\BlogComment\BlogCommentRepository;
use App\Respositories\BlogComment\BlogCommentRepositoryInterface;
use App\Respositories\Brand\BrandRespository;
use App\Respositories\Brand\BrandRespositoryInterface;
use App\Respositories\Order\OrderRespository;
use App\Respositories\Order\OrderRespositoryInterface;
use App\Respositories\OrderDetail\OrderDetailRespository;
use App\Respositories\OrderDetail\OrderDetailRespositoryInterface;
use App\Respositories\Product\ProductRepository;
use App\Respositories\Product\ProductRepositoryInterface;
use App\Respositories\ProductCategory\ProductCategoryRespository;
use App\Respositories\ProductCategory\ProductCategoryRespositoryInterface;
use App\Respositories\ProductComment\ProductCommentRespository;
use App\Respositories\ProductComment\ProductCommentRespositoryInterface;
use App\Respositories\User\UserRespository;
use App\Respositories\User\UserRespositoryInterface;
use App\Services\Blog\BlogService;
use App\Services\Blog\BlogServiceInterface;
use App\Services\BlogComment\BlogCommentService;
use App\Services\BlogComment\BlogCommentServiceInterface;
use App\Services\Brand\BrandService;
use App\Services\Brand\BrandServiceInterface;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryService;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductComment\ProductCommentService;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );
        //Product comment
        $this->app->singleton(
            ProductCommentRespositoryInterface::class,
            ProductCommentRespository::class
        );
        $this->app->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );

        //Blog
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );
        $this->app->singleton(
            BlogServiceInterface::class,
            BlogService::class
        );

        //Product Category
        $this->app->singleton(
            ProductCategoryRespositoryInterface::class,
            ProductCategoryRespository::class
        );
        $this->app->singleton(
            ProductCategoryServiceInterface::class,
            ProductCategoryService::class
        );

        //Brand
        $this->app->singleton(
            BrandRespositoryInterface::class,
            BrandRespository::class
        );
        $this->app->singleton(
            BrandServiceInterface::class,
            BrandService::class
        );

        //Order
        $this->app->singleton(
            OrderRespositoryInterface::class,
            OrderRespository::class
        );
        $this->app->singleton(
            OrderServiceInterface::class,
            OrderService::class
        );

        //Order Detail
        $this->app->singleton(
            OrderDetailRespositoryInterface::class,
            OrderDetailRespository::class
        );
        $this->app->singleton(
            OrderDetailServiceInterface::class,
            OrderDetailService::class
        );

        //Blog Comment
        $this->app->singleton(
            BlogCommentRepositoryInterface::class,
            BlogCommentRepository::class
        );
        $this->app->singleton(
            BlogCommentServiceInterface::class,
            BlogCommentService::class
        );


        //User
        $this->app->singleton(
            UserRespositoryInterface::class,
            UserRespository::class
        );
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
