<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;
    private $productCategoryService;
    public function __construct(UserServiceInterface $userService,OrderService $orderService,ProductCategoryServiceInterface $productCategoryService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->productCategoryService = $productCategoryService;
    }

    public function login(){
        $categories = $this->productCategoryService->all();
        return view('front.account.login',compact('categories'));
    }
    public function checkLogin(Request $request){
        $credentials = [
          'email' => $request->email,
          'password' => $request->password,
          'level' => Constant::user_level_client  //tài khoản cấp độ khách hàng bình thường
        ];
        $remember = $request->remember;

        if (Auth::attempt($credentials,$remember)){
            return redirect()->intended('');
        }else{
            return back()
                ->with('notification','ERROR : Email or password is wrong');
        }
    }

    public function logout(){
        Auth::logout();
        return back();
    }

    public function register(){
        $categories = $this->productCategoryService->all();
        return view('front.account.register',compact('categories'));
    }

    public function postRegister(Request $request){
        if ($request->password != $request->password_confirmation){
            return back()->with('notification','ERROR : Confirm password does not match');
        }
        $data = [
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'level' => Constant::user_level_client
        ];
        $this->userService->create($data);
        return  redirect('account/login')->with('notification','Register Successfully!');
    }

    public function myOrderIndex(){
        $categories = $this->productCategoryService->all();
        $orders = $this->orderService->getOrderByUserId(Auth::id());
        return view('front.account.my-order.index',compact('orders','categories'));
    }

    public function myOrderShow($id){
        $order = $this->orderService->find($id);
        return view('front.account.my-order.show',compact('order'));
    }
}
