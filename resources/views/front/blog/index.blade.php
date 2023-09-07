@extends('front.layout.master')

@section('title','Blog')

@section('body')
<!-- blog section -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1" >
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="">
                                <input type="text" placeholder="Search.....">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="shop/category/{{$category->name}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">
                                @foreach($blogs  as $blog)
                                    <a href="./blog/details/{{$blog->id}}" class="rb-item">
                                        <div class="rb-pic">
                                            <img src="front/img/blog/{{$blog->image}}" alt="">
                                        </div>
                                        <div class="rb-text">
                                            <h6>{{$blog->title}}</h6>
                                            <p>
                                                {{$blog->category}}
                                                <span>-May 8, 2023</span>
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2"><
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-6 col-sm-6">
                                <div class="blog-item">
                                    <div class="pi-pic">
                                        <img src="front/img/blog/{{$blog->image}}" alt="">
                                    </div>
                                    <div class="pi-text">
                                        <a href="./blog/details/{{$blog->id}}">
                                            <h4>{{$blog->title}}</h4>
                                        </a>
                                        <p>
                                           {{$blog->category}}
                                            <span>-May 8,2023</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">Loading more</a>
                    </div>
            </div>
        </div>
    </section>

@endsection


