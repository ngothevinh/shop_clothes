<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    private $productCategoryService;

    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $categories = $this->productCategoryService->all();

        return view('front.checkout.index',compact('carts','total','subtotal','categories'));
    }

    public function addOrder(Request $request){
        //01 Thêm đơn hàng
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

        //02 Thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $data = [
              'order_id' => $order->id,
              'product_id' => $cart->id,
              'qty' => $cart->qty,
              'amount' => $cart->price,
              'total' => $cart->qty * $cart->price
            ];
            $this->orderDetailService->create($data);
        }
        if ($request->payment_type == 'pay_later'){
            //gửi email
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendMail($order,$subtotal,$total);

            return redirect('checkout/result')
                ->with('notification','Success ! You will pay on delivery.Please check your email !!');
        }

        if ($request->payment_type == 'online_payment'){
            //01 Lấy url thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
               'vnp_TxnRef' => $order->id, //ID của đơn hàng
               'vnp_OrderInfo' => 'Mô tả đơn hàng ở đây ........',  //Mô tả của đơn hàng (điền tùy ý)
               'vnp_Amount' => Cart::total(0, '', '') * 23700
            ]);
            //02 Chuyển hướng tới url lấy được
            return redirect()->to($data_url);

        }

        //03 Xóa giỏ hàng
        Cart::destroy();

        //04 Trả về kết quả thông báo
        return redirect('checkout/result')
            ->with('notification','Success ! You will pay on delivery.Please check your email !!');
    }

    public function vnPayCheck(Request $request){

        //01 lấy data từ URL (do VNPay gửi về qua $vnp_Retuenurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');//mã phản hồi kết quả thanh toán . 00 = thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
        $vnp_Amount = $request->get('vnp_Amount'); //Số tiền thanh toán

        //02 Kiểm tra data ,xem kết quả giao dịch trả về từ VNPay hợp lệ hay không
        if ($vnp_ResponseCode != null){
            if ($vnp_ResponseCode == 00){
                //cập nhật trạng thái order
                $this->orderService->update([
                   'status' => Constant::order_status_Paid
                ],$vnp_TxnRef);
                //gửi email
                $order = $this->orderService->find($vnp_TxnRef); // $vnp_TxnRef là order_id
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendMail($order,$subtotal,$total);
                Cart::destroy();

                //thông báo kết quả
                return redirect('checkout/result')
                    ->with('notification','Success ! Has paid online.Please check your email !!');
            }else{

                //xóa đơn hàng đã thêm vào database
                $this->orderService->delete($vnp_TxnRef);
                return redirect('checkout/result')
                    ->with('notification','ERROR : Payment failed or canceled');
            }
        }
    }

    public function result(){
        $notification = session('notification');
        return view('front.checkout.result',compact('notification'));
    }

    private function sendMail($order,$total,$subtotal){
        $email_to = $order->email;
        Mail::send('front.checkout.email',
        compact('order','total','subtotal'),
        function ($message) use ($email_to){
            $message->from('vinh2001@gmail.com','storeClothes');
            $message->to($email_to,$email_to);
            $message->subject('Order Notification');
        });
    }
}
