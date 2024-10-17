<!DOCTYPE html>
<html>
<head>
    <title>Registration Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    @extends('welcome');
    @section('main_content')
    <h1>Registration Data</h1>
    <table>
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $value)
            <tr>
                <td>{{ htmlspecialchars($key) }}</td>
                <td>
                    @if (is_array($value))
                        {{ implode(', ', $value) }}
                    @else
                        {{ htmlspecialchars($value) }}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>