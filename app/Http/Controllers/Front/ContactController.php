<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $productCategoryService;
    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index(){
        $categories = $this->productCategoryService->all();
        return view('front.contact.index',compact('categories'));
    }
}
