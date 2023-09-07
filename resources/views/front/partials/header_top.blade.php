
<div class="header-top">
    <div class="container">
        <div class="ht-left">
            <div class="mail-service">
                <i class="fa fa-envelope"></i>
                vinh2001px@gmail.com
            </div>
            <div class="phone-service">
                <i class="fa fa-phone"></i>
                +1234324243
            </div>
        </div>
        <div class="ht-right">
            @if(Auth::check())
                <a href="./account/logout" class="login-panel">
                    <i class="fa fa-user"></i>
                    {{Auth::user()->name}} - Logout
                </a>
            @else
                <a href="./account/login" class="login-panel">
                    <i class="fa fa-user">Login</i>
                </a>
            @endif
            <div class="lan-selector">
                <select name="countries" id="countries" class="language_drop" style="width: 300px ;">
                    <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                            data-title="English">English
                    </option>
                    <option value="yu" data-image="front/img/flag-2.jpg" data-imagecss="flag yu"
                            data-title="Banglades">Banglades
                    </option>
                </select>
            </div>
            <div class="top-social">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter-alt"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>

            </div>
        </div>
    </div>
</div>
