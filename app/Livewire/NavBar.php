<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Auth;

class NavBar extends Component
{
    public function render()
    {
        // ตรวจสอบ URL และคืนค่า Navbar ที่เหมาะสม
        if (request()->is('pm*')) {
            return view('livewire.pm.pm-nav-bar');  // ใช้ Navbar สำหรับ PM
        } elseif (request()->is('admin*')) {
            return view('livewire.admin.admin-nav-bar');  // ใช้ Navbar สำหรับ Admin
        } elseif (request()->is('sale*')) {
            return view('livewire.sale.sale-nav-bar');  // ใช้ Navbar สำหรับ Sale
        } elseif (request()->is('contractor*')) {
            return view('livewire.contractor.contractor-nav-bar');  // ใช้ Navbar สำหรับ Contractor
        }

        // ถ้าหากไม่ตรงกับเงื่อนไขใด ๆ ให้ใช้ Navbar แบบทั่วไป
        return view('livewire.nav-bar');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->redirect('/login', navigate:true);
    }
}

