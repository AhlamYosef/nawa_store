
@extends('layouts.admin')
@section('content')
<div class="container">
  <h2 class="mb-4 fs-3">
    <?= $title ?>
  </h2>
  <a class="btn btn-primary m-3" href="{{route("categories.create")}}" role="button">Create Categories</a>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $categories as $category )
      <tr>
        <td>
          {{$category->id}}
        </td>
        <td>
          {{$category->name}}
        </td>
        <td><a href="{{route('categories.edit' ,$category->id)}}" class="btn btn-sm btn-outline-dark"><i
              class="far fa-edit"></i> Edit</a></td>
        <td>
          <form action="{{route('categories.destroy',$category->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"> delete</i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection
