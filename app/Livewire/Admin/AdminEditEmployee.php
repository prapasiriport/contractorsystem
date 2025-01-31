<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class AdminEditEmployee extends Component
{
    public $id;
    public $user;
    public $role;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร role
    public $prefix;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร prefix
    public $email;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร email
    public $username;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร username
    public $password;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร password
    public $password_confirmation;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร password_confirmation
    public $first_name;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร first_name
    public $last_name;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร last_name
    public $company_name; // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร company_name
    public $address;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร address
    public $street;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร street
    public $sub_district;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร sub_district
    public $district;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร district
    public $province;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร province
    public $postal_code;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร postal_code
    public $phone;  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร phone

    public function mount(User $id)
    {
        $this->user = $id;
        $this->role = $id->role;
        $this->prefix = $id->prefix;
        $this->email = $id->email;
        $this->username = $id->username;
        $this->password = '';  // ไม่แสดงรหัสผ่านเดิมเพื่อป้องกันการแสดง
        $this->password_confirmation = '';  // ไม่แสดงรหัสผ่านเดิมเช่นเดียวกัน
        $this->first_name = $id->first_name;
        $this->last_name = $id->last_name;
        $this->company_name = $id->company_name;
        $this->address = $id->address;
        $this->street = $id->street;
        $this->sub_district = $id->sub_district;
        $this->district = $id->district;
        $this->province = $id->province;
        $this->postal_code = $id->postal_code;
        $this->phone = $id->phone;
    }
    
    
    public function updateEmployee()
    {
        // การตรวจสอบข้อมูลที่รับเข้ามา
        $validatedData = $this->validate([
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'sub_district' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|numeric|digits:5',
            'phone' => 'required|numeric|digits:10',
            'password' => 'nullable|string|min:8|confirmed', // เพิ่มเงื่อนไขยืนยันรหัสผ่าน
        ]);
    
        // ถ้ามีการกรอกรหัสผ่านใหม่ ให้ทำการแฮชรหัสผ่าน
        if ($this->password) {
            $validatedData['password'] = bcrypt($this->password);
        } else {
            // ถ้าไม่มีการกรอกรหัสผ่านใหม่ ให้ลบค่า password ออกจากข้อมูลที่อัปเดต
            unset($validatedData['password']);
        }

        // อัปเดตข้อมูลผู้ใช้
        $this->user->update($validatedData);
        session()->flash('success', 'Employee updated successfully!');
        return $this->redirect('/admin-list-employee', navigate:true);
    
    }
    
    public function render()
    {
        return view('livewire.admin.admin-edit-employee');
    }
}
