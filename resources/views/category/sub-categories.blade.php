@extends('layouts.master')

@section('title', $category->name . ' Categories')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
    <section id="products">
        <h2>{{ $category->name }}</h2>
        <p>{{ $category->extra_text ?? "Your Choice Matter's!" }}</p>
        <div class="pro-container">
            @foreach ($sub_categories as $sub_category)
                <a href="{{ route('category', ['name' => $category->name, 'sub_name' => $sub_category->name]) }}">
                    <div class="pro">
                        <img src="{{ asset($sub_category->cover_img) }}" alt="$sub_category->name" id="product-img">
                        <div class="des">
                            <span class="brand">{{ $sub_category->name }}</span>
                            <h5 class="description">{{ $sub_category->extra_text }}</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
