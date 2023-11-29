@extends('layouts.admin')
@section('page_content')
<div class="mb-3">
    <h3 class="text-center">Hello Buddy</h3>
</div>
<div class="mb-3">
    <div class="text-center">
        <a href="{{ route('products') }}" class="btn btn-info">Goto products</a>
    </div>
</div>
@endsection
