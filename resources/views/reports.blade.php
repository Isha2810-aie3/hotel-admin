@extends('layouts.app')

@section('title','Reports')

@section('content')
    <div class="container">
    <h2 class="mb-4">📊 Reviews</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        
                        <th>review_id</th>
                        <th>user_id</th>
                        <th>booking_id</th>
                        <th>rating</th>
                        <th>comment</th>
                        <th>review_date</th>
                        
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endsection
