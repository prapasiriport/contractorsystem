<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class AdminRegisterEmployee extends Component
{
    // กำหนดตัวแปรที่ใช้ในฟอร์ม
    public $role = '';  // ค่าเริ่มต้นเป็นค่าว่างสำหรับตัวแปร role
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
    

    // ตัวเลือกสำหรับ Role และ Prefix
    public $roles = ['admin', 'sale', 'pm', 'contractor'];  // ตัวเลือก role
    public $prefixes = ['นาย', 'นาง', 'นางสาว'];  // ตัวเลือก prefix

    public function render()
    {
        return view('livewire.admin.admin-register-employee', [
            'roles' => $this->roles,   // ส่งค่า roles ไปยัง Blade view
            'prefixes' => $this->prefixes, // ส่งค่า prefixes ไปยัง Blade view
        ]);
    }

    public function save()
    {
        // Validations
        $this->validate([
            'role' => 'required|in:admin,sale,pm', // ตรวจสอบค่าที่ส่งจากฟอร์ม
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required_with:password|same:password',
            'prefix' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'required|string',
            'address' => 'required|string',
            'street' => 'required|string',
            'sub_district' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'postal_code' => 'required|numeric|digits:5',
        ]);
    
        // การบันทึกข้อมูลผู้ใช้ใหม่
        $user = new User();
        $user->role = $this->role;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->password = bcrypt($this->password);  // เข้ารหัสรหัสผ่าน
        $user->prefix = $this->prefix;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->company_name = $this->company_name;
        $user->address = $this->address;
        $user->street = $this->street;
        $user->sub_district = $this->sub_district;
        $user->district = $this->district;
        $user->province = $this->province;
        $user->postal_code = $this->postal_code;
        $user->phone = $this->phone;
    
        $user->save();

         // แสดงข้อความเมื่อบันทึกข้อมูลสำเร็จ
         session()->flash('success', 'Employee create successfully!');
         return $this->redirect('/admin-list-employee', navigate:true);
    }
}
