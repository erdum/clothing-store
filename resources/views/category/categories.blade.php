@extends('layouts.master')

@section('title', 'Categories')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/site/css/categories.css') }}">
@endsection

@section('content')
    <section id="categories">
        <h2>Categories</h2>
        <p>Everything is here!</p>
        <div class="pro-container">
            @foreach ($categories as $category)
                <div class="pro">
                    <a href="{{ route('category', ['name' => $category->name]) }}">
                    <img src="{{ asset($category->cover_img) }}" alt="{{ $category->name }}">
                    <div class="des">
                        <h5>{{ $category->name }}</h5>
                        <span>{{ $category->extra_text ?? 'Flat 20% off' }}</span>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
