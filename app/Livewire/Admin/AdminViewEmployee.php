<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class AdminViewEmployee extends Component
{
    public $getRecord = [];

    public function mount($id){
        $this->getRecord = User::find($id);
    }

    public function render()
    {
        return view('livewire.admin.admin-view-employee');
    }
}
