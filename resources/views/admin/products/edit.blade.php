@extends('layouts.admin')
@section('content')
<h2 class="mb-4 fs-3">edit Product</h2>
<form action="{{route('products.update', $product->id)}}" method="post">
        @csrf
        {{-- Comment: Form Method Spoofing --}}
        
        <input type="hidden" name="_method" value= "put">
        @method('put')
        <div class="form-floating mb-3">
                <label for="Product Name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name}}" placeholder="Product Name">
        </div>
        <div class="form-floating mb-3">
                <label for="URL Slug">URL Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug}}" placeholder="URL Slug">
        </div>
        <div class="form-floating mb-3">
                <label for="Description">Description</label>
                <textarea  class="form-control" id="description" name="description" value="{{ $product->description}}" placeholder="Description"></textarea>
        </div>
        <div class="form-floating mb-3">
                <label for="short_Description">short_Description</label>
                <textarea class="form-control" id="short_description" name="short_description" value="{{ $product->short_description}}" placeholder="short_Description"></textarea>
        </div>
        <div class="form-floating mb-3">
                <label for="product price">product price</label>
                <input type="number" class="form-control" id="price" name="price"value="{{ $product->price}}" placeholder="product price">
        </div>
        <div class="form-floating mb-3">
                <label for="compare_price">Compare price</label>
                <input type="number" class="form-control" id="compare_price" name="compare_price"value="{{ $product->compare_price}}" placeholder="Compare price">
        </div>
        <div class="form-floating mb-3">
                <label for="image">Product Image</label>
                <input type="file" class="form-control" id="image" name="compare_price" placeholder="Product Image">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
</form>
    
@endsection