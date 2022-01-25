@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div>
        <h2 style="text-align: center; margin: 2rem" class="col-md-8">LOGIN</h2>
        <form action="{{route('loginUser')}}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-8">
                <label for="inputEmail4" class="form-label" required autofocus>Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>



@endsection
