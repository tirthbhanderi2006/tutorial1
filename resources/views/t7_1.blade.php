@extends('welcome')
@section('main_content')


<form action="{{route('cal_area')}}" method="post">
@csrf
    <input type="number" name="length" id="" placeholder="enter length"><br>
    <input type="number" name="width" id="" placeholder="enter width"><br>
    <input type="submit" value="submit">

<br>
    @if(isset($area) && isset($perimeter))
        <h4>area of recangle : {{$area}} </h4><br>
        <h4>perimeter of recangle : {{$perimeter}}</h4>
    @endif
</form>

@endsection