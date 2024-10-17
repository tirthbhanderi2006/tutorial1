@extends('welcome')

@section('main_content')

    <h1>Inheritance Demonstration</h1>

    <h2>Base Class</h2>
    <p><strong>Name:</strong> {{ $baseName }}</p>
    <p><strong>Message:</strong> {{ $baseMessage }}</p>

    <h2>Child Class</h2>
    <p><strong>Name:</strong> {{ $childName }}</p>
    <p><strong>Message:</strong> {{ $childMessage }}</p>

    <h2>Child Calling Parent's Method</h2>
    <p><strong>Message from Parent (via Child):</strong> {{ $parentMessageFromChild }}</p>

@endsection
