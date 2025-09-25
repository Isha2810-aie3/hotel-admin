@extends('layouts.auth')

@section('title','Bookings')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="fas fa-book"></i>📖 All Bookings</h2>

    <div >
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Adults</th>
                        <th>Kids</th>
                        <th>Payment</th>
                        <th>Rooms</th>
                        <th>Total Amount</th>
                        <th>Requests</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
                            <td>{{ $booking->address }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->arrival }}</td>
                            <td>{{ $booking->departure }}</td>
                            <td>{{ $booking->adults }}</td>
                            <td>{{ $booking->kids }}</td>
                            <td>{{ $booking->payment }}</td>
                            <td>{{ $booking->rooms ?? 'N/A' }}</td>
                            <td>₹{{ $booking->total_amount }}</td>
                            <td>{{ $booking->requests }}</td>
                            <td>{{ $booking->created_at }}</td>
                            <td>
                                <a href="{{ route('payment.page', ['total' => $booking->total_amount]) }}" class="btn btn-success btn-sm">
                                    Pay ₹{{ $booking->total_amount }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
