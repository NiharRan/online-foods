@extends('layouts.frontend')

@section('title', 'Checkout')

@section('vendor-style')
    <!-- Vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/pages/app-ecommerce-shop.css')) }}">
@endsection
@section('content')

    <checkout></checkout>

@endsection

@section('vendor-script')
    <!-- Vendor js files -->
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/app-ecommerce-shop.js')) }}"></script>
@endsection
