@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="col-md-7 offset-3">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $category->name }}</h3>
                </div>

                <div class="card-body m-4">
                    <div class="image text-center align-middle">
                        <p class="text-secondary">Category's image</p>
                    </div>

                    <form action="{{ route('updateCategory', $category->id) }}" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" autofocus>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $category->description }}</textarea>
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
