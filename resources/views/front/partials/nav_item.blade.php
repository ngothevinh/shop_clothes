<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>All departments</span>
                <ul class="depart-hover">
                    <li class="active"><a href="#">women clothing</a></li>
                    <li class="active"><a href="#">men clothing</a></li>
                    <li class="active"><a href="#">underwear</a></li>
                    <li class="active"><a href="#">kid's clothing</a></li>
                    <li class="active"><a href="#">women clothing</a></li>
                    <li class="active"><a href="#">women clothing</a></li>
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                <li ><a href="">Collection</a>
                    <ul class="dropdown">
                        @foreach($categories as $category)
                            <li><a href="shop/category/{{$category->name}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'blog') ? 'active' : '' }}"><a href="./blog">Blog</a></li>
                <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href="./contact">Contact</a></li>
                <li><a href="">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./account/my-order">My Order</a></li>
                        <li><a href="./cart">Shopping cart</a></li>
                        <li><a href="./checkout">Checkout</a></li>
                        <li><a href="./chat">Chat</a></li>
                        <li><a href="./account/register">Register</a></li>
                        <li><a href="./account/login">Login</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>
