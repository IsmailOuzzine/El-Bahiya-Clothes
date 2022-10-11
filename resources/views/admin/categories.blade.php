@extends('layouts/admin')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h3>Categories</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Promotion</th>
                        <th class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm">
                                <i class="bi bi-plus-circle-fill mx-3"></i>
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="text-center">
                                @if ($category->promotion)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    <i class="bi bi-check-circle text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('deleteCategory', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger mx-1"><i class="bi bi-trash"></i></button>
                                </form>
                                <a href='{{ route('getCategory', $category->id) }}' class="btn btn-outline-secondary modify-btn">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($error != '')
            <div class="alert alert-danger mt-3">
                <p> {{ $error }} </p>
            </div>
        @endif
    </div>

    <!-- modals -->
    <div class="modal fade" id="addForm">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-light">
                <form method="POST" action="{{ route('createCategory') }}">
                @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add a new category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div>
                            <div class="form-group mt-3 mb-3">
                                <label for="name" class="form-label">Category's name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="description" class="form-label">Category's description</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">
                            Add
                        </button>
                        <button class="btn btn-danger ms-3" data-bs-dismiss="modal" type="button">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
