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
                <tbody>
                    
                        <tr>
                            <td>1</td>
                            <td>admin</td>
                            <td>admin@example.com</td>
                            <td>1234567890</td>
                            <td>password</td>
                            <td>admin</td>
                            <td>9-20-2025</td>                          
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
