<?php

namespace App\Livewire\Pm;
use Carbon\Carbon;

use Livewire\Component;

class PmWorkSchedule extends Component
{

    public $currentMonth;
    public $currentYear;

    public function mount()
    {
        $this->currentMonth = Carbon::now()->month; // ตั้งค่าเดือนปัจจุบัน
        $this->currentYear = Carbon::now()->year;   // ตั้งค่าปีปัจจุบัน
    }

    public function changeMonth($increment)
    {
        $this->currentMonth += $increment;

        // ถ้าเดือนเกิน 12 หรือ น้อยกว่า 1 จะทำการปรับปี
        if ($this->currentMonth > 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        } elseif ($this->currentMonth < 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        }
    }
    public function render()
    {
        return view('livewire.pm.pm-work-schedule');
    }
}
