@extends('front.layout.master')
@section('title','My Order')

@section('body')
<!-- shpping cart section -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
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
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="cart-pic first-row">
                                    <img src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path}}" alt="">
                                </td>
                                <td class="first-row">
                                    #{{$order->id}}
                                </td>
                                <td class="cart-title first-row">
                                    <h5>
                                        {{$order->orderDetails[0]->product->name}}

                                        @if(count($order->orderDetails) > 1)
                                            (and {{count($order->orderDetails)}} other products)
                                        @endif
                                    </h5>
                                </td>
                                <td class="total-price first-row">
                                    ${{ array_sum(array_column($order->orderDetails->toArray(),'total')) }}
                                </td>
                                <td class="first-row">
                                    <a href="./account/my-order/{{$order->id}}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



