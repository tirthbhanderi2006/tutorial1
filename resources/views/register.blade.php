<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .register-container {
      background-color: #dae7f5;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="register-container">
          <h3 class="text-center">Register</h3>
    

          <form action="{{ route('register_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="name" class="form-control" id="username" placeholder="Enter username" value="{{ old('name') }}">
              <!-- Display error for username -->
              @error('name')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}">
              <!-- Display error for email -->
              @error('email')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              <!-- Display error for password -->
              @error('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="confirm-password">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="confirm-password" placeholder="Confirm Password">
              <!-- Display error for password confirmation -->
              @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="profile-picture">Profile Picture</label>
              <input type="file" name="profile_picture" class="form-control" id="profile-picture" accept="image/*">
              <!-- Display error for profile picture -->
              @error('profile_picture')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </form>
          <div class="text-center mt-3">
            <p>Already have an account? <a href="{{ route('/') }}">Login here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
