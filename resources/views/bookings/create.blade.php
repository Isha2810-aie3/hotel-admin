@extends('layouts.auth') <!-- Your main layout -->

@section('title', 'Hotel Booking')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hotel Reservation Form</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
    color: #333;
}
.form-container {
    background: rgba(255,255,255,0.95);
    max-width: 800px;
    margin: 50px auto;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.2);
}
h1 { text-align: center; margin-bottom: 20px; }
.form-row { display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 15px; }
.form-group { flex: 1 1 45%; display: flex; flex-direction: column; }
.form-group.full-width { flex: 1 1 100%; }
label { margin-bottom: 5px; font-weight: 500; }
input, select, textarea { padding: 10px 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; }
textarea { resize: vertical; }
.rooms { margin-bottom: 15px; }
.room-option { display: flex; align-items: center; margin-bottom: 10px; gap: 10px; }
.room-option input[type="number"] { width: 60px; }
.total { text-align: right; font-weight: 600; font-size: 1.1rem; margin-top: 15px; }
button {
    width: 100%; padding: 15px; background-color: #007bff; color: #fff;
    border: none; border-radius: 8px; font-size: 1.1rem; cursor: pointer; margin-top: 20px;
}
button:hover { background-color: #0056b3; }
</style>
</head>
<body>

<div class="form-container">
    <h1>Hotel Reservation Form</h1>
    <form action="{{ route('bookings.store') }}" method="POST" id="reservationForm">
    @csrf

        <!-- Name -->
        <div class="form-row">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
            </div>
            <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
            </div>
        </div>

        <!-- Address -->
        <div class="form-group full-width">
            <label>Address</label>
            <input type="text" name="address" placeholder="Street Address" value="{{ old('address') }}" required>
        </div>

        <!-- Contact -->
        <div class="form-row">
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="(123) 456-7890" value="{{ old('phone') }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="example@example.com" value="{{ old('email') }}" required>
            </div>
        </div>

        <!-- Dates -->
        <div class="form-row">
            <div class="form-group">
                <label>Arrival Date & Time</label>
                <input type="datetime-local" name="arrival" value="{{ old('arrival') }}" required>
            </div>
            <div class="form-group">
                <label>Departure Date & Time</label>
                <input type="datetime-local" name="departure" value="{{ old('departure') }}" required>
            </div>
        </div>

        <!-- Guests -->
        <div class="form-row">
            <div class="form-group">
                <label>Number of Adults</label>
                <input type="number" name="adults" min="1" value="{{ old('adults', 1) }}" required>
            </div>
            <div class="form-group">
                <label>Number of Kids</label>
                <input type="number" name="kids" min="0" value="{{ old('kids', 0) }}">
            </div>
        </div>

        <!-- Payment method -->
        <div class="form-row">
            <div class="form-group">
                <label>Payment Method</label>
                <select name="payment" required>
                    <option value="check" {{ old('payment') == 'check' ? 'selected' : '' }}>Check</option>
                    <option value="paypal" {{ old('payment') == 'paypal' ? 'selected' : '' }}>Paypal</option>
                </select>
            </div>
        </div>

        <!-- Rooms -->
        <div class="rooms">
            <label>My Products</label>
            <div class="room-option">
                <input type="checkbox" name="rooms[Deluxe][selected]" class="room" data-price="2000" checked>
                <span>Deluxe (₹ 2000)</span>
                <input type="number" name="rooms[Deluxe][qty]" class="room-qty" value="1" min="1">
            </div>
            
            <div class="room-option">
                <input type="checkbox" name="rooms[Suite][selected]" class="room" data-price="2500">
                <span>Suite (₹ 2500)</span>
                <input type="number" name="rooms[Suite][qty]" class="room-qty" value="1" min="1">
            </div>
            <div class="room-option">
                <input type="checkbox" name="rooms[Villa][selected]" class="room" data-price="3000">
                <span>Villa (₹ 3000)</span>
                <input type="number" name="rooms[Villa][qty]" class="room-qty" value="1" min="1">
            </div>
            <div class="room-option">
                <input type="checkbox" name="rooms[Standard][selected]" class="room" data-price="3500">
                <span>Standard (₹ 3500)</span>
                <input type="number" name="rooms[Standard][qty]" class="room-qty" value="1" min="1">
            </div>
        </div>

        <!-- Total -->
        <div class="total">Total: ₹ <span id="totalAmount">0</span></div>
        <input type="hidden" name="total_amount" id="total_amount">

        <!-- Special Requests -->
        <div class="form-group full-width">
            <label>Special Requests</label>
            <textarea name="requests" placeholder="Type here..." rows="4">{{ old('requests') }}</textarea>
        </div>

        <button type="submit" class="check-availability-btn">Book Now</button>
    </form>
</div>

<script>
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.room-option').forEach(r => {
        const checkbox = r.querySelector('.room');
        const qty = r.querySelector('.room-qty').value;
        if(checkbox.checked) {
            total += parseInt(checkbox.dataset.price) * parseInt(qty);
        }
    });
    document.getElementById('totalAmount').innerText = total;
    document.getElementById('total_amount').value = total;
}

document.querySelectorAll('.room, .room-qty').forEach(el => {
    el.addEventListener('change', updateTotal);
});

updateTotal();
</script>
</body>
</html>
@endsection
