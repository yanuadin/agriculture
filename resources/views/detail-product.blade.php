@extends('layouts.master')
@section('title', 'Konco Tani')
@section('content')
    <!-- shop-banner-area start -->
    <section class="shop-banner-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="product-details-img mb-20">
                        <div class="tab-content" id="myTabContent3">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="{{ Storage::url($item->image1) }}" alt="" style="width: 570px; height: 515px">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="{{ Storage::url($item->image2) }}" alt="" style="width: 570px; height: 515px">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile1" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="{{ Storage::url($item->image3) }}" alt="" style="width: 570px; height: 515px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-thumb-tab mb-30">
                        <ul class="nav" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-selected="true"><img src="{{ Storage::url($item->image1) }}" alt="" style="width: 177px; height: 160px"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-selected="false"><img src="{{ Storage::url($item->image2) }}" alt="" style="width: 177px; height: 160px"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile1" role="tab"
                                   aria-selected="false"><img src="{{ Storage::url($item->image3) }}" alt="" style="width: 177px; height: 160px"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="product-details mb-30">
                        <div class="product-details-title">
                            <h1>{{ $item->name }}</h1>
                            <div class="details-price mb-20">
                                @if($item->discount)
                                    @if($item->unit == "Harga")
                                        <span>Rp. {{ number_format(($item->price) - $item->discount, 2) }}</span>
                                        <span class="old-price">Rp. {{ number_format($item->price, 2) }}</span>
                                    @else
                                        <span>Rp. {{ number_format($item->price - (($item->price) * $item->discount / 100), 2) }}</span>
                                        <span class="old-price">Rp. {{ number_format($item->price, 2) }}</span>
                                    @endif
                                @else
                                    <span>Rp. {{ number_format($item->price, 2) }}</span>
                                @endif
                            </div>
                            <div class="pro-rating mb-20">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <div class="product-social mb-30">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="product-details-action">
                            <form action="{{ route('add-to-cart', $item->id) }}" method="POST">
                                @csrf
                                <div class="plus-minus">
                                    <div class="cart-plus-minus">
                                        @if(Session::has('cart') && array_key_exists($item->id, Session::get('cart')->items))
                                            <input type="number" name="qty" placeholder="0" value="{{ Session::get('cart')->items[$item->id]['qty'] }}">
                                        @else
                                            <input type="number" name="qty" placeholder="0">
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-black" type="submit">add to cart</button>
                            </form>
                            <small class="text-danger">{{ $errors->first('qty') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-xl-12">
                    <div class="product-review">
                        <ul class="nav review-tab" id="myTab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab11" data-toggle="tab" href="#home11"
                                   role="tab" aria-controls="home11" aria-selected="true">Description </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab11" data-toggle="tab" href="#profile11"
                                   role="tab" aria-controls="profile" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home11" aria-labelledby="home-tab11">
                                <div class="review-text mt-30">
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile11">
                                <div class="review-text mt-30">
                                    <div class="product-commnets">
                                        <div class="product-commnets-list">
                                            <div class="pro-comments-img">
                                                <img src="{{ asset('orgafe\img\product\comments\01.png') }}" alt="">
                                            </div>
                                            <div class="pro-commnets-text">
                                                <h4>Roger West -
                                                    <span>June 5, 2017</span>
                                                </h4>
                                                <div class="pro-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt
                                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation.</p>
                                            </div>
                                        </div>
                                        <div class="product-commnets-list mt-30">
                                            <div class="pro-comments-img">
                                                <img src="{{ asset('orgafe\img\product\comments\02.png') }}" alt="">
                                            </div>
                                            <div class="pro-commnets-text">
                                                <h4>Roger West -
                                                    <span>June 5, 2017</span>
                                                </h4>
                                                <div class="pro-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt
                                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-xl-7">
                                        <div class="review-box">
                                            <h4>Add a Review</h4>
                                            <div class="your-rating mb-40">
                                                <span>Your Rating:</span>
                                                <div class="rating-list">
                                                    <a href="#">
                                                        <i class="far fa-star"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="far fa-star"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="far fa-star"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="far fa-star"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="far fa-star"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <form class="review-form" action="#">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <label for="message">YOUR REVIEW</label>
                                                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="r-name">Name</label>
                                                        <input type="text" id="r-name">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="r-email">Email</label>
                                                        <input type="email" id="r-email">
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <button class="btn brand-btn">Add your Review</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-banner-area end -->
@endsection
