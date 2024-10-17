@extends('welcome')
@section('main_content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Change Password</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('update_password') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
                @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required>
                @error('new_password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                @error('new_password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
        </form>
    </div>
</div>
@endsection
