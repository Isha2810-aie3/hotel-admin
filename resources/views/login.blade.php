@extends('layouts.auth')

@section('title','Admin Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:85vh;">
  <div class="card shadow-sm" style="width:420px;">
    <div class="card-body">
      <h4 class="card-title mb-3">Admin Login</h4>

      @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input name="email" type="email" class="form-control" placeholder="admin@example.com" required />
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input name="password" type="password" class="form-control" placeholder="password" required />
        </div>
        <button class="btn btn-primary w-100">Login</button>
        <div class="mt-2 text-muted small">Use <strong>admin@example.com</strong> / <strong>password</strong></div>
      </form>
    </div>
  </div>
</div>
@endsection
