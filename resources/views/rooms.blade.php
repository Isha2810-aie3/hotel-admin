@extends('layouts.app')

@section('title','Rooms')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-bed"></i> 🛏️ Room Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">+ Add Room</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Room ID</th>
                        <th>Image</th>
                        <th>Room Type</th>
                        <th>Description</th>
                        <th>Price/Night</th>
                        <th>Capacity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>
                                @if($room->image)
                                    <img src="{{ asset('storage/'.$room->image) }}" 
                                        class="img-thumbnail" 
                                        style="width:80px;height:60px;object-fit:cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $room->type }}</td>
                            <td>{{ $room->description }}</td>
                            <td>₹{{ $room->price }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>
                                <form action="{{ route('rooms.updateStatus', $room->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="Available" {{ $room->status == 'Available' ? 'selected' : '' }}>Available</option>
                                        <option value="Booked" {{ $room->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                                        <option value="Cleaning" {{ $room->status == 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
                                        <option value="Maintenance" {{ $room->status == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    </select>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No rooms found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Room Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">➕ Add Room</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Room Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Room Type</label>
                            <select class="form-select" name="room_type">
                                <option value="Deluxe">D - Deluxe</option>
                                <option value="Suite">S - Suite</option>
                                <option value="Villa">V - Villa</option>
                                <option value="Standard">T - Standard</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="2"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Price/Night</label>
                            <input type="text" class="form-control" name="price" placeholder="₹ 1000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Capacity</label>
                            <input type="number" class="form-control" name="capacity" placeholder="2">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="Available">Available</option>
                                <option value="Occupied">Occupied</option>
                                <option value="Cleaning">Cleaning</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success px-4">Save Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
