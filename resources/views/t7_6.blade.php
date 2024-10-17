@extends('welcome')

@section('main_content')

    <h1>Method Overloading Demonstration</h1>

    <h2>Sum of Two Numbers</h2>
    <p>Result of sum(10, 20): {{ $resultTwoNumbers }}</p>

    <h2>Sum of Three Numbers</h2>
    <p>Result of sum(10, 20, 30): {{ $resultThreeNumbers }}</p>

    <h2>Invalid Overloading Attempt</h2>
    <p>Result of sum(10): {{ $resultInvalid }}</p>

@endsection
