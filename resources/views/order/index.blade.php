@extends('layouts.master')

@section('title', 'My Orders')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/site/css/orders.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Orders</h1>
    </div>
    <div class="heck">
        <div class="title-container">
            <span id="your-orders" class="extra active">Your Order's</span>
        </div>
        <div class="orders prev-order">
            <div class="titles">
                <div class="order-num title">
                    <h4>Order Number</h4>
                </div>
                <div class="status title">
                    <h4>Status</h4>
                </div>
                <div class="customer title">
                    <h4>Name</h4>
                </div>
                <div class="date title">
                    <h4>Date</h4>
                </div>
                <div class="total title">
                    <h4>Total</h4>
                </div>
            </div>
            @foreach ($orders as $order)
                <div class="order-det">
                    <div class="order-num det">
                        <a href="{{ route('order', ['id' => $order->id]) }}">
                            <p><span>#{{ $order->id }}</span></p>
                        </a>
                    </div>
                    <div class="status det">
                        <p>{{ $order->status }}</p>
                    </div>
                    <div class="customer det">
                        <p>{{ $order->user->name }}</p>
                        <p><span>{{ $order->user->email }}</span></p>
                    </div>
                    <div class="date det">
                        <p>{{ $order->created_at }}</p>
                    </div>
                    <div class="total det">
                        <h4>Rs: <span>{{ $order->total }}</span></h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
