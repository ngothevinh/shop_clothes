@extends('front.layout.master')
@section('title','Cart')

@section('body')
    <!-- shpping cart section -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                @if(Cart::count() > 0)
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>
                                        <i class="ti-close"
                                           onclick="destroyCart() "
                                           style="cusor:pointer"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr data-rowid="{{$cart->rowId}}">
                                        <td class="cart-pic first-row">
                                            <img src="front/img/products/{{$cart->options->images[0]->path}}" alt=""
                                                 style="height: 170px">
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{$cart->name}}</h5>
                                        </td>
                                        <td class="p-price first-row">${{number_format($cart->price,2)}}</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">
                                            ${{number_format($cart->price * $cart->qty,2)}}</td>
                                        <td class="close-td first-row">
                                            <i class="ti-close" onclick="removeCart('{{$cart->rowId}}')"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="#" class="primary-btn continue-shop"> Continue shopping</a>
                                    <a href="#" class="primary-btn up-cart">Update cart</a>
                                </div>
                                <dv class="discount-coupon">
                                    <h6>Discount codes</h6>
                                    <form action="#" class="coupon-form">
                                        <input type="text" placeholder="enter your code">
                                        <button type="submit" class="site-btn coupon-btn">Apply</button>
                                    </form>
                                </dv>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Subtotal <span>${{$total}}</span></li>
                                        <li class="cart-total">Total <span>${{$subtotal}}</span></li>
                                    </ul>
                                    <a href="./checkout" class="proceed-btn">Process to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <h4>Your cart is empty</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection





