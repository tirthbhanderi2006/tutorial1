@extends('welcome')
@section('main_content')

{{-- <script src="{{ URL::to('/') }}/js/bootstrap.bundle.min.js"></script> --}}
{{-- <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css"> --}}

<div class="container" style="margin-top: 20px;">
    <form action="call_sum_of_digit" method="POST">
        <h3>sum of the digits </h3>
        @csrf
        <input type="text" name="num" id="">
        <input type="submit" value="submit" class="btn-primary">
    
    </form>
</div>
@if (isset($sum))
<div class="container" style="margin-top: 20px;">
    <h1>Sum of digit is {{$sum}}</h1>
    </div>
    {{-- {{ $sum }} --}}
@endif

@endsection