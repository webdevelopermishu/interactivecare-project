@extends('layouts.admin')
@section('page_content')
<div class="row" >
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-info"><h3 class="text-center">Products</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:5%">SL</th>
                        <th style="width:20%" colspan="2">Product</th>
                        <th style="width:5%">Quantity</th>
                        <th style="width:8%">Price</th>
                        <th style="width:8%">Action</th>
                    </tr>
                    @foreach ($products as $sl=>$product)
                    <tr>
                        <td align="clearfix::after">{{ $sl+1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td style="width: 5%"><img width="100" src="{{ asset('uploads/products') }}/{{ $product->product_image }}" alt=""></td>
                        <td>{{ $product->product_quantity }}</td>
                        <td>BDT-{{ $product->product_price }} Tk.</td>
                        <td class="text-center">
                            <a class="btn btn-success" href="{{ route('product.view', $product->id) }}">View</a>
                            <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }} ">Update</a>
                            <a class="btn btn-danger" href="{{ route('product.delete', $product->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-center">Add New Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                        @error('product_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Quantity</label>
                        <input type="text" name="product_quantity" class="form-control">
                        @error('product_quantity')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Product Price</label>
                        <input type="text" name="product_price" class="form-control">
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
                        <img width="200" src="{{ asset('uploads/products/') }}/{{ $products }}" alt="" id="blah">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">Add Product</button>
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


