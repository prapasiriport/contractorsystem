<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\UsersContractor;


class AdminViewContractor extends Component
{
    public $getRecord = [];

    public function mount($id){
        $this->getRecord = UsersContractor::find($id);
    }
    
    public function render()
    {
        return view('livewire.admin.admin-view-contractor');
    }
}
