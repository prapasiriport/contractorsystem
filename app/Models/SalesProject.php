<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesProject extends Model
{
    use HasFactory;

    protected $table = 'sales_projects';

    protected $fillable = [
        'sales_projectname',       // ชื่อโปรเจกต์
        'sales_worktype',          // ประเภทงาน
        'sales_solution',          // Solution
        'sale_workdescription',    // คำอธิบายงาน
        'sales_meetingdate',       // วันที่นัดหมาย
        'sales_meetingtime',       // เวลานัดหมาย
        'sales_enddate',           // วันที่สิ้นสุดงาน
        'sales_companyname',       // ชื่อบริษัทลูกค้า
        'sales_contactname',       // ชื่อผู้ติดต่อ
        'sales_contactphone',      // เบอร์ติดต่อ
        'sales_contactposition',   // ตำแหน่งผู้ติดต่อ
        'sales_location',          // พิกัด
        'sales_warranty',          // การรับประกัน
        'sales_additionalnotes',   // หมายเหตุเพิ่มเติม
        'sales_needsdocuments',    // ต้องการเอกสารหรือไม่
    ];

    /**
     * ความสัมพันธ์กับ User: สมมุติว่าโปรเจกต์นี้เป็นของผู้ใช้งาน (ผู้ดูแล)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * เพิ่มฟังก์ชันสำหรับการคำนวณหรือจัดการข้อมูลพิเศษ
     * เช่น ฟังก์ชันที่จะคำนวณวันที่สิ้นสุดโปรเจกต์
     */
    public function calculateProjectDuration()
    {
        $startDate = \Carbon\Carbon::parse($this->sales_meetingdate);
        $endDate = \Carbon\Carbon::parse($this->sales_enddate);

        return $startDate->diffInDays($endDate); // คำนวณจำนวนวันที่ระหว่างวันที่นัดหมายกับวันที่สิ้นสุด
    }

    /**
     * ตัวอย่างการใช้งาน Accessor สำหรับการแสดงข้อมูลที่ปรับแต่ง
     * เช่น การแสดงวันที่นัดหมายในรูปแบบที่เข้าใจง่าย
     */
    public function getFormattedMeetingDateAttribute()
    {
        return \Carbon\Carbon::parse($this->sales_meetingdate)->format('d-m-Y');
    }
}
