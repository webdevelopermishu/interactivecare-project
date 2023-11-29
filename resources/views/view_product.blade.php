@extends('layouts.admin')
@section('page_content')
<div class="row">
    <div class="col-lg-14">
        <div class="card">
            <div class="card-header"><h4 class="text-center">Product Details</h4></div>
            <div class="card-body text-center">
                <div class="mb-2">
                    <img width="400" src="{{ asset('uploads/products') }}/{{ $product_view->product_image }}" alt="">
                </div>
                <div class="mb-2">
                    <h5 class="text-center">{{ $product_view->product_name }}</h5>
                </div>
                <div class="mb-2">
                    <h5 class="text-center">BDT-{{ $product_view->product_price }}Tk.</h5>
                </div>
                <div class="mb-2">
                    <a class="btn btn-info" href="{{ route('products') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
