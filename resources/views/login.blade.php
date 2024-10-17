<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    .login-container {
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
        <div class="login-container">
          <h3 class="text-center">Login</h3>

          <!-- Display Success Message -->
          @if(session('registered'))
          <div class="alert alert-success" role="alert">
            {{ session('registered') }}
          </div>
          @endif

          @if(session('deleted'))
          <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
          </div>
          @endif

          @if(session('logout'))
          <div class="alert alert-success" role="alert">
            {{ session('logout') }}
          </div>
          @endif


          <form action="{{ route('check_login') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}">
              <!-- Display Error for Email -->
              @error('email')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              <!-- Display Error for Password -->
              @error('password')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>

          <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
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
