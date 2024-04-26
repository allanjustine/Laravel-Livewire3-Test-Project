<?php

namespace App\Livewire\Layouts;

use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    public $cartCount;

    protected $listeners = ['success'];

    public function render()
    {
        $this->cartCount = User::count();
        return view('livewire.layouts.navbar');
    }
}
