@extends('layouts.app')

@section('title','Services')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-concierge-bell"></i> 🛎️ Services</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">+ Add Service</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Service ID</th>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->service_id }}</td> 
                            <td>{{ $service->name }}</td>
                            <td>₹{{ number_format($service->price, 2) }}</td>
                            <td>{{ $service->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center">No services found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">➕ Add Service</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="2"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Save Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
