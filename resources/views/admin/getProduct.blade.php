@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="col-md-7 offset-3">

            @if($errors->any())
                <div class="alert alert-danger my-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-around">
                    <h3>{{ $product->name }}</h3>
                    <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="btn btn-danger"><i class="bi bi-trash mx-1"></i></button>
                    </form>
                </div>

                <div class="card-body m-4">
                    <div class="image text-center align-middle">
                        <p class="text-secondary">Category's image</p>
                    </div>

                    <form action="{{ route('updateProduct', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" autofocus>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label" for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label" for="stock">Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
                        </div>

                        <div class="form-check form-switch mt-3 mb-3">
                            <input type="checkbox" id="promotion" class="form-check-input" name="promotion"
                                   value='1' @checked($product->promotion)>
                            <label for="price" class="form-check-label">Promotion</label>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="form-select" name="category">
                                <option value="" selected>Product's category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected($product->category->id == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-end mt-3">
                            <button type="submit" class="btn btn-primary m-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
