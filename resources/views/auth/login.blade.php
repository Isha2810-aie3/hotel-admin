@extends('layouts.auth')

@section('title','Admin Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:100vh;">
  <div class="card shadow-sm p-4" style="width:400px; background: rgba(255,255,255,0.9);">
    <h4 class="mb-3 text-center">Admin Login</h4>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>
@endsection
