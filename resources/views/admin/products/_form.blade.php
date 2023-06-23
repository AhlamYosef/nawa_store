@if ($errors->any())
<div class="alert alert-danger">
    you have some errors :
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <form action="{{route('products.store')}}" method="post">
        @csrf
        <h2 class="mb-4 fs-3">New product</h2>

<div class="row">
    <div class="col-md-8">
    <div class="form-floating mb-3">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" @error('name') is-invalid @enderror name="name" value="{{old('name',$product->name ) }}" placeholder="ProductName">
            @error('name')
            <p class="ivalid-feedback">{{$message}} </p>

            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="slug">URL Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"  value="{{old('slug',$product->slug ) }}" placeholder="URL Slug">
        </div>

        <div class="form-floating mb-3">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description"  value="{{old('description',$product->description ) }}" placeholder="Description">
        </div>

        <div class="form-floating mb-3">
            <label for="short_description">Short Description</label>
            <input type="text" class="form-control" id="short_description" name="short_description"  value="{{old('short_description',$product->short_description ) }}"
                placeholder="Description">
        </div>

    </div>
    <div class="col md-4">
        <div class="mb-3">
            <label for="status">Status</label>
            <div>
                @foreach ($status_option as $value => $label)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_{{ $value }}" value="{{ $value }}" @checked($value == old('status' , $product->status))>
                    <label class="form-check-label" for="status_{{ $value }}">
                        {{ $label }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="category">category</label>
            <div>
            <select name="category_id" id="category_id" class="form-select form-control">
                <option></option>
                @foreach ($categories as $category)
                <option @selected($category->id == old('category_id', $product->category_id)) value="{{$category->id}}">{{$category->name}}
                </option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="form-floating mb-3">
            <label for="price">Product Price</label>
            <input type="number" step="0.1" min="0" class="form-control" id="price" name="price"  value="{{old('price',$product->price ) }}" placeholder="price">
        </div>

        <div class="form-floating mb-3">
            <label for="compare_price">compare price</label>
            <input type="number" step="0.1" min="0" class="form-control" id="compare_price" name="compare_price" value="{{old('compare_price',$product->compare_price ) }}"
                placeholder="compare_price">
        </div>

        <div class="form-floating mb-3">
            <label for="image">image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="image">
        </div>

    </div>
</div>

    <button type="submit" class="btn btn-success">{{$submit_label ?? 'Save'}}</button>

    </form>
</div> 