@extends('layouts.admin')
@section('content')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

@endsection
<h2 class="mb-4 fs-3">{{ $title }}</h2>
<a href="<?= route('products.create')?>" class = "btn btn-sm btn-primary">+ Create Product</a>
<table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Status</th>
              <th>update</th>
              <th>delete</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($products as $product)
          <tr>
              <td>{{$product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category_id }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->status }}</td>
              <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-dark"><i class="far fa-edit"></i>edit</a></td>
              <td>
                    <button type="submit" onclick="comforme('{{$product->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"> delete</i></button>
             </td>
          </tr>
          @endforeach 
      </tbody>
</table>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script>

function  comforme(id, element){

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            performdtore(id, element)
        }
        })


        function performdtore(id,element){
        axios.delete('/admin/products/'+id )
            .then(function (response) {
                    toastr.success(response.data.message);
                    window.location.href = '/admin/products'

                 })
            .catch(function (error) {
                    toastr.error(error.response.data.message);
                });
        }}
</script>
@endsection