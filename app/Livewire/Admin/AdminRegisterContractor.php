<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\UsersContractor;

class AdminRegisterContractor extends Component
{

    public $role = 'contractor';  // กำหนด role เป็น contractor โดยตรง
    public $prefix = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร prefix
    public $email = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร email
    public $username = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร username
    public $password = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร password
    public $password_confirmation = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร password_confirmation
    public $first_name = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร first_name
    public $last_name = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร last_name
    public $company_name = ''; // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร company_name
    public $address = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร address
    public $street = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร street
    public $sub_district = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร sub_district
    public $district = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร district
    public $province = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร province
    public $postal_code = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร postal_code
    public $phone = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร phone
    public $tax_id = ''; // เพิ่มสำหรับ contractor
    
    public $prefixes = ['นาย', 'นาง', 'นางสาว'];  // ตัวเลือก prefix

    public function render()
    {
        return view('livewire.admin.admin-register-contractor', [
            'prefixes' => $this->prefixes, // ส่งค่า prefixes ไปยัง Blade view
        ]);
    }

    // ฟังก์ชันสำหรับการบันทึกข้อมูล
    public function save()
    {
        // Validate for contractor
            $this->validate([
                'role' => 'required|in:contractor', // เช็คว่า role ต้องเป็น contractor
                'email' => 'required|email|unique:users_contractor,email',
                'username' => 'required|unique:users_contractor,username',
                'password' => 'required|confirmed|min:8',
                'prefix' => 'required|string',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'company_name' => 'required|string',
                'address' => 'required|string',
                'street' => 'required|string',
                'sub_district' => 'required|string',
                'district' => 'required|string',
                'province' => 'required|string',
                'postal_code' => 'required|string',
                'phone' => 'required|numeric|digits:10',
                'tax_id' => 'required|digits:13|numeric|unique:users_contractor,tax_id',
            ]);
    
            // สำหรับ contractor
            $contractor = new UsersContractor();
            $contractor->email = $this->email;
            $contractor->username = $this->username;
            $contractor->password = bcrypt($this->password);
            $contractor->prefix = $this->prefix;
            $contractor->first_name = $this->first_name;
            $contractor->last_name = $this->last_name;
            $contractor->company_name = $this->company_name;
            $contractor->tax_id = $this->tax_id;
            $contractor->address = $this->address;
            $contractor->street = $this->street;
            $contractor->sub_district = $this->sub_district;
            $contractor->district = $this->district;
            $contractor->province = $this->province;
            $contractor->postal_code = $this->postal_code;
            $contractor->phone = $this->phone;
            $contractor->save();

            // แสดงข้อความเมื่อบันทึกข้อมูลสำเร็จ
            session()->flash('success', 'Employee create successfully!');
            return $this->redirect('/admin-list-contractor', navigate:true);
        }
    }