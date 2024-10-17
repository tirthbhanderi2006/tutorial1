<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
</head>

<body>
    <!-- Registration 3 - Bootstrap Brain Component -->
    @extends('welcome')
    @section('main_content')
    <section class="p-3 p-md-4 p-xl-5 m">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
                    <div class="p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h2 class="h3">Registration</h2>
                                    <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                                </div>
                            </div>
                        </div>
                        <form action="registration" method="post" {{ url('/registration') }}>
                            @csrf
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                                </div>
                                <div class="col-12">
                                    <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
            
                                <div class="col-12">
                                    <label class="form-label">Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                                <!-- New Checkbox for Hobbies -->
                                <div class="col-12">
                                    <label class="form-label">Hobbies</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobbyReading" name="hobbies[]" value="Reading">
                                        <label class="form-check-label" for="hobbyReading">Reading</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobbyTraveling" name="hobbies[]" value="Traveling">
                                        <label class="form-check-label" for="hobbyTraveling">Traveling</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobbySports" name="hobbies[]" value="Sports">
                                        <label class="form-check-label" for="hobbySports">Sports</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobbyCooking" name="hobbies[]" value="Cooking">
                                        <label class="form-check-label" for="hobbyCooking">Cooking</label>
                                    </div>
                                </div>
                                <!-- Existing form fields -->

                                <!-- New Dropdown -->
                                <div class="col-12">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-control" id="country" name="country" required>
                                        <option value="">Select Country</option>
                                        <option value="india">india</option>
                                        <option value="USA">USA</option>
                                        <option value="Canada">Canada</option>
                                        <option value="UK">UK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Sign up</button>
                                    </div>
                                </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</body>

</html>