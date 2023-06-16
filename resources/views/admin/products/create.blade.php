@extends('layouts.admin')
@section('content')
<h2 class="mb-4 fs-3">New Product</h2>
<form action="<?= route('products.store')?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
        <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                <label for="Product Name">Product Name</label>
        </div>
        <div class="form-floating mb-3">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="URL Slug">
                <label for="URL Slug">URL Slug</label>
        </div>
        <div class="form-floating mb-3">
                <select class="form-select form-control" id="category_id" name="category_id" placeholder="category_id">
                        <option></option>
                        @foreach($categories as $Category)
                        <option></option>
                </select>
                <label for="category_id">Category</label>
        </div>
        <div class="form-floating mb-3">
                <textarea  class="form-control" id="description" name="description" placeholder="Description"></textarea>
                <label for="Description">Description</label>
        </div>
        <div class="form-floating mb-3">
                <textarea class="form-control" id="short_description" name="short_description" placeholder="short_Description"></textarea>
                <label for="short_Description">short_Description</label>
        </div>
        <div class="form-floating mb-3">
                <input type="number" class="form-control" id="price" name="price" placeholder="product price">
                <label for="product price">product price</label>
        </div>
        <div class="form-floating mb-3">
                <input type="number" class="form-control" id="compare_price" name="compare_price" placeholder="Compare price">
                <label for="compare_price">Compare price</label>
        </div>
        <div class="form-floating mb-3">
                <input type="file" class="form-control" id="image" name="compare_price" placeholder="Product Image">
                <label for="image">Product Image</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
</form>
    
@endsection
