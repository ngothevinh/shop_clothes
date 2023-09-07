<div class="container">
    <div class="inner-header">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="logo">
                    <a href="./">
                        <img src="front/img/logo-1.jpg" height="130px" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <form action="">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All categories</button>
                        <div class="input-group">
                            <input type="text" placeholder="Enter your search " name="search"
                                   value="{{ request('search') }}">
                            <button type="submit"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-3 text-right">
                <ul class="nav-right">
                    <li class="heart-icon-icon">
                        <a href="#">
                            <i class="icon_heart_alt"></i>
                            <span>1</span>
                        </a>
                    </li>
                    <li class="cart-icon">
                        <a href="./cart">
                            <i class="icon_bag_alt"></i>
                            <span class="cart-count">{{Cart::count()}}</span>
                        </a>
                        <div class="cart-hover">
                            <div class="select-items">
                                <table>
                                    <tbody>
                                    @foreach(Cart::content() as $cart)
                                        <tr data-rowId="{{$cart->rowId}}">
                                            <td class="si-pic">
                                                <img src="front/img/products/{{$cart->options->images[0]->path}}"
                                                     alt="" style="height: 70px">
                                            </td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>${{$cart->price}} x {{$cart->qty}}</p>
                                                    <h6>{{$cart->name}}</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close" onclick="removeCart('{{$cart->rowId}}')"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="select-total">
                                <span>total:</span>
                                <h5>${{Cart::total()}}</h5>
                            </div>
                            <div class="select-button">
                                <a href="./cart" class="primary-btn view-card">view cart</a>
                                <a href="./checkout" class="primary-btn checkout-btn">checkout</a>
                            </div>
                        </div>
                    </li>
                    <li class="cart-price">${{Cart::total()}}</li>
                </ul>
            </div>

        </div>
    </div>
</div>
