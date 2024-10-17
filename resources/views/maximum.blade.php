@extends('welcome')
@section('main_content')
    enter integer
    <form action="maximum">
        <h3>to print 1st, 2nd and 3rd maximum values</h3>
        <input type="number" name="num" id="">
        <input type="submit" value="submit">
    </form>

    @if (isset($num))
        @if ($num < 3)
            <h5>mimimum 3 fields required</h5>
        @else
            <form action="sorted_maximum_textbox">
                @for($i = 0; $i < $num; $i++)
                    <input type="text" name="dynamic_field_{{ $i }}" placeholder="Field {{ $i + 1 }}">
                @endfor
                <br><input type="submit" value="sort value">
            </form>           
        @endif
        
    @endif
    @if(isset($ans))
    <!-- maximum.blade.php -->
    <h1>Maximum Values</h1>
    max 1 = {{$ans[0]}} <br>
    max 2 = {{$ans[1]}}  <br>
    max 3 = {{$ans[2]}}
            
  @endif
@endsection