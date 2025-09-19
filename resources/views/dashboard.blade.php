@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🏠 Dashboard</h2>

    <!-- Top Stats -->
    <div class="row text-center mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h6>Quick Stats</h6>
                <h3>25</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h6>Total Bookings</h6>
                <h3>120</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h6>Total Users</h6>
                <h3>80</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h6>Revenue</h6>
                <h3>₹4,50,000</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Occupancy Overview -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3">
                <h5>Occupancy Overview</h5>
                <div class="d-flex justify-content-between">
                    <p>Available Rooms: <strong>19</strong></p>
                    <p>Booked Rooms: <strong>6</strong></p>
                </div>
                <div class="progress" style="height:20px;">
                    <div class="progress-bar bg-success" style="width: 72%">Available</div>
                    <div class="progress-bar bg-primary" style="width: 28%">Booked</div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3">
                <h5>Recent Bookings</h5>
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Guest Name</th>
                            <th>Room Type</th>
                            <th>Check-In</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#101</td>
                            <td>Ramesh Patel</td>
                            <td>Deluxe</td>
                            <td>18 Sep <span class="badge bg-success">✔</span></td>
                        </tr>
                        <tr>
                            <td>#102</td>
                            <td>Sneha Shah</td>
                            <td>Standard</td>
                            <td>19 Sep <span class="badge bg-warning">⭑</span></td>
                        </tr>
                        <tr>
                            <td>#103</td>
                            <td>John Doe</td>
                            <td>Suite</td>
                            <td>20 Sep <span class="badge bg-danger">✖</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Services -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3">
                <h5>Recent Services Ordered</h5>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        Room Dining <span>15 Orders</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        Spa <span>7 Orders</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        Airport Pickup <span>4 Orders</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Revenue Chart -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3">
                <h5>Revenue</h5>
                <canvas id="revenueChart" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May'],
            datasets: [{
                label: 'Revenue',
                data: [300000, 500000, 700000, 650000, 720000],
                backgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
