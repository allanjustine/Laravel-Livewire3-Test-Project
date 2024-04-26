<?php

namespace App\Livewire\Carts;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('livewire.carts.index', compact('users'));
    }
}
