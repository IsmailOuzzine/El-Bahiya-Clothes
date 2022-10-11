@extends('layouts/admin')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h3>Products</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th class="text-center">Promotion</th>
                        <th class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm">
                                <i class="bi bi-plus-circle-fill mx-3"></i>
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td class="text-center">
                                @if ($product->promotion)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    <i class="bi bi-check-circle text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger mx-1"><i class="bi bi-trash"></i></button>
                                </form>
                                <a href='{{ route('getProduct', $product->id) }}' class="btn btn-outline-secondary modify-btn">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modals -->
    <div class="modal fade" id="addForm">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-light">
                <form method="POST" action="{{ route('createProduct') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add a new product</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div>
                            <div class="form-group mt-3 mb-3">
                                <label for="name" class="form-label">Product's name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="price" class="form-label">Product's price (MAD)</label>
                                <input type="number" id="price" class="form-control" name="price">
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="stock" class="form-label">In stock</label>
                                <input type="number" id="stock" class="form-control" name="stock">
                            </div>

                            <div class="form-check mt-3 mb-3">
                                <input type="checkbox" id="promotion" class="form-check-input" name="promotion" value='1'>
                                <label for="price" class="form-check-label">Promotion</label>
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" class="form-select" name="category">
                                    <option value="" selected>Product's category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">
                            Add
                        </button>
                        <button class="btn btn-danger ms-3" type="button" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
