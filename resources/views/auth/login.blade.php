@extends('layouts.app')
@section('content')
<div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Login Now</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="{{ route('login.form') }}" class="p-5 bg-light" method="POST">
                @csrf
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                  <label for="email">Password *</label>
                  <input type="password" class="form-control" id="Password" name="password">
                </div>
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
              </div>
            </form>
          </div>
          {{ $errors }}
        </div>
      </div>
    </div>
  </div>
@endsection