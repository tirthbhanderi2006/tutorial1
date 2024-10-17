<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Tutorial By Tirth Patel</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script> -->
    <script src="{{ URL::to('/') }}/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ URL::to('/') }}/home">WDUF-Tutorials</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">tutorial 1</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/registration_form">t1.1</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/quiz">t1.2</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/prime_number">t1.3</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/moduls">t1.4</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/MultiplicationTable">t1.5</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ URL::to('/') }}/dynamic_textbox">t2.1</a></li> --}}
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">tutorial 2</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/dynamic_textbox">t2.1</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/upload">t2.2</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/sum_of_digit">t2.3</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/maximum">t2.4</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/right_angle_triangle">t2.5</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">tutorial 3</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/files">t3.1</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">tutorial 4</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/product_form">t4.1</a></li>
                    </ul>
                </li>
            </ul>


            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">tutorial 7</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/t7_1">t7.1</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/t7_2">t7.2</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/t7_3">t7.3</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/t7_4">t7.4</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/t7_5">t7.5</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/t7_6">t7.6</a></li>

                    </ul>
                </li>
            </ul>

            <!-- Logout Button -->
            @if(session('user_email'))
            <ul class="navbar-nav ms-auto"> <!-- Changed from ml-auto to ms-auto for Bootstrap 5 -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/profile">
                        <button class="btn btn-primary">Profile
                        <i class="fas fa-user"></i> </button>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/logout">
                        <button class="btn btn-danger">Logout</button>
                    </a>
                </li>
            </ul>
            @endif
        </div>

    </nav>
    <div class="container">

        @yield("main_content")
    </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 bhanderi tirth
        </div>
    </footer>



</body>

</html>