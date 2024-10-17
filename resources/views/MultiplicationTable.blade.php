@extends('welcome')
@section('main_content')

<form action="{{ url('/') }}/Route_MultiplicationTable" method="post">
    <h3>multiplication table</h3>
    @csrf
    <label for="">enter integer</label>
    <input type="number" name="number">
    <input type="submit" value="submit">
</form>
@if(isset($n))
    @for($i = 1; $i <= 10; $i++)
        {{ $n . ' X ' . $i . ' = ' . $n * $i }}<br>
    @endfor
@endif


@endsection