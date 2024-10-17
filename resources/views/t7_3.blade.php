@extends('welcome')

@section('main_content')

<h5>Calculate Area</h5>
<form action="{{route('calculateShapes')}}" method="post">
    @csrf
        <input type="number" name="length" id="" placeholder="enter length"><br>
        <input type="number" name="width" id="" placeholder="enter width"><br>
        <input type="submit" value="submit">
    
    <br>
        @if(isset($triangleArea) && isset($rectangleArea))
            <h4>Area of recangle : {{$triangleArea}} </h4><br>
            <h4>Area of recangle : {{$rectangleArea}}</h4>
        @endif
    </form>

@endsection
