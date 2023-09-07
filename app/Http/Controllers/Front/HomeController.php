<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;
    private $blogService;
    private $productCategoryService;
    public function __construct(ProductServiceInterface $productService, BlogServiceInterface $blogService,ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this->blogService = $blogService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index(){
        $featuredProducts = $this->productService->getFeaturedProducts();
        $blogs = $this->blogService->getLatestBlogs();
        $categories = $this->productCategoryService->all();
        return view('front.index',compact('featuredProducts','blogs','categories'));
    }
    public function contact(){
        $featuredProducts = $this->productService->getFeaturedProducts();
        $blogs = $this->blogService->getLatestBlogs();
        $categories = $this->productCategoryService->all();
        return view('front.contact',compact('featuredProducts','blogs','categories'));
    }
}
