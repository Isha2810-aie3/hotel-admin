@extends('layouts.app')

@section('title','Bookings')


@section('content')
<div class="container">
    <h2 class="mb-4">
        <i class="fas fa-book"></i>📖 Bookings
    </h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        
                        <th>Booking ID</th>
                        <th>User ID</th>
                        <th>Room ID</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Room Total</th>
                        <th>Service Details</th>
                        <th>Service Total</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
@endsection
