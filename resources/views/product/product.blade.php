@extends('layouts.master')

@section('title', $product->name . ' | ' . $sub_category_name)

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/description.css') }}">
@endsection

@section('content')
    <div class="des-container">
        <div class="display">
            <div class="main-img">
                <img src="{{ asset('$product->images[0]->url') }}" alt="{{ $product->name }}" id="main-img">
            </div>
            <div class="sub-img">
                @foreach ($product->images as $image)
                    <img src="{{ asset('$image->url') }}" alt="{{ $product->name }}" id="fourth-img">
                @endforeach
            </div>
        </div>
        <div class="describe">
            <div class="first">
                <h4>{{ $sub_category_name }}</h4>
                <h2>{{ $product->name }}</h2>
                @if (!empty($product->discount))
                    <span id="off">({{ $product->discount }}% off)</span>
                @endif
                <h3>
                    <pre>$</pre><span>{{ $product->unit_price }}</span></h3>
                <!-- <p id="extra">(Additional Tax may Apply on checkout)</p> -->
                <div>
                    <div class="size">
                        <h4>Select Size</h4>
                        <h5>Size Chart ▼</h5>
                    </div>
                    <div class="measures">
                        @foreach ($product->sizes as $size)
                            <div id="div1">{{ $size->name }}</div>
                        @endforeach
                    </div>
                </div>
                @if ($product->quantity <= 20)
                    <p id="left">{{ $product->quantity }} Left</p>
                @endif
                <div class="buttons">
                    <a href="checkout.html"><button id="wishlist"><i class="fa-solid fa-money-check-dollar" id="wish"></i> Checkout</button></a>
                        <!-- <button id="wishlist"><i class="fa-solid fa-heart" id="wish"> </i> </button> -->
                        <button id="cart-btn"><i class="fa-solid fa-shopping-bag" id="cartIcon"></i> <span id="cartText"> Add to Cart</span></button>
                </div>
            </div>
            <div class="second">
                <div class="pr-det">
                    <h3>PRODUCT DETAILS:</h3>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="mat-care">
                    <h3>MATERIAL & CARE:</h3>
                    <ul>
                        <li>Cotton</li>
                        <li>Machine Wash</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/descriptionImg') }}"></script>
@endsection
