<?php

namespace App\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Component;

class AdminTransactions extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-transactions', [
            'transactions' => Transaction::all(),
        ]);
    }
}
