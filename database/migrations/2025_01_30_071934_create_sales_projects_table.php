<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_projects', function (Blueprint $table) {
            $table->id();
            $table->string('sales_projectname')->nullable();
            $table->enum('sales_worktype', ['Survey & Design & Bom', 'Survey & Bom', 'Design & Bom', 'Bom', 'Demo & Survey & Design & Bom',
                        'Demo', 'New Installation (ขอPMรับผิดชอบ)', 'Config', 'Audit', 'Service', 'Preventive Maintenance', 'Training', 'Test & Commissioning', 'VAR', 
                        'Repair', 'Present', 'Other'])->nullable();
            $table->enum('sales_solution', ['TV System', 'LAN Network', 'FTTx Network', 'IP-Phone', 'CCTV','PA (Sound System)', 'IOT', 'Signage', 'MATV', 'IPTV', 
                        'Digital Head End', 'Service True (A plus ,Hotel plus ,CMDU)', 'IDB', 'LED', 'Fibergreen', 'Set Up ระบบ Steaming ชั่วคราว', 'Other'])->nullable();
            $table->string('sale_workdescription')->nullable();
            $table->date('sales_meetingdate')->nullable();
            $table->time('sales_meetingtime')->nullable();
            $table->date('sales_enddate')->nullable();
            $table->string('sales_companyname')->nullable();
            $table->string('sales_contactname')->nullable();
            $table->string('sales_contactphone', 10)->nullable();
            $table->string('sales_contactposition')->nullable();
            $table->string('sales_location')->nullable();
            $table->enum('sales_warranty', ['อยู่ในประกัน (ไม่เก็บเงินลูกค้า)', 'อยู่ในประกัน (เก็บเงิน)', 'หมดประกัน (เก็บเงิน)', 'งานใหม่', 'VIP'])->nullable();
            $table->text('sales_additionalnotes')->nullable();
            $table->enum('sales_needsdocuments', ['ต้องการ', 'ไม่ต้องการ'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_projects');
    }
};
