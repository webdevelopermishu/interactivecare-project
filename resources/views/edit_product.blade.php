@extends('layouts.admin')
@section('page_content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-center">Upadte Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="{{ $products->product_name }}">
                        @error('product_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Quantity</label>
                        <input type="text" name="product_quantity" class="form-control" value="{{ $products->product_quantity }}">
                        @error('product_quantity')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Price</label>
                        <input type="text" name="product_price" class="form-control" value="{{ $products->product_price }}">
                        @error('product_price')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Image</label>
                        <input type="file" name="product_image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        @error('product_image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <img width="200" src="{{ asset('uploads/products/') }}/{{ $products->product_image }}" alt="" id="blah">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">Update Product</button>
                        <a class="btn btn-warning" href="{{ route('products') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-script')
@if (session('success')){
    <script>
    Swal.fire(
        'Done',
        '{{ session('success') }}',
        'success'
    )
    </script>
}
@endif
@endsection
