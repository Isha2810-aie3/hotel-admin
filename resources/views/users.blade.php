@extends('layouts.app')

@section('title','Users')

@section('content')
  
  <div class="container">
    <h2 class="mb-4">👥 Users</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        
                        <th>User_id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>password</th>
                        <th>role</th>
                        <th>created_at</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endsection
