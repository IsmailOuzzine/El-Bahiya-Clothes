@extends('layouts/app')

@section('content')
    <div class="m-0 p-3 w-bg">
        <div class="d-flex border border-white">
            <h1 class="m-auto text-white welcome">Welcome to El Bahiya Clothes.</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card m-3">
                    <img src="{{ asset('images/shirts.png') }}" class="card-img-top" alt="El Bahiya shirts">
                    <div class="card-body">
                        <h3 class="text-center">Our Shirts</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card m-3">
                    <img src="{{ asset('images/t-shirts.png') }}" class="card-img-top" alt="El Bahiya T-shirts">
                    <div class="card-body">
                        <h3 class="text-center">Our T-shirts</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card m-3">
                    <img src="{{ asset('images/sweats.png') }}" class="card-img-top" alt="El Bahiya sweats">
                    <div class="card-body">
                        <h3 class="text-center">Our Sweats</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
