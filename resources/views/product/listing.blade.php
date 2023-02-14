@extends('layouts.master')

@section('title', $sub_category->name)

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/site/css/products.css') }}">
@endsection

@section('content')
    <section id="products">
        <h2>{{ $sub_category->name }}</h2>
        <p>{{ $sub_category->extra_text ?? 'Your Choice Matter's!' }}</p>
        <div class="pro-container">
            @foreach ($products as $product)
                <a href="{{ route('category', ['name' => $sub_category->name, 'sub_name' => $product->name]) }}">
                    <div class="pro">
                        <img src="{{ asset($product->images[0]->url) }}" alt="$product->name" id="product-img">
                        <div class="des">
                            <span class="brand">{{ $product->name }}</span>
                            <h5 class="description">{{ $product->description }}</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4 class="price">{{ $product->unit_price }}</h4>
                        </div>
                        <a href="#" class="addToCart"><i class="fa-solid fa-cart-shopping" class="addToCart"></i>Add to Cart</a>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
