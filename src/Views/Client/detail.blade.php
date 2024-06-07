<!-- resources/views/product-detail.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="header text-center">
        <div class="container"></div>
        <!-- Add your SVG shapes here if needed -->
    </div>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="container mt-5">
                    <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="" class="card-img-top rounded-0">
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $product['name'] }}</h2>
                                <div class='price inline'>
                                <p>{{ '$'. $product['price_regular'] }}</p>
                                <p>{{ '$'. $product['price_sale'] }}</p>
                            </div>
                                <p> {{ $product['overview'] }}</p>
                                <p> {{ $product['content'] }}</p>
                                <button class="btn btn-primary">Thêm vào giỏ hàng</button>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
