<?php

namespace App\Utilities;

class BankAccount
{
    // Properties for account number and balance
    private $accountNumber;
    private $balance;

    // Constructor to initialize the account with an account number and balance
    public function __construct($accountNumber, $balance = 0)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    // Method to deposit money into the account
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
            return "Deposited $amount successfully.";
        }

        return "Deposit amount should be greater than zero.";
    }

    // Method to withdraw money from the account
    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return "Withdrew $amount successfully.";
        } elseif ($amount > $this->balance) {
            return "Insufficient balance.";
        }

        return "Withdrawal amount should be greater than zero.";
    }

    // Method to get the current balance
    public function getBalance()
    {
        return $this->balance;
    }

    // Method to get the account number
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}
