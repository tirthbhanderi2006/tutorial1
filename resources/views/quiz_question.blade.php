
@extends('welcome')
@section('main_content')
<style>
    h1 {
        font-size: 2em;
        color: #333;
    }
    p {
        font-weight: bold;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    input[type="radio"] {
        margin: 5px;
    }
</style>
<h1>quiz</h1>
<form action="{{ route('quiz_score') }}" method="post">
    @csrf
    @foreach($questions as $index => $question)
        <p>{{ $question['question'] }}</p>
        <ul>
            @foreach($question['options'] as $option)
                <li>
                    <input type="radio" name="answers[{{ $index }}]" value="{{ $option }}"> {{ $option }}
                </li>
            @endforeach
        </ul>
    @endforeach
<input type="submit" value="submit">
</form>
@endsection