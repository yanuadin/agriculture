@extends('layouts.master')
@section('title', 'Konco Tani')
@section('content')
    <!-- slider-start -->
    <div class="slider-area pos-relative">
        <div class="shape d-none d-xl-block">
            <div class="shape-item slider-02 bounce-animate"><img src="{{ asset('orgafe\img\slider\sl2.png') }}" alt=""></div>
            <div class="shape-item slider-03 bounce-animate"><img src="{{ asset('orgafe\img\slider\sl3.png') }}" alt=""></div>
            <div class="shape-item slider-04 bounce-animate"><img src="{{ asset('orgafe\img\slider\sl4.png') }}" alt=""></div>
            <div class="shape-item slider-05 bounce-animate"><img src="{{ asset('orgafe\img\slider\sl5.png') }}" alt=""></div>
        </div>
        <div class="slider-active">
            <div class="single-slider slider-2-height d-flex align-items-center" data-background="img/slider/slider3.jpg">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-10 col-lg-10 offset-lg-1 offset-xl-1">
                            <div class="slider-content slider-text slider-2-text text-center mt-80">
                                <span data-animation="fadeInUp" data-delay=".3s">Extra 50% Off For All Winter Product</span>
                                <h1 data-animation="fadeInUp" data-delay=".5s">100% Natural Organic Orgafe Foods</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-start -->

    <!-- product-area-start -->
    <div class="product-area pos-relative pt-110 pb-120 fix">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="product-showing">
                        <p>Showing 1–8 of {{ $count }} results</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="pro-filter mb-40 f-right">
                        <form action="#">
                            <select name="pro-filter" id="pro-filter">
                                <option value="1">Shop By</option>
                                <option value="2">Top Sales </option>
                                <option value="3">New Product </option>
                                <option value="4">A to Z Product </option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($items as $item)
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="product-wrapper text-center mb-30" style="height: 26em">
                            <div class="product-img mb-2">
                                <a href="{{ route('detail-product', $item->id) }}"><img src="{{ Storage::url($item->image1) }}" alt="" style="width: 197px; height: 164px"></a>
                            </div>
                            @if($item->discount)
                                <div class="on-sale">
                                    @if($item->unit == "Harga")
                                        <span>-Rp. {{ number_format($item->discount, 2) }}</span>
                                    @else
                                        <span>-{{ $item->discount }}%</span>
                                    @endif
                                </div>
                            @endif
                            <div class="product-text">
                                <h4><a href="#">{{ $item->name }}</a></h4>
                                <div class="pro-rating">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="pro-price">
                                    @if($item->discount)
                                        @if($item->unit == "Harga")
                                            <span>Rp. {{ number_format(($item->price) - $item->discount, 2) }}</span>
                                        @else
                                            <span>Rp. {{ number_format($item->price - (($item->price) * $item->discount / 100), 2) }}</span>
                                        @endif
                                    @else
                                        <span>Rp. {{ number_format($item->price, 2) }}</span>
                                    @endif
                                </div>
                                <p><b>{{ $item->user->store_name }}</b></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $items->links('pagination.orgafe-pagination') }}
        </div>
    </div>
    <!-- product-area-end -->
@endsection
