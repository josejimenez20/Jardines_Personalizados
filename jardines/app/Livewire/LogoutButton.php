<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Actions\Logout;

class LogoutButton extends Component
{
    public function logout(Logout $logout)
    {
        $logout(); // Ejecuta la acción de logout
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.logout-button');
    }
}

