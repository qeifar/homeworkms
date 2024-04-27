@extends('layouts.app')

@section('breadtitle', 'Add New Products')
@section('breaddesc', 'Creating new product')
@section('cardcontent')
<form action="{{ route('product.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-group mb-3">
                <label for="simpleinput">Product Name</label>
                <input type="text" name="name" id="simpleinput" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="simpleinput">Product Description</label>
                <input type="text" name="desc" id="simpleinput" class="form-control" value="{{ $product->description }}">
            </div>
            <div class="form-group mb-3">
                <label for="simpleinput">Product Price</label>
                <input type="number" name="price" value="0.00" step="0.25" id="simpleinput" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-success">Save</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</form>
@endsection