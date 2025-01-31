<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminWorkSchedule extends Component
{
    public $currentMonth;
    public $currentYear;
    public $calendar = [];
    public $selectedDates = []; // วันที่ที่เลือกหลายวัน
    public $pendingStatus = null; // สถานะที่รอการยืนยัน

    public function mount()
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->generateCalendar();
    }

    public function generateCalendar()
    {
        $daysInMonth = now()->setMonth($this->currentMonth)->daysInMonth;
        $startOfMonth = now()->setYear($this->currentYear)->setMonth($this->currentMonth)->startOfMonth()->dayOfWeek;

        $this->calendar = [];
        $week = array_fill(0, 7, ['date' => null, 'status' => '']);

        // เติมวันที่ว่างก่อนวันเริ่มต้น
        for ($i = 0; $i < $startOfMonth; $i++) {
            $week[$i] = ['date' => null, 'status' => ''];
        }

        // เติมวันที่ในเดือน
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $index = ($startOfMonth + $day - 1) % 7;
            $week[$index] = [
                'date' => $day,
                'status' => '' // กำหนดสถานะว่างเปล่าเริ่มต้น
            ];

            if ($index == 6 || $day == $daysInMonth) {
                $this->calendar[] = $week;
                $week = array_fill(0, 7, ['date' => null, 'status' => '']);
            }
        }
    }

    public function changeMonth($increment)
    {
        $this->currentMonth += $increment;

        if ($this->currentMonth > 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        } elseif ($this->currentMonth < 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        }

        $this->generateCalendar();
    }

    public function selectDate($date)
    {
        if (in_array($date, $this->selectedDates)) {
            // เอาออกถ้าวันที่ถูกเลือกซ้ำ
            $this->selectedDates = array_diff($this->selectedDates, [$date]);
        } else {
            // เพิ่มวันที่ถ้าเลือกใหม่
            $this->selectedDates[] = $date;
        }
    }

    public function setPendingStatus($status)
    {
        $this->pendingStatus = $status;
    }

    public function confirmSelection()
    {
        if ($this->pendingStatus) {
            foreach ($this->calendar as &$week) {
                foreach ($week as &$day) {
                    if (in_array($day['date'], $this->selectedDates)) {
                        $day['status'] = $this->pendingStatus;
                    }
                }
            }
        }

        $this->resetSelection(); // รีเซ็ตหลังยืนยัน
    }

    public function resetSelection()
    {
        $this->selectedDates = [];
        $this->pendingStatus = null;
    }

    public function render()
    {
        return view('livewire.admin.admin-work-schedule');
    }
}
