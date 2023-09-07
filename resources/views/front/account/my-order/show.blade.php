@extends('front.layout.master')
@section('title','Order Detail')

@section('body')
    <section class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Order ID:
                                <b>#{{$order->id}}</b>
                            </a>
                        </div>
                        <h4>Billing details</h4>
                        <div class="row">
                            <input type="hidden" id="user_id" name="user_id" value="{{$order->first_name}}">

                            <div class="col-lg-6">
                                <label for="fir">First name <span>*</span></label>
                                <input type="text" id="fir" name="first_name" value="{{$order->first_name}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="cun-name">Last name <span>*</span></label>
                                <input type="text" id="cun-name" name="last_name" value="{{$order->last_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="last">Company name</label>
                                <input type="text" id="last" name="company_name" value="{{$order->company_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country<span>*</span></label>
                                <input type="text" id="cun" name="country" value="{{$order->country}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street address<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="street_address"
                                       value="{{$order->street_address}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postalcode / ZIP code</label>
                                <input type="text" id="zip" name="postcode_zip" value="{{$order->postcode_zip}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / city<span>*</span></label>
                                <input type="text" id="town" name="town_city" value="{{$order->town_city}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email address<span>*</span></label>
                                <input type="text" id="email" name="email" value="{{$order->email}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone :<span>*</span></label>
                                <input type="text" id="phone" name="phone" value="{{$order->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Status :
                                <b>{{\App\Utilities\Constant::$order_status[$order->status]}}</b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Your order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach($order->orderDetails as $orderDetail)
                                        <li class="fw-normal">
                                            {{$orderDetail->product->name}} x {{$orderDetail->qty}}
                                            <span>${{$orderDetail->total}}</span>
                                        </li>
                                    @endforeach
                                    <li class="total-price">Total
                                        <span>${{array_sum(array_column($order->orderDetails->toArray(),'total'))}}</span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input type="radio" id="pc-check" name="payment_type" value="pay_later" disabled
                                                   {{$order->payment_type == 'pay_later' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Payment online
                                            <input type="radio" id="pc-paypal" name="payment_type" value="online_payment"
                                                {{$order->payment_type == 'online_payment' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection


