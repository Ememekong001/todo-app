@extends('layouts.guest')
@section('title', 'Register')
@section('content')
    <div class="container">
        <h2 style="text-align: center; margin: 2rem" class="col-md-8">REGISTER</h2>
        <form action="{{route('registerUser')}}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-8" >
                <label for="Name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-8">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-8">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="" name="address">
            </div>
            <div class="col-md-8">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>


@endsection
