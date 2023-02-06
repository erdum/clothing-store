@extends('layouts.master')

@section('title', 'Checkout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/check.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="input">
            <div class="headings">
                <h2>Getting Your Order!</h2>
                <h3>Shipment Information</h3>
            </div>
            <div class="main">
                <div class="details">
                    <label for="first-name">Name</label>
                    <input type="text" value="{{ $user->name }}">
                </div>
                <div class="details">
                    <label for="address">Country</label>
                    <input type="text" value="{{ $user->shipping_address->country }}">
                </div>
                <div class="details">
                    <label for="city">City</label>
                    <input type="text" value="{{ $user->shipping_address->city }}">
                </div>
                <div class="details">
                    <label for="address">Address</label>
                    <input type="text" value="{{ $user->shipping_address->address }}">
                </div>
                <div class="details">
                    <label for="zip">Postal Code</label>
                    <input type="text" value="{{ $user->shipping_address->postal_code }}">
                </div>
                <h3>Contact Information</h3>
                <div class="contact-info">
                    <div class="details">
                        <label for="email">Email Address</label>
                        <input type="email" value="{{ $user->email }}">
                    </div>
                    <div class="details">
                        <label for="number">Phone Number</label>
                        <input type="text" value="{{ $user->shipping_address->phone_number }}">
                    </div>
                    <div class="details">
                        <button>Proceed</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="info">
            <h2>Products Detail</h2>
            @foreach ($user->in_cart_items as $item)
                <div class="info-main">
                    <img src="{{ asset($item->product->images[0]->url) }}" alt="{{ $item->product->name }}">
                    <div class="describe">
                        <div class="character">
                            <h3>{{ $item->product->name }}</h3>
                            <p>{{ $item->product->description }}</p>
                        </div>
                        <div class="price-each">
                            <h3><pre>Price: </pre></h3>
                            <span class="price"> <span>$</span> {{ $item->product->unit_price }}</span>
                        </div>
                        <div class="price-each">
                            <h3><pre>Quantity: </pre></h3>
                            <span class="price">{{ $item->quantity }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="price-sec">
                <div class="final">
                    <h4>Sub Total: </h4>
                    <span class="price"><span>$</span> {{ $sub_total }}</span>
                </div>
                <hr>
                <div class="final">
                    <h4>Delivery Charges: </h4>
                    <span class="price"><span>$</span> {{ $delivery_charges }}</span>
                </div>
                <hr>
                <div class="final">
                    <h4>Total: </h4>
                    <span class="price"><span>$</span> {{ $total }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection