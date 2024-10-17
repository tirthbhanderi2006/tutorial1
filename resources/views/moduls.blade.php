
@extends('welcome')
@section('main_content')
<form action="{{ url('/') }}/route_modulus" method="post">
<h3>find modulus</h3>
@csrf
<label for="num1">First Number:</label><br>
<input type="number" id="num1" name="num1"><br><br>
<label for="num2">Second Number:</label><br>
<input type="number" id="num2" name="num2"><br><br>
<input type="submit" value="Submit">
</form>
@if(isset($result))
    <h3>result : {{ $result }}</h3>
@endif
@endsection