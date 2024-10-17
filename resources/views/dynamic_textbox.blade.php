

@extends('welcome')
@section('main_content')
enter integer
<form action="dynamic_textbox">
    <h3>generate textboxes dynamically</h3>
    <input type="number" name="num" id="">
    <input type="submit" value="submit">
</form>
@if (isset($num))
 <form action="sorted_dynamic_textbox">
@for($i = 0; $i < $num; $i++)
    <input type="text" name="dynamic_field_{{ $i }}" placeholder="Field {{ $i + 1 }}">
@endfor
<br><input type="submit" value="sort value">
</form>
@endif

{{-- print sorted value --}}
@if(isset($fields))
    <table border="1">
        <thead>
            <tr>
                <th>sorted value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fields as $field)
                <tr>
                    <td>{{ $field }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection