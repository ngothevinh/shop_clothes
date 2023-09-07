@extends('front.layout.master')

@section('title','Blog')
@section('body')
    <!-- blog details section -->
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-details-title">
                            <h2>{{$blogs->title}}</h2>
                            <p>{{$blogs->category}} <span>-May 8,2023</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="front/img/blog/{{$blogs->image}}" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>{{$blogs->subtitle}}</p>
                        </div>
                        <div class="blog-quote">
                            <p>{{$blogs->content}} </p>
                        </div>
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="front/img/blog/blog-detail-1.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="front/img/blog/blog-detail-2.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="front/img/blog/blog-detail-3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>Travel</li>
                                    <li>Beauty</li>
                                    <li>codeleanon</li>
                                </ul>
                            </div>
                            <div class="blog-share">
                                <span>Share :</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    @if($blogs->id == 1)
                                        <a href="./blog/details/{{$blogs->id}}" class="prev-blog">
                                            <div class="pb-pic">
                                                <i class="ti-arrow-left"></i>
                                                <img src="front/img/blog/{{$blogs->image}}" alt="" style="border-radius: 50%">
                                            </div>
                                            <div class="pb-text">
                                                <span>Previous Post:</span>
                                                <h5>{{$blogs->title}}</h5>
                                            </div>
                                        </a>
                                    @else
                                        <a href="./blog/details/{{$blogs->id - 1}}" class="prev-blog">
                                            <div class="pb-pic">
                                                <i class="ti-arrow-left"></i>
                                                <img src="front/img/blog/{{$blogs->image}}" alt="" style="border-radius: 50%">
                                            </div>
                                            <div class="pb-text">
                                                <span>Previous Post:</span>
                                                <h5>{{$blogs->title}}</h5>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-lg-5 col-md-6 offset-lg-2">
                                    <a href="./blog/details/{{$blogs->id + 1}}" class="next-blog">
                                        <div class="nb-pic">
                                            <img src="front/img/blog/{{$blogs->image}}" alt="" style="border-radius: 50%">
                                            <i class="ti-arrow-right"></i>
                                        </div>
                                        <div class="nb-text">
                                            <span>Next post :</span>
                                            <h5>{{$blogs->title}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="posted-by">
                            <div class="pb-pic">
                                <img src="front/img/blog/post-by.png" alt="">
                            </div>
                            <div class="pb-text">
                                <a href="#">
                                    <h5>Share lynch</h5>
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid aperiam
                                    culpa distinctio dolore dolorem ducimus, earum eius fuga hic impedit minima minus
                                    nostrum</p>
                            </div>
                        </div>
                        <div class="leave-comment">
                            <h4>Leave comment</h4>
                            <form action="" method="post" class="comment-form">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blogs->id}}">
                                <input type="hidden" name="user_id"
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="name" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="email" name="email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages" name="messages"></textarea>

                                        <div class="personal-rating">
                                            <h6>Your Rating</h6>
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rating" value="5"/>
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4"/>
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3"/>
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2"/>
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1"/>
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="site-btn mt-3">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

