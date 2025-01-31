<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SalesProject;

class SaleListProject extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $project_name = '';

    public function updatedSearch()
    {
        $this->resetPage(); // รีเซ็ตหน้าหลังจากเปลี่ยนค่าการค้นหา
    }

    public function updatedProjectName()
    {
        $this->resetPage(); // รีเซ็ตหน้าหลังจากเปลี่ยนชื่อโปรเจกต์
    }

    public function render()
    {
        $query = SalesProject::query(); // กำหนดตัวแปร $query
    
        // การค้นหาด้วย search
        if ($this->search) {
            $query->where('sales_projectname', 'like', '%' . $this->search . '%');
        }
    
       // ดึงข้อมูลพร้อมแบ่งหน้าและส่งไปที่ Blade
       return view('livewire.sale.sale-list-project', [
        'SaleListProject' => $query->paginate(2)
    ]);
    }

    public function deleteProject(SalesProject $project)
    {
        $project->delete();
        session()->flash('success', 'Project deleted successfully');
        $this->resetPage(); // รีเซ็ตหน้าหลังจากลบข้อมูล
    }
}
