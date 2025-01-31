<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UsersContractor;

class AdminListContractor extends Component
{
    use WithPagination; // ใช้ trait สำหรับการแบ่งหน้า
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

        // เริ่มต้นคำสั่ง query สำหรับค้นหาผู้รับเหมา
        $query = UsersContractor::query();

        // ค้นหาจากค่าการค้นหาที่กรอก
        if ($this->search) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                  ->orWhere('last_name', 'like', '%' . $this->search . '%')
                  ->orWhere('company_name', 'like', '%' . $this->search . '%');
        }

        // กรองตาม role ที่เลือก
        if ($this->role) {
            $query->where('role', $this->role);
        }

        // ใช้ paginate() และกำหนดจำนวนรายการที่แสดงต่อหน้า
        $employeescontractors = $query->paginate(2); 

        return view('livewire.admin.admin-list-contractor', ['employeescontractors' => $employeescontractors]);
    }

        // ฟังก์ชั่นลบผู้รับเหมา
        public function deleteEmployeeContractor(UsersContractor $id)
        {
            $id->delete(); // ลบข้อมูลผู้รับเหมา
            session()->flash('success', 'User deleted successfully');
            $this->resetPage(); // รีเซ็ตหน้ากระดาษหลังจากลบ
        }
}
