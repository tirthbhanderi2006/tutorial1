@extends('welcome')
@section('main_content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Profile</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('updated'))
          <div class="alert alert-success" role="alert">
            {{ session('updated') }}
          </div>
          @endif
                {{-- Display validation errors for each field --}}
                <form action="{{route('profile.update', $userData->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center mb-3">
                        <img src="{{$userData->profileImage}}" alt="Profile Picture" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;">
                        <div class="mt-2">
                            <label class="btn btn-outline-primary btn-sm">
                                Change Image <input type="file" name="profile_image" hidden>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$userData->userName}}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$userData->userEmail}}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                </form>
                <hr>
                <form action="{{route('changePasswordview')}}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-block">Change Password</button>
                </form>
                <form action="{{route('delete_profile')}}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
