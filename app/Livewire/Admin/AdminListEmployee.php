<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class AdminListEmployee extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap'; 
    public $search = '';
    public $role = '';

     // รีเซ็ตหน้าเมื่อมีการค้นหาหรือเปลี่ยนตำแหน่ง
     public function updatedSearch()
     {
         $this->resetPage(); // รีเซ็ตหน้าเมื่อค้นหาใหม่
     }
 
     public function updatedRole()
     {
         $this->resetPage(); // รีเซ็ตหน้าเมื่อเลือกประเภทใหม่
     }

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                  ->orWhere('last_name', 'like', '%' . $this->search . '%')
                  ->orWhere('company_name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->role) {
            $query->where('role', $this->role);
        }

        // ใช้ paginate() และเก็บค่าที่เป็น paginated result
        $employees = $query->paginate(2);

        return view('livewire.admin.admin-list-employee', ['employees' => $employees]);
    }

    public function deleteEmployee(User $user)
    {
        $user->delete();
        session()->flash('success', 'User deleted successfully');
        $this->resetPage(); // รีเซ็ตหน้าหลังจากลบข้อมูล
    }
}
