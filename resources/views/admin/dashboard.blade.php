@extends('layouts/admin')

@section('content')
    <div class="text-center">
        <h2>Welcome {{ Auth::user() ? Auth::user()->name : 'Mr.' }} to administration dashboard</h2>
    </div>
@endsection
