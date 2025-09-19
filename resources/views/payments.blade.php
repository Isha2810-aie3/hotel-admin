@extends('layouts.app')

@section('content')
    

    <div class="container">
    <h2 class="mb-4">💳 Payments</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                      
                        <th>payment_id</th>
                        <th>booking_id</th>
                        <th>payment_method</th>
                        <th>payment_date</th>
                        <th>status</th>
                        <th>service_amount</th>
                        
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endsection
