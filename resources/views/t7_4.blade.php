@extends('welcome')

@section('main_content')

    <h1>Demonstrate Constructor</h1>

    <!-- Display the details after form submission -->
    @if (isset($details))
        <p>{{ $details }}</p>
    @endif
<div class="container">
    <!-- Form to input name and age -->
    <form action="handleClick" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
<br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>
<br>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
