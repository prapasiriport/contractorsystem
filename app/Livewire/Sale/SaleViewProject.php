<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use App\Models\SalesProject;

class SaleViewProject extends Component
{
    public $getRecord;

    public function mount($id)  // รับพารามิเตอร์ $id
    {
        // ดึงข้อมูลจากฐานข้อมูลโดยใช้ $id และตรวจสอบหากไม่พบข้อมูล
        $this->getRecord = SalesProject::find($id);
        
        // ถ้าไม่พบข้อมูล ให้ redirect ไปยังหน้าที่ต้องการ
        if (!$this->getRecord) {
            session()->flash('error', 'ไม่พบข้อมูลโปรเจกต์');
            return redirect()->route('sale-list-project'); // เปลี่ยนเป็น route 'listsale' ที่คุณต้องการให้ redirect
        }
    }
        
    public function render()
    {
        return view('livewire.sale.sale-view-project');
    }
}
