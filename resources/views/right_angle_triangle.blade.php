@extends('welcome')
@section('main_content')
<div class="container">
    <h3>to check rightangle triangle</h3>
    <form action="right_angle_triangle">
        <input type="number" name="side_1">
        <input type="number" name="side_2">
        <input type="number" name="side_3">
        <input type="submit" value="Calculate">
    </form>

    @if (isset($result))
        {{ $result }}
    @endif
    @endsection