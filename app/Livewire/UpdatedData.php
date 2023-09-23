<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdatedData extends Component
{
    protected $listeners = ['dataUpdated' => 'refreshComponent'];

    public function refreshComponent ()
    {
        $this->dispatch('refreshUpdatedData');
    }

    public function render()
    {
        return view('livewire.updated-data')->with(['user' => Auth::user()]);
    }
}
