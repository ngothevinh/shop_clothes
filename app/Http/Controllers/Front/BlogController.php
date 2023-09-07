<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use App\Services\BlogComment\BlogCommentServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $productCategoryService;
    private $blogService;
    private $blogCommentService;
    public function __construct(ProductCategoryServiceInterface $productCategoryService,
                                BlogServiceInterface $blogService,
                                BlogCommentServiceInterface $blogCommentService)
    {
        $this->blogService = $blogService;
        $this->productCategoryService = $productCategoryService;
        $this->blogCommentService = $blogCommentService;
    }

    public function index(){
        $categories = $this->productCategoryService->all();
        $blogs = $this->blogService->all();
        return view('front.blog.index',compact('categories','blogs'));
    }
    public function show($id){
        $categories = $this->productCategoryService->all();
        $blogs = $this->blogService->find($id);
        return view('front.blog.show-detail',compact('categories','blogs'));
    }
    public function postComment(Request $request){
        $this->blogCommentService->create($request->all());
        return redirect()->back();
    }
}
