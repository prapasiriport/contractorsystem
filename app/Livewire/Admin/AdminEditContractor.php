<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\UsersContractor;

class AdminEditContractor extends Component
{
    public $id;
    public $UsersContractor;
    public $prefix;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;
    public $first_name;
    public $last_name;
    public $company_name;
    public $address;
    public $street;
    public $sub_district;
    public $district;
    public $province;
    public $postal_code;
    public $phone;
    public $tax_id; // เพิ่มสำหรับ contractor

    public function mount(UsersContractor $id)
    {
        $this->UsersContractor = $id;
        $this->prefix = $id->prefix;
        $this->email = $id->email;
        $this->username = $id->username;
        $this->password = ''; // ไม่แสดงรหัสผ่านเดิมเพื่อป้องกันการแสดง
        $this->password_confirmation = ''; // ไม่แสดงรหัสผ่านเดิมเช่นเดียวกัน
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
        $this->tax_id = $id->tax_id;
    }

    public function updateEmployeesContractor()
    {
        // การตรวจสอบข้อมูลที่รับเข้ามา
        $validatedData = $this->validate([
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
            'postal_code' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'tax_id' => 'required|digits:13|numeric', // แก้ไขตัวสะกด
        ]);

        // ถ้ามีการกรอกรหัสผ่านใหม่ ให้ทำการแฮชรหัสผ่าน
        if ($this->password) {
            $validatedData['password'] = bcrypt($this->password);
        } else {
            // ถ้าไม่มีการกรอกรหัสผ่านใหม่ ให้ลบค่า password ออกจากข้อมูลที่อัปเดต
            unset($validatedData['password']);
        }

        // อัปเดตข้อมูลผู้ใช้
        $this->UsersContractor->update($validatedData);
        session()->flash('success', 'Employee updated successfully!');
        return $this->redirect('/admin-list-contractor');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-contractor');
    }
}
