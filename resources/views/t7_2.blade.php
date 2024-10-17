@extends('welcome')

@section('main_content')

    <!-- Display flash message if exists -->
    @if (session('status'))
        <div style="color: green;">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ url('manageAccount') }}" method="POST">
        @csrf
        <input type="hidden" name="balance" value="{{ $account->getBalance() }}">

        <!-- Input for amount -->
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>

        <br><br>

        <!-- Buttons for deposit and withdrawal -->
        <button type="submit" name="deposit">Deposit</button>
        <button type="submit" name="withdraw">Withdraw</button>
    </form>

@endsection
