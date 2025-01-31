<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use App\Models\SalesProject;


class SaleCreateProject extends Component
{
    // ตัวแปรที่ใช้เก็บข้อมูลจากฟอร์ม
    public $project_name = '';
    public $work_type = '';
    public $other_work_type = ''; // เก็บข้อมูล "Other" ของประเภทงาน
    public $solution = '';
    public $other_solution = ''; // เก็บข้อมูล "Other" ของ Solution
    public $work_description = '';
    public $meeting_date = '';
    public $meeting_time = '';
    public $end_date = '';

    // ข้อมูลลูกค้า
    public $company_name = '';
    public $contact_name = '';
    public $contact_phone = '';
    public $contact_position = '';
    public $location = '';

    // รายละเอียดเพิ่มเติม
    public $warranty = '';
    public $additional_notes = '';
    public $needs_documents = '';

    // ตัวเลือกในฟอร์ม
    public $work_types = [
        'Survey & Design & Bom', 'Survey & Bom', 'Design & Bom', 'Bom',
        'Demo & Survey & Design & Bom', 'Demo', 'New Installation (ขอPMรับผิดชอบ)',
        'Config', 'Audit', 'Service', 'Preventive Maintenance', 'Training',
        'Test & Commissioning', 'VAR', 'Repair', 'Present', 'Other'
    ];
    public $solutions = [
        'TV System', 'LAN Network', 'FTTx Network', 'IP-Phone', 'CCTV', 'PA (Sound System)',
        'IOT', 'Signage', 'MATV', 'IPTV', 'Digital Head End', 'Service True (A plus ,Hotel plus ,CMDU)',
        'IDB', 'LED', 'Fibergreen', 'Set Up ระบบ Steaming ชั่วคราว', 'Other'
    ];
    public $warranty_options = [
        'อยู่ในประกัน (ไม่เก็บเงินลูกค้า)', 'อยู่ในประกัน (เก็บเงิน)', 'หมดประกัน (เก็บเงิน)',
        'งานใหม่', 'VIP'
    ];
    public $document_options = ['ต้องการ', 'ไม่ต้องการ'];

    public function render()
    {
        return view('livewire.sale.sale-create-project');
    }

    public function save()
    {
        // Validate ข้อมูล
        $this->validate([
            'project_name' => 'required|string|max:255',
            'work_type' => 'required|string',
            'other_work_type' => 'required_if:work_type,Other|string|max:255',
            'solution' => 'required|string',
            'other_solution' => 'required_if:solution,Other|string|max:255',
            'work_description' => 'required|string',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|regex:/^[0-9]{9,10}$/',
            'contact_position' => 'required|string|max:255',
            'location' => 'required|url|max:255',
            'warranty' => 'required|string',
            'additional_notes' => 'nullable|string',
            'needs_documents' => 'required|string',
        ]);

        // ตรวจสอบค่า "Other" สำหรับ work_type และ solution
        $final_work_type = $this->work_type === 'Other' ? $this->other_work_type : $this->work_type;
        $final_solution = $this->solution === 'Other' ? $this->other_solution : $this->solution;

        // บันทึกข้อมูลโปรเจกต์
        $salesProject = new SalesProject();
        $salesProject->sales_projectname = $this->project_name;
        $salesProject->sales_worktype = $final_work_type;
        $salesProject->sales_solution = $final_solution;
        $salesProject->sale_workdescription = $this->work_description;
        $salesProject->sales_meetingdate = $this->meeting_date;
        $salesProject->sales_meetingtime = $this->meeting_time;
        $salesProject->sales_enddate = $this->end_date;

        // ข้อมูลลูกค้า
        $salesProject->sales_companyname = $this->company_name;
        $salesProject->sales_contactname = $this->contact_name;
        $salesProject->sales_contactphone = $this->contact_phone;
        $salesProject->sales_contactposition = $this->contact_position;
        $salesProject->sales_location = $this->location;

        // รายละเอียดเพิ่มเติม
        $salesProject->sales_warranty = $this->warranty;
        $salesProject->sales_additionalnotes = $this->additional_notes;
        $salesProject->sales_needsdocuments = $this->needs_documents;

        $salesProject->save();

        // แสดงข้อความเมื่อบันทึกข้อมูลสำเร็จ
        session()->flash('success', 'Project created successfully!');
        return $this->redirect('sale-list-project', navigate:true);
    }
}
